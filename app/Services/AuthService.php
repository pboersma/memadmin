<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Session;

class AuthService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function attemptLogin(
        string $email,
        string $password,
        string $sessionId,
        string $ip,
        string $userAgent,
    ): bool {
        $user = $this->userRepository->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        // Regenerate session to prevent fixation
        Session::regenerate();

        // Set session variables
        Session::put('user_id', $user['id']);
        Session::put('email', $user['email']);
        Session::put('name', $user['name']);

        $payload = json_encode(['_token' => csrf_token()]);
        $lastActivity = time();

        $this->userRepository->storeSession(
            $sessionId,
            $user['id'],
            $ip,
            $userAgent,
            $payload,
            $lastActivity
        );

        return true;
    }

    public function register(string $name, string $email, string $password): void
    {
        $this->userRepository->create([$name, $email, $password]);
    }
}
