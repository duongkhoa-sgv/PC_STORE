<?php
class Cart {
    public static function getCart() {
        return $_SESSION['cart'] ?? [];
    }

    public static function add($product, $qty = 1) {
        $cart = self::getCart();

        $id = $product['id'];

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'id' => $id,
                'name' => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => $qty
            ];
        }

        $_SESSION['cart'] = $cart;
    }

    public static function remove($id) {
        $cart = self::getCart();
        unset($cart[$id]);
        $_SESSION['cart'] = $cart;
    }

    public static function clear() {
        unset($_SESSION['cart']);
    }

    public static function total() {
        $total = 0;
        foreach (self::getCart() as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
}
