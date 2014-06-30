-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2014 at 07:53 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emagang`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_comment_list`
--

CREATE TABLE IF NOT EXISTS `t_comment_list` (
  `id_comment_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_list` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi_comment` varchar(100) DEFAULT NULL,
  `waktu_comment` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comment_list`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `t_comment_list`
--

INSERT INTO `t_comment_list` (`id_comment_list`, `id_job_list`, `id_user`, `isi_comment`, `waktu_comment`) VALUES
(7, 15, 1, 'zakky ganteng 23', NULL),
(6, 15, 1, 'zakky ganteng 2', NULL),
(5, 15, 1, 'zakky ganteng', NULL),
(8, 15, 1, 'zakky ganteng 24', NULL),
(9, 15, 8, 'emangggggg', NULL),
(10, 15, 1, 'masaa?', NULL),
(11, 19, 1, 'kerjain sekarang ,, dasarrrrrrrrrrrr males', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_job_list`
--

CREATE TABLE IF NOT EXISTS `t_job_list` (
  `id_job_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `body` text,
  `file_perusahaan` varchar(100) DEFAULT NULL,
  `status` enum('Finished','Unclaimed') DEFAULT NULL,
  PRIMARY KEY (`id_job_list`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `t_job_list`
--

INSERT INTO `t_job_list` (`id_job_list`, `id_job_sheet`, `head`, `body`, `file_perusahaan`, `status`) VALUES
(19, 9, 'adasdasdsad', 'Zakky GantengZakky GantengZakky GantengZakky GantengZakky Ganteng', 'apotek_helper.rar', 'Finished'),
(16, 14, 'asdasdasdasd', 'Deskripsi Job Sheet asdasd', '11_-_Aplikasi_Teknologi_Online_-_Session_dan_Aplikasinya.pdf', 'Finished'),
(15, 14, 'Latih Kesabaranasd', 'Silahkan Dilatihhhh', 'Circumstances_Leading_to_Waltrautes_Marriage,_The_-_Kamachi_Kazuma.zip', 'Finished'),
(20, 9, 'Tessssssssssss', 'Tessssssssssssssssss', '11_-_Aplikasi_Teknologi_Online_-_Session_dan_Aplikasinya.pdf', 'Finished');

-- --------------------------------------------------------

--
-- Table structure for table `t_job_sheet`
--

CREATE TABLE IF NOT EXISTS `t_job_sheet` (
  `id_job_sheet` int(11) NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(11) NOT NULL,
  `nama_job_sheet` varchar(100) NOT NULL,
  `deskripsi_job_sheet` text NOT NULL,
  `id_jurusan` int(11) DEFAULT NULL,
  `tanggal_posting` datetime NOT NULL,
  `tanggal_akhir` datetime DEFAULT NULL,
  `status` enum('Ongoing','Finished','Unclaimed','Hidden') NOT NULL,
  `durasi` int(11) NOT NULL,
  PRIMARY KEY (`id_job_sheet`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `t_job_sheet`
--

INSERT INTO `t_job_sheet` (`id_job_sheet`, `id_perusahaan`, `nama_job_sheet`, `deskripsi_job_sheet`, `id_jurusan`, `tanggal_posting`, `tanggal_akhir`, `status`, `durasi`) VALUES
(18, 8, 'asdasdasdasdasd', 'Deskripsi Job Sheet asdasdasdasd', 0, '2014-06-23 14:43:05', NULL, 'Unclaimed', 1),
(19, 1, 'Tugas Tekom 2', 'Deskripsi Job Sheet', 0, '2014-06-26 08:26:17', NULL, 'Unclaimed', 1),
(6, 1, 'Bikin Lemper Panjannnnnnnnng', 'Deskripsi Job Sheet Deskripsi Job Sheet  Deskripsi Job Sheet', 5, '2014-06-17 04:21:01', NULL, 'Hidden', 1),
(9, 1, 'Bikin Enak Istri Orang', 'Jangan Lupa Pake Pengaman', 12, '2014-06-17 15:23:07', NULL, 'Finished', 1),
(14, 1, 'Kerjain Tugas RPL', 'Tugasnya Ribet Dosen Jarang Masuk', 0, '2014-06-18 13:44:51', NULL, 'Finished', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_job_sheet_application`
--

CREATE TABLE IF NOT EXISTS `t_job_sheet_application` (
  `id_job_sheet_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `application_file` varchar(150) DEFAULT NULL,
  `waktu_daftar` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_job_sheet_application`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_job_sheet_application`
--

INSERT INTO `t_job_sheet_application` (`id_job_sheet_application`, `id_job_sheet`, `id_student`, `application_file`, `waktu_daftar`, `status`, `comment`) VALUES
(1, 9, 2, NULL, '2014-06-21 18:50:33', '1', 'asdasdasdasdasdasdasdasdasd'),
(2, 14, 2, NULL, '2014-06-21 18:50:33', '1', 'asdasdsadasdasds');

-- --------------------------------------------------------

--
-- Table structure for table `t_jurusan`
--

CREATE TABLE IF NOT EXISTS `t_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `t_jurusan`
--

INSERT INTO `t_jurusan` (`id_jurusan`, `nama`) VALUES
(1, 'Teknik Informatika'),
(2, 'Manajemen Informatika'),
(3, 'Akutansi'),
(4, 'Desain Komunikasi Visual'),
(5, 'Teknik Komputer'),
(6, 'Teknik Elektro'),
(7, 'Teknik Industri'),
(8, 'Matematika'),
(9, 'Fisika'),
(10, 'Ilmu Pemerintahan'),
(11, 'Komunikasi'),
(12, 'Psikologi'),
(13, 'Kedokteran'),
(14, 'Hukum');

-- --------------------------------------------------------

--
-- Table structure for table `t_kota`
--

CREATE TABLE IF NOT EXISTS `t_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_kota`
--

INSERT INTO `t_kota` (`id_kota`, `id_provinsi`, `nama`) VALUES
(1, 1, 'Bandung'),
(2, 1, 'Cimohay');

-- --------------------------------------------------------

--
-- Table structure for table `t_message`
--

CREATE TABLE IF NOT EXISTS `t_message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_pengirim` int(11) DEFAULT NULL,
  `id_user_penerima` int(11) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `body` text,
  `url` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `t_message`
--

INSERT INTO `t_message` (`id_message`, `id_user_pengirim`, `id_user_penerima`, `head`, `body`, `url`, `tanggal`, `status`) VALUES
(1, 8, 1, 'Test', 'Zakky Ganteng Bangetasdasd', NULL, '2014-06-26 20:10:09', '0'),
(2, 8, 1, 'testt', 'asdasdsadasdasdsad', NULL, '2014-06-26 20:11:52', '0'),
(3, 7, 1, 'test123', 'sasdasdasdasd\r\n		', NULL, '2014-06-26 20:19:16', '0'),
(4, 7, 1, 'tessssst', '231231231231231231', NULL, '2014-06-26 20:21:25', '0'),
(5, 7, 1, 'test1234', 'sdasdsadasdasdas\r\n', NULL, '2014-06-26 20:19:36', '0'),
(6, 1, 8, 'tesssst', 'asdasdasdasdasd', NULL, '2014-06-26 20:48:49', '0'),
(7, 1, 8, NULL, 'asdasdasdasd', NULL, NULL, NULL),
(8, 1, 8, NULL, 'ribet ewe', NULL, NULL, NULL),
(9, 1, 8, NULL, 'enakkkk', NULL, NULL, NULL),
(10, 1, 8, NULL, 'enakkkk', NULL, NULL, NULL),
(11, 1, 8, NULL, 'buaya darat', NULL, NULL, NULL),
(12, 1, 7, NULL, 'setan', NULL, NULL, NULL),
(13, 1, 7, NULL, 'ewe enak', NULL, NULL, NULL),
(14, 7, 1, NULL, 'sdasasdasdasdasdasdasd', NULL, '2014-06-28 07:32:31', NULL),
(18, 1, 11, NULL, 'terusss?', NULL, NULL, NULL),
(17, 11, 1, NULL, 'gw ganteng loh bang', NULL, '2014-06-28 08:25:19', '0'),
(19, 1, 7, NULL, 'buuuuu', NULL, NULL, NULL),
(20, 1, 7, NULL, 'mkmkmk', NULL, NULL, NULL),
(21, 1, 7, NULL, 'mkmkmk', NULL, NULL, NULL),
(22, 1, 7, NULL, 'asd', NULL, NULL, NULL),
(23, 1, 7, NULL, 'asd', NULL, NULL, NULL),
(24, 1, 7, NULL, 'asd', NULL, NULL, NULL),
(25, 1, 7, NULL, 'asdasd', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_notification`
--

CREATE TABLE IF NOT EXISTS `t_notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `body` text,
  `url` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_notification`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_penilaian`
--

CREATE TABLE IF NOT EXISTS `t_penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `disiplin` int(50) NOT NULL,
  `tanggap` int(11) NOT NULL,
  `cermat` int(11) NOT NULL,
  `rajin` int(11) NOT NULL,
  `komunikasi` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_penilaian`
--

INSERT INTO `t_penilaian` (`id_penilaian`, `id_user`, `disiplin`, `tanggap`, `cermat`, `rajin`, `komunikasi`, `keterangan`) VALUES
(5, 7, 100, 100, 100, 100, 100, NULL),
(6, 8, 100, 100, 100, 100, 100, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_perusahaan`
--

CREATE TABLE IF NOT EXISTS `t_perusahaan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `id_user` int(11) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t_perusahaan`
--

INSERT INTO `t_perusahaan` (`id_perusahaan`, `nama`, `alamat`, `id_kota`, `kode_pos`, `telepon`, `id_user`, `website`) VALUES
(1, 'Zakky Ganteng Banget Loh', 'jalan tol no 6 hahaha', 1, '14045', '080989999', 1, 'ismailzakky.com'),
(6, 'Perusahaan B', 'asdasdasdsad', 2, '140455', '080989999', 6, NULL),
(5, 'Perusahaan B', 'asdasdasdsad', NULL, '140455', '080989999', 5, NULL),
(7, 'Andrew Corp', 'asdasdasd', 1, '140455', '02154201145', 9, NULL),
(8, 'Andrew Corp', 'asdasdasd asdasdasd', 1, '14045', '02154201145', 10, 'ismailzakky.com');

-- --------------------------------------------------------

--
-- Table structure for table `t_provinsi`
--

CREATE TABLE IF NOT EXISTS `t_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_provinsi`
--

INSERT INTO `t_provinsi` (`id_provinsi`, `nama`) VALUES
(1, 'Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `t_student`
--

CREATE TABLE IF NOT EXISTS `t_student` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `id_universitas` int(11) DEFAULT NULL,
  `nim` varchar(12) DEFAULT NULL,
  `id_jurusan` int(25) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `id_kota` int(11) DEFAULT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_student`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_student`
--

INSERT INTO `t_student` (`id_student`, `id_universitas`, `nim`, `id_jurusan`, `nama`, `alamat`, `id_kota`, `kode_pos`, `telepon`, `email`, `id_user`) VALUES
(1, 1, '10111099', 1, 'Ismail Zakky', 'sdasasdasdasdasda', 1, '14045', '54201145', 'ismailzakky3@yahoo.com', 7),
(2, 1, '10111100', 1, 'Handoyo', 'sdasdsadasdasdasdasd\r\n\r\n', 1, '14045', '54201145', 'handoyo4@yahoo.com', 8),
(3, 1, '10111101', 1, 'Ewe Enak', 'sdasdasdasdasdsaasdas', 1, '14045', '54201145', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `t_student_job_list`
--

CREATE TABLE IF NOT EXISTS `t_student_job_list` (
  `id_student_job_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_list` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `file_user` varchar(100) DEFAULT NULL,
  `waktu_upload_file` datetime DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_student_job_list`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_student_job_sheet`
--

CREATE TABLE IF NOT EXISTS `t_student_job_sheet` (
  `id_student_job_sheet` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `waktu_start` datetime DEFAULT NULL,
  `waktu_akhir` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_student_job_sheet`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `t_student_job_sheet`
--

INSERT INTO `t_student_job_sheet` (`id_student_job_sheet`, `id_job_sheet`, `id_student`, `waktu_start`, `waktu_akhir`, `status`, `keterangan`) VALUES
(1, 9, 1, NULL, NULL, '1', NULL),
(5, 14, 2, '2014-06-24 11:10:05', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_universitas`
--

CREATE TABLE IF NOT EXISTS `t_universitas` (
  `id_universitas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `id_kota` int(11) DEFAULT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_universitas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `t_universitas`
--

INSERT INTO `t_universitas` (`id_universitas`, `nama`, `alamat`, `id_kota`, `kode_pos`, `telepon`, `website`) VALUES
(1, 'Unikom', 'Dipatiukur\r\n', 1, '14045', '123213', 'wewewewew');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE IF NOT EXISTS `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_user` varchar(150) DEFAULT NULL,
  `status_user` enum('COMPANY','STUDENT','ADMIN') DEFAULT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `unique` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `email`, `password`, `foto_user`, `status_user`, `tanggal_masuk`, `last_login`) VALUES
(1, 'ismailzakky@yahoo.com', '464899eb40f5da004c283b854a76146f', '455116.jpg', 'COMPANY', '2014-06-16 15:13:32', NULL),
(6, 'ismailzakky2@yahoo.com', '24de4b0074f620f824a8f24de7747eb8', NULL, 'COMPANY', '2014-06-17 06:12:25', NULL),
(5, 'ismailzakky@gmail.com', '24de4b0074f620f824a8f24de7747eb8', NULL, 'COMPANY', '2014-06-17 04:19:34', NULL),
(9, 'andrew@yahoo.com', '24de4b0074f620f824a8f24de7747eb8', NULL, 'COMPANY', '2014-06-23 14:31:10', NULL),
(7, 'ismailzakky3@yahoo.com', '464899eb40f5da004c283b854a76146f', NULL, 'STUDENT', '2014-06-21 18:50:33', NULL),
(8, 'handoyo4@yahoo.com', '24de4b0074f620f824a8f24de7747eb8', NULL, 'STUDENT', '2014-06-21 18:50:33', NULL),
(10, 'andrew2@yahoo.com', '24de4b0074f620f824a8f24de7747eb8', '479699.png', 'COMPANY', '2014-06-23 14:33:51', NULL),
(11, 'enak@yahoo.com', '24de4b0074f620f824a8f24de7747eb8', NULL, 'STUDENT', '2014-06-23 14:33:51', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
