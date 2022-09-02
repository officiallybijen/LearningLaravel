<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('user.register');
    }

    public function store(){
        $attributes = request()->validate([
            'name'=>'required',
            'username'=>'required',
            'password'=>'required',
            'email'=>'required|email',
        ]);

        // $attributes['password']=bcrypt($attributes['password']);

        User::create($attributes);

        return redirect('/');
    }
}
