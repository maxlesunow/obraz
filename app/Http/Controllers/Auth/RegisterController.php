<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Verification;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('site.auth.register');
    }

    //Регистрация
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

    //Отправка кода и письма после регистрации
    protected function registered(Request $request, $user)
    {
        return view('site.auth.verification', compact('user'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        $user = new User([
            'first_name' => 'first_name',
            'last_name' => 'last_name',
            'middle_name' => 'middle_name',
            'phone' => $data['phone'],
            'email' => 'email',
            'is_verification' => false,
            'password' => bcrypt($data['password']),
        ]);

        //Роль - пользователь
        $user->role()->associate(Role::firstOrCreate(['name' => 'user']));
        //Создаем верификацию
        $user->verification()->associate($this->createVerification());

        $user->save();

        return $user;
    }

    protected function createVerification(){
        return Verification::create([
            'code' => $this->generateCode(),
            'wrong_pass' => 0,
            "date_expire" => Carbon::now()->addMinute(5),
        ]);
    }

    protected function generateCode(){
        $code ='';
        for ($i = 0; $i < 4; $i++) {
            $code .= rand(0, 9);
        }
        return $code;
    }
}
