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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `t_comment_list` */

insert  into `t_comment_list`(`id_comment_list`,`id_job_list`,`id_user`,`isi_comment`,`waktu_comment`) values (1,4,1,'Coba dikit komen','2014-06-21 08:58:20'),(2,4,1,'awdawd','2014-06-21 10:43:28'),(3,4,2,'Hello','2014-06-21 10:55:57'),(8,4,1,'Coba dong di coba coba biar enak ayo di coba','2014-06-21 08:54:37'),(7,4,1,'coba woy','2014-06-21 08:49:14'),(9,3,1,'yang ini juga enakan di cobain','2014-06-21 08:55:05'),(10,3,1,'','2014-06-21 08:57:07'),(11,3,1,'validasinya belum ada\r\npke capcay anti spam','2014-06-21 04:45:04'),(12,4,2,'Halo semuanya','2014-06-21 05:53:48'),(13,4,1,'0','2014-06-23 12:18:57'),(14,4,1,'dawdawd','2014-06-23 12:20:19');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `t_job_list` */

insert  into `t_job_list`(`id_job_list`,`id_job_sheet`,`head`,`body`,`file_perusahaan`,`status`) values (4,6,'Dibuat enak lagi','Pengen dienakin','file/TKELAS.xlsx','Finished'),(3,6,'Enakin aja','Diusahakan enak',NULL,'Unclaimed'),(5,12,'Coba lagi','Isinya apa ya bingung',NULL,'Finished');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `t_job_sheet` */

insert  into `t_job_sheet`(`id_job_sheet`,`id_perusahaan`,`nama_job_sheet`,`deskripsi_job_sheet`,`id_jurusan`,`tanggal_posting`,`tanggal_akhir`,`status`,`durasi`) values (12,1,'Bikin anak tetangga','Ahh gitu kan',1,'2014-06-21 01:15:55','2014-06-22 01:15:58','Finished',13),(13,7,'awdawdawdawdwdad','Deskripsi Job Sheet',0,'2014-06-23 11:12:04',NULL,'Unclaimed',1),(6,1,'Bikin Lemper Panjang','Deskripsi Job Sheet Deskripsi Job Sheet  Deskripsi Job Sheet',5,'2014-06-17 04:21:01','2014-06-27 16:40:12','Hidden',1),(10,1,'Bikin enak anak orang','Buka dikit josss',3,'2014-06-20 20:16:02','2014-06-20 20:16:08','Ongoing',12),(11,1,'Bikin enak istri orang','Wedew masbrow',4,'2014-06-21 01:14:26','2014-06-22 01:14:30','Unclaimed',16);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `t_job_sheet_application` */

insert  into `t_job_sheet_application`(`id_job_sheet_application`,`id_job_sheet`,`id_student`,`application_file`,`waktu_daftar`,`status`,`comment`) values (7,6,1,'files/student/1/3-EVALUASI_KEAMANAN_SISTEM_INFORMASI_1.pdf','2014-06-25 13:58:49','0',' awdaw'),(8,6,1,'files/student/1/4-MENGAMANKAN_SISTEM_INFORMASI_1.pdf','2014-06-25 14:31:50','0','0'),(9,6,1,'files/student/1/4-MENGAMANKAN_SISTEM_INFORMASI_2.pdf','2014-06-25 14:33:01','0','0'),(10,6,1,'files/student/1/3-EVALUASI_KEAMANAN_SISTEM_INFORMASI_2.pdf','2014-06-25 14:37:55','0','0'),(11,3,1,'awdawd','2014-06-30 16:38:00','0','awdad');

/*Table structure for table `t_jurusan` */

DROP TABLE IF EXISTS `t_jurusan`;

CREATE TABLE `t_jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `t_jurusan` */

insert  into `t_jurusan`(`id_jurusan`,`nama`) values (1,'Teknik Informatika'),(2,'Manajemen Informatika'),(3,'Akutansi'),(4,'Desain Komunikasi Visual'),(5,'Teknik Komputer'),(6,'Teknik Elektro'),(7,'Teknik Industri'),(8,'Matematika'),(9,'Fisika'),(10,'Ilmu Pemerintahan'),(11,'Komunikasi'),(12,'Psikologi'),(13,'Kedokteran'),(14,'Hukum'),(16,'cobabca');

/*Table structure for table `t_kota` */

DROP TABLE IF EXISTS `t_kota`;

CREATE TABLE `t_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `t_kota` */

insert  into `t_kota`(`id_kota`,`id_provinsi`,`nama`) values (1,1,'Bandung'),(2,1,'Cimohay'),(3,2,'Serang'),(4,3,'Semarang'),(5,2,'Tangerang'),(6,2,'Cilegon'),(7,0,'COba'),(8,4,'Bar');

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
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `t_message` */

insert  into `t_message`(`id_message`,`id_user_pengirim`,`id_user_penerima`,`head`,`body`,`url`,`tanggal`,`status`) values (14,1,2,NULL,'awdawdawd',NULL,'2014-06-30 15:01:14','1');

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
  `id_user` int(11) NOT NULL,
  `disiplin` int(11) DEFAULT NULL,
  `tanggap` int(11) DEFAULT NULL,
  `cermat` int(11) DEFAULT NULL,
  `rajin` int(11) DEFAULT NULL,
  `komunikasi` int(11) DEFAULT NULL,
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
  `id_kota` int(11) DEFAULT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `id_user` int(11) NOT NULL,
  `website` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_perusahaan`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `t_perusahaan` */

insert  into `t_perusahaan`(`id_perusahaan`,`nama`,`alamat`,`id_kota`,`kode_pos`,`telepon`,`id_user`,`website`) values (1,'Perusahaan WOy','asd',1,'14045','080989999',1,NULL),(6,'Perusahaan B','asdasdasdsad',2,'140455','080989999',6,NULL),(5,'Perusahaan B','asdasdasdsad',3,'140455','080989999',5,NULL),(7,'awad','awdaw',1,'123122','123123123',3,NULL);

/*Table structure for table `t_provinsi` */

DROP TABLE IF EXISTS `t_provinsi`;

CREATE TABLE `t_provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_provinsi`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `t_provinsi` */

insert  into `t_provinsi`(`id_provinsi`,`nama`) values (1,'Jawa Barat'),(2,'Banten'),(3,'Jawa Tengah'),(4,'Jawa Timur');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `t_student` */

insert  into `t_student`(`id_student`,`id_universitas`,`nim`,`id_jurusan`,`nama`,`alamat`,`id_kota`,`kode_pos`,`telepon`,`email`,`id_user`) values (1,1,'10111078',1,'Handoyo','Sekeloa Utara',1,'42112','087871942562','dyo.9913@gmail.com',1),(2,2,'1231233',7,'Cinta','Cimahi',2,'42311','0823123323','cinta@gmail.com',2);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `t_student_job_list` */

insert  into `t_student_job_list`(`id_student_job_list`,`id_job_list`,`id_student`,`file_user`,`waktu_upload_file`,`keterangan`) values (1,3,1,'files/student/1/1-PENDAHULUAN.pdf','2014-06-25 14:41:44',NULL),(4,4,1,NULL,'2014-06-21 10:31:03',NULL),(5,5,2,NULL,NULL,NULL),(6,4,2,NULL,'2014-06-21 05:54:03',NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `t_student_job_sheet` */

insert  into `t_student_job_sheet`(`id_student_job_sheet`,`id_job_sheet`,`id_student`,`waktu_start`,`waktu_akhir`,`status`,`keterangan`) values (1,6,1,'2014-06-20 16:44:01','2014-06-21 16:44:04','1',NULL),(2,10,1,'2014-06-20 20:16:52','2014-06-20 20:16:55','1',NULL),(3,11,1,'2014-06-21 01:16:38','2014-06-22 01:16:41','1',NULL),(4,12,2,'2014-06-21 01:16:50','2014-06-21 01:16:53','1',NULL),(5,6,2,'2014-05-02 00:53:13','2014-06-08 00:53:18','1',NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `t_universitas` */

insert  into `t_universitas`(`id_universitas`,`nama`,`alamat`,`id_kota`,`kode_pos`,`telepon`,`website`) values (1,'UNIKOM','Dipatiukur No 204-209',1,'42112','0223223321','http://unikom.ac.id'),(2,'UNPAD','Dipatiukur',1,'42123','0221231233','http://unpad.ac.id'),(3,'UPH','Karawaci',5,'42032','0213212331','http://uph.ac.id'),(10,'awdawd','0',1,'12312','12312','awdawd');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `t_user` */

insert  into `t_user`(`id_user`,`email`,`password`,`foto_user`,`status_user`,`tanggal_masuk`,`last_login`) values (1,'dyo.9913@gmail.com','57ba172a6be125cca2f449826f9980ca','','STUDENT','2014-06-19 05:01:36','2014-06-30 08:29:59'),(2,'cinta@gmail.com','57ba172a6be125cca2f449826f9980ca','images/student/2/bb.jpg','STUDENT','2014-06-19 07:07:36','2014-06-30 15:01:24'),(3,'waw@dad.com','57ba172a6be125cca2f449826f9980ca',NULL,'COMPANY','2014-06-23 11:03:59',NULL),(4,'admin@gmail.com','57ba172a6be125cca2f449826f9980ca',NULL,'ADMIN','2014-06-28 06:40:11','2014-06-30 13:19:27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
