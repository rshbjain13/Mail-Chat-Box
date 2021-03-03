/*
SQLyog Community Edition- MySQL GUI v5.22a
Host - 5.0.19-nt : Database - dbemailing
*********************************************************************
Server version : 5.0.19-nt
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

create database if not exists `dbemailing`;

USE `dbemailing`;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*Table structure for table `admin_login` */

DROP TABLE IF EXISTS `admin_login`;

CREATE TABLE `admin_login` (
  `id` bigint(20) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(25) default NULL,
  `name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `admin_login` */

insert  into `admin_login`(`id`,`username`,`password`,`name`) values (1,'admin','admin','Administration'),(2,'kamal','kamal','Kamal Kant');

/*Table structure for table `complain` */

DROP TABLE IF EXISTS `complain`;

CREATE TABLE `complain` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) default NULL,
  `name` varchar(100) default NULL,
  `email` varchar(100) default NULL,
  `phone` varchar(100) default NULL,
  `des` varchar(500) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `complain` */

insert  into `complain`(`id`,`user_id`,`name`,`email`,`phone`,`des`) values (1,1,'kamal','umesh@gmail.com','abusing language','sllskdjflskjdflaskjdflsdkjf');

/*Table structure for table `contacts` */

DROP TABLE IF EXISTS `contacts`;

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` bigint(20) default NULL,
  `name` varchar(100) default NULL,
  `email` varchar(100) default NULL,
  `phone` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `contacts` */

insert  into `contacts`(`id`,`user_id`,`name`,`email`,`phone`) values (2,2,'Shreesh Mishra','shreesh@yahoo.com','97778787878'),(3,2,'Priyaka Gupta','priyanka@gmail.com','9778787878'),(7,1,'Prity Kumari','prity@gmail.com','9889897908'),(8,2,'kamal kant','kant975@gmail.com','9555821757'),(9,2,'Raju Singh','raju12@gmail.com','9898676767'),(10,3,'umesh','umesh@gmail.com','9876543212'),(11,3,'Prity Kumari','prity@gmail.com','78987898'),(12,3,'kamal kant','kant975@gmail.com','78987898'),(13,1,'kamal kant','kant975@gmail.com','78987898'),(14,1,'umesh','umesh@gmail.com','78987898');

/*Table structure for table `mailbox` */

DROP TABLE IF EXISTS `mailbox`;

CREATE TABLE `mailbox` (
  `msg_id` bigint(20) NOT NULL auto_increment,
  `email_from` varchar(100) default NULL,
  `email_to` varchar(100) default NULL,
  `email_cc` varchar(100) default NULL,
  `subject` varchar(255) default NULL,
  `message` varchar(800) default NULL,
  `attachement` varchar(200) default NULL,
  `type` varchar(100) default NULL,
  `msg_date` date default NULL,
  `sent_status` smallint(6) default '1',
  `inbox_status` smallint(6) default '1',
  PRIMARY KEY  (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mailbox` */

insert  into `mailbox`(`msg_id`,`email_from`,`email_to`,`email_cc`,`subject`,`message`,`attachement`,`type`,`msg_date`,`sent_status`,`inbox_status`) values (1,'prity@gmail.com','kant975@gmail.com','','Message only','hi, how are u.','','sent','2012-04-28',1,1),(2,'prity@gmail.com','kant975@gmail.com','','File Send','hi,\r\nPFA','attachement_f2012094508.jpg','draft','2012-04-28',1,1),(3,'prity@gmail.com','kant975@gmail.com','','Hi how','hi how are you','','sent','2012-04-28',1,1),(4,'kant975@gmail.com','prity@gmail.com','','Reply','hi.........','','sent','2012-04-28',1,1),(5,'kant975@gmail.com','prity@gmail.com','','Message only','hello ..........','','draft','2012-04-28',1,1);

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `msg_id` bigint(20) NOT NULL auto_increment,
  `sender_id` bigint(20) default NULL,
  `sname` varchar(100) default NULL,
  `receiver_id` bigint(20) default NULL,
  `message` varchar(200) default NULL,
  `date` date default NULL,
  PRIMARY KEY  (`msg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `message` */

insert  into `message`(`msg_id`,`sender_id`,`sname`,`receiver_id`,`message`,`date`) values (1,2,'Prity Kumari',1,'hi','2012-04-28'),(2,1,'kamal kant',2,'hello','2012-04-28'),(3,1,'kamal kant',2,'hi\r\n','2020-04-03'),(4,2,'Prity Kumari',1,'how rr yyy','2020-04-03'),(5,1,'kamal kant',2,'hello\r\n','2020-04-14'),(6,3,'umesh',1,'hello','2020-04-14'),(7,1,'kamal kant',3,'bye','2020-04-14');

/*Table structure for table `regestration` */

DROP TABLE IF EXISTS `regestration`;

CREATE TABLE `regestration` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `dob` varchar(100) default NULL,
  `gender` varchar(100) default NULL,
  `phone` varchar(100) default NULL,
  `address` varchar(500) default NULL,
  `contact_as` varchar(100) default NULL,
  `email` varchar(100) default 'na',
  `password` varchar(100) default NULL,
  `img_path` varchar(255) default 'default.png',
  `status` smallint(6) default '3',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `regestration` */

insert  into `regestration`(`id`,`name`,`dob`,`gender`,`phone`,`address`,`contact_as`,`email`,`password`,`img_path`,`status`) values (1,'kamal kant',NULL,'Male','78987898',NULL,NULL,'kant975@gmail.com','admin','profile_f2012080829.jpg',3),(2,'Prity Kumari',NULL,'Female','9898902301',NULL,NULL,'prity@gmail.com','prity','default.png',4),(3,'umesh',NULL,'Male','9876543212',NULL,NULL,'umesh@gmail.com','1234','default.png',3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
