-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 25 Ara 2020, 13:22:51
-- Sunucu sürümü: 10.4.14-MariaDB
-- PHP Sürümü: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `finaldb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gelirler`
--

CREATE TABLE `gelirler` (
  `gelir_id` int(11) NOT NULL,
  `gelir_ad` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gelir_kategori` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `gelir_zaman` date NOT NULL DEFAULT current_timestamp(),
  `gelir_fiyat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `gelirler`
--

INSERT INTO `gelirler` (`gelir_id`, `gelir_ad`, `gelir_kategori`, `gelir_zaman`, `gelir_fiyat`) VALUES
(1, 'aylık', 'maaş', '2020-12-30', 2300),
(2, 'kiracı ahmet', 'kira', '2020-12-10', 1500),
(3, 'kyk', 'kyk bursu', '2020-12-08', 550),
(4, 'logo yapımı', 'ek iş', '2020-12-19', 1300),
(5, 'site yapımı', 'satış', '2020-12-19', 1000),
(8, 'Bilgisayar satışı', 'satış', '2020-12-23', 1000),
(10, 'ek iş', 'ek iş', '2020-12-23', 500),
(11, 'Bilgisayar satışı', 'satış', '2020-12-25', 200),
(13, 'ek iş', 'ek iş', '2020-12-25', 200);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `harcamalar`
--

CREATE TABLE `harcamalar` (
  `harcama_id` int(11) NOT NULL,
  `harcama_ad` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `harcama_yer` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `harcama_kategori` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `harcama_zaman` date NOT NULL DEFAULT current_timestamp(),
  `harcama_fiyat` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `harcamalar`
--

INSERT INTO `harcamalar` (`harcama_id`, `harcama_ad`, `harcama_yer`, `harcama_kategori`, `harcama_zaman`, `harcama_fiyat`) VALUES
(1, 'güler eczane', 'ataşehir', 'saglik', '2020-12-17', 100),
(2, 'opet', 'kadıköy', 'akaryakit', '2020-12-18', 200),
(3, 'lokman pastanesi', 'içerenköy', 'restorant', '2020-12-20', 300),
(4, 'petrol ofisi', 'sudeposu', 'akaryakit', '2020-12-16', 50),
(5, 'metro', 'kozyatağı', 'market', '2020-12-18', 350),
(6, 'hediyelikçi', 'maltepe', 'hediyeler', '2020-12-20', 75),
(7, 'meryem eczane', 'kayışdağı', 'saglik', '2020-12-18', 50),
(8, 'hediyelikçi', 'inönü', 'hediyeler', '2020-12-17', 400),
(9, 'a101', 'maslak', 'market', '2020-12-20', 100),
(10, 'pegasus', 'kurtköy', 'ulasim', '2020-12-22', 90),
(11, 'bim', 'fındıklı', 'market', '2020-12-16', 20),
(12, 'tektaş', 'brandium', 'hediyeler', '2020-12-18', 40),
(13, 'thy', 'atatürk hava limanı', 'ulasim', '2020-12-19', 400),
(14, 'bim', 'fındıklı', 'market', '2020-12-19', 100),
(15, 'sağlık ocağı', 'ataşehir', 'saglik', '2020-12-21', 300),
(16, 'opet', 'ataşehir', 'akaryakit', '2020-12-20', 500),
(17, 'meryem', 'bim', 'market', '2020-12-22', 40),
(19, 'bim', 'fındıklı', 'market', '2020-12-23', 100),
(20, 'opet', 'ataşehir', 'akaryakit', '2020-12-23', 100),
(21, 'bim', 'fındıklı', 'market', '2020-12-23', 100),
(22, 'bim', 'ataşehir', 'market', '2020-12-25', 100),
(24, 'opet', 'ataşehir', 'akaryakit', '2020-12-25', 100);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hesaplarim`
--

CREATE TABLE `hesaplarim` (
  `hesap_id` int(11) NOT NULL,
  `hesap_ad` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hesap_tipi` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hesap_paratipi` varchar(10) COLLATE utf8mb4_turkish_ci NOT NULL,
  `hesap_miktari` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hesaplarim`
--

INSERT INTO `hesaplarim` (`hesap_id`, `hesap_ad`, `hesap_tipi`, `hesap_paratipi`, `hesap_miktari`) VALUES
(1000000018, 'Maaş Hesabı', 'kart', 'Euro', 506.50406504065),
(1000000026, 'İstanbul', 'nakit', 'Dolar', 308.55111402359),
(1000000027, 'İstanbul', 'kart', 'Dolar', 615),
(1000000029, 'Çanakkale', 'nakit', 'Lira', 1470);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kul_id` int(11) NOT NULL,
  `kul_ad` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kul_soyad` varchar(20) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kul_eposta` varchar(25) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kul_sifre` varchar(16) COLLATE utf8mb4_turkish_ci NOT NULL,
  `kul_giris_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `kul_cikis_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `kul_ip_adres` varchar(300) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kul_id`, `kul_ad`, `kul_soyad`, `kul_eposta`, `kul_sifre`, `kul_giris_zaman`, `kul_cikis_zaman`, `kul_ip_adres`) VALUES
(1, 'yunus', 'gözen', 'emregozen@hotmail.com', '15961596', '2020-12-25 11:55:38', '2020-12-25 11:55:20', '::1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `gelirler`
--
ALTER TABLE `gelirler`
  ADD PRIMARY KEY (`gelir_id`);

--
-- Tablo için indeksler `harcamalar`
--
ALTER TABLE `harcamalar`
  ADD PRIMARY KEY (`harcama_id`);

--
-- Tablo için indeksler `hesaplarim`
--
ALTER TABLE `hesaplarim`
  ADD PRIMARY KEY (`hesap_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kul_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `gelirler`
--
ALTER TABLE `gelirler`
  MODIFY `gelir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `harcamalar`
--
ALTER TABLE `harcamalar`
  MODIFY `harcama_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `hesaplarim`
--
ALTER TABLE `hesaplarim`
  MODIFY `hesap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000030;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
