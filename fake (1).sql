-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 10, 2021 at 03:41 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fake`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethd`
--

DROP TABLE IF EXISTS `chitiethd`;
CREATE TABLE IF NOT EXISTS `chitiethd` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idHoaDon` int NOT NULL,
  `idSP` int NOT NULL,
  `tensp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dacdiem` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` int NOT NULL,
  `soluong` tinyint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idHoaDon` (`idHoaDon`),
  KEY `idSP` (`idSP`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chitiethd`
--

INSERT INTO `chitiethd` (`id`, `idHoaDon`, `idSP`, `tensp`, `dacdiem`, `gia`, `soluong`) VALUES
(1, 1, 11, 'Khung lưới trang trí', 'Hồng', 100000, 3),
(2, 2, 9, 'Cốc thủy tinh có quai Good Morning', 'Mặc định', 115000, 2),
(3, 3, 8, 'Bát tô sứ Cô bé Korea', 'Hồng', 155000, 2),
(4, 4, 4, 'Bảng ghim bần viền gỗ tự nhiên', 'Mặc định', 100000, 1),
(5, 4, 5, 'Móc khóa dây bi Cô bé', 'Gấu unicorn', 15000, 1),
(6, 5, 7, 'Lịch vuông mini để bàn Happy 2021', 'Gấu unicorn', 20000, 3),
(7, 6, 11, 'Khung lưới trang trí', 'Hồng', 100000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chitietloai`
--

DROP TABLE IF EXISTS `chitietloai`;
CREATE TABLE IF NOT EXISTS `chitietloai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenloaichitiet` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `idLoai` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idLoai` (`idLoai`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chitietloai`
--

INSERT INTO `chitietloai` (`id`, `tenloaichitiet`, `idLoai`) VALUES
(1, 'Bút gel', 1),
(2, 'Bút highlight', 1),
(3, 'Gương, lược', 7),
(4, 'Giấy note', 3),
(5, 'Sổ ghi chép', 3),
(6, 'Mặc định', 1),
(7, 'Mặc định', 2),
(8, 'Mặc định', 3),
(9, 'Mặc định', 4),
(10, 'Mặc định', 5),
(11, 'Mặc định', 6),
(12, 'Mặc định', 7),
(13, 'Mặc định', 8),
(14, 'Mặc định', 10),
(15, 'Mặc định', 13),
(16, 'Mặc định', 12),
(17, 'Mặc định', 13),
(18, 'Mặc định', 14),
(19, 'Mặc định', 15),
(20, 'Mặc định', 16),
(21, 'Mặc định', 17),
(22, 'Mặc định', 18),
(23, 'Mặc định', 19),
(38, 'Mặc định', 116);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenkh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ngaymua` datetime NOT NULL,
  `ghichu` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `tongtien` int NOT NULL,
  `thanhtoan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vanchuyen` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`sdt`),
  KEY `sdt` (`sdt`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`id`, `tenkh`, `email`, `diachi`, `sdt`, `ngaymua`, `ghichu`, `tongtien`, `thanhtoan`, `vanchuyen`) VALUES
(1, 'Như', 'auhuenhu2015@gmail.com', '160/30K Nguyễn Duy Dương phường 3 quận 10', '909090902', '2021-04-06 21:57:00', 'giao sau 12g trưa', 320000, 'Thanh toán khi giao hàng (COD)', 'Giao tận nơi'),
(2, 'Hào', 'haovip185@gmail.com', '31 đường 320 quận 8', '936018819', '2021-04-06 22:18:55', NULL, 250000, 'Thanh toán khi giao hàng (COD)', 'Giao tận nơi'),
(3, 'Loan', 'a@gmail.com', '41/5/1 Sư Vạn Hạnh phường 2 quận 10', '918207512', '2021-04-06 22:22:31', NULL, 330000, 'Thanh toán khi giao hàng (COD)', 'Giao tận nơi'),
(4, 'Xuân Mai', 'huynhxuanmai@gmail.com', '32/2 Lý Thái Tổ phường 3 quận 10', '947648653', '2021-04-06 22:45:21', NULL, 135000, 'Thanh toán khi giao hàng (COD)', 'Giao tận nơi'),
(5, 'Như', 'auhuenhu2015@gmail.com', '41/5/1 Sư Vạn Hạnh phường 2 quận 10', '933714383', '2021-04-07 12:06:18', NULL, 80000, 'Thanh toán khi giao hàng (COD)', 'Giao tận nơi'),
(6, 'Huệ Như', 'auhuenhu2015@gmail.com', '41/5/1 Sư Vạn Hạnh phường 2 quận 10', '0933714383', '2021-04-09 13:26:34', NULL, 120000, 'Thanh toán khi giao hàng (COD)', 'Giao tận nơi');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `sdt` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tenkh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  KEY `sdt` (`sdt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `idMenu` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idMenu` (`idMenu`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`id`, `tenloai`, `idMenu`) VALUES
(1, 'Bút', 1),
(2, 'Lịch', 1),
(3, 'Sổ, vở', 1),
(4, 'Sticker', 1),
(5, 'Băng keo trang trí', 1),
(6, 'Ly, cốc', 2),
(7, 'Phụ kiện làm đẹp', 2),
(8, 'Túi', 3),
(10, 'Đèn', 5),
(11, 'Tủ', 5),
(12, 'Khung lưới trang trí', 5),
(13, 'Gấu bông', 6),
(14, 'Mặc định', 1),
(15, 'Mặc định', 2),
(16, 'Mặc định', 3),
(17, 'Mặc định', 4),
(18, 'Mặc định', 5),
(19, 'Mặc định', 6),
(116, 'Móc khóa', 3);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tenmenu` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `tenmenu`) VALUES
(1, 'VĂN PHÒNG PHẨM'),
(2, 'PHỤ KIỆN ĐỜI SỐNG'),
(3, 'PHỤ KIỆN THỜI TRANG'),
(4, 'ĐỒ DÙNG VĂN PHÒNG'),
(5, 'QUÀ TẶNG, TRANG TRÍ'),
(6, 'GẤU BÔNG, ĐỒ VẢI');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tensp` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `idLoai` int NOT NULL,
  `idLoaiChiTiet` int NOT NULL,
  `gia` int NOT NULL,
  `ngaynhap` datetime NOT NULL,
  `dacdiem` json NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idLoai` (`idLoai`),
  KEY `idNhom` (`idLoaiChiTiet`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `mota`, `hinh`, `idLoai`, `idLoaiChiTiet`, `gia`, `ngaynhap`, `dacdiem`) VALUES
(1, 'Bút gel mochi có đuôi', '✨ Set 8 bút gel bấm nhiều hình<br>\r\n\r\n✨ Set bút gel với nét viết nhỏ và êm, mực xuống đều không bị nghẹt mực. Đầu bút và thân bút được làm từ nhựa đặc biệt rất bền và đẹp.<br>\r\n\r\n✨ Bút gel thích hợp cho học sinh, sinh viên và cả các bạn văn phòng.<br>\r\n\r\n✨ Ngòi bút: 0.5 mm, nhiều màu mực.<br>\r\n\r\n✨ Set gồm 8 bút kích thước mỗi cây 14 cm.<br>\r\n\r\n✨ Trọng lượng: 200 gram.<br>', 'but-gel-mochi-co-duoi.jpg', 1, 1, 10000, '2021-03-04 23:17:22', '{\"0\": {\"sl\": 15, \"name\": \"Heo\"}, \"1\": {\"sl\": 5, \"name\": \"Thỏ\"}, \"2\": {\"sl\": 5, \"name\": \"Mèo\"}, \"3\": {\"sl\": 6, \"name\": \"Chuột\"}}'),
(2, 'Bút gel thân trắng nhiều hình', '✨ Bút gel thân trắng nhiều hình.<br>\r\n\r\n✨ Bút gel với rất nhiều màu sắc dễ thương đính nhân vật hoạt hình ở đầu bút.<br>\r\n\r\n✨ Nét viết nhỏ và êm, mực xuống đều không bị nghẹt mực. Đầu bút và thân bút được làm từ nhựa đặc biệt rất bền và đẹp.<br> \r\n\r\n✨ Bút gel thích hợp cho học sinh, sinh viên và cả các bạn văn phòng!<br>\r\n\r\n✨ Ngòi bút: 0.5 mm, mực đen.<br>\r\n\r\n✨ Kích thước: 14 cm.<br> \r\n\r\n✨ Trọng lượng: 50 gram.<br>', 'but-gel-than-trang-nhieu-hinh.jpg', 1, 1, 20000, '2021-03-05 11:38:51', '{\"0\": {\"sl\": 5, \"name\": \"Kem ốc quế\"}, \"1\": {\"sl\": 9, \"name\": \"Đùi gà\"}, \"2\": {\"sl\": 8, \"name\": \"Chuối\"}, \"3\": {\"sl\": 11, \"name\": \"Bắp rang bơ\"}}'),
(3, 'Bút highlight Mo huan bi', 'nhap', 'but-highlight-mo-huan-bi.jpg', 1, 2, 20000, '2021-03-02 11:40:07', '{\"0\": {\"sl\": 10, \"name\": \"Hồng\"}, \"1\": {\"sl\": 10, \"name\": \"Vàng\"}, \"2\": {\"sl\": 5, \"name\": \"Xanh lá\"}, \"3\": {\"sl\": 14, \"name\": \"Tím\"}}'),
(4, 'Bảng ghim bần viền gỗ tự nhiên', '? Bảng ghim bần viền gỗ tự nhiên\r\n\r\nChiếc bảng ghim dùng để trang trí nhà cửa, làm bảng thông báo trong văn phòng, trường lớp.\r\n\r\n- Thiết kế khung gỗ tự nhiên đơn giản, đẹp sang trọng và không lỗi mốt.\r\n\r\n- Ghim tốt, ghim lâu không nát, mặt luôn phẳng và đẹp.\r\n\r\n- Sản phẩm làm bằng gỗ tự nhiên nên rất thân thiện với môi trường.\r\n\r\n? Có 3 size kích thước: 20 x 30, 30 x 40, 40 x 60 cm.\r\n\r\n? Trọng lượng: 150 gram.', 'bang-ghim-go-ban.jpg', 18, 22, 100000, '2021-04-06 18:25:30', '[{\"sl\": 18, \"name\": \"Mặc định\"}]'),
(5, 'Móc khóa dây bi Cô bé', '? Móc khóa dây bi Cô bé\r\n\r\n- Dùng để trang trí túi, sổ, chìa khóa xe thêm nổi bật.\r\n\r\n? Chất liệu: Nhựa.\r\n\r\n? Kích thước tổng thế: 7,5 x 3 cm.\r\n\r\n? Trọng lượng: 50g.', 'moc-khoa-day-bi-co-be.jpg', 116, 38, 15000, '2021-04-06 18:39:47', '[{\"sl\": 5, \"name\": \"Cô bé thỏ hồng\"}, {\"sl\": 15, \"name\": \"Cô bé ếch\"}, {\"sl\": 5, \"name\": \"Cô bé trái tim\"}, {\"sl\": 5, \"name\": \"Cô bé trà sữa\"}, {\"sl\": 5, \"name\": \"Gấu cầm hoa\"}, {\"sl\": 14, \"name\": \"Gấu unicorn\"}, {\"sl\": 5, \"name\": \"Cô bé\"}, {\"sl\": 5, \"name\": \"Cô bé học sinh\"}]'),
(6, 'Giấy note Girl and Friends', 'GIẤY NOTE GIRL AND FRIENDS\r\n\r\nChất liệu giấy cao cấp viết không in và nhòe mực. Được thiết kế họa tiết dễ thương tạo cảm hứng làm việc và học tập. Một set giấy 50 tờ.\r\n\r\nKích thước: 12x9cm\r\n\r\nKhối lượng: 50gram', 'giay-note-girl-and-friends.jpg', 3, 4, 20000, '2021-04-06 18:43:08', '{\"0\": {\"sl\": 5, \"name\": \"Hành tinh\"}, \"1\": {\"sl\": 15, \"name\": \"Đào\"}, \"2\": {\"sl\": 5, \"name\": \"Trò chơi\"}, \"3\": {\"sl\": 5, \"name\": \"Make up\"}, \"4\": {\"sl\": 5, \"name\": \"Rạp xiếc\"}}'),
(7, 'Lịch vuông mini để bàn Happy 2021', '? Lịch vuông mini để bàn Happy 2021\r\n\r\nLịch mini với nhiều tông màu xinh xắn dùng trang trí bàn làm việc bàn học, bàn làm việc cực xinh. \r\n\r\nLịch được làm bằng chất liệu giấy cao cấp, nhẹ và bền. \r\n\r\n? Kích thước R x C: 6,5 x 7,5 cm.\r\n\r\n? Trọng lượng: 100 gram.\r\n\r\n? Lịch bắt đầu từ 01/2021 - 12/2021.', 'lich-vuong-mini-de-ban-happy-2021.jpg', 2, 7, 20000, '2021-04-06 18:44:37', '[{\"sl\": 5, \"name\": \"Gấu cầm hoa\"}, {\"sl\": 9, \"name\": \"Gấu unicorn\"}, {\"sl\": 5, \"name\": \"2 người bạn\"}, {\"sl\": 5, \"name\": \"Cô bé\"}]'),
(8, 'Bát tô sứ Cô bé Korea', '❄️ BÁT TÔ SỨ CÔ BÉ KOREA\r\n\r\n☃️ Chiếc tô sứ phong cách Hàn Quốc cực kỳ xinh xắn, vừa đựng snack đồ ăn vừa có thể làm đồ trang trí.\r\n\r\n☁️ Chất liệu sứ cao cấp in hình sắc nét, sử dụng được trong lò vi sóng.\r\n\r\n→ Kích thước: Đường kính 14,5cm\r\n→ Khối lượng: 300gram', 'bat-su-co-be-korea.jpg', 6, 11, 155000, '2021-04-06 18:46:16', '[{\"sl\": 5, \"name\": \"Xanh dương\"}, {\"sl\": 13, \"name\": \"Hồng\"}, {\"sl\": 5, \"name\": \"Cam\"}, {\"sl\": 4, \"name\": \"Tím\"}]'),
(9, 'Cốc thủy tinh có quai Good Morning', '? CỐC THỦY TINH CÓ QUAI GOOD MORNING\r\n\r\n?  Thật tuyệt vời khi bắt đầu buổi sáng với chiếc cốc xinh xắn này. Với thiết kế Minimal giản đơn nhưng lại phù hợp với mọi không gian.\r\n\r\n? Tuy là thủy tinh 1 lớp nhưng có thể chịu nhiệt tốt.\r\n\r\n→ Chất liệu: Thủy tinh\r\n→ Kích thước: chiều cao 10,5cm - đường kính 8cm\r\n→ Dung tích: 450ml', 'coc-thuy-tinh-co-quai-good-morning.jpg', 6, 11, 115000, '2021-04-06 18:47:46', '[{\"sl\": 8, \"name\": \"Mặc định\"}]'),
(10, 'Túi lưới Milk Joy', '☘ ☘ ☘ Túi lưới Milk Joy xinh vô cùng đáng yêu.\r\n\r\n? Có em túi này thì tha hồ đi chơi, đi học hay đi làm đựng được nhiều đồ mà lại rất phong cách nữa.\r\n\r\n? Chất liệu: Vải lưới.\r\n\r\n? Kích thước: 20 x 24 cm.\r\n\r\n? Trọng lượng: 100 gram.', 'tui-luoi-milk-joy.jpg', 8, 13, 130000, '2021-04-06 18:49:46', '{\"0\": {\"sl\": 5, \"name\": \"Cake bear\"}, \"1\": {\"sl\": 15, \"name\": \"Tulip vàng\"}, \"2\": {\"sl\": 30, \"name\": \"Tulip hồng\"}}'),
(11, 'Khung lưới trang trí', 'Khung lưới trang trí 45x65cm - Nơi lưu giữ những kỉ niệm tuyệt vời\r\n? Lưới trang trí có thể sử dụng để trưng bày các loại tranh ảnh. Hơn nữa bạn có thể dùng để treo đồ văn phòng phẩm làm cho góc làm việc của bạn trở nên gọn gàng hơn, tươi tắn hơn\r\n\r\n? Lưới trang trí làm bằng chất liệu không gỉ, cực kì bền màu luôn.\r\n\r\n? Với hình dạng rất tiện lợi giúp các bạn có thể chọn lựa để tô điểm thêm khung gian làm việc cũng như học tập của mình\r\n\r\n? Sản phẩm gồm 3 màu: trắng, đen.\r\n\r\n? Chất liệu: Kim loại bọc nhựa tĩnh điện.\r\n\r\n? Kích thước: 45 x 65 cm.\r\n\r\n? Trọng lượng: 200 gram.', 'khung-luoi-trang-tri-45x65.jpg', 12, 16, 100000, '2021-04-06 18:50:37', '[{\"sl\": 5, \"name\": \"Đen\"}, {\"sl\": 15, \"name\": \"Trắng\"}, {\"sl\": 21, \"name\": \"Hồng\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quyen` int NOT NULL,
  `facebook_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ten`, `sdt`, `gioitinh`, `email`, `password`, `quyen`, `facebook_id`) VALUES
(1, 'Âu Huệ Như', '0933714383', 'Nữ', 'auhuenhu2015@gmail.com', '$2y$10$P1iHkdFd8wqgZhuenMvn4uPxeqZLsN50iKwp9cgy9WtuhI0MD7Dxq', 1, ''),
(2, 'Lưu Kim Hào', '0936018819', 'Nam', 'haovip185@gmail.com', '$2y$10$I.joIGnMKWFocRirMGAYiebj2b5NnJXjjmRuUFCPSuGrXmfM08HSu', 1, ''),
(9, 'Trần Loan', '0918207512', 'Nữ', 'a@gmail.com', '$2y$10$kbJyaK71hsJMe0tJyDCgW.enB94wLp1NhSxbcL63myCJqk1bXJxvO', 0, ''),
(13, 'Tấn Lộc', '', '', 'tanlocit9@gmail.com', 'eyJpdiI6IlNaZnl3NGRHNktsaFF1dlZZeTNSSlE9PSIsInZhbHVlIjoiT211Q2ltRzI4MTlFbHFVVzlCOEtJZz09IiwibWFjIjoiYzljMmFlZTE2YzVjYzY2NDdiZDk1Y2EwY2JkMTI4NDQxNjYwMjRmMjA0OTVmMTlmOWJmODc2ZWRkNGNmNGM4NCJ9', 0, '1702774089929158'),
(14, 'Huệ Như', '', '', 'auhuenhu2015@gmail.com', 'eyJpdiI6IklWMWszU1RTangrWFdvUW5lT3pHZGc9PSIsInZhbHVlIjoidDNLOVh5SXZrdExTNTBiS1B6cDBQQT09IiwibWFjIjoiOGNjMWNlM2FkNjViY2M1MjhjYzM4MWRhYmViMTM5MzA2Y2VlNGQ3NzFhYjY3ZjY4YmRmNGE5ODVlYjFhNjM0NSJ9', 0, '539929496969516'),
(17, 'Bảo Đăng', '0826105776', 'Nam', 'baodang@gmail.com', '$2y$10$duza02SqEq9bDHfiYUZE.evzHdiJS89eX3urR7q19uRLvHb6437q2', 1, '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_ibfk_1` FOREIGN KEY (`idHoaDon`) REFERENCES `hoadon` (`id`),
  ADD CONSTRAINT `chitiethd_ibfk_2` FOREIGN KEY (`idSP`) REFERENCES `sanpham` (`id`);

--
-- Constraints for table `chitietloai`
--
ALTER TABLE `chitietloai`
  ADD CONSTRAINT `chitietloai_ibfk_1` FOREIGN KEY (`idLoai`) REFERENCES `loai` (`id`);

--
-- Constraints for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`sdt`) REFERENCES `hoadon` (`sdt`);

--
-- Constraints for table `loai`
--
ALTER TABLE `loai`
  ADD CONSTRAINT `loai_ibfk_1` FOREIGN KEY (`idMenu`) REFERENCES `menu` (`id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`idLoaiChiTiet`) REFERENCES `chitietloai` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
