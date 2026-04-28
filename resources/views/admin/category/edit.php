<h2>Sửa danh mục</h2>

<form method="POST" action="?action=category_update">

<input type="hidden" name="id" value="<?= $category['id'] ?>">

Tên:
<input name="name" value="<?= $category['name'] ?>">

<button>Cập nhật</button>
</form>