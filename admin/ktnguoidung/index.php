<?php
require("../../model/database.php");
require("../../model/nguoidung.php");
require("../../model/sanpham.php");
require("../../model/phanloai.php");

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
// Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} elseif ($isLogin == FALSE) {
    $action = "dangnhap";
} else {
    $action = "macdinh";
}

$nd = new NGUOIDUNG();
$sp = new SANPHAM();
$pl = new PHANLOAI();

switch ($action) {
    case "macdinh":
        $sanphamhh = $sp->laysanphamhethang();

        include("main.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
            $sanphamhh = $sp->laysanphamhethang();
            include("main.php");
            // } elseif( $_SESSION["nguoidung"]["loai"] == 3 ){
            //     include("../../public/main.php");
        } else {
            include("login.php");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        include("login.php");
        break;
    case "hoso":
        include("profile.php");
        break;
    case "xlhoso":
        $mand = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sodt = $_POST["txtsdt"];
        $diachi = $_POST["txtdiachi"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];

        if ($_FILES["fhinhanh"]["name"] != null) {
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            $duongdan = "../../images/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        }
        $nd->capnhatnguoidung($mand, $email, $sodt, $hoten, $hinhanh, $diachi);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("profile.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $s = $sp->laysanphamtheoid($_GET["id"]);
            $phanloai = $pl->layphanloai();
            include("update.php");
        } else {
            $sanpham = $sp->laysanpham();
            include("main.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form
        $spsua = new SANPHAM();
        $spsua->setid($_POST["txtid"]);
        $spsua->setmota($_POST["txtmota"]);
        $spsua->setphanloaisp($_POST["optphanloai"]);
        $spsua->settensp($_POST["txttensp"]);
        $spsua->setgiaban($_POST["txtgiaban"]);
        $spsua->setsoluongton($_POST["txtsoluongton"]);
        $spsua->sethinhanh($_POST["txthinhcu"]);
        $spsua->setluotxem($_POST["txtluotxem"]);
        $spsua->setluotmua($_POST["txtluotmua"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = "images/products/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $spsua->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        // sửa
        $sp->suasanpham($spsua);
        // load danh sách
        $sanphamhh = $sp->laysanphamhethang();
        include("main.php");
        break;
    
    default:
        break;
}
