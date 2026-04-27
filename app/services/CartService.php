<?php
require_once 'app/models/Cart.php';
require_once 'app/models/Product.php';

class CartService {

    public function addToCart($product_id) {
        $product = Product::find($product_id);
        Cart::add($product);
    }

    public function remove($id) {
        Cart::remove($id);
    }
}
