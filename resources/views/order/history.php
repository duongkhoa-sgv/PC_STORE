<h2>Lịch sử đơn hàng</h2>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
        <th>Ngày</th>
    </tr>

    <?php while($row = $orders->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['total'] ?></td>
        <td><?= $row['status'] ?></td>
        <td><?= $row['created_at'] ?></td>
    </tr>
    <?php endwhile; ?>
</table>
