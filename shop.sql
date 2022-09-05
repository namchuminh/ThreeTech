-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 05, 2022 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `chuyenMucId` int(11) NOT NULL,
  `tenChuyenMuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duongDan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`chuyenMucId`, `tenChuyenMuc`, `duongDan`) VALUES
(1, 'Laptop', 'may-tinh-laptop'),
(2, 'Maytinh', 'may-tinh-pc'),
(3, 'Linhkien', 'linh-kien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `gioHangId` int(11) NOT NULL,
  `sanPhamId` int(11) NOT NULL,
  `khachHangId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `hoaDonId` int(11) NOT NULL,
  `sanPhamId` int(11) NOT NULL,
  `khachHangId` int(11) NOT NULL,
  `thoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `khachHangId` int(11) NOT NULL,
  `taiKhoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoTen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soDienThoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diaChi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`khachHangId`, `taiKhoan`, `matKhau`, `hoTen`, `soDienThoai`, `diaChi`) VALUES
(1, 'nam', '22c78aadb8d25a53ca407fae265a7154', 'Chu Minh Nam', '0379962045', 'Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `nhanVienId` int(11) NOT NULL,
  `taiKhoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoTen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chucVu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soDienThoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`nhanVienId`, `taiKhoan`, `matKhau`, `hoTen`, `chucVu`, `soDienThoai`, `email`, `facebook`, `avatar`) VALUES
(1, 'chuminhnam', 'd41d8cd98f00b204e9800998ecf8427e', 'Chu Minh Nam', 'admin', '0379962045', 'chuminhnamma@gmail.com', 'https://www.facebook.com/laptrinhtudau/', 'http://localhost/ThreeTech/uploads/7fbd358456182187c2fbb04861816da2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `sanPhamId` int(11) NOT NULL,
  `tenSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giaGoc` decimal(19,3) NOT NULL,
  `giaBan` decimal(19,3) NOT NULL,
  `moTa` text COLLATE utf8_unicode_ci NOT NULL,
  `duongDan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangThai` int(11) NOT NULL DEFAULT 1,
  `soLuong` int(11) NOT NULL,
  `anhChinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhPhu1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `anhPhu2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chuyenMucId` int(11) NOT NULL,
  `loaiSanPham` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nhanVienId` int(11) NOT NULL,
  `ngayDang` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`sanPhamId`, `tenSanPham`, `giaGoc`, `giaBan`, `moTa`, `duongDan`, `trangThai`, `soLuong`, `anhChinh`, `anhPhu1`, `anhPhu2`, `chuyenMucId`, `loaiSanPham`, `nhanVienId`, `ngayDang`) VALUES
(1, 'Laptop Asus TUF Gaming FX506LHB-HN188W i5 10300H/8GB/512GB/15.6', '19990.000', '16290.000', '15.6 inch, 1920 x 1080 Pixels, IPS, 144 Hz, Anti-glare LED-backlit\r\n\r\nIntel, Core i5, 10300H\r\n\r\n8 GB (1 thanh 8 GB), DDR4, 2933 MHz\r\n\r\nSSD 512 GB\r\n\r\nNVIDIA GeForce GTX 1650 4GB; Intel UHD Graphics', 'asus-tuf-gaming-fx506lhb-hn188w-i5-10300h', 1, 30, 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/26/637788079927538825_asus-tuf-gaming-fx506lh-den-2022-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/26/637788079927538825_asus-tuf-gaming-fx506lh-den-2022-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/26/637788079927538825_asus-tuf-gaming-fx506lh-den-2022-2.jpg', 1, 'Uudai', 1, '2022-08-29 19:25:29'),
(2, 'PC GAMING HACOM 034 (I3 10105F/H510/8GB RAM/500GB SSD/GTX 1050TI/450W)', '13999.000', '10199.000', 'CPU: Intel Core i3 10105F\r\nMainboard: H510\r\nRAM: 8GB\r\nSSD: 500GB\r\nVGA: GTX 1050Ti\r\nPSU: 450W', 'pc-gaming-hacom-034', 1, 50, 'https://hanoicomputercdn.com/media/product/64227_pcgm452_18_001.jpg', 'https://hanoicomputercdn.com/media/product/64227_pcgm452_18_001.jpg', 'https://hanoicomputercdn.com/media/product/64227_pcgm452_18_001.jpg', 2, 'Uudai', 1, '2022-08-29 19:25:29'),
(3, 'Mainboard ASUS ROG MAXIMUS Z690 FORMULA (Intel Z690, Socket 1700, ATX, 4 khe RAM DDR5)', '21199.000', '16999.000', 'Chipset: Intel Z690\r\nSocket: LGA 1700\r\nSố khe RAM: 4 (DDR5)\r\nKích thước: ATX\r\nTích hợp sẵn Wifi & Bluetooth', 'mainboard-asus-rog-maximus', 1, 25, 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_2.jpg', 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_size.jpg', 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_1.jpg', 3, 'Uudai', 1, '2022-08-29 19:25:29'),
(19, 'Sản Phẩm Laptop Mới Được Đưa Vào', '17800.000', '1500.000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'san-pham-laptop-moi-duoc-dua-vao', 1, 33, '', '', '', 1, 'Uudai', 1, '2022-08-29 22:15:18'),
(20, 'lập trình từ đầu', '1600.000', '1500.000', 'Ngôn ngữ lập trình C là một ngôn ngữ mệnh lệnh được phát triển vào những năm 1970 bới Dennis Ritchie. Từ những năm sau đó ngôn ngữ lập trình C được lan rộng và hiện tại đang là một trong những ngôn ngữ lập trình được sử dụng phổ biến nhất trên thế giới. (Tham khảo thêm tại: C (ngôn ngữ lập trình))', 'lap-trinh-tu-dau', 1, 50, 'http://localhost/ThreeTech/uploads/7fbd358456182187c2fbb04861816da26.jpg', 'http://localhost/ThreeTech/uploads/7fbd358456182187c2fbb04861816da27.jpg', 'http://localhost/ThreeTech/uploads/7fbd358456182187c2fbb04861816da28.jpg', 3, 'Khonguudai', 1, '2022-08-29 22:31:04'),
(21, 'Chu mInh Nam', '1600.000', '1500.000', 'day la mo ta san pham 2 d', 'chu-minh-nam', 1, 51, 'http://localhost/ThreeTech/uploads/avatar_user_1_1642427438-250x2502.png', 'http://localhost/ThreeTech/uploads/avatar_user_1_1642427438-250x2503.png', 'http://localhost/ThreeTech/uploads/avatar_user_1_1642427438-250x2504.png', 2, 'Khonguudai', 1, '2022-08-31 17:13:37'),
(22, 'ádf', '1600.000', '1500.000', 'abcde xyz', 'adf', 1, 50, 'http://localhost/ThreeTech/uploads/avatar_user_1_1642427438-250x2505.png', '', '', 1, 'Uudai', 1, '2022-09-01 02:09:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `tinTucId` int(11) NOT NULL,
  `anhChinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tieuDe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trichDan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noiDung` text COLLATE utf8_unicode_ci NOT NULL,
  `nhanVienId` int(11) NOT NULL,
  `ngayDang` datetime NOT NULL DEFAULT current_timestamp(),
  `duongDan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`tinTucId`, `anhChinh`, `tieuDe`, `trichDan`, `noiDung`, `nhanVienId`, `ngayDang`, `duongDan`) VALUES
(1, 'http://localhost/ThreeTech/static/images/blog_5.jpg', 'Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\n', 'Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin. Praesent at tempus lectus, eleifend blandit felis. Fusce augue arcu, consequat a nisl aliquet, consectetur elementum turpis. Donec iaculis lobortis nisl, et viverra risus imperdiet eu. Etiam mollis posuere elit non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis arcu a magna sodales venenatis. Integer non diam sit amet magna luctus mollis ac eu nisi. In accumsan tellus ut dapibus blandit.\n\nPraesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna. Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 1, '2022-08-29 19:40:14', 'bai-viet-tin-dau-tien');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`chuyenMucId`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`gioHangId`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hoaDonId`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachHangId`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanVienId`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanPhamId`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`tinTucId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `chuyenMucId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `gioHangId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hoaDonId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachHangId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nhanVienId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanPhamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tinTucId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
