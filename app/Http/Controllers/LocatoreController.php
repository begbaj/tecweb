<?php

namespace App\Http\Controllers;

use App\Models\Resources\Alloggio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocatoreController extends Controller
{
    public function __construct() {
        // Log::debug('CONTROLLER_CALL: LocatoreController called');
        $this->middleware('can:isLocatore');
    }

    public function index() {
        $accoms = Alloggio::where('id_locatore', Auth::user()->id);
        return view('locatore')->with('accoms', $accoms);
    }

    public function newaccom() {
        return view('locatore.make_alloggio');
    }
    
    public function profileLocatore(){
       return view('user.profileInfo');
    }

}
