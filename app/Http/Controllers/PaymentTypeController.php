<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\PaymentTypeRequest;

use App\PaymentType;

class PaymentTypeController extends Controller
{
    //

    public function index()
    {

        return view('admin.payment_type.index', compact('payment_types'));
    }

    public function edit($id)
    {
        $payment_type = PaymentType::findOrFail($id);
        return view('admin.payment_type.edit', compact('payment_type'));
    }

    public function update($id, PaymentTypeRequest $request)
    {
        $payment_type = PaymentType::findOrFail($id);

        $payment_type->update($request->all());


        \Session::flash('success_message', 'Тип оплаты "' . $payment_type->name . '" успешно обновлен');
        return redirect('admin/payment/type/'.$id.'/edit');
    }

    public function create()
    {

        return view('admin.payment_type.create', compact('speaker'));
    }

    public function store(PaymentTypeRequest $request)
    {
        $payment_type = new PaymentType($request->all());
        $payment_type->save();

        \Session::flash('success_message', 'Тип оплаты "' . $payment_type->name. '" успешно добавлен');
        return redirect('admin/payment/type');
    }

    public function getPaymentTypes(Request $request)
    {

        $query = PaymentType::query();

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
                $q->where('name', 'ilike', $value);
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

        $payment_types = PaymentType::find(explode(',', $ids));

        if(count($payment_types) == 0) {

            $errors = new MessageBag();

            // add your error messages:
            $errors->add('error', 'Курсы не найдены. Возможно вы удалили их ранее');

            return response()->json($errors, 422);
        }

        PaymentType::destroy(explode(',', $ids));

        return  response()->json($payment_types);
    }
}
