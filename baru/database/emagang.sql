/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.24-log : Database - emagang
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `t_comment_list` */

/*Table structure for table `t_job_list` */

DROP TABLE IF EXISTS `t_job_list`;

CREATE TABLE `t_job_list` (
  `id_job_list` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `head` varchar(100) DEFAULT NULL,
  `body` text,
  `file_perusahaan` varchar(100) DEFAULT NULL,
  `status` enum('Finished','Unclaimed') DEFAULT NULL,
  PRIMARY KEY (`id_job_list`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `t_job_list` */

/*Table structure for table `t_job_sheet` */

DROP TABLE IF EXISTS `t_job_sheet`;

CREATE TABLE `t_job_sheet` (
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `t_job_sheet` */

/*Table structure for table `t_job_sheet_application` */

DROP TABLE IF EXISTS `t_job_sheet_application`;

CREATE TABLE `t_job_sheet_application` (
  `id_job_sheet_application` int(11) NOT NULL AUTO_INCREMENT,
  `id_job_sheet` int(11) DEFAULT NULL,
  `id_student` int(11) DEFAULT NULL,
  `application_file` varchar(150) DEFAULT NULL,
  `waktu_daftar` datetime DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_job_sheet_application`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `t_job_sheet_application` */

/*Table structure for table `t_jurusan` */

DROP TABLE IF EXISTS `t_jurusan`;

CREATE TABLE `t_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `t_jurusan` */

insert  into `t_jurusan`(`id_jurusan`,`nama`) values (17,'Psikologi'),(16,'Teknik Informatika');

/*Table structure for table `t_kota` */

DROP TABLE IF EXISTS `t_kota`;

CREATE TABLE `t_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_kota` */

insert  into `t_kota`(`id_kota`,`id_provinsi`,`nama`) values (1,1,'Bandung'),(2,1,'Cimohay');

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
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `t_notification` */

/*Table structure for table `t_penilaian` */

DROP TABLE IF EXISTS `t_penilaian`;

CREATE TABLE `t_penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `disiplin` int(50) NOT NULL,
  `tanggap` int(11) NOT NULL,
  `cermat` int(11) NOT NULL,
  `rajin` int(11) NOT NULL,
  `komunikasi` int(11) NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `t_penilaian` */

/*Table structure for table `t_perusahaan` */

DROP TABLE IF EXISTS `t_perusahaan`;

CREATE TABLE `t_perusahaan` (
  `id_perusahaan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_kota` int(11) DEFAULT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `id_user` int(11) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  `about` text,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `t_perusahaan` */

/*Table structure for table `t_provinsi` */

DROP TABLE IF EXISTS `t_provinsi`;

CREATE TABLE `t_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_provinsi` */

insert  into `t_provinsi`(`id_provinsi`,`nama`) values (1,'Jawa Barat');

/*Table structure for table `t_student` */

DROP TABLE IF EXISTS `t_student`;

CREATE TABLE `t_student` (
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `t_universitas` */

insert  into `t_universitas`(`id_universitas`,`nama`,`alamat`,`id_kota`,`kode_pos`,`telepon`,`website`) values (1,'Unikom','Dipatiukur\r\n',1,'14045','123213','wewewewew');

/*Table structure for table `t_user` */

DROP TABLE IF EXISTS `t_user`;

CREATE TABLE `t_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_user` varchar(150) DEFAULT NULL,
  `status_user` enum('COMPANY','STUDENT','ADMIN') DEFAULT NULL,
  `tanggal_masuk` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

/* Trigger structure for table `t_job_sheet_application` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `tri_notif_company_pelamaran_jobsheet` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `tri_notif_company_pelamaran_jobsheet` BEFORE INSERT ON `t_job_sheet_application` FOR EACH ROW insert into t_notification(id_user, head, body, tanggal, status)
values (
(select tu.id_user from t_job_sheet tjs join t_job_sheet_application tjsa on (tjs.id_job_sheet = tjsa.id_job_sheet) 	join t_perusahaan tp on (tp.id_perusahaan = tjs.id_perusahaan) join t_user tu on (tu.id_user = tp.id_user) order by 	tjsa.id_job_sheet_application desc limit 1), 
concat('Pelamaran masuk untuk job sheet ', (select nama_job_sheet from t_job_sheet tjs join t_job_sheet_application tjsa on (tjsa.id_job_sheet = tjs.id_job_sheet) 	where tjs.id_job_sheet = new.id_job_sheet order by id_job_sheet_application desc limit 1)), 
concat(concat('Pelamaran masuk untuk job sheet ', (select 	nama_job_sheet from t_job_sheet tjs join t_job_sheet_application tjsa on (tjsa.id_job_sheet = tjs.id_job_sheet) where 	tjs.id_job_sheet = new.id_job_sheet order by id_job_sheet_application desc limit 1)), concat(' dari student bernama ', (select 	ts.nama from t_job_sheet_application tjsa join t_student ts on (ts.id_student = tjsa.id_student) where tjsa.id_job_sheet = 	new.id_job_sheet order by id_job_sheet_application desc limit 1))), 
current_timestamp, 
0) */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
