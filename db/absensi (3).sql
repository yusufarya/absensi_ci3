-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 08:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `kode_absen` char(35) NOT NULL,
  `semester` int(11) NOT NULL,
  `kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `kode_absen`, `semester`, `kelas`) VALUES
(1, '002', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id` int(11) NOT NULL,
  `kode` char(5) NOT NULL,
  `hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id`, `kode`, `hari`) VALUES
(1, '001', 'Senin'),
(2, '002', 'Selasa'),
(3, '003', 'Rabu'),
(4, '004', 'Kamis'),
(5, '005', 'Jumat'),
(6, '006', 'Sabtu'),
(7, '007', 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `kd_minggu`
--

CREATE TABLE `kd_minggu` (
  `id` int(11) NOT NULL,
  `kode` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kd_minggu`
--

INSERT INTO `kd_minggu` (`id`, `kode`, `nama`) VALUES
(1, '001', 'Minggu ke satu'),
(2, '002', 'Minggu ke dua'),
(3, '003', 'Minggu ke tiga'),
(4, '004', 'Minggu ke empat'),
(5, '005', 'Minggu ke lima'),
(6, '006', 'Minggu ke enam'),
(7, '007', 'Minggu ke tujuh'),
(8, '008', 'Minggu ke delapan'),
(9, '009', 'Minggu ke sembilan'),
(10, '010', 'Minggu ke sepuluh'),
(11, '011', 'Minggu ke sebelas'),
(12, '012', 'Minggu ke duabelas'),
(13, '013', 'Minggu ke tigabelas'),
(14, '014', 'Minggu ke empatbelas'),
(15, '015', 'Minggu ke limabelas'),
(16, '016', 'Minggu ke enambelas'),
(17, '017', 'Minggu ke tujuhbelas'),
(18, '018', 'Minggu ke delapanbelas'),
(19, '019', 'Minggu ke sembilanbelas'),
(20, '020', 'Minggu ke duapuluh'),
(21, '021', 'Minggu ke duapuluhsatu'),
(22, '022', 'Minggu ke duapuluhdua'),
(23, '023', 'Minggu ke duapuluhtiga'),
(24, '024', 'Minggu ke duapuluhempat'),
(25, '024', 'Minggu ke duapuluhlima'),
(26, '026', 'Minggu ke duapuluhenam');

-- --------------------------------------------------------

--
-- Table structure for table `kehadiran`
--

CREATE TABLE `kehadiran` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `kode` char(20) NOT NULL,
  `semester` char(11) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `status` char(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `mapel_id` char(20) NOT NULL,
  `hari` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kehadiran`
--

INSERT INTO `kehadiran` (`id`, `siswa_id`, `kode`, `semester`, `jam`, `tanggal`, `status`, `keterangan`, `mapel_id`, `hari`) VALUES
(41, 8, '001', '1', '00:45:01', '2022-05-21', 'Y', 'Hadir', '40', 'Jumat'),
(42, 8, '001', '1', '00:45:12', '2022-05-21', 'Y', 'Hadir', '12', 'Sabtu'),
(43, 8, '001', '1', '00:45:21', '2022-05-21', 'Y', 'Hadir', '6', 'Jumat'),
(45, 2, '001', '1', '00:55:31', '2022-05-21', 'Y', 'Hadir', '40', 'Jumat'),
(46, 2, '001', '1', '00:55:38', '2022-05-21', 'Y', 'Hadir', '59', 'Jumat'),
(47, 2, '001', '1', '00:56:30', '2022-05-21', 'Y', 'Hadir', '6', 'Jumat'),
(48, 2, '001', '1', '00:57:31', '2022-05-21', 'Y', 'Hadir', '12', 'Sabtu'),
(49, 14, '001', '1', '01:35:25', '2022-05-21', 'Y', 'Hadir', '12', 'Sabtu'),
(53, 5, '001', '1', '01:51:27', '2022-05-21', 'Y', 'Hadir', '12', 'Sabtu'),
(55, 4, '001', '1', '02:04:40', '2022-05-21', 'Y', 'Hadir', '12', 'Sabtu'),
(58, 19, '001', '1', '23:00:58', '2022-05-21', 'Y', 'Hadir', '14', 'Sabtu'),
(59, 22, '001', '1', '23:01:59', '2022-05-21', 'Y', 'Hadir', '12', 'Sabtu'),
(82, 21, '001', '1', '21:27:41', '2022-05-23', 'Y', 'Hadir', '29', 'Senin'),
(83, 21, '001', '1', '21:27:45', '2022-05-23', 'Y', 'Hadir', '12', 'Senin'),
(84, 13, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(85, 17, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(86, 18, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(89, 3, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '12', 'Senin'),
(90, 6, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '12', 'Senin'),
(91, 10, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '12', 'Senin'),
(92, 12, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '12', 'Senin'),
(93, 16, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '12', 'Senin'),
(94, 23, '001', '1', '01:27:16', '2022-05-26', 'Y', 'Hadir', '36', 'Kamis'),
(95, 23, '001', '1', '01:27:25', '2022-05-26', 'Y', 'Hadir', '11', 'Kamis'),
(96, 23, '001', '1', '01:27:28', '2022-05-26', 'Y', 'Hadir', '35', 'Kamis'),
(97, 23, '001', '1', '01:27:30', '2022-05-26', 'Y', 'Hadir', '2', 'Kamis'),
(98, 23, '001', '1', '01:27:33', '2022-05-26', 'Y', 'Hadir', '2', 'Kamis'),
(99, 30, '001', '1', '01:29:09', '2022-05-26', 'Y', 'Hadir', '36', 'Kamis'),
(100, 30, '001', '1', '01:29:18', '2022-05-26', 'Y', 'Hadir', '35', 'Kamis'),
(101, 30, '001', '1', '01:29:31', '2022-05-26', 'Y', 'Hadir', '11', 'Kamis'),
(102, 2, '001', '1', '13:01:53', '2022-05-28', 'Y', 'Hadir', '50', 'Sabtu'),
(103, 2, '001', '1', '13:02:59', '2022-05-28', 'Y', 'Hadir', '59', 'Sabtu'),
(117, 8, '001', '1', '13:44:07', '2022-05-28', 'Y', 'Hadir', '53', 'Sabtu'),
(118, 8, '001', '1', '13:44:47', '2022-05-28', 'Y', 'Hadir', '50', 'Sabtu'),
(119, 3, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(120, 4, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(121, 5, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(122, 6, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(123, 10, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(124, 12, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(125, 16, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(126, 21, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(127, 22, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(128, 30, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '4', 'Sabtu'),
(129, 9, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '50', 'Sabtu'),
(130, 11, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '50', 'Sabtu'),
(131, 14, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '50', 'Sabtu'),
(132, 15, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '50', 'Sabtu'),
(133, 31, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '50', 'Sabtu'),
(166, 20, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(167, 23, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(168, 24, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(169, 25, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(170, 26, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(171, 27, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(172, 28, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(173, 29, '001', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(174, 13, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(175, 17, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(176, 18, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(177, 19, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(178, 20, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(179, 23, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(180, 24, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(181, 25, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(182, 26, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(183, 27, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(184, 28, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(185, 29, '002', '1', '00:00:00', '0000-00-00', 'N', 'Tidak Hadir', '14', 'Sabtu'),
(186, 2, '002', '1', '12:39:27', '2022-06-25', 'Y', 'Hadir', '50', 'Sabtu'),
(187, 2, '002', '1', '12:39:49', '2022-06-25', 'Y', 'Hadir', '50', 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `level` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `level`) VALUES
(1, 'Administrator'),
(2, 'Staf II'),
(3, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `jam` time NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `nama`, `jam`, `tanggal`, `keterangan`) VALUES
(5, 'Admin 1 Unv xyz', '00:54:01', '2022-05-16', 'Melihat Jadwal Guru'),
(11, 'Admin 1 xyz', '01:06:09', '2022-05-16', 'Mengubah data user '),
(12, 'Admin 1 xyz', '01:06:11', '2022-05-16', 'Melihat Jadwal Guru'),
(14, 'Admin 1 xyz', '01:12:02', '2022-05-16', 'Melihat Jadwal Guru'),
(16, 'Admin 1 xyz', '01:23:55', '2022-05-16', 'Melihat Jadwal Guru'),
(17, 'Admin 1 xyz', '01:26:32', '2022-05-16', 'Menambah data siswa'),
(18, 'Admin 1 xyz', '01:26:49', '2022-05-16', 'Menambah data siswa'),
(19, 'Admin 1 xyz', '01:27:55', '2022-05-16', 'Menambah data siswa'),
(20, 'Admin 1 xyz', '01:28:35', '2022-05-16', 'Menambah data siswa'),
(21, 'Admin 1 xyz', '01:35:31', '2022-05-16', 'Mengubah Password'),
(22, 'Admin 1 xyz', '01:35:46', '2022-05-16', 'Mengubah Password'),
(23, 'Admin 1 xyz', '01:36:51', '2022-05-16', 'Melihat Jadwal Guru'),
(24, 'YAD', '01:54:23', '2022-05-16', 'Menambah data siswa'),
(26, 'YAD', '02:01:41', '2022-05-16', 'Mengubah data siswa '),
(27, 'YAD', '02:03:00', '2022-05-16', 'Menambah data siswa'),
(28, 'YAD', '02:03:12', '2022-05-16', 'Menambah data siswa'),
(29, 'YAD', '02:04:03', '2022-05-16', 'Menambah data siswa'),
(30, 'YAD', '02:04:57', '2022-05-16', 'Menambah data siswa'),
(31, 'YAD', '02:05:15', '2022-05-16', 'Mengganti kode pertemuan'),
(32, 'YAD', '02:07:23', '2022-05-16', 'Mengubah Password'),
(33, 'YAD', '02:07:52', '2022-05-16', 'Mengubah Password'),
(34, 'YAD', '21:45:54', '2022-05-16', 'Menambah data siswa'),
(35, 'YAD', '21:46:55', '2022-05-16', 'Mengubah data siswa '),
(36, 'YAD', '21:47:30', '2022-05-16', 'Menambah data siswa'),
(37, 'YAD', '21:55:55', '2022-05-16', 'Mengubah data siswa '),
(38, 'YAD', '22:07:16', '2022-05-16', 'Mengganti kode pertemuan'),
(39, 'YAD', '22:25:49', '2022-05-16', 'Mengganti kode pertemuan'),
(40, 'YAD', '20:17:33', '2022-05-20', 'Mengganti kode pertemuan'),
(41, 'YAD', '20:17:40', '2022-05-20', 'Mengganti kode pertemuan'),
(42, 'YAD', '20:19:36', '2022-05-20', 'Mengganti kode pertemuan'),
(43, 'YAD', '20:26:30', '2022-05-20', 'Mengganti kode pertemuan'),
(44, 'YAD', '20:28:34', '2022-05-20', 'Mengganti kode pertemuan'),
(45, 'YAD', '01:25:32', '2022-05-21', 'Mengganti kode pertemuan'),
(46, 'YAD', '01:25:37', '2022-05-21', 'Mengganti kode pertemuan'),
(47, 'YAD', '01:25:43', '2022-05-21', 'Mengganti kode pertemuan'),
(48, 'YAD', '01:25:48', '2022-05-21', 'Mengganti kode pertemuan'),
(49, 'YAD', '01:25:53', '2022-05-21', 'Mengganti kode pertemuan'),
(50, 'YAD', '01:33:16', '2022-05-21', 'Menambah data siswa'),
(51, 'YAD', '01:34:38', '2022-05-21', 'Mengubah data siswa '),
(52, 'YAD', '02:06:23', '2022-05-21', 'Mengganti kode pertemuan'),
(53, 'YAD', '02:09:23', '2022-05-21', 'Mengganti kode pertemuan'),
(54, 'YAD', '02:09:50', '2022-05-21', 'Mengganti kode pertemuan'),
(55, 'YAD', '02:10:26', '2022-05-21', 'Mengganti kode pertemuan'),
(56, 'YAD', '22:40:48', '2022-05-21', 'Menambah data siswa'),
(57, 'YAD', '22:41:12', '2022-05-21', 'Mengubah data siswa '),
(58, 'YAD', '22:42:00', '2022-05-21', 'Mengganti kode pertemuan'),
(59, 'YAD', '22:42:07', '2022-05-21', 'Mengganti kode pertemuan'),
(60, 'YAD', '22:42:19', '2022-05-21', 'Mengganti kode pertemuan'),
(61, 'YAD', '22:42:25', '2022-05-21', 'Mengganti kode pertemuan'),
(62, 'YAD', '22:52:04', '2022-05-21', 'Mengganti kode pertemuan'),
(63, 'YAD', '22:52:07', '2022-05-21', 'Mengganti kode pertemuan'),
(64, 'YAD', '22:52:11', '2022-05-21', 'Mengganti kode pertemuan'),
(65, 'YAD', '23:59:40', '2022-05-21', 'Mengganti kode pertemuan'),
(66, 'YAD', '00:04:05', '2022-05-22', 'Mengganti kode pertemuan'),
(67, 'YAD', '00:50:22', '2022-05-22', 'Mengganti kode pertemuan'),
(68, 'YAD', '19:27:49', '2022-05-22', 'Mengganti kode pertemuan'),
(69, 'YAD', '22:34:20', '2022-05-22', 'Mengganti kode pertemuan'),
(70, 'YAD', '22:34:31', '2022-05-22', 'Mengganti kode pertemuan'),
(71, 'YAD', '22:34:48', '2022-05-22', 'Mengganti kode pertemuan'),
(72, 'YAD', '22:34:59', '2022-05-22', 'Mengganti kode pertemuan'),
(73, 'YAD', '22:35:10', '2022-05-22', 'Mengganti kode pertemuan'),
(74, 'YAD', '22:35:33', '2022-05-22', 'Mengganti kode pertemuan'),
(75, 'YAD', '22:49:46', '2022-05-22', 'Mengganti kode pertemuan'),
(76, 'YAD', '21:37:11', '2022-05-23', 'Mengganti kode pertemuan'),
(77, 'YAD', '21:45:24', '2022-05-23', 'Mengganti kode pertemuan'),
(78, 'YAD', '01:17:18', '2022-05-26', 'Menambah data siswa'),
(79, 'YAD', '01:17:40', '2022-05-26', 'Mengubah data siswa '),
(80, 'YAD', '01:17:51', '2022-05-26', 'Mengubah data siswa '),
(81, 'YAD', '01:18:31', '2022-05-26', 'Menambah data siswa'),
(82, 'YAD', '01:19:20', '2022-05-26', 'Mengubah data siswa '),
(83, 'YAD', '01:20:01', '2022-05-26', 'Menambah data siswa'),
(84, 'YAD', '01:20:20', '2022-05-26', 'Mengubah data siswa '),
(85, 'YAD', '01:20:54', '2022-05-26', 'Mengubah data siswa '),
(86, 'YAD', '01:21:24', '2022-05-26', 'Menambah data siswa'),
(87, 'YAD', '01:21:49', '2022-05-26', 'Mengubah data siswa '),
(88, 'YAD', '01:23:05', '2022-05-26', 'Menambah data siswa'),
(89, 'YAD', '01:23:40', '2022-05-26', 'Menambah data siswa'),
(90, 'YAD', '01:24:04', '2022-05-26', 'Mengubah data siswa '),
(91, 'YAD', '01:24:24', '2022-05-26', 'Mengubah data siswa '),
(92, 'YAD', '01:25:02', '2022-05-26', 'Menambah data siswa'),
(93, 'YAD', '01:25:46', '2022-05-26', 'Menambah data siswa'),
(94, 'YAD', '01:26:19', '2022-05-26', 'Mengubah data siswa '),
(95, 'YAD', '01:26:39', '2022-05-26', 'Mengubah data siswa '),
(96, 'Administrator', '13:50:37', '2022-05-28', 'Melihat Jadwal Guru'),
(97, 'Administrator', '13:50:46', '2022-05-28', 'Melihat Jadwal Guru'),
(98, 'Administrator', '13:52:35', '2022-05-28', 'Melihat Jadwal Guru'),
(99, 'Administrator', '13:52:44', '2022-05-28', 'Melihat Jadwal Guru'),
(100, 'Administrator', '13:53:45', '2022-05-28', 'Melihat Jadwal Guru'),
(101, 'Administrator', '13:54:27', '2022-05-28', 'Melihat Jadwal Guru'),
(102, 'Administrator', '13:55:19', '2022-05-28', 'Melihat Jadwal Guru'),
(103, 'Administrator', '13:55:27', '2022-05-28', 'Melihat Jadwal Guru'),
(104, 'Administrator', '13:56:53', '2022-05-28', 'Melihat Jadwal Guru'),
(105, 'Administrator', '13:57:34', '2022-05-28', 'Melihat Jadwal Guru'),
(106, 'Administrator', '13:57:46', '2022-05-28', 'Melihat Jadwal Guru'),
(107, 'Administrator', '13:58:50', '2022-05-28', 'Melihat Jadwal Guru'),
(108, 'Administrator', '13:59:00', '2022-05-28', 'Melihat Jadwal Guru'),
(109, 'Administrator', '14:01:14', '2022-05-28', 'Melihat Jadwal Guru'),
(110, 'Administrator', '14:02:12', '2022-05-28', 'Melihat Jadwal Guru'),
(111, 'Administrator', '14:05:12', '2022-05-28', 'Mengubah Password'),
(112, 'Administrator', '14:05:32', '2022-05-28', 'Mengubah Password'),
(113, 'Administrator', '14:07:34', '2022-05-28', 'Mengubah Password'),
(114, 'Administrator', '14:08:44', '2022-05-28', 'Mengubah Password'),
(115, 'Administrator', '14:15:25', '2022-05-28', 'Melihat Jadwal Guru'),
(116, 'Administrator', '14:15:49', '2022-05-28', 'Melihat Data User'),
(117, 'Administrator', '14:15:51', '2022-05-28', 'Melihat Jadwal Guru'),
(118, 'Administrator', '14:17:55', '2022-05-28', 'Melihat Jadwal Guru'),
(119, 'Dr. Xyz', '14:54:17', '2022-05-28', 'Mengubah data siswa '),
(120, 'Dr. Xyz', '14:56:36', '2022-05-28', 'Menambah data siswa'),
(121, 'Dr. Xyz', '15:06:25', '2022-05-28', 'Mengubah data siswa '),
(122, 'Dr. Xyz', '15:07:11', '2022-05-28', 'Mengubah data siswa '),
(123, 'Dr. Xyz', '15:07:53', '2022-05-28', 'Mengubah data siswa '),
(124, 'YAD', '21:42:09', '2022-06-04', 'Mengganti kode pertemuan'),
(125, 'YAD', '21:43:13', '2022-06-04', 'Mengganti kode pertemuan'),
(126, 'YAD', '21:53:54', '2022-06-04', 'Mengganti kode pertemuan'),
(127, 'YAD', '21:54:12', '2022-06-04', 'Mengganti kode pertemuan'),
(128, 'Admin 1 xyz', '22:23:48', '2022-06-04', 'Melihat Data Guru '),
(129, 'Admin 1 xyz', '22:23:51', '2022-06-04', 'Melihat Jadwal Guru'),
(130, 'Admin 1 xyz', '22:25:30', '2022-06-04', 'Melihat Jadwal Guru'),
(131, 'Admin 1 xyz', '22:25:40', '2022-06-04', 'Melihat Jadwal Guru'),
(132, 'Admin 1 xyz', '22:26:05', '2022-06-04', 'Melihat Jadwal Guru'),
(133, 'Admin 1 xyz', '22:26:15', '2022-06-04', 'Melihat Jadwal Guru'),
(134, 'Admin 1 xyz', '22:26:33', '2022-06-04', 'Melihat Jadwal Guru'),
(135, 'Admin 1 xyz', '22:32:44', '2022-06-04', 'Melihat Jadwal Guru'),
(136, 'Admin 1 xyz', '22:32:54', '2022-06-04', 'Melihat Jadwal Guru'),
(137, 'Admin 1 xyz', '22:33:01', '2022-06-04', 'Melihat Jadwal Guru'),
(138, 'Admin 1 xyz', '22:41:13', '2022-06-04', 'Melihat Jadwal Guru'),
(139, 'Admin 1 xyz', '22:44:44', '2022-06-04', 'Melihat Jadwal Guru'),
(140, 'Admin 1 xyz', '22:45:20', '2022-06-04', 'Melihat Jadwal Guru'),
(141, 'Admin 1 xyz', '22:45:55', '2022-06-04', 'Melihat Jadwal Guru'),
(142, 'Admin 1 xyz', '22:46:30', '2022-06-04', 'Melihat Jadwal Guru'),
(143, 'Admin 1 xyz', '22:51:08', '2022-06-04', 'Melihat Jadwal Guru'),
(144, 'Admin 1 xyz', '22:54:55', '2022-06-04', 'Melihat Data Guru '),
(145, 'Admin 1 xyz', '22:55:03', '2022-06-04', 'Melihat Jadwal Guru'),
(146, 'Admin 1 xyz', '22:55:10', '2022-06-04', 'Melihat Jadwal Guru'),
(148, 'Admin 1 xyz', '23:06:45', '2022-06-04', 'Melihat Jadwal Guru'),
(150, 'Admin 1 xyz', '23:07:01', '2022-06-04', 'Melihat Jadwal Guru'),
(151, 'Admin 1 xyz', '23:07:49', '2022-06-04', 'Melihat Jadwal Guru'),
(153, 'Admin 1 xyz', '23:08:04', '2022-06-04', 'Melihat Jadwal Guru'),
(154, 'Admin 1 xyz', '02:31:31', '2022-06-05', 'Melihat Jadwal Guru'),
(156, 'Admin 1 xyz', '02:32:16', '2022-06-05', 'Melihat Jadwal Guru'),
(157, 'Admin 1 xyz', '02:51:52', '2022-06-05', 'Melihat Data User'),
(158, 'Admin 1 xyz', '02:52:18', '2022-06-05', 'Mengubah data user '),
(159, 'Admin 1 xyz', '02:52:19', '2022-06-05', 'Melihat Data User'),
(160, 'Admin 1 xyz', '02:52:33', '2022-06-05', 'Melihat Data Guru '),
(161, 'Admin 1 xyz', '02:53:10', '2022-06-05', 'Mengubah data user '),
(162, 'Admin 1 xyz', '02:53:10', '2022-06-05', 'Melihat Data Guru '),
(163, 'Admin 1 xyz', '02:54:03', '2022-06-05', 'Melihat Data Guru '),
(164, 'Admin 1 xyz', '02:55:08', '2022-06-05', 'Melihat Data Guru '),
(165, 'Admin 1 xyz', '02:55:15', '2022-06-05', 'Melihat Data Guru '),
(166, 'Admin 1 xyz', '02:55:36', '2022-06-05', 'Melihat Data Guru '),
(167, 'Admin 1 xyz', '02:55:46', '2022-06-05', 'Melihat Data Guru '),
(168, 'Admin 1 xyz', '02:55:56', '2022-06-05', 'Melihat Jadwal Guru'),
(169, 'YAD', '00:36:04', '2022-06-11', 'Mengganti kode pertemuan'),
(170, 'YAD', '00:43:26', '2022-06-11', 'Mengganti kode pertemuan'),
(171, 'Admin 1 xyz', '00:14:06', '2022-06-12', 'Melihat Jadwal Guru'),
(172, '', '00:15:27', '2022-06-12', 'Mengubah jadwal guru '),
(173, 'Admin 1 xyz', '00:15:27', '2022-06-12', 'Melihat Jadwal Guru'),
(174, 'Admin 1 xyz', '00:24:40', '2022-06-12', 'Melihat Data User'),
(175, 'Admin 1 xyz', '00:24:43', '2022-06-12', 'Melihat Data User'),
(176, 'Admin 1 xyz', '00:24:45', '2022-06-12', 'Melihat Data Guru '),
(177, 'Admin 1 xyz', '00:24:52', '2022-06-12', 'Melihat Data Siswa '),
(178, 'Admin 1 xyz', '00:26:00', '2022-06-12', 'Melihat Data Siswa '),
(179, 'Admin 1 xyz', '00:26:09', '2022-06-12', 'Melihat Jadwal Guru');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `kode_mapel` char(11) NOT NULL,
  `pelajaran` varchar(50) NOT NULL,
  `jam_mulai` time NOT NULL,
  `batas_absen` time DEFAULT NULL,
  `jam_selesai` time NOT NULL,
  `sysuser_id` int(11) NOT NULL,
  `hari_id` int(11) NOT NULL,
  `kelas` char(20) NOT NULL,
  `jurusan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `kode_mapel`, `pelajaran`, `jam_mulai`, `batas_absen`, `jam_selesai`, `sysuser_id`, `hari_id`, `kelas`, `jurusan`) VALUES
(0, '00007', 'Komputer', '09:10:00', '09:15:00', '11:00:00', 6, 3, '3', ''),
(1, '00001', 'Bahasa Inggris I', '09:04:15', '09:14:58', '10:27:00', 9, 3, '1', ''),
(2, '00002', 'Matematika', '10:06:30', NULL, '11:45:59', 19, 4, '1', ''),
(3, '00003', 'Sejarah', '11:02:00', '11:16:55', '12:11:00', 12, 2, '1', 'IPS'),
(4, '00004', 'Kewarganegaraan', '10:05:00', NULL, '11:00:00', 3, 6, '1', ''),
(5, '00006', 'Bahasa Indonesia', '08:35:00', '08:35:00', '09:31:00', 4, 2, '1', ''),
(6, '00007', 'Komputer', '12:05:00', '12:15:00', '13:14:00', 6, 6, '2', ''),
(7, '00005', 'Agama', '07:25:00', '07:35:00', '09:00:00', 11, 6, '1', ''),
(8, '00008', 'Sosiologi', '08:25:00', '08:35:00', '10:05:00', 13, 1, '1', 'IPS'),
(9, '00008', 'Sosiologi', '10:25:00', '10:35:00', '12:05:00', 13, 6, '1', 'IPS'),
(10, '00002', 'Matematika', '07:25:00', '07:35:00', '08:45:00', 19, 3, '1', ''),
(11, '00003', 'Sejarah', '10:05:00', '10:15:00', '11:25:00', 12, 4, '1', 'IPS'),
(12, '00001', 'Bahasa Inggris I', '09:55:00', '11:05:00', '12:10:00', 9, 1, '1', ''),
(13, '00009', 'Geografi', '07:25:00', '07:35:00', '08:25:00', 14, 2, '1', 'IPS'),
(14, '00001', 'Bahasa Inggris II', '21:34:00', '21:48:58', '22:35:22', 9, 6, '2', ''),
(15, '00002', 'Matematika', '10:06:30', NULL, '11:45:59', 19, 6, '2', ''),
(16, '00003', 'Sejarah', '21:31:00', '21:50:55', '22:16:00', 12, 1, '2', 'IPS'),
(17, '00004', 'Kewarganegaraan', '10:05:00', NULL, '11:00:00', 3, 5, '2', ''),
(18, '00006', 'Bahasa Indonesia', '07:25:00', '07:35:00', '09:00:00', 4, 3, '3', ''),
(20, '00005', 'Agama', '07:25:00', '07:35:00', '09:00:00', 11, 4, '2', ''),
(21, '00008', 'Sosiologi', '08:25:00', '08:35:00', '10:05:00', 13, 1, '2', 'IPS'),
(22, '00008', 'Sosiologi', '10:25:00', '10:35:00', '12:05:00', 13, 3, '2', 'IPS'),
(23, '00002', 'Matematika', '07:25:00', '07:35:00', '08:45:00', 19, 4, '2', ''),
(24, '00003', 'Sejarah', '10:05:00', '10:15:00', '11:25:00', 12, 3, '2', 'IPS'),
(25, '00001', 'Bahasa Inggris II', '09:55:00', '11:05:00', '12:10:00', 9, 4, '2', ''),
(26, '00009', 'Geografi', '08:25:00', '08:35:00', '09:00:00', 14, 2, '2', 'IPS'),
(27, '00001', 'Komputer', '21:34:00', '21:48:58', '22:35:22', 6, 5, '1', ''),
(28, '00004', 'Kewarganegaraan', '10:10:00', '10:20:00', '11:05:00', 3, 2, '1', ''),
(29, '00010', 'Kimia', '08:26:00', '08:35:00', '10:05:00', 8, 1, '1', 'IPA'),
(30, '00011', 'Fisika', '10:25:00', '10:35:00', '12:05:00', 15, 6, '1', 'IPA'),
(31, '00012', 'Biologi', '10:05:00', '10:15:00', '11:25:00', 21, 3, '1', 'IPA'),
(32, '00010', 'Kimia', '08:25:00', '08:35:00', '10:05:00', 8, 2, '2', 'IPA'),
(33, '00011', 'Fisika', '10:25:00', '10:35:00', '12:05:00', 15, 2, '2', 'IPA'),
(34, '00012', 'Biologi', '10:05:00', '10:15:00', '11:25:00', 21, 2, '2', 'IPA'),
(35, '00009', 'Geografi', '08:25:00', '08:35:00', '09:00:00', 14, 4, '1', 'IPS'),
(36, '00006', 'Bahasa Indonesia', '07:25:00', '07:35:00', '09:00:00', 4, 4, '1', ''),
(37, '00006', 'Bahasa Indonesia', '07:25:00', '07:35:00', '09:00:00', 4, 5, '2', ''),
(38, '00005', 'Agama', '09:25:00', '10:35:00', '11:30:00', 11, 3, '3', ''),
(39, '00006', 'Bahasa Indonesia', '07:55:00', '08:05:00', '09:10:00', 4, 1, '3', ''),
(40, '00001', 'Bahasa Inggris III', '09:55:00', '11:05:00', '12:10:00', 9, 5, '3', ''),
(41, '00001', 'Bahasa Inggris III', '09:55:00', '11:05:00', '12:10:00', 9, 2, '3', ''),
(42, '00011', 'Fisika', '11:25:00', '11:35:00', '11:05:00', 15, 1, '3', 'IPA'),
(43, '00011', 'Fisika', '08:25:00', '08:35:00', '10:05:00', 15, 3, '3', 'IPA'),
(44, '00009', 'Geografi', '10:25:00', '10:35:00', '11:25:00', 14, 1, '3', 'IPS'),
(45, '00009', 'Geografi', '08:25:00', '08:35:00', '09:00:00', 14, 4, '3', 'IPS'),
(46, '00009', 'Geografi', '07:25:00', '07:35:00', '08:40:00', 14, 6, '2', 'IPS'),
(47, '00012', 'Biologi', '07:10:00', '07:25:00', '09:00:00', 21, 5, '1', 'IPA'),
(48, '00012', 'Biologi', '10:05:00', '10:15:00', '11:25:00', 21, 4, '3', 'IPA'),
(49, '00004', 'Kewarganegaraan', '10:05:00', '10:35:00', '11:00:00', 3, 4, '3', ''),
(50, '00004', 'Kewarganegaraan', '08:56:00', '09:10:00', '10:15:00', 3, 6, '3', ''),
(51, '00006', 'Bahasa Indonesia', '07:25:00', '07:35:00', '09:00:00', 4, 1, '2', ''),
(52, '00012', 'Biologi', '10:05:00', '10:15:00', '11:25:00', 21, 1, '2', 'IPA'),
(53, '00012', 'Biologi', '08:05:00', '08:15:00', '09:25:00', 21, 6, '3', 'IPA'),
(54, '00010', 'Kimia', '08:25:00', '08:35:00', '10:05:00', 8, 2, '3', 'IPA'),
(55, '00010', 'Kimia', '08:25:00', '08:35:00', '10:05:00', 8, 5, '1', 'IPA'),
(56, '00010', 'Kimia', '08:25:00', '08:35:00', '10:05:00', 8, 5, '2', 'IPA'),
(57, '00010', 'Kimia', '08:25:00', '08:35:00', '10:05:00', 8, 4, '3', 'IPA'),
(58, '00008', 'Sosiologi', '10:25:00', '10:35:00', '12:05:00', 13, 2, '3', 'IPS'),
(59, '00008', 'Sosiologi', '10:25:00', '10:35:00', '12:05:00', 13, 6, '3', 'IPS'),
(60, '00002', 'Matematika', '07:25:00', '07:35:00', '08:45:00', 19, 2, '3', ''),
(61, '00002', 'Matematika', '07:25:00', '07:35:00', '08:45:00', 19, 5, '3', ''),
(62, '00004', 'Kewarganegaraan', '10:05:00', '10:35:00', '11:00:00', 3, 3, '1', ''),
(63, '00013', 'Penjaskes', '07:05:00', '07:15:00', '08:25:00', 10, 3, '1', ''),
(64, '00013', 'Penjaskes', '07:05:00', '07:15:00', '08:30:00', 10, 2, '2', ''),
(65, '00013', 'Penjaskes', '07:05:00', '07:15:00', '08:30:00', 10, 4, '3', ''),
(66, '00014', 'Seni Budaya', '10:25:00', '10:35:00', '11:30:00', 16, 2, '1', ''),
(67, '00014', 'Seni Budaya', '10:25:00', '10:35:00', '11:30:00', 16, 3, '2', ''),
(68, '00014', 'Seni Budaya', '10:25:00', '10:35:00', '11:30:00', 16, 5, '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `kode` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `nis` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `jenis_kel` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(56) NOT NULL,
  `password` varchar(160) NOT NULL,
  `status` int(11) NOT NULL,
  `gambar` varchar(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `no_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`kode`, `nama`, `nis`, `kelas`, `jurusan`, `jenis_kel`, `tempat_lahir`, `tgl_lahir`, `alamat`, `email`, `username`, `password`, `status`, `gambar`, `tgl_dibuat`, `no_absen`) VALUES
(2, 'Yusuf ad', 11012256, 3, 'IPS', 'Laki-laki', 'Jakarta', '2008-05-10', '', 'aryaherby@gmail.com', '', '$2y$10$330CgzZ4I9.SBJC8fEVXPe2AQdwlct57m62Xcj.0O9ZNlSPB7xPD2', 1, 'default.png', '1970-01-01', 2),
(3, 'nanananaa', 10020502, 1, 'IPS', 'Perempuan', 'Jakarta', '2004-02-10', '', 'nana@gmail.com', '', '$2y$10$gY2eK0wep0Xd.1ncRTW8gOoe5qLC1TdugSSNNDt3Leu70gj2pzIK.', 1, 'default.png', '1970-01-01', 3),
(4, 'Melisa ar', 10234049, 1, 'IPA', 'Perempuan', 'Tangerang', '2013-12-09', '', 'mel@gmail.com', '', '$2y$10$cV4TpK0MmRcHtwLCGSh00OCMwGrYroLRoNT.k3Ix5Vu9Dg02PTx1y', 1, 'default.jpg', '1970-01-01', 4),
(5, 'qwerty uiop', 12012153, 1, 'IPS', 'Laki-laki', 'Jakarta', '2007-10-16', 'Jl. Sudirmat', 'qwerty@gmail.com', '', '$2y$10$oSMLp7/Q.KNncHvf0dgMA.oiqgVSSUMXnFpsGcSZaFwZlH6TgHami', 1, 'default.jpg', '1970-01-01', 5),
(6, 'Abc xyz', 10024512, 1, 'IPA', 'Perempuan', '', '2007-01-05', '', 'abc@gmail.com', '', '$2y$10$CK6uIzLgyL27P7bczuV48uhuHs5mp122ScQOtD8P2exN0./58XDB.', 1, 'default.jpg', '1970-01-01', 6),
(8, 'Nirvana kurt cobain', 11040302, 3, 'IPA', 'Laki-laki', 'Tangerang', '2008-06-18', 'Kuningan city', 'nirvana@gmail.com', '', '$2y$10$mkeHQkqAJlbP02CjZsB4XOHRHHtAu1iOvSMnVxHSsL/2K1HTyj.R2', 1, 'default.jpg', '1970-01-01', 8),
(9, 'Arya herbie', 12020502, 3, 'IPA', 'Laki-laki', '', '2008-05-10', '', 'arya@gmail.com', '', '$2y$10$H3kkX98rZeKuMBtrdTJ9EOhpd/duQrU92D0S409GK87OCbJlhKZR2', 0, 'default.jpg', '1970-01-01', 9),
(10, 'Abcccc', 10018256, 1, 'IPS', 'Laki-laki', 'Tangerang Banten', '2008-07-17', '', 'abccc@gmail.com', '', '$2y$10$jifwGrxlmTN7eklVC.0I9.aiYiCwEOjeWXggLJazJ1NuaFitS379W', 1, 'default.jpg', '1970-01-01', 10),
(11, 'Yusuf Mahardika', 12012256, 3, 'IPA', 'Laki-laki', '', '2007-12-02', '', 'ym@gmail.com', '', '$2y$10$zYMafb8dAwgQkSL6dy5UXOhfdV51BzCQTbLrl708X2oWiFjGPUeZG', 0, 'default.jpg', '2022-05-15', 11),
(12, 'Ahmad abiyu', 10120902, 1, 'IPS', 'Laki-laki', '', '2008-05-17', '', 'ahma@gmail.com', '', '$2y$10$kUY16/tg/usuyoY0QJLg6u.G9pLm5.rPM79tmW.iZcx7NT917mPcK', 1, 'default.jpg', '2022-05-15', 12),
(13, 'Dea annisa', 11102256, 2, 'IPA', 'Perempuan', 'Jakarta', '2008-11-16', '', 'deaan@gmail.com', '', '$2y$10$kfDwH45NKXRQYQq5biLvpOvPKbFZ1zUOc6hmWQb/7ah5qrwY3amBO', 1, 'default.jpg', '2022-05-16', 1),
(14, 'Dani muhamad', 12212150, 3, 'IPS', 'Laki-laki', '', '2009-05-03', '', 'dani@gmail.com', '', '$2y$10$XD4IYsSyZGW.x1gAI7uSju2.Zqvgn4ThP.vjowQXo3O2mz2pWfAYK', 0, 'default.jpg', '2022-05-16', 26),
(15, 'Rina', 12185432, 3, 'IPA', 'Perempuan', 'Tangerang, Banten', '2007-04-15', 'Jl. Raya Mauk KM 12', 'rina@gmail.com', '', '$2y$10$XD4IYsSyZGW.x1gAI7uSju2.Zqvgn4ThP.vjowQXo3O2mz2pWfAYK', 1, 'default.png', '2022-05-16', 13),
(16, 'Lana', 10175432, 1, 'IPS', 'Laki-laki', 'Tangerang, Banten', '2007-05-15', '', 'lana@gmail.com', '', '$2y$10$XD4IYsSyZGW.x1gAI7uSju2.Zqvgn4ThP.vjowQXo3O2mz2pWfAYK', 1, 'default.png', '2022-05-16', 14),
(17, 'Bahari', 11085433, 2, 'IPA', 'Laki-laki', 'Tangerang', '2007-04-05', '', 'bahari@gmail.com', '', '', 1, 'default.png', '2022-05-16', 15),
(18, 'Puspa', 11185431, 2, 'IPA', 'Perempuan', 'Jakarta', '2008-05-11', 'Kp. Bekelir', 'puspa@gmail.com', 'puspa', '$2y$10$XD4IYsSyZGW.x1gAI7uSju2.Zqvgn4ThP.vjowQXo3O2mz2pWfAYK', 1, 'default.png', '2022-05-16', 21),
(19, 'Nani Tania', 11185434, 2, 'IPA', 'Perempuan', 'Depok', '2008-05-21', 'Kp. Asam dan garam', 'nani@gmail.com', 'puspa', '$2y$10$XD4IYsSyZGW.x1gAI7uSju2.Zqvgn4ThP.vjowQXo3O2mz2pWfAYK', 1, 'default.png', '2022-05-16', 22),
(20, 'Puspus', 11185432, 2, 'IPS', 'Perempuan', 'Jakarta', '2008-05-11', 'Kp. Bekelir', 'puspus@gmail.com', 'puspus', '$2y$10$XD4IYsSyZGW.x1gAI7uSju2.Zqvgn4ThP.vjowQXo3O2mz2pWfAYK', 1, 'default.png', '2022-05-16', 23),
(21, 'Abdul dedi', 10912153, 1, 'IPA', 'Laki-laki', 'Jakarta', '2007-09-21', '', 'abdul_d@gmail.com', '', '$2y$10$TE2b66244f2To1oZFN7i5.wR2Pq8QIQDUG85pt0VQ1sgTiVQRHKCi', 1, 'default.jpg', '2022-05-20', 24),
(22, 'Tiara An', 11012143, 1, 'IPA', 'Perempuan', 'Jakarta', '2007-02-20', '', 'tiaraan@gmail.com', 'titia', '$2y$10$dWbHLGgjdGBY5ZB1uL1B/efWHuPyWElel.0AxEy1UecvtFfYa6.Pq', 1, 'default.jpg', '2022-05-21', 25),
(23, 'Aisyahkilla', 11023153, 2, 'IPA', 'Perempuan', '', '2007-05-11', '', 'aisyah@gmail.com', '', '$2y$10$3mraLaDJxIAvZz8iFOfRr.CWFHH6u9Q46WWL3GPcMyjdwSPP6yo.O', 1, 'default.jpg', '2022-05-25', 19),
(24, 'Reni Hafizah', 11023154, 2, 'IPS', 'Perempuan', 'Jakarta', '2007-02-28', 'Jl. Merdeka no 12', 'reni@gmail.com', '', '$2y$10$Ezu.KyRaNTH0UIC5m7NBlejvb/OfOyuA1YRFHGuKA1jEJIGDsjr2y', 1, 'default.jpg', '2022-05-25', 20),
(25, 'Chairunnisa', 11023155, 2, 'IPA', 'Perempuan', 'Tangerang', '2007-01-25', 'Tangerang selatan', 'chairunnisa@gmail.com', '', '$2y$10$DQ/ITh6/pSEafd0BTCQQ7uqcZn1DlQllVQx4gtlOwjO6E0amYXt.W', 1, 'default.jpg', '2022-05-25', 28),
(26, 'Muhamad iik', 11023156, 2, 'IPS', 'Laki-laki', 'Jakarta', '2007-09-25', '', 'imiik@gmail.com', '', '$2y$10$6Y59yCmfEkXl.ZsOCVfiIuD5n38KS60nqjzyaxWpAhdcUm3rnXmF6', 1, 'default.jpg', '2022-05-25', 27),
(27, 'Lina Saraswati', 11023157, 2, 'IPS', 'Perempuan', 'Tangerang Banten', '2007-11-02', '', 'lina@gmail.com', '', '$2y$10$wGvXP4LqzdiyQcHyOXwvt.abt5HOAdPeaanQASkKeS09TPjI3Mg1y', 1, 'default.jpg', '2022-05-25', 16),
(28, 'Bambang Yudistira', 11023158, 2, 'IPA', 'Laki-laki', 'Jakarta', '2007-02-22', '', 'bb@gmail.com', '', '$2y$10$AiQfc.Ms1QC9udkrdUl1fOpsGCe3jDyc0ZtDLsAJzBq.5cc4M1RYG', 1, 'default.jpg', '2022-05-25', 17),
(29, 'Deni Dendes', 11023159, 2, 'IPA', 'Laki-laki', 'Jakarta, Indonesia', '2007-02-12', '', 'dd@gmail.com', '', '$2y$10$O26ua6lIf0FSuLRaWTTCbuEgDGtc4lL368fssH6mouj2fvhbVnCfq', 1, 'default.jpg', '2022-05-25', 18),
(30, 'Farah Ayusita', 10123160, 1, 'IPS', 'Perempuan', 'Tangerang', '2008-04-20', '', 'farah@gmail.com', '', '$2y$10$35rSe0vBXdz6w6NQ.5iUMu2tBWdkelvr0HWMrXvroT9yJcaLvwp1.', 1, 'default.jpg', '2022-05-25', 7),
(31, 'Erna lalajo erna', 12012166, 3, 'IPS', 'Perempuan', 'Jakarta', '2007-05-20', 'Jl. Sudirman Blok M no 34 Jakarta Selatan', 'erna@gmail.com', '', '$2y$10$J6x.rsdcOP/sBiuUbyMQGOfPlwd9LR5mUGvuHezJYBbnPaQjniPlO', 1, 'default.jpg', '2022-05-28', 29);

-- --------------------------------------------------------

--
-- Table structure for table `sysuser`
--

CREATE TABLE `sysuser` (
  `kode` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kel` varchar(50) NOT NULL,
  `tempat_lahir` varchar(55) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nip` varchar(90) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(160) NOT NULL,
  `level_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sysuser`
--

INSERT INTO `sysuser` (`kode`, `nama`, `jenis_kel`, `tempat_lahir`, `tgl_lahir`, `nip`, `alamat`, `email`, `password`, `level_id`, `status`, `gambar`, `tgl_dibuat`) VALUES
(1, 'Admin 1 xyz', 'Perempuan', '', '1998-06-22', '0032C1121A1030', '', 'admin1@gmail.com', '$2y$10$RS8lrlBMKCc3unWRvZ50Auyx5NCKUG.r3PnHsFV7YKLWrr3jPvrCy', 1, 1, 'default.jpg', '1970-01-01'),
(3, 'Dr. Xyz', 'Laki-laki', 'Jakarta, Indonesia', '1992-04-08', '1212012', 'Los Angles', 'guru1@gmail.com', '$2y$10$ZDHU.wgHnLwfQOTcIU1m2.V48dv1KP2wyS9TZLiU3/f8mONabNH9m', 3, 1, 'default.jpg', '1970-05-21'),
(4, 'Zahra Sp.d', 'Perempuan', 'Tangerang', '1995-02-07', '032C11121A103', 'Jagorawi', 'zahra03@gmail.com', '$2y$10$ZDHU.wgHnLwfQOTcIU1m2.V48dv1KP2wyS9TZLiU3/f8mONabNH9m', 3, 1, '	 default.jpg', '1970-01-15'),
(5, 'Administrator', 'Perempuan', 'Tangerang', '1996-09-11', 'C11121A103', 'Kab. Tangerang', 'admin@gmail.com', '$2y$10$t7lFcwcAsUqp3WBZPyc4vuKiqrXlz0JK2ZH6Xr0Gslc8auMkl6hTm', 1, 1, '	 default.jpg', '1970-09-02'),
(6, 'Guru Komputer', 'Laki-laki', 'Jakarta', '1995-02-15', '23905902153234', 'Tangerang Selatan', 'komputer@gmail.com', '$2y$10$RAdOCXinv32zuKZg5Ls6KucYwqOTDQHhl9R0dSbJfi5W4CexCsmkG', 3, 1, 'default.png', '2022-04-14'),
(7, 'Staff 1', 'Laki-laki', '', '0000-00-00', '00S2C1121A1030', '', 'staff_01@gmail.com', '$2y$10$1/3fZKxUo8DJdnlB6yAQXOscMe5aH3HQ6pnC3LHodGehtoSJlQNI6', 2, 1, 'default.jpg', '1970-01-01'),
(8, 'Liaa', 'Perempuan', 'Tangerang Banten', '1997-07-04', '0L1432C11121A103', 'Jl. Kisamaun', 'liabarokah004@gmail.com', '$2y$10$RAdOCXinv32zuKZg5Ls6KucYwqOTDQHhl9R0dSbJfi5W4CexCsmkG', 3, 1, 'default.jpg', '1970-01-01'),
(9, 'YAD', 'Laki-laki', 'Jakarta', '1995-12-04', '0Y32C1121A1030', '', 'yusufaryadilla29@gmail.com', '$2y$10$w5fELVaRwXJwnIvSBMqKquiPcmt0qbvWbHsODXo23hy6Az6FpUmj2', 3, 1, 'default.jpg', '1970-01-01'),
(10, 'Guru Olahraga', 'Laki-laki', '', NULL, '0132C1121A1030', '', 'guruolahraga@gmail.com', '$2y$10$P/QUultySC75sVH4EY.f0OCZiHYn7DnTMYvR09pmrIJWMzWi08EVe', 3, 1, 'default.jpg', '1970-01-01'),
(11, 'Guru Agama', 'Laki-laki', 'Tangerang', '1993-04-07', '29109021322', 'Kp. Abcdefg', 'agama@gmail.com', '$2y$10$RAdOCXinv32zuKZg5Ls6KucYwqOTDQHhl9R0dSbJfi5W4CexCsmkG', 3, 1, 'default.png', '2022-04-16'),
(12, 'Guru Sejarah', 'Perempuan', 'Jakarta', NULL, '1002SJ93029901', 'Kp.Sejarah', 'sejarah@gmail.com', '$2y$10$RAdOCXinv32zuKZg5Ls6KucYwqOTDQHhl9R0dSbJfi5W4CexCsmkG', 3, 1, 'default.png', '2022-04-16'),
(13, 'Guru Sosiologi', 'Perempuan', 'Bandung', '1995-04-06', '20950293482093', 'Jl. Raya mauk km 12', 'sosiologi@gmail.com', '$2y$10$RAdOCXinv32zuKZg5Ls6KucYwqOTDQHhl9R0dSbJfi5W4CexCsmkG', 3, 1, 'default.png', '2022-04-17'),
(14, 'Guru Geografi', 'Perempuan', 'Tangerang', '1993-02-15', '32456878G09856', '', 'geo@gmail.com', '$2y$10$RAdOCXinv32zuKZg5Ls6KucYwqOTDQHhl9R0dSbJfi5W4CexCsmkG', 3, 1, 'default.png', '2022-04-26'),
(15, 'Guru Fisika', 'Laki-laki', 'Tangerang, Banten', '1993-02-15', '00456878G098110', '', 'fisika@gmail.com', '$2y$10$RAdOCXinv32zuKZg5Ls6KucYwqOTDQHhl9R0dSbJfi5W4CexCsmkG', 3, 1, 'default.png', '2022-05-11'),
(16, 'Endang Sri', 'Perempuan', 'Tangerang', '1993-05-13', '', '', 'sbk@gmail.com', '', 3, 1, 'default.png', '2022-05-11'),
(17, 'Coab', 'Laki-laki', '', NULL, '0CC32C11121A103', '', 'coab@gmail.com', '$2y$10$g26UyBxYYESY1b3DVNLQJOOR3b0jDp60oTMuhshhcpDuMmmaO8xB6', 2, 1, 'default.jpg', '1970-01-01'),
(18, 'Novi via', 'Perempuan', '', NULL, '0N22C11121A103', '', 'novi@gmail.com', '$2y$10$UoMJdh0UA9MBs0XUTMx3bOrimVHRVgnYYT2vMzOVhixhr66l0jobW', 2, 1, 'default.jpg', '1970-01-01'),
(19, 'Dadang tatang', 'Laki-laki', '', NULL, '0008912182345', '', 'dadang@gmail.com', '$2y$10$QQN9H9zSabRGnjJl6/kfH.BaSCfgnSpXdC651YDtKL4fBcE/6x6BO', 3, 1, 'default.jpg', '1970-01-01'),
(20, 'dfsfsdfs', 'Laki-laki', '', NULL, 'sifjisoj', '', 'yusuf@gmail.com', '$2y$10$Kp0Em.RkpzwaSRNOnSOy9ePIXFKVPh1KIGE5zp9T7PgTR0Ncks8/S', 3, 1, 'default.jpg', '2022-05-15'),
(21, 'Pak Bio', 'Laki-laki', 'Jakarta', '1993-05-15', '02B1012165451', '', 'bio@gmail.com', '$2y$10$Kp0Em.RkpzwaSRNOnSOy9ePIXFKVPh1KIGE5zp9T7PgTR0Ncks8/S', 3, 1, 'default.jpg', '2022-05-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kd_minggu`
--
ALTER TABLE `kd_minggu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehadiran`
--
ALTER TABLE `kehadiran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `sysuser`
--
ALTER TABLE `sysuser`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kd_minggu`
--
ALTER TABLE `kd_minggu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kehadiran`
--
ALTER TABLE `kehadiran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `sysuser`
--
ALTER TABLE `sysuser`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
