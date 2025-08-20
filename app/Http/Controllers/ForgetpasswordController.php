<?php

namespace App\Http\Controllers;

use App\Mail\ResetCodeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgetpasswordController extends Controller
{
    // frg form show krwan
    public function showForgetForm(){
        return view('forget-password');
    }

    // Otp bhjna email pr

    public function sendResetCode(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email'
        ]);

        $otp =rand(10000,99999);

        session([
            'reset_email' =>$request->email,
            'reset_otp'=>$otp,
            'reset_otp_expire_time' => now()->addSeconds(60)
        ]);

        // email send krna

        Mail::to($request->email)->queue(new ResetCodeMail($otp));

        return redirect()->route('reset.form')->with('success','reset code send to your email.');
    }
    public function showCodeForm(){

        $expireTime =session('reset_otp_expire_time');
        $remainingSeconds = 0;

        if($expireTime){
            $remainingSeconds=now()->diffInSeconds($expireTime, false);
            if($remainingSeconds<0){
                $remainingSeconds = 0; // paly sy hi expire ho to
            }
        }
        return view('entercode',compact('remainingSeconds'));
    }

    public function verifyCode(Request $request){
        $request->validate([
            'code'=>'required|numeric'
        ]);

        if (now()->gt(session('reset_otp_expire_time'))){
            return back()->with('error','Code expore, Please resend again.');
        }

        if($request->code == session('reset_otp')){
            return redirect()->route('password.resetForm',['email'=>session('reset_email')])->
            with('success','Code Verified,you can reset your password.');

        }else{
            return back()->with('error','invalid code.');
        }
    }

    public function resendCode(){
        // register email
        $email =session('reset_email');
        if(!$email){
            return redirect()->route('forget.form')->with('error','session expired, please resend again.');
        }
            // new otp
            $otp=rand(10000,99999);

            // session ma new otp or time add krna 
            session([
                'reset_email' => $email,
                'reset_otp'=>$otp,
                'reset_otp_expire_time'=>now()->addSeconds(60)

            ]);

            // mail send
            Mail::to($email)->queue(new ResetCodeMail($otp));
            return redirect()->route('reset.form')->with('success','New code has been sent.');
    }
}
