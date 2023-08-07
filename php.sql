-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Ağu 2023, 16:05:26
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'Consumer Electronics'),
(2, 'Home&Garden'),
(3, 'Pets&Pet Supplies'),
(4, 'Sporting Goods'),
(5, 'Health'),
(6, 'Children'),
(7, 'Fashion'),
(8, 'Beauty'),
(9, 'Video Games&Consoles'),
(10, 'Office Supplies');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` text NOT NULL,
  `purchasePrice` float DEFAULT 0,
  `salePrice` float DEFAULT 0,
  `vatRate` float DEFAULT 0,
  `stockStatus` int(11) DEFAULT 0,
  `productImage` text DEFAULT NULL,
  `isDeleted` int(1) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `productName`, `purchasePrice`, `salePrice`, `vatRate`, `stockStatus`, `productImage`, `isDeleted`, `categoryID`) VALUES
(1, 'tv', 200, 1300, 1, 600, 'television.png', 1, 1),
(2, 'mobile phone', 100, 900, 0, 0, 'mobilephone.jpg', 1, 1),
(3, 'tablet', 0, 0, 1, 0, '', 1, 1),
(4, 'mouse', 30, 200, 3, 0, 'mouse.png', 1, 1),
(5, 'keyboard', 50, 0, 2, 10000, 'keyboard.jpeg', 0, 1),
(6, 'remote controller', 0, 30, 0, 0, 'remote-controller.png', 1, 1),
(7, 'fan', 40, 0, 1, 300, 'fan.jpg', 1, 1),
(8, 'joystick', 0, 0, 6, 0, '', 1, 9),
(9, 'monitor', 0, 0, 0, 5000, 'monitor.jpeg', 1, 1),
(10, 'kettle', 0, 200, 1, 2000, '', 1, 2),
(11, 'air conditioner', 0, 0, 0, 6300, 'airconditioner.jpg', 1, 1),
(12, 'lipstick', 0, 0, 0, 233, '', 1, 8),
(13, 'eraser', 1, 5, 5, 25900, '', 1, 10),
(28, 'bag', 0, 0, 0, 0, '', 1, 7);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`) USING BTREE,
  ADD UNIQUE KEY `UNIQUE` (`categoryName`) USING HASH;

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
