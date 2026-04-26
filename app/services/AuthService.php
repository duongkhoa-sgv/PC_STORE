<?php

require_once __DIR__ . '/../models/User.php';

class AuthService {

    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login($email, $password) {

        $user = $this->userModel->findByEmail($email);

        if (!$user) {
            return [
                'success' => false,
                'message' => 'User not found'
            ];
        }

        // demo: chấp nhận password = 123456
        if ($password !== "123456") {
            return [
                'success' => false,
                'message' => 'Wrong password'
            ];
        }

        $_SESSION['user'] = $user;

        return [
            'success' => true,
            'user' => $user
        ];
    }

    public function register($data) {

        $user = $this->userModel->create($data);

        $_SESSION['user'] = $user;

        return [
            'success' => true,
            'user' => $user
        ];
    }

    public function logout() {
        session_destroy();
    }

    public function check() {
        return isset($_SESSION['user']);
    }

    public function user() {
        return $_SESSION['user'] ?? null;
    }
}