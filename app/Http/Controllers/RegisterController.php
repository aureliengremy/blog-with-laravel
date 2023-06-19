<?php

namespace App\Http\Controllers;

use App\Models\User;
//use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register/create');
    }

    public function store()
    {
        // create the user
        //check you request :
//        return request()->all();
        // //#1 validate rules
        $attributes = request()->validate([
            'username'=> ['required', 'max:15', Rule::unique('users', 'username')],
            'name'=> ['required', 'max:25'],
            'email'=> ['required','email', 'max:60', Rule::unique('users', 'email')],
            'password'=> ['required', 'min:6', 'max:20'],
        ]);

       $user = User::create($attributes);

       auth()->login($user);

       session()->flash('success', 'Your account has been created.');

       return redirect('/');
    }
}
