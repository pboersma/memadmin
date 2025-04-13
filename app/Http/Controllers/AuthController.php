<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use App\Services\AuthService;
use App\Repositories\UserRepository;

class AuthController
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $success = $this->authService->attemptLogin(
            $credentials['email'],
            $credentials['password'],
            $request->session()->getId(),
            $request->ip(),
            $request->header('User-Agent')
        );

        if ($success) {
            return redirect()
                ->route('families.index')
                ->withCookie(cookie('last_login', now(), 60 * 24 * 30));
        }

        return back()
            ->withErrors(['login' => 'Ongeldige inloggegevens.']);
    }

    public function logout()
    {
        session()->flush();

        return redirect()
            ->route('login')
            ->withCookie(Cookie::forget('last_login'));
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $hashedPassword = Hash::make($validated['password']);

        $this->authService->register(
            $validated['name'],
            $validated['email'],
            $hashedPassword
        );

        return redirect()
            ->route('login')
            ->with('success', 'Account aangemaakt!');
    }
}
