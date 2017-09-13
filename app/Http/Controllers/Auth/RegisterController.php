<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Verification;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

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
        // dd($request);
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
                        ?: response()->json($user, 200);
    }

    //Отправка кода и письма после регистрации
    protected function registered(Request $request, $user)
    {
//        return Response::json($user);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $attributeNames = array(
            'first_name' => 'Фамилия',
            'cat' => 'Category',
        );

        $validator = Validator::make($data, [
            'first_name' => 'required|string|min:2|max:255',
            'last_name' => 'required|string|min:2|max:255',
            'email' => 'string|max:255|email',
            'phone' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $validator->setAttributeNames($attributeNames);

        return $validator;

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
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'is_verification' => false,
            'password' => bcrypt($data['password']),
        ]);

        //Роль - пользователь
        $user->role()->associate(Role::firstOrCreate(['name' => 'user', 'name_ru' => 'Пользователь']));

        //Создаем верификацию
        $user->verification()->associate(Verification::create());

        $user->save();

        return $user;
    }

}
