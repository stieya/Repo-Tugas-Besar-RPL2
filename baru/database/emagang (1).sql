-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2014 at 01:50 AM
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
  `status` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_job_list`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_job_sheet`
--

CREATE TABLE IF NOT EXISTS `t_job_sheet` (
  `id_job_sheet` int(11) NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(11) DEFAULT NULL,
  `nama_job_sheet` varchar(100) DEFAULT NULL,
  `deskripsi_job_sheet` text,
  `tanggal_posting` datetime DEFAULT NULL,
  `tanggal_akhir` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_job_sheet`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_job_sheet_application`
--

CREATE TABLE IF NOT EXISTS `t_job_sheet_application` (
  `id_job_sheet_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `waktu_daftar` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_job_sheet_application`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_perusahaan`
--

INSERT INTO `t_perusahaan` (`id_perusahaan`, `nama`, `alamat`, `id_kota`, `kode_pos`, `telepon`, `id_user`, `website`) VALUES
(1, 'ismail zakky', 'asd', NULL, '14045', '080989999', 1, NULL);

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
  `jurusan` varchar(25) DEFAULT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id_user`, `email`, `password`, `foto_user`, `status_user`, `tanggal_masuk`, `last_login`) VALUES
(1, 'ismailzakky@yahoo.com', '464899eb40f5da004c283b854a76146f', NULL, 'COMPANY', '2014-06-16 15:13:32', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
