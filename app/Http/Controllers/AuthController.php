<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController
{
    protected AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Display the the login view.
     *
     * @return View
     */
    public function showLogin(): View
    {
        return view('auth.login');
    }

    /**
     * Handle a login request using the provided email and password credentials.
     *
     * @param Request $request The incoming HTTP request containing login credentials.
     *
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
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
            return redirect()->route('families.index')->withCookie(cookie('last_login', now(), 60 * 24 * 30));
        }

        return back()->withErrors(['login' => 'Ongeldige inloggegevens.']);
    }

    /**
     * Log the user out by flushing the session and removing the last login cookie.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        session()->flush();

        return redirect()->route('login')->withCookie(Cookie::forget('last_login'));
    }

    /**
     * Display the user registration form view.
     *
     * @return View
     */
    public function showRegister(): View
    {
        return view('auth.register');
    }

    /**
     * Handle a user registration request.
     *
     * @param Request $request The incoming HTTP request with registration data.
     *
     * @return RedirectResponse
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $hashedPassword = Hash::make($request['password']);

        $this->authService->register(
            $request->input('name'),
            $request->input('email'),
            $hashedPassword
        );

        return redirect()->route('login')->with('success', 'Account aangemaakt!');
    }
}
