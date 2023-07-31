-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 31 Tem 2023, 22:31:32
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
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `productName` text NOT NULL,
  `purchasePrice` float DEFAULT 0,
  `salePrice` float DEFAULT 0,
  `vatRate` float DEFAULT 0,
  `productImage` text DEFAULT NULL,
  `stockStatus` int(11) DEFAULT 0,
  `isDeleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `productName`, `purchasePrice`, `salePrice`, `vatRate`, `productImage`, `stockStatus`, `isDeleted`) VALUES
(1, 'tv', 200, 1300, 0, 'tv.jpg', 600, 1),
(2, 'mobile phone', 100, 900, 0, '', 0, 0),
(3, 'tablet', 0, 0, 0.01, '', 0, 1),
(4, 'mouse', 30, 200, 0.03, 'mouse.png', 0, 0),
(5, 'keyboard', 50, 0, 0.02, 'keyboard.jpeg', 10000, 1),
(6, 'remote controller', 0, 30, 0, '', 0, 1),
(7, 'fan', 40, 0, 0, 'fan.png', 300, 0),
(8, 'joystick', 0, 0, 0.06, '', 0, 0),
(9, 'monitor', 0, 0, 0, '', 7000, 1),
(10, 'kettle', 0, 0, 0, '', 2000, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
