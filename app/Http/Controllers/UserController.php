<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;

use App\User;
use App\Role;

class UserController extends Controller
{
    //

    public function show()
    {
        $role_id = Role::where('name', '=', 'user')->firstOrFail()->id;
        $users = User::where('role_id', '=', $role_id)->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function index()
    {

        return view('admin.user.index');
    }

    public function indexAdmin()
    {

        return view('admin.user.indexAdmin', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name_ru', 'id');
        $role = $user->role()->pluck('id');
        return view('admin.user.edit', compact('user', 'roles', 'role'));
    }

    public function update($id, UserRequest $request)
    {
        $request->merge([ 'is_verification' => $request->has('is_verification') ? true : false ]);
        $user = User::findOrFail($id);

        $user->update($request->all());

        $user->role()->associate(Role::findOrFail($request->input('role')));
        $user->save();

        \Session::flash('success_message', 'Пользователь "' . $user->full_name. '" успешно обновлен');
        return redirect('admin/user/'.$id.'/edit');
    }


    public function getUsers(Request $request, $type='user')
    {
        $role_id = Role::where('name', '=', $type)->firstOrFail()->id;


        $query = User::query()->select('users.*');

        $query->where('role_id', '=', $role_id);

        //Сортировка
        if (request()->has('sort')) {
            // Мультисортировка
            $sorts = explode(',', request()->sort);
            foreach ($sorts as $sort) {
                if($sort){
                    list($sortCol, $sortDir) = explode('|', $sort);

                    //Костыль для сортировки по полному имени
                    if($sortCol != 'users.full_name'){
                        $query = $query->orderBy($sortCol, $sortDir);
                    }
                    else{
                        $query = $query->orderBy('users.last_name', $sortDir);
                        $query = $query->orderBy('users.first_name', $sortDir);
                        $query = $query->orderBy('users.middle_name', $sortDir);
                    }
                }
            }
        } else {
            $query = $query->orderBy('users.id', 'asc');
        }

        //Поиск
        if ($request->exists('search')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->search}%";
                $q->where('users.first_name', 'ilike', $value)
                    ->orWhere('users.last_name', 'ilike', $value)
                    ->orWhere('users.middle_name', 'ilike', $value)
                    ->orWhere('users.phone', 'ilike', $value)
                    ->orWhere('users.email', 'ilike', $value);
            });
        }

        //Фильтр
        if ($request->exists('filters')) {

            $filters = explode(',', request()->filters);
            foreach ($filters as $filter) {
                if($filter){
                    list($filterBy, $filterValue) = explode('|', $filter);
                    if($filterBy == 'reservations.course_id'){
                        $query->whereHas('reservations', function($q) use($filterValue){
                            $q->where('course_id', $filterValue);
                        });
                    }
                    else{
                        $query->where($filterBy, $filterValue);
                    }
                }
            }
        }

        //Пагинация
        $perPage = request()->has('per_page') ? (int) request()->per_page : null;

        $pagination = $query->paginate($perPage);
        $pagination->appends([
            'sort' => request()->sort,
            'filter' => request()->filter,
            'per_page' => request()->per_page
        ]);

        return response()->json($pagination);
    }

    public function getAdmins(Request $request)
    {
        return $this->getUsers($request, $type='admin');
    }

    public function destroy($ids){

        $users = User::find(explode(',', $ids));

        if(count($users) == 0) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('error', 'Курсы не найдены. Возможно вы удалили их ранее');

            return response()->json($errors, 422);
        }

        User::destroy(explode(',', $ids));

        return  response()->json($users);
    }
}
