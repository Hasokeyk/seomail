-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 22 May 2018, 16:30:27
-- Sunucu sürümü: 5.7.14
-- PHP Sürümü: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `seomail`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aboneler`
--

DROP TABLE IF EXISTS `aboneler`;
CREATE TABLE IF NOT EXISTS `aboneler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `listID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `aboneler`
--

INSERT INTO `aboneler` (`id`, `adsoyad`, `mail`, `listID`) VALUES
(1, 'Hasan Yüksektepe', 'hasanhasokeyk@hotmail.com', 1),
(2, 'Hasan Yüksektepe', 'hasanhasokeyk@hotmail.com', 2),
(3, 'Hasan Yüksektepe 2', 'hasanhasokeyk@hotmail.com', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `var` varchar(255) NOT NULL,
  `val` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `var`, `val`) VALUES
(1, 'install', '1'),
(2, 'sunucu', '77.79.81.208'),
(3, 'port', '587'),
(4, 'kullanici', 'smtp_user@webtures.com'),
(5, 'parola', 'wtsd9f#3$!');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mailler`
--

DROP TABLE IF EXISTS `mailler`;
CREATE TABLE IF NOT EXISTS `mailler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `shortTitle` varchar(255) NOT NULL,
  `templateID` int(11) NOT NULL,
  `listID` int(11) NOT NULL,
  `tur` varchar(255) NOT NULL,
  `tarih` int(11) NOT NULL,
  `cron` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `mailler`
--

INSERT INTO `mailler` (`id`, `title`, `shortTitle`, `templateID`, `listID`, `tur`, `tarih`, `cron`) VALUES
(1, 'Test Mail 1 oto', 'Kısa açıklama', 1, 1, 'oto', 0, 0),
(2, 'Test Mail 1', 'Kısa açıklama', 1, 1, 'mail', 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `maillistesi`
--

DROP TABLE IF EXISTS `maillistesi`;
CREATE TABLE IF NOT EXISTS `maillistesi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `maillistesi`
--

INSERT INTO `maillistesi` (`id`, `baslik`) VALUES
(1, 'Seo Hocası - Footer'),
(2, 'Webtures - FOOTER');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sablonlar`
--

DROP TABLE IF EXISTS `sablonlar`;
CREATE TABLE IF NOT EXISTS `sablonlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` int(11) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

DROP TABLE IF EXISTS `uyeler`;
CREATE TABLE IF NOT EXISTS `uyeler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `permisson` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `username`, `pass`, `session`, `permisson`) VALUES
(1, 'admin', '858e1b28d71379da6f278fcc2f3905be', 'hasan', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
