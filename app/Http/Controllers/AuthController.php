<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Session;

class AuthController extends Controller {
    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if(Auth::attempt($credentials)) {
            /*
The $request->session()->regenerate(); line is a part of Laravel's session handling.

The regenerate method will regenerate the session ID. This is typically done when a user logs in to your application to prevent session fixation attacks.
            */
            $request->session()->regenerate();
            $user = User::where('email', $request->email)->first();
            // Generate a passport token
            shell_exec('php artisan passport:install');
            $successToken = $user->createToken('task_mis_token')->accessToken;
            session()->put('token', $successToken);
            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);

    }


}
