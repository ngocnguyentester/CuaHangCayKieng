<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--     <link href="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
 -->
    <title>CỬA HÀNG CÂY KIỂNG</title>

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

</head>

<body id="top">

    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php"><i class="bi bi-shop-window"></i> Shop Cây Kiểng</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Trang chính</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?action=gioithieu">Giới thiệu</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh mục sản phẩm</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($phanloai as $l) : ?>
                                <li><a class="dropdown-item" href="?action=group&id=<?php echo $l["id"]; ?>">
                                        <?php echo $l["tenpl"]; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <!-- <php if(isset($_SESSION["nguoidung"]) && $_SESSION["nguoidung"]["loai"] == 1) {?>
                        <li class="nav-item"><a class="nav-link" href="../admin/ktnguoidung/index.php">Admin</a></li>
                    <php } ?>  -->
                </ul>
                <div class="row">
                    <div class="col-5 ">
                        <form class="d-flex" method="post" action="index.php?action=search">
                            <div class="input-group">
                                <input type="text" class="form-control " placeholder="Search" name="txtsearch">
                                <button type="submit" class=" btn btn-light" name="timkiem"><i class="bi-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-7 ">
                        <div class="d-flex ">
                            <?php if (isset($_SESSION["nguoidung"])) { ?>
                                <a href="index.php?action=hoso&id=<?php echo $_SESSION["nguoidung"]["id"]; ?>" class="text-decoration-none text-light btn">Welcome <?php echo $_SESSION["nguoidung"]["hoten"]; ?></a>&nbsp;
                                <a href="index.php?action=dangxuat" class="btn btn-outline-light"><i class="bi bi-box-arrow-left"></i></a>&nbsp;
                            <?php } else { ?>
                                <a href="index.php?action=dangnhap" class="btn btn-outline-light"><i class="bi bi-person"></i> </a>&nbsp;
                            <?php } ?>
                            <a href="index.php?action=xemgiohang" class="btn btn-outline-light"><i class="bi bi-cart3"></i><span class="badge bg-danger text-white ms-1 rounded-pill"><?php echo demsoluongtronggio(); ?></span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-1">