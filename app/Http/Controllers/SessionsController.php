<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException as ValidationValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        session()->regenerate();
        if (auth()->attempt($attributes)) {
            return redirect('/')->with('success', 'Welcome Back!');
        }

        #auth failed

        throw ValidationValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified.'
        ]);
    }
}
