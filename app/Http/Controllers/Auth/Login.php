<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Login extends Controller
{
    public function form()
    {
        return view('Auth.login', [
            'title' => 'Login | Admin'
        ]);
    }

    public function process(Request $request)
    {
        $data = $request->validate(
            [
                'auth' => 'required',
                'password' => 'required'
            ]
        );

        Auth::logoutOtherDevices($request->only('password'));

        if (filter_var($request->auth, FILTER_VALIDATE_EMAIL)) {
            if (Auth::attempt($request->only(['auth', 'password']), true)) {
                Session::flush();
                $request->session()->regenerate();
                return redirect()->intended(route('Admin_index'));
            } else {
                return redirect()->back()->withInput()->with('error', 'Invalid Credential');
            }
        } else {
            if (Auth::attempt(['username' => $request->auth, 'password' => $request->password], true)) {
                Session::flush();
                $request->session()->regenerate();
                return redirect()->intended(route('Admin_index'));
            } else {
                return redirect()->back()->withInput()->with('error', 'Invalid Credential');
            }
        }
    }
}