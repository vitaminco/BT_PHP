-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 26, 2023 lúc 05:35 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bt_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(11) NOT NULL,
  `Ten_DanhMuc` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `Ten_DanhMuc`) VALUES
(1, 'grgrgrg'),
(2, 'Sản phẩm 2'),
(5, 'Sản phẩm dưỡng da'),
(7, 'San Phẩm 1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `TenSanPham` varchar(200) DEFAULT NULL,
  `Gia` varchar(200) DEFAULT NULL,
  `NgayBan` varchar(200) DEFAULT NULL,
  `img_path` varchar(200) DEFAULT NULL,
  `Id_DanhMuc` int(11) DEFAULT NULL,
  `ThongTin` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `TenSanPham`, `Gia`, `NgayBan`, `img_path`, `Id_DanhMuc`, `ThongTin`) VALUES
(1, 'con cúc', '30k', '2023-02-20', 'sanpham/img/youtobe-1681743338.png', 7, 'cúc chiên bơ'),
(2, 'ANIME', '200k', '10/09/2023', 'sword.jpg', 2, 'Aó cá sấu mặc vào bao đẹp'),
(7, 'Con Chó cute', '100$$$', '2023-04-06', 'vongnhi-1681740494.jpg', 5, 'Con chó cute nhât'),
(8, 'CHIM', '10K', '2023-04-07', 'logo-1681742775.png', 7, 'Con Chim Xinh Đẹp'),
(11, 'Thủy thủ mặt trăng', '30', '2023-03-30', 'Ankylosaurus-1681913878.png', 7, 'Khủng long'),
(13, 'CON GÀ', '200k', '2023-04-08', 'hinh-nen-may-tinh-de-thuong-1-1681913943.jpg', 5, 'BAo con');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'ccccc', '$2y$10$p3LaG6AfE1b3p'),
(2, 'hhhhh', '$2y$10$CkSaT44skldiz'),
(3, 'vvvvv', '$2y$10$XPtq/JPlXMxrtqD81CbSc.VBIbH.eZc1hhnddSREQcr8zK2fniEiG'),
(4, 'ttttt', '$2y$10$DlMst0c7f9kDCGksqcl7Ke/3lUkIh1Fmqm9G0MgK.5hv13.k3w5pu'),
(5, 'lllll', '$2y$10$9aqhAbvK9Idnr1QLp.PpPO4e.iS6XPdX4TVPcj4j1bvlm/cIAPIRm'),
(6, 'ppppp', '$2y$10$A9F6nAgi1vRpHF6AyltUxOHehbk4xO18Y.cIbvZtBel8x/0IjDA8W');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uudai`
--

CREATE TABLE `uudai` (
  `id` int(11) NOT NULL,
  `TenUuDai` varchar(200) DEFAULT NULL,
  `UuDAI` varchar(200) DEFAULT NULL,
  `Start` date DEFAULT NULL,
  `End` date DEFAULT NULL,
  `ThongTin` varchar(200) DEFAULT NULL,
  `HinhUuDai` varchar(200) DEFAULT NULL,
  `GhiChu` varchar(200) DEFAULT NULL,
  `Id_DanhMuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `uudai`
--

INSERT INTO `uudai` (`id`, `TenUuDai`, `UuDAI`, `Start`, `End`, `ThongTin`, `HinhUuDai`, `GhiChu`, `Id_DanhMuc`) VALUES
(1, 'Giảm Giá', '70%', '0000-00-00', '0000-00-00', 'Cập nhật sau', 'uudai2.png', NULL, 1),
(2, 'Mua vé giảm giá', '50%', '0000-00-00', '0000-00-00', 'NHân dipj 30/4', 'uudai5.png', NULL, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SANPHAM_DANHMUC_idx` (`Id_DanhMuc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `uudai`
--
ALTER TABLE `uudai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SANPHAM_UUDAI_idx` (`Id_DanhMuc`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `uudai`
--
ALTER TABLE `uudai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SANPHAM_DANHMUC` FOREIGN KEY (`Id_DanhMuc`) REFERENCES `danhmuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `uudai`
--
ALTER TABLE `uudai`
  ADD CONSTRAINT `FK_SANPHAM_UUDAI` FOREIGN KEY (`Id_DanhMuc`) REFERENCES `danhmuc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
