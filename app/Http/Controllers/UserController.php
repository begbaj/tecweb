<?php

namespace App\Http\Controllers;

use App\Models\Resources\Alloggio;
use App\Models\Catalog;

class UserController extends Controller
{
    
    public function __construct() {
        $this->middleware('can:isUser');
    }

    public function profile(){
       return view('user.profileInfo');
    }

    public function accomDetails($accomId){
        $catalog = new Catalog;
	$alloggio = Alloggio::where('id', $accomId)->get();
	$servizi = $catalog->getServiziAlloggio($accomId);     
        return view('details')->with('alloggio', $alloggio->first())->with('servizi', $servizi);
    }
}
