<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dologin(Request $request)
    {
        $rememberme = request('rememberme') === 1;

        if (
            auth()
                ->guard('admin')
                ->attempt([
                    'email' => request('email'),
                    'password' => request('password')
                ], $rememberme)
        ) {
            return redirect(url('/dashboard/home'));
        }
        return back();
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('dashboard.login');
    }
}
