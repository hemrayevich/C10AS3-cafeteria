<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            if (Auth::user()->isStaff()) {
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Hoş geldiňiz!');
            }

            return redirect()->intended(route('client.home.index'))
                ->with('success', 'Hoş geldiňiz!');
        }

        return back()->withErrors([
            'email' => 'E-poçta ýa-da açarsöz nädogry.',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'nullable|string|max:30',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => $request->password,
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect()->route('client.home.index')
            ->with('success', 'Hasabyňyz döredildi!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.home.index');
    }
}
