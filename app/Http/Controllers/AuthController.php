<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function logout(Request $request)
    {       
        // y request krta hy username ko forget krny ky lia
        $request->session()->flush();
        // security ky lia token regenerate krny ky lia
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
