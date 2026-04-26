<?php

class Validator {

    public static function email($email) {
        if (empty($email)) {
            return "Email is required";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format";
        }

        return null;
    }

    public static function password($password) {
        if (empty($password)) {
            return "Password is required";
        }

        if (strlen($password) < 6) {
            return "Password must be at least 6 characters";
        }

        return null;
    }

    public static function name($name) {
        if (empty($name)) {
            return "Name is required";
        }

        if (strlen($name) < 3) {
            return "Name too short";
        }

        return null;
    }

    public static function sanitize($data) {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }
}