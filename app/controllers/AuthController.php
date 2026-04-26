<?php

require_once __DIR__ . '/../services/AuthService.php';
require_once __DIR__ . '/../services/Validator.php';

class AuthController {
    private $authService;

    public function __construct() {
        $this->authService = new AuthService();
    }

    public function showLogin() {
        require ROOT_PATH . '/resources/views/user/login.php';
    }

    public function login() {
        $email = Validator::sanitize($_POST['email'] ?? '');
        $password = Validator::sanitize($_POST['password'] ?? '');

        $error = Validator::email($email) ?? Validator::password($password);

        // ❌ validate lỗi
        if ($error) {
            header("Location: /?page=login&error=" . urlencode($error));
            exit();
        }

        $result = $this->authService->login($email, $password);

        if ($result['success']) {
            header("Location: /website-linhkien-pc/public/?page=profile");
            exit();
        } else {
            header("Location: /?page=login&error=" . urlencode($result['message']));
            exit();
        }
    }

    public function showRegister() {
        require ROOT_PATH . '/resources/views/user/register.php';
    }

    public function register() {
        $name = Validator::sanitize($_POST['name'] ?? '');
        $email = Validator::sanitize($_POST['email'] ?? '');
        $password = Validator::sanitize($_POST['password'] ?? '');

        $error =
            Validator::name($name) ??
            Validator::email($email) ??
            Validator::password($password);

        if ($error) {
            header("Location: /?page=register&error=" . urlencode($error));
            exit();
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $this->authService->register($data);

        header("Location: /?page=profile");
        exit();
    }

    public function logout() {
        $this->authService->logout();
        header("Location: /?page=login");
        exit();
    }

    public function profile() {
    $user = $_SESSION['user'] ?? null;
    require ROOT_PATH . '/resources/views/user/profile.php';
    }
}