-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 06:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `threetech`
--

-- --------------------------------------------------------

--
-- Table structure for table `chamcong`
--

CREATE TABLE `chamcong` (
  `chamCongId` int(11) NOT NULL,
  `nhanVienId` int(11) NOT NULL,
  `thoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chamcong`
--

INSERT INTO `chamcong` (`chamCongId`, `nhanVienId`, `thoiGian`) VALUES
(8, 1, '2022-11-26 18:01:17'),
(9, 3, '2022-11-26 18:03:08'),
(10, 8, '2022-11-26 18:07:49'),
(11, 7, '2022-11-26 18:17:26'),
(13, 12, '2022-11-26 19:11:19'),
(14, 20, '2022-11-26 20:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `chitiethoadonID` int(11) NOT NULL,
  `madonhang` int(11) NOT NULL,
  `sanPhamId` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`chitiethoadonID`, `madonhang`, `sanPhamId`, `soLuong`) VALUES
(1, 1669292418, 1, 1),
(2, 1669292418, 19, 1),
(3, 1669292418, 1, 1),
(4, 1669292418, 19, 1),
(5, 1669293665, 1, 3),
(6, 1669340720, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `chuyenMucId` int(11) NOT NULL,
  `tenChuyenMuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duongDanChuyenMuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`chuyenMucId`, `tenChuyenMuc`, `duongDanChuyenMuc`) VALUES
(1, 'Laptop', 'may-tinh-laptop'),
(2, 'Maytinh', 'may-tinh-pc'),
(3, 'Linhkien', 'linh-kien');

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `gioHangId` int(11) NOT NULL,
  `sanPhamId` int(11) NOT NULL,
  `khachHangId` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`gioHangId`, `sanPhamId`, `khachHangId`, `soLuong`) VALUES
(38, 23, 2, 1),
(39, 1, 2, 1),
(40, 19, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
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
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`khachHangId`, `taiKhoan`, `matKhau`, `hoTen`, `soDienThoai`, `diaChi`) VALUES
(1, 'nam', '22c78aadb8d25a53ca407fae265a7154', 'Chu Minh Nam', '0379962045', 'Hà Nội'),
(2, 'sonson', '2b5165a145c7ef05581b14d876ceba3b', 'Phùng Thái Sơn', '0383637563', 'Hà Nội'),
(3, 'sonson1', '2b5165a145c7ef05581b14d876ceba3b', 'Phùng Thái Sơn', '0383637563', 'Ha noi'),
(4, 'sonson2', '2b5165a145c7ef05581b14d876ceba3b', 'Phùng Thái Sơn', '0383637563', 'hà Nội');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
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
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`nhanVienId`, `taiKhoan`, `matKhau`, `hoTen`, `chucVu`, `soDienThoai`, `email`, `facebook`, `avatar`) VALUES
(1, 'chuminhnam', '206dcce3f82cf8981d316e7900dc8e06', 'Chu Minh Nam', 'admin', '0379962045', 'chuminhnamma@gmail.com', 'https://www.facebook.com/laptrinhtudau/', 'http://localhost/ThreeTech/uploads/image.jpg'),
(7, 'nguyenvana', '20ca70c7c8f494c7bd1d54ad23d40cde', 'Nguyễn Văn A', 'nhanvien', '0366555999', 'nguyenvana@gmail.com', 'https://fb.com/nguyenvana', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(13, 'nguyenvanb', '23280a0ad9238d00c62b0272af265c57', 'Nguyễn Văn B', 'nhanvien', '0555666777', 'nguyenvanb@gmail.com', 'https://fb.com/nguyenvanb', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(14, 'nguyenvanc', 'e38935fe84686a8afe5756147b23c46a', 'Nguyễn Văn C', 'nhanvien', '0222333444', 'nguyenvanc@gmail.com', 'https://fb.com/nguyenvanc', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(15, 'tranngocha', 'd41d8cd98f00b204e9800998ecf8427e', 'Trần Ngọc Hà', 'admin', '0388888888', 'tranngocha@gmail.com', 'https://fb.com/tranngocha', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(16, 'nguyenvand', '76408318fe45073e54cb3acbf4307ac2', 'Nguyễn Văn D', 'nhanvien', '0222333444', 'nguyenvand@gmail.com', 'https://fb.com/nguyenvand', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(17, 'nguyenvane', '9cf93a4bfd5cf7b7639b084e5d2350e8', 'Nguyễn Văn E', 'nhanvien', '0555555555', 'nguyenvane@gmail.com', 'https://fb.com/nguyenvane', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(18, 'nguyenvanf', '5b9f24fd4810ca22cb1c38025a7c8c4b', 'Nguyễn Văn F', 'nhanvien', '0123456789', 'nguyenvanf@gmail.com', 'https://fb.com/nguyenvanf', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(19, 'nguyenvang', '1243a9174185350a7643d0b55e15d4ea', 'Nguyễn Văn G', 'nhanvien', '045678910', 'nguyenvang@gmail.com', 'https://fb.com/nguyenvang', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(20, 'nguyenvanh', '6339a24a8240eab211290f42051c0867', 'Nguyễn Văn H', 'nhanvien', '0789456123', 'nguyenvanh@gmail.com', 'https://fb.com/nguyenvanh', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(21, 'phungthaison', '2100dc613d1994b224c42d1950b4dea6', 'Phùng Thái Sơn', 'admin', '025643562', 'phungthaison@gmail.com', 'https://fb.com/phungthaison', 'http://localhost/ThreeTech/static/img/avatarPerson.png'),
(22, 'nguyenvanx', '0ee245a0753566d062ea938d6fbe85b1', 'Nguyễn Văn X', 'nhanvien', '0256897325', 'nguyenvanx@gmail.com', 'https://fb.com/nguyenvanx', 'http://localhost/ThreeTech/static/img/avatarPerson.png');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
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
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`sanPhamId`, `tenSanPham`, `giaGoc`, `giaBan`, `moTa`, `duongDan`, `trangThai`, `soLuong`, `anhChinh`, `anhPhu1`, `anhPhu2`, `chuyenMucId`, `loaiSanPham`, `nhanVienId`, `ngayDang`) VALUES
(2, 'PC GAMING HACOM 034 (I3 10105F/H510/8GB RAM/500GB SSD/GTX 1050TI/450W)', '13999.000', '10199.000', 'CPU: Intel Core i3 10105F\r\nMainboard: H510\r\nRAM: 8GB\r\nSSD: 500GB\r\nVGA: GTX 1050Ti\r\nPSU: 450W', 'pc-gaming-hacom-034', 1, 50, 'http://localhost/ThreeTech/uploads/007_46b946f81bcf45fa848e5c139ece1b56_large.png', 'http://localhost/ThreeTech/uploads/67745_pcgm566_27_01.jpg', 'http://localhost/ThreeTech/uploads/anh_chuan_7aaa3109477a4652a63f55ab4f4c2ac5_grande.jpg', 2, 'Uudai', 1, '2022-08-29 19:25:29'),
(3, 'Mainboard ASUS ROG MAXIMUS Z690 FORMULA (Intel Z690, Socket 1700, ATX, 4 khe RAM DDR5)', '21199.000', '16999.000', 'Chipset: Intel Z690\r\nSocket: LGA 1700\r\nSố khe RAM: 4 (DDR5)\r\nKích thước: ATX\r\nTích hợp sẵn Wifi & Bluetooth', 'mainboard-asus-rog-maximus', 1, 25, 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_2.jpg', 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_size.jpg', 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_1.jpg', 3, 'Uudai', 1, '2022-08-29 19:25:29'),
(19, 'Laptop Lenovo IdeaPad Slim 5', '18790.000', '14890.000', '15.6 inch, 1920 x 1080 Pixels, IPS, 60 Hz, 300 nits, IPS LCD LED Backlit, True Tone\r\nIntel, Core i5, 1135G7\r\n8 GB, DDR4, 3200 MHz\r\nSSD 512 GB\r\nIntel Iris Xe Graphics', 'laptop-lenovo-ideapad-slim-5', 1, 32, 'http://localhost/ThreeTech/uploads/lenovo-ideapad-slim-5-15itl05-i5-82fg001pvn-144320-064322-600x600.jpg', 'http://localhost/ThreeTech/uploads/58429_idealpad5__3_.png', 'http://localhost/ThreeTech/uploads/bbfafef4382f9f0910230636f4712988.jpg', 1, 'Uudai', 1, '2022-08-29 22:15:18'),
(20, 'Ram Corsair Dominator Platinum 16GB (2x8GB) RGB 3200', '4000.000', '3000.000', '- Nhà sản xuất: CORSAIR\r\n- Loại RAM: DDR4\r\n- Dung lượng: 16GB \r\n- Số lượng: 2 thanh\r\n- Bus: 3200MHz\r\n- Tản nhiệt: Có\r\n- Màu: Đen\r\n- Bảo Hành: 36 Tháng', 'Ram-Corsair-Dominator-Platinum', 1, 50, 'http://localhost/ThreeTech/uploads/41347_cmt16gx4m2c3200c16w__3_.jpg', 'http://localhost/ThreeTech/uploads/7fbd358456182187c2fbb04861816da27.jpg', 'http://localhost/ThreeTech/uploads/7fbd358456182187c2fbb04861816da28.jpg', 3, 'Khonguudai', 1, '2022-08-29 22:31:04'),
(21, 'iMac', '34000.000', '31000.000', 'iMac 24 inch 2021 4.5K M1/256GB/8GB/7-core GPU (MGTF3SA/A)', 'iMac', 1, 51, 'http://localhost/ThreeTech/uploads/thumb-apple-imac-24-m1-2021-800x450.jpg', 'http://localhost/ThreeTech/uploads/vi-vn-imac-24-inch-45k-retina-m1-mgtf3saa-1.jpg', 'http://localhost/ThreeTech/uploads/vi-vn-imac-24-inch-45k-retina-m1-mgtf3saa-2.jpg', 2, 'Khonguudai', 1, '2022-08-31 17:13:37'),
(22, 'Surface Pro 8 Core i5 / 8GB / 128GB', '35990.000', '24990.000', 'Bộ xử lý: Intel® Core™ i5-1135G7 - Gen 11th\r\n- Ram: 8Gb\r\n- Ổ cứng: SSD 128Gb\r\n- Màn hình: 13 inch, Cảm ứng 10 điểm chạm\r\n- Hệ điều hành: Windows 11 Home\r\n- Thiết bị hỗ trợ: Pen Protocol (MPP), Slim Pen 2, Surface Pro Signature Keyboard, Surface Pro X Keyboard\"\r\n- Cổng kết nối: 2 x USB-C (USB 4.0 / Thunderbolt 4)\r\n1x Giắc cắm tai nghe 3,5 mm\r\n1 x Cổng kết nối bề mặt (kết nối phím)', 'surface-pro-8', 1, 50, 'http://localhost/ThreeTech/uploads/46084_surface_pro_8_platinum_ha1.jpg', 'http://localhost/ThreeTech/uploads/46084_surface_pro_8_platinum_ha2.jpg', 'http://localhost/ThreeTech/uploads/46084_surface_pro_8_platinum_ha3.jpg', 1, 'Uudai', 1, '2022-09-01 02:09:11'),
(23, 'Laptop Gigabyte Gaming G5 GD-51VN123SO', '18500.000', '17500.000', 'GD-51VN123SO i5 11400H/16GB/512GB/15.6\" FHD/GeForce RTX 3050 4GB/Win 11', 'laptop-gigabyte-gaming-g5-gd-51vn123so', 1, 2, 'http://localhost/ThreeTech/uploads/Screenshot_2022-09-06_1650041.png', 'http://localhost/ThreeTech/uploads/gigabyte-gaming-g5-i5-10500h-16gb-512gb-6gb-171121-034937-600x6001.jpg', 'http://localhost/ThreeTech/uploads/42072_laptop_gigabyte_g5_gd_51s1123so__4_1.jpg', 1, 'Khonguudai', 1, '2022-09-06 16:56:02'),
(24, 'PC Gaming CPS 010', '16000.000', '15000.000', 'PC Gaming CPS 010\r\nI5/8GB/120GB/500W/2060\r\nPC Gaming', 'pc-gaming-cps-010', 1, 10, 'http://localhost/ThreeTech/uploads/may-tinh-choi-game-i3-3220-4gb-gtx-730-2gb.jpg', 'http://localhost/ThreeTech/uploads/chon-cau-hinh-may-tinh-thiet-ke-do-hoa-1.png', 'http://localhost/ThreeTech/uploads/pcgaming.jpg', 2, 'Khonguudai', 1, '2022-09-06 17:32:09'),
(25, 'ASUS ROG Strix GeForce RTX 3080 Ti Gaming OC Edition 12GB', '40000.000', '38000.000', 'Hãng sản xuất: ASUS\r\nMã sản phẩm: ROG-STRIX-RTX3080TI-O12G-GAMING\r\nBảo hành: 36 Tháng', 'asus-rog-strix-geforce-rtx-3080-ti-gaming-oc-edition-12gb', 1, 50, 'http://localhost/ThreeTech/uploads/h525.png', '', '', 3, 'Khonguudai', 1, '2022-09-06 17:53:15'),
(26, 'Laptop Dell Latitude 3420 42LT342001', '15990.000', '11590.000', 'Bộ VXL: Core i3 1115G4 3.0Ghz up to 4.1Ghz-6Mb\r\n- Cạc đồ họa: Intel® UHD graphics\r\n- Bộ nhớ: 4Gb\r\n- Ổ cứng/ Ổ đĩa quang: M.2 256GB PCIe NVMe Class 35 SSD\r\n- Màn hình: 14.0Inch\r\n- Hệ điều hành: DOS\r\n- Màu sắc/ Chất liệu: Black', 'laptop-dell-latitude-3420-42lt342001', 1, 50, 'http://localhost/ThreeTech/uploads/43856_latitude_3420_ha4.jpg', 'http://localhost/ThreeTech/uploads/43856_latitude_3420_ha1.jpg', 'http://localhost/ThreeTech/uploads/43856_latitude_3420_ha5_(1).jpg', 1, 'Khonguudai', 1, '2022-09-09 14:20:32'),
(27, 'Asus Vivobook A415EA-EB1750W', '15390.000', '11790.000', 'Bộ VXL: Core i3 1125G4 2.0Ghz-8Mb\r\n- Cạc đồ họa: Intel® UHD Graphics\r\n- Bộ nhớ: 8Gb\r\n- Ổ cứng/ Ổ đĩa quang: 256GB SSD PCIe (M.2 2280)\r\n- Màn hình: 14.0Inch Full HD\r\n- Hệ điều hành: Windows 11 Home\r\n- Màu sắc/ Chất liệu: Silver', 'asus-vivobook-a415ea-eb1750w', 1, 50, 'http://localhost/ThreeTech/uploads/46461_vivobook_a415_silver_bh_ha4.jpg', 'http://localhost/ThreeTech/uploads/46461_vivobook_a415_silver_bh_ha3.jpg', 'http://localhost/ThreeTech/uploads/46461_vivobook_a415_silver_bh_ha6_(1).jpg', 1, 'Khonguudai', 1, '2022-09-09 14:23:20'),
(28, 'Laptop Acer Aspire A315-58-358E NX.ADDSV.00F', '12990.000', '11590.000', 'Bộ VXL: Core i3 1115G4 3.0Ghz up to 4.1Ghz-6Mb\r\n- Cạc đồ họa: Intel® UHD Graphics\r\n- Bộ nhớ: 8Gb\r\n- Ổ cứng/ Ổ đĩa quang: 512Gb SSD/ Không\r\n- Màn hình: 15.6Inch Full HD\r\n- Hệ điều hành: Windows 11 Home\r\n- Màu sắc/ Chất liệu: Silver', 'laptop-acer-aspire-a315-58-358e-nxaddsv00f', 1, 50, 'http://localhost/ThreeTech/uploads/48349_1y_laptop_acer_aspire_a315_58_silver_a1.gif', 'http://localhost/ThreeTech/uploads/48349_1y_laptop_acer_aspire_a315_58_silver_a2.gif', 'http://localhost/ThreeTech/uploads/48349_1y_laptop_acer_aspire_a315_58_silver_a3.gif', 1, 'Khonguudai', 1, '2022-09-09 14:26:37'),
(29, 'Laptop HP 15s-du1105TU 2Z6L3PA', '10990.000', '8990.000', '- Bộ VXL: Core i3 10110U 2.1Ghz-4Mb\r\n- Cạc đồ họa: Intel Graphics UHD\r\n- Bộ nhớ: 4Gb\r\n- Ổ cứng/ Ổ đĩa quang: 256GB SSD M.2 NVMe\r\n- Màn hình: 15.6Inch\r\n- Hệ điều hành: Windows 11 Home\r\n- Màu sắc/ Chất liệu: Silver', 'laptop-hp-15s-du1105tu-2z6l3pa', 1, 100, 'http://localhost/ThreeTech/uploads/45006_45006_lap_hp_15s_ha4.jpg', 'http://localhost/ThreeTech/uploads/45006_45006_lap_hp_15s_ha3.jpg', 'http://localhost/ThreeTech/uploads/45006_45006_lap_hp_15s_ha5.jpg', 1, 'Khonguudai', 1, '2022-09-09 14:28:35'),
(30, 'Laptop Dell Inspiron 3505 Ryzen 3 3250U/ 4Gb/ 128Gb SSD/ 15.6\" FHD /VGA ON/ Win10/White/NK', '13990.000', '8790.000', '- Bộ VXL: Ryzen 3 3250U 2.6Ghz up to 3.5GHz-4Mb\r\n- Cạc đồ họa: Integrated AMD Radeon Graphics\r\n- Bộ nhớ: 4Gb\r\n- Ổ cứng/ Ổ đĩa quang: 128Gb SSD\r\n- Màn hình: 15.6Inch Full HD\r\n- Hệ điều hành: Windows 10 Home\r\n- Màu sắc/ Chất liệu: White/ Backlit keyboard', 'laptop-dell-inspiron-3505-ryzen-3-3250u-4gb-128gb-ssd-156-fhd-vga-on-win10whitenk', 1, 60, 'http://localhost/ThreeTech/uploads/45228_inspiron_3505_white_ha2s.jpg', 'http://localhost/ThreeTech/uploads/45228_inspiron_3505_white_ha3s.jpg', 'http://localhost/ThreeTech/uploads/45228_inspiron_3505_white_ha1s.jpg', 1, 'Khonguudai', 1, '2022-09-09 14:29:59'),
(31, 'Máy tính để bàn PCPA Legion-I3/8G/240G/RX550', '9999.000', '9899.000', '- CPU: Intel Comet lake Core i3 10105F 3.7Ghz-6Mb Box\r\n- RAM/ SSD: 8GB/ SSD 240gb\r\n- VGA: Afox Radeon RX550 4GB', 'may-tinh-de-ban-pcpa-legion-i38g240grx550', 1, 30, 'http://localhost/ThreeTech/uploads/45589_legion.png', '', '', 2, 'Khonguudai', 1, '2022-09-09 14:33:07'),
(32, 'Máy tính để bàn Dell Optiplex 3090MT 42OT390007', '15990.000', '14390.000', '- CPU: Core i5 10505\r\n- RAM/ HDD: 8Gb (1x8Gb)/ 256GB SSD\r\n- VGA: VGA onboard, Intel Graphics\r\n- OS: Fedora', 'may-tinh-de-ban-dell-optiplex-3090mt-42ot390007', 1, 50, 'http://localhost/ThreeTech/uploads/Máy_tính_để_bàn_Dell_Optiplex_3090MT_42OT390007_-longbinh_com_vn.jpg', 'http://localhost/ThreeTech/uploads/Máy_tính_để_bàn_Dell_Optiplex_3090MT_42OT390007_-longbinh_com_vn1_hwcb-3g.jpg', '', 2, 'Khonguudai', 1, '2022-09-09 14:36:43'),
(33, 'CPU Intel Core i7-11700', '8499.000', '8350.000', 'Socket: FCLGA1200\r\nSố lõi/luồng: 8/16\r\nTần số cơ bản/turbo: 2.50/4.90 GHz\r\nBộ nhớ đệm: 16MB\r\nĐồ họa tích hợp: Intel® UHD Graphics 750\r\nBus ram hỗ trợ: DDR4-3200Mhz\r\nMức tiêu thụ điện: 65 W', 'cpu-intel-core-i7-11700', 1, 40, 'http://localhost/ThreeTech/uploads/42978_cpu_int_11700f_a.jpg', '', '', 3, 'Khonguudai', 1, '2022-09-09 14:37:56'),
(34, 'Tai nghe Bluetooth Audio-Technica ATH-M50xBT', '5690.000', '4550.000', 'Sau sự thành công của mẫu tai nghe Audio-Technica ATH-M50x thì mới đây hãng tai nghe nổi tiếng đến từ Nhật lại tiếp tục tung ra bản cải tiến của chiếc tai nghe với khả năng nghe nhac không dây giúp bạn có những khoảng thời gian trải nghiệm tốt hơn và tiện dụng hơn. Audio-Technica ATH-M50xBT chắc chắn sẽ là một sự lựa chọn mà bạn không nên bỏ qua khi muốn trải nghiệm âm thanh không dây chất lượng cao. ', 'tai-nghe-bluetooth-audio-technica-ath-m50xbt', 1, 30, 'http://localhost/ThreeTech/uploads/2218_tai_nghe_bluetooth_choang_dau_audio_technica_ath_m50xbt_1.jpg', 'http://localhost/ThreeTech/uploads/2218_tai_nghe_bluetooth_choang_dau_audio_technica_ath_m50xbt_3.jpg', 'http://localhost/ThreeTech/uploads/2218_tai_nghe_bluetooth_choang_dau_audio_technica_ath_m50xbt_2.jpg', 3, 'Giamgiacuoituan', 1, '2022-11-27 03:06:31'),
(35, 'Pin sạc dự phòng Polymer 20.000 mAh Type C PD QC3.0 Xmobile PowerBox P69D', '1000.000', '690.000', 'Đặc điểm nổi bật\r\nKiểu dáng đơn giản, vỏ ngoài phủ Fabric chống bám vân tay.\r\nNạp pin an toàn, nhanh chóng với cổng Type C Power Delivery và 2 cổng USB Quick Charge 3.0.\r\nCùng lúc sạc được 3 thiết bị.\r\nSạc lại qua 2 cổng vào Micro USB và Type C.\r\nLõi pin Polymer bền bỉ, hạn chế chai pin.\r\nDung lượng lớn 20.000 mAh, cấp đủ năng lượng cho nhiều thiết bị.', 'pin-sac-du-phong-polymer-20000-mah-type-c-pd-qc30-xmobile-powerbox-p69d', 1, 25, 'http://localhost/ThreeTech/uploads/sac-du-phong-polymer-20000mah-type-c-xmobile-p69d-2.jpeg', 'http://localhost/ThreeTech/uploads/sac-du-phong-polymer-20000mah-type-c-xmobile-p69d-1.jpeg', 'http://localhost/ThreeTech/uploads/sac-du-phong-polymer-20000mah-type-c-xmobile-p69d-4.jpeg', 3, 'Giamgiacuoituan', 1, '2022-11-27 03:09:34'),
(36, 'Loa Bluetooth Mozard E8 Xanh Navy ', '1250.000', '950.000', 'Kiểu dáng trẻ trung, màu sắc nổi bật\r\nLoa Bluetooth Mozard E8 có thiết kế trẻ trung, màu sắc nổi bật, loa có 2 màu sắc là đỏ và xanh Navy cho bạn dễ dàng lựa chọn theo sở thích. Loa có kích thước nhỏ gọn bạn có thể dễ dàng bỏ vào túi xách mang theo khi đi du lịch, dã ngoại.\r\nCông nghệ Bluetooth 5.0 kết nối ổn định trong khoảng cách 10 m\r\nKết nối không dây Bluetooth 5.0 tương thích với các thiết bị chạy hệ điều hành Android, Windows, iOS (iPhone) cho việc kết nối thiết bị thêm dễ dàng và tiện lợi.', 'loa-bluetooth-mozard-e8-xanh-navy', 1, 15, 'http://localhost/ThreeTech/uploads/loa-bluetooth-mozard-1.jpeg', 'http://localhost/ThreeTech/uploads/loa-bluetooth-mozard3.jpeg', 'http://localhost/ThreeTech/uploads/loa-bluetooth-mvy-2.jpeg', 3, 'Giamgiacuoituan', 1, '2022-11-27 03:11:29'),
(37, 'Laptop Acer TravelMate B3 TMB311-31-C2HB CEL-N4020 NX.VNFSV.006', '8500.000', '3990.000', 'Màn hình 11.6 inch, HD mang đến hình ảnh rõ nét, sống động\r\nHiệu năng ổn định giúp xử lý tốt các tác vụ cơ bản hàng ngày\r\nRAM 4GB DDR4 giúp laptop đa nhiệm ổn đinh, hạn chế giật lag\r\nỔ cứng SSD giúp khởi động máy, mở ứng dụng nhanh hơn\r\nLaptop gọn nhẹ khoảng 1.4 kg, dễ dàng mang theo sử dụng', 'laptop-acer-travelmate-b3-tmb311-31-c2hb-cel-n4020-nxvnfsv006', 1, 100, 'http://localhost/ThreeTech/uploads/10051032-laptop-acer-travelmate-b3-tmb311-31-c2hb-nxvnfsv006-1.jpg', 'http://localhost/ThreeTech/uploads/10051032-laptop-acer-travelmate-b3-tmb311-31-c2hb-nxvnfsv006-2.jpg', 'http://localhost/ThreeTech/uploads/10051032-laptop-acer-travelmate-b3-tmb311-31-c2hb-nxvnfsv006-3.jpg', 1, 'Phobien', 1, '2022-11-28 14:06:00'),
(38, 'Laptop Asus Vivobook A415EA i3-1125G4/8GB/256GB/Win11 (EB1750W)', '13590.000', '11590.000', 'Màn hình 14\'\' FHD IPS cho trải nghiệm hình ảnh rõ nét, chân thực\r\nBộ vi xử lý Intel Core i3-1125G4 cử lý tốt tác vụ học tập, văn phòng\r\nRAM 8GB DDR4 giúp laptop chạy đa nhiệm mượt mà, ổn định\r\nỔ cứng SSD 256GB giúp khởi động máy nhanh, lưu trữ đủ dùng\r\nLaptop có thiết kế gọn nhẹ 1.4 kg, dễ dàng mang theo sử dụng', 'laptop-asus-vivobook-a415ea-i3-1125g48gb256gbwin11-eb1750w', 1, 60, 'http://localhost/ThreeTech/uploads/10051316-laptop-asus-vivobook-a415ea-eb1750w-1.jpg', 'http://localhost/ThreeTech/uploads/10051316-laptop-asus-vivobook-a415ea-eb1750w-2.jpg', 'http://localhost/ThreeTech/uploads/10051316-laptop-asus-vivobook-a415ea-eb1750w-3.jpg', 1, 'Phobien', 1, '2022-11-28 14:25:59'),
(39, 'Máy tính để bàn HP 205 Pro G4 AIO R5-4500U/8GB/256GB/Win10 31Y21PA', '18590.000', '16590.000', 'Thiết kế tinh tế, kiểu dáng hiện đại với chân đế chữ X chắc chắn\r\nTích hợp đủ hệ thống phần mềm, camera,... mà không cần CPU\r\nBộ vi xử lý R5-4500U cho hiệu năng mạnh mẽ, xử lý tốt mọi tác vụ\r\nRAM 8GB đa nhiệm có thể mở 4-5 ứng dụng mà không bị giật, lag\r\nỔ cứng 256GB mang đến không gian lưu trữ vừa đủ, mở máy nhanh\r\nMàn hình Full HD có kích thước 23.8inch hiển thị hình ảnh sắc nét\r\nMáy được trang bị Webcam 5MP nâng cao chất lượng cuộc đàm thoại', 'may-tinh-de-ban-hp-205-pro-g4-aio-r5-4500u8gb256gbwin10-31y21pa', 1, 100, 'http://localhost/ThreeTech/uploads/10053665-may-tinh-de-ban-hp-205-pro-g4-aio-r5-4500u-31y21pa-1.jpg', 'http://localhost/ThreeTech/uploads/10053665-may-tinh-de-ban-hp-205-pro-g4-aio-r5-4500u-31y21pa-2.jpg', 'http://localhost/ThreeTech/uploads/10053665-may-tinh-de-ban-hp-205-pro-g4-aio-r5-4500u-31y21pa-3.jpg', 2, 'Phobien', 1, '2022-11-28 14:27:37'),
(40, 'Màn hình máy tính Samsung 24 inch LS24AM506NEXXV', '6990.000', '4990.000', 'Màn hình thiết kế tinh tế mỏng nhẹ, thông minh không cần kết nối với máy tính\r\nKích thước 24 inch độ phân giải 1920x1080 hiển thị nội dung rõ ràng, sắc nét\r\nTính năng Ultra Game View điều chỉnh tỷ lệ màn hình 21:9 mở rộng tầm nhìn\r\nCông nghệ Adaptive Picture tự động điều chỉnh ánh sáng giúp mắt nhìn rõ hơn\r\nKết nối không dây DeX, cho phép kết nối điện thoại với màn hình nhanh chóng\r\nTruy cập vào Netflix, YouTube, HBO mà không cần bật laptop hay máy tính để bàn', 'man-hinh-may-tinh-samsung-24-inch-ls24am506nexxv', 1, 50, 'http://localhost/ThreeTech/uploads/10052570-man-hinh-may-tinh-samsung-24-inch-ls24am506nexxv-1.jpg', 'http://localhost/ThreeTech/uploads/10052570-man-hinh-may-tinh-samsung-24-inch-ls24am506nexxv-2.jpg', 'http://localhost/ThreeTech/uploads/10052570-man-hinh-may-tinh-samsung-24-inch-ls24am506nexxv-3.jpg', 2, 'Phobien', 1, '2022-11-28 14:29:02'),
(41, 'KIT STM32F407VET6 Cortex-M4', '729.000', '569.000', 'Kích thước: 60x55mm\r\nĐiện áp sử dụng: 5VDC\r\n4 lỗ để định vị board cố định\r\nKhoảng cách lỗ: 57x50mm\r\nTích hợp cổng để kết nối cap\r\n', 'kit-stm32f407vet6-cortex-m4', 1, 52, 'http://localhost/ThreeTech/uploads/9749650278c5a3b2b24be3cbb82d10ea.jpg', 'http://localhost/ThreeTech/uploads/a5b82dfae9cfae4deeaedcccb9df8a42.jpg', 'http://localhost/ThreeTech/uploads/d02c339077522bbb10d17a9ae6e2c40f.jpg', 3, 'Phobien', 1, '2022-11-28 14:33:05'),
(42, 'VGA ASUS TUF Gaming GeForce RTX 3060 Ti OC V2 8GB GDDR6', '15989.000', '10989.000', 'Dung lượng bộ nhớ: 8GB GDDR6\r\nBoost Clock: 1785 MHz\r\nBăng thông: 256-bit\r\nKết nối: Yes x 2 (Native HDMI 2.1), Yes x 3 (Native DisplayPort 1.4a)', 'vga-asus-tuf-gaming-geforce-rtx-3060-ti-oc-v2-8gb-gddr6', 1, 60, 'http://localhost/ThreeTech/uploads/250-1217-tuf-rtx3060-o12g-gaming-01.jpg', 'http://localhost/ThreeTech/uploads/35614_tuf_rtx3060ti_8g_gaming_05.jpg', 'http://localhost/ThreeTech/uploads/dlcdnwebimgs_asus.png', 3, 'Phobien', 1, '2022-11-28 14:36:26'),
(43, 'RAM Laptop Kingston 1.2V 8GB 3200MHz KVR32S22S8/8', '1230.000', '630.000', 'Thanh RAM Kingston Sodimm 1.2V 8GB 3200MHz là sản phẩm của tập đoàn Kingston Technology đến từ Mỹ. Đây là tập đoàn được thành lập từ năm 1987 là thương hiệu sản xuất bộ nhớ hàng đầu thế giới, chiếm hơn 50% thị phần và là thương hiệu được yêu thích và tin dùng tại Châu Á – Thái Bình Dương.', 'ram-laptop-kingston-12v-8gb-3200mhz-kvr32s22s88', 1, 50, 'http://localhost/ThreeTech/uploads/kvr-ddr4-2666-8gb-02-b79f3ec1-97c0-4910-b3fa-7575f5032650-ccba3b01-16f5-4e2b-bf5b-9d4c2f738b4d.jpg', 'http://localhost/ThreeTech/uploads/5_1_l_i.png', 'http://localhost/ThreeTech/uploads/708c7424ae7bcce2b2bf198a9114a60e.jpg', 3, 'Phobien', 1, '2022-11-28 14:38:28'),
(44, 'Laptop Lenovo IdeaPad 5 14ITL05 i7-1165G7 14 inch 82FE00JLVN', '22990.000', '16990.000', 'Lenovo Ideapad 5 14ITL05 có trọng lượng nhẹ 1.4 kg, dễ mang theo sử dụng\r\nBộ vi xử lý i7-1165G7, 8GB RAM cho hiệu năng mạnh mẽ, đa nhiệm mượt mà\r\nỔ cứng SSD 512GB cho tốc độ phản hồi, khởi động máy, mở ứng dụng nhanh\r\nMàn hình Full HD Anti-glare 14\'\' hiển thị hình ảnh sắc nét, màu sắc chân thực\r\nTận hưởng âm thanh sống động nhờ công nghệ Realtek High Definition Audio', 'laptop-lenovo-ideapad-5-14itl05-i7-1165g7-14-inch-82fe00jlvn', 1, 50, 'http://localhost/ThreeTech/uploads/10049091-laptop-lenovo-ideapad-5-14itl05_i7-1165g7-14-inch-82fe00jlvn-1.jpg', 'http://localhost/ThreeTech/uploads/10049091-laptop-lenovo-ideapad-5-14itl05_i7-1165g7-14-inch-82fe00jlvn-2.jpg', 'http://localhost/ThreeTech/uploads/10049091-laptop-lenovo-ideapad-5-14itl05_i7-1165g7-14-inch-82fe00jlvn-3.jpg', 1, 'Totnhat', 1, '2022-11-28 14:52:35'),
(45, 'Laptop Asus TUF Gaming F15 FX506HC i5-11400H/8GB/512GB/Win11 HN144W', '25990.000', '20990.000', 'Thiết kế mạnh mẽ, phong cách Gaming với vỏ bọc từ nhựa màu đen huyền bí\r\nVi xử lý Intel Core i5 11400H Gen 11 sức mạnh khủng chạy tốt mọi tựa game\r\nỔ cứng SSD 512GB khởi động máy nhanh chóng, lưu trữ được nhiều dữ liệu hơn\r\nVới Card rời NVIDIA GeForce RTX 3050 đồ họa mượt mà, sắc nét đến từng chi tiết\r\nMàn hình 144Hz viền mỏng hiển thị hình ảnh chân thật mà không giật lag hay xé hình\r\nCông nghệ DTS:X Ultra Audio cho trải nghiệm âm thanh lớn, trung thực và sống động\r\nTrang bị bàn phím chuyển màu RGB độc đáo nâng cao trải nghiệm của người sử dụng', 'laptop-asus-tuf-gaming-f15-fx506hc-i5-11400h8gb512gbwin11-hn144w', 1, 100, 'http://localhost/ThreeTech/uploads/10052586-laptop-asus-tuf-gaming-f15-fx506hc-hn144w-1.jpg', 'http://localhost/ThreeTech/uploads/10052586-laptop-asus-tuf-gaming-f15-fx506hc-hn144w-2.jpg', 'http://localhost/ThreeTech/uploads/10052586-laptop-asus-tuf-gaming-f15-fx506hc-hn144w-3.jpg', 1, 'Totnhat', 1, '2022-11-28 14:53:54'),
(46, 'iMac 24 inch 4.5K Retina M1/8GB/512GB MGPD3SA/A', '44990.000', '39990.000', 'Thiết kế tinh tế, sang trọng với chân đế kim loại nguyên khối\r\nCon Chip M1 có hiệu năng mạnh mẽ, xử lý mượt mà các tác vụ\r\nMàn hình 24inch 4.5K Retina hiển thị hình ảnh sắc nét, chân thật\r\nRAM 8GB đa nhiệm có thể làm việc với nhiều Tab cùng một lúc\r\nỔ cứng 512GB truy xuất dữ liệu nhanh, tăng tốc khởi động máy \r\nTrang bị các cổng kết nối hàng đầu giúp kết nối, truyền dữ liệu nhanh ', 'imac-24-inch-45k-retina-m18gb512gb-mgpd3saa', 1, 100, 'http://localhost/ThreeTech/uploads/10053168-imac-24-inch-m1-8gb-512gb-mgpd3sa-a-1.jpg', 'http://localhost/ThreeTech/uploads/10053168-imac-24-inch-m1-8gb-512gb-mgpd3sa-a-2.jpg', 'http://localhost/ThreeTech/uploads/10053168-imac-24-inch-m1-8gb-512gb-mgpd3sa-a-3.jpg', 2, 'Totnhat', 1, '2022-11-28 14:55:45'),
(47, 'PC HP AIO 22-df1042d i5-1135G7/8GB/256GB/Win11', '20590.000', '20590.000', 'Màn hình 21.5”, Full HD, cảm ứng, tái hiện nội dung sắc nét, thao tác dễ dàng\r\nVi xử lý Intel Core i5-1135G7 cho hiệu năng vượt trội với 4 nhân, 8 luồng\r\nRAM 8GB DDR4 giúp máy thực hiện đa nhiệm ổn định, hạn chế giật lag\r\nDung lượng ổ cứng SSD 256GB khởi động máy nhanh, lưu trữ dữ liệu tốt\r\nHệ điều hành Windows 11 Home mang đến trải nghiệm giao diện đẹp mắt\r\nDiện mạo sang trọng, thanh thoát với màu trắng và thiết kế viền mỏng tinh tế', 'pc-hp-aio-22-df1042d-i5-1135g78gb256gbwin11', 1, 50, 'http://localhost/ThreeTech/uploads/10051473-man-hinh-cam-ung.jpg', 'http://localhost/ThreeTech/uploads/10051473-pc-hp-aio-22-df1042d-i5-1135g7-8gb-256gb-win11-601l8pa-2.jpg', 'http://localhost/ThreeTech/uploads/10051473-pc-hp-aio-22-df1042d-i5-1135g7-8gb-256gb-win11-601l8pa-3.jpg', 2, 'Totnhat', 1, '2022-11-28 14:56:53'),
(48, 'PC HP Slim Desktop Bundle i3-10105/4 GB/256 GB/Win11', '10490.000', '9490.000', 'CPU Intel Core i3-1010 thế hệ 10 xử lý tốt tác vụ đồ họa, văn phòng\r\nBộ nhớ trong 256GB chuẩn SSD cung cấp không gian lưu trữ vừa đủ\r\nTiện lợi hơn khi được trang bị đầy đủ các cổng kết nối cho các thiết bị ngoại\r\nKiểu dáng đẹp, thiết kế mỏng tinh tế có thể đặt vừa vặn ở mọi không gian', 'pc-hp-slim-desktop-bundle-i3-101054-gb256-gbwin11', 1, 100, 'http://localhost/ThreeTech/uploads/10052121-pc-hp-slim-desktop-bundle-i3-10105-629t8pa-1.jpg', 'http://localhost/ThreeTech/uploads/10052121-pc-hp-slim-desktop-bundle-i3-10105-629t8pa-2.jpg', 'http://localhost/ThreeTech/uploads/10052121-pc-hp-slim-desktop-bundle-i3-10105-629t8pa-3.jpg', 2, 'Phobien', 1, '2022-11-28 14:59:09'),
(49, 'Ổ cứng di động WD My Passport Ultra 1TB WDBC3C0010BSL-WESN', '2890.000', '1890.000', 'Dung lượng 1TB thoải mái lưu trữ dữ liệu cần thiết\r\nKích thước nhỏ gọn, dễ sử dụng, mang tính di động cao\r\nKết nối USB 3.0, USB Type C, truyền tải dữ liệu nhanh chóng\r\nĐèn LED hiển thị tình trạng kết nối của ổ cứng và thiết bị\r\nCông nghệ mã hóa dữ liệu 256 bit AES bảo đảm bảo mật dữ liệu', 'o-cung-di-dong-wd-my-passport-ultra-1tb-wdbc3c0010bsl-wesn', 1, 50, 'http://localhost/ThreeTech/uploads/10041547-o-cung-wd-my-passport-ultra-wdbc3c0010bsl-wesn-1tb-bac-1.jpg', 'http://localhost/ThreeTech/uploads/10041547-o-cung-wd-my-passport-ultra-wdbc3c0010bsl-wesn-1tb-bac-2.jpg', 'http://localhost/ThreeTech/uploads/10041547-o-cung-wd-my-passport-ultra-wdbc3c0010bsl-wesn-1tb-bac-3.jpg', 3, 'Totnhat', 1, '2022-11-28 15:04:00'),
(50, 'Mainboard ASUS ROG STRIX X670E-I GAMING WIFI', '15499.000', '13499.000', 'ROG Strix X670E-I Gaming WiFi được trang bị công nghệ mới nhất vào diện tích mini-ITX nhỏ bé và sau đó phân nhánh với ROG Hive để đặt các điều khiển quan trọng và I / O trong tầm tay bạn. Ở bo mạch chủ, các khe cắm PCIe 5.0 dành cho đồ họa và lưu trữ cùng với DDR5 kênh đôi để mang lại băng thông quy mô lớn cho các trò chơi và khối lượng công việc đòi hỏi nhiều CPU. Khả năng cung cấp điện năng nặng và các bộ tản nhiệt xếp chồng lên nhau theo chiều dọc sẽ nghiền nát các tấm tản nhiệt và tạo nền tảng vững chắc cho các công cụ ép xung ROG độc quyền để đẩy giới hạn hiệu suất. Với tất cả những điều này và hơn thế nữa, titan nhỏ bé này tạo nên một bản dựng AM5 tiết kiệm không gian cho phép bạn thoải mái lưu trữ các màn hình lớn hơn và một loạt các thiết bị ngoại vi chơi game ROG trên máy tính để bàn của bạn.', 'mainboard-asus-rog-strix-x670e-i-gaming-wifi', 1, 50, 'http://localhost/ThreeTech/uploads/67970_mainboard_asus_rog_strix_x670e_i_gaming_wifi__2_.jpg', 'http://localhost/ThreeTech/uploads/67970_mainboard_asus_rog_strix_x670e_i_gaming_wifi__3_.jpg', 'http://localhost/ThreeTech/uploads/67970_mainboard_asus_rog_strix_x670e_i_gaming_wifi__4_.jpg', 3, 'Totnhat', 1, '2022-11-28 15:06:15'),
(51, 'Ram Desktop Kingston Fury Beast', '2439.000', '1439.000', 'Dòng RAM DDR4 phổ thông với hiệu năng cao\r\nDung lượng: 16GB\r\nSố lượng: 1 thanh (1x16GB)\r\nBus: 3200 Mhz', 'ram-desktop-kingston-fury-beast', 1, 50, 'http://localhost/ThreeTech/uploads/60334_ram_desktop_kingston_fury_kf432c16bb1_16_16gb_1x16gb_ddr4_3200mhz.jpg', 'http://localhost/ThreeTech/uploads/60334_ram_desktop_kingston_fury_kf432c16bb1_16_16gb_1x16gb_ddr4_3200mhz_11.jpg', 'http://localhost/ThreeTech/uploads/60334_ram_desktop_kingston_fury_kf432c16bb1_16_16gb_1x16gb_ddr4_3200mhz_size.jpg', 3, 'Uudai', 1, '2022-11-28 15:07:33'),
(52, 'Ổ cứng SSD Kingston A400 120GB 2.5 inch SATA3', '639.000', '539.000', 'Dung lượng: 120GB\r\nKích thước: 2.5\"\r\nKết nối: SATA 3\r\nTốc độ đọc / ghi (tối đa): 500MB/s / 320MB/s', 'o-cung-ssd-kingston-a400-120gb-25-inch-sata3', 1, 50, 'http://localhost/ThreeTech/uploads/38001_____c___ng_ssd_kingston_a400_120gb_2_5_inch_sata3.jpg', 'http://localhost/ThreeTech/uploads/38001_ssd_kingston_ssd_now_a400_120gb_sata3_25_doc_500mbs_ghi_320mbs_sa400s37120g_size.jpg', 'http://localhost/ThreeTech/uploads/38001_z1973698218814_042549a424754253cb66de4c084f45d7.jpg', 3, 'Uudai', 1, '2022-11-28 15:11:50'),
(53, 'Ổ cứng SSD WD SA510 Blue 1TB SATA 2.5 inch', '3799.000', '2799.000', 'Dung lượng: 1TB\r\nGiao tiếp: SATA III 6 Gb/s\r\nTốc độ: Đọc: 560MB/s/ Ghi: 520MB/s', 'o-cung-ssd-wd-sa510-blue-1tb-sata-25-inch', 1, 50, 'http://localhost/ThreeTech/uploads/67462_o_cung_ssd_wd_sa510_blue_1tb_sata_2__3_.jpg', 'http://localhost/ThreeTech/uploads/67462_o_cung_ssd_wd_sa510_blue_1tb_sata_2__1_.jpg', 'http://localhost/ThreeTech/uploads/67462_o_cung_ssd_wd_sa510_blue_1tb_sata_2__2_.jpg', 3, 'Uudai', 1, '2022-11-28 15:13:04'),
(54, 'Server Dell PowerEdge T150', '35999.000', '31999.000', 'CPU: Intel Xeon E-2324G\r\nRAM: 8GB\r\nHDD: 2TB\r\nDVD: Có\r\nNguồn: 300W', 'server-dell-poweredge-t150', 1, 50, 'http://localhost/ThreeTech/uploads/63701_dell_t150.jpg', 'http://localhost/ThreeTech/uploads/63701_server_dell_poweredge_t150_3.jpg', 'http://localhost/ThreeTech/uploads/63701_server_dell_poweredge_t150_4.jpg', 2, 'Uudai', 1, '2022-11-28 15:14:27'),
(55, 'Laptop Dell Vostro 5620 (70282719)', '26499.000', '23499.000', 'CPU: Intel® Core™ i5-1240P (3.30 GHz up to 4.20 GHz, 12MB)\r\nRAM: 16GB (2x8GB) DDR4 3200MHz\r\nỔ cứng: 512GB M.2 PCIe NVMe SSD\r\nVGA: Intel® Iris® Xe Graphics\r\nMàn hình: 16.0-inch 16:10 FHD+ (1920 x 1200) Anti-Glare Non-Touch 250nits\r\nMàu sắc: Xám\r\nOS: Win 11 Home', 'laptop-dell-vostro-5620-70282719', 1, 50, 'http://localhost/ThreeTech/uploads/66383_hacom_dell_vostro_5620_6.png', 'http://localhost/ThreeTech/uploads/66383_hacom_dell_vostro_5620_4.png', 'http://localhost/ThreeTech/uploads/66383_hacom_dell_vostro_5620_5.png', 1, 'Totnhat', 1, '2022-11-28 15:16:12'),
(57, 'Laptop Dell Inspiron T7420 2 in 1 (N4I5021W)', '24999.000', '22999.000', 'CPU: Intel® Core™ i5-1235U ( up to 4.40 GHz, 12 MB)\r\nRAM: 8GB LPDDR4 3200Mhz onboard\r\nỔ cứng: 512GB SSD NVMe\r\nVGA: Integrated Intel® Iris® XE Graphics\r\nMàn hình: 14 inch FHD (1920 x 1200) Truelife - cảm ứng\r\nMàu sắc: Bạc\r\nOS: Windows 11 Home SL + Microsoft Office Home and Studen 2021', 'laptop-dell-inspiron-t7420-2-in-1-n4i5021w', 1, 50, 'http://localhost/ThreeTech/uploads/67022_laptop_dell_inspiron_t7420_41.png', 'http://localhost/ThreeTech/uploads/67022_laptop_dell_inspiron_t7420_31.png', 'http://localhost/ThreeTech/uploads/67022_laptop_dell_inspiron_t7420_21.png', 1, 'Totnhat', 1, '2022-11-28 15:18:40'),
(59, 'CyberPower PC Brings Intel’s Superb Skylake CPUs To Luxe Series Gaming PCs', '32000.000', '31000.000', 'Hệ thống: Intel Core i5-10400 6 nhân 2.9GHz, Chipset Intel B460, DDR4 8GB, SSD PCI-E NVMe 1TB và Windows 10 Home 64-bit chính hãng\r\nĐồ họa: Card màn hình NVIDIA GeForce GTX 1660 Super 6GB, 1x HDMI & 1x DisplayPort\r\nKết nối: 6 x USB 3.1, 2 x USB 2.0, 1x Mạng RJ-45 Ethernet 10/100/1000, Wi-Fi 802.11AC. Âm thanh: 7.1 Kênh. Bàn phím và chuột\r\nTính năng đặc biệt: Mặt bên bằng kính cường lực. Chiếu sáng vỏ RGB, chuột chơi game 7 màu RGB\r\n1 năm bộ phận & lao động. Hỗ trợ kỹ thuật miễn phí trọn đời', 'cyberpower-pc-brings-intels-superb-skylake-cpus-to-luxe-series-gaming-pcs', 1, 50, 'http://localhost/ThreeTech/uploads/imgbin_gaming-computer-desktop-computers-personal-computer-video-game-png.png', 'http://localhost/ThreeTech/uploads/71DMH6pTSpL__AC_SL1500_.jpg', 'http://localhost/ThreeTech/uploads/71jUBdCF37L__AC_SL1500_.jpg', 2, 'Slide', 1, '2022-11-28 15:35:48'),
(60, 'Apple MacBook Air 13 inch 128GB MQD32', '21000.000', '20000.000', 'Thiết kế mỏng, sang trọng trên Apple MacBook Air 13 inch 128GB MQD32\r\nGiống với những phiên bản MacBook khác của Apple, Apple MacBook Air 13 inch 128GB MQD32 sở hữu thiết kế kim loại nhôm nguyên khối sang trọng với tổng kích thước 32.5 x 22.7 x 1.7 cm và trọng lượng 1.35kg. Thiết kế nhôm nguyên khối màu bạc với các cạnh bo tròn và dát mỏng tạo nên tổng thể chiếc máy một thiết kế tuyệt mỹ, sang trọng và gọn gàng.', 'apple-macbook-air-13-inch-128gb-mqd32', 1, 50, 'http://localhost/ThreeTech/uploads/banner_2_product1.png', 'http://localhost/ThreeTech/uploads/macbook-air-mqd32-1_31.jpg', 'http://localhost/ThreeTech/uploads/macbook-air-mqd32-2_31.jpg', 1, 'Slide', 1, '2022-11-28 15:37:34'),
(61, 'Gigabyte Nvidia GeForce GTX 960 Graphic Card GVN960G1GAMING4GD', '5000.000', '4600.000', 'Được cung cấp bởi GPU NVIDIA GeForce GTX 950\r\nHệ thống làm mát WINDFORCE 2X Được\r\ntích hợp với bộ nhớ 2GB GDDR5 128-bit\r\nĐược xây dựng với 6+1 pha điện\r\nÉp xung siêu tốc bằng một cú nhấp chuột (OC GURU)\r\nCore\r\nBoost: 1355MHz/ Base: 1165MHz ở Chế độ\r\nép xung Boost: 1329MHz/ Base: 1140MHz ở Chế độ chơi game', 'gigabyte-nvidia-geforce-gtx-960-graphic-card-gvn960g1gaming4gd', 1, 50, 'http://localhost/ThreeTech/uploads/imgbin_graphics-cards-amp-video-adapters-evga-geforce-gtx-960-supersc-acx-2-0-graphics-card-png.png', 'http://localhost/ThreeTech/uploads/imgbin_graphics-cards-amp-video-adapters-evga-geforce-gtx-960-supersc-acx-2-0-graphics-card-png1.png', 'http://localhost/ThreeTech/uploads/imgbin_graphics-cards-amp-video-adapters-evga-geforce-gtx-960-supersc-acx-2-0-graphics-card-png2.png', 3, 'Slide', 1, '2022-11-28 15:40:22'),
(62, 'Bang & Olufsen Beoplay H9i', '16800.000', '15800.000', 'ÂM THANH\r\nTính thường xuyên\r\n20 – 22.000 Hz\r\n\r\nCái mic cờ rô\r\n2 MEMS Mic thoại kỹ thuật số 4 Micrô điện tử chuyên dụng cho chức năng ANC (2 Micrô điện tử trong mỗi chụp tai)\r\n\r\nKhử tiếng ồn chủ động\r\nCó công nghệ Khử tiếng ồn chủ động (ANC) kết hợp. Hai micrô, một micrô được đặt ở bên ngoài đệm tai và một micrô được đặt ở bên trong, ngay phía trước loa, giúp đảo ngược tiếng ồn xung quanh – loại bỏ hiệu quả các yếu tố không mong muốn.\r\n\r\nDiễn giả\r\nTrình điều khiển điện động, đường kính 40 mm\r\n\r\ntrở kháng\r\n24 Ôm +/- 15%', 'bang-olufsen-beoplay-h9i', 1, 50, 'http://localhost/ThreeTech/uploads/deals.png', 'http://localhost/ThreeTech/uploads/best_3.png', 'http://localhost/ThreeTech/uploads/review_3.jpg', 3, 'Noibatmoi', 1, '2022-11-28 16:13:00'),
(63, 'Canon Ixus 185', '32000.000', '29000.000', 'Phạm vi thu phóng quang:   28 - 224 mm = 8x\r\nKích thước cảm biến hiệu dụng:   8 mm (1/2,3 inch)\r\nCanon Ixus 185 là một chiếc máy ảnh nhỏ gọn đơn giản với các chức năng bình thường: không có gì đặc biệt. Kích thước bỏ túi này dễ dàng cầm bằng một tay. Các nút được đặt tốt và có kích thước tốt. Máy ảnh trông giống như nhựa. Micrô ở một nơi khó xử; bên cạnh cần zoom. Mẫu này tương thích với Eye-Fi và có 3 màu.', 'canon-ixus-185', 1, 50, 'http://localhost/ThreeTech/uploads/new_10.jpg', 'http://localhost/ThreeTech/uploads/ixus-185_b10.png', 'http://localhost/ThreeTech/uploads/ixus-185_b9.png', 3, 'Audiovideo', 1, '2022-11-28 16:36:13'),
(64, 'Loa SPK-103', '1200.000', '900.000', 'ÂM NHẠC Ở KHẮP MỌI NƠI\r\nPhù hợp với bất kỳ túi nào - thưởng thức âm nhạc của bạn khi đang di chuyển\r\nNghe hàng giờ chỉ với một lần sạc pin\r\nHoàn hảo cho mọi máy nghe nhạc, điện thoại di động, máy tính bảng hoặc máy tính xách tay', 'loa-spk-103', 1, 50, 'http://localhost/ThreeTech/uploads/1.jpg', 'http://localhost/ThreeTech/uploads/2.jpg', 'http://localhost/ThreeTech/uploads/3.jpg', 2, 'Audiovideo', 1, '2022-11-28 23:49:24'),
(65, 'Sạc dự phòng Innostyle PowerMag Slim 10000mAh Xám IM20PD', '1350.000', '1150.000', 'Thiết kế Snap and Go, cách sử dụng sạc đơn giản và thuận tiện\r\nGắn PowerMag Slim 10000 từ tính vào mặt sau điện thoại để sạc\r\n2 cách sạc thuận tiện: sạc không dây Magsafe và sạc nhanh 20W\r\nTích hợp cổng Lightning, không cần phải mang theo dây cáp rườm rà\r\nHỗ trợ sạc nhanh với công nghệ PD-20W, giúp thiết bị lên 50% trong 30\'\r\nHỗ trợ sạc iPhone 13 & 12 không có ốp lưng hoặc qua ốp Magsafe\r\nChất liệu cao cấp, siêu bền, chống bẩn và đảm bảo an toàn khi sử dụng', 'sac-du-phong-innostyle-powermag-slim-10000mah-xam-im20pd', 1, 50, 'http://localhost/ThreeTech/uploads/10053390-sac-du-phong-innostyle-powermag-slim-10000mah-xam-im20pd-1.jpg', 'http://localhost/ThreeTech/uploads/10053390-sac-du-phong-innostyle-powermag-slim-10000mah-xam-im20pd-2.jpg', 'http://localhost/ThreeTech/uploads/10053390-sac-du-phong-innostyle-powermag-slim-10000mah-xam-im20pd-3.jpg', 3, 'Noibatmoi', 1, '2022-11-28 23:59:11'),
(66, 'Tay cầm game Xbox One S Black', '1799.000', '1399.000', 'Tay cầm game Xbox One S Black\r\nTay bấm game không dây dùng cho PC, Xbox One hoặc các thiết bị di động\r\nTay bấm có thể dùng chế độ có dây và Bluetooth, chỉ cần kết nối tay bấm với máy Xbox One, PC và các thiết bị di động như điện thoại, máy tính bẳng thông qua sóng Bluetooth Hoặc kết nối có dây (dây Micro USB có thể mua ở các cửa hàng điện thoại)', 'tay-cam-game-xbox-one-s-black', 1, 50, 'http://localhost/ThreeTech/uploads/23085_tay_xbox_one_s.jpg', 'http://localhost/ThreeTech/uploads/Tay-cam-xbox-one-s-chinh-hang-co-day-cap-usb-cho-pc-bluetooth-gia-tai-ha-noi-tphcm-shoptaycam_com-01_02.jpg', 'http://localhost/ThreeTech/uploads/tzxplut0jnel4.jpg', 3, 'Noibatmoi', 1, '2022-11-29 00:01:48'),
(67, 'Cáp COM DB25 đực sang đực', '420.000', '220.000', 'Cáp COM DB25 25 chân nối thẳng có hai đầu đực, kích thước 1.5m/3m, lõi cáp thuần đồng chuẩn 28AWG. Bán tại Hà Nội và Online Ship COD TQ\r\n\r\n- Giá chưa bao gồm VAT\r\n\r\n- Bảo hành 3 Tháng\r\n\r\n- Xuất xứ: Trung Quốc', 'cap-com-db25-duc-sang-duc', 1, 50, 'http://localhost/ThreeTech/uploads/932788d3b88e6d9385829341494d7bb1.jpg', 'http://localhost/ThreeTech/uploads/43763453223.jpg', 'http://localhost/ThreeTech/uploads/download.jpg', 3, 'Noibatmoi', 1, '2022-11-29 00:04:30'),
(68, 'Bộ Decor LED Dây RGB Điều Khiển Qua Bluetooth', '865.000', '265.000', 'Bộ Decor LED Dây RGB Điều Khiển Qua Bluetooth là bộ sản phẩm LED trang trí RGB biến căn phòng của quý khách  trở nên lung linh huyển ảo rực rỡ màu sắc\r\nBộ sản phẩm sử dụng LED dây 5050 RGB cao cấp phủ nhựa chống tĩnh điện, chống ẩm, chống ăn mòn bởi môi trường\r\nMặt sau dây LED phủ sẵn 1 lớp keo 3M, tạo sự tiện lợi trong thi công lắp đặt\r\nBộ điều khiển tích hợp công nghệ Bluetooth 4.0 kết nối điều khiển LED bằng ứng dụng điều khiển trên điện thoại di động\r\nỨng dụng điều khiển cho phép khách hàng:\r\nThay đổi hiệu ứng màu sắc của dây LED (đơn sắc, đa sắc,nhấp nháy...)\r\nCài đăt màu sắc của dây LED theo sở thích\r\nĐiều khiển dây LED nháy theo nhạc thông qua Phone Micro hoặc danh sách bài hát tải sẵn trên điện thoại\r\nHẹn giờ bật/tắt dây LED theo ngày và theo tuần\r\nỨng dụng điều khiển sử dụng được cả trên hệ điều hành Android và hệ điều hành IOS', 'bo-decor-led-day-rgb-dieu-khien-qua-bluetooth', 1, 50, 'http://localhost/ThreeTech/uploads/Bluetooth-B-i-u-Khi-n-Nh-c-RGB-Led-D-y-5M-10M-SMD-5050_jpg_Q90_jpg_.jpg', 'http://localhost/ThreeTech/uploads/a54840c06f25081e38e07db5473d1dff.jpg', 'http://localhost/ThreeTech/uploads/f8e1270a5d225568cfe0f1f2dd662411.jpg', 3, 'Noibatmoi', 1, '2022-11-29 00:06:52'),
(69, 'Apple Macbook Pro 13 M2 2022 8GB 256GB', '35590.000', '30590.000', 'Macbook Pro M2 2022 là phiên bản nâng cấp mạnh mẽ của Macbook Pro M1 với nhiều cải tiến vô cùng ấn tượng. Đây sẽ là chiếc laptop mang đến cho người dùng trải nghiệm cực tốt. Từ đó giúp mọi hoạt động giải trí cũng như các công việc nặng như đồ họa, thiết kế đều được xử lý một cách mượt mà và nhanh chóng hơn.\r\n\r\nThiết kế mỏng nhẹ hơn, thời trang hơn', 'apple-macbook-pro-13-m2-2022-8gb-256gb', 1, 50, 'http://localhost/ThreeTech/uploads/hero_13__d1tfa5zby7e6_large00.jpg', 'http://localhost/ThreeTech/uploads/macbook_256.png', 'http://localhost/ThreeTech/uploads/macbook_pro_13-in_m2_chip_silver_1166.jpg', 1, 'Laptopcomputer', 1, '2022-11-29 00:13:03'),
(70, 'iPad Air 5 (2022) 64GB', '16190.000', '15190.000', 'Thiết kế sang trọng - Thiết kế phẳng ở 4 cạnh, màu sắc tươi trẻ\r\nMàn hình cho trải nghiệm chân thực - Tấm nền Retina IPS LCD 10.9 inches, chân thực và sắc nét\r\nKhả năng kết nối phụ kiện tuyệt vời - Dễ dàng kết nối Magic Keyboard và Apple Pencil biến iPad của bạn thành chiếc Laptop hoàn hảo\r\nKhả năng xử lý tác vụ đáng kinh ngạc - Con chip M1 vô cùng mạnh mẽ', 'ipad-air-5-2022-64gb', 1, 50, 'http://localhost/ThreeTech/uploads/1_253_3.jpg', 'http://localhost/ThreeTech/uploads/2_242_3.jpg', 'http://localhost/ThreeTech/uploads/5_158_3.jpg', 2, 'Laptopcomputer', 1, '2022-11-29 00:21:30'),
(71, 'Máy tính để bàn All In One Asus A5401WRAT', '22990.000', '18990.000', 'Máy tính AiO ASUS A5401WRAT BA020T mang đến sức mạnh với khả năng xử lý nhanh chóng nhờ cong chip i5 thế hệ 10 cùng dung lượng RAM lớn.\r\n\r\nNgoài ra, Asus còn trang bị cho sản phẩm lần này của mình một ổ lưu trữ PCIE với dung lượng lên đến 512GB. Nhờ đó không chỉ giúp tốc độ truyền tải dữ liệu nhanh hơn, xử lý các chương trình đa nhiệm một cách trơn tru mà còn mang lại một không gian lưu trữ lớn.', 'may-tinh-de-ban-all-in-one-asus-a5401wrat', 1, 50, 'http://localhost/ThreeTech/uploads/_0000_techzones-asus-zen-aio-24-m5401_1__3_1.jpg', 'http://localhost/ThreeTech/uploads/_0002_techzones-asus-zen-aio-24-m5401_4_1.jpg', 'http://localhost/ThreeTech/uploads/zen_aio_24_a5400_product_photo_1b_10_1_1.jpg', 2, 'Laptopcomputer', 1, '2022-11-29 00:22:46'),
(72, 'Laptop Gaming MSI Bravo 15 B5DD 276VN', '22390.000', '16390.000', 'Chip R5-5600H cùng card rời RX5500M cho khả năng chiến các tựa game nặng, chỉnh sửa hình ảnh trên PTS, Render 3D.\r\nRam 8GB + 1 khe trống cho phép nâng cấp tối đa đến 64GB.\r\nKích thước màn hình 15.6 inches với độ phân giải Full HD mang lại trải nghiệm tuyệt vời, hình ảnh sắc nét.\r\nTản nhiệt 6 ống đồng - Giúp đảm bảo hiệu năng ổn định khi chiến game\r\nTrọng lượng 2.35kg cho cảm giác cầm chắc tay .\r\nMáy đi kèm windows 11 bản quyền.', 'laptop-gaming-msi-bravo-15-b5dd-276vn', 1, 50, 'http://localhost/ThreeTech/uploads/33_6.jpg', 'http://localhost/ThreeTech/uploads/8h42.png', 'http://localhost/ThreeTech/uploads/34_6.jpg', 1, 'Laptopcomputer', 1, '2022-11-29 00:24:02'),
(73, 'Apple Mac mini M1 256GB 2020', '21990.000', '17990.000', 'Vi xử lý M1 mạnh mẽ - Phục vụ tốt cho các tác vụ đồ hoạ như Photoshop, AI, Pr hay các tác vụ về tính toán, lập trình\r\nĐa nhiệm tốt - Ram 8GB cho phép mở cùng lúc nhiều ứng dụng mà vẫn đảm bảo hiệu năng\r\nXử lý nhanh chóng - Ổ cứng SSD 256GB cho tốc độ mở ứng dụng nhanh, phục vụ tốt nhu cầu hằng ngày\r\nKích thước nhỏ gọn - Độ dày 36mm, nặng chỉ 1.2kg giúp bạn dễ dàng mang theo\r\nHỗ trợ nhiều cổng kết nối - 2 cổng Thunderbolt 4 cùng các cổng USB-A, HDMI 2.0, Wi-Fi 6, LAN tiện lợi', 'apple-mac-mini-m1-256gb-2020', 1, 50, 'http://localhost/ThreeTech/uploads/img-apple-main_1.jpg', 'http://localhost/ThreeTech/uploads/mac-mini-202011-gallery-2.jpg', 'http://localhost/ThreeTech/uploads/mac-mini-202011-gallery-5.jpg', 1, 'Laptopcomputer', 1, '2022-11-29 00:25:21'),
(74, 'Máy tính văn phòng All In One văn phòng Asus V241EAT-BA057W', '19690.000', '16690.000', 'CPU Intel Core i3 1115G4 cùng Card Intel UHD đảm bảo mọi tác vụ văn phòng hay xem phim, giải trí,... diễn ra trơn tru\r\nRAM 4 GB cho khả năng đa nhiệm tốt. SSD 512 GB cho không gian lưu trữ đủ dùng, thời gian phản hồi nhanh\r\nMàn hình cảm ứng 23.8 inch với công nghệ Wide View cung cấp góc nhìn rộng mở cùng độ phủ màu đạt 100% sRGB\r\nĐa dạng cổng giao tiếp với 2 x HDMI, 4 x USB 3.2, Jack tai nghe 3.5 mm, LAN (RJ45), USB 2.0\r\nThiết kế sang trọng, tinh tế nhưng gọn gàng, phù hợp cho mọi không gian làm việc', 'may-tinh-van-phong-all-in-one-van-phong-asus-v241eat-ba057w', 1, 50, 'http://localhost/ThreeTech/uploads/1_74_21.jpg', 'http://localhost/ThreeTech/uploads/2_68_19.jpg', 'http://localhost/ThreeTech/uploads/4_44_21.jpg', 2, 'Laptopcomputer', 1, '2022-11-29 00:26:46'),
(75, 'Loa JBL Partybox On The Go', '7990.000', '5990.000', 'Công suất 100W cùng công nghệ Bass Boost mang tới âm bass mạnh mẽ\r\nThoả sức Karaoke với 2 Micro được tặng kèm cùng loa\r\nDung lượng pin 6 giờ sử dụng\r\nChuẩn chống nước IPX4 bảo vệ loa khỏi tác động nước nhẹ\r\nTrải nghiệm âm thanh Stereo với chức năng ghép cặp loa', 'loa-jbl-partybox-on-the-go', 1, 50, 'http://localhost/ThreeTech/uploads/loa-jbl-partybox-on-the-go-2.jpg', 'http://localhost/ThreeTech/uploads/loa-jbl-partybox-on-the-go-1.jpg', 'http://localhost/ThreeTech/uploads/loa-jbl-partybox-on-the-go-6.jpg', 3, 'Audiovideo', 1, '2022-11-29 00:28:35'),
(76, 'Chuột Apple Magic Mouse 2021 MK2E3', '2690.000', '1690.000', 'Thiết kế mỏng nhẹ tạo cảm giác thoải mái khi sử dụng\r\nĐiều khiển cảm ứng thông minh trên bề mặt Multi-Touch\r\nKết nối không dây Bluetooth trong khoảng cách 10m\r\nĐộ phân giải đến 1600 DPI giúp rê chuột mượt mà hơn', 'chuot-apple-magic-mouse-2021-mk2e3', 1, 50, 'http://localhost/ThreeTech/uploads/chuot-apple-magic-mouse-2021-4.jpg', 'http://localhost/ThreeTech/uploads/chuot-apple-magic-mouse-2021-3.jpg', 'http://localhost/ThreeTech/uploads/chuot-apple-magic-mouse-2021-2.jpg', 3, 'Noibatmoi', 1, '2022-11-29 00:30:02'),
(77, 'Loa Bluetooth Harman Kardon Onyx Studio 8', '7990.000', '6990.000', 'Thiết kế độc đáo, thu hút ngay từ ánh nhìn đầu tiên với 3 màu sắc sang trọng\r\nÂm thanh chi tiết kết hợp 2 loa treble và 1 bass thụ động dạng đường\r\nKết nối không dây qua công nghệ Bluetooth 5.0 ổn định\r\nPin lên tới 8 giờ sử dụng liên tục\r\nGhép nối dễ dàng 2 loa với nhau bằng công nghệ Harman Kardon wireless Dual Sound', 'loa-bluetooth-harman-kardon-onyx-studio-8', 1, 50, 'http://localhost/ThreeTech/uploads/loa-harman-kardon-onyx-studio-8-sap-ra-mat-p7883-1649991715666_1_.jpg', 'http://localhost/ThreeTech/uploads/download_37__2_2.png', 'http://localhost/ThreeTech/uploads/download_38_.png', 3, 'Audiovideo', 1, '2022-11-29 00:31:34'),
(78, 'Micro thu âm AKG P220', '6900.000', '4900.000', 'Micro thu âm AKG P220 được chế tạo với lớp màng tạo âm trầm hiện đại, giúp cho chất lượng âm thanh thu được có độ ấm tốt và nghe êm dịu tai. Đặc biệt, bên trong micro thu âm AKG P220 còn trang bị bộ lọc cắt bass với đệm giảm ồn giúp duy trì âm thanh giọng nói ở mức lên đến 155dB, đồng thời lọc ra tạp âm không cần thiết để giữ lại chất giọng chuyên nghiệp chất lượng cao.', 'micro-thu-am-akg-p220', 1, 50, 'http://localhost/ThreeTech/uploads/AKG-P220-2_21213201832416_b_.jpg', 'http://localhost/ThreeTech/uploads/7lMlwDEwD49R.jpg', 'http://localhost/ThreeTech/uploads/micro-thu-am-akg-p220.jpg', 3, 'Audiovideo', 1, '2022-11-29 00:33:04'),
(79, 'Bộ trộn âm thanh Soundcraft SCR Notepad 5CH', '5000.000', '3000.000', 'Bộ trộn âm thanh Soundcraft SCR Notepad 5CH với thiết kế kim loại rất bền bỉ, dễ dàng điều khiển và sử dụng. Thiết bị có 2 bảng điều khiển EQ cho mỗi kênh, một thiết kế thường thấy trên các bảng điều khiển lớn hơn. Trang bị đèn LED hiển thị mức âm tổng giúp kiểm soát tín hiệu đầu ra tốt hơn.', 'bo-tron-am-thanh-soundcraft-scr-notepad-5ch', 1, 50, 'http://localhost/ThreeTech/uploads/bo-tron-am-thanh-soundcraft-notepad-5ch-2.jpg', 'http://localhost/ThreeTech/uploads/bo-tron-am-thanh-soundcraft-notepad-5ch-3.jpg', 'http://localhost/ThreeTech/uploads/bo-tron-am-thanh-soundcraft-notepad-5ch-4.jpg', 3, 'Audiovideo', 1, '2022-11-29 00:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
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
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`tinTucId`, `anhChinh`, `tieuDe`, `trichDan`, `noiDung`, `nhanVienId`, `ngayDang`, `duongDan`) VALUES
(1, 'http://localhost/ThreeTech/static/images/blog_5.jpg', 'Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.\n', 'Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin. Praesent at tempus lectus, eleifend blandit felis. Fusce augue arcu, consequat a nisl aliquet, consectetur elementum turpis. Donec iaculis lobortis nisl, et viverra risus imperdiet eu. Etiam mollis posuere elit non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quis arcu a magna sodales venenatis. Integer non diam sit amet magna luctus mollis ac eu nisi. In accumsan tellus ut dapibus blandit.\n\nPraesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis non est et, eleifend elementum ante. Nunc id pharetra magna. Praesent vel orci ornare, blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 1, '2022-08-29 19:40:14', 'bai-viet-tin-dau-tien');

-- --------------------------------------------------------

--
-- Table structure for table `vnpay`
--

CREATE TABLE `vnpay` (
  `khachHangId` int(11) NOT NULL,
  `madonhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sotien` float NOT NULL,
  `noidung` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nganhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thoigian` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `magiaodich` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vnpay`
--

INSERT INTO `vnpay` (`khachHangId`, `madonhang`, `sotien`, `noidung`, `nganhang`, `thoigian`, `magiaodich`) VALUES
(2, '1669285200', 1629000, 'thanh toan vnpay', 'NCB', '20221124172046', '13886419'),
(2, '1669288928', 1629000, 'thanh toan vnpay', 'NCB', '20221124182241', '13886509'),
(2, '1669288928', 1629000, 'thanh toan vnpay', 'NCB', '20221124182241', '13886509'),
(2, '1669288928', 1629000, 'thanh toan vnpay', 'NCB', '20221124182241', '13886509'),
(2, '1669288928', 1629000, 'thanh toan vnpay', 'NCB', '20221124182241', '13886509'),
(2, '1669288928', 1629000, 'thanh toan vnpay', 'NCB', '20221124182241', '13886509'),
(2, '1669288928', 1629000, 'thanh toan vnpay', 'NCB', '20221124182241', '13886509'),
(2, '1669288928', 1629000, 'thanh toan vnpay', 'NCB', '20221124182241', '13886509'),
(2, '1669288928', 1629000, 'thanh toan vnpay', 'NCB', '20221124182241', '13886509'),
(2, '1669290266', 1629000, 'thanh toan vnpay', 'NCB', '20221124184455', '13886517'),
(2, '1669290266', 1629000, 'thanh toan vnpay', 'NCB', '20221124184455', '13886517'),
(2, '1669292418', 3118000, 'thanh toan vnpay', 'NCB', '20221124192052', '13886540'),
(2, '1669292418', 3118000, 'thanh toan vnpay', 'NCB', '20221124192052', '13886540'),
(2, '1669292418', 3118000, 'thanh toan vnpay', 'NCB', '20221124192052', '13886540'),
(2, '1669292418', 3118000, 'thanh toan vnpay', 'NCB', '20221124192052', '13886540'),
(2, '1669292418', 3118000, 'thanh toan vnpay', 'NCB', '20221124192052', '13886540'),
(2, '1669292418', 3118000, 'thanh toan vnpay', 'NCB', '20221124192052', '13886540'),
(2, '1669292418', 3118000, 'thanh toan vnpay', 'NCB', '20221124192052', '13886540'),
(2, '1669293665', 4887000, 'thanh toan vnpay', 'NCB', '20221124194130', '13886551'),
(2, '1669293665', 4887000, 'thanh toan vnpay', 'NCB', '20221124194130', '13886551'),
(2, '1669293665', 4887000, 'thanh toan vnpay', 'NCB', '20221124194130', '13886551'),
(2, '1669340720', 1629000, 'thanh toan vnpay', 'NCB', '20221125084544', '13886706'),
(2, '1669340720', 1629000, 'thanh toan vnpay', 'NCB', '20221125084544', '13886706'),
(2, '1669340720', 1629000, 'thanh toan vnpay', 'NCB', '20221125084544', '13886706'),
(2, '1669340720', 1629000, 'thanh toan vnpay', 'NCB', '20221125084544', '13886706'),
(2, '1669340720', 1629000, 'thanh toan vnpay', 'NCB', '20221125084544', '13886706'),
(2, '1669340720', 1629000, 'thanh toan vnpay', 'NCB', '20221125084544', '13886706'),
(2, '1669340720', 1629000, 'thanh toan vnpay', 'NCB', '20221125084544', '13886706');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chamcong`
--
ALTER TABLE `chamcong`
  ADD PRIMARY KEY (`chamCongId`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`chitiethoadonID`);

--
-- Indexes for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`chuyenMucId`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`gioHangId`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`khachHangId`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`nhanVienId`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`sanPhamId`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`tinTucId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chamcong`
--
ALTER TABLE `chamcong`
  MODIFY `chamCongId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  MODIFY `chitiethoadonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `chuyenMucId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `gioHangId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachHangId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nhanVienId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanPhamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tinTucId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
