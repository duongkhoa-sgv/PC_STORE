<?php
require_once 'app/models/Order.php';
require_once 'app/models/Cart.php';

class OrderService {

    public function checkout($user_id) {
        $cart = Cart::getCart();
        $total = Cart::total();

        $order_id = Order::create($user_id, $total);

        foreach ($cart as $item) {
            Order::addItem(
                $order_id,
                $item['id'],
                $item['quantity'],
                $item['price']
            );
        }

        Cart::clear();
    }
}
