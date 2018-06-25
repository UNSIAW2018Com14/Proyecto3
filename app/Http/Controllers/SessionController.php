<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class SessionController extends Controller
{
    public function __construct () {
        $this->middleware('guest', ['except' =>'destroy']);
    }

    public function create() {
        return view('login');
    }

        public function store () {

            $email = request('email');
            $user = User::where('email',$email)->first();
            if($user == null){
                return redirect('/login')->withErrors([
                    'Login' => 'Las datos ingresados no coinciden con una cuenta o no tenes permiso para ingresar.'
                ]);
            }
            else{
                if($user->admin == true){
                    if(auth()->attempt(request(['email', 'password']))){
                        return redirect()->home();
                    }
                }
            }
            
            return redirect('/login')->withErrors([
                    'Login' => 'Las datos ingresados no coinciden con una cuenta o no tenes permiso para ingresar.'
                ]);
            
        }
        

    public function destroy(){
        auth()-> logout();
        return redirect()->home();
    }
}

