-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 03:19 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisa`
--

CREATE TABLE `analisa` (
  `id` int(5) NOT NULL,
  `user` varchar(50) NOT NULL,
  `penyakit` varchar(50) NOT NULL,
  `gejala` varchar(200) NOT NULL,
  `percaya` text NOT NULL,
  `analisa` int(2) NOT NULL,
  `date` datetime NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisa`
--

INSERT INTO `analisa` (`id`, `user`, `penyakit`, `gejala`, `percaya`, `analisa`, `date`, `active`) VALUES
(1, '4', '3+2+4+', '1+2+3+4+5+6+7+8+9+10+11+12+', '1.00+1.00+1.00+1.00+0.00+1.00+0.00+0.00+0.00+0.00+1.00+0.00+', 2, '2017-09-03 05:29:22', 1),
(2, '4', '3+2+4+', '1+2+3+4+5+6+7+8+9+10+11+12+', '0.00+0.00+0.00+0.00+1.00+0.00+1.00+1.00+1.00+1.00+0.00+0.00+', 2, '2017-09-03 05:31:15', 1),
(3, '4', '2+4+', '5+7+8+9+10+', '1.00+1.00+1.00+1.00+1.00+', 4, '2017-09-03 05:50:11', 1),
(4, '4', '3+2+', '1+2+3+4+6+12+', '1.00+1.00+1.00+1.00+1.00+1.00+', 3, '2017-09-03 05:51:02', 1),
(5, '2', '3+', '1+3+', '0.50+0.50+', 3, '2017-09-26 09:58:50', 1),
(6, '5', '3+', '1+2+', '0.50+0.50+', 3, '2017-10-20 20:22:21', 1),
(7, '6', '3+', '1+2+4+', '0.50+0.50+0.10+', 3, '2017-10-23 10:38:08', 1),
(8, '6', '3+', '1+2+3+', '1.00+0.10+1.00+', 3, '2017-10-31 08:54:13', 1),
(9, '6', '3+', '1+2+3+', '0.50+1.00+0.50+', 3, '2017-11-13 07:57:07', 1),
(10, '6', '3+2+4+', '4+5+9+', '1.00+1.00+0.50+', 4, '2017-11-13 07:57:46', 1),
(11, '6', '4+2+', '9+10+12+', '0.10+0.50+0.50+', 4, '2017-11-13 08:48:32', 1),
(12, '6', '1+', '13+14+15+16+', '0.50+0.50+0.10+1.00+', 1, '2017-11-13 08:49:19', 1),
(13, '6', '3+', '1+2+3+', '0.50+1.00+0.10+', 3, '2018-01-30 19:55:52', 1),
(14, '6', '3+', '2+', '1.00+', 0, '2018-01-30 20:00:44', 1),
(15, '6', '3+', '2+', '1.00+', 0, '2018-01-30 20:02:38', 1),
(16, '6', '3+', '2+3+', '0.50+1.00+', 3, '2018-01-30 20:03:02', 1),
(17, '6', '1+', '14+', '1.00+', 0, '2018-01-30 20:03:31', 1),
(18, '6', '3+1+', '4+14+', '0.50+0.50+', 1, '2018-01-30 20:04:34', 1),
(19, '6', '3+4+2+', '6+9+11+12+', '1.00+0.50+0.10+0.50+', 2, '2018-01-30 20:05:54', 1),
(20, '7', '3+', '1+2+4+', '1.00+0.50+0.50+', 3, '2018-01-30 20:15:52', 1),
(21, '7', '3+1+', '4+14+15+16+', '1.00+0.50+1.00+1.00+', 1, '2018-01-30 20:33:05', 1),
(22, '7', '4+2+3+', '10+11+12+', '1.00+1.00+0.50+', 2, '2018-01-30 20:33:30', 1),
(23, '7', '2+3+1+', '11+12+13+', '0.50+0.50+1.00+', 2, '2018-01-30 20:34:03', 1),
(24, '7', '2+4+', '8+9+10+', '0.50+1.00+0.50+', 4, '2018-01-30 20:34:34', 1),
(25, '7', '3+', '1+2+3+', '1.00+0.10+0.50+', 3, '2018-01-30 20:34:54', 1),
(26, '7', '3+2+4+', '6+7+8+', '1.00+0.50+0.50+', 2, '2018-01-30 20:35:29', 1),
(27, '6', '3+', '1+3+', '1.00+1.00+', 3, '2018-01-30 21:08:46', 1),
(28, '6', '3+2+1+', '3+6+12+15+', '1.00+1.00+0.50+0.10+', 3, '2018-01-30 21:11:08', 1),
(29, '7', '3+', '1+2+3+', '1.00+0.50+0.10+', 3, '2018-01-31 06:53:08', 1),
(30, '8', '3+', '1+2+', '0.50+1.00+', 3, '2018-01-31 10:43:57', 1),
(31, '8', '3+2+4+1+', '1+2+3+4+5+6+7+8+9+10+11+12+13+14+15+16+', '1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+', 4, '2018-01-31 10:45:16', 1),
(32, '8', '3+2+4+', '1+2+3+4+5+6+7+8+', '1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+', 3, '2018-01-31 10:46:20', 1),
(33, '8', '4+2+3+1+', '9+10+11+12+13+14+15+16+', '1.00+1.00+1.00+1.00+1.00+1.00+1.00+1.00+', 1, '2018-01-31 10:47:21', 1),
(34, '8', '3+', '2+3+', '0.50+1.00+', 3, '2018-01-31 10:49:14', 1),
(35, '9', '3+2+4+1+', '1+4+5+6+10+13+15+', '0.50+0.50+0.10+0.50+0.10+0.10+1.00+', 1, '2018-03-11 12:48:11', 1),
(36, '9', '3+', '1+2+3+4+6+', '1.00+1.00+1.00+0.50+1.00+', 3, '2018-03-11 13:01:48', 1),
(37, '9', '', '1+2+4+8+14+16+', '1.00+0.50+0.50+0.50+1.00+0.50+', 0, '2018-07-29 11:24:30', 1),
(38, '9', '', '1+2+', '1.00+0.50+', 0, '2018-07-29 20:50:32', 1),
(39, '9', '', '1+2+', '1.00+1.00+', 0, '2018-07-29 20:51:23', 1),
(40, '9', '1+2+', '1+2+', '1.00+1.00+', 2, '2018-07-29 21:44:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id` int(2) NOT NULL,
  `keterangan` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id`, `keterangan`, `active`) VALUES
(1, '<p>Di stater elektrik sulit</p>', 1),
(2, '<p>Klakson tidak bunyi</p>', 1),
(3, '<p>Reating tidak bekerja</p>', 1),
(4, '<p>Di stater manual sulit</p>', 1),
(5, '<p>Suara knalpot sering meletus-meletus</p>', 1),
(6, '<p>Tarikan berat</p>', 1),
(7, '<p>Bahan bakar boros</p>', 1),
(8, '<p>Keluar asap kehitaman</p>', 1),
(9, '<p>Bunyi gemlitik pada mesin</p>', 1),
(10, '<p>Suara mesin kasar</p>', 1),
(11, '<p>Bunyi kasar saat jalan</p>', 1),
(12, '<p>Kampas kopling lambat</p>', 1),
(13, '<p>Lari mbrebet-mbrebet</p>', 1),
(14, '<p>Motor mati (tidak bisa hidup sama sekali)</p>', 1),
(15, '<p>Mesin mudah panas</p>', 1),
(16, '<p>Kelistrikan mati</p>', 1),
(17, '<p>Kecepatan tidak optimal</p>', 0),
(18, '<p>Asap knalpot berwarna putih</p>', 0),
(19, '<p>Usia Pakai busi lebih pendek</p>', 0),
(20, '<p>Oli lebih cepat habis</p>', 0),
(21, '<p>Motor macet pada kondisi panas karena ring piston mengunci / lock</p>', 0),
(22, '<p>Getaran mesin sangat terasa</p>', 0),
(23, '<p>Semakin tinggi RPM akan semakin tinggi terasa getaran / suara</p>', 0),
(24, '<p>Saat di stater akan menimbulkan suara siang piston</p>', 0),
(25, '<p>Haus RPM Tinggi</p>', 0),
(26, '<p>Stang motor terasa berat ada</p>', 0),
(27, '<p>Rem kurang pakem</p>', 0),
(28, '<p>Stang motor terasa tidak imbang pada saat jalan.</p>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gejala_opsi`
--

CREATE TABLE `gejala_opsi` (
  `id` int(11) NOT NULL,
  `gejala` int(11) NOT NULL,
  `opsi` varchar(50) NOT NULL,
  `value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala_opsi`
--

INSERT INTO `gejala_opsi` (`id`, `gejala`, `opsi`, `value`) VALUES
(1, 1, 'Tidak', '0.00'),
(2, 1, 'Tidak tahu', '0.10'),
(3, 1, 'Sedikit yakin', '0.50'),
(4, 1, 'Yakin', '1.00'),
(5, 2, 'Tidak', '0.00'),
(6, 2, 'Tidak tahu', '0.10'),
(7, 2, 'Sedikit yakin', '0.50'),
(8, 2, 'Yakin', '1.00'),
(9, 3, 'Tidak', '0.00'),
(10, 3, 'Tidak tahu', '0.10'),
(11, 3, 'Sedikit yakin', '0.50'),
(12, 3, 'Yakin', '1.00'),
(13, 4, 'Tidak', '0.00'),
(14, 4, 'Tidak tahu', '0.10'),
(15, 4, 'Sedikit yakin', '0.50'),
(16, 4, 'Yakin', '1.00'),
(17, 5, 'Tidak', '0.00'),
(18, 5, 'Tidak tahu', '0.10'),
(19, 5, 'Sedikit yakin', '0.50'),
(20, 5, 'Yakin', '1.00'),
(21, 6, 'Tidak', '0.00'),
(22, 6, 'Tidak tahu', '0.10'),
(23, 6, 'Sedikit yakin', '0.50'),
(24, 6, 'Yakin', '1.00'),
(25, 7, 'Tidak', '0.00'),
(26, 7, 'Tidak tahu', '0.10'),
(27, 7, 'Sedikit yakin', '0.50'),
(28, 7, 'Yakin', '1.00'),
(29, 8, 'Tidak', '0.00'),
(30, 8, 'Tidak tahu', '0.10'),
(31, 8, 'Sedikit yakin', '0.50'),
(32, 8, 'Yakin', '1.00'),
(33, 9, 'Tidak', '0.00'),
(34, 9, 'Tidak tahu', '0.10'),
(35, 9, 'Sedikit yakin', '0.50'),
(36, 9, 'Yakin', '1.00'),
(37, 10, 'Tidak', '0.00'),
(38, 10, 'Tidak tahu', '0.10'),
(39, 10, 'Sedikit yakin', '0.50'),
(40, 10, 'Yakin', '1.00'),
(41, 11, 'Tidak', '0.00'),
(42, 11, 'Tidak tahu', '0.10'),
(43, 11, 'Sedikit yakin', '0.50'),
(44, 11, 'Yakin', '1.00'),
(45, 12, 'Tidak', '0.00'),
(46, 12, 'Tidak tahu', '0.10'),
(47, 12, 'Sedikit yakin', '0.50'),
(48, 12, 'Yakin', '1.00'),
(49, 13, 'Tidak', '0.00'),
(50, 13, 'Tidak tahu', '0.10'),
(51, 13, 'Sedikit yakin', '0.50'),
(52, 13, 'Yakin', '1.00'),
(53, 14, 'Tidak', '0.00'),
(54, 14, 'Tidak tahu', '0.10'),
(55, 14, 'Sedikit yakin', '0.50'),
(56, 14, 'Yakin', '1.00'),
(57, 15, 'Tidak', '0.00'),
(58, 15, 'Tidak tahu', '0.10'),
(59, 15, 'Sedikit yakin', '0.50'),
(60, 15, 'Yakin', '1.00'),
(61, 16, 'Tidak', '0.00'),
(62, 16, 'Tidak tahu', '0.10'),
(63, 16, 'Sedikit yakin', '0.50'),
(64, 16, 'Yakin', '1.00'),
(65, 17, 'Tidak', '0.00'),
(66, 17, 'Tidak tahu', '0.10'),
(67, 17, 'Sedikit yakin', '0.50'),
(68, 17, 'Yakin', '1.00'),
(69, 18, 'Tidak', '0.00'),
(70, 18, 'Tidak tahu', '0.10'),
(71, 18, 'Sedikit yakin', '0.50'),
(72, 18, 'Yakin', '1.00'),
(73, 19, 'Tidak', '0.00'),
(74, 19, 'Tidak tahu', '0.10'),
(75, 19, 'Sedikit yakin', '0.50'),
(76, 19, 'Yakin', '1.00'),
(77, 20, 'Tidak', '0.00'),
(78, 20, 'Tidak tahu', '0.10'),
(79, 20, 'Sedikit yakin', '0.50'),
(80, 20, 'Yakin', '1.00'),
(81, 21, 'Tidak', '0.00'),
(82, 21, 'Tidak tahu', '0.10'),
(83, 21, 'Sedikit yakin', '0.50'),
(84, 21, 'Yakin', '1.00'),
(85, 22, 'Tidak', '0.00'),
(86, 22, 'Tidak tahu', '0.10'),
(87, 22, 'Sedikit yakin', '0.50'),
(88, 22, 'Yakin', '1.00'),
(89, 23, 'Tidak', '0.00'),
(90, 23, 'Tidak tahu', '0.10'),
(91, 23, 'Sedikit yakin', '0.50'),
(92, 23, 'Yakin', '1.00'),
(93, 24, 'Tidak', '0.00'),
(94, 24, 'Tidak tahu', '0.10'),
(95, 24, 'Sedikit yakin', '0.50'),
(96, 24, 'Yakin', '1.00'),
(97, 25, 'Tidak', '0.00'),
(98, 25, 'Tidak tahu', '0.10'),
(99, 25, 'Sedikit yakin', '0.50'),
(100, 25, 'Yakin', '1.00'),
(101, 26, 'Tidak', '0.00'),
(102, 26, 'Tidak tahu', '0.10'),
(103, 26, 'Sedikit yakin', '0.50'),
(104, 26, 'Yakin', '1.00'),
(105, 27, 'Tidak', '0.00'),
(106, 27, 'Tidak tahu', '0.10'),
(107, 27, 'Sedikit yakin', '0.50'),
(108, 27, 'Yakin', '1.00'),
(109, 28, 'Tidak', '0.00'),
(110, 28, 'Tidak tahu', '0.10'),
(111, 28, 'Sedikit yakin', '0.50'),
(112, 28, 'Yakin', '1.00');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `title` varchar(40) NOT NULL,
  `static` varchar(3) NOT NULL DEFAULT 'yes' COMMENT 'yes/no',
  `level` int(1) NOT NULL,
  `dropdown` int(1) NOT NULL DEFAULT '0',
  `parent` int(2) NOT NULL,
  `link` varchar(50) NOT NULL,
  `order_id` int(2) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `static`, `level`, `dropdown`, `parent`, `link`, `order_id`, `active`) VALUES
(1, 'beranda', 'yes', 1, 0, 0, 'home/article', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `id` int(2) NOT NULL,
  `link` varchar(20) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `value` varchar(20) NOT NULL DEFAULT '-',
  `dropdown` int(1) NOT NULL DEFAULT '0',
  `level` int(1) NOT NULL DEFAULT '1',
  `login` varchar(5) NOT NULL DEFAULT 'FALSE',
  `not_login` varchar(5) NOT NULL DEFAULT 'TRUE',
  `admin` int(1) NOT NULL DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`id`, `link`, `color`, `value`, `dropdown`, `level`, `login`, `not_login`, `admin`, `active`) VALUES
(1, '', '#58FCC1', 'Beranda', 0, 1, 'TRUE', 'TRUE', 0, 1),
(2, 'profil.html', '#a10f6f', 'Profil', 0, 1, 'TRUE', 'TRUE', 0, 1),
(3, 'konsultasi', '#df541e', 'Konsultasi Pakar', 0, 1, 'TRUE', 'TRUE', 0, 1),
(4, 'about.html', '#008080', 'Tentang Kami', 0, 1, 'TRUE', 'TRUE', 0, 1),
(5, 'master/article', '#003aff', 'Article Manager', 0, 1, 'TRUE', 'TRUE', 1, 1),
(6, 'master', '#80ba27', 'Master Data', 1, 1, 'TRUE', 'TRUE', 1, 1),
(7, 'master/user', '#df541e', 'User', 0, 1, 'TRUE', 'TRUE', 1, 1),
(8, 'master/laporan', '#e3ff00', 'Laporan', 0, 1, 'TRUE', 'TRUE', 1, 1),
(9, 'user', '#8bc900', 'Pengguna', 1, 1, 'TRUE', 'FALSE', 0, 1),
(15, 'master/gejala', '#a10f6f', 'Data gejala', 6, 2, 'TRUE', 'TRUE', 1, 1),
(16, 'master/penyakit', '#723584', 'Data Kerusakan', 6, 2, 'TRUE', 'TRUE', 1, 1),
(17, 'master/relasi', '#3e0e4c', 'Data Relasi', 6, 2, 'TRUE', 'TRUE', 1, 1),
(18, 'logout.php', '#008080', 'Logout', 0, 1, 'TRUE', 'TRUE', 1, 1),
(19, 'konsultasi/user', '#ffaaa5', 'Edit profil', 9, 2, 'TRUE', 'FALSE', 0, 1),
(20, 'logout.php', '#e81f3f', 'Logout', 9, 2, 'TRUE', 'FALSE', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id` int(2) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `nama` varchar(40) NOT NULL,
  `media` text,
  `definisi` text,
  `pengobatan` text,
  `pencegahan` text,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id`, `color`, `nama`, `media`, `definisi`, `pengobatan`, `pencegahan`, `active`) VALUES
(1, '#ff2ebd', 'Busi', 'Untitled.png', '<p>&nbsp;</p>\r\n\r\n<p><meta charset=\"utf-8\" /></p>\r\n\r\n<p dir=\"ltr\">Komstir merupakan komponen motor yang berfungsi sebagai penyeimbang atau penstabil stang yang meminimalisir getaran ketika motor beroperasi. Adapun gejala yang timbul akibat komstir rusak adalah stang motor terasa berat, getaran ban makin terasa di tangan, ada suara di komstir pada saat motor berjalan, rim kurang pakem, stang motor terasa tidak imbang pada saat jalan.</p>', '<p>Untuk itu, hal yang pertama sobat lakukan adalah coba mengencangkan dulu komstir nya namun jika masih berat coba sobat buka rumah komstirnya lalu cek apakah mangkoknya beret atau tidak.</p>\r\n\r\n<p>Namun jika mangkok komstirnya tidak beret ada kemungkinan hanya perlu dikasih gemuk. Namun jika sudah dipasang masih terasa berat dan apalagi ika di rem depan masih terdengar bunyi dug atau terasa oblak berarti ball bearing nya sudah aus.</p>\r\n\r\n<p>Jika hal itu terjadi, berarti anda wajib menggantinya dengan yang baru namun menyarankan jangan beli komstir abal-abal karena tidak maksimal.</p>', '', 1),
(2, '#2ee1ff', 'Injektor', '27750925_1679103608795500_2038746274436700925_n1.jpg', '<p>V-belt adalah sabuk atau belt terbuat dari karet dan mempunyai penampung trapesium. Tetunan,tetoran dan semacamnya di gunakan sebagai inti sabuk untuk membawa tarikan yang besar. Adapun gejala yang timbul akibat V-belt rusak adalah tarikan terasa berat, ada getaran saat pertama kali digunakan, suara berbisik, tarikan telat, haus RPM tinggi.<br />\r\n&nbsp;</p>', '<ol>\r\n	<li>Periksa V Belt setiap 2 bulan sekali dengan cara membuka tutup pada bagian penutup V Belt menggunakan kunci T8 kemudian bersihkan kotoran dari debu menggunakan angin bertekanan semprot dan bersihkan.</li>\r\n	<li>Jangan menyemprot V Belt dengan cairan apapun karena akan menyebabkab selip.</li>\r\n	<li>Bersihkan rumah V Belt jangan sampai ada oli yang masuk kedalam rumah V Belt.</li>\r\n	<li>Gunakan kendaraan secara normal, jangan di gas-gas mendadak karena putaran yang tidak stabil menyebabkan V Belt cepat melar.</li>\r\n	<li>Gunakan sparepat yang standart karena sering terjadi sparepat yang tidak&nbsp; standart umur V Belt tidak tahan lama.</li>\r\n</ol>', '', 1),
(3, '#0047AB', 'Roller', '26841328_1097511217057332_5322736750830407175_o.jpg', '<p>Ring piston adalah alat yang berbentuk bulat lingkar berupa cincin di mana fungsinya untuk membantu piston melaksakan proses kerja motor yaitu sebagai penyumbat untuk mencegah kebocoran di antara dinding silinder di samping piston. Adapun gejala yang timbul akibat ring piston rusak adalah asap knalpot berwarna putih, usia pakai busi lebih pendek, oli lebih cepat habis, suara mesin bunyi / berisik, tarikan motor berkurang, motor macet pada kondisi panas karena ring piston mengunci / lock.<br />\r\n&nbsp;</p>', '<ol>\r\n	<li>Sediakan oli mesin, Tak perlu banyak, tapi cukup setengah sendok makan saja.</li>\r\n	<li>Ukur lebih dulu kompresi awal mesin dengan menggunakan compression tester. Nantinya angka ini menjadi patokan buat melihat patokan terjadinya keausan atau tidak. Setelah diukur, misalnya kompresi mesin menunjukan angka 16 psi.</li>\r\n	<li>Kemudian masukan oli yang sudah disiapkan tadi melalui derat lobang busi di kepala selinder. Tapi jangan terlalu banyak karena fungsi oli ini hanya untuk menutup ccelah-celah longggar diantara ring piston yang terdiri dari ring kompresi dan ring oli itu dengan linier . Dengan tertutupnya celah, maka tekanan alias kompresi menjadi padat.</li>\r\n	<li>Setelah oli dimasukan, lalu ukur kembali kompresi dengan menggunakan compression tester. Setelah dapat angka terbaru, bandingkan dengan kompresi awal sebelum diberikan oli. naik atau tetap sama.</li>\r\n</ol>', '', 1),
(4, '#WATER', 'CVT', NULL, '<p>Stang piston adalah bagian dari mesin yang berfungsi sebagai penyambung antara krusas dan piston. Adapun gejala yang timbul akibat stang rusak adalah getaran mesin sangat terasa, ada bunyi di mesin gemricik, semakin tinggi RPM akan semakin tinggi akan semakin terasa getaran / suara, tenaga berkurang, saat di stater akan menimbulkan suara stang piston tersebut<br />\r\n&nbsp;</p>', '<ol>\r\n	<li>Bagi sebagian pemilik motor pastinya sudah pernah mengalami motornya rusak pada komponen stang piston. Nah sebenarnya pada dasarnya setiap komponen motor yang mempunyai jangka waktu pemakaian atau penggunaanya.</li>\r\n	<li>Jadi dikala batas pemakaianya tiba maka sebaiknya bagi pemilik motor tersebut dianjurkan agar segera menservis motornya dengan cara mengembalikan performa mesin seperti semula yakni servis rutin dan jikalau keadaan mesin motor sudah parah maka langkah yang perlu diambil yakni mengganti komponen yang aus atau rusak dengan komponen yang baru .</li>\r\n	<li>Salah satu komponen yang vital dalam sepeda motor yakni stang piston atau kruk as, apabila komponen ini sudah mengalami kerusakan atau aus maka disarankan untuk segera menggantinya agar motor kemballi optimal kembali.</li>\r\n	<li>Sebuah stang piston yang berfungsi sebagai tempat dudukan piston ini mempunyai fungsi yang sangat vital dalam mesin motor. lalu bagaimana caranya untuk mengetahui stang piston yang bermasalah atau sudah mengalami aus atau rusak.</li>\r\n</ol>', '', 1),
(5, '#ff702e', 'CDI', NULL, NULL, NULL, NULL, 1),
(6, '#00EDFF ', 'Komstir', NULL, NULL, NULL, NULL, 1),
(7, '#31bc0c', 'V-belt', NULL, NULL, NULL, NULL, 1),
(8, '#3e3e3e', 'Ring Piston', NULL, NULL, NULL, NULL, 1),
(9, '#FF00AB ', 'Stang Piston', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(6) NOT NULL,
  `date_posting` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `author` int(5) NOT NULL,
  `title` varchar(90) NOT NULL,
  `url` varchar(70) NOT NULL,
  `content` text NOT NULL,
  `media` varchar(200) NOT NULL,
  `view` int(5) NOT NULL,
  `comment` int(5) NOT NULL,
  `category` int(2) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL COMMENT 'page/article/attachment',
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `date_posting`, `date_modified`, `author`, `title`, `url`, `content`, `media`, `view`, `comment`, `category`, `type`, `active`) VALUES
(1, '2016-05-17 21:00:00', '2018-03-25 20:25:57', 1, 'Profil Perusahaan', 'profil.html', '<p><img alt=\"\" src=\"http://localhost/sp2/assets/media/images/WhatsApp%20Image%202018-03-24%20at%2010_07_36(3).jpeg\" style=\"width: 100%; height: auto;\" /></p>\r\n\r\n\r\n\r\n<p>Dilatar belakangi oleh keprihatinan terhadap banyaknya lulusan perguruan tinggi yang tidak dapat diserap oleh lapangan pekerjaan dan menadi pengangguran intelek, baik karena kecilnya lapangan kerja yang tersedia maupun disebabkan karena ketidakmampuan mahasiswa dalam menciptakan lapangan kerja, maka kami berinisiatif untuk mengembangkan usaha sendiri demi terciptanya lapangan kerja bagi kami pribadi. Terciptanya usaha ini tidak terlepas dari bantuan yang diberika dari pihak-pihak tertentu. Bak bantuan yang diberikan secara moril maupun materil. Usaha tersebut kami sebut dengan Bengkel Otomotif &quot; Chandra Motor&quot; yang bergerap pada bidang jasa. Bengkel Otomotif &quot; Chandra Motor&quot; sudah berjalan sejak tahun 2015 lalu tepatnya di alan Kedungsari - Margoyoso Km. 03 Desa Kedungsari Rt. 01/01 Kecamatan Tayu, Kabupaten Pati.</p>\r\n\r\n<p><strong><em>B.&nbsp;&nbsp;&nbsp;&nbsp; Visi dan Misi</em></strong></p>\r\n\r\n<p><strong><em>Visi dari Bengkel Chandra Motor adalah :</em></strong></p>\r\n\r\n<p>Menjadi pusat reparasi motor yang menyediakan spare part dan jasa servis yang mengutamakan pada kepuasan pelanggan didukung dengan peralatan canggih dan tenaga ahli yang kompeten serta pelayanan yang optimal dan terpercaya.</p>\r\n\r\n<p><strong><em>Misi dari Bengkel Chandra Motor adalah:</em></strong><br />\r\nMemberikan solusi terbaik pada peyediaan suku cadang terbaik dan reparasi yang terpercaya.<br />\r\nMemberikan pelayanan terbaik dan standart mutu pada Pelanggan dengan menjalankan proses kerja terbaik sehingga tercapai kepuasan Pelanggan.<br />\r\nSelalu mendahulukan kepentingan pelanggan dan karyawan sebelum keuntungan untuk perusahaan<br />\r\nMengikuti perkembangan ilmu dan teknologi secara terus menerus untuk diimplementasikan dengan cara yang benar.<br />\r\nMeningkatkan motivasi dan semangat kerja karyawan secara optimal melalui&nbsp;&nbsp; peningkatan dedikasi,&nbsp; disiplin, dan kemampuan kerja serta penghargaan yang memadai sesuai dengan kinerjanya.</p>\r\n\r\n<p><em><strong>C.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Produk Usaha</strong></em></p>\r\n\r\n<p><em>Produk&nbsp; usaha yang di miliki oleh Bengkel Chandra Motor adalah:</em></p>\r\n\r\n<p><strong>Jasa</strong></p>\r\n\r\n<p>1. Servis ringan</p>\r\n<p>2. Penggantian oli</p>\r\n<p>3. Perbaikan motor</p>\r\n<p>4. Kerusakan karburator In dan Non</p>\r\n<p>5. Kerusakan pengapian</p>\r\n<p>6. Kerusakan rantai</p>\r\n<p>7. Kerusakan mesin</p>\r\n<p>8. Kerusakan perangkat seperti kabel gas, kopling, baut,</p>\r\n<p>9. Kerusakan kelistrikan</p>\r\n<p>10.dll</p>\r\n\r\n<p><em><strong>D.&nbsp;&nbsp;&nbsp; Servis Berat</strong></em></p>\r\n\r\n<p><em>&nbsp;&nbsp; Diko</em></p>\r\n\r\n<p><em>&nbsp;&nbsp; Barang</em></p>\r\n\r\n<p>1. Jenis oli</p>\r\n<p>2. Jenis Ban dalam dan Ban luar</p>\r\n<p>3. Aksesoris kendaraan</p>\r\n<p>4. Suku cadang kendaraan</p>\r\n<p>5. Dll</p>\r\n', 'Busi8.jpg', 0, 0, 0, 'page', 1),
(5, '2017-08-16 10:00:00', '2018-03-25 20:24:23', 1, 'Tentang Kami', 'about.html', '<p><strong><em>Bagi kawan -kawan para kostumer yang ingin bertransaksi dengan kami maka anda dapat menghubungi :</em></strong></p>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Nama Usaha </div><div class=\"col-sm-9\">: Bengkel Otomotif &ldquo;Chandra Motor &ldquo;</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Alamat usaha </div><div class=\"col-sm-9\">: Ds. Kedungsari Rt. 01 Rw. 01 Jln. Kedungsari-Margoyoso Km.03 Kecamatan Tayu Kabupaten Pati.</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">No HP </div><div class=\"col-sm-9\">: 081259214387</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Alamat Email </div><div class=\"col-sm-9\">: candra.motortayu36@yahoo.com</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Jenis Usaha </div><div class=\"col-sm-9\">: Jasa</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Tahun Berdiri </div><div class=\"col-sm-9\">: 2015</div>\r\n</div>\r\n\r\n\r\n<p><strong><em>Nama-nama karyawan di bengkel chandra motor adalah sebagai berikut:</em></strong></p>\r\n\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Kepala Bengkel</div><div class=\"col-sm-9\">: Teguh Santosa</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Administrasi</div><div class=\"col-sm-9\">: Fitri Nalamsari</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Ketua Mekanik</div><div class=\"col-sm-9\">: Wawan Hadi Wibowo</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Mekanik</div><div class=\"col-sm-9\"> \r\n<ol type=\"a\">\r\n	<li>Adi Setiawan</li>\r\n	<li>Kebin Sulistyo</li>\r\n	<li>Syamsuddin Muabbad</li>\r\n	<li>Eko Prambudi</li>\r\n</ol>\r\n</div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-sm-3\">Gudang </div><div class=\"col-sm-9\">: Adi Pratikno</div>\r\n</div>', 'Inektor8.jpg', 0, 0, 0, 'page', 1),
(6, '2017-08-27 08:08:36', '2017-08-27 09:17:17', 1, 'Mau Beda, Ada Honda CBR250RR Edisi Spesial', 'Mau-Beda,-Ada-Honda.html', '<p>Tangerang, KompasOtomotif &ndash; PT Astra Honda Motor (AHM) meluncurkan Honda CBR250RR Special Edition sebagai perayaan satu tahun kehadirannya di Indonesia, memanfaatkan pameran otomotif Gaikindo Indonesia International Auto Show (GIIAS) 2017, (10/8/2017), di ICE, BSD City, Tangerang.</p>\r\n\r\n<p>Sepeda motor sport 250 cc itu tampil khas bertema &rdquo;The Art of Kabuki&rdquo;, ikon seni di Jepang yang saat ini menjadi tren. Desain terbaru motor berfilosofi &rdquo;Total Control&rdquo; itu juga disertai goresan khas yang menggambarkan peta Indonesia.</p>\r\n\r\n<p>Tema ikonik Kabuki-nya hadir dari shock absorber berwarna hitam dan frame kelir merah. Pelek disebut &rdquo;asimetri&rdquo;, karena bagian depan berwarna hitam dan belakang berwarna putih. Itu pun masih dikombinasi dengan rear seat cowl putih.</p>\r\n\r\n<p>Edisi spesial dengan tema ini menggambarkan budaya tradisional &rdquo;Kabukimono&rdquo; yang berasal dari era Sengoku sekitar akhir abad 15-16 Masehi. Era tersebut dikenal dengan Samurai yang menjadi ikon pemberani dan tangguh saat mengabdikan dirinya untuk masyarakat.</p>\r\n\r\n<p>Filosofi budaya Kabukimono ini sejalan dengan perjalanan CBR250RRsaat ini masih menjadi model dengan banyak peminat di segmennya, juga berhasil mengukir sejarah baru motor sport di Indonesia.</p>\r\n\r\n<p>Donny Apriliananda/KompasOtomotifKompasOtomotif-Desain khusus diciptakan pada ajang GIIAS 2017.</p>\r\n\r\n<p>Direktur Pemasaran AHM Thomas Wijaya mengatakan bahwa pecinta motor tipe sport ingin semakin bangga saat berkendara dengan motor yang menampilkan karakter yang unik dan sesuai tren terkini. Tampilan khas The Art of Kabuki pada New Honda CBR250RR Special Edition diharapkan mampu menyuguhkan kebanggaan baru yang khas bagi pemiliknya.</p>\r\n\r\n<p>&rdquo;Sejak kehadiran perdananya di dunia, CBR250RR disambut antusias dan membuka lembaran baru sejarah pasar supersport 250 cc. Kami optimistis edisi khusus dengan tampilan unik ini akan semakin meningkatan ikatan emosional mereka dengan motor favoritnya,&rdquo; ujar Thomas.</p>\r\n\r\n<p>Tidak ada perubahan performa dari penampilan khusus ini, dan AHM cuma menyiapkan 100 unit tipe spesial ini yang sudah bisa dipesan di dealer Big Wing Honda.</p>\r\n\r\n<p>Edisi khusus CBR250RR dipasarkan dengan banderol Rp 70.825.000 on the road DKI Jakarta. Ini melengkapi tipe lain yang sudah ada, warna Anchor Graymetallic dan Mat Gunpowder Black Metallic harga Rp 63.525.000 tipe standar, Rp 69.525.000 dengan ABS.</p>\r\n\r\n<p>Sementara itu untuk warna Honda Racing Red dipasarkan dengan harga Rp 64.125.000 (standar), Rp 70.125.000 (ABS), dan Repsol Edition ABS Rp 72.375.000.</p>', '4025154185.jpg', 12, 0, 0, 'article', 1),
(7, '2017-08-27 09:09:23', '2017-08-27 10:18:14', 1, 'Begini Rasanya Honda CRF1000L Africa Twin Dipakai Turing Jarak Jauh, Banyak Hal Tak Terdug', 'Begini-Rasanya-Honda-CRF1000L.html', '<p>Norwegia - Mungkin Anda heran mengapa OTOMOTIF kembali mengulas test ride Honda CRF1000L&nbsp; Africa Twin, kan sudah pernah di artikel silam. Tentu ada sebabnya nih!</p>\r\n\r\n<p>Kala itu test ride untuk harian dan turing jarak pendek. Nah kali ini dipakai di habitatnya Africa Twin, dikendarai jauh sekitar 3.500 km selama 8 hari.</p>\r\n\r\n<p>Tepatnya saat OTOMOTIF ikut Honda Adventure Roads 2017 di Norwegia, rutenya dari Oslo menuju Nordkapp (26/6-3/7).<br />\r\n&nbsp;<br />\r\nTidak hanya jarak yang jauh, kondisi motor juga beda. Saat pakai unit dari PT Astra Honda Motor tanpa aksesori tambahan. Nah di Norwegia Africa Twin yang dipakai dilengkapi beragam aksesori penunjang perjalanan jauh.</p>\r\n\r\n<p>Sebut saja 3 buah kotak penyimpanan, yaitu 2 panniers dan sebuah top box.</p>\r\n\r\n<p>Africa Twin bernomor 28 dari 40 motor ini juga dilengkapi grip heater. Dan satu lagi ada tambahan tuas persneling, padahal versi yang dipakai OTOMOTIF DCT.</p>\r\n\r\n<p>Nah buat apa dan bagaimana impresinya? Mari simak terus. Tim OTOMOTIF<br />\r\nRiding Position &amp; Handling</p>\r\n\r\n<p>Sebelum perjalanan, penyesuaian utama yang dilakukan pasti setel joknya. Pasang ke posisi rendah, biar saat berhenti kaki tidak kesusahan menapak, maklum buat OTOMOTIF yang berpostur 173 cm 63 kg, jika dipasang pada posisi tinggi 870 mm kaki jadi jinjit.</p>\r\n\r\n<p>Dengan dipasang yang rendah hanya 850 mm, lumayan dong beda 2 cm, sangat membantu saat berhenti atau putar balik agar kaki menapak.</p>\r\n\r\n<p>Maklum bobot Africa Twin tipe DCT ini mencapai 242 kg, itu belum ditambah boks dan isinya yang ketiganya selama perjalanan isinya penuh!</p>', '71483-begini-rasanya-honda-crf1000l-africa-twin-dipakai-turing-jarak-jauh-banyak-hal-tak-terduga.jpg', 7, 0, 0, 'article', 1),
(8, '2018-03-14 11:36:16', '2018-04-19 09:33:33', 1, 'KLASIFIKASI TYPE VARIO', 'KLASIFIKASI-TYPE-VARIO.html', '<p style=\"text-align: justify;\">Pada setiap kendaraan tentunya tidak luput dari penyuplai bahan bakar, Dimana penyuplai ini bekerja untuk mengolah bahan bakar hingga menjadi campuran yang akan dimasukkan ke dalam ruang bakar, komponen yang satu ini disebut dengan karburator, Namun pada pabrikan-pabrikan yang memproduksi sepeda motor sekarang banyak yang menganut Sistem Injeksi.</p>\r\n\r\n<p>&nbsp;</p>', '11.jpg', 22, 0, 0, 'article', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posting_category`
--

CREATE TABLE `posting_category` (
  `id` int(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posting_category`
--

INSERT INTO `posting_category` (`id`, `name`, `active`) VALUES
(0, 'uncategories', 1);

-- --------------------------------------------------------

--
-- Table structure for table `relasi`
--

CREATE TABLE `relasi` (
  `id` int(2) NOT NULL,
  `penyakit` int(2) NOT NULL,
  `gejala` int(2) NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasi`
--

INSERT INTO `relasi` (`id`, `penyakit`, `gejala`, `active`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 0),
(3, 3, 1, 0),
(4, 4, 1, 0),
(5, 5, 1, 0),
(6, 6, 1, 0),
(7, 7, 1, 0),
(8, 8, 1, 0),
(9, 9, 1, 0),
(10, 1, 2, 0),
(11, 2, 2, 1),
(12, 3, 2, 0),
(13, 4, 2, 0),
(14, 5, 2, 0),
(15, 6, 2, 0),
(16, 7, 2, 0),
(17, 8, 2, 0),
(18, 9, 2, 0),
(19, 1, 3, 0),
(20, 2, 3, 0),
(21, 3, 3, 0),
(22, 4, 3, 0),
(23, 5, 3, 0),
(24, 6, 3, 0),
(25, 7, 3, 0),
(26, 8, 3, 0),
(27, 9, 3, 0),
(28, 1, 4, 0),
(29, 2, 4, 0),
(30, 3, 4, 0),
(31, 4, 4, 0),
(32, 5, 4, 0),
(33, 6, 4, 0),
(34, 7, 4, 0),
(35, 8, 4, 0),
(36, 9, 4, 0),
(37, 1, 5, 0),
(38, 2, 5, 0),
(39, 3, 5, 0),
(40, 4, 5, 0),
(41, 5, 5, 0),
(42, 6, 5, 0),
(43, 7, 5, 0),
(44, 8, 5, 0),
(45, 9, 5, 0),
(46, 1, 6, 0),
(47, 2, 6, 0),
(48, 3, 6, 0),
(49, 4, 6, 0),
(50, 5, 6, 0),
(51, 6, 6, 0),
(52, 7, 6, 0),
(53, 8, 6, 0),
(54, 9, 6, 0),
(55, 1, 7, 0),
(56, 2, 7, 0),
(57, 3, 7, 0),
(58, 4, 7, 0),
(59, 5, 7, 0),
(60, 6, 7, 0),
(61, 7, 7, 0),
(62, 8, 7, 0),
(63, 9, 7, 0),
(64, 1, 8, 0),
(65, 2, 8, 0),
(66, 3, 8, 0),
(67, 4, 8, 0),
(68, 5, 8, 0),
(69, 6, 8, 0),
(70, 7, 8, 0),
(71, 8, 8, 0),
(72, 9, 8, 0),
(73, 1, 9, 0),
(74, 2, 9, 0),
(75, 3, 9, 0),
(76, 4, 9, 0),
(77, 5, 9, 0),
(78, 6, 9, 0),
(79, 7, 9, 0),
(80, 8, 9, 0),
(81, 9, 9, 0),
(82, 1, 10, 0),
(83, 2, 10, 0),
(84, 3, 10, 0),
(85, 4, 10, 0),
(86, 5, 10, 0),
(87, 6, 10, 0),
(88, 7, 10, 0),
(89, 8, 10, 0),
(90, 9, 10, 0),
(91, 1, 11, 0),
(92, 2, 11, 0),
(93, 3, 11, 0),
(94, 4, 11, 0),
(95, 5, 11, 0),
(96, 6, 11, 0),
(97, 7, 11, 0),
(98, 8, 11, 0),
(99, 9, 11, 0),
(100, 1, 12, 0),
(101, 2, 12, 0),
(102, 3, 12, 0),
(103, 4, 12, 0),
(104, 5, 12, 0),
(105, 6, 12, 0),
(106, 7, 12, 0),
(107, 8, 12, 0),
(108, 9, 12, 0),
(109, 1, 13, 0),
(110, 2, 13, 0),
(111, 3, 13, 0),
(112, 4, 13, 0),
(113, 5, 13, 0),
(114, 6, 13, 0),
(115, 7, 13, 0),
(116, 8, 13, 0),
(117, 9, 13, 0),
(118, 1, 14, 0),
(119, 2, 14, 0),
(120, 3, 14, 0),
(121, 4, 14, 0),
(122, 5, 14, 0),
(123, 6, 14, 0),
(124, 7, 14, 0),
(125, 8, 14, 0),
(126, 9, 14, 0),
(127, 1, 15, 0),
(128, 2, 15, 0),
(129, 3, 15, 0),
(130, 4, 15, 0),
(131, 5, 15, 0),
(132, 6, 15, 0),
(133, 7, 15, 0),
(134, 8, 15, 0),
(135, 9, 15, 0),
(136, 1, 16, 0),
(137, 2, 16, 0),
(138, 3, 16, 0),
(139, 4, 16, 0),
(140, 5, 16, 0),
(141, 6, 16, 0),
(142, 7, 16, 0),
(143, 8, 16, 0),
(144, 9, 16, 0),
(145, 1, 17, 0),
(146, 2, 17, 0),
(147, 3, 17, 0),
(148, 4, 17, 0),
(149, 5, 17, 0),
(150, 6, 17, 0),
(151, 7, 17, 0),
(152, 8, 17, 0),
(153, 9, 17, 0),
(154, 1, 18, 0),
(155, 2, 18, 0),
(156, 3, 18, 0),
(157, 4, 18, 0),
(158, 5, 18, 0),
(159, 6, 18, 0),
(160, 7, 18, 0),
(161, 8, 18, 0),
(162, 9, 18, 0),
(163, 1, 19, 0),
(164, 2, 19, 0),
(165, 3, 19, 0),
(166, 4, 19, 0),
(167, 5, 19, 0),
(168, 6, 19, 0),
(169, 7, 19, 0),
(170, 8, 19, 0),
(171, 9, 19, 0),
(172, 1, 20, 0),
(173, 2, 20, 0),
(174, 3, 20, 0),
(175, 4, 20, 0),
(176, 5, 20, 0),
(177, 6, 20, 0),
(178, 7, 20, 0),
(179, 8, 20, 0),
(180, 9, 20, 0),
(181, 1, 21, 0),
(182, 2, 21, 0),
(183, 3, 21, 0),
(184, 4, 21, 0),
(185, 5, 21, 0),
(186, 6, 21, 0),
(187, 7, 21, 0),
(188, 8, 21, 0),
(189, 9, 21, 0),
(190, 1, 22, 0),
(191, 2, 22, 0),
(192, 3, 22, 0),
(193, 4, 22, 0),
(194, 5, 22, 0),
(195, 6, 22, 0),
(196, 7, 22, 0),
(197, 8, 22, 0),
(198, 9, 22, 0),
(199, 1, 23, 0),
(200, 2, 23, 0),
(201, 3, 23, 0),
(202, 4, 23, 0),
(203, 5, 23, 0),
(204, 6, 23, 0),
(205, 7, 23, 0),
(206, 8, 23, 0),
(207, 9, 23, 0),
(208, 1, 24, 0),
(209, 2, 24, 0),
(210, 3, 24, 0),
(211, 4, 24, 0),
(212, 5, 24, 0),
(213, 6, 24, 0),
(214, 7, 24, 0),
(215, 8, 24, 0),
(216, 9, 24, 0),
(217, 1, 25, 0),
(218, 2, 25, 0),
(219, 3, 25, 0),
(220, 4, 25, 0),
(221, 5, 25, 0),
(222, 6, 25, 0),
(223, 7, 25, 0),
(224, 8, 25, 0),
(225, 9, 25, 0),
(226, 1, 26, 0),
(227, 2, 26, 0),
(228, 3, 26, 0),
(229, 4, 26, 0),
(230, 5, 26, 0),
(231, 6, 26, 0),
(232, 7, 26, 0),
(233, 8, 26, 0),
(234, 9, 26, 0),
(235, 1, 27, 0),
(236, 2, 27, 0),
(237, 3, 27, 0),
(238, 4, 27, 0),
(239, 5, 27, 0),
(240, 6, 27, 0),
(241, 7, 27, 0),
(242, 8, 27, 0),
(243, 9, 27, 0),
(244, 1, 28, 0),
(245, 2, 28, 0),
(246, 3, 28, 0),
(247, 4, 28, 0),
(248, 5, 28, 0),
(249, 6, 28, 0),
(250, 7, 28, 0),
(251, 8, 28, 0),
(252, 9, 28, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_gejala`
--

CREATE TABLE `tmp_gejala` (
  `id` int(5) NOT NULL,
  `user` varchar(50) NOT NULL,
  `gejala` int(2) NOT NULL,
  `percaya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_penyakit`
--

CREATE TABLE `tmp_penyakit` (
  `id` int(5) NOT NULL,
  `user` varchar(50) NOT NULL,
  `penyakit` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT '827ccb0eea8a706c4c34a16891f84e7b',
  `level` int(1) NOT NULL DEFAULT '2',
  `nama` varchar(60) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` text NOT NULL,
  `cookie` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabel user login';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `level`, `nama`, `tempat`, `tanggal`, `alamat`, `cookie`, `active`) VALUES
(1, 'admin@example.com', '$2a$08$r2BJO8VLIr9y/97gImSb0u5s.Pd7uVVEcsmu1fBFE54Va1w1OPJ5S', 1, 'Stepandi Dwi Mujib', '', '0000-00-00', '', 'e64c7d89f26bd1972efa854d13d7dd61', 1),
(2, 'user@example.com', '$2a$08$r2BJO8VLIr9y/97gImSb0u5s.Pd7uVVEcsmu1fBFE54Va1w1OPJ5S', 2, 'Nama User', '', '0000-00-00', '', 'b58996c504c5638798eb6b511e6f49af', 1),
(3, 'donieka8@gmail.com', '$2a$08$LA2covNVB4wOgTUyo8/6s.n.WmzWPGuV6L.0wwuYR/hlrbQirPqvK', 2, '(update) Infect', '', '0000-00-00', 'aaaaaaaaaaaa', '22792fac1f4a78a396481e754c0d56e2', 0),
(4, 'xxx@coba.com', '$2a$08$OtHCCkyggAMP6EsAlR5gBucVmR9J65mKKuDa5.w18BwpRaK96kbny', 2, 'xxx', '', '0000-00-00', 'xxx xxx', '35f02bae9fe7c7cf92fe6b3ba8a1ba0c', 1),
(5, 'stepandidwimujib@yahoo.co.id', '$2a$08$ryHDumWcObM6EdVFrvf0V.xUJQB3rJFR7QthUlOBXJjc27HYpcydy', 2, 'STEPANDI DWI MUJIB', '', '0000-00-00', 'Dukuhseti', '2a2ff82957aec9c8098ffbcab94c6601', 1),
(6, 'pengguna@gmail.com', '$2a$08$1Q.dRDTN43zBKCE5NlCaxu.GaWQdcFkXXZWZMqVnsUp.tScrZNIeK', 2, 'ANTOK', '', '0000-00-00', 'KEMBANG', 'a42c2702c399d182286c7492a600529c', 1),
(7, 'anammanda@gmail.com', '$2a$08$CzF2o9oNFxQ/CJo5lZzfr.H6plm.i6dC2GwgBfeS.WCr7C2wr8GxC', 2, 'Anam Ahmad', '', '0000-00-00', 'Desa Kembang', '447e7d3aa5e791c46c7d2468b94ff3ce', 1),
(8, 'pandi@yahoo.com', '$2a$08$pLF502E8SzHZjcMj3qYp3eyepXElWG0XnpY.NDzm4aMTE3LGKXvuC', 2, 'pandi1234', '', '0000-00-00', 'tayu', 'd0354de22adf520d40c0981068f33856', 1),
(9, 'coba@saya.com', '$2a$08$oV5XPVx6u1oMN3bpvdWHBenXV5FhdZjKXbh4b9LEirWDe.qqHYmC2', 2, 'Nama Coba', '', '0000-00-00', 'alamat', 'dc0390b741830fa0c5a8ae7df1d23864', 1);

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `id` int(2) NOT NULL,
  `name` varchar(40) NOT NULL,
  `value` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `website`
--

INSERT INTO `website` (`id`, `name`, `value`, `active`) VALUES
(1, 'name', 'Website title', 1),
(3, 'client', 'PT Tunggal Mulia Pratama', 1),
(4, 'author', '<a target=\"_BLANK\" href=\"http://twitter.com/in_donnie_sia\"><i class=\"fa fa-twitter\"></i> EK4 LABS</a>', 1),
(5, 'phone', '6285713275367', 1),
(6, 'description', '<p>Webside sistem pakar indentifikasi penyakit udang vannamei beserta cara pengobatnya... </p>', 1),
(9, 'mail', 'service@example.com', 1),
(10, 'footer', '	<div class=\"container\" style=\"background:transparent;padding-bottom:0\">\r\n		<label style=\"margin-bottom: 30px;\">\r\n			<a href=\"#\" title=\"kontak\">kontak</a>\r\n			<a href=\"#\" title=\"tentang kami\">tentang kami</a>\r\n			<a href=\"#\" title=\"privasi policy\">privasi policy</a>\r\n		</label>\r\n		<label>website name | coding by <a class=\"bottom-link\" href=\"#\">codeigniter</a></label>\r\n		<label>copyright @2017 | template based on <a class=\"bottom-link\" href=\"#\">bootstrap</a>, {elapsed_time} seconds for load this page</label>\r\n	</div>', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisa`
--
ALTER TABLE `analisa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gejala_opsi`
--
ALTER TABLE `gejala_opsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `posting_category`
--
ALTER TABLE `posting_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relasi`
--
ALTER TABLE `relasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala_opsi`
--
ALTER TABLE `gejala_opsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `relasi`
--
ALTER TABLE `relasi`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `tmp_gejala`
--
ALTER TABLE `tmp_gejala`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tmp_penyakit`
--
ALTER TABLE `tmp_penyakit`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
