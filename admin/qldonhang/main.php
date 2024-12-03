<?php include("../inc/top.php"); ?>

<h4 class="text-info">Danh sách đơn hàng</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">Người dùng</th>
        <th class="text-info">Địa chỉ</th>
        <th class="text-info">Ngày</th>
        <th class="text-info">Tổng tiền</th>
        <th class="text-info">Ghi chú</th>
        <th class="text-info">ID </th>
    </tr>
    <?php
    foreach ($donhang as $d) :
            foreach ($nguoidung as $n) :
                if ($d["nguoidung_id"] == $n["id"]) {
    ?>
                    <tr>

                    <td><a href="index.php?action=chitiet&id=<?php echo $d['id']; ?>"><?php echo $d["id"]; ?></a></td>

                        <td><?php echo $n["hoten"]; ?></td>
                        <td><?php echo $n["diachi"]; ?></td>
                        <td><?php echo $d["ngay"]; ?></td>
                        <td><?php echo number_format($d["tongtien"]); ?> đ</td>
                        <td><?php echo $d["ghichu"]; ?></td>
                    </tr>
    <?php
                }
            endforeach;
        endforeach;
    ?>
</table>
<?php include("../inc/bottom.php"); ?>