-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 06:15 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

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
(1, 16, 'Super AMOLED, 6.2\", Quad HD+ (2K+)', 'Android 8.0', 'Hai camera trước  12 MP Camera sau 8 MP', 'Exynos 9810 8 nhân 64 bit', '6 GB', '64 GB', '3500 mAh', 'Không có'),
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
(2, 38, 3, 1, '23900000'),
(3, 38, 27, 1, '9490000'),
(4, 39, 16, 1, '20390000'),
(5, 39, 3, 1, '23900000'),
(7, 41, 3, 1, '23900000'),
(8, 42, 18, 2, '31990000'),
(9, 43, 14, 1, '30000000'),
(10, 44, 18, 1, '31990000');

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
(4, 14, 1, '30000000', '2018-12-29 13:50:38', 0),
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
(38, 2, '33390000', '180 Cao lỗ', 2, '2018-12-31 22:42:31'),
(39, 2, '44290000', '180 Cao lỗ', 2, '2019-01-01 14:56:51'),
(40, 7, '26000000', '181 Kinh Dương Vương', 0, '2019-01-01 22:57:51'),
(41, 7, '23900000', '181 Kinh Dương Vương', 1, '2019-01-03 10:43:23'),
(42, 2, '63980000', '180 Cao lỗ', 3, '2019-01-03 20:14:23'),
(43, 2, '30000000', '180 Cao lỗ', 0, '2019-01-04 10:58:30'),
(44, 2, '31990000', '180 Cao lỗ', 0, '2019-01-04 23:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `giaohang`
--

CREATE TABLE `giaohang` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `id_nhanvien` int(11) UNSIGNED NOT NULL,
  `ngaygiao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `giaohang`
--

INSERT INTO `giaohang` (`id`, `id_donhang`, `id_nhanvien`, `ngaygiao`) VALUES
(1, 38, 6, '2019-01-17'),
(2, 39, 10, '2019-01-11'),
(3, 42, 1, '2019-01-04');

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
(4, 'Ngày đội bóng  Việt Nam vô địch Asian', 'Hưởng hứng đội bóng Việt Name vô địch.', '2018-12-28', '2018-12-29');

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
(7, 16, 'Tại sự kiện MWC 2018 (Tây Ban Nha) vừa qua Samsung đã chính thức ra mắt bộ đôi smartphone cao cấp Samsung Galaxy S9 và Samsung Galaxy S9 Plus Hàng Công Ty. Trong đó chiếc Galaxy S9 Plus với những thay đổi đáng kể và được rất nhiều người dùng chờ đợi từ lâu. Bài viết dưới đây xin giới thiệu về chiếc điện thoại mới nhất này của Samsung giúp người dùng có thêm thông tin chọn mua được sản phẩm ưng ý.', 'samsung-galaxy-s9-plus-hang-cong-ty-hinh-anh-1.jpg', 'Nếu nhìn qua thì Samsung không thay đổi kiểu dáng chung của Samsung S9 Plus Hàng Công Ty khi so sánh với bộ đôi S8 và S8 Plus ra năm ngoái. Tuy nhiên nếu quan sát kỹ bạn vẫn có thể nhận ra được sự khác biệt về màu sắc của máy cũng như cụm camera phía sau có chút thay đổi. Phần khung máy bằng nhôm hoàn thiện mờ cứ không phải bóng như người tiền nhiệm S8 Plus. Có thể đánh giá samsung S9 Plus vẫn là chiếc điện thoại Android đẹp với thiết kế hiện đại và cân đối.\nCảm biến vân tay được để phía dưới cụm camera thay vì để bên cạnh phải như thế hệ trước phần nào thể hiện sự khác biết về hình thức nhưng thực tế trải nghiệm thì tiện hơn nhiều.\nSamsung S9 Plus sử dụng màn hình với tỷ lệ 18,5:9, các cạnh bên vuốt cong, mặt trước và sau đều bằng kính màn. Điện thoại Samsung S9 Plus được trang bị màn hình lên tới 6,2 inch, công nghệ Super AMOLED, độ phân giải 2K Plus (2.960x1.440pixel). Tuy nhiên, ở mặt lưng, cảm biến vân tay được chuyển xuống bên dưới cụm camera, thay vì được đặt bên cạnh như trên S8 Plus.', 'samsung-galaxy-s9-plus-hang-cong-ty-hinh-anh-2.jpg', 'Nếu như camera của Galaxy S8 năm ngoái không có quá nhiều khác biệt so với Galaxy S7, thì đến năm nay, camera của Galaxy S9 Plus đã được Samsung đặc biệt chú trọng. Samsung S9 Plus được trang bị cụm camera kép 12 MP, hỗ trợ chống rung quang học OIS ở cả hai camera, hứa hẹn trải nghiệm chụp chân dung xoá phông tốt hơn hẳn Galaxy Note 8. Với camera cảm biến hoàn toàn mới độ phân giải 12 megapixel, đặc biệt là ống kính đi kèm có thể thay đổi khẩu độ từ f/1.5 xuống f/2.4 (giống như máy ảnh DSLR) tùy theo điều kiện sử dụng, cho phép thu được sáng nhiều hơn khi chụp trong điều kiện ánh sáng yếu.\n\nCó thể coi Samsung galaxy S9 Plus Hàng Công Ty là smartphone đầu tiên trên thế giới với khả năng thay đổi khẩu độ camera. Mặc định, ứng dụng camera của Samsung sẽ tự động điều chỉnh khẩu độ dựa trên khung cảnh. Nếu như người dùng muốn tùy chỉnh khẩu độ bằng tay, họ có thể sử dụng chế độ chuyên nghiệp (Pro mode).', 'samsung-galaxy-s9-plus-hang-cong-ty-hinh-anh-3.jpg'),
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
(6, 'La Văn Cầu', 0, 231234234, 'Cao Lỗ'),
(10, 'Nguyễn Văn Tấn', 0, 1253265412, '36/12 Dường số 4'),
(24, '123', 1, 1234444, '123asdasdasdasdasd');

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
('d5dd383a-6ac1-454d-8c41-7d81841d2c0a', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":44,\"id_user\":2,\"tongtien\":\"31990000\",\"diachi\":\"180 Cao l\\u1ed7\",\"trangthai\":0,\"ngaydat\":\"2019-01-04 23:31:07\",\"chitietdonhang\":[{\"id\":10,\"id_donhang\":44,\"id_sanpham\":18,\"soluong\":1,\"dongia\":\"31990000\"}]},\"user\":{\"id\":2,\"name\":\"H\\u00f9ng\",\"email\":\"hung2603961@gmail.com\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"180 Cao l\\u1ed7\",\"gioitinh\":0,\"sdt\":1228945351,\"level\":1,\"created_at\":null,\"updated_at\":null}}', NULL, '2019-01-04 16:31:10', '2019-01-04 16:31:10'),
('eb988f64-8d0f-43e2-a85b-dabccd79e434', 'App\\Notifications\\ThongBaoDatHang', 'App\\User', 1, '{\"donhang\":{\"id\":43,\"id_user\":2,\"tongtien\":\"30000000\",\"diachi\":\"180 Cao l\\u1ed7\",\"trangthai\":0,\"ngaydat\":\"2019-01-04 10:58:30\",\"chitietdonhang\":[{\"id\":9,\"id_donhang\":43,\"id_sanpham\":14,\"soluong\":1,\"dongia\":\"30000000\"}]},\"user\":{\"id\":2,\"name\":\"H\\u00f9ng\",\"email\":\"hung2603961@gmail.com\",\"vaitro\":\"Kh\\u00e1ch h\\u00e0ng\",\"diachi\":\"180 Cao l\\u1ed7\",\"gioitinh\":0,\"sdt\":1228945351,\"level\":1,\"created_at\":null,\"updated_at\":null}}', NULL, '2019-01-04 03:58:37', '2019-01-04 03:58:37');

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
(3, 2, 1, 2, 'HP Omen 15', '25000000', 'c06029732.png', '12 tháng', 9, '2018-12-27 23:28:13'),
(14, 2, 1, 6, 'Acer Predator Helios 300', '34990000', 'acer_predator_helios_300_ph315-51-7533__2__grande.jpg', '12 tháng', 6, '2018-08-28 23:31:47'),
(15, 2, 1, 3, 'ASUS ROG GL504GS-ES025T', '62000000', 'asus_rog_strix_scar_ii_gl504gs-es025t_3_grande.jpg', '24 tháng', 9, '2018-11-28 23:31:47'),
(16, 7, 2, 4, 'Samsung Galaxy S9 Plus', '20390000', 'samsung-galaxy-s9-plus-hang-cong-ty_1519634455.jpg', '12 tháng', 22, '2018-11-28 23:31:47'),
(18, 9, 1, 5, 'Apple Macbook Air 2018', '31990000', '5293f93a5a73c25fcf9777d25bb05047.jpg', '24 tháng', 18, '2018-11-28 23:31:47'),
(19, 9, 1, 5, 'Macbook Pro 2017 (13.3 inch)', '36290000', '1.u5552.d20170921.t100710.572564.jpg', '12 tháng', 0, '2018-11-28 23:31:47'),
(21, 10, 1, 4, 'Notebook 9', '23000000', 'vn-notebook-np900x3h-k01vn-np900x3h-k01vn-frontsilver-73479751.jpg', '12 tháng', 0, '2018-11-28 23:31:47'),
(22, 10, 1, 4, 'Notebook 3', '19990000', 'vn-notebook-np300e5l-k01vn-np300e5l-k01vn-Black-74267846.jpg', '18 tháng', 0, '2019-01-01 14:02:23'),
(25, 7, 2, 4, 'Samsung Galaxy Note 8', '13990000', 'bdd2f680ab5ffbe8220f7325e82cb648.jpg', '12 tháng', 1, '2018-11-28 23:31:47'),
(26, 4, 2, 5, 'iPhone X', '24790000', 'c56b1807542b9cd9ed066c3939f5de5e.jpg', '24 tháng', 27, '2018-11-28 23:31:47'),
(27, 4, 2, 5, 'iPhone 6s Plus', '9490000', '9db13115f2e81cc69d96c38925dd2ff7.jpg', '12 tháng', 4, '2018-11-28 23:31:47'),
(29, 7, 2, 8, 'Nokia 7 Plus', '6790000', '4d835f96adc7f8c32edd462d282f7a97.jpg', '12 tháng', 7, '2018-11-28 23:31:47'),
(30, 7, 2, 8, 'Nokia 6 (2018)', '4190000', 'nokia6-1.png', '12 tháng', 1, '2018-11-28 23:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `sanphamloi`
--

CREATE TABLE `sanphamloi` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `tensp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayloi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 2, 20, 20),
(2, 3, 6, 10),
(4, 14, 20, 20),
(5, 18, 18, 20),
(6, 15, 10, 10),
(7, 16, 8, 8),
(9, 19, 7, 7),
(11, 21, 9, 9),
(12, 22, 12, 12),
(13, 25, 20, 20),
(14, 26, 10, 10),
(15, 27, 10, 10),
(16, 29, 20, 20),
(17, 30, 25, 25);

-- --------------------------------------------------------

--
-- Table structure for table `trahang`
--

CREATE TABLE `trahang` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_sanpham` int(11) UNSIGNED NOT NULL,
  `id_donhang` int(11) UNSIGNED NOT NULL,
  `noidung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `tinhtrang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaitro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `sdt` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `vaitro`, `diachi`, `gioitinh`, `sdt`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$iMaEyWyhHXGJ47xRd.m2ze8lCeEsy6IU8fEo9pt9bmF6onqETxnxa', 'Admin', '36/12', 0, 12345678, 0, 'rjax1QPblr0XxjG06Omz7YSsa6J77wWhDHQbhe1Gc1pLD7JgTxYf6mD4rZT0', NULL, NULL),
(2, 'Hùng', 'hung2603961@gmail.com', '$2y$10$Gg0vAuHIX6G9CqL6j85feOwD2.jvK6Lz2q8Ri9lMcuC65VG5ON2MG', 'Khách hàng', '180 Cao lỗ', 0, 1228945351, 1, '08HnQBX45xjLT7wBAgkvdDWYH7PPL0GzztndIDi4OYGLcITLShxpxn9eFw6W', NULL, NULL),
(3, 'Nhân', 'nhan@gmail.com', '$2y$10$iMaEyWyhHXGJ47xRd.m2ze8lCeEsy6IU8fEo9pt9bmF6onqETxnxa', 'Khách hàng', '36/12', 0, 4312345, 1, NULL, NULL, NULL),
(4, 'Cuong ', 'cuong@gmail.com', '$2y$10$iMaEyWyhHXGJ47xRd.m2ze8lCeEsy6IU8fEo9pt9bmF6onqETxnxa', 'Nhan vien nhap hang', '36/12', 0, 4312345, 2, 'qgWnUXuEyiLNPCiXEX7o6hqVRs7iSmztUuGNDr3OZaf9EqMcuIQ4IFS74cki', NULL, NULL),
(5, 'Khách hàng 1', 'khachhang1@gmail.com', '$2y$10$kiVrjwuf4.LWv/Ow4sat8uXJHP5m4hTqm4.obCy9eZdXzHrR/Uqg6', 'Khách hàng', 'Cao lỗ', 1, 125487632, 1, 'EJTBrisjIRVhQYZ3Qld24xb9KMDryBhlfTtKxx8Uh1G41Dl4j9BX6SGBYT1K', NULL, NULL),
(6, 'a2', 'a2@gmail.com', '$2y$10$eZR0Of3isOmoLrmDM4WGteiJxZ8Ct2QfPD6TpH/xsxEK6a.k4V57W', 'Khách hàng', 'Cao lỗ', 0, 123456, 1, 'Zzq2h26WgjNizn1BZ3xN6CloVrKdSjhuu845qtH2', NULL, NULL),
(7, 'Nhân', 'trongnhan2603961@gmail.com', '$2y$10$aYyOl4bP2RwuScOu944vr.bZD5s32yX0SHo1a/eh6hE09iAKGJdtK', 'Khách hàng', '181 Kinh Dương Vương', 0, 1228945352, 1, 'qyBJRMamhFmTbVE51fmq0Cah911me0eP8X1UK54FgBs4kInubfmPxRd2PkEZ', NULL, NULL);

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
  ADD KEY `sanphamloi_id_user_foreign` (`id_user`),
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `giaohang`
--
ALTER TABLE `giaohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `sanphamloi`
--
ALTER TABLE `sanphamloi`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soluongsanpham`
--
ALTER TABLE `soluongsanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trahang`
--
ALTER TABLE `trahang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  ADD CONSTRAINT `sanphamloi_id_sanpham_foreign` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanphamloi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
