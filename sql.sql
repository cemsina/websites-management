-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Eki 2016, 23:09:54
-- Sunucu sürümü: 10.1.13-MariaDB
-- PHP Sürümü: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `site_yonetim`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `surname`, `email`, `isAdmin`) VALUES
(1, 'cemsina', '81dc9bdb52d04dc20036dbd8313ed055', 'Cemsina', 'Güzel', 'cemsina@cemsina.com', 1),
(7, 'test', '81dc9bdb52d04dc20036dbd8313ed055', 'test', 'deneme', 'test@test.com', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_website_percentage`
--

CREATE TABLE `user_website_percentage` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `percent` tinyint(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `user_website_percentage`
--

INSERT INTO `user_website_percentage` (`id`, `user_id`, `website_id`, `percent`) VALUES
(14, 7, 10, 56),
(13, 7, 7, 32),
(12, 1, 7, 68);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `url` varchar(200) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `websites`
--

INSERT INTO `websites` (`id`, `url`, `description`) VALUES
(7, 'cemsina.com', 'üçğşİı'),
(10, 'test.com', 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `website_data`
--

CREATE TABLE `website_data` (
  `id` int(11) NOT NULL,
  `website_id` int(11) NOT NULL,
  `the_data` double NOT NULL,
  `data_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `website_data`
--

INSERT INTO `website_data` (`id`, `website_id`, `the_data`, `data_date`) VALUES
(13, 7, 222, '2016-09-27 05:02:00'),
(12, 7, 333, '2016-09-27 05:02:00'),
(20, 7, 32123, '2016-10-05 04:05:00'),
(10, 7, 111.33, '2016-05-04 04:05:00'),
(9, 7, 222.37, '2016-05-04 04:05:00'),
(8, 7, 333.33, '2017-05-04 04:05:00'),
(16, 10, 113, '2016-10-09 01:07:00'),
(17, 10, 156, '2016-10-09 02:07:00'),
(18, 10, 156, '2016-10-09 08:07:00'),
(19, 10, 756, '2016-10-09 13:04:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_website_percentage`
--
ALTER TABLE `user_website_percentage`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `website_data`
--
ALTER TABLE `website_data`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `user_website_percentage`
--
ALTER TABLE `user_website_percentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `website_data`
--
ALTER TABLE `website_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
