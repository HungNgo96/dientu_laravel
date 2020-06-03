-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2020 at 05:05 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dientu`
--

-- --------------------------------------------------------

--
-- Table structure for table `cauhinhdienthoai`
--

CREATE TABLE `cauhinhdienthoai` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `manhinh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hdh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `camera` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonho` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thongtinkhac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cauhinhdienthoai`
--

INSERT INTO `cauhinhdienthoai` (`id`, `id_sanpham`, `manhinh`, `hdh`, `camera`, `cpu`, `ram`, `bonho`, `pin`, `thongtinkhac`) VALUES
(2, 25, '6.3 inches (1440 x 2960 pixels)', 'Android 8.0', '8MP/12MP', 'Lõi Tám (lõi Tứ 2.3GHz + lõi Tứ 1.7GHz), 64 bit', '6GB', '64 GB', 'Li-Ion', 'Tích hợp bút S-Pen'),
(3, 26, 'Super AMOLED capacitive touchscreen, 5.8 inch HD', 'IOS', '7MP/ 2 camera 12MP', 'Apple A11 Bionic 6 nhân', '3GB', '256GB', 'Pin chuẩn Li-Ion', 'Chống nước, chống bụi, Face ID'),
(4, 27, '5.5 inch, Full HD (1080 x 1920 pixels)', 'IOS', '5MP/ 12MP', 'Apple A9 2 nhân 64-bit', '2GB', '32GB', 'Pin chuẩn Li-Ion', 'Mở khóa bằng vân tay'),
(5, 29, '6 inch (FHD+ 2160 x 1080)', 'Android', '16MP / 12MP + 12MP', 'Qualcomm SDM660 Snapdragon 660', '4GB', '64GB', 'Lion 3800mAh', 'Mở khóa bằng vân tay'),
(6, 30, '5.5 inch, Full HD (1080 x 1920 pixels)', 'Android 8.0', '8MP/ 16MP', 'Qualcomm Snapdragon 630 8 nhân 64 bit', '3GB', '32GB', 'Pin chuẩn Li-Ion 3000mAh', 'Mở khóa bằng vân tay, Ghi âm OZO');

-- --------------------------------------------------------

--
-- Table structure for table `cauhinhmaytinh`
--

CREATE TABLE `cauhinhmaytinh` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `manhinh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hdh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `congketnoi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bonho` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thongtinkhac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cauhinhmaytinh`
--

INSERT INTO `cauhinhmaytinh` (`id`, `id_sanpham`, `manhinh`, `hdh`, `cpu`, `ram`, `vga`, `congketnoi`, `bonho`, `pin`, `thongtinkhac`) VALUES
(2, 2, 'Screen: 12.3\" PixelSense Display', 'Windows 10 Pro 64 bit', 'Intel 7th Gen Core m3', '8 GB', 'Intel HD Graphics 615 (m3)', 'Full-size USB 3.0,mini DisplayPort 1.2', '256GB', '47 WH', 'Không có'),
(3, 3, '15.6 full HD', 'windows 10', 'I7-6700 HQ', '8GB', 'GTX 1050 TI', 'HDMI,3 USB 3.0', '1 TB, 128 SSD', '70 Wh', 'Không có'),
(13, 14, '15.6\" FHD (1920 x 1080) IPS, 60Hz, Anti-Glare', 'Free DOS', 'Intel Core i7-8750H 2.2GHz up to 4.1GHz 9MB', '8GB DDR4 2666MHz (2x SO-DIMM socket, up to 32GB SDRAM)', 'NVIDIA GeForce GTX 1060 6GB GDDR5', '2x USB 2.0, 1x USB 3.0, 1x USB 3.1 Type C, 1x HDMI', 'HDD 1TB 5400rpm + 128GB SSD M.2 SATA', '4 Cell 48 WHrs', 'Không có'),
(14, 15, '15.6\" FHD (1920 x 1080) IPS Non-Glare, 100% sRGB, 144Hz/3ms, 300nits', 'Windows 10 Home', 'Intel Core i7-8750H 2.2GHz up to 4.1GHz 9MB', '16GB DDR4 2666MHz (2x SO-DIMM socket, up to 32GB SDRAM)', 'NVIDIA GeForce GTX 1070 8GB GDDR5', '2x USB 3.1, 1x USB 3.1 Gen 2, 1x USB 3.1 Gen 2 (Type-C), mDP 1.2, HDMI, RJ-45', 'SSHD 1TB 5400rpm (8GB Cache) + 512GB SSD PCIE G3X4', '4 Cell 66WHrs', 'Không có'),
(17, 18, '13.3 inch Retina (2560 x 1600) Diagonal LED-backlit, IPS', 'macOS Mojave', 'Intel Core i5 8th 1.6GHz dual-core (Turbo Boost up to 3.6GHz)', '8GB 2133MHz LPDDR3', 'Intel UHD Graphics 617', '2 x Thunderbolt 3', '128GB SSD', 'Sử dụgn tối đa 10 tiếng', NULL),
(18, 19, '13.3 inch', 'mac', 'Intel Core i5 2.3GHz', '8GB', 'Intel Graphics 640', 'HDMI,USB 3.0', '256SSD', 'Sử dụgn 10 tiếng', NULL),
(20, 21, '13.3\" FHD LED Display (1920 x 1080)', 'Windows 10 Home', 'Intel® Core™ i5 Processor 6200U (2.30 GHz up to 2.80GHz 3 MB L3 Cache)', '8GB LPDDR3 Memory at 1866MHz (on BD 8GB)', 'Onbroad', '1 mini VGA (Adpater type),1 Micro HDMI,2 USB3.0', '128GB Solid-state drive', '30Wh', NULL),
(21, 22, '15.6\" FHD LED Display (1920 x 1080), Anti-Glare', 'DOS', 'Intel® Core™ i3 Processor 6006U (2.00 GHz 3 MB L3 Cache)', '4GB DDR4 Memory (4GB x 1) 2 SODIMM', 'Intel® HD Graphics 520', '1 HDMI 1 USB3.0, 2 USB2.0 Headphone out/Mic-in Combo 1 RJ45 (LAN) 1 DC-in', '500GB Hard Disk Drive (5400RPM)', '43Wh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL,
  `dongia` decimal(19,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`id`, `id_donhang`, `id_sanpham`, `soluong`, `dongia`) VALUES
(2, 1, 18, 1, '31990000'),
(3, 2, 29, 1, '5670000'),
(4, 3, 2, 1, '19700000'),
(5, 3, 3, 1, '23900000'),
(6, 3, 15, 2, '62000000'),
(7, 3, 29, 1, '5670000'),
(8, 4, 3, 1, '23900000'),
(9, 4, 26, 1, '24790000'),
(10, 5, 26, 1, '24790000'),
(11, 5, 14, 1, '30000000'),
(12, 6, 15, 1, '62000000'),
(13, 7, 3, 1, '23900000'),
(14, 8, 26, 1, '24790000'),
(15, 9, 29, 1, '5670000'),
(16, 10, 2, 1, '19700000'),
(17, 11, 29, 1, '5670000'),
(18, 12, 25, 1, '13990000'),
(19, 13, 15, 1, '62000000'),
(20, 14, 2, 1, '19700000'),
(21, 15, 29, 1, '5670000'),
(22, 16, 29, 1, '5670000'),
(23, 17, 21, 1, '23000000'),
(24, 18, 2, 1, '19700000'),
(25, 19, 15, 1, '62000000'),
(26, 20, 18, 1, '31990000'),
(27, 21, 18, 1, '31990000'),
(28, 22, 18, 2, '31990000'),
(29, 23, 29, 1, '5670000');

-- --------------------------------------------------------

--
-- Table structure for table `chitietkhuyenmai`
--

CREATE TABLE `chitietkhuyenmai` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `id_khuyenmai` int(11) UNSIGNED NOT NULL,
  `dongia_giamgia` decimal(19,0) NOT NULL,
  `ngaytao` datetime NOT NULL,
  `trangthai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chitietkhuyenmai`
--

INSERT INTO `chitietkhuyenmai` (`id`, `id_sanpham`, `id_khuyenmai`, `dongia_giamgia`, `ngaytao`, `trangthai`) VALUES
(1, 2, 1, '18900000', '2018-12-25 23:34:03', 1),
(2, 3, 1, '23900000', '2018-12-25 23:22:09', 0),
(4, 14, 1, '30000000', '2019-01-22 11:10:40', 0),
(6, 30, 1, '3999000', '2018-12-25 12:33:23', 0),
(8, 29, 3, '5670000', '2019-01-01 14:23:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dongsanpham`
--

CREATE TABLE `dongsanpham` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_hangsanxuat` int(11) UNSIGNED NOT NULL,
  `tendongsanpham` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dongsanpham`
--

INSERT INTO `dongsanpham` (`id`, `id_hangsanxuat`, `tendongsanpham`) VALUES
(8, 3, 'Asus Republic of Gamers'),
(9, 3, 'Asus Vivobook S Series'),
(10, 3, 'Asus Zenbook UX series'),
(11, 3, 'Asus-Transformer-Book'),
(12, 2, 'HP Pavilion'),
(13, 2, 'HP ProBook'),
(14, 2, 'HP Gaming\r\n'),
(15, 2, 'HP Elitebook & Workstation'),
(16, 5, 'MacBook 12\r\n\r\n'),
(17, 5, 'Macbook Pro'),
(18, 5, 'MacBook Air');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `tongtien` decimal(19,0) NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` int(11) NOT NULL,
  `ngaydat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`id`, `id_user`, `tongtien`, `diachi`, `trangthai`, `ngaydat`) VALUES
(1, 9, '52380000', 'Nguyễn Tri Phương', 3, '2019-01-16 11:28:11'),
(2, 2, '5670000', 'Phan Châu Trinh', 3, '2019-01-16 13:02:32'),
(3, 7, '173270000', '189 An Dương Vương', 3, '2019-01-16 17:50:32'),
(4, 7, '48690000', '121 Nguyễn Văn Luông', 4, '2019-01-16 18:00:28'),
(5, 7, '54790000', '220 Phùng Tá Chu', 3, '2019-01-16 18:17:51'),
(6, 7, '62000000', 'Nguyễn Văn Sỉ', 3, '2019-01-16 18:30:54'),
(7, 7, '23900000', '200 Nguyễn Văn Luông', 3, '2019-01-16 18:33:23'),
(8, 7, '24790000', '200 Nguyễn Văn Luông', 3, '2019-01-16 18:39:52'),
(9, 7, '5670000', '89 Bà Hom', 3, '2019-01-16 18:42:08'),
(10, 7, '19700000', '36 Đường số 7', 3, '2019-01-16 18:44:45'),
(11, 7, '5670000', '90 Hậu Giang', 3, '2019-01-16 18:46:08'),
(12, 7, '13990000', '201 Tỉnh lộ 10', 3, '2019-01-16 18:46:34'),
(13, 7, '62000000', '90 Hậu Giang', 3, '2019-01-16 18:48:02'),
(14, 7, '19700000', '90 Hậu Giang', 3, '2019-01-16 18:52:41'),
(15, 7, '5670000', '90 Hậu Giang', 3, '2019-01-16 18:54:12'),
(16, 7, '5670000', '90 Hậu Giang', 3, '2019-01-16 18:56:12'),
(17, 7, '23000000', '90 Hậu Giang', 3, '2019-01-16 18:58:27'),
(18, 7, '19700000', '90 Hậu Giang', 3, '2019-01-16 19:00:42'),
(19, 7, '62000000', '90 Hậu Giang', 3, '2019-01-16 19:03:52'),
(20, 2, '31990000', 'dd', 3, '2019-01-18 13:10:19'),
(21, 2, '31990000', 'Hậu giang', 3, '2019-01-19 10:38:24'),
(22, 2, '63980000', '180 Cao Lỗ', 3, '2019-01-21 21:24:47'),
(23, 2, '5670000', 'Cao lo', 4, '2019-01-22 09:35:58'),
(24, 11, '224290000', 'asd', 3, '2019-01-22 11:06:46'),
(25, 2, '387410000', 'abc', 3, '2019-01-22 11:06:55');

-- --------------------------------------------------------

--
-- Table structure for table `giaohang`
--

CREATE TABLE `giaohang` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `id_nhanvien` int(11) UNSIGNED NOT NULL,
  `ngaygiao` date NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giaohang`
--

INSERT INTO `giaohang` (`id`, `id_donhang`, `id_nhanvien`, `ngaygiao`, `trangthai`) VALUES
(1, 2, 6, '2019-01-18', 0),
(2, 5, 1, '2019-01-21', 0),
(3, 4, 10, '2019-01-19', 0),
(4, 7, 1, '2019-01-19', 0),
(5, 21, 1, '2019-01-23', 0),
(6, 1, 1, '2019-01-22', 0),
(7, 3, 2, '2019-01-22', 0),
(8, 6, 24, '2019-01-23', 0),
(9, 8, 2, '2019-01-23', 0),
(10, 9, 1, '2019-01-25', 0),
(11, 10, 6, '2019-01-22', 0),
(12, 11, 24, '2019-01-23', 0),
(13, 12, 1, '2019-01-25', 0),
(14, 13, 24, '2019-01-26', 0),
(15, 14, 26, '2019-01-24', 0),
(16, 15, 2, '2019-01-22', 0),
(17, 17, 6, '2019-01-25', 0),
(18, 16, 25, '2019-01-25', 0),
(19, 19, 1, '2019-01-27', 0),
(20, 18, 6, '2019-01-23', 0),
(21, 20, 25, '2019-01-22', 0),
(22, 22, 1, '2019-01-22', 0),
(23, 24, 2, '2019-01-25', 0),
(24, 25, 1, '2019-01-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `id` int(11) UNSIGNED NOT NULL,
  `tenhangsanxuat` varchar(191) CHARACTER SET utf8 NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`id`, `tenhangsanxuat`, `logo`) VALUES
(2, 'HP', 'logohp.png'),
(3, 'Asus', 'logoasus.png'),
(4, 'Samsung', 'samsung.png'),
(5, 'Apple', 'logoapple.png'),
(6, 'Acer', '2000px-Acer_2011.svg.png'),
(7, 'Microsoft', 'microsoft-metro-tall.png'),
(8, 'Nokia', 'kisspng-nokia-1600-nokia-105-2017-nokia-130-nokia-phone-5b08e2ee08dee0.9036273815273090380363.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `id` int(11) UNSIGNED NOT NULL,
  `tenkhuyenmai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaytao` date DEFAULT NULL,
  `ngaycapnhat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`id`, `tenkhuyenmai`, `noidung`, `ngaytao`, `ngaycapnhat`) VALUES
(1, 'Dịp noel a', 'Các mặt hàng sản phẩm tạo điều kịp mọi người mua sắp dịp noel và cuối năm', '2018-12-10', '2018-12-31'),
(2, 'Tết nguyên đán', 'Gỉam giá phục phụ dịp nguyên đán.', '2018-12-28', '2018-12-29'),
(3, 'Trung thu', 'Gỉam giá dịp trung thu.', '2018-12-28', '2018-12-29'),
(4, 'Tết nguyên đán', 'đi chơi', '2019-01-22', '2019-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(11) UNSIGNED NOT NULL,
  `tenloai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phanloai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `tenloai`, `phanloai`) VALUES
(1, '2 in 1', 'mt'),
(2, 'Gaming Laptop', 'mt'),
(3, 'Chrome Book', 'mt'),
(4, 'Ios', 'dt'),
(5, 'Khác', ''),
(7, 'Android', 'dt'),
(8, 'Laptop business', 'mt'),
(9, 'Macbook', 'mt'),
(10, 'Notebook', 'mt');

-- --------------------------------------------------------

--
-- Table structure for table `matensanpham`
--

CREATE TABLE `matensanpham` (
  `id` int(11) UNSIGNED NOT NULL,
  `tenmasanpham` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matensanpham`
--

INSERT INTO `matensanpham` (`id`, `tenmasanpham`, `created_at`, `updated_at`) VALUES
(1, 'Máy tính', '2018-10-30 03:52:49', '2018-10-30 03:52:49'),
(2, 'Diện thoại', '2018-10-30 03:52:58', '2018-10-30 03:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_12_17_211705_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mota`
--

CREATE TABLE `mota` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `mota1` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota2` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota3` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mota`
--

INSERT INTO `mota` (`id`, `id_sanpham`, `mota1`, `hinhanh1`, `mota2`, `hinhanh2`, `mota3`, `hinhanh3`) VALUES
(2, 2, 'Sau Surface Laptop, Microsoft tiếp tục ra mắt thế hệ mới của Surface Pro 4 với tên gọi đơn giản là Surface Pro. Máy vẫn giữ nguyên kích thước như model cũ với màn hình 12,3 inch. Màn hình IPS gương độ phân giải 2.736 x 1.824 pixel cảm ứng 10 điểm, tương thích với Surface Dial và bút Surface Pen với 4.096 độ nhạy khác nhau.', '1.png', 'Surface Pro vẫn sử dụng cơ chế chân gập tạo thành nhiều góc mở linh hoạt. Máy có thể sử dụng như laptop với bàn phím rời có cơ chế hút nam châm hoặc dạng studio. Tablet mới của Microsoft dùng cơ chế tản nhiệt khác biệt so với Surface Pro 4 cho phép máy không cần dùng quạt tản nhiệt với model dùng chip Core m và i5. Máy nhờ vậy hoạt động yên tĩnh hơn. Máy chạy hệ điều hành Windows 10 Pro và thời lượng pin lên tới 13,5 tiếng.', '2.png', 'Surface pro 4 2017 có tùy chọn chip xử lý Intel Core m3, Core i5 và i7 cùng chip đồ họa Intel HD Graphics 615, 620 và Iris Plus Graphics 640 tương ứng. Bộ nhớ RAM tối đa 17 GB và SSD từ 128 đến 1 TB. Surface Pro trang bị camera sau 8 megapixel, trước 5 megapixel, Wi-Fi chuẩn ac, Bluetooth 4.1. Kích thước máy là 292 x 201 x 8,5 mm. Trọng lượng tùy phiên bản từ 768 đến 784 gram.', '3.png'),
(3, 3, 'Trở lại với thiết kế. Vỏ ngoài sản phẩm sử dụng chất liệu nhựa kết hợp sợi carbon để đảm bảo độ bền và sự gọn nhẹ. Biểu tượng đặc trưng của dòng Omen và các họa tiết cách điệu thành chữ X, tạo sự nhấn nhá thú vị. Đáng tiếc đây chỉ là các họa tiết trang trí đơn thuần, nếu có thêm LED nền sẽ mang lại hiệu ứng ánh sáng ấn tượng hơn khi sử dụng vào ban đêm.', 'a.png', 'Phần tiếp giáp với bản lề mỗi cạnh bên cũng lấy ý tưởng từ họng xả của động cơ phản lực. Nếu lướt sơ, bạn dễ nhầm tưởng đây là khe tản nhiệt, vị trí để lấy không khí vào làm mát các linh kiện phần cứng bên trong. Tuy nhiên nó chỉ mang tính trang trí và góp phần thể hiện sự hấp dẫn của mẫu laptop chuyên game. Khu vực quanh bàn phím và vùng kê tay lại sử dụng chất liệu hợp kim nhôm để hạn chế bụi bẩn và bám dấu vân tay. Hệ thống bản lề chắc chắn hơn so với phiên bản cũ nên màn hình ít bị rung hơn trong quá trình sử dụng.', 'c.png', 'Đáng ngạc nhiên là mặt dưới sản phẩm cũng được HP chăm chút không kém với logo Omen đặc trưng và các hoạt tiết khắc nổi, tạo độ bám tốt hơn khi bạn cầm giữ máy. Chân đế cao su cỡ lớn giúp chống trượt và tạo khoảng không với mặt bàn để đẩy luồng không khí vào bên trong dễ dàng hơn.', 'd.png'),
(5, 14, 'Thiết kế vỏ kim loại mang lại cảm giác chắc chắn kết hợp logo Predator vô cùng mạnh mẽ thu hút mọi ánh nhìn.', 'helios-1_1024x1024.png', 'Màn hình kích thước 15.6 inches, độ phân giải Full HD, tấm nền IPS cho màu sắc trung thực ở mọi góc độ giúp game thủ có những phút giây trải nghiệm game tuyệt vời nhất.', 'helios-4_1024x1024.png', 'Hành trình phím cao 1,6mm kết hợp với cụm WASD màu đỏ nổi bật đậm chất gaming. Ngoài ra hệ thống đèn LED backlit màu đỏ nổi bật giúp game thủ có thể thao tác chính xác trong những trận chiến game khốc liệt kể cả ngày hay đêm.\n\nBàn phím độ nảy lớn tối ưu cho chơi game\nCụm phím WASD nổi bật dễ định vị\nĐèn LED đỏ ma mị, cuốn hút', 'helios-6_1024x1024.png'),
(6, 15, 'Tiếp bước người đàn anh vừa tạo nên tiếng vang lớn, ROG Strix SCAR II nay còn tiếp thêm cho bạn nguồn sức mạnh mới và phong cách đậm chất hơn nữa cho các game FPS. Tự hào với màn hình viền siêu mỏng 144Hz đầu tiên trên thế giới với tốc độ phản hồi siêu nhanh 3ms giúp ngắm bắn siêu chính xác, không có đối thủ nào xứng tầm với Strix SCAR II! Bàn phím phong cách desktop có khả năng nhận tín hiệu nhanh với công nghệ Overstroke đảm bảo điều khiển các loại vũ khí chính xác, trong khi hệ thống đa ăng-ten RangeBoost độc quyền đảm bảo tầm thu sóng Wi-Fi rộng và ổn định. Để tạo thêm lợi thế cho bạn trong từng trận chiến nóng bỏng, mẫu máy tính xách tay gaming chạy Windows 10 mạnh mẽ này sử dụng hệ thống tản nhiệt HyperCool Pro: cung cấp khả năng làm mát cực đỉnh cần có để khai thác hiệu năng tối đa của bộ vi xử lý Intel® Core™ i7 Thế hệ thứ 8 và card đồ họa NVIDIA® GeForce® GTX 10-Series. Nâng tầm chiến đấu với Strix SCAR II – đây là vũ khí tối tân cho những trận đọ súng khốc liệt nhất!', 'untitled111_1024x1024.png', 'ể giúp bạn giành được lợi thế tối đa trong các trận đấu, Strix SCAR II trang bị màn hình viền siêu mỏng 144Hz đầu tiên trên thế giới với tốc độ phản hồi giữa hai mức xám (GTG) 3ms – một điều kiện tiên quyết của các game thủ và người chơi esports chuyên nghiệp. Tần số làm mới cực cao đảm bảo trải nghiệm độ nhạy đích thực 144fps với giật lag đầu vào tối thiểu, trong khi tốc độ phản hồi siêu nhanh giúp giảm hiện tượng bóng ma và nhòe ảnh do chuyển động, mang đến hình ảnh rõ nét hơn. Thiết kế mới cũng mang đến viền màn hình ít gây phân tâm hơn, cho phép mang đến thân máy nhỏ gọn hơn, hẹp hơn 2,33cm so với người tiền nhiệm. Ngoài ra, Strix SCAR II cũng nhẹ hơn với tổng trọng lượng chỉ 2,4kg giúp đạt được sự linh hoạt tối đa để bạn luôn có thể mang theo bên mình, đến bất cứ nơi đâu!', 'untitled-14_1024x1024.jpg', 'Hãy tắt đèn và chiêm ngưỡng hệ thống ánh sáng làm chủ sân khấu. Logo ROG trên nắp lưng, thanh sáng trên mặt trước, mũ phím WASD trong suốt và các cạnh phím bán trong suốt cho phép hệ thống Aura tỏa sáng rực rỡ hơn bao giờ hết. Cùng với nhau, các thành phần này tôn lên phong cách cá nhân riêng biệt của bạn.', 'untitled-15_1024x1024.jpg'),
(10, 18, 'Apple Macbook Air 2018 có thiết kế tối giản nhưng không kém phần sang trọng. Toàn thân máy được gia công từ nhôm nguyên khối một cách tỉ mỉ và chính xác, tạo nên vẻ liền lạc và chắc chắn lại vừa thanh thoát, sang trọng. Nút Power khởi động máy được tích hợp luôn vào góc trên bên phải của bàn phím, vừa gọn vừa thẩm mỹ. Cả phần màn hình cũng được gia công kiểu Unibody hợp kim nhôm nguyên khối, các cạnh được bo tròn và dát mỏng tạo nên tổng thể máy một thiết kế tuyệt mỹ, tuyệt đẹp trong các dòng Ultrabook.', '05c2732a82148442b97dbedcdd7c060b.jpg', 'Sở hữu màn hình LED-backlit 13.3 inch Retina có độ phân giải (2560 x 1600) để xem mọi thứ tốt hơn, mang đến những hình ảnh chất lượng, chi tiết, rõ nét, màu sắc cũng cực kỳ trung thực và sống động.\nTấm nền IPS giúp bạn có thể trải nghiệm góc nhìn rộng 178° đem lại hình ảnh sắc nét, sống động và độ tương phản cao ngay cả ở những góc nhìn hẹp.', 'acc54bfc48bc60ec8593a46922b0ed22.jpg', 'Máy được trang bị bộ vi xử lý Intel Core i5 8th dual-core 1.6GHz, đạt tối đa 3.6GHz, RAM 8GB 2133MHz LPDDR3, card đồ họa Intel UHD Graphics 617 giúp máy có thể xử lý nhanh chóng và mượt mà các tác vụ của người dùng như soạn thảo văn bản, chơi game, lướt web, nghe nhạc, Autocad, Photoshop… Ngoài ra, máy còn được trang bị ổ cứng SSD 128GB cung cấp cho người dùng không gian rộng rãi để lưu trữ dữ liệu hay những bộ phim yêu thích.', '53894bd328aac49304f16d01ccf25cc1.jpg'),
(11, 19, 'Apple Macbook Pro 2017 13.3 inch MPXU2 Silver được trang bị lớp vỏ nhôm nguyên khối Unibody sang trọng và chắc chắn. Thiết kế mỏng, nhẹ và cực gọn gàng chỉ 1.49 cm, trọng lượng 1.37kg mang tính di động cao, rất tiện lợi khi di chuyển.', '3899851_macbook_pro_13_late_2016-37.u5552.d20170921.t093811.26895.jpg', 'Apple Macbook Pro 2017 có bộ xử lý Intel Core i5 Kabylake tốc độ 2.30 GHz, card đồ họa tích hợp Intel® Iris™ Graphics 640, bộ nhớ RAM 8 GB, cùng ổ cứng lưu trữ SSD 256 GB giúp máy chạy mượt mà các thao tác sử dụng và giúp bạn thoải mái lưu trữ dữ liệu. Công nghệ ổ cứng SSD cho tốc độ lưu trữ nhanh hơn và tuổi thọ của ổ cứng cũng lâu hơn.', 'vi-vn-apple-macbook-pro-mpxr2sa-a-slider3.jpg', 'Vấn đề pin với sản phẩm này khá đơn giản, không phải lo âu nhiều khi mà thời gian khoảng 10 tiếng sử dụng sau một lần sạc đầy.', 'vi-vn-apple-macbook-pro-mpxr2sa-a-slider0.jpg'),
(13, 21, 'Thiết kế cực mỏng và siêu nhẹ. Kiểu dáng nhỏ gọn, dễ dàng mang theo mọi lúc mọi nơi.', 'vn-feature-ultra-lightweight-73479850.jpg', 'Khung viền kim loại mang đến vẻ đẹp đẳng cấp và cảm nhận khác biệt cho Notebook 9. Được trang bị bộ vi xử lý Intel® mạnh mẽ, Notebook 9 đem lại hiệu suất hoạt động vượt trội, hiệu quả. Trải nghiệm kiểu dáng tinh tế cùng những tính năng tiên tiến trong một chiếc máy tính xách tay hoàn hảo và tiện dụng.', 'vn-feature-exceptional-style-and-mobility-73479837.jpg', 'Với độ sáng màn hình lên đến 400 nits, hình ảnh luôn luôn được hiển thị trung thực và sáng rõ trên Notebook 9. Màn hình sắc nét tối ưu hóa góc nhìn, ngay cả khi bạn sử dụng thiết bị ngoài trời.', 'vn-feature-bright-viewing-experience-73479839.jpg'),
(14, 22, 'Cảm nhận hình ảnh ấn tượng ngay trên màn hình Notebook. Với tính năng hỗ trợ Full HD, Samsung Notebook 3 mang đến chất lượng nội dung sắc nét, sống động hơn các màn hình có độ phân giải HD. Màn hình được phủ một lớp chống lóa mang lại tầm nhìn rõ nét hơn dưới mọi môi trường.', 'vn-feature-vivid-full-hd-viewing-experience-73479980.jpg', 'Notebook 3 nổi bật với thiết kế hiện đại, tinh tế, năng động với khối lượng chỉ khoảng 2kg*. Thiết bị nhẹ và gọn gàng theo bạn đến bất kỳ đâu.', 'vn-feature-more-stylish--lighter-and-slimmer-73479974.jpg', 'Hệ điều hành và các chương trình được vận hành mượt mà, nhanh chóng. Thoải mái lưu trữ dữ liệu và thông tin nhờ vào bộ nhớ HDD. Để nâng cao hiệu suất phần cứng, chỉ cần gỡ bỏ miếng dán ở mặt sau Notebook. Nâng cấp HDD (lên đến 1Tb) và đơn vị bộ nhớ (lên đến 16GB).', 'vn-feature-enhanced-speed-and-storage-73479984.jpg'),
(15, 25, 'Điện Thoại Samsung Galaxy Note 8 được thiết kế nguyên khối với đường cong hoàn hảo đem lại sự thoải mái khi cầm nắm và tạo nhiều không gian hơn để sử dụng S Pen. Cảm biến vân tay được chuyển ra mặt sau điện thoại, nút Home đặt ẩn bên dưới màn hình vô cực chỉ hiển thị khi bạn cần, mang lại cho người dùng trải nghiệm mượt mà nhất.', 'untitled-1.u4939.d20170825.t155853.367073.jpg', 'Samsung Galaxy Note 8 mang đến cho bạn một trải nghiệm hình ảnh lớn hơn và giao tiếp theo một cách hoàn toàn mới. Đó chính là thiết kế màn hình vô cực không viền, cong tràn hai cạnh, được bao phủ hoàn toàn bằng kính. Kích thước màn hình đạt 6.3 inches, độ phân giải WQHD (1440 x 2960 pixels) là màn hình có kích thước lớn nhất từng có trên các dòng Galaxy Note. Bên cạnh đó, thiết kế đường cong cân đối tỷ lệ 18.5:9, cho phép bạn xem những hình ảnh sống động như thực nhưng điện thoại vẫn sẽ vừa vặn trong tay bạn. Không những thế, màn hình lớn của Galaxy Note 8 vô cùng tiện lợi khi giúp bạn mở 2 ứng dụng cùng 1 lúc trong 1 lần chạm hay tối ưu hóa các thư mục một cách tốt nhất.', 'ok-4.u2769.d20170912.t091143.309626.jpg', 'Điểm nhấn đáng chú ý nhất trên chiếc điện thoại này chính là bộ đôi camera trang bị ở mặt lưng với độ phân giải 12MP. Cả hai ống kính sở hữu công nghệ chống rung quang học (OIS) cho những bức ảnh rõ nét ngay cả khi chuyển động. Đặc biệt, ống kính tele với khả năng zoom quang học 2x, cho phép chụp ảnh rõ nét kể cả khi phóng to. Ống kính rộng của Galaxy Note 8 với điểm ảnh lớn 1.4µm và ống kính sáng khẩu độ f/1.7 giúp thu nhiều ánh sáng hơn, đồng thời cho khả năng lấy nét nhanh và chính xác nhờ cảm biến Dual Pixels. Bên cạnh đó, 2 camera sau còn có chức năng xóa phông tùy chọn và chụp nhanh ngoài khung hình, cho bạn trải nghiệm những bức ảnh hoàn hảo nhất.', 'ok-2.u2769.d20170912.t091142.993032.jpg'),
(16, 26, 'Điện Thoại iPhone X 256GB là chiếc điện thoại hoàn toàn mới của Apple vừa mới ra mắt tuần vừa qua. Trên cơ bản, iPhone X vẫn có những tính năng như những dòng iPhone khác nhưng thiết kế bên ngoài lạ mắt hơn, không trang bị nút Home cứng, viền kim loại sang trọng và đặc biệt là cụm camera sau được trang bị theo chiều dọc tạo điểm nhấn cho chiếc điện thoại.', '7dd44f10cca947dbc99859e7ae3eada3.jpg', 'Sở hữu kích thước màn hình lớn 5.8 inch với độ phân giải 1125 x 2436 pixels, mật độ điểm ảnh 458 ppi pixel mang đến khả năng hiển thị màu sắc ấn tượng, sắc nét cho bạn trải nghiệm ở mọi góc nhìn. Màn hình lược bỏ nút Home cứng truyền thống tạo cảm giác lạ mắt và tạo nhiều không gian hơn cho người dùng.\n\nBên cạnh đó, iPhone X vẫn được trang bị công nghệ sạc nhanh và sạc không dây hiện đại mà người dùng mong đợi từ lâu.', 'aed1485bac9c7c586164a63c5da12fa5.jpg', 'Face ID là công nghệ được phát triển dựa trên Touch ID, sử dụng một loạt cảm biến phía trước, máy ảnh TrueDepth và máy chiếu chấm hồng ngoại để tạo ra bản đồ 3D cực kỳ chi tiết dành cho khuôn mặt của bạn. Máy chiếu chấm hồng ngoại tạo ra 30.000 điểm vô hình trên khuôn mặt mỗi khi bạn nhìn vào điện thoại để đảm bảo độ chính xác khi quét. Công nghệ này sẽ giúp bạn bảo mật thông tin một cách tốt hơn.\n\nFace ID nhận diện tốt ngay cả khi chủ nhân của máy thay đổi kiểu tóc, đội mũ, đeo kính râm. Bạn không thể đánh lừa tính năng siêu đặc biệt này của Apple bằng những bức ảnh, máy cũng sẽ không nhận diện nếu bạn nhắm mắt.', '062dd4756fc70d5f08817579f0c015b1.jpg'),
(17, 27, 'Thiết kế sang trọng\niPhone 6s Plus 32GB có thiết kế nguyên khối, vỏ ngoài từ kim loại bền bỉ với độ mỏng chỉ 7.3 mm, bạn có thể dễ dàng mang theo máy bên mình khi di chuyển và sử dụng mọi lúc mọi nơi. Điện thoại có 4 màu: Vàng Hồng, Vàng Đồng, Bạc và Xám, mỗi phiên bản màu sắc đều mang đến sự sang trọng và thể hiện cá tính cho người dùng.', 'iphone-6s-plus-silver-13.u504.d20161031.t093959.910484.jpg', 'Màn hình Retina 5.5 inches HD\niPhone 6S Plus được trang bị màn hình Retina 5.5 inch với độ phân giải HD (1080 x 1920) pixels và mật độ ảnh 401ppi sẽ mang đến những hình ảnh hiện thị trung thực nhất. Màn hình được trang bị lớp phủ chống dấu vân tay và mang đến bạn góc nhìn rộng để bạn thoải mái thư giãn, giải trí với những bộ phim, lướt web,...', 'iphone-6s-plus---8.u425.d20160707.t104343.jpg', 'Đặc biệt, màn hình tích hợp công nghệ 3D Touch có thể nhận diện các lực bấm trên màn hình để đưa ra hướng xử lý khác biệt.  Ngoài ra, cảm biến quét vân tay Touch ID thế hệ thứ 2 nhanh hơn gấp 2 lần so với thế hệ thứ 1 và bảo mật hơn chắc chắn sẽ khiến bạn hài lòng hơn khi sử dụng.', 'iphone-6s-plus---2.u425.d20160707.t104343.jpg'),
(18, 29, 'Thiết kế mạnh mẽ\nĐiện Thoại Nokia 7 Plus được chế tạo từ một khối nhôm rắn 6000, đường cong tinh tế và lớp phủ cảm giác như gốm mang đến những điều tốt nhất của cả hai thế giới: chạm tuyệt vời, nhìn đẹp mắt.', '9d46636d531b3c9899e18630a491963c.jpg', 'Màn hình thỏa mãn nhu cầu\nNokia 7 Plus sở hữu màn hình Full HD, tấm nền cảm ứng IPS LCD kích thước 6 inch kết hợp mặt kính cường lực Gorilla Glass 3 chắc chắn cho khả năng hiển thị cực sắc nét và màu sắc tươi tắn.', 'd838df613405a0f5cef59ec47e8bfdd9.jpg', 'Cấu hình mạnh mẽ\nNokia 7 Plus kết hợp nền tảng di động Qualcomm Snapdragon ™ 660 và 4 GB RAM cung cấp đủ công suất mà bạn cần và tuổi thọ pin 2 ngày tuyệt vời.\n\nAndroid One mang lại một kinh nghiệm phần mềm được thiết kế của Google cho Nokia 7 plus. Nhận mọi thứ bạn muốn và không có gì không có giao diện được sắp xếp hợp lý, dễ sử dụng và bộ ứng dụng được cài đặt sẵn và bộ nhớ ảnh chất lượng cao miễn phí, không giới hạn5 với Google Photos. Bản cập nhật bảo mật thường xuyên và hai năm nâng cấp hệ điều hành có nghĩa là Nokia 7 cộng với Android One vẫn an toàn và có những cải tiến mới nhất của Google như được tối ưu hóa cho Google Assistant.', 'cd818cb7478fe26d7e7ea39738886791.jpg'),
(19, 30, 'Thiết kế truyền thống, sang trọng\nĐiện thoại Nokia 6 (2018) không có quá nhiều khác biệt so với người tiền nhiệm, khi vẫn được cấu thành từ khung nhôm 6000 series nguyên khối, với màu đen kết hợp viền vàng và màu trắng viền đỏ đồng. Bên cạnh đó với những đường cắt CNC chính xác và mạnh mẽ, cùng mặt kính cong cường lực 2.5D thời thượng Gorilla Glass 3 của hãng Corning và trải qua quá trình gia công vô cùng tỉ mỉ với hơn 10 tiếng để oxit hóa (anodize) và làm bóng. Nokia 6 2018 mang đến một vẻ đẹp sang trọng, hiện đại, thời thượng và vô cùng mạnh mẽ.', '0e625c28a6149c0bf7174e5d07539995.jpg', 'Cùng với đó điểm khác biệt đáng kể ở phiên bản 2018 là phím Home cứng chứa cảm biến vân tay mặt trước đã được đưa ra mặt sau, và kích thước gọn hơn về chiều dài, giúp tăng tính thẫm mỹ và dễ dàng cầm nắm hơn.', '24c7685a4d8540385f78cbdf3dbd127c.jpg', 'Viền màn hình của Nokia 6 phiên bản 2018 được làm mỏng hơn, bắt kịp xu hướng tràn viền của năm khi có tỉ lệ diện tích là 73,2% giúp tăng khả năng xem, hiển thị của điện thoại. Bên cạnh đó màn hình kích thước lớn 5,5 inch trên tấm nền IPS LCD độ phân giải Full HD (1920 × 1080 pixels), cho hình ảnh chân thực, sắc nét và đáp ứng mọi nhu cầu học tập, giải trí.', '028a45498484aef73b7b5e5f12f4e75a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `nhanviengiaohang`
--

CREATE TABLE `nhanviengiaohang` (
  `id` int(11) UNSIGNED NOT NULL,
  `tennv` varchar(255) NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `sdt` int(11) NOT NULL,
  `diachi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanviengiaohang`
--

INSERT INTO `nhanviengiaohang` (`id`, `tennv`, `gioitinh`, `sdt`, `diachi`) VALUES
(1, 'Nguyễn Văn A', 1, 109087612, '36/12 Đường số 4'),
(2, 'Nguyễn Ngọc B', 0, 34125345, 'Cao Lỗ'),
(6, 'La Văn Cầu', 0, 231234234, '200 Phạm Ngọc Thạch'),
(10, 'Nguyễn Văn Tấn', 0, 1253265412, '36/12 Dường số 4'),
(24, 'Lâm Quốc Cường', 0, 90368952, 'Phan Châu Trinh'),
(25, 'Phan Văn Dũng', 0, 803692548, '202 Nguyễn Sĩ Lân'),
(26, 'Nguyễn Xuân Mai', 1, 338963257, '110 An Dương Vương');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('001f2bb4-630d-4b62-857b-b7fb508080df', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":18,\"id_user\":7,\"tongtien\":\"19700000\",\"diachi\":\"aa\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 19:00:42\",\"chitietdonhang\":[{\"id\":24,\"id_donhang\":18,\"id_sanpham\":2,\"soluong\":1,\"dongia\":\"19700000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 12:03:27', '2019-01-16 12:00:46', '2019-01-16 12:03:27'),
('056ca322-d0fb-46ea-8ece-b7aa03c1d7c3', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":7,\"id_user\":7,\"tongtien\":\"23900000\",\"diachi\":\"200 Nguy\\u1ec5n V\\u0103n Lu\\u00f4ng\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:33:23\",\"chitietdonhang\":[{\"id\":13,\"id_donhang\":7,\"id_sanpham\":3,\"soluong\":1,\"dongia\":\"23900000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 11:34:12', '2019-01-16 11:33:27', '2019-01-16 11:34:12'),
('0eabb016-9004-4a59-bcc3-8e34dacd50f2', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":21,\"id_user\":2,\"tongtien\":\"31990000\",\"diachi\":\"H\\u1eadu giang\",\"trangthai\":0,\"ngaydat\":\"2019-01-19 10:38:24\",\"chitietdonhang\":[{\"id\":27,\"id_donhang\":21,\"id_sanpham\":18,\"soluong\":1,\"dongia\":\"31990000\"}]},\"user\":{\"id\":2,\"name\":\"H\\u00f9ng\",\"email\":\"hung2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"180 Cao l\\u1ed7\",\"gioitinh\":0,\"sdt\":\"123456789\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-21 14:25:01', '2019-01-19 03:38:28', '2019-01-21 14:25:01'),
('244c48cd-8f74-499f-9654-fb92c68c3967', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":19,\"id_user\":7,\"tongtien\":\"62000000\",\"diachi\":\"abc\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 19:03:52\",\"chitietdonhang\":[{\"id\":25,\"id_donhang\":19,\"id_sanpham\":15,\"soluong\":1,\"dongia\":\"62000000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 12:04:04', '2019-01-16 12:03:56', '2019-01-16 12:04:04'),
('29602f76-e955-4992-885f-4331c498bf16', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":23,\"id_user\":2,\"tongtien\":\"5670000\",\"diachi\":\"Cao lo\",\"trangthai\":0,\"ngaydat\":\"2019-01-22 09:35:58\",\"chitietdonhang\":[{\"id\":29,\"id_donhang\":23,\"id_sanpham\":29,\"soluong\":1,\"dongia\":\"5670000\"}]},\"user\":{\"id\":2,\"name\":\"H\\u00f9ng\",\"email\":\"hung2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"180 Cao l\\u1ed7\",\"gioitinh\":0,\"sdt\":\"036262254\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-22 02:54:04', '2019-01-22 02:36:04', '2019-01-22 02:54:04'),
('29eba718-95a6-4528-bc93-a6c9d6f83175', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":9,\"id_user\":7,\"tongtien\":\"5670000\",\"diachi\":\"d\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:42:08\",\"chitietdonhang\":[{\"id\":15,\"id_donhang\":9,\"id_sanpham\":29,\"soluong\":1,\"dongia\":\"5670000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 11:44:15', '2019-01-16 11:42:11', '2019-01-16 11:44:15'),
('3c34023b-dda0-4bef-9ef3-670c5249e1dc', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":12,\"id_user\":7,\"tongtien\":\"13990000\",\"diachi\":\"aa\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:46:34\",\"chitietdonhang\":[{\"id\":18,\"id_donhang\":12,\"id_sanpham\":25,\"soluong\":1,\"dongia\":\"13990000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 11:47:46', '2019-01-16 11:46:38', '2019-01-16 11:47:46'),
('44795aeb-a9f0-46dc-b89d-23701434f2e3', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":14,\"id_user\":7,\"tongtien\":\"19700000\",\"diachi\":\"\\u00e1d\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:52:41\",\"chitietdonhang\":[{\"id\":20,\"id_donhang\":14,\"id_sanpham\":2,\"soluong\":1,\"dongia\":\"19700000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 12:03:27', '2019-01-16 11:52:44', '2019-01-16 12:03:27'),
('6102af98-6b70-4183-9efb-0f4bfd9056e0', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":20,\"id_user\":2,\"tongtien\":\"31990000\",\"diachi\":\"dd\",\"trangthai\":0,\"ngaydat\":\"2019-01-18 13:10:19\",\"chitietdonhang\":[{\"id\":26,\"id_donhang\":20,\"id_sanpham\":18,\"soluong\":1,\"dongia\":\"31990000\"}]},\"user\":{\"id\":2,\"name\":\"H\\u00f9ng\",\"email\":\"hung2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"180 Cao l\\u1ed7\",\"gioitinh\":0,\"sdt\":\"1228945350\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-18 06:11:54', '2019-01-18 06:10:23', '2019-01-18 06:11:54'),
('6f6166fd-e25b-4538-8374-5d450301a18a', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":15,\"id_user\":7,\"tongtien\":\"5670000\",\"diachi\":\"\\u00e1d\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:54:12\",\"chitietdonhang\":[{\"id\":21,\"id_donhang\":15,\"id_sanpham\":29,\"soluong\":1,\"dongia\":\"5670000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 12:03:27', '2019-01-16 11:54:16', '2019-01-16 12:03:27'),
('79ea05ec-86a6-45f3-a051-7d7d9c42390a', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":8,\"id_user\":7,\"tongtien\":\"24790000\",\"diachi\":\"a\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:39:52\",\"chitietdonhang\":[{\"id\":14,\"id_donhang\":8,\"id_sanpham\":26,\"soluong\":1,\"dongia\":\"24790000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 11:40:23', '2019-01-16 11:39:56', '2019-01-16 11:40:23'),
('856c374e-eb1d-436f-8dc0-3c9c1ed507d3', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":22,\"id_user\":2,\"tongtien\":\"63980000\",\"diachi\":\"180 Cao L\\u1ed7\",\"trangthai\":0,\"ngaydat\":\"2019-01-21 21:24:47\",\"chitietdonhang\":[{\"id\":28,\"id_donhang\":22,\"id_sanpham\":18,\"soluong\":2,\"dongia\":\"31990000\"}]},\"user\":{\"id\":2,\"name\":\"H\\u00f9ng\",\"email\":\"hung2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"180 Cao l\\u1ed7\",\"gioitinh\":0,\"sdt\":\"01228945350\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-21 14:26:16', '2019-01-21 14:24:52', '2019-01-21 14:26:16'),
('94f273b2-e67d-40bb-8196-9678b7b1572f', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":16,\"id_user\":7,\"tongtien\":\"5670000\",\"diachi\":\"\\u00e2\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:56:12\",\"chitietdonhang\":[{\"id\":22,\"id_donhang\":16,\"id_sanpham\":29,\"soluong\":1,\"dongia\":\"5670000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 12:03:27', '2019-01-16 11:56:17', '2019-01-16 12:03:27'),
('accf9312-0ab6-4ae0-abc3-ebadcc7e3714', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":13,\"id_user\":7,\"tongtien\":\"62000000\",\"diachi\":\"d\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:48:02\",\"chitietdonhang\":[{\"id\":19,\"id_donhang\":13,\"id_sanpham\":15,\"soluong\":1,\"dongia\":\"62000000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 12:03:27', '2019-01-16 11:48:06', '2019-01-16 12:03:27'),
('ae9c6f8d-c325-436b-bb44-58e2699d4131', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":10,\"id_user\":7,\"tongtien\":\"19700000\",\"diachi\":\"d\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:44:45\",\"chitietdonhang\":[{\"id\":16,\"id_donhang\":10,\"id_sanpham\":2,\"soluong\":1,\"dongia\":\"19700000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 11:45:26', '2019-01-16 11:44:48', '2019-01-16 11:45:26'),
('be93342b-7873-4eb1-ad40-9e5effe549bb', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":6,\"id_user\":7,\"tongtien\":\"62000000\",\"diachi\":\"Nguy\\u1ec5n V\\u0103n S\\u1ec9\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:30:54\",\"chitietdonhang\":[{\"id\":12,\"id_donhang\":6,\"id_sanpham\":15,\"soluong\":1,\"dongia\":\"62000000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 11:32:37', '2019-01-16 11:30:57', '2019-01-16 11:32:37'),
('bea97e25-3932-48b4-9aa1-e932dfb3eac4', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":25,\"id_user\":2,\"tongtien\":\"387410000\",\"diachi\":\"abc\",\"trangthai\":0,\"ngaydat\":\"2019-01-22 11:06:55\",\"chitietdonhang\":[{\"id\":31,\"id_donhang\":25,\"id_sanpham\":16,\"soluong\":19,\"dongia\":\"20390000\"}]},\"user\":{\"id\":2,\"name\":\"H\\u00f9ng\",\"email\":\"hung2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"180 Cao l\\u1ed7\",\"gioitinh\":0,\"sdt\":\"4213213\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-05-18 15:09:41', '2019-01-22 04:06:58', '2019-05-18 15:09:41'),
('dc99d704-6fb3-45d3-b2b2-b83eaa5770db', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":5,\"id_user\":7,\"tongtien\":\"54790000\",\"diachi\":\"220 Ph\\u00f9ng T\\u00e1 Chu\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:17:51\",\"chitietdonhang\":[{\"id\":10,\"id_donhang\":5,\"id_sanpham\":26,\"soluong\":1,\"dongia\":\"24790000\"},{\"id\":11,\"id_donhang\":5,\"id_sanpham\":14,\"soluong\":1,\"dongia\":\"30000000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 11:19:52', '2019-01-16 11:17:54', '2019-01-16 11:19:52'),
('e1e7cdec-26c7-4156-b33d-47ef562683ba', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":17,\"id_user\":7,\"tongtien\":\"23000000\",\"diachi\":\"bb\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:58:27\",\"chitietdonhang\":[{\"id\":23,\"id_donhang\":17,\"id_sanpham\":21,\"soluong\":1,\"dongia\":\"23000000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 12:03:27', '2019-01-16 11:58:32', '2019-01-16 12:03:27'),
('e2d1bbcc-70e1-4e23-bb83-90d170e5a7af', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":11,\"id_user\":7,\"tongtien\":\"5670000\",\"diachi\":\"a\",\"trangthai\":0,\"ngaydat\":\"2019-01-16 18:46:08\",\"chitietdonhang\":[{\"id\":17,\"id_donhang\":11,\"id_sanpham\":29,\"soluong\":1,\"dongia\":\"5670000\"}]},\"user\":{\"id\":7,\"name\":\"Nh\\u00e2n\",\"email\":\"trongnhan2603961@gmail.com\",\"provider\":\"\",\"provider_id\":\"\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"181 Kinh D\\u01b0\\u01a1ng V\\u01b0\\u01a1ng\",\"gioitinh\":0,\"sdt\":\"1228945352\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-01-16 11:47:47', '2019-01-16 11:46:12', '2019-01-16 11:47:47'),
('e5329105-ffdc-4d35-9eb5-d70355db055d', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":24,\"id_user\":11,\"tongtien\":\"224290000\",\"diachi\":\"asd\",\"trangthai\":0,\"ngaydat\":\"2019-01-22 11:06:46\",\"chitietdonhang\":[{\"id\":30,\"id_donhang\":24,\"id_sanpham\":16,\"soluong\":11,\"dongia\":\"20390000\"}]},\"user\":{\"id\":11,\"name\":\"V\\u00f5 T\\u1ea5n T\\u00e0i\",\"email\":\"votantai2603961@gmail.com\",\"provider\":null,\"provider_id\":null,\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"128\\/2 Nguy\\u1ec5n V\\u0103n Lu\\u00f4ng\",\"gioitinh\":0,\"sdt\":\"123123\",\"level\":1,\"created_at\":null,\"updated_at\":null}}', '2019-05-18 15:09:45', '2019-01-22 04:06:50', '2019-05-18 15:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `gianhap` decimal(19,0) NOT NULL,
  `giaban` decimal(19,0) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ngaynhap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `id_sanpham`, `gianhap`, `giaban`, `soluong`, `ngaynhap`) VALUES
(1, 29, '19000000', '21000000', 5, '2019-01-13 09:55:06'),
(2, 27, '9000000', '10000000', 4, '2019-01-13 09:55:06'),
(3, 29, '19000000', '21000000', 5, '2019-01-13 23:49:20'),
(4, 27, '9000000', '10000000', 12, '2019-01-13 23:49:20'),
(5, 2, '18000000', '19700000', 10, '2019-01-13 23:49:20'),
(6, 3, '19000000', '25000000', 16, '2019-01-13 23:49:20'),
(7, 14, '29000000', '34990000', 18, '2019-01-13 23:49:20'),
(8, 15, '58000000', '62000000', 20, '2019-01-13 23:49:20'),
(10, 18, '27000000', '31990000', 20, '2019-01-13 23:49:20'),
(11, 19, '30000000', '36290000', 15, '2019-01-13 23:49:20'),
(12, 21, '19000000', '23000000', 9, '2019-01-13 23:49:20'),
(13, 22, '17500000', '19990000', 13, '2019-01-13 23:49:20'),
(14, 25, '11000000', '13990000', 17, '2019-01-13 23:49:20'),
(15, 26, '22300000', '24790000', 15, '2019-01-13 23:49:20'),
(16, 30, '3500000', '4190000', 13, '2019-01-13 23:49:20'),
(17, 29, '19000000', '21000000', 5, '2019-01-17 20:20:55'),
(18, 27, '9000000', '10000000', 12, '2019-01-17 20:20:55'),
(19, 2, '18000000', '19700000', 10, '2019-01-17 20:20:55'),
(20, 3, '19000000', '25000000', 16, '2019-01-17 20:20:55'),
(21, 14, '29000000', '34990000', 18, '2019-01-17 20:20:55'),
(22, 15, '58000000', '62000000', 20, '2019-01-17 20:20:55'),
(24, 18, '27000000', '31990000', 20, '2019-01-17 20:20:55'),
(25, 19, '30000000', '36290000', 15, '2019-01-17 20:20:55'),
(26, 21, '19000000', '23000000', 9, '2019-01-17 20:20:55'),
(27, 22, '17500000', '19990000', 13, '2019-01-17 20:20:55'),
(28, 25, '11000000', '13990000', 17, '2019-01-17 20:20:55'),
(29, 26, '22300000', '24790000', 15, '2019-01-17 20:20:55'),
(30, 30, '3500000', '4190000', 13, '2019-01-17 20:20:55');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_loaisanpham` int(11) UNSIGNED NOT NULL,
  `id_matensanpham` int(11) UNSIGNED NOT NULL,
  `id_hangsanxuat` int(11) UNSIGNED NOT NULL,
  `tensp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dongia` decimal(19,0) DEFAULT NULL,
  `hinhanh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baohanh` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `luotxem` int(11) DEFAULT NULL,
  `ngaytao` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `id_loaisanpham`, `id_matensanpham`, `id_hangsanxuat`, `tensp`, `dongia`, `hinhanh`, `baohanh`, `luotxem`, `ngaytao`) VALUES
(2, 1, 1, 7, 'Microsoft Surface Pro 5', '19700000', 'item_XL_23445791_33451062.jpg', '12 tháng', 10, '2018-08-22 23:31:47'),
(3, 2, 1, 2, 'HP Omen 15', '25000000', 'c06029732.png', '12 tháng', 10, '2018-12-27 23:28:13'),
(14, 2, 1, 6, 'Acer Predator Helios 300', '34990000', 'acer_predator_helios_300_ph315-51-7533__2__grande.jpg', '12 tháng', 6, '2018-12-20 23:31:47'),
(15, 2, 1, 3, 'ASUS ROG GL504GS-ES025T', '62000000', 'asus_rog_strix_scar_ii_gl504gs-es025t_3_grande.jpg', '24 tháng', 9, '2018-11-28 23:31:47'),
(18, 9, 1, 5, 'Apple Macbook Air 2018', '31990000', '5293f93a5a73c25fcf9777d25bb05047.jpg', '24 tháng', 20, '2018-11-28 23:31:47'),
(19, 9, 1, 5, 'Macbook Pro 2017 (13.3 inch)', '36290000', '1.u5552.d20170921.t100710.572564.jpg', '12 tháng', 0, '2018-11-28 23:31:47'),
(21, 10, 1, 4, 'Notebook 9', '23000000', 'vn-notebook-np900x3h-k01vn-np900x3h-k01vn-frontsilver-73479751.jpg', '12 tháng', 0, '2018-11-28 23:31:47'),
(22, 10, 1, 4, 'Notebook 3', '19990000', 'vn-notebook-np300e5l-k01vn-np300e5l-k01vn-Black-74267846.jpg', '18 tháng', 0, '2019-01-01 14:02:23'),
(25, 7, 2, 4, 'Samsung Galaxy Note 8', '13990000', 'bdd2f680ab5ffbe8220f7325e82cb648.jpg', '12 tháng', 2, '2018-11-28 23:31:47'),
(26, 4, 2, 5, 'iPhone X', '24790000', 'c56b1807542b9cd9ed066c3939f5de5e.jpg', '24 tháng', 27, '2018-11-28 23:31:47'),
(27, 4, 2, 5, 'iPhone 6s Plus', '10000000', '9db13115f2e81cc69d96c38925dd2ff7.jpg', '12 tháng', 4, '2018-11-28 23:31:47'),
(29, 7, 2, 8, 'Nokia 7 Plus', NULL, '4d835f96adc7f8c32edd462d282f7a97.jpg', '12 tháng', 10, '2018-11-28 23:31:47'),
(30, 7, 2, 8, 'Nokia 6 (2018)', '4190000', 'nokia6-1.png', '12 tháng', 1, '2018-11-28 23:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `sanphamloi`
--

CREATE TABLE `sanphamloi` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `tensp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayloi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanphamloi`
--

INSERT INTO `sanphamloi` (`id`, `id_sanpham`, `tensp`, `tinhtrang`, `ngayloi`) VALUES
(1, 26, 'iPhone X', 'Sản phẩm lỗi', '2019-01-18 01:07:48'),
(2, 14, 'Acer Predator Helios 300', 'Sản phẩm lỗi', '2019-01-18 01:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `soluongsanpham`
--

CREATE TABLE `soluongsanpham` (
  `id` int(11) NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `soluongcon` int(11) NOT NULL,
  `tongsoluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `soluongsanpham`
--

INSERT INTO `soluongsanpham` (`id`, `id_sanpham`, `soluongcon`, `tongsoluong`) VALUES
(1, 2, 16, 20),
(2, 3, 30, 32),
(4, 14, 35, 36),
(5, 18, 35, 40),
(6, 15, 35, 40),
(9, 19, 30, 30),
(11, 21, 17, 18),
(12, 22, 26, 26),
(13, 25, 33, 34),
(14, 26, 28, 30),
(15, 27, 24, 24),
(16, 29, 4, 10),
(17, 30, 26, 26);

-- --------------------------------------------------------

--
-- Table structure for table `trahang`
--

CREATE TABLE `trahang` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `tinhtrang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaytra` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trahang`
--

INSERT INTO `trahang` (`id`, `id_user`, `id_sanpham`, `id_donhang`, `noidung`, `soluong`, `tinhtrang`, `ngaytra`) VALUES
(1, 7, 26, 5, 'Sản phẩm bị lỗi', 1, 'Sản phẩm lỗi', '2019-01-18 01:07:48'),
(2, 7, 14, 5, 'Sản phẩm bị lỗi', 1, 'Sản phẩm lỗi', '2019-01-18 01:07:48'),
(3, 7, 3, 4, 'Khách hàng không nhận', 1, 'Bình thường', '2019-01-19 21:29:42'),
(4, 7, 26, 4, 'Khách hàng không nhận', 1, 'Bình thường', '2019-01-19 21:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaitro` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gioitinh` int(11) DEFAULT NULL,
  `sdt` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `provider`, `provider_id`, `vaitro`, `diachi`, `gioitinh`, `sdt`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$iMaEyWyhHXGJ47xRd.m2ze8lCeEsy6IU8fEo9pt9bmF6onqETxnxa', '', '', 'Admin', '36/12', 0, '12345678', 0, 'WubZ0088bEKRKDOmtU9W8O5w5DH1MYnF7sXGxSpARbXfjOsRP6KQiWU1TEz1', NULL, NULL),
(2, 'Hùng', 'hung2603961@gmail.com', '$2y$10$Gg0vAuHIX6G9CqL6j85feOwD2.jvK6Lz2q8Ri9lMcuC65VG5ON2MG', '', '', 'Khách hàng', '180 Cao lỗ', 0, '4213213', 1, 'qM8OtNPLIENCqe8yiWcD2oq2maDDdSRw0gMMy5MyeFfLndasEdvMx3N9IMuS', NULL, NULL),
(3, 'Nhân', 'nhan@gmail.com', '$2y$10$iMaEyWyhHXGJ47xRd.m2ze8lCeEsy6IU8fEo9pt9bmF6onqETxnxa', '', '', 'Khách hàng', '36/12', 0, '4312345', 1, NULL, NULL, NULL),
(4, 'Cuong ', 'cuong@gmail.com', '$2y$10$iMaEyWyhHXGJ47xRd.m2ze8lCeEsy6IU8fEo9pt9bmF6onqETxnxa', '', '', 'Nhan vien nhap hang', '36/12', 0, '4312345', 2, 'qgWnUXuEyiLNPCiXEX7o6hqVRs7iSmztUuGNDr3OZaf9EqMcuIQ4IFS74cki', NULL, NULL),
(5, 'Khách hàng 1', 'khachhang1@gmail.com', '$2y$10$kiVrjwuf4.LWv/Ow4sat8uXJHP5m4hTqm4.obCy9eZdXzHrR/Uqg6', '', '', 'Khách hàng', 'Cao lỗ', 1, '125487632', 1, 'EJTBrisjIRVhQYZ3Qld24xb9KMDryBhlfTtKxx8Uh1G41Dl4j9BX6SGBYT1K', NULL, NULL),
(6, 'a2', 'a2@gmail.com', '$2y$10$eZR0Of3isOmoLrmDM4WGteiJxZ8Ct2QfPD6TpH/xsxEK6a.k4V57W', '', '', 'Khách hàng', 'Cao lỗ', 0, '123456', 1, 'Zzq2h26WgjNizn1BZ3xN6CloVrKdSjhuu845qtH2', NULL, NULL),
(7, 'Nhân', 'trongnhan26039612@gmail.com', '$2y$10$aYyOl4bP2RwuScOu944vr.bZD5s32yX0SHo1a/eh6hE09iAKGJdtK', '', '', 'Khách hàng', '181 Kinh Dương Vương', 0, '01228945352', 1, 'woIUChK8SNzHHuVr9Yk1EWnM2vQ2Gd3p3ATVVQK2tebaVsbq4NiIfQxVuRsW', NULL, NULL),
(9, 'Ngô Thanh Hùng', 'thanh_hung1996@yahoo.com', '$2y$10$1ygxZX9RAVEdt0CQZC58Fu4r63puYKuLXwXzAoZ/5rQctijyvSO9q', 'facebook', '1720026698101672', 'Khách hàng', 'Nguyễn Tri Phương', 1, '0338945350', 1, '51g6FmPUu2f6RnRqUsEmAvXlsYMJ3rRbfizP91yPO7thQzR0DZGlLTjCBifQ', NULL, NULL),
(11, 'Võ Tấn Tài', 'votantai2603961@gmail.com', '$2y$10$IQmCfVED4IP8D5Jph33sN.D3REctHDUh5iEK0d7NnmruwtMlulhoe', NULL, NULL, 'Khách hàng', '128/2 Nguyễn Văn Luông', 0, '123123', 1, 'OEeWVrcqAf5cvbGq0bY5q6PaHLIweR6MIe7WxyLi0GCvR6NAY849mKEnwHYF', NULL, NULL),
(12, 'lap hiro', 'hirolap96@gmail.com', '$2y$10$9om21hefSKP0neUXhxLPjuvxm82VQ3VxCdLtdAr4n4SJyeLhVwgyK', 'google', '115470175203280859650', 'Khách hàng', NULL, NULL, NULL, 1, 'y5gKC92iK0yhlBg6QOc51vVLIXlY4dt5WneCzvC4fu4uMtfbp0l1CH7tdm7n', NULL, NULL),
(13, 'NhanVienHoTro', 'nhanvienhotro@gmail.com', '$2y$10$fgYOgujIYj/W.j1jpsVmQu4G6NBoI828U2.dZOzjrOQXClCycV9NK', NULL, NULL, 'Nhân viên hỗ trợ', '101 Lê Văn Sỉ', 0, '0338945356', 3, 'mejZj3qENHHgBlxn0tN8Yk3DSUPDrGAebULTmvrBzj22A12YTVDc3eFqfLgv', NULL, NULL),
(14, 'NhanVienQuanLySanPham', 'nhanvienquanlysanpham@gmail.com', '$2y$10$mFg.z4Dh2t5ymFqEU57Gt.5rUlqIKwbobqXD45gOPfM5LokZA.ptm', NULL, NULL, 'Nhân viên quản lý sản phẩm', 'Phan Châu Trinh', 1, '033895624', 5, 'k3FF6EADms3NzXQbBR8MQZLGaMDjOQKedigg798nF7lLLeP4WIMOcIIFgFhE', NULL, NULL),
(17, 'Nhan Trong', 'trongnhan2603961@gmail.com', '$2y$10$bDg70Pj7V5Whs2TMQlk6GOCKaGSvSzM76wywYGR6mXMH5vOpKHQ0W', 'facebook', '108879726862954', 'Khách hàng', NULL, NULL, NULL, 1, '5pMl32jcHmQNhbeI3nKAdmUhCKbw5mahm9PvSK13bmfJKmeeyK7mHxgfsBOP', NULL, NULL),
(18, '260396 hung', 'hung260396@gmail.com', '$2y$10$VTJ.UytlRCcPlyIfKBkVWOzZCpF3Xl0ffNXs4vGvoFlaJmy/bg/ji', 'google', '112616209549880711643', 'Khách hàng', NULL, NULL, NULL, 1, 'TCoPpRIdCxSxZodKkP0KKZgp8OuWzoxw4Em3kjIXoeglqmx8xEUD57GK2omo', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cauhinhdienthoai`
--
ALTER TABLE `cauhinhdienthoai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cauhinhdienthoai_id_sanpham_foreign` (`id_sanpham`);

--
-- Indexes for table `cauhinhmaytinh`
--
ALTER TABLE `cauhinhmaytinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cauhinhmaytinh_id_sanpham_foreign` (`id_sanpham`);

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietdonhang_id_sanpham_foreign` (`id_sanpham`),
  ADD KEY `chitietdonhang_id_hoadon_foreign` (`id_donhang`);

--
-- Indexes for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chitietkhuyenmai_id_sanpham_foreign` (`id_sanpham`),
  ADD KEY `chitietkhuyenmai_id_khuyenmai_foreign` (`id_khuyenmai`);

--
-- Indexes for table `dongsanpham`
--
ALTER TABLE `dongsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hangsanxuat` (`id_hangsanxuat`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donhang_id_user_foreign` (`id_user`);

--
-- Indexes for table `giaohang`
--
ALTER TABLE `giaohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donhang` (`id_donhang`),
  ADD KEY `id_nhanvien` (`id_nhanvien`);

--
-- Indexes for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `loaisanpham_tenloai_unique` (`tenloai`);

--
-- Indexes for table `matensanpham`
--
ALTER TABLE `matensanpham`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mota`
--
ALTER TABLE `mota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mota_id_sanpham_foreign` (`id_sanpham`);

--
-- Indexes for table `nhanviengiaohang`
--
ALTER TABLE `nhanviengiaohang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanpham_id_matensanpham_foreign` (`id_matensanpham`),
  ADD KEY `sanpham_id_loaisanpham_foreign` (`id_loaisanpham`),
  ADD KEY `sanpham_id_hangsanxuat` (`id_hangsanxuat`);

--
-- Indexes for table `sanphamloi`
--
ALTER TABLE `sanphamloi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sanphamloi_id_sanpham_foreign` (`id_sanpham`);

--
-- Indexes for table `soluongsanpham`
--
ALTER TABLE `soluongsanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `trahang`
--
ALTER TABLE `trahang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trahang_id_user_foreign` (`id_user`),
  ADD KEY `trahang_id_sanpham_foreign` (`id_sanpham`),
  ADD KEY `id_donhang` (`id_donhang`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cauhinhdienthoai`
--
ALTER TABLE `cauhinhdienthoai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cauhinhmaytinh`
--
ALTER TABLE `cauhinhmaytinh`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dongsanpham`
--
ALTER TABLE `dongsanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `giaohang`
--
ALTER TABLE `giaohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matensanpham`
--
ALTER TABLE `matensanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mota`
--
ALTER TABLE `mota`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nhanviengiaohang`
--
ALTER TABLE `nhanviengiaohang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sanphamloi`
--
ALTER TABLE `sanphamloi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `soluongsanpham`
--
ALTER TABLE `soluongsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trahang`
--
ALTER TABLE `trahang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cauhinhdienthoai`
--
ALTER TABLE `cauhinhdienthoai`
  ADD CONSTRAINT `cauhinhdienthoai_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cauhinhmaytinh`
--
ALTER TABLE `cauhinhmaytinh`
  ADD CONSTRAINT `cauhinhmaytinh_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `chitietdonhang_id_hoadon_foreign` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`),
  ADD CONSTRAINT `chitietdonhang_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chitietkhuyenmai`
--
ALTER TABLE `chitietkhuyenmai`
  ADD CONSTRAINT `chitietkhuyenmai_id_khuyenmai_foreign` FOREIGN KEY (`id_khuyenmai`) REFERENCES `khuyenmai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `chitietkhuyenmai_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dongsanpham`
--
ALTER TABLE `dongsanpham`
  ADD CONSTRAINT `dongsanpham_ibfk_1` FOREIGN KEY (`id_hangsanxuat`) REFERENCES `hangsanxuat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `giaohang`
--
ALTER TABLE `giaohang`
  ADD CONSTRAINT `giaohang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `giaohang_ibfk_2` FOREIGN KEY (`id_nhanvien`) REFERENCES `nhanviengiaohang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mota`
--
ALTER TABLE `mota`
  ADD CONSTRAINT `mota_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD CONSTRAINT `phieunhap_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_id_hangsanxuat` FOREIGN KEY (`id_hangsanxuat`) REFERENCES `hangsanxuat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanpham_id_loaisanpham_foreign` FOREIGN KEY (`id_loaisanpham`) REFERENCES `loaisanpham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanpham_id_matensanpham_foreign` FOREIGN KEY (`id_matensanpham`) REFERENCES `matensanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sanphamloi`
--
ALTER TABLE `sanphamloi`
  ADD CONSTRAINT `sanphamloi_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `soluongsanpham`
--
ALTER TABLE `soluongsanpham`
  ADD CONSTRAINT `soluongsanpham_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trahang`
--
ALTER TABLE `trahang`
  ADD CONSTRAINT `trahang_ibfk_1` FOREIGN KEY (`id_donhang`) REFERENCES `donhang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trahang_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `trahang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
