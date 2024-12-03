<?php include("../inc/top.php"); ?>
<div>
    <h3>Cập nhật sản phẩm</h3>
    <form method="post" action="index.php" enctype="multipart/form-data">
        <input type="hidden" name="action" value="xulysua">
        <input type="hidden" name="txtid" value="<?php echo $s["id"]; ?>">
        <div class="my-3">
            <label>Phân loại</label>
            <select class="form-control" name="optphanloai">
                <?php foreach ($phanloai as $pl) { ?>
                    <option value="<?php echo $pl["id"]; ?>" <?php if ($pl["id"] == $s["phanloaisp"]) echo "selected"; ?>><?php echo $pl["tenpl"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="my-3">
            <label>Tên cây kiểng</label>
            <input class="form-control" type="text" name="txttensp" required value="<?php echo $s["tensp"]; ?>">
        </div>
        <div class="my-3">
            <label>Mô tả</label>
            <textarea class="form-control" name="txtmota" required><?php echo $s["mota"]; ?></textarea>
        </div>
        <div class="my-3">
            <label>Giá gốc</label>
            <input class="form-control" type="number" name="txtgiagoc" value="<?php echo $s["giagoc"]; ?>" required>
        </div>
        <div class="my-3">
            <label>Giá bán</label>
            <input class="form-control" type="number" name="txtgiaban" value="<?php echo $s["giaban"]; ?>" required>
        </div>
        <div class="my-3">
            <label>Số lượng tồn</label>
            <input class="form-control" type="number" name="txtsoluongton" value="<?php echo $s["soluongton"]; ?>" required>
        </div>
        <div class="my-3">
            <label>Lượt xem</label>
            <input class="form-control" type="number" name="txtluotxem" value="<?php echo $s["luotxem"]; ?>" required>
        </div>
        <div class="my-3">
            <label>Lượt mua</label>
            <input class="form-control" type="number" name="txtluotmua" value="<?php echo $s["luotmua"]; ?>" required>
        </div>
        <div class="my-3">
            <label>Hình ảnh</label><br>
            <input type="hidden" name="txthinhcu" value="<?php echo $s["hinhanh"]; ?>">
            <img src="../../<?php echo $s["hinhanh"]; ?>" width="50" class="img-thumbnail">
            <a data-bs-toggle="collapse" data-bs-target="#demo">Đổi hình ảnh</a>
            <div id="demo" class="collapse m-3">
                <input type="file" class="form-control" name="filehinhanh">
            </div>
        </div>

        <div class="my-3">
            <input class="btn btn-primary" type="submit" value="Lưu">
            <input class="btn btn-warning" type="reset" value="Hủy">
        </div>
    </form>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#txtmota'))
        .catch(error => {
            console.error(error);
        });
</script>

<?php include("../inc/bottom.php"); ?>