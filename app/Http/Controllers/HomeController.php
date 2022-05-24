<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Accomodations;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (\Illuminate\Support\Facades\Auth::check()){
            $role = auth()->user()->ruolo;
            switch ($role) {
                case 'admin': return redirect()->route('admin');
                    break;
                case 'locatore': return redirect()->route('locatore');
                    break;
                case 'locatario':return redirect()->route('locatario');
            default: return view('homepage');};
        }else{
            return view('homepage');
        }
    }
}
