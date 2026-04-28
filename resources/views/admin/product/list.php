<h2>Sản phẩm</h2>

<a href="?action=product_create">+ Thêm</a> |
<a href="?action=category_index">Danh mục</a>

<table border="1">
<tr>
<th>ID</th>
<th>Tên</th>
<th>Giá</th>
<th>Danh mục</th>
<th>Ảnh</th>
<th>Thông số</th>
<th>Tính năng</th>
</tr>

<?php foreach ($products as $row) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= number_format($row['price']) ?>đ</td>
    <td><?= $row['category_name'] ?></td>
    <td>
        <img src="/PCZone/storage/uploads/<?= $row['image'] ?>" width="160">
    </td>
    <td><?= nl2br($row['specs']) ?></td>
    <td>
        <a href="?action=product_edit&id=<?= $row['id'] ?>">Sửa</a> |
        <a href="?action=product_delete&id=<?= $row['id'] ?>">Xóa</a>
    </td>
</tr>
<?php } ?>
</table>