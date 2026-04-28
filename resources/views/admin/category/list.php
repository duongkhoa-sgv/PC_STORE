<h2>Danh mục</h2>

<a href="?action=category_create">+ Thêm</a>

<table border="1">
<tr>
<th>ID</th>
<th>Tên</th>
<th>Tính năng</th>
</tr>

<?php foreach ($categories as $cat) { ?>
<tr>
    <td><?= $cat['id'] ?></td>
    <td><?= $cat['name'] ?></td>
    <td>
        <a href="?action=category_edit&id=<?= $cat['id'] ?>">Sửa</a> |
        <a href="?action=category_delete&id=<?= $cat['id'] ?>">Xóa</a>
    </td>
</tr>
<?php } ?>
</table>