<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

use App\Http\Requests\PaymentRequest;

use App\Payment;

class PaymentController extends Controller
{
    //

    public function index()
    {

        return view('admin.payment.index', compact('payments'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        $reservations = Reservation::get()->where('status', '=', false)->pluck('name', 'id');
        $reservation = $payment->reservation()->pluck('id');

        return view('admin.payment.edit', compact('payment', 'reservation', 'reservations'));
    }

    public function update($id, PaymentRequest $request)
    {
        $payment = Payment::findOrFail($id);

        $payment->update($request->all());

        $payment->reservation()->associate(Reservation::findOrFail($request->input('reservation')));
        $payment->save();


        \Session::flash('success_message', 'Оплата "' . $payment->number_document . '" успешно обновлена');
        return redirect('admin/payment/'.$id.'/edit');
    }

    public function create()
    {
        $reservations =  Reservation::get()->where('status', '=', false)->pluck('name', 'id');
        $reservation = null;

        return view('admin.payment.create', compact('reservations', 'reservation'));
    }

    public function store(PaymentRequest $request)
    {
        $payment = new Payment($request->all());

        $payment->reservation()->associate(Reservation::findOrFail($request->input('reservation')));
        $payment->save();

        \Session::flash('success_message', 'Оплата "' . $payment->number_document. '" успешно добавлена');
        return redirect('admin/payment');
    }

    public function getPayments(Request $request)
    {

        $query = Payment::query();

        //Сортировка
        if (request()->has('sort')) {
            // Мультисортировка
            $sorts = explode(',', request()->sort);
            foreach ($sorts as $sort) {
                if($sort){
                    list($sortCol, $sortDir) = explode('|', $sort);
                    $query = $query->orderBy($sortCol, $sortDir);
                }
            }
        } else {
            $query = $query->orderBy('id', 'asc');
        }

        //Фильтрация
        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('number_document', 'ilike', $value)
                    ->where('total', 'ilike', $value);
            });
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

    public function destroy($ids){

        $payments = Payment::find(explode(',', $ids));

        if(count($payments) == 0) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('error', 'Курсы не найдены. Возможно вы удалили их ранее');

            return response()->json($errors, 422);
        }

        Payment::destroy(explode(',', $ids));

        return  response()->json($payments);
    }
}
