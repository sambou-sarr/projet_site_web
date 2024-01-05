<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\loginrequest;
class AuthController extends Controller
{
    public function login(){
     

        return view ('/auth.login');
    }
    public function dologin(loginrequest $request){


        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
           
            return redirect()->intended(route('home'));
        }else{

            return to_route('auth.login')->withErrors([
                'email' => "erreur ! sur les information saisis"
            ])->onlyInput('email');
        }
        


    }
    public  function logout(){

        Auth::logout();
        return to_route('auth.login');

    }
    public function inscription( Request $request){
        $user = new User();
        $user->name = $request -> nom;
        $user->password= $request -> password;
        $user->email = $request -> email;
        $user->save();
         return to_route('auth.login')->onlyInput('email');
    }
}
