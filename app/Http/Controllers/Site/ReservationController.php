<?php

namespace App\Http\Controllers\Site;

use App\Course;
use App\Http\Requests\SiteReservationRequest;
use App\PaymentType;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request, $id)
    {
        $course = Course::findorfail($id);

        if($user = Auth::user()){

            $validator = Validator::make($request->all(), [
                'payment_type_id' => 'required|numeric',
                'comment' => 'nullable|text',
            ]);
            $validator->validate();

            $payment_type = PaymentType::findorfail($request->payment_type_id);

            $reservation = Reservation::new($course, $user, $payment_type, $request->comment);
            $reservation ->save();

            //Отправить уведомление о новой заявке пользователю и админу

            return response()->json($reservation, 200);
        }
        else{

            $validator = Validator::make($request->all(), [

                'first_name' => 'required|string|min:2|max:255',
                'last_name' => 'required|string|min:2|max:255',
                'middle_name' => 'nullable|string|min:2|max:255',
                'email' => 'string|max:255|email',
                'phone' => 'required|regex:/(7)[0-9]{10}/',
                'payment_type_id' => 'required|numeric',
                'comment' => 'nullable|text',
            ]);
            $validator->validate();

            //Проверяем является ли гость клиентом
            $user = User::where('phone', $request->phone)->first();

            if($user) {

                $payment_type = PaymentType::findorfail($request->payment_type_id);

//                $user->first_name = $request->first_name;
//                $user->last_name = $request->last_name;
//                $user->middle_name = $request->middle_name;
//                $user->email = $request->email;

                $reservation = Reservation::new($course, $user, $payment_type, $request->comment);
                $reservation ->save();

                //Отправить уведомление о новой заявке пользователю и админу

                return response()->json($reservation, 200);
            }
            //Регистрируем пользователя и отсылаем смс код
            else{

                return response()->json("пока не работает для не клиентов", 200);

            }
        }
    }

    public function getPaymentTypes()
    {

        $payment_types = PaymentType::select('id', 'name', 'is_online')->get();

        return response()->json($payment_types, 200);
    }
}
