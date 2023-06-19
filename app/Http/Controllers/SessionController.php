<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions/create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email'=>['required', 'email'],
            'password'=> ['required']
        ]);

        // Wait authenticate and log in the user
        if (auth()->attempt($attributes)) {
        // redirect with success flash message
            return redirect('/')->with('success', 'Welcome back!');
        }
        // auth failed
        throw ValidationException::withMessages([
            'email'=> 'Your provided credentials could not be verify'
        ]);
        // OR
//        return back()
//            ->withInput()
//            ->withErrors(['email'=> 'Your provided credentials could not be verify']);
    }
    public function destroy()
    {
        auth()->logout();

//        session()->flash('success', 'Goodbye!');

        return redirect('/')->with('success', 'Goodbye!');
    }
}
