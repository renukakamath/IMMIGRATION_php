/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - immigration
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`immigration` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `immigration`;

/*Table structure for table `caught` */

DROP TABLE IF EXISTS `caught`;

CREATE TABLE `caught` (
  `caught_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `criminal_id` int(11) DEFAULT NULL,
  `officer_id` int(11) DEFAULT NULL,
  `police_id` int(11) DEFAULT NULL,
  `datetime` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`caught_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `caught` */

insert  into `caught`(`caught_id`,`user_id`,`criminal_id`,`officer_id`,`police_id`,`datetime`,`status`) values 
(1,1,1,1,1,'2022-08-05 14:15:42','caught');

/*Table structure for table `crimes` */

DROP TABLE IF EXISTS `crimes`;

CREATE TABLE `crimes` (
  `crime_id` int(11) NOT NULL AUTO_INCREMENT,
  `police_id` int(11) DEFAULT NULL,
  `crime_name` varchar(30) DEFAULT NULL,
  `description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`crime_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `crimes` */

insert  into `crimes`(`crime_id`,`police_id`,`crime_name`,`description`) values 
(1,1,'dfdsgdw','description');

/*Table structure for table `criminals` */

DROP TABLE IF EXISTS `criminals`;

CREATE TABLE `criminals` (
  `criminal_id` int(11) NOT NULL AUTO_INCREMENT,
  `crime_id` int(11) DEFAULT NULL,
  `passport_no` varchar(30) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `age` varchar(30) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`criminal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `criminals` */

insert  into `criminals`(`criminal_id`,`crime_id`,`passport_no`,`first_name`,`last_name`,`gender`,`age`,`photo`) values 
(1,1,'12345678','criminals','qwerty','male','20','image/image_62ecd7a3a6708.jpg');

/*Table structure for table `immigrationofficer` */

DROP TABLE IF EXISTS `immigrationofficer`;

CREATE TABLE `immigrationofficer` (
  `officer_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`officer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `immigrationofficer` */

insert  into `immigrationofficer`(`officer_id`,`log_id`,`first_name`,`last_name`,`phone`,`email`) values 
(1,2,'officerr','officerr','1234567891','officerr@gmail.com');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`log_id`,`username`,`password`,`type`) values 
(1,'admin','admin','admin'),
(2,'officer','officer','officer'),
(3,'renuka','renuka','officer'),
(4,'police','police','police'),
(5,'renuka','1234','police'),
(6,'user','user','user'),
(7,'user1','user1','user');

/*Table structure for table `message` */

DROP TABLE IF EXISTS `message`;

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `police_id` int(11) DEFAULT NULL,
  `officer_id` int(11) DEFAULT NULL,
  `message` varchar(30) DEFAULT NULL,
  `datetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `message` */

insert  into `message`(`message_id`,`police_id`,`officer_id`,`message`,`datetime`) values 
(1,1,1,'hiii','2022-08-09 12:43:07');

/*Table structure for table `police` */

DROP TABLE IF EXISTS `police`;

CREATE TABLE `police` (
  `police_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`police_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `police` */

insert  into `police`(`police_id`,`log_id`,`first_name`,`last_name`,`phone`,`email`) values 
(1,4,'policee','qwertye','1234567890','police@gmail.com');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `photo` varchar(1000) DEFAULT NULL,
  `place` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `travelling_from` varchar(30) DEFAULT NULL,
  `travelling_to` varchar(30) DEFAULT NULL,
  `luggage_weight` varchar(30) DEFAULT NULL,
  `flight_name` varchar(30) DEFAULT NULL,
  `flight_no` varchar(30) DEFAULT NULL,
  `passport_no` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`user_id`,`log_id`,`first_name`,`last_name`,`address`,`photo`,`place`,`phone`,`email`,`travelling_from`,`travelling_to`,`luggage_weight`,`flight_name`,`flight_no`,`passport_no`) values 
(1,6,'user','qwerty','address','image/image_62ecd845a1632.jpg','ernakulam','1234567890','user@gmail.com','ekm','tvm','10kg',' American Eagle','CP1','12345678'),
(2,7,'user1','userrr','address','image/image_62ecd88597d16.jpg','kerala','5432545123','user1@gamil.com','dfghj','tvm','10kg','flight name.......','Ap5','144');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
