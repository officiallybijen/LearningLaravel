<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        return view('user.login');
    }

    public function store(){
        $attributes = request()->validate([
            'username'=>"required",
            'password'=>"required"
        ]);

        if(auth()->attempt($attributes)){
            return redirect('/')->with('success','logged in');
        }

        return back()->withErrors(['email'=>'email not found']);

    }

    public function destroy(){
        auth()->logout();
        return redirect('/');
    }
}
