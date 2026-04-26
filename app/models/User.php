<?php

class User {
    private $pdo;

    public function __construct() {
        // demo: có thể chưa dùng
        try {
            $this->pdo = new PDO("mysql:host=localhost;dbname=test", "root", "");
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            $this->pdo = null; // fallback demo
        }
    }

    public function findByEmail($email) {

        // nếu chưa có DB → dùng fake
        if (!$this->pdo) {
            if ($email === "admin@gmail.com") {
                return [
                    'id' => 1,
                    'email' => 'admin@gmail.com',
                    'password' => password_hash("123456", PASSWORD_DEFAULT),
                    'name' => 'Admin'
                ];
            }
            return null;
        }

        // chống SQL injection bằng prepared statement
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {

        if (!$this->pdo) {
            return [
                'id' => rand(1,1000),
                'email' => $data['email'],
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
                'name' => $data['name']
            ];
        }

        // chống SQL injection
        $stmt = $this->pdo->prepare("
            INSERT INTO users (name, email, password)
            VALUES (:name, :email, :password)
        ");
        $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);

        return [
            'id' => $this->pdo->lastInsertId(),
            ...$data
        ];
    }
}