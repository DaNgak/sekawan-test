<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login.index", [
            "title" => "Login",
        ]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            "username" => "required",
            "password" => "required"
        ]);
        if (Auth::attempt($credentials)) {

            if(!in_array(Auth::user()->role, ["admin", "boss"])){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with("loginError", "Login Failed!");
            };
            $request->session()->regenerate();
            return redirect()->intended("/dashboard");
        }
        return back()->with("loginError", "Login Failed!");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/login");
    }
}
