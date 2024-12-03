<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/khuyenmai.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$pq = new QUYEN();
$nd = new NGUOIDUNG();
$km = new KHUYENMAI();

switch ($action) {
    case "xem":
        $khuyenmai = $km->laykhuyenmai();
        include("main.php");
        break;
    case "them":
        include("add.php");
        break;
    case "xulythem":
        //xử lý thêm mặt hàng
        $kmmoi = new KHUYENMAI();
        $kmmoi->setten_km($_POST["txttenkm"]);
        $kmmoi->setmota($_POST["txtmota"]);
        $kmmoi->setngay_bd($_POST["ngaydb"]);
        $kmmoi->setngay_kt($_POST["ngaykt"]);
        $km->themkhuyenmai($kmmoi);

        $khuyenmai = $km->laykhuyenmai();
        include("main.php");
        break;
    case "khoa":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["trangthai"]))
            $trangthai = $_REQUEST["trangthai"];
        else
            $trangthai = "1";
        if ($trangthai == "1") {
            $trangthai = 0;
            $nd->doitrangthai($id, $trangthai);
        } else {
            $trangthai = 1;
            $nd->doitrangthai($id, $trangthai);
        }
        // load người dùng
        $quyen = $pq->layquyen();
        $nguoidung = $nd->laydanhsachnguoidung();
        $khuyenmai = $km->laykhuyenmai();

        include("main.php");
        break;
    default:
        break;
}
