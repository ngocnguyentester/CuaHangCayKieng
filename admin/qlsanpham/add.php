<?php include("../inc/top.php"); ?>

<form method="post" enctype="multipart/form-data" action="index.php"> 
	<input type="hidden" name="action" value="xulythem">
	<div class="md-3 mt-3">	
		<label for="optphanloai" class="form-label">Loại sản phẩm</label>
		<select class="form-select" name="optphanloai">
		<?php foreach ($phanloai as $l): ?>
			<option value="<?php echo $l['id']; ?>"><?php echo $l['tenpl']; ?></option>
			 <?php endforeach; ?>
		</select>
	</div>
	<div class="md-3 mt-3">	
		<label for="txttensp" class="form-label">Tên sản phẩm</label>
		<input class="form-control" type="text" name="txttensp" placeholder="Nhập tên">
	</div>
	<div class="md-3 mt-3">	
		<label for="txtgianhap" class="form-label">Gía nhập</label>
		<input class="form-control" type="number" name="txtgianhap" value="0">
	</div>
	<div class="md-3 mt-3">	
		<label for="txtgiaban" class="form-label">Gía bán</label>
		<input class="form-control" type="number" name="txtgiaban" value="0">
	</div>
	<div class="md-3 mt-3">	
		<label for="txtsoluongton" class="form-label">Số lượng</label>
		<input  class="form-control" type="number" name="txtsoluongton" value="0"></input>
	</div>
	<div class="md-3 mt-3">	
		<label for="txtmota" class="form-label">Mô tả</label>
		<textarea id="editor" rows="5" class="form-control" name="txtmota" placeholder="Nhập mô tả" required="" ></textarea> 
	</div>
	<div class="md-3 mt-3">	
		<label>Hình ảnh</label>
		<input type="file" class="form-control" name="fileanh" ></input> 
	</div>
	<div class="md-3 mt-3">	
		<input type="submit" value="Lưu" class="btn btn-success"></input> 
		<input type="reset" value="Hủy" class="btn btn-warning"></input> 
	</div>
	</form>

<?php include("../inc/bottom.php"); ?>
