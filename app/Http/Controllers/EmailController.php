<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\Template; 

class EmailController extends Controller
{
    // page show karna
    public function index()
    {
        // database se templates nikalna
        $templates = Template::all();

        return view('email.Mailreply', compact('templates'));
    }

    // email send karna
    public function send(Request $request)
    {
        $request->validate([
            'recipient' => 'required|email',
            'subject'   => 'required|string',
            'content'   => 'required|string',
        ]);

        Mail::html('
        <div style="font-family: Arial, sans-serif; color: #333; line-height: 1.6; max-width: 600px; margin: auto; border:1px solid #ddd; padding: 20px; border-radius: 8px;">
        
        <!-- Header -->
        <div style="text-align:center; background-color:#1a73e8; color:white; padding:10px 0; border-radius:6px 6px 0 0;">
            <h2 style="margin:0;">'.$request->subject.'</h2>
        </div>

        <!-- Content -->
        <div style="padding:15px 0;">
            <p>'.$request->content.'</p>
        </div>

        <!-- Footer -->
        <div style="text-align:center; font-size:12px; color:#888; border-top:1px solid #ddd; padding-top:10px;">
            &copy; 2025 Applivity. All rights reserved.
.
        </div>

    </div>',function ($message) use ($request) {
            $message->to($request->recipient)
                    ->subject($request->subject);
        });

        return back()->with('success', 'Email sent successfully!');
    }
}
