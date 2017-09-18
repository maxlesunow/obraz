<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ReservationRequest;

use App\Reservation;
use App\PaymentType;
use App\User;
use App\Course;

class ReservationController extends Controller
{
    //

    public function index()
    {

        return view('admin.reservation.index', compact('reservations'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);

        $payment_types = PaymentType::pluck('name', 'id');
        $payment_type = $reservation->payment_type()->pluck('id');

        $users = User::get()->pluck('full_name', 'id');
        $user = $reservation->user()->pluck('id');

        $courses = Course::pluck('name', 'id');
        $course = $reservation->course()->pluck('id');

        return view('admin.reservation.edit', compact('reservation', 'payment_type', 'payment_types', 'course', 'courses', 'user', 'users'));
    }

    public function update($id, ReservationRequest $request)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->update($request->all());


        $reservation->payment_type()->associate(PaymentType::findOrFail($request->input('payment_type')));
        $reservation->save();


        \Session::flash('success_message', 'Заявка "' . $reservation->name . '" успешно обновлена');
        return redirect('admin/reservation/'.$id.'/edit');
    }

    public function create()
    {
        $payment_types = PaymentType::pluck('name', 'id');
        $payment_type = null;

        $users = User::get()->pluck('full_name', 'id');
        $user = null;

        $courses = Course::pluck('name', 'id');
        $course = null;

        return view('admin.reservation.create', compact('reservation', 'payment_type', 'payment_types', 'course', 'courses', 'user', 'users'));
    }

    public function store(ReservationRequest $request)
    {
        $reservation = new Reservation($request->all());
        $reservation->save();

        \Session::flash('success_message', 'Заявка "' . $reservation->name. '" успешно добавлена');
        return redirect('admin/reservation');
    }

    public function getReservations(Request $request)
    {

        $query = Reservation::query()->select('reservations.*');

        $query->join('courses', 'reservations.course_id', '=', 'courses.id');
        $query->join('users', 'reservations.user_id', '=', 'users.id');
        $query->join('payment_types', 'reservations.payment_type_id', '=', 'payment_types.id');



        //Сортировка
        if (request()->has('sort')) {
            // Мультисортировка
            $sorts = explode(',', request()->sort);
            foreach ($sorts as $sort) {
                if($sort){
                    list($sortCol, $sortDir) = explode('|', $sort);

                    //Костыль для поиска по полному имени
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
            $query = $query->orderBy('reservations.id', 'asc');
        }

        //Поиск
        if ($request->exists('search')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->search}%";
                $q->where('courses.name', 'ilike', $value)
                  ->orWhere('users.first_name', 'ilike', $value)
                  ->orWhere('users.last_name', 'ilike', $value)
                  ->orWhere('users.middle_name', 'ilike', $value)
                  ->orWhere('users.phone', 'ilike', $value)
                  ->orWhere('payment_types.name', 'ilike', $value);


                if (is_numeric($request->search))
                {
                    if(intval($request->search)){
                        $q->orWhere('reservations.id', intval($request->search));
                    }
                    $q->orWhere('reservations.cost', $request->search);
                }
            });
        }

        //Фильтр
        if ($request->exists('filter')) {

            $filters = explode(',', request()->filter);
            foreach ($filters as $filter) {
                if($filter){
                    list($filterBy, $filterValue) = explode('|', $filter);
                    if($filterBy == 'reservations.status' or $filterBy == 'reservations.payment_status'){
                        $query->where($filterBy, '=', $filterValue);
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
}
