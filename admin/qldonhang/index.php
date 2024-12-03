<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/quyen.php");
require("../../model/donhang.php");
require("../../model/donhangct.php");
require("../../model/sanpham.php");


// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$dh = new DONHANG();
$dhct = new DONHANGCT();
$nd = new NGUOIDUNG();
$sp = new SANPHAM();

switch ($action) {
    case "xem":
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();

        include("main.php");
        break;
    case "chitiet":
        if (isset($_GET["id"])) {
            $id_dh = $_GET["id"];
            // tăng lượt xem lên 1
            $donhanghh = $dh->laydonhangtheoid($id_dh);
            $donhangct = $dhct->laydonhangct();            
            $sanpham = $sp->laysanpham();
            include("detail.php");
        }
        break;
    
    default:
        break;
}
