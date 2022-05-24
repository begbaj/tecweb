<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Accomodations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        Log::debug('CONTROLLER_CALL: HomeController called');
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
                    $accomodations = new Accomodations;
                    return view('homepage')->with("accomodations", $accomodations->getAccomodations());
            }
        }else{
            $accomodations = new Accomodations;
            return view('homepage')->with("accomodations", $accomodations->getAccomodations());
        }
    }
}
