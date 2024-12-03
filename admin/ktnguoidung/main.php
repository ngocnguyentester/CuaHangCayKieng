<?php include("../inc/top.php"); ?>

<h4 class="text-info">Danh sách sản phẩm hết hàng</h4>
<table class="table table-hover">
    <tr>
        <th>Tên sản phẩm</th>
        <th>Gía bán</th>
        <th class="text-danger" >Số lượng</th>
        <th>Hình ảnh</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
    <?php
    foreach ($sanphamhh as $s) :
    ?>
        <tr>
            <td><?php echo $s["tensp"]; ?></td>
            <td><?php echo number_format($s["giaban"]); ?></td>
            <td><?php echo $s["soluongton"]; ?></td>
            <td><img width="40px" class="thumnail" src="..\..\<?php echo $s['hinhanh']; ?>  "></td>
            <td><a href="index.php?action=sua&id=<?php echo $s['id']; ?>" class="btn btn-warning">Sửa</a></td>
            <td><a href="index.php?action=xoa&id=<?php echo  $s['id']; ?>" class="btn btn-danger">Xóa</a></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>
<?php include("../inc/bottom.php"); ?>