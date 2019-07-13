<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login()
    {
        if (auth()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function showLinkRequestForm()
    {
        if (auth()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.email');
    }

    public function showResetForm(Request $request, $token = null)
    {
        if (auth()->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
