<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Resources\Alloggio;
use App\Models\Catalog;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    
    public function __construct() {
        $this->middleware('can:isUser');
    }

    public function myProfile(){
       return view('user.profileInfo');
    }
    
    public function strangerProfile($idProfile){
        $user = User::where('id', $idProfile)->get();
        return view('user.profileInfo')->with('user', $user->first());
    }

    public function accomDetails($accomId){
        $catalog = new Catalog;
	$alloggio = Alloggio::where('id', $accomId)->get();
	$servizi = $catalog->getServiziAlloggio($accomId);     
        return view('details')->with('alloggio', $alloggio->first())->with('servizi', $servizi);
    }
    
    public function editProfile(Request $request){
        $user = User::find($request->id);

        $v = Validator::make($request->all(), [
            'nome' => 'sometimes|string|min:1|max:30',
            'cognome' => 'sometimes|string|min:1|max:30',
            'data_nascita' => 'sometimes|date_format:d/m/Y',
            'genere' => 'sometimes|string|min:1|max:10',
            'username' => 'sometimes|string|min:5|max:30',
        ]);
        $v->sometimes('password', 'required|min:8|max:128|confirmed', function ($request){
            return $request->password != '';
        });
        
        
        
        if ($user != null){
            $data = $v->validated();
            $data['data_nascita'] = date("Y-m-d",strtotime(str_replace('/', '-',$request->data_nascita)));
            if (!empty($data['password']))
                $data['password'] = Hash::make($request->password);
            $user->update($data);
            return back();
        }
        else{
            return view('errors.404');
        }
    }
}
