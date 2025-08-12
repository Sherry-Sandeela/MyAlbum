<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Photo;

class PhotoController extends Controller
{
    //photo show krny ky lia
    public function show($id){
        $photo=Photo::findOrFail($id);
        return view('photo-view',compact('photo'));
    }

    public function destory($id)
    {
        $photo= Photo::findOrFail($id);
        
        Storage::delete('public/' .$photo->image_path);

        $photo->delete();

        return redirect()->route('dashboard')->with('success','Photo deleted successfully!');
    }
}
