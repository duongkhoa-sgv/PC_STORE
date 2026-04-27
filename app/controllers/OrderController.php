<?php
require_once __DIR__ . '/../services/OrderService.php';
require_once __DIR__ . '/../models/Order.php';

class OrderController {

    private $service;

    public function __construct() {
        $this->service = new OrderService();
    }

    public function checkout() {
        $user_id = $_SESSION['user']['id'];
        $this->service->checkout($user_id);

        header("Location: /orders");
    }

    public function history() {
        $user_id = $_SESSION['user']['id'];
        $orders = Order::getByUser($user_id);

        include 'resources/views/order/history.php';
    }
}
