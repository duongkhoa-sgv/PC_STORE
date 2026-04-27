<?php
require_once 'app/services/CartService.php';

class CartController {

    private $service;

    public function __construct() {
        $this->service = new CartService();
    }

    public function add() {
        $id = $_GET['id'];
        $this->service->addToCart($id);
        header("Location: /cart");
    }

    public function remove() {
        $id = $_GET['id'];
        $this->service->remove($id);
        header("Location: /cart");
    }

    public function view() {
        include 'resources/views/cart/cart.php';
    }
}
