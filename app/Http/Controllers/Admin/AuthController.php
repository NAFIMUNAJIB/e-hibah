<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data = [];
        $data['page_title'] = 'Login';

        return view('admin.pages.login',$data);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials,
        [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak ditemukan',
            'password.required' => 'Password harus diisi',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (!Auth::attempt($credentials)) {
            return redirect()->back()
            ->with('message', 'Invalid email or password')
            ->withInput();
        }

        return redirect()->route('admin.dashboard')->with('success', 'Berhasil login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
