<?php

require("../model/database.php");
require("../model/phanloai.php");
require("../model/sanpham.php");
require("../model/giohang.php");
require("../model/nguoidung.php");
require("../model/donhang.php");
require("../model/donhangct.php");

$pl = new PHANLOAI();
$phanloai = $pl->layphanloai();
$sp = new SANPHAM();
$sanphamxemnhieu = $sp->laysanphamxemnhieu();
$nd = new NGUOIDUNG();
$nguoidung = $nd->laydanhsachnguoidung();
$dh = new DONHANG();
$dhct = new DONHANGCT();

// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {
    $action = "null";
}


switch ($action) {
    case "null":
        $sanpham = $sp->laysanpham();
        include("main.php");
        break;
    case "gioithieu":
        $sanpham = $sp->laysanpham();
        include("gioithieu.php");
        break;
    case "cotloi":
        $sanpham = $sp->laysanpham();
        include("cotloi.php");
        break;
    case "group":
        if (isset($_REQUEST["id"])) {
            $mapl = $_REQUEST["id"];
            $pluc = $pl->layphanloaitheoid($mapl);
            $tenpl =  $pluc["tenpl"];
            $sanpham = $sp->laysanphamtheophanloai($mapl);
            include("group.php");
        } else {
            include("main.php");
        }
        break;
    case "detail":
        if (isset($_GET["id"])) {
            $id_sp = $_GET["id"];
            // tăng lượt xem lên 1
            $sp->tangluotxem($id_sp);
            // lấy thông tin chi tiết sản phẩm
            $spct = $sp->laysanphamtheoid($id_sp);
            // lấy các sản phẩm cùng danh mục
            $mapl = $spct["phanloaisp"];
            $sanpham = $sp->laysanphamtheophanloai($mapl);
            include("detail.php");
        }
        break;
    case "search":
        if (isset($_POST["timkiem"])) {
            $ten_tk = $_POST["txtsearch"];
            if ($ten_tk != "") {
                // lấy thông tin sản phẩm
                $sanpham = $sp->timkiemsanpham($ten_tk);
                include("search.php");
            } else {
                $sanpham = $sp->laysanpham();
                include("main.php");
            }
        }
        break;
    case "xemgiohang":
        $giohang = laygiohang();
        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("cart.php");
        break;
    case "chovaogio":
        if (isset($_REQUEST["id"]))
            $id = $_REQUEST["id"];
        if (isset($_REQUEST["soluong"]))
            $soluong = $_REQUEST["soluong"];
        else
            $soluong = "1";
        if (isset($_SESSION["giohang"][$id])) {
            $soluong += $_SESSION["giohang"][$id];
            $_SESSION["giohang"][$id] = $soluong;
        } else {
            themhangvaogio($id, $soluong);
        }
        $giohang = laygiohang();
        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("cart.php");
        break;
    case "giohang":
        $giohang = laygiohang();
        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("cart.php");
        break;
    case "capnhatgio":
        if (isset($_REQUEST["mh"])) {
            $mh = $_REQUEST["mh"];
            foreach ($mh as $id => $soluong) {
                if ($soluong > 0)
                    capnhatsoluong($id, $soluong);
                else
                    xoamotsanpham($id);
            }
        }
        $giohang = laygiohang();
        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("cart.php");
        break;
    case "xoagiohang":
        xoagiohang();
        $giohang = laygiohang();
        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laydanhsachnguoidung();
        include("cart.php");
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        $sanpham = $sp->laysanpham();
        include("main.php");
        break;
    case "dangnhap":
        include("dangnhap.php");
        break;
    case "xldangnhap":
        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];
        if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
            if ($_SESSION["nguoidung"]["loai"] == "2") {
                $sanpham = $sp->laysanpham();
                include("main.php");
            } else if ($_SESSION["nguoidung"]["loai"] == "1") {
                $sanpham = $sp->laysanpham();
                header("Location: ../admin/index.php");
            }
            
        } else {
            include("dangnhap.php");
        }
        break;
    case "thanhtoan":
        // Kiểm tra hành động $action: yêu cầu đăng nhập nếu chưa xác thực
        if ($isLogin == FALSE) {
            include("dangnhap.php");
        } else {
            $giohang = laygiohang();
            include("thanhtoan.php");
        }
        break;
        case "htdonhang":
        
            // Thêm đơn hàng
            $donhangmoi = new DONHANG();
            $ngay = date("Y-m-d");
            $donhangmoi->setnguoidung_id($_POST["txtid"]);
            $donhangmoi->setngay($ngay);
            $donhangmoi->settongtien($_POST["txttongtien"]);
    
            $ghichu = $_POST["txtghichu"];
            $donhangmoi->setghichu($ghichu);
            // Thêm
            $dh->themdonhang($donhangmoi);
    
            // Thêm đơn hàng chi tiết và giảm số lượng sản phẩm
    
            // Lấy ID của đơn hàng vừa được tạo
            $dbcon = DATABASE::connect();
    
            $donhang_id = $dbcon->lastInsertId();
    
            $txtid = $_POST["txtid_sp"]; // Lưu giá trị của $_POST["txtid"] vào biến $txtid
    
            if (!is_array($txtid)) {
                $txtid = [$txtid]; // Chuyển đổi giá trị $txtid thành một mảng
            }
            $so_luong_id = count($txtid); // Đếm số lượng phần tử trong mảng $txtid
    
            for ($i = 0; $i < $so_luong_id; $i++) {
                $id = $txtid[$i];
                $dhctmoi = new DONHANGCT();
                $dhctmoi->setdonhang_id($donhang_id);
                $dhctmoi->setsanpham_id($id);
                $dhctmoi->setdongia($_POST["txtdongia"][$i]);
                $dhctmoi->setsoluong($_POST["txtsl"][$i]);
                $dhctmoi->setthanhtien($_POST["txtthanhtien"][$i]);
                $dhct->themdonhangct($dhctmoi);
    
                // Giảm số lượng sản phẩm
                $sp->giamsoluong($id, $_POST["txtsl"][$i]);
            }
            xoagiohang();
            $sanpham = $sp->laysanpham();
            include("main.php");
    
            break;
    case "hoso":
        include("hoso.php");
        break;
    case "xlhoso":
        $mand = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sodt = $_POST["txtsdt"];
        $hoten = $_POST["txthoten"];
        $hinhanh = $_POST["txthinhanh"];
        $diachi = $_POST["txtdiachi"];

        if ($_FILES["fhinhanh"]["name"] != null) {
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            $duongdan = "../images/users/" . $hinhanh;
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        }
        $nd->capnhatnguoidung($mand, $email, $sodt, $hoten, $hinhanh, $diachi);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        include("hoso.php");
        break;
    case "dangky":
        include("dangky.php");
        break;
    case "xldangky":
        $loai = $_POST["txtloai"];
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fhinhanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../images/products/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        //xử lý thêm mặt hàng
        $nguoidungmoi = new NGUOIDUNG();
        $nguoidungmoi->setemail($_POST["txtemail"]);
        $nguoidungmoi->setsodienthoai($_POST["txtsodienthoai"]);
        $nguoidungmoi->setmatkhau($_POST["txtmatkhau"]);
        $nguoidungmoi->sethoten($_POST["txthoten"]);
        $nguoidungmoi->setloai($loai);
        $nguoidungmoi->settrangthai($_POST["txttrangthai"]);
        $nguoidungmoi->sethinhanh($hinhanh);
        $nguoidungmoi->setdiachi($_POST["txtdiachi"]);

        // thêm
        $nd->themnguoidung($nguoidungmoi);
        // load 
        $sanpham = $sp->laysanpham();
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($_POST["txtemail"]);
        include("main.php");
        break;
    default:
        break;
}
