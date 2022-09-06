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
            'username'=>'required|unique:users,username',
            'password'=>'required',
            'email'=>'required|email|unique:users,email'
        ]);

        // $attributes['password']=bcrypt($attributes['password']);

        $user=User::create($attributes);
        auth()->login($user);

        // session()->flash('success','Your account has been createed successfully');

        return redirect('/')->with('success','your account has been created successfully');
    }
}
