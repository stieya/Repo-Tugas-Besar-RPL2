-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2014 at 04:47 AM
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_job_list`
--

INSERT INTO `t_job_list` (`id_job_list`, `id_job_sheet`, `head`, `body`, `file_perusahaan`, `status`) VALUES
(1, 3, 'Beli Bahan', 'Daun Pisang \r\nDaun Pepaya\r\nDaun Jeruk\r\nDan Dedaunan Lainnya', NULL, 'Unclaimed'),
(2, 3, 'Masak Bahan', 'Memasak Bahan-Bahan Yang Diperlukan', NULL, 'Finished');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `t_job_sheet`
--

INSERT INTO `t_job_sheet` (`id_job_sheet`, `id_perusahaan`, `nama_job_sheet`, `deskripsi_job_sheet`, `id_jurusan`, `tanggal_posting`, `tanggal_akhir`, `status`, `durasi`) VALUES
(3, 1, 'Bikin Lemper Panjannnnnnnnng', 'Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet', 3, '2014-06-17 03:59:54', NULL, 'Ongoing', 1),
(5, 1, 'Bikin Lemper Panjannnnnnnnng 3', 'Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet Deskripsi Job Sheet', 4, '2014-06-17 04:02:45', NULL, 'Finished', 1),
(6, 1, 'Bikin Lemper Panjannnnnnnnng', 'Deskripsi Job Sheet Deskripsi Job Sheet  Deskripsi Job Sheet', 5, '2014-06-17 04:21:01', NULL, 'Hidden', 1),
(9, 1, 'Bikin Enak Istri Orang', 'Deskripsi Job Sheet', 12, '2014-06-17 15:23:07', NULL, 'Unclaimed', 1),
(8, 1, 'Bikin Enak Tetangga', 'Deskripsi Job Sheet', 0, '2014-06-17 13:07:54', NULL, 'Unclaimed', 1);

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `id_student_job_sheet` int(11) DEFAULT NULL,
  `nama_penilaian` varchar(50) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_perusahaan`
--

INSERT INTO `t_perusahaan` (`id_perusahaan`, `nama`, `alamat`, `id_kota`, `kode_pos`, `telepon`, `id_user`, `website`) VALUES
(1, 'ismail zakky', 'asd', NULL, '14045', '080989999', 1, NULL),
(6, 'Perusahaan B', 'asdasdasdsad', NULL, '140455', '080989999', 6, NULL),
(5, 'Perusahaan B', 'asdasdasdsad', NULL, '140455', '080989999', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_provinsi`
--

CREATE TABLE IF NOT EXISTS `t_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `email`, `password`, `foto_user`, `status_user`, `tanggal_masuk`, `last_login`) VALUES
(1, 'ismailzakky@yahoo.com', '464899eb40f5da004c283b854a76146f', NULL, 'COMPANY', '2014-06-16 15:13:32', NULL),
(6, 'ismailzakky2@yahoo.com', '24de4b0074f620f824a8f24de7747eb8', NULL, 'COMPANY', '2014-06-17 06:12:25', NULL),
(5, 'ismailzakky@gmail.com', '24de4b0074f620f824a8f24de7747eb8', NULL, 'COMPANY', '2014-06-17 04:19:34', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
