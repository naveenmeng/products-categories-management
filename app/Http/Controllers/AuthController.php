<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    function loginPost(Request $request)
    {

        // Validate the incoming request
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6",
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to the desired page after successful login
            return redirect(route('category.index'))->with("success", "Logged in successfully");
        }

        // Redirect back with an error message if authentication fails
        return back()->with("error", "Invalid email or password.");
    }



    public function register()
    {
        return view("auth.register");
    }
    function registerPost(Request $request)
    {
        $request->validate([
            "fullname" => "required",
            "email"=>"required",
            "password"=> "required",
        ]);

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make(value: $request->password);

        if($user->save()){
            return redirect(route('login'))->with("success","user created successfully");
        }
        return redirect(route('register'))->with("error","failed to register");
    }
}
