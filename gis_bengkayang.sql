-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2013 at 08:47 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gis_bengkayang`
--
CREATE DATABASE IF NOT EXISTS `gis_bengkayang` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `gis_bengkayang`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'alvin', 'a8f5f167f44f4964e6c998dee827110c', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_pemilik` int(10) NOT NULL,
  `kategori_pemilik` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id`, `id_pemilik`, `kategori_pemilik`, `filename`) VALUES
(1, 1, 'ruas_jalan', 'cba6aa8e9ef5ba4607fa83a0ff526e52.jpg'),
(3, 1, 'ruas_jalan', '90a24519e83f8203e681266274d05c03.jpg'),
(6, 1, 'ruas_jalan', 'a5cc31a50f2f44401028425915dd3fe0.jpg'),
(14, 1, 'gorong_gorong', 'b99d5fbf3130f26dbb85107ff4889f9f.jpg'),
(15, 1, 'gorong_gorong', 'cac7d5b02b3404a7e1bff42aa2c9333b.jpg'),
(17, 2, 'gorong_gorong', 'a2412fb038a1575dbb4ab5bac74e6c56.jpg'),
(19, 2, 'ruas_jalan', '6d9fa0b4815e1c925899c8d80002fb45.jpg'),
(20, 1, 'jembatan', 'b3b1d13578ea3b3d9d5224c7c0b55bf4.jpg'),
(21, 1, 'infrastruktur', 'ac031af660414ed7e316d92f4f9a57ee.jpg'),
(22, 1, 'infrastruktur', '330e7b99f8497b2fbd360be976d7579a.jpg'),
(24, 3, 'ruas_jalan', 'fdcd5f90fae0ba309da659bec123e6e7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE IF NOT EXISTS `galeri` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `filename`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '2a8a86b4d638c7d6c6a861a42e2f081e.jpg', 'asdasdasd', '2013-09-27 05:00:09', '2013-09-27 05:00:09'),
(2, 'f264a30339125644031d6fff46c6d0d0.jpg', 'dokumentasi acara LAN siskom 2012', '2013-09-28 03:01:56', '2013-09-28 03:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `gorong_gorong`
--

CREATE TABLE IF NOT EXISTS `gorong_gorong` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(10) NOT NULL,
  `id_ruas_jalan` int(10) NOT NULL,
  `no_gps` varchar(255) NOT NULL,
  `koordinat_gps` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `panjang` double DEFAULT NULL,
  `lebar` double DEFAULT NULL,
  `bahan_bangunan_atas` varchar(255) DEFAULT NULL,
  `kondisi_bangunan_atas` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gorong_gorong`
--

INSERT INTO `gorong_gorong` (`id`, `kecamatan_id`, `id_ruas_jalan`, `no_gps`, `koordinat_gps`, `long`, `lat`, `panjang`, `lebar`, `bahan_bangunan_atas`, `kondisi_bangunan_atas`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '999', '49N 373271 146512', '109.86089125681', '1.3252740201983', 9, 8, 'sdfdfsf', 'asdsd', '2013-09-29 01:00:19', '2013-09-29 01:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `infrastruktur`
--

CREATE TABLE IF NOT EXISTS `infrastruktur` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `kecamatan_id` int(10) NOT NULL,
  `id_ruas_jalan` int(10) NOT NULL,
  `jenis_infrastruktur` varchar(255) NOT NULL,
  `nama_infrastruktur` varchar(255) NOT NULL,
  `no_gps` varchar(255) DEFAULT NULL,
  `koordinat_gps` varchar(255) DEFAULT NULL,
  `long` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `kondisi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `infrastruktur`
--

INSERT INTO `infrastruktur` (`id`, `kecamatan_id`, `id_ruas_jalan`, `jenis_infrastruktur`, `nama_infrastruktur`, `no_gps`, `koordinat_gps`, `long`, `lat`, `kondisi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'sekolah', 'SDN 01 asdasd', 'asdasddas', '49N 375892 146634', '109.88444669708', '1.3263883661784', 'asdasd', '2013-09-29 02:08:50', '2013-09-29 02:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `jembatan`
--

CREATE TABLE IF NOT EXISTS `jembatan` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_ruas_jalan` int(10) NOT NULL,
  `no_gps` varchar(255) DEFAULT NULL,
  `koordinat_gps` varchar(255) DEFAULT NULL,
  `long` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `panjang` double DEFAULT NULL,
  `lebar` double DEFAULT NULL,
  `bahan_bangunan_atas` varchar(255) DEFAULT NULL,
  `kondisi_bangunan_atas` varchar(255) DEFAULT NULL,
  `bahan_lantai` varchar(255) DEFAULT NULL,
  `kondisi_lantai` varchar(255) DEFAULT NULL,
  `bahan_pondasi` varchar(255) DEFAULT NULL,
  `kondisi_pondasi` varchar(255) DEFAULT NULL,
  `kecamatan_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `jembatan`
--

INSERT INTO `jembatan` (`id`, `id_ruas_jalan`, `no_gps`, `koordinat_gps`, `long`, `lat`, `panjang`, `lebar`, `bahan_bangunan_atas`, `kondisi_bangunan_atas`, `bahan_lantai`, `kondisi_lantai`, `bahan_pondasi`, `kondisi_pondasi`, `kecamatan_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdasd', '49N 373898 146032', '109.86652830012', '1.3209347901157', 10, 9, 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 1, '2013-09-29 08:59:08', '2013-09-29 01:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`) VALUES
(1, 'JAGOI BABANG'),
(2, 'SIDING');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE IF NOT EXISTS `konten` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_admin` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `date` date NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci NOT NULL,
  `kolom_informasi` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `urutan` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `kategori`, `id_admin`, `views`, `date`, `judul`, `gambar`, `slug`, `content`, `summary`, `kolom_informasi`, `created_at`, `updated_at`, `urutan`) VALUES
(1, 'profil', 1, 0, '2013-09-30', 'Sejarah Instansi Pendidikan Kabupaten Pontianak Barat', 'c4410b117b6bb3f7db62d94e6220dd0b.jpg', 'sejarah-instansi-pendidikan-kabupaten-pontianak-barat', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?', 0, '2013-09-27 02:49:48', '2013-09-27 02:49:48', 2),
(3, 'agenda', 1, 0, '2013-09-26', 'agenda pertamaxxxx', 'e54f16c5ab81da86f189fe1ffdd7e391.jpg', 'agenda-pertamaxxxx', '<p>jan sdja ndjas ndjadsj</p>\r\n', 'aksnd lajdnajdn', 0, '2013-09-27 03:08:41', '2013-09-27 03:08:41', NULL),
(4, 'hubungi_kami', 0, 0, '2013-09-30', 'Kontak ajshdkja shdkjahd ajksdh', '', '', '<ul>\r\n	<li>\r\n	<h1>No Telp : 081289819283</h1>\r\n	</li>\r\n	<li>\r\n	<h1>Alamat : asdlasjdlasdlasdlk</h1>\r\n	</li>\r\n</ul>\r\n', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'berita', 1, 0, '2013-09-28', 'berita pertama', 'cfe84b45409dee6154ef6848a68d67f9.jpg', 'berita-pertama', '<p>adadasda</p>\r\n', 'testing', 0, '2013-09-29 01:25:02', '2013-09-29 01:25:02', NULL),
(6, 'profil', 1, 0, '2013-09-30', 'Visi dan Misi Instansi', '9232782513c1bc31b11e0efc9f4943b9.jpg', 'visi-dan-misi-instansi', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima, quidem, officiis, eum aliquam error nihil recusandae et suscipit est nisi deleniti esse hic! Odio, asperiores minima non esse numquam iure?', 0, '2013-09-29 21:47:49', '2013-09-29 21:47:49', 3),
(7, 'profil', 1, 0, '2013-09-30', 'Sambutan Kepala Dinas', '06ab561897dd8a2a6c82956e12c5284e.jpg', 'sambutan-kepala-dinas', '<p>kjskjdfb</p>\r\n', 'sdnfbsk fskdf', 0, '2013-09-29 22:21:11', '2013-09-29 22:21:11', 4),
(8, 'profil', 1, 0, '2013-09-30', 'Profil instansi', '0ba370981f8f8a7cebac20c0b3ea1e14.jpg', 'profil-instansi', '<p>hghjgjhgk</p>\r\n', 'kjsdhfksdfqhhsgdf', 0, '2013-09-29 22:21:38', '2013-09-29 22:21:38', 5);

-- --------------------------------------------------------

--
-- Table structure for table `ruas_jalan`
--

CREATE TABLE IF NOT EXISTS `ruas_jalan` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_ruas` varchar(255) DEFAULT NULL,
  `nama_pangkal_ruas` varchar(255) DEFAULT NULL,
  `nama_ujung_ruas` varchar(255) DEFAULT NULL,
  `titik_pengenal_awal` varchar(255) DEFAULT NULL,
  `no_gps` varchar(255) DEFAULT NULL,
  `koordinat_gps` varchar(255) DEFAULT NULL,
  `long` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `titik_pengenal_akhir` varchar(255) DEFAULT NULL,
  `panjang_ruas` float DEFAULT NULL,
  `kecamatan_id` int(3) NOT NULL,
  `lebar` float NOT NULL,
  `tipe_permukaan_jalan` varchar(255) DEFAULT NULL,
  `kondisi_permukaan_jalan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ruas_jalan`
--

INSERT INTO `ruas_jalan` (`id`, `nama_ruas`, `nama_pangkal_ruas`, `nama_ujung_ruas`, `titik_pengenal_awal`, `no_gps`, `koordinat_gps`, `long`, `lat`, `titik_pengenal_akhir`, `panjang_ruas`, `kecamatan_id`, `lebar`, `tipe_permukaan_jalan`, `kondisi_permukaan_jalan`, `created_at`, `updated_at`) VALUES
(1, 'Simpang Paum-Paum', 'upated', 'upupupu', 'apusdpaudpa', '999', '49N 373898 146031', '109.86652830422', '1.3209257446325', 'paudpaudpasd', 8.5, 1, 4.5, 'aspal', 'jelek', '2013-09-29 08:38:13', '2013-09-27 19:59:02'),
(2, 'Jagoi Take-Semunying', 'lkaslkasld', 'lkaslkdlasdkl', 'lkalkslad', 'lkasdlaskda', '49N 375831 146513', '109.88389895443', '1.3252936074242', 'lklaskdlakdlakd', 19, 1, 9, 'asdasd', 'asdasd', '2013-09-29 08:38:57', '2013-09-29 01:13:48'),
(3, 'Jagoi Take-Siding', 'qweqdd', 'dd', 'aaada', '691', '49N 375845 146516', '109.88402476616', '1.3253208010958', 'addsdada', 8, 1, 10, 'ghjjggj', 'gfhgfhgf', '2013-09-29 23:40:33', '2013-09-29 23:40:33');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
