<?php include("../inc/top.php"); ?>

<p><a class="btn btn-info" href="index.php?action=them">Thêm người dùng</a></p>
<h4 class="text-info">Danh sách người dùng</h4>
<table class="table table-hover">
    <tr>
        <th class="text-info">Email</th>
        <th class="text-info">Số điện thoại</th>
        <th class="text-info">Họ tên</th>
        <th class="text-info">Loại quyền</th>
        <th>Trạng thái</th>
        <th>Khóa</th>
    </tr>
    <?php
    foreach ($nguoidung as $n) :
        foreach ($quyen as $q) :
            if ($n["loai"] == $q["id"]) {
    ?>
                <tr>
                    <td><?php echo $n["email"]; ?></td>
                    <td><?php echo $n["sodienthoai"]; ?></td>
                    <td><?php echo $n["hoten"]; ?></td>
                    <td><?php echo $q["tenquyen"]; ?></td>
                    <td><?php if ($n["trangthai"] == 1) { ?>
                            <dt class=" text-primary font-weight">Hoạt động</dt>
                        <?php } else { ?>
                            <dt class=" text-danger">Khóa</dt>

                        <?php } ?>
                    </td>
                    <td>
                        <?php if ($n["trangthai"] == 1) { ?>
                            <a href="index.php?action=khoa&id=<?php echo $n['id']; ?>&trangthai=<?php echo $n['trangthai']; ?>" class="btn btn-danger">Khóa</a>
                        <?php } else {
                        ?> 
                        <a href="index.php?action=khoa&id=<?php echo $n['id']; ?>&trangthai=<?php echo $n['trangthai']; ?>" class="btn btn-warning">Mở</a>
                        <?php } ?>
                    </td>
                </tr>
    <?php
            }
        endforeach;
    endforeach;
    ?>
</table>
<?php include("../inc/bottom.php"); ?>