<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'min:1' ,'max:30'],
            'lastname' => ['required', 'string', 'min:1' ,'max:30'],
            'birthday' => ['required', 'date_format:d/m/Y'],
            'gender' => ['required', 'string', 'min:1', 'max:10'],
            'username' => ['required', 'string','min:5', 'max:30','unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:128', 'confirmed'],
            'role' => ['required', 'string'],
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
        $data['birthday'] = date("Y-m-d",strtotime(str_replace('/', '-',$data['birthday'])));
        return User::create([
            'nome' => $data['firstname'],
            'cognome' => $data['lastname'],
            'data_nascita' => $data['birthday'],
            'genere' => $data['gender'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'ruolo' => $data['role'],            
        ]);
    }
}
