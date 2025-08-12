<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class DashboardController extends Controller
{

    public function index()
    {
        //jo login hy osi ki pic fetch kro

        $photos = Photo::where('user_id', session('user_id'))->get();
        return view('dashboard', compact('photos'));
    }

    public function upload(Request $request)
    {

        // Login check
        $userId = session('user_id');

        if (!$userId) {
            return redirect('/login')->with('error', 'Please login first!');
        }
        $request->validate([
            'image' => 'required| image|mimes:jpeg,png,jpg,gif|max:2048',
            'photo_title' => 'nullable|string|max:255'
        ]);


        // file ko store krna
        $path = $request->file('image')->store('upload', 'public');

        Photo::create([
            'user_id' => $userId,
            'image_path' => $path,
            'photo_title' =>$request->photo_title,
        ]);

        return redirect()->route('dashboard')->with('success', "Image uploaded successfully");

    }
}
