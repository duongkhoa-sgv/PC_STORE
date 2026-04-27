<?php
require_once __DIR__ . '/../../config/database.php';

class Order {
    public static function create($user_id, $total) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO orders(user_id, total) VALUES (?, ?)");
        $stmt->bind_param("id", $user_id, $total);
        $stmt->execute();

        return $conn->insert_id;
    }

    public static function addItem($order_id, $product_id, $qty, $price) {
        global $conn;

        $stmt = $conn->prepare("INSERT INTO order_items(order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $order_id, $product_id, $qty, $price);
        $stmt->execute();
    }

    public static function getByUser($user_id) {
        global $conn;

        $sql = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY created_at DESC";
        return $conn->query($sql);
    }
}
