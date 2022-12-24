-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2022 lúc 07:41 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website_bandienthoai`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `sID` varchar(255) NOT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT 1,
  `Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`CartID`, `ProductID`, `sID`, `ProductName`, `Price`, `Quantity`, `Image`) VALUES
(18, 6, '11v1pvfqpkgfg1b3hi9s86tsd2', 'iPhone X 256GB Silver', 30990000, 1, '0c3b66c4a0.jpg'),
(19, 3, '11v1pvfqpkgfg1b3hi9s86tsd2', 'Nokia 5.1 Plus', 4290000, 2, '7968a5191d.jpg'),
(20, 4, '11v1pvfqpkgfg1b3hi9s86tsd2', 'Oppo F9', 7690000, 3, '82a9d39f22.jpg'),
(21, 5, '11v1pvfqpkgfg1b3hi9s86tsd2', 'SamSung Galaxy J4+', 2990000, 4, '5c5278e68e.jpg'),
(22, 2, '11v1pvfqpkgfg1b3hi9s86tsd2', 'Samsung Galaxy J8', 5790000, 8, 'f358a3ce4d.jpg'),
(34, 6, 'cgp3s4gnsoa66nskle8t13i4ca', 'iPhone X 256GB Silver', 30990000, 6, '0c3b66c4a0.jpg'),
(35, 4, 'cgp3s4gnsoa66nskle8t13i4ca', 'Oppo F9', 7690000, 4, '82a9d39f22.jpg'),
(36, 1, 'cgp3s4gnsoa66nskle8t13i4ca', 'Samsung Galaxy A8+ (2018)', 10990000, 4, '3b85ea1e19.jpg'),
(39, 23, 'h8is0lgd4u77l7i687dva3flb5', 'Nokia G21', 3290000, 3, '5cbee3b4a2.jpg'),
(56, 20, 'bp4atrfh1d8bons96slopdqin2', 'Huawei Y5 2017', 1000000, 1, 'b3757b1b4d.jpg'),
(96, 24, '5moedkiqg659hi1eafodthcuda', 'Nokia G11', 2890000, 1, '05679d1a13.jpg'),
(115, 24, 'o1jeu97ee5f6tlajd1nut3i7uj', 'Nokia G11', 2890000, 1, '05679d1a13.jpg'),
(130, 24, 'p8ig31epn0kfqivlgm88nl4inr', 'Nokia G11', 2890000, 1, '05679d1a13.jpg'),
(152, 24, 'nerqb40hcllro67snvfe88v4ar', 'Nokia G11', 2890000, 1, '05679d1a13.jpg'),
(179, 1, 'gcq5dde72pc22av13rg5i27pu5', 'Samsung Galaxy A8+ (2018)', 10990000, 2, '8e4d15dead.jpg'),
(188, 24, 'udlih28mh8pdvhq294dnj2juit', 'Nokia G11', 2890000, 2, '05679d1a13.jpg'),
(189, 22, 'udlih28mh8pdvhq294dnj2juit', 'Mobiistar X', 1990000, 1, '5e5a1ea540.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturer`
--

CREATE TABLE `manufacturer` (
  `ManufacturerID` int(11) NOT NULL,
  `ManufacturerName` varchar(50) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manufacturer`
--

INSERT INTO `manufacturer` (`ManufacturerID`, `ManufacturerName`, `Description`) VALUES
(1, 'Apple', 'Sản phẩm của apple'),
(2, 'XiaoMi', 'Sản phẩm của XiaoMi'),
(3, 'Samsung', 'Sản phẩm của samsung'),
(4, 'Oppo', 'Sản phẩm của Oppo'),
(5, 'Huawei', 'Sản phẩm của Huawei'),
(6, 'Nokia', 'Sản phẩm của Nokia'),
(9, 'Mobiistar', 'Sản phẩm của Mobiistar');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Price` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetails`
--

INSERT INTO `orderdetails` (`OrderID`, `ProductID`, `Price`, `Quantity`) VALUES
(47, 15, 15000000, 1),
(47, 20, 1000000, 1),
(48, 22, 1490000, 2),
(48, 24, 2890000, 1),
(49, 22, 1490000, 1),
(49, 24, 2890000, 1),
(50, 23, 3290000, 3),
(50, 24, 2890000, 4),
(51, 13, 4790000, 2),
(51, 24, 2890000, 1),
(52, 24, 2890000, 1),
(53, 22, 1490000, 2),
(53, 24, 2890000, 1),
(54, 22, 1490000, 2),
(54, 23, 3290000, 1),
(55, 24, 2890000, 4),
(59, 23, 3290000, 2),
(59, 24, 2890000, 1),
(60, 24, 2890000, 1),
(61, 13, 4790000, 1),
(61, 22, 1490000, 2),
(77, 22, 1490000, 1),
(77, 24, 2890000, 1),
(78, 23, 3290000, 1),
(78, 24, 2890000, 1),
(79, 22, 1990000, 1),
(80, 22, 1990000, 1),
(80, 24, 2890000, 1),
(81, 23, 3290000, 1),
(81, 24, 2890000, 2),
(82, 22, 1990000, 1),
(82, 24, 2890000, 1),
(83, 17, 15990000, 1),
(83, 24, 2890000, 2),
(84, 5, 2990000, 1),
(84, 23, 3290000, 1),
(85, 23, 3290000, 1),
(86, 9, 8490000, 1),
(86, 22, 1990000, 1),
(87, 23, 3290000, 1),
(88, 24, 2890000, 2),
(89, 24, 2890000, 1),
(90, 23, 3290000, 1),
(91, 23, 3290000, 2),
(92, 10, 11990000, 1),
(92, 16, 3190000, 1),
(93, 22, 1990000, 2),
(93, 24, 2890000, 2),
(94, 22, 1990000, 1),
(94, 23, 3290000, 1),
(95, 1, 10990000, 2),
(95, 13, 4790000, 1),
(96, 1, 10990000, 1),
(96, 22, 1990000, 1),
(97, 23, 3290000, 1),
(97, 24, 2890000, 1),
(98, 23, 3290000, 1),
(98, 24, 2890000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `Total` int(11) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `Receiver` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `OrderDate` timestamp NULL DEFAULT current_timestamp(),
  `Payment_methods` varchar(255) NOT NULL,
  `Status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `Total`, `Address`, `Receiver`, `Phone`, `Email`, `OrderDate`, `Payment_methods`, `Status`) VALUES
(47, 3, 16000000, '236 Hoàng Quốc Việt, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-07 03:18:51', 'Payment on delivery', 0),
(48, 3, 5870000, 'Hai Bà Trưng, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-07 03:48:06', 'Payment on delivery', 1),
(49, 3, 4380000, ' Hoàn Kiếm, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-07 04:19:59', 'Payment on delivery', 2),
(50, 3, 21430000, '236 Hoàng Quốc Việt, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-07 08:41:55', 'Payment on delivery', 0),
(51, 3, 12470000, '236 Ha Dong, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-07 08:46:59', 'Payment on delivery', 4),
(52, 3, 2890000, '236 Hoàng Quốc Việt, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-07 10:17:41', 'Payment on delivery', 0),
(53, 4, 5870000, 'Trần Cung,Hà Nội', 'Triệu Ngọc Tài', '0856789884', 'ngoctai2k@gmail.com', '2022-12-07 16:37:40', 'Payment on delivery', 2),
(54, 4, 6270000, 'Mễ Trì,Hà Nội', 'Triệu Ngọc Tài', '0856789884', 'ngoctai2k@gmail.com', '2022-12-08 02:25:08', 'Payment on delivery', 6),
(55, 4, 11560000, 'Mễ Trì,Hà Nội', 'Triệu Ngọc Tài', '0856789884', 'ngoctai2k@gmail.com', '2022-12-08 03:58:18', 'Payment on delivery', 0),
(59, 2, 9470000, 'Cổ Nhuế,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-09 03:32:08', 'Payment on delivery', 0),
(60, 2, 2890000, 'Cổ Nhuế,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-09 03:36:58', 'Payment on delivery', 0),
(61, 3, 7770000, '236 Hoàng Quốc Việt, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-12 02:50:20', 'Payment on delivery', 6),
(77, 3, 4380000, '236 Hoàng Quốc Việt, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-12 10:27:08', 'Paid via vnpay', 0),
(78, 3, 6180000, 'Cầu Giấy, Hà Nội', 'Lê Minh Hiếu', '0846535981', 'leminhhieu9x@gmail.com', '2022-12-14 06:54:18', 'Paid via vnpay', 6),
(79, 2, 1990000, 'Hoàng Quốc Việt,Hà Nội', 'Nguyễn Văn Dũng', '0839224975', 'dungnguyen99@gmail.com', '2022-12-15 09:19:15', 'Paid via vnpay', 0),
(80, 2, 4880000, 'Cổ Nhuế,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-15 09:23:41', 'Paid via vnpay', 0),
(81, 2, 9070000, 'Trần Cung,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-15 13:55:17', 'Payment on delivery', 6),
(82, 2, 4880000, 'Cổ Nhuế,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-15 14:07:05', 'Paid via vnpay', 2),
(83, 5, 21770000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 02:26:45', 'Payment on delivery', 0),
(84, 5, 6280000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 02:29:06', 'Paid via vnpay', 6),
(85, 5, 3290000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 04:55:30', 'Payment on delivery', 0),
(86, 5, 10480000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 07:27:30', 'Paid via vnpay', 0),
(87, 5, 3290000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 08:47:11', 'Payment on delivery', 0),
(88, 5, 5780000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 08:49:58', 'Payment on delivery', 0),
(89, 5, 2890000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 09:20:54', 'Payment on delivery', 0),
(90, 5, 3290000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 09:40:29', 'Payment on delivery', 0),
(91, 5, 6580000, 'Nguyễn Khang, Cầu Giấy', 'Trương Minh Phúc', '0863935617', 'minhphuc@gmail.com', '2022-12-16 09:45:11', 'Payment on delivery', 0),
(92, 2, 15180000, 'Trần Cung,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-17 02:46:11', 'Paid via vnpay', 6),
(93, 6, 9760000, 'Hai Bà Trưng,Hà Nội', 'hieu', '0853535697', 'hieu123@gmail.com', '2022-12-20 14:16:45', 'Payment on delivery', 6),
(94, 6, 5280000, 'Đại Cồ Việt', 'hieu', '0853535697', 'hieu123@gmail.com', '2022-12-20 14:22:31', 'Paid via vnpay', 0),
(95, 2, 26770000, 'Hai Bà Trưng,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-20 14:37:08', 'Payment on delivery', 0),
(96, 2, 12980000, 'Cổ Nhuế,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-20 14:41:05', 'Paid via vnpay', 4),
(97, 2, 6180000, 'Trần Cung,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-21 01:42:14', 'Payment on delivery', 6),
(98, 2, 6180000, 'Cổ Nhuế,Hà Nội', 'Nguyễn Văn Dũng', '0839114975', 'dungnguyen99@gmail.com', '2022-12-21 01:43:02', 'Paid via vnpay', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `ManufacturerID` int(11) DEFAULT NULL,
  `ProductName` varchar(50) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Amount` int(11) UNSIGNED DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `Screen` varchar(50) DEFAULT NULL,
  `OperatingSystem` varchar(50) DEFAULT NULL,
  `FrontCamera` varchar(50) DEFAULT NULL,
  `BackCamera` varchar(50) DEFAULT NULL,
  `CPU` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `ROM` varchar(50) DEFAULT NULL,
  `SDCard` varchar(50) DEFAULT NULL,
  `Battery` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `ManufacturerID`, `ProductName`, `Price`, `Amount`, `Image`, `Screen`, `OperatingSystem`, `FrontCamera`, `BackCamera`, `CPU`, `RAM`, `ROM`, `SDCard`, `Battery`) VALUES
(1, 3, 'Samsung Galaxy A8+ (2018)', 11990000, 13, '8e4d15dead.jpg', 'Super AMOLED, 6\', Full HD+', 'Super AMOLED, 6\', Full HD+', '16 MP and 8 MP (2 camera)', '16 MP', 'AExynos 7885 8 core 64-bit', '6 GB', '64 GB', 'MicroSD, up to 256 GB', '3500 mAh, with fast charging'),
(2, 3, 'Samsung Galaxy J8', 6290000, 14, 'f358a3ce4d.jpg', 'Super AMOLED, 6.0\', HD+', 'Android 8.0 (Oreo)', '16 MP', '16 MP and 5 MP (2 camera)', 'Qualcomm Snapdragon 450 8 core 64-bit', '3 GB', '32 GB', ' MicroSD, up to 256 GB', '3500 mAh'),
(3, 6, 'Nokia 5.1 Plus', 4790000, 13, '7968a5191d.jpg', 'IPS LCD, 5.8\', HD+', 'Android One', '8 MP', '13 MP and 5 MP (2 camera)', 'MediaTek Helio P60 8 core 64-bit', '3 GB', '32 GB', 'MicroSD, up to 256 GB', '3060 mAh, with fast charging'),
(4, 4, 'Oppo F9', 7690000, 12, '82a9d39f22.jpg', 'LTPS LCD, 6.3\', Full HD+', 'ColorOS 5.2 (Android 8.1)', '25MB', '(2 camera )16 MP and 2 MP ', 'MediaTek Helio P60 8-core 64-bit', '4 GB', '64 GB', 'MicroSD, up to 256 GB', '3500 mAh, with fast charging'),
(5, 3, 'SamSung Galaxy J4+', 3490000, 10, '5c5278e68e.jpg', 'IPS LCD, 6.0\', HD+', 'Android 8.1 (Oreo)', '13 MP', '5 MP', 'Qualcomm Snapdragon 425 Quad Core 64-bit', '2 GB', '16 GB', 'MicroSD, up to 256 GB', '3300 mAh'),
(6, 1, 'iPhone X 256GB Silver', 31990000, 9, '0c3b66c4a0.jpg', 'OLED, 5.8\', Super Retina', 'iOS 11', '2 camera 12 MP', '7 MP', 'Apple A11 Bionic 6 cores', '3 GB', '256 GB', 'No', '2716 mAh, with fast charging'),
(9, 1, 'iPad 2018 Wifi 32GB', 8990000, 8, '2b183e500b.jpg', 'LED-backlit LCD, 9.7p\'\'', 'iOS 11.3', '1.2 MP', '8 MP', 'Apple A10 Fusion, 2.34 GHz', '2 GB', '32 GB', 'No', ' 8600 mAh'),
(10, 2, 'Xiaomi Mi 8', 12990000, 14, '2174418826.jpg', 'IPS LCD, 6.26\', Full HD+', 'Android 8.1 (Oreo)', '24 MP', '12 MP và 5 MP (2 camera)', 'Qualcomm Snapdragon 660 8 core', '4 GB', '64 GB', 'MicroSD, support up to 512GB', '3300 mAh, with fast charging'),
(11, 2, 'Xiaomi Mi 8 Lite', 6690000, 12, 'b7286a68cc.jpg', 'IPS LCD, 6.26\', Full HD+', 'Android 8.1 (Oreo)', '24 MP', '12 MP and 5 MP (2 camera)', 'Qualcomm Snapdragon 660 8 core', '4 GB', '64 GB', 'MicroSD, support up to 512 GB', '3300 mAh, with fast charging'),
(12, 2, 'Xiaomi Redmi Note 5', 5690000, 12, 'ae7775c8c7.jpg', 'IPS LCD, 5.99\', Full HD+', 'Android 8.1 (Oreo)', '13 MP', '12 MP and 5 MP (2 camera)', 'Qualcomm Snapdragon 636 8 core', '4 GB', '64 GB', 'MicroSD, support up to 128 GB', '4000 mAh, with fast charging'),
(13, 2, 'Xiaomi Redmi 5 Plus 4GB', 4790000, 8, '69969001db.jpg', 'IPS LCD, 5.99\', Full HD+', 'Android 7.1 (Nougat)', '5 MP', '12 MP', 'Snapdragon 625 8 core 64-bit', '4 GB', '64 GB', ' MicroSD, up to 256 GB', '4000 mAh'),
(14, 3, 'Samsung Galaxy A7 (2018)', 8990000, 16, 'b39e5c27b5.jpg', 'Super AMOLED, 6.0\', Full HD+', 'Android 8.0 (Oreo)', '24 MP', '24 MP, 8 MP and 5 MP (3 camera)', 'Exynos 7885 8 core 64-bit', '4 GB', '64 GB', 'MicroSD, support up to 512 GB', '3300 mAh'),
(15, 1, 'iPhone 7 Plus 32GB', 17000000, 10, 'fbfa1a61f2.jpg', 'LED-backlit IPS LCD, 5.5\', Retina HD', 'iOS 11', '7 MP', '2 camera 12 MP', 'Apple A10 Fusion 4 core 64-bit', '3 GB', '32 GB', 'No', '2900 mAh'),
(16, 4, 'Oppo A3s 32GB', 4690000, 10, 'b02789c274.jpg', 'IPS LCD, 6.2\', HD+', 'Android 8.1 (Oreo)', '8 MP', '13 MP and  2 MP (2 camera)', 'Qualcomm Snapdragon 450 8 core 64-bit', '3 GB', '32 GB', 'MicroSD, up to 256 GB', '4230 mAh'),
(17, 5, 'Huawei Mate 20 Pro', 15990000, 12, 'e938a7b6f0.jpg', 'OLED6.39\"Quad HD+ (2K+)', 'Android 9 (Pie)', '24 MP', ' 40 MP , Phụ 20 MP and  8 MP(3 camera)', '2 cores 2.6 GHz, 2 cores 1.92 GHz & 4 cores 1.8 GH', '6 GB', '128 GB', 'NM card, up to 256 GB', '4200 mAh'),
(18, 5, ' Huawei Nova 3', 7500000, 12, 'c9a901798f.jpg', 'LTPS LCD6.3\"Full HD+', '4 core 2.36GHz & 4 core 1.7GHz', ' 24 MP and 2 MP', '16 MP and 24 MP (2 camera)', 'Kirin 970 8 core', ' 6 GB', '128 GB', 'MicroSD, up to 256 GB', '3750 mAh'),
(20, 5, 'Huawei Y5 2017', 3000000, 11, 'b3757b1b4d.jpg', 'IPS LCD5\"HD', 'Android  6.0', '5 MP', '8 MP', 'MediaTek MT6737T', ' 2 GB', '16 GB', 'MicroSD, up to 128 GB', '3000 mAh'),
(21, 9, 'Mobiistar E Selfie', 2490000, 10, '027cd2b880.jpg', 'IPS LCD, 6.0\', HD+', 'Android 7.0 (Nougat)', '13 MP', '13 MP', 'MediaTek MT6739 4 core 64-bit', '2 GB', '16 GB', 'MicroSD, up to 128 GB', '3900 mAh'),
(22, 9, 'Mobiistar X', 3490000, 24, '5e5a1ea540.jpg', 'IPS LCD, 5.86\', HD+', 'Android 8.1 (Oreo)', '16 MP', '16 MP and  5 MP (2 camera)', 'MediaTek MT6762 8 core 64-bit (Helio P22)', '4 GB', '64 GB', 'MicroSD, up to 256 GB', '3000 mAh'),
(23, 6, 'Nokia G21', 4290000, 17, '5cbee3b4a2.jpg', 'TFT LCD6.5\"HD+', 'Android 11', '8 MP', '50 MP, 2 MP, 2MP (3 camera)', 'Unisoc T606 8 core', '4 GB', '128 GB', ' MicroSD, up to 512 GB', '5050 mAh'),
(24, 6, 'Nokia G11', 3890000, 26, '05679d1a13.jpg', 'TFT LCD6.5', 'Android 11', '8 MP', ' 13 MP , 2 MP and 2 MP', 'Unisoc T606 8 core', '4 GB', '64 GB', 'MicroSD, up to 512 GB', '5050 mAh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `PromotionID` int(11) NOT NULL,
  `PromotionName` varchar(50) DEFAULT NULL,
  `PromotionType` varchar(50) DEFAULT NULL,
  `PromotionValue` int(11) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`PromotionID`, `PromotionName`, `PromotionType`, `PromotionValue`, `StartDate`, `EndDate`) VALUES
(1, 'No promotion', 'Nothing', 0, '2022-11-15 00:00:00', '2023-01-19 00:00:00'),
(4, 'Cheap online', 'Cheap online', 1000000, '2022-11-17 00:00:00', '2023-01-21 00:00:00'),
(6, 'Discount', 'Discount', 500000, '2022-11-17 00:00:00', '2023-01-11 00:00:00'),
(7, 'installment', 'installment', 1500000, '2022-11-20 00:00:00', '2023-01-30 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotiondetails`
--

CREATE TABLE `promotiondetails` (
  `ProductID` int(11) NOT NULL,
  `PromotionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `promotiondetails`
--

INSERT INTO `promotiondetails` (`ProductID`, `PromotionID`) VALUES
(1, 4),
(2, 6),
(3, 6),
(4, 1),
(5, 6),
(6, 4),
(9, 6),
(10, 4),
(11, 7),
(12, 4),
(13, 1),
(14, 6),
(15, 7),
(16, 7),
(17, 1),
(18, 4),
(20, 7),
(21, 7),
(22, 7),
(23, 4),
(24, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `StarRating` int(11) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `review`
--

INSERT INTO `review` (`ReviewID`, `ProductID`, `UserID`, `StarRating`, `Comment`, `Date`) VALUES
(3, 1, 2, 2, 'bad', '2022-12-02 09:47:02'),
(4, 1, 2, 4, 'đẹp quá', '2022-12-02 09:57:30'),
(5, 1, 3, 4, 'khá ổn với mức giá', '2022-12-03 04:06:15'),
(6, 1, 3, 5, 'quá tốt', '2022-12-03 04:06:29'),
(7, 3, 3, 5, 'very good', '2022-12-03 04:22:59'),
(8, 3, 3, 5, 'very good', '2022-12-03 04:23:23'),
(9, 3, 3, 5, 'very good 1', '2022-12-03 04:24:41'),
(10, 3, 3, 5, 'very good', '2022-12-03 04:28:01'),
(11, 3, 3, 5, 'very good', '2022-12-03 04:32:40'),
(12, 3, 3, 5, 'very good 2', '2022-12-03 04:33:02'),
(13, 2, 4, 3, 'khá so với mức giá', '2022-12-05 02:46:40'),
(14, 2, 4, 5, 'tốt hơn rồi đấy', '2022-12-05 04:27:30'),
(22, 2, 4, 3, 'oke luôn', '2022-12-05 04:38:25'),
(23, 2, 4, 2, 'haiz', '2022-12-05 04:38:37'),
(24, 24, 3, 3, 'ldadwod', '2022-12-07 08:39:00'),
(25, 24, 3, 4, 'abc', '2022-12-07 08:39:35'),
(26, 24, 3, 2, 'rqwe2qeq2', '2022-12-07 08:44:26'),
(27, 24, 3, 5, 'dădwdwd', '2022-12-07 08:44:48'),
(28, 23, 4, 4, 'ịuki', '2022-12-08 07:50:37'),
(29, 24, 2, 3, 'ưdad', '2022-12-09 07:18:53'),
(30, 24, 2, 5, 'good', '2022-12-09 07:33:23'),
(31, 24, 2, 2, 'fafđưa', '2022-12-09 07:48:54'),
(32, 24, 2, 2, 'fafđưa', '2022-12-09 07:49:41'),
(33, 23, 2, 4, 'jioup', '2022-12-09 08:07:09'),
(34, 18, 2, 4, 'oke', '2022-12-09 08:15:01'),
(35, 24, 5, 5, 'very good', '2022-12-16 02:25:40'),
(36, 1, 2, 4, 'quá ổn so với mức giá', '2022-12-20 14:36:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `DisplayName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Email`, `Phone`, `Address`, `DisplayName`, `Password`, `Role`) VALUES
(1, 'Lê Duy Đạt', 'leduydat99@gmail.com', '0853535697', '297 Trần Cung', 'ledat', '202cb962ac59075b964b07152d234b70', 1),
(2, 'Nguyễn Văn Dũng', 'dungnguyen99@gmail.com', '0839114975', 'Cổ Nhuế,Hà Nội', 'dungnguyen', '202cb962ac59075b964b07152d234b70', 2),
(3, 'Lê Minh Hiếu', 'leminhhieu9x@gmail.com', '0846535981', '236 Hoàng Quốc Việt, Hà Nội', 'hieule', '202cb962ac59075b964b07152d234b70', 2),
(4, 'Triệu Ngọc Tài', 'ngoctai2k@gmail.com', '0856789884', 'Mễ Trì,Hà Nội', 'ngoctai', '202cb962ac59075b964b07152d234b70', 2),
(5, 'Trương Minh Phúc', 'minhphuc@gmail.com', '0863935617', 'Nguyễn Khang, Cầu Giấy', 'minhphuc', '202cb962ac59075b964b07152d234b70', 2),
(6, 'hieu', 'hieu123@gmail.com', '0853535697', 'Trần Cung', 'hieu123', '202cb962ac59075b964b07152d234b70', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`ManufacturerID`);

--
-- Chỉ mục cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrderID`,`ProductID`),
  ADD KEY `OrderID` (`OrderID`,`ProductID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `ManufacturerID` (`ManufacturerID`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`PromotionID`);

--
-- Chỉ mục cho bảng `promotiondetails`
--
ALTER TABLE `promotiondetails`
  ADD PRIMARY KEY (`ProductID`,`PromotionID`),
  ADD KEY `PromotionID` (`PromotionID`);

--
-- Chỉ mục cho bảng `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `UserID` (`UserID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT cho bảng `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `ManufacturerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `PromotionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`ManufacturerID`) REFERENCES `manufacturer` (`ManufacturerID`);

--
-- Các ràng buộc cho bảng `promotiondetails`
--
ALTER TABLE `promotiondetails`
  ADD CONSTRAINT `promotiondetails_ibfk_1` FOREIGN KEY (`PromotionID`) REFERENCES `promotion` (`PromotionID`),
  ADD CONSTRAINT `promotiondetails_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Các ràng buộc cho bảng `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
