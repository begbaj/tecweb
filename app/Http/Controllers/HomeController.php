<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Resources\Alloggio;
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
                case 'locatario': return redirect()->route('locatario');
                default:
                    $accomodations = new Alloggio;
                    return view('homepage')->with("accomodations", $accomodations->getAlloggiByDate(5));
            }
        }else{
            $accomodations = new Alloggio;
            return view('homepage')->with("accomodations", $accomodations->getAlloggiByDate(5));
        }
    }
}
