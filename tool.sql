/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.10-MariaDB : Database - fb_marketing
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fb_marketing` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fb_marketing`;

/*Table structure for table `post_shares` */

DROP TABLE IF EXISTS `post_shares`;

CREATE TABLE `post_shares` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` text,
  `link` text,
  `target_link` text,
  `fake_view` text,
  `button` text,
  `photo_url` text,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `post_shares` */

insert  into `post_shares`(`id`,`title`,`link`,`target_link`,`fake_view`,`button`,`photo_url`,`modified`) values (1,'OMG!','http://yt2fb.com/can-puppies-fix-boredom-powerofpuppies-2/','http://vps-hosting-service.info/vps-hosting/index.php?id=45','20.000.356 VIEWS','WATCH_VIDEO','http://www.funnfun.in/wp-content/uploads/2013/06/baby-joke-funny-600x329.jpg','2016-04-06 23:20:52'),(2,'ô vui quá xá','https://www.youtube.com/watch?v=RQ4Ml00cwgg','http://google.com','20.000.356 VIEWS','WATCH_VIDEO','','2016-04-08 22:23:14'),(3,'AAAAAAAA','https://www.youtube.com/watch?v=H_3nrx7B8_s','http://facebook.com','1.100000views','play','0','2016-04-08 23:50:35'),(4,'xxxx','https://www.youtube.com/watch?v=H_3nrx7B8_s','http://google.com','123views','','0','2016-04-08 23:59:55'),(5,'rrr','https://www.youtube.com/watch?v=H_3nrx7B8_s','https://www.youtube.com/watch?v=11','dds','','','2016-04-09 00:04:25');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
