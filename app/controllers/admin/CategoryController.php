<?php
require_once __DIR__ . '/../../models/Category.php';

class CategoryController {

    public function index() {
    $categories = Category::all();

    if (!$categories) {
        $categories = []; // tránh lỗi view
    }

    require __DIR__ . '/../../../resources/views/admin/category/list.php';
}

    public function create() {
        require __DIR__ . '/../../../resources/views/admin/category/create.php';
    }

    public function store() {
    if (!isset($_POST['name'])) {
        die("Thiếu dữ liệu name");
    }

    Category::create($_POST['name']);
    header("Location: /PCZone/public/?action=category");
}

    public function edit() {
        $category = Category::find($_GET['id']);
        require __DIR__ . '/../../../resources/views/admin/category/edit.php';
    }

    public function update() {
    if (!isset($_POST['id']) || !isset($_POST['name'])) {
        die("Thiếu dữ liệu update");
    }

    Category::update($_POST['id'], $_POST['name']);
    header("Location: /PCZone/public/?action=category");
}

    public function delete() {
    if (!isset($_GET['id'])) {
        die("Thiếu id delete");
    }

    Category::delete($_GET['id']);
    header("Location: /PCZone/public/?action=category");
}
}
