-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 26 Tem 2023, 09:48:28
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
  `ürün_adı` text NOT NULL,
  `alış_fiyatı` float DEFAULT 0,
  `satış_fiyatı` float DEFAULT 0,
  `kdv_oranı` float DEFAULT 0,
  `ürün_resmi` text DEFAULT NULL,
  `stok_durumu` int(11) DEFAULT 0,
  `isDeleted` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `ürün_adı`, `alış_fiyatı`, `satış_fiyatı`, `kdv_oranı`, `ürün_resmi`, `stok_durumu`, `isDeleted`) VALUES
(1, 'televizyon', 30, 400, 0, '', 9000, 1),
(2, 'tablet', 0, 3500, 0.8, '', 300, 1),
(3, 'telefon', 0, 9000, 0, '', 0, 1),
(4, 'akıllı saat', 0, 0, 0, '', 0, 1),
(5, 'kulaklık', 0, 0, 0, '', 0, 1),
(6, 'masaüstü bilgisayar', 2000, 15000, 0.9, 'pc.png', 400, 1),
(7, 'sandalye', 3, 9, 0.4, 'sandalye.png', 1, 0),
(8, 'laptop', 0, 0, 0, '', 3000, 1),
(9, 'şişe', 5, 0, 0.3, 'sise.jpg', 0, 0),
(10, 'tabak', 0, 0, 0, '', 10000, 1),
(14, 'pipet', 0, 0, 0, '', 0, 0),
(15, 'video oynatıcısı', 300, 4000, 0.5, 'vo.jpg', 0, 1),
(18, 'kutu', 0, 0, 0, '', 0, 0),
(19, 'kapı', 0, 0, 0, '', 0, 0),
(30, 'kalem', 0, 0, 0, 'kalem.jpeg', 0, 1),
(31, 'operator', 0, 0, 0, '', 0, 0),
(32, 'megafon', 0, 0, 0, '', 0, 1),
(39, 'kılıf', 0, 0, 0, '', 10, 0),
(43, 'mouse', 200, 1000, 0.4, '', 0, 1),
(44, 'fan', 0, 0, 0.7, '', 0, 0),
(45, 'fan', 100, 300, 0, '', 0, 1),
(46, 'kumanda', 20, 150, 0.4, 'k.png', 400000, 1),
(47, 'mouse', 200, 1000, 0.4, '', 0, 0),
(49, 'modem', 20, 300, 0, '', 4000, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
