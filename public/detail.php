<?php include("inc/top.php"); ?>
<div class="row">
  <div class="col-sm-9">
    <h3 class="text-info"><?php echo $spct["tensp"]; ?></h3>
    <div><img width="500px" src="../<?php echo $spct["hinhanh"]; ?>"></div>
    <div>
      <h4 class="text-primary">Giá bán:
        <span class="text-danger"><?php echo number_format($spct["giaban"]); ?> đ</span>
      </h4>
      <form method="post" class="form-inline">
        <input type="hidden" name="action" value="chovaogio">
        <input type="hidden" name="id" value="<?php echo $spct["id"]; ?>">
        <div class="row">
          <div class="col">
            <input type="number" class="form-control" name="soluong" value="1">
          </div>
          <div class="col">
            <input type="submit" class="btn btn-primary" value="Chọn mua">
          </div>
        </div>
      </form>
    </div>
    <div>
      <h4 class="text-primary">Mô tả sản phẩm: </h4>
      <p><?php echo $spct["mota"]; ?></p>
    </div>
    <br>
  </div>
  <div class="col-sm-3">
    <h3 class="text-warning">Cùng loại sản phẩm:</h3>
    <?php
    foreach ($sanpham as $s) :
      if ($s["id"] != $spct["id"]) {
    ?>
        <div>
          <div class="col mb-5">
            <div class="card h-100 shadow">
              <!-- Sale badge-->
              <?php if ($s["giaban"] != $s["giagoc"]) { ?>
                <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
              <?php } // end if 
              ?>
              <!-- Product image-->
              <a href="?action=detail&id=<?php echo $s["id"]; ?>">
                <img class="card-img-top" src="../<?php echo $s["hinhanh"]; ?>" alt="<?php echo $s["tensp"]; ?>" />
              </a>
              <!-- Product details-->
              <div class="card-body p-4">
                <div class="text-center">
                  <!-- Product name-->
                  <a class="text-decoration-none" href="index.php?action=detail&id=<?php echo $s["id"]; ?>">
                    <h5 class="fw-bolder text-info"><?php echo $s["tensp"]; ?></h5>
                  </a>
                  <!-- Product reviews-->
                  <div class="d-flex justify-content-center small text-warning mb-2">
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                    <div class="bi-star-fill"></div>
                  </div>
                  <!-- Product price-->
                  <?php if ($s["giaban"] != $s["giagoc"]) { ?>
                    <span class="text-muted text-decoration-line-through"><?php echo number_format($s["giagoc"]); ?>đ</span><?php } // end if 
                                                                                                                            ?>
                  <span class="text-danger fw-bolder"><?php echo number_format($s["giaban"]); ?>đ</span>
                </div>
              </div>
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <div class="text-center"><a class="btn btn-outline-info mt-auto" href="index.php?action=chovaogio&id= <?php echo $s["id"]; ?>&soluong=1">Chọn mua</a></div>
              </div>
            </div>
          </div>
        </div>
    <?php
      }
    endforeach;
    ?>
  </div>
</div>



<?php include("inc/bottom.php"); ?>