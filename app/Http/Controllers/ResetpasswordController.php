<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
class ResetpasswordController extends Controller
{
    //forget form show krna
    public function showForgetForm(){
        return view('forgetPassword');
    }

    // email send to rest link
    public function checkEmail(Request $request){
        $request->validate(['email'=>'required|email']);

        $user = User::where('email',$request->email)->first();

        if(!$user){
            return back()->with('error','This email is not registered.');

        }
        return redirect()->route('password.resetForm',['email'=>$user->email]);
        
    }



    // Reset Password form

    public function resetPassword($email)
    {   
        
        return view('resetpassword',compact('email'));
    }
//update paswd
    public function updatePassword(Request $request) 
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|confirmed'
        ]);
        $user = User::where('email',$request->email)->first();

        if(!$user){
            return back()->with('error','Email not found.');
        }
        $user->password= Hash::make($request->password);
        $user->save();

        return redirect('/login')->with('success','Password updated successfully.');
    }
}
