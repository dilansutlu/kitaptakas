-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 15 Haz 2026, 23:41:00
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kitaptakas`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kitap_adi` varchar(255) NOT NULL,
  `yayinevi` varchar(150) NOT NULL,
  `sayfa_sayisi` int(11) NOT NULL,
  `resim` varchar(255) NOT NULL,
  `eklenme_tarihi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kullanici_id`, `kitap_adi`, `yayinevi`, `sayfa_sayisi`, `resim`, `eklenme_tarihi`) VALUES
(1, 1, 'Sokrates\'in Savunması', 'Türkiye İş Bankası Kültür Yayınları', 224, 'https://img.iskultur.com.tr/webp/2012/09/sokratesin-savunmasi-3-256x420.jpg', '2026-06-14 19:45:40'),
(2, 1, 'Devlet', 'Türkiye İş Bankası Kültür Yayınları', 372, 'https://img.kitapyurdu.com/v1/getImage/fn:115805/wi:220/wh:d722df406', '2026-06-14 19:56:23'),
(3, 1, 'Çizgili Pijamalı Çocuk', 'Tudem', 208, 'https://img.kitapyurdu.com/v1/getImage/fn:2405/wi:220/wh:150d02b56', '2026-06-14 19:57:35'),
(4, 1, 'Martın Eden', 'Türkiye İş Bankası Kültür Yayınları', 520, 'https://img.kitapyurdu.com/v1/getImage/fn:5158817/wi:220/wh:7b3a425c3', '2026-06-14 19:58:11'),
(5, 1, 'Beyaz Geceler', 'Türkiye İş Bankası Kültür Yayınları', 218, 'https://img.kitapyurdu.com/v1/getImage/fn:273851/wi:220/wh:1053d30ff', '2026-06-14 19:58:47'),
(6, 3, 'İnsanın Anlam Arayışı', 'Okuyan Us', 170, 'https://img.kitapyurdu.com/v1/getImage/fn:11614703/wi:220/wh:615a8fbbd', '2026-06-14 20:00:58'),
(7, 3, 'Sefiller', 'Türkiye İş Bankası Kültür Yayınları', 1720, 'https://img.iskultur.com.tr/webp/2015/06/sefiller-2-270x355.jpg', '2026-06-14 20:03:30'),
(8, 3, 'Aklından Bir Sayı Tut', 'Koridor', 480, 'https://img.kitapyurdu.com/v1/getImage/fn:38806/wi:220/wh:f2f91f48e', '2026-06-14 20:04:06'),
(9, 3, 'Momo', 'Pegasus Yayınları', 304, 'https://img.kitapyurdu.com/v1/getImage/fn:11997622/wi:220/wh:a1298a19d', '2026-06-14 20:04:45'),
(10, 4, 'Cesur Yeni Dünya', 'İthaki', 272, 'https://img.kitapyurdu.com/v1/getImage/fn:11643404/wi:220/wh:5566872ea', '2026-06-14 20:08:05'),
(11, 4, 'Ben Sana Mecburum', 'Türkiye İş Bankası Kültür Yayınları', 160, 'https://img.kitapyurdu.com/v1/getImage/fn:11463486/wi:220/wh:391833a73', '2026-06-14 20:08:51'),
(12, 4, 'Veronika Ölmek İstiyor', 'Can Yayınları', 198, 'https://img.kitapyurdu.com/v1/getImage/fn:11481517/wi:220/wh:f8d4075a0', '2026-06-14 20:09:45');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sehir` varchar(30) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `olusturma_tarihi` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `email`, `sehir`, `sifre`, `olusturma_tarihi`) VALUES
(1, 'Dilan', 'Sutlu', 'dilansutluu@gmail.com', 'Kocaeli', '$2y$10$iwEMC89cjlg4E9/EHm8/Ieg1PeCu4qPe7L4Qeu8IZ3..zb2kBOk4q', '2026-06-14 19:26:29'),
(2, 'Test', 'Kullanıcı', 'test@gmail.com', 'İstanbul', '123456', '2026-06-14 19:53:13'),
(3, 'Elif', 'Can', 'elif.canw@gmail.com', 'Antalya', '$2y$10$gZd2OGCHg04DNXU3nxCVluXL0Vnh5V4B4ZvYfIlxe6Q76.LmdCWia', '2026-06-14 19:59:30'),
(4, 'Meryem', 'Kara', 'meryemkara@gmail.com', 'Ankara', '$2y$10$8c4Fa14C5Oa5SI6.pWZAZe4qFoW8Lyh1W/MH7.fVxursp3FzUOUXe', '2026-06-14 20:05:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `takas_istekleri`
--

CREATE TABLE `takas_istekleri` (
  `id` int(11) NOT NULL,
  `istek_gonderen_id` int(11) NOT NULL,
  `kitap_sahibi_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `durum` varchar(50) NOT NULL DEFAULT 'Beklemede',
  `tarih` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `takas_istekleri`
--

INSERT INTO `takas_istekleri` (`id`, `istek_gonderen_id`, `kitap_sahibi_id`, `kitap_id`, `durum`, `tarih`) VALUES
(1, 3, 1, 3, 'Beklemede', '2026-06-14 19:59:43'),
(2, 3, 1, 4, 'Beklemede', '2026-06-14 19:59:45'),
(3, 4, 3, 9, 'Beklemede', '2026-06-14 20:06:14'),
(4, 4, 1, 5, 'Beklemede', '2026-06-14 20:06:19');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kitap_kullanici` (`kullanici_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_essiz` (`email`);

--
-- Tablo için indeksler `takas_istekleri`
--
ALTER TABLE `takas_istekleri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_istek_gonderen` (`istek_gonderen_id`),
  ADD KEY `fk_kitap_sahibi` (`kitap_sahibi_id`),
  ADD KEY `fk_istek_kitap` (`kitap_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `takas_istekleri`
--
ALTER TABLE `takas_istekleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD CONSTRAINT `fk_kitap_kullanici` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanicilar` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `takas_istekleri`
--
ALTER TABLE `takas_istekleri`
  ADD CONSTRAINT `fk_istek_gonderen` FOREIGN KEY (`istek_gonderen_id`) REFERENCES `kullanicilar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_istek_kitap` FOREIGN KEY (`kitap_id`) REFERENCES `kitaplar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_kitap_sahibi` FOREIGN KEY (`kitap_sahibi_id`) REFERENCES `kullanicilar` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
