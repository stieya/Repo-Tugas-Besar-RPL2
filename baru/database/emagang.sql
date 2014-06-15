/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.1.72-community : Database - emagang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`emagang` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `emagang`;

/*Table structure for table `t_comment_list` */

DROP TABLE IF EXISTS `t_comment_list`;

CREATE TABLE `t_comment_list` (
  `id_comment_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_list` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi_comment` varchar(100) DEFAULT NULL,
  `waktu_comment` datetime DEFAULT NULL,
  PRIMARY KEY (`id_comment_list`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_comment_list` */

/*Table structure for table `t_job_list` */

DROP TABLE IF EXISTS `t_job_list`;

CREATE TABLE `t_job_list` (
  `id_job_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `body` text,
  `file_perusahaan` varchar(100) DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_job_list`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_job_list` */

/*Table structure for table `t_job_sheet` */

DROP TABLE IF EXISTS `t_job_sheet`;

CREATE TABLE `t_job_sheet` (
  `id_job_sheet` int(11) NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(11) DEFAULT NULL,
  `nama_job_sheet` varchar(100) DEFAULT NULL,
  `deskripsi_job_sheet` text,
  `tanggal_posting` datetime DEFAULT NULL,
  `tanggal_akhir` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `durasi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_job_sheet`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_job_sheet` */

/*Table structure for table `t_job_sheet_application` */

DROP TABLE IF EXISTS `t_job_sheet_application`;

CREATE TABLE `t_job_sheet_application` (
  `id_job_sheet_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `waktu_daftar` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_job_sheet_application`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_job_sheet_application` */

/*Table structure for table `t_kota` */

DROP TABLE IF EXISTS `t_kota`;

CREATE TABLE `t_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_kota` */

/*Table structure for table `t_message` */

DROP TABLE IF EXISTS `t_message`;

CREATE TABLE `t_message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_pengirim` int(11) DEFAULT NULL,
  `id_user_penerima` int(11) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `body` text,
  `url` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_message`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_message` */

/*Table structure for table `t_notification` */

DROP TABLE IF EXISTS `t_notification`;

CREATE TABLE `t_notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `body` text,
  `url` varchar(100) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id_notification`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_notification` */

/*Table structure for table `t_penilaian` */

DROP TABLE IF EXISTS `t_penilaian`;

CREATE TABLE `t_penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `id_student_job_sheet` int(11) DEFAULT NULL,
  `nama_penilaian` varchar(50) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_penilaian` */

/*Table structure for table `t_perusahaan` */

DROP TABLE IF EXISTS `t_perusahaan`;

CREATE TABLE `t_perusahaan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `website` varchar(50) NOT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_perusahaan` */

/*Table structure for table `t_provinsi` */

DROP TABLE IF EXISTS `t_provinsi`;

CREATE TABLE `t_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_provinsi` */

/*Table structure for table `t_student` */

DROP TABLE IF EXISTS `t_student`;

CREATE TABLE `t_student` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_student` */

/*Table structure for table `t_student_job_list` */

DROP TABLE IF EXISTS `t_student_job_list`;

CREATE TABLE `t_student_job_list` (
  `id_student_job_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_list` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `file_user` varchar(100) DEFAULT NULL,
  `waktu_upload_file` datetime DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_student_job_list`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_student_job_list` */

/*Table structure for table `t_student_job_sheet` */

DROP TABLE IF EXISTS `t_student_job_sheet`;

CREATE TABLE `t_student_job_sheet` (
  `id_student_job_sheet` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `waktu_start` datetime DEFAULT NULL,
  `waktu_akhir` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_student_job_sheet`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_student_job_sheet` */

/*Table structure for table `t_universitas` */

DROP TABLE IF EXISTS `t_universitas`;

CREATE TABLE `t_universitas` (
  `id_universitas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `id_kota` int(11) DEFAULT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_universitas`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_universitas` */

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `status_user` enum('1','0') DEFAULT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
