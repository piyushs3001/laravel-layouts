<?php

namespace Piyush\LaravelLayouts\Http\Controllers\Admin;

use Piyush\LaravelLayouts\Http\Controllers\Controller;
use Piyush\LaravelLayouts\Http\Requests\Admin\AdminAuthRequest;

class AuthController extends Controller
{
    public function getLoginForm()
    {
        if (auth()->guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            return view('admin.auth.login');
        }
    }

    public function login(AdminAuthRequest $request)
    {
        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->guard('admin')->user();
            $user->createToken($user->name)->plainTextToken;
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withInput()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function logout()
    {
        $adminLogout = auth()->guard('admin')->user();
        $adminLogout->tokens()->delete();
        Auth::guard('admin')->logout();
        // Session::flush();
        return redirect()->route('admin.login.form');
    }
}