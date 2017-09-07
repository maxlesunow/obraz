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
        $role_id = Role::where('name', '=', 'user')->firstOrFail()->id;
        $users = User::where('role_id', '=', $role_id)->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function indexAdmin()
    {

        $role_id = Role::where('name', '=', 'admin')->firstOrFail()->id;
        $users = User::where('role_id', '=', $role_id)->paginate(10);

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

        \Session::flash('success_message', 'Пользователь "' . $user->full_name(). '" успешно обновлен');
        return redirect('admin/user/'.$id.'/edit');
    }
}
