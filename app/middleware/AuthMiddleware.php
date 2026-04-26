<?php

class AuthMiddleware {
    public static function handle() {
        if (!isset($_SESSION['user'])) {
            header("Location: /website-linhkien-pc/public/?page=login");
            exit();
        }
    }
}