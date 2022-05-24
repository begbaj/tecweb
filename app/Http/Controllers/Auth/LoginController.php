<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Log;

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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';
    
    protected function redirectTo(){
        $role = auth()->user()->ruolo;
        Log::debug("Role: " . $role);
        switch ($role) {
            case 'admin': return '/admin';
                break;
            case 'locatore': return '/locatore';
                break;
            case 'locatario':return '/locatario';
        default: return '/';};
    }
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function username()
    {
        return 'username';
    }
    
    public function __construct()
    {
        Log::debug('CONTROLLER_CALL: LoginController called');
        $this->middleware('guest')->except('logout');
    }
}
