<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index_login()
    {
        return view('auth.login');
    }

    public function action_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/login')
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            $role = Auth::user()->role;

            if ($role === 'gudang') {
                return redirect('/admin/dashboard');
            } elseif ($role === 'dapur') {
                return redirect('/client/home');
            }

            return redirect('/');
        }

        return back()->withErrors(['email' => 'Login gagal: email/password salah'])->withInput();
    }

    public function action_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
