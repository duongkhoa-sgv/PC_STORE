<?php $cart = $_SESSION['cart'] ?? []; ?>

<h2>Giỏ hàng</h2>

<table class="table">
    <tr>
        <th>Sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th></th>
    </tr>

    <?php foreach ($cart as $item): ?>
    <tr>
        <td><?= $item['name'] ?></td>
        <td><?= $item['price'] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td>
            <a href="/cart/remove?id=<?= $item['id'] ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h4>Tổng: <?= Cart::total() ?> VND</h4>

<a href="/checkout" class="btn btn-primary">Đặt hàng</a>
