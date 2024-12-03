<?php include("../inc/top.php"); ?>
<a class="btn btn-primary text-center" href="index.php?action=xem"><i class="bi bi-arrow-90deg-left"></i></a>
<div class="row">
    <div class="col-sm-9">
        <table class="table table-hover">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Gía bán</th>
                <th>Số lượng</th>
            </tr>
            <?php
            foreach ($donhangct as $ct) :
                foreach ($sanpham as $p) :
                    if ($ct["donhang_id"] == $donhanghh["id"] && $ct["sanpham_id"] == $p["id"]) { ?>
                        <tr>
                            <td>
                                <img width="40px" class="thumnail" src="..\..\<?php echo $p['hinhanh']; ?>  ">
                            </td>
                            <td><?php echo $p["tensp"]; ?></td>
                            <td><?php echo number_format($p["giaban"]); ?></td>
                            <td><?php echo $ct["soluong"]; ?></td>

                        </tr>
            <?php }
                endforeach;
            endforeach; ?>
        </table>


    </div>
</div>



<?php include("../inc/bottom.php"); ?>