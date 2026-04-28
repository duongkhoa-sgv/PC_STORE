<?php
require_once __DIR__ . '/../../models/Product.php';
require_once __DIR__ . '/../../models/Category.php';

class ProductController {

    public function index() {
        $products = Product::all();
        require __DIR__ . '/../../../resources/views/admin/product/list.php';
    }

    public function create() {
        $categories = Category::all();
        require __DIR__ . '/../../../resources/views/admin/product/create.php';
    }

    public function store() {

    if (!isset($_POST['name'], $_POST['price'], $_POST['category_id'], $_POST['specs'])) {
        die("Thiếu dữ liệu product");
    }

    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $specs = $_POST['specs'];

    $imageName = "";

    if (!empty($_FILES['image']['name'])) {
        $imageName = $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            __DIR__ . '/../../../storage/uploads/' . $imageName
        );
    }

    Product::create($name, $price, $category_id, $imageName, $specs);

    header("Location: /PCZone/public/?action=product");
}

    public function edit() {
        $product = Product::find($_GET['id']);
        $categories = Category::all();
        require __DIR__ . '/../../../resources/views/admin/product/edit.php';
    }

    public function update() {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $specs = $_POST['specs'];

    $product = Product::find($id);
    $imageName = $product['image']; // giữ ảnh cũ

    if (!empty($_FILES['image']['name'])) {

        $imageName = $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            __DIR__ . '/../../../storage/uploads/' . $imageName
        );
    }

    Product::update($id, $name, $price, $category_id, $imageName, $specs);

    header("Location: /PCZone/public/?action=product");
}

    public function delete() {

        $id = $_GET['id'];
        Product::delete($id);

        header("Location: /PCZone/public/");
    }
}
