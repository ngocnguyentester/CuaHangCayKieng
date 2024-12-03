<?php include("../inc/top.php"); ?>

<form method="post" action="index.php">
    <input type="hidden" name="action" value="xulythem">

    <div class="md-3 mt-3">
        <label for="txttenkm" class="form-label">Tên khuyến mãi</label>
        <input class="form-control" type="text" name="txttenkm" placeholder="Nhập tên khuyến mãi">
    </div>
    <div class="md-3 mt-3">
        <label for="txtmota" class="form-label">Mô tả</label>
        <textarea name="txtmota" id="" cols="50" rows="5"></textarea>
    </div>
    <div class="md-3 mt-3">
        <label for="ngaydb" class="form-label">Ngày bắt đầu</label>
        <input class="form-control" type="date" name="ngaydb">
    </div>
    <div class="md-3 mt-3">
        <label for="ngaykt" class="form-label">Ngày kết thúc</label>
        <input class="form-control" type="date" name="ngaykt">
    </div>
    <div class="md-3 mt-3">
        <input type="submit" value="Lưu" class="btn btn-success"></input>
        <input type="reset" value="Hủy" class="btn btn-warning"></input>
    </div>
</form>

<?php include("../inc/bottom.php"); ?>