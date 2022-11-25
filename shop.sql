-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 02:24 PM
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
-- Database: `shop`
--

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
  `khachHangId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `hoaDonId` int(11) NOT NULL,
  `sanPhamId` int(11) NOT NULL,
  `khachHangId` int(11) NOT NULL,
  `thoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'nam', '22c78aadb8d25a53ca407fae265a7154', 'Chu Minh Nam', '0379962045', 'Hà Nội');

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
(1, 'chuminhnam', '206dcce3f82cf8981d316e7900dc8e06', 'Chu Minh Nam', 'admin', '0379962045', 'chuminhnamma@gmail.com', 'https://www.facebook.com/laptrinhtudau/', 'http://localhost/ThreeTech/uploads/7fbd358456182187c2fbb04861816da2.jpg');

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
(1, 'Laptop Asus TUF Gaming FX506LHB-HN188W i5 10300H/8GB/512GB/15.6', '19990.000', '16290.000', '15.6 inch, 1920 x 1080 Pixels, IPS, 144 Hz, Anti-glare LED-backlit\r\n\r\nIntel, Core i5, 10300H\r\n\r\n8 GB (1 thanh 8 GB), DDR4, 2933 MHz\r\n\r\nSSD 512 GB\r\n\r\nNVIDIA GeForce GTX 1650 4GB; Intel UHD Graphics', 'asus-tuf-gaming-fx506lhb-hn188w-i5-10300h', 1, 30, 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/26/637788079927538825_asus-tuf-gaming-fx506lh-den-2022-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/26/637788079927538825_asus-tuf-gaming-fx506lh-den-2022-1.jpg', 'https://images.fpt.shop/unsafe/fit-in/800x800/filters:quality(90):fill(white):upscale()/fptshop.com.vn/Uploads/Originals/2022/1/26/637788079927538825_asus-tuf-gaming-fx506lh-den-2022-2.jpg', 1, 'Uudai', 1, '2022-08-29 19:25:29'),
(2, 'PC GAMING HACOM 034 (I3 10105F/H510/8GB RAM/500GB SSD/GTX 1050TI/450W)', '13999.000', '10199.000', 'CPU: Intel Core i3 10105F\r\nMainboard: H510\r\nRAM: 8GB\r\nSSD: 500GB\r\nVGA: GTX 1050Ti\r\nPSU: 450W', 'pc-gaming-hacom-034', 1, 50, 'https://hanoicomputercdn.com/media/product/64227_pcgm452_18_001.jpg', 'https://hanoicomputercdn.com/media/product/64227_pcgm452_18_001.jpg', 'https://hanoicomputercdn.com/media/product/64227_pcgm452_18_001.jpg', 2, 'Uudai', 1, '2022-08-29 19:25:29'),
(3, 'Mainboard ASUS ROG MAXIMUS Z690 FORMULA (Intel Z690, Socket 1700, ATX, 4 khe RAM DDR5)', '21199.000', '16999.000', 'Chipset: Intel Z690\r\nSocket: LGA 1700\r\nSố khe RAM: 4 (DDR5)\r\nKích thước: ATX\r\nTích hợp sẵn Wifi & Bluetooth', 'mainboard-asus-rog-maximus', 1, 25, 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_2.jpg', 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_size.jpg', 'https://hanoicomputercdn.com/media/product/61219_mainboard_asus_rog_maximus_z690_formula_intel_z690_socket_1700_atx_4_khe_ram_ddr5_1.jpg', 3, 'Uudai', 1, '2022-08-29 19:25:29'),
(19, 'Laptop Lenovo IdeaPad Slim 5', '18790.000', '14890.000', '15.6 inch, 1920 x 1080 Pixels, IPS, 60 Hz, 300 nits, IPS LCD LED Backlit, True Tone\r\nIntel, Core i5, 1135G7\r\n8 GB, DDR4, 3200 MHz\r\nSSD 512 GB\r\nIntel Iris Xe Graphics', 'laptop-lenovo-ideapad-slim-5', 1, 33, 'http://localhost/ThreeTech/uploads/lenovo-ideapad-slim-5-15itl05-i5-82fg001pvn-144320-064322-600x600.jpg', 'http://localhost/ThreeTech/uploads/58429_idealpad5__3_.png', 'http://localhost/ThreeTech/uploads/bbfafef4382f9f0910230636f4712988.jpg', 1, 'Uudai', 1, '2022-08-29 22:15:18'),
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
(33, 'CPU Intel Core i7-11700', '8499.000', '8350.000', 'Socket: FCLGA1200\r\nSố lõi/luồng: 8/16\r\nTần số cơ bản/turbo: 2.50/4.90 GHz\r\nBộ nhớ đệm: 16MB\r\nĐồ họa tích hợp: Intel® UHD Graphics 750\r\nBus ram hỗ trợ: DDR4-3200Mhz\r\nMức tiêu thụ điện: 65 W', 'cpu-intel-core-i7-11700', 1, 40, 'http://localhost/ThreeTech/uploads/42978_cpu_int_11700f_a.jpg', '', '', 3, 'Khonguudai', 1, '2022-09-09 14:37:56');

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

--
-- Indexes for dumped tables
--

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
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`hoaDonId`);

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
-- AUTO_INCREMENT for table `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `chuyenMucId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `gioHangId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `hoaDonId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `khachHangId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `nhanVienId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `sanPhamId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `tinTucId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
