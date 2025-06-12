<?php

namespace App\Services;

use App\Repositories\UserRepository;
use App\Services\RoleService;
use Illuminate\Support\Facades\Session;

class AuthService
{
    protected UserRepository $userRepository;

    protected RoleService $roleService;

    public function __construct(UserRepository $userRepository, RoleService $roleService)
    {
        $this->userRepository = $userRepository;
        $this->roleService = $roleService;
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
        Session::put('roles', $this->roleService->getRolesForUser($user['id']));

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
