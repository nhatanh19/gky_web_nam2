-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 17, 2024 lúc 08:26 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlythuvien-gky`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` varchar(255) NOT NULL,
  `cccd` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `hovaten` varchar(255) NOT NULL,
  `namsinh` year NOT NULL,
  `diachi` text,
  `gioitinh` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `cccd`, `hovaten`, `namsinh`, `diachi`, `gioitinh`) VALUES
('VKU123456', '123456789012', 'Nguyễn Văn Hải', '2005', '12 Đường Hoàng Diệu, Hải Châu, Đà Nẵng', 'Nam'),
('VKU123789', '159357852456', 'Võ Văn Bình', '2007', '34 Đường Lê Duẩn, Hải Châu, Đà Nẵng', 'Nam'),
('VKU147258', '123789456123', 'Phạm Thị Thanh', '2006', '91 Đường Trường Chinh, Thanh Khê, Đà Nẵng', 'Nữ'),
('VKU147369', '951753852369', 'Nguyễn Văn Duy', '2006', '34 Đường 2 Tháng 9, Hải Châu, Đà Nẵng', 'Nam'),
('VKU246135', '246813579024', 'Phạm Thị Hoa', '2007', '90 Đường Ngô Quyền, Sơn Trà, Đà Nẵng', 'Nữ'),
('VKU321654', '456789123456', 'Hoàng Văn Long', '2007', '76 Đường Phan Đăng Lưu, Cẩm Lệ, Đà Nẵng', 'Nam'),
('VKU321987', '159258753456', 'Trần Thị Hà', '2005', '78 Đường Hoàng Sa, Sơn Trà, Đà Nẵng', 'Nữ'),
('VKU357924', '321654987036', 'Hoàng Minh Phúc', '2009', '23 Đường Nguyễn Văn Linh, Hải Châu, Đà Nẵng', 'Nam'),
('VKU369258', '789654123987', 'Trần Văn Hoàng', '2005', '67 Đường Võ Nguyên Giáp, Sơn Trà, Đà Nẵng', 'Nam'),
('VKU369852', '258369147258', 'Nguyễn Thị Lan', '2008', '54 Đường Nguyễn Tri Phương, Hải Châu, Đà Nẵng', 'Nữ'),
('VKU654321', '258963147852', 'Võ Thị Bích', '2008', '54 Đường Hà Huy Tập, Thanh Khê, Đà Nẵng', 'Nữ'),
('VKU654789', '135792468013', 'Lê Văn Hùng', '2005', '78 Đường Lê Lợi, Sơn Trà, Đà Nẵng', 'Nam'),
('VKU654987', '357159482356', 'Trần Văn Khoa', '2009', '12 Đường Nguyễn Tất Thành, Thanh Khê, Đà Nẵng', 'Nam'),
('VKU741852', '963258741369', 'Nguyễn Quang Tuấn', '2005', '67 Đường Nguyễn Hữu Thọ, Hải Châu, Đà Nẵng', 'Nam'),
('VKU852147', '357159852123', 'Lê Văn Nam', '2009', '89 Đường Nguyễn Văn Thoại, Sơn Trà, Đà Nẵng', 'Nam'),
('VKU852963', '789123456789', 'Lê Thị Mai', '2006', '89 Đường Điện Biên Phủ, Liên Chiểu, Đà Nẵng', 'Nữ'),
('VKU963147', '159753486123', 'Nguyễn Quang Huy', '2007', '23 Đường Nguyễn Thị Minh Khai, Hải Châu, Đà Nẵng', 'Nam'),
('VKU963852', '789159357123', 'Phạm Văn Hải', '2007', '45 Đường Lê Quang Đạo, Ngũ Hành Sơn, Đà Nẵng', 'Nam'),
('VKU987123', '789456123789', 'Nguyễn Thị Hồng', '2008', '56 Đường Phạm Văn Đồng, Sơn Trà, Đà Nẵng', 'Nữ'),
('VKU987654', '987654321098', 'Trần Thị Minh', '2006', '45 Đường Trần Phú, Hải Châu, Đà Nẵng', 'Nữ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
