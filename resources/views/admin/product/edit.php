<h2>Sửa sản phẩm</h2>

<form method="POST" action="?action=product_update" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?= $product['id'] ?>">

Tên: <input name="name" value="<?= $product['name'] ?>"><br><br>
Giá: <input name="price" value="<?= $product['price'] ?>"><br><br>

<select name="category_id">
<?php foreach ($categories as $cat) { ?>
    <option value="<?= $cat['id'] ?>" 
        <?= $cat['id'] == $product['category_id'] ? 'selected' : '' ?>>
        <?= $cat['name'] ?>
    </option>
<?php } ?>
</select><br><br>

Thông số:<br>
<textarea name="specs"><?= $product['specs'] ?></textarea><br><br>

<img src="/PCZone/storage/uploads/<?= $product['image'] ?>" width="80"><br><br>

<input type="file" name="image"><br><br>

<button>Cập nhật</button>
</form>