
<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/phanloai.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{   // mặc định là xem danh sách
    $action="xem";
}

$pl = new PHANLOAI();
$idsua = 0;

switch($action){
    case "xem":
        $phanloai = $pl->layphanloai();       
        include("main.php");
        break;
    case "sua": // hiển thị form
    	$idsua = $_GET["id"];
        $phanloai = $pl->layphanloai();       
        include("main.php");
        break;
    case "capnhat": // lưu dữ liệu sửa mới vào db
    	// gán dữ liệu từ form
    	$plmoi = new phanloai();
    	$plmoi->setid($_POST["id"]);
    	$plmoi->settenpl($_POST["ten"]);
    	// sửa
    	$pl->suaphanloai($plmoi);
    	// load danh sách
        $phanloai = $pl->layphanloai();       
        include("main.php");
        break;
    case "them":
    	// gán dữ liệu từ form
    	$plmoi = new PHANLOAI();
    	$plmoi->settenpl($_POST["ten"]);
    	// thêm
    	$pl->themphanloai($plmoi);
    	// load danh sách
        $phanloai = $pl->layphanloai();       
        include("main.php");
        break;
    case "xoa":
    	// lấy dòng muốn xóa
    	$plxoa = new PHANLOAI();
    	$plxoa->setid($_GET["id"]);
    	// xóa
    	$pl->xoaphanloai($plxoa);
    	// load danh sách
        $phanloai = $pl->layphanloai();       
        include("main.php");
        break;
    default:
        break;
}
?>
