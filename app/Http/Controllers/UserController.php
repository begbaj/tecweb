<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Resources\Alloggio;
use App\Models\Catalog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
    
    public function editProfile(UpdateUserRequest $request, $id){
        
        $user = User::findOrFail($id);
        $request->validate();
        $user->update($request->all());
        
        /*
        $request->validate([
            'nome' => ['nullable', 'string', 'min:1', 'max:30'],
            'cognome' => ['nullable', 'string', 'min:1' ,'max:30'],
            'username' => ['nullable', 'string','min:5', 'max:30','unique:users'],
            'password' => ['nullable', 'string', 'min:8', 'max:128', 'confirmed'],
        ]);
        User::where('id',$id)->update(['nome'=>$request->nome, 
                                       'cognome'=>$request->cognome,
                                       'username'=>$request->username, 
                                       'password'=>Hash::make($request->password)]);*/
        return redirect()->route('profile.me');
    }
}
