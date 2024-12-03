-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2023 lúc 03:51 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cuahangcaykieng`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuongtrinhkm`
--

CREATE TABLE `chuongtrinhkm` (
  `id` int(11) NOT NULL,
  `ten_km` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `ngay_bd` date NOT NULL,
  `ngay_kt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chuongtrinhkm`
--

INSERT INTO `chuongtrinhkm` (`id`, `ten_km`, `mota`, `ngay_bd`, `ngay_kt`) VALUES
(1, 'mua 1 tặng 1', 'mua 1 cây dương xỉ tặng 1 cây dương xỉ', '2023-11-02', '2023-11-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `nguoidung_id` int(11) NOT NULL,
  `ngay` datetime NOT NULL,
  `tongtien` float NOT NULL,
  `ghichu` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `nguoidung_id`, `ngay`, `tongtien`, `ghichu`) VALUES
(8, 5, '0000-00-00 00:00:00', 100, 0),
(18, 6, '0000-00-00 00:00:00', 300, 0),
(19, 6, '0000-00-00 00:00:00', 545, 0),
(20, 1, '2023-12-12 00:00:00', 60, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangct`
--

CREATE TABLE `donhangct` (
  `id` int(11) NOT NULL,
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `thanhtien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) NOT NULL,
  `ten_km` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `ngay_bd` date NOT NULL,
  `ngay_kt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `ten_km`, `mota`, `ngay_bd`, `ngay_kt`) VALUES
(1, 'mua 1 tặng 1', 'mua 1 cây dương xỉ được tặng 1 cây dương xỉ', '2023-11-01', '2023-12-07'),
(2, 'kjsdfhsldf', 'ksjhdsdfjs', '2023-11-03', '2023-11-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `loai` int(4) NOT NULL,
  `trangthai` tinyint(4) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `diachi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `email`, `sodienthoai`, `matkhau`, `hoten`, `loai`, `trangthai`, `hinhanh`, `diachi`) VALUES
(1, 'abc@abc.com', '0123456789', '900150983cd24fb0d6963f7d28e17f72', 'Long Xuyên', 1, 1, 'female.png', 'Long Xuyên, An Giang'),
(2, 'def@abc.com', '0000011111', '900150983cd24fb0d6963f7d28e17f72', 'Doraemon', 2, 1, 'doraemon.jpg', 'Japan'),
(5, '456@abc.com', '0456456456', '900150983cd24fb0d6963f7d28e17f72', 'kjajhdfkjsd', 3, 1, 'user.png', 'Long Xuyên, An Giang'),
(6, '789@abc.com', '7897897987', '900150983cd24fb0d6963f7d28e17f72', 'Lê Thị Lẹ', 3, 1, 'female.png', 'Châu Thành');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloai`
--

CREATE TABLE `phanloai` (
  `id` int(11) NOT NULL,
  `tenpl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phanloai`
--

INSERT INTO `phanloai` (`id`, `tenpl`) VALUES
(1, 'Cây kiểng trong nhà'),
(2, 'Cây kiểng ngoài trời');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `tenquyen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id`, `tenquyen`) VALUES
(1, 'Quản Trị Viên'),
(2, 'Nhân Viên'),
(3, 'Khách Hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `tensp` text NOT NULL,
  `phanloaisp` int(11) NOT NULL,
  `mota` text NOT NULL,
  `giagoc` float NOT NULL,
  `giaban` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinhanh` text NOT NULL,
  `luotxem` int(11) NOT NULL,
  `luotmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `phanloaisp`, `mota`, `giagoc`, `giaban`, `soluongton`, `hinhanh`, `luotxem`, `luotmua`) VALUES
(1, 'Cây lưỡi hổ', 1, 'Cây lưỡi hổ là loại đã rất quen thuộc với nhiều người. Đây là loại cây cảnh trong nhà rất phù hợp với những người tuổi Hợi. Theo phong thủy, những người này có bản trầm nhưng lại không biết cách tiết kiệm, có phần hoang phí. Đặt cây lưỡi hổ bên cạnh sẽ giúp kiềm lại bản tính, giữ tiền giúp con đường sự nghiệp đi lên, dễ phát tài phát lộc.', 30000, 30000, 3, 'images/products/cayluoiho.jpg', 1, 0),
(2, 'Cây tuyết tùng', 1, 'Cây tuyết tùng còn được biết đến với tên gọi cây bách Nhật Bản. Nhiều người tin rằng đây là một loại cây cảnh vô cùng linh thiêng. Đặc biệt, loại cây này rất thích hợp với môi trường ít nắng và có thể cung cấp độ ẩm giúp không khí thêm trong lành.', 90000, 85000, 10, 'images/products/caytuyetung.jpg', 0, 0),
(3, 'Cây trầu bà', 1, 'Cây trầu bà được biết đến là biểu tượng của sức khỏe và tuổi thọ. Sự vươn lên không ngừng của trầu bà cũng thể hiện phước lành và may mắn liên tục tới trong gia đình. Chính vì vậy nếu bạn đang tìm kiếm một loại cây cảnh trong nhà thì không nên bỏ qua loài cây này.\r\n\r\nTùy vào các loại cây trầu bà khác nhau bạn có thể lựa chọn vị trí đặt phù hợp. Nóc tủ, bàn làm việc, cửa sổ đều là những vị trí có thể đặt cây. ', 100000, 88000, 13, 'images/products/caytrauba.jpg', 2, 0),
(4, 'Cây dương xỉ', 1, 'Tài vượng tấn tới khi cây phát triển mạnh chính là ý nghĩa mà nhiều người luôn nhắc về cây dương xỉ. Đặt chậu cây cảnh trên bàn làm việc theo vị trí tay thuận chính là bí quyết giúp loài cây cảnh trong nhà này phát huy công dụng một cách tốt nhất. Theo phong thủy, ngoài bàn làm việc, bạn cũng có trồng một cây phong thủy ở góc trái của ngôi nhà. Nếu chôn thêm 9 đồng xu phía dưới thì gia chủ sẽ luôn gặp may mắn, hút tài lộc và giàu có. ', 30000, 20000, 5, 'images/products/cayduongxi.jpg', 13, 0),
(5, 'Cây cau cảnh', 2, 'Cây cau cảnh – sự lựa chọn của nhiều khách hàng\r\n\r\nCây cau cảnh là loại cây thuộc họ Arecaceae. Đây là một trong những cây bóng mát đang được đông đảo người Việt lựa chọn, trồng tại nhiều công trình khác nhau.\r\n\r\nCây cau cảnh có mức sinh trưởng nhanh, lại ít sâu bệnh hại, chịu được các điều kiện thời bất thuận. Đồng thời, chúng không tốn nhiều công sức chăm sóc.\r\n\r\nVẻ đẹp đơn sơ từ những tán lá xanh tươi. Kết hợp với hình dáng cắt xẻ như lá dừa, dáng cây thẳng đứng, cây góp phần không nhỏ về tính thẩm mỹ cho không gian xung quanh. Đồng thời, theo phong thủy, cây cau cảnh còn mang tới nhiều điều may mắn, tài lộc cũng như xua đi sự nguy hiểm, thể hiện sự vững chắc, kiên cường vượt qua khó khăn, trở ngại trong cuộc sống.', 99000, 99000, 0, 'images/products/caycau.jpg', 0, 0),
(6, 'Cây lộc vừng', 2, 'Cây lộc vừng đem lại tài lộc cho gia chủ\r\n\r\nCây lộc vừng đã và đang trở thành sự lựa chọn của rất nhiều người Việt. Bởi không chỉ đem lại bóng mát mà cây còn sở hữu ý nghĩa phong thủy tuyệt vời: thu hút, đem lại tài lộc cho gia đình, khí vượng cho gia chủ.\r\n\r\nNgoài ra, cây lộc vừng ưa sáng, thích nghi được với nhiều điều kiện thời tiết khác nhau, khả năng sinh trưởng, phát triển nhanh. Cùng với đó là dáng cây, thế cây độc đáo, dễ uốn nắn tạo ra đường nét mới lạ, mang lại giá trị làm đẹp cao.', 50000, 50000, 5, 'images/products/caylocvung.jpg', 0, 0),
(7, 'Cây giáng hương', 2, 'Cây giáng hương với sắc màu vàng đẹp, rực rỡ, tô điểm cho không gian xung quanh\r\n\r\nCây giáng hương là loại cây sở hữu hình dáng đẹp: thân thẳng, tán rộng, hoa màu vàng đẹp, rực rỡ, mùi thơm đặc trưng. Hơn nữa, cây ít rụng lá, xanh quanh năm và không tốn nhiều thời gian, công sức trồng, chăm sóc. Do đó, chẳng lạ gì khi chúng trở thành sự lựa chọn của nhiều khách hàng.', 500000, 400000, 6, 'images/products/caygianghuong.jpg', 0, 0),
(8, 'Cây Lan Hạt Dưa Trắng', 2, 'Cây Lan Hạt Dưa trắng: Thuộc dòng cây bán nội thất, sống bền và khỏe.\r\n– Cách Chăm Sóc: 1 Tuần tưới nước từ 3-4 lần, mỗi lần tầm 300ml nước sạch.\r\n\r\n– Công Dụng: Dùng để trang trí tạo nên 1 không gian xanh đầy xinh tươi như: quán cà phê, hostel, homstay, quán trà sữa, ban công căn hộ…', 79000, 79000, 4, 'images/products/lanhatdua.jpg', 0, 0),
(9, 'Cây Lan Hạt Dưa Xanh', 2, 'Cây Lan Hạt Dưa Xanh: Thuộc dòng cây bán nội thất, sống bền và khỏe.\r\n– Cách Chăm Sóc: 1 Tuần tưới nước từ 3-4 lần, mỗi lần tầm 500ml nước sạch.\r\n\r\n– Công Dụng: Dùng để trang trí tạo nên 1 không gian xanh đầy xinh tươi như: quán cà phê, hostel, homstay, quán trà sữa, ban công căn hộ…', 79000, 60000, 5, 'images/products/caylanhatduaxanh.jpg', 0, 0),
(10, 'Cây kim tiền', 1, 'Là loài cây cảnh dễ trồng, dễ chăm sóc, ít sâu bệnh, thường phổ biến trang trí trong không gian nhà hoặc văn phòng. Người ta tin rằng trồng cây kim tiền trong nhà sẽ đem lại sư may mắn, giàu có và thuận hòa cho gia chủ, giúp họ thăng tiến trong công việc.', 60000, 50000, 9, 'images/products/caykimtien.jpg', 6, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuongtrinhkm`
--
ALTER TABLE `chuongtrinhkm`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoidung_dh` (`nguoidung_id`);

--
-- Chỉ mục cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hdct_dh` (`donhang_id`),
  ADD KEY `dhct_sp` (`sanpham_id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanquyen` (`loai`);

--
-- Chỉ mục cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phanloai` (`phanloaisp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuongtrinhkm`
--
ALTER TABLE `chuongtrinhkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `nguoidung_dh` FOREIGN KEY (`nguoidung_id`) REFERENCES `nguoidung` (`id`);

--
-- Các ràng buộc cho bảng `donhangct`
--
ALTER TABLE `donhangct`
  ADD CONSTRAINT `dhct_sp` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `hdct_dh` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`id`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `phanquyen` FOREIGN KEY (`loai`) REFERENCES `quyen` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `phanloai` FOREIGN KEY (`phanloaisp`) REFERENCES `phanloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
