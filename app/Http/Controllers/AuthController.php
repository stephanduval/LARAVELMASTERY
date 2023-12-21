<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DB;
use Hash;
use Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where("email", $request->email)->first();
            //  Generates a new token for the client on login
            shell_exec("php ../artisan passport:install");

            $sucessToken = $user->createToken("task_mis_token")->accessToken;
            session()->put("token", $sucessToken);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            "email" => "The provided credentials do not match our records."
        ]);
    }

    public function logout(Request $request)
    {
        // $request->session()->invalidate();
        // $request->session()->regenerateToken();
        // session()->forget("token");

        // return redirect()->route('login');
    }

}
