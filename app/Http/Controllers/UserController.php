<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    public function register(Request $request)
    {
        
        //validation krna
        $request->validate([
            'name' => 'required',
            'email' => 'required| email| unique:users',
            'password' => 'required|min:6 |confirmed',
        ]);
        // save krny ky 
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        // $user->save();

        if ($user->save()) {
            return redirect('/login')->with('success', 'Registered successfully!');
        } else {
            return back()->with('error', 'Failed to register!');
        }

    }
    public function showRegistrationForm()
    {
        return view('registration');
    }


    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        //validation comming data
        if (empty($request->email) || empty($request->password)) {
        return back()->with('error', 'Email and password are required');
    }

        //user same email sy find
        $user = User::where('email', $request->email)->first();
        //mail and password correct
        if ($user && Hash::check($request->password, $user->password)) {
            // login ho jy 
            // Store values
            session(['user_id' => $user->id]);
            session(['user_name' => $user->name]);

            // replace login to dashboard
            return redirect('/dashboard')->with('success', 'Logged in successfully!');
        } else {
            // failed login
            return back()->with('error', 'Invalid email or password');
        }
    }
}
