<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    public function showDetails(){

        $user = Auth::user();
        return view('site.cabinet.details', compact('user'));
    }

    public function updateDetails(UserRequest $request){

        $user = Auth::user();

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->middle_name = $request->middle_name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

    public function updatePassword(Request $request){



        $user = Auth::user();

        if($user->password == bcrypt($request->password)){
            $user->password = $request->new_password;
            $user->save();
        }
        else{

        }

        return $user;
    }

    public function showPayments(){
        return view('site.cabinet.payments');
    }

    public function showReservations(){
        return view('site.cabinet.reservations');
    }
}
