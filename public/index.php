<?php

// bật lỗi để debug (demo rất cần)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// start session toàn hệ thống
session_start();

// define ROOT để dùng đường dẫn cho chuẩn
define('ROOT_PATH', dirname(__DIR__));

// load router
require_once ROOT_PATH . '/routes/web.php';