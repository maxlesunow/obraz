<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Verification;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Notifications\VerificationCode;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'phone';
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        //Если пользователь не активирован то выводим соотвествующую ошибку
        $username = $request->get($this->username());
        $user = User::where($this->username(), $username)->first();

        if($user){

            if ($user->is_verification == false) {

                $verification = Verification::where('user_id', $user->id)
                    ->where('type', 'registration')->first();

                if ($verification) {

                    $verification->reGenerateCode();
                    $verification->date_send = Carbon::now();

                    $verification->save();

                    //Отправляем пользователю код верификации
                    $user->notify(new VerificationCode($verification));
                }
                else {

                    //Создаем верификацию
                    $verification = new Verification('registration');
                    $verification->user()->associate($user);
                    $verification->save();

                    //Отправляем пользователю код верификации
                    $user->notify(new VerificationCode($verification));

                    $verification->date_send = Carbon::now();
                    $verification->save();
                }

                return response()->json($user);
            }
        }


        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|regex:/(7)[0-9]{10}/',
            'password' => 'required|string',
        ]);
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');

        $credentials['is_verification'] = 1;

        return $credentials;
    }


    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        return response()->json($this->guard()->user(), 200);
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        if ($request->ajax()) {
            return response()->json("OK", 200);
        } else {
            return redirect('/');
        }
    }


}
