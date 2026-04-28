<h2>Thêm sản phẩm</h2>

<form method="POST" action="?action=product_store" enctype="multipart/form-data">

Tên: <input name="name"><br><br>
Giá: <input name="price"><br><br>

Danh mục:
<select name="category_id">
<?php foreach ($categories as $cat) { ?>
    <option value="<?= $cat['id'] ?>">
        <?= $cat['name'] ?>
    </option>
<?php } ?>
</select><br><br>

Thông số:<br>
<textarea name="specs"></textarea><br><br>

Ảnh: <input type="file" name="image"><br><br>

<button>Thêm</button>
</form>