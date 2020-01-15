# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: dbweb_cmsduz2
# Generation Time: 2020-01-15 02:24:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tref_album
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_album`;

CREATE TABLE `tref_album` (
  `id_album` varchar(25) NOT NULL DEFAULT '',
  `album_name` varchar(255) NOT NULL DEFAULT '',
  `album_slug` varchar(255) NOT NULL DEFAULT '',
  `album_desc` varchar(255) NOT NULL DEFAULT '',
  `album_image` varchar(255) NOT NULL DEFAULT '',
  `album_publish` varchar(11) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_album`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_album` WRITE;
/*!40000 ALTER TABLE `tref_album` DISABLE KEYS */;

INSERT INTO `tref_album` (`id_album`, `album_name`, `album_slug`, `album_desc`, `album_image`, `album_publish`)
VALUES
	('20191217082610','Material Design','material-design','Admin Bootstrap Material Design','17122019082712.png','publish');

/*!40000 ALTER TABLE `tref_album` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tref_article
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_article`;

CREATE TABLE `tref_article` (
  `id_article` varchar(25) NOT NULL DEFAULT '',
  `article_title` varchar(255) NOT NULL DEFAULT '',
  `article_slug` varchar(255) NOT NULL DEFAULT '',
  `article_content` text NOT NULL,
  `article_viewer` int(11) NOT NULL,
  `article_date` date NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_article` WRITE;
/*!40000 ALTER TABLE `tref_article` DISABLE KEYS */;

INSERT INTO `tref_article` (`id_article`, `article_title`, `article_slug`, `article_content`, `article_viewer`, `article_date`, `datetime`)
VALUES
	('20191219092202','Pengumuman','pengumuman','<p>Etiam tincidunt, erat eu feugiat eleifend, eros nisl dictum ante, a vulputate mauris orci vitae magna. Vestibulum porttitor semper tempus. Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem. Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat.</p>\r\n\r\n<blockquote>\r\n<p>If you do what you love, you&rsquo;ll never work a day in your life.</p>\r\nMarc Anthony, <strong>Twitter, Inc.</strong></blockquote>\r\n\r\n<p>Blandit mollit parturient hendrerit architecto adipisicing, sem anim iure nobis! Laborum dapibus! Perspiciatis cupidatat! Molestias, magnis ab aliquam? Lacus veniam ullamco libero aptent varius ac laoreet laoreet! Porttitor? Voluptatem eveniet alias leo accusantium dictumst nam id? Dui cupiditate egestas pellentesque platea condimentum suspendisse dignissim. Lacinia dolorem enim recusandae eos tempor? Ex facere! Eligendi donec iaculis convallis ullamco aliquid blandit blandit! Posuere class reprehenderit senectus. Phasellus morbi, nostrum vitae, sollicitudin egestas porta cillum. Veritatis magni eius? Maecenas dictumst? Voluptatibus, nisl nunc omnis sapiente. Aptent natus, cumque? Velit cursus nisi, esse mollitia est! Pharetra! Accusamus incididunt nisl? Incididunt, donec possimus ducimus adipisicing.</p>\r\n\r\n<p>Maecenas purus libero, bibendum at tempus et, pulvinar ut urna&hellip;</p>\r\n\r\n<p>Blandit mollit parturient hendrerit architecto adipisicing, sem anim iure nobis! Laborum dapibus! Perspiciatis cupidatat! Molestias, magnis ab aliquam? Lacus veniam ullamco libero aptent varius ac laoreet laoreet! Porttitor? Voluptatem eveniet alias leo accusantium dictumst nam id? Dui cupiditate egestas pellentesque platea condimentum suspendisse dignissim. Lacinia dolorem enim recusandae eos tempor? Ex facere! Eligendi donec iaculis convallis ullamco aliquid blandit blandit! Posuere class reprehenderit senectus. Phasellus morbi, nostrum vitae, sollicitudin egestas porta cillum. Veritatis magni eius? Maecenas dictumst? Voluptatibus, nisl nunc omnis sapiente. Aptent natus, cumque? Velit cursus nisi, esse mollitia est! Pharetra! Accusamus incididunt nisl? Incididunt, donec possimus ducimus adipisicing.</p>\r\n\r\n<hr />\r\n<p><strong>Gypsy Flamenco With Play and Passion, Not Flash</strong></p>\r\n\r\n<p>Etiam tincidunt, erat eu feugiat eleifend, eros nisl dictum ante, a vulputate mauris orci vitae magna. Vestibulum porttitor semper tempus. Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem.</p>\r\n\r\n<ul>\r\n	<li>The art of <a href=\"http://site.com/template/fastnews/themeforest-12777214-fastnews-responsive-magazine-template/fastnews-2015.09.11/html/post_standard.html#\">flamenco</a> has changed and changed again</li>\r\n	<li>It was fun to see how many combs flew out of Ms. Moneo&rsquo;s hair, the center-front strands of Mr. Torres&rsquo;s hair were loose, and both Ms. Moneo and Ms. Vargas displayed generously curved figures</li>\r\n	<li>All the dancing avoided metric predictability</li>\r\n</ul>\r\n\r\n<p>Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat, quis suscipit lorem blandit. Sed malesuada mi tellus, porttitor eleifend diam aliquet vitae. Nam eget dui tellus.</p>\r\n',7,'2019-12-19','2019-12-19 09:22:43');

/*!40000 ALTER TABLE `tref_article` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tref_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_category`;

CREATE TABLE `tref_category` (
  `id_category` varchar(25) NOT NULL DEFAULT '',
  `category_name` varchar(255) NOT NULL DEFAULT '',
  `category_slug` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_category` WRITE;
/*!40000 ALTER TABLE `tref_category` DISABLE KEYS */;

INSERT INTO `tref_category` (`id_category`, `category_name`, `category_slug`)
VALUES
	('20191216214513','TEKNOLOGI','teknologi'),
	('20191218150303','MUSIK','musik'),
	('20191218150310','POLITIK','politik'),
	('20191218150318','OTOMOTIF','otomotif');

/*!40000 ALTER TABLE `tref_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tref_comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_comment`;

CREATE TABLE `tref_comment` (
  `id_comment` varchar(25) NOT NULL DEFAULT '',
  `news_id` varchar(25) NOT NULL DEFAULT '',
  `comment_author` varchar(255) NOT NULL DEFAULT '',
  `comment_email` varchar(255) NOT NULL DEFAULT '',
  `comment_content` text NOT NULL,
  `comment_publish` varchar(11) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_comment` WRITE;
/*!40000 ALTER TABLE `tref_comment` DISABLE KEYS */;

INSERT INTO `tref_comment` (`id_comment`, `news_id`, `comment_author`, `comment_email`, `comment_content`, `comment_publish`, `datetime`)
VALUES
	('20191226095537','20191216225839','hanif muhammad','jendralhans@gmail.com','Testing 123','unpublish','2019-12-26 09:55:37'),
	('20191226104600','20191216225837','sds','adsda','adsda\r\n','unpublish','2019-12-26 10:46:00'),
	('20191226104607','20191216225837','sds','adsda','adsda\r\n','unpublish','2019-12-26 10:46:07'),
	('20191226104627','20191216225837','sds','adsda','adsda\r\n','unpublish','2019-12-26 10:46:27'),
	('20191226111504','20191216225837','sda','sdasdas','sdadsa','unpublish','2019-12-26 11:15:04'),
	('20191226111528','20191216225837','dsdsad','sdasda','sdasdas','unpublish','2019-12-26 11:15:28'),
	('20191226112230','20191216225837','sdadsd','sdasdsa','sdadasdsada','unpublish','2019-12-26 11:22:30'),
	('20191226112327','20191216225837','sdsds','sdasdas','sdasdaasdas','unpublish','2019-12-26 11:23:27'),
	('20191226112848','20191216225837','dasdds','sdsadsa','sdsada','unpublish','2019-12-26 11:28:48'),
	('20191226113000','20191216225837','dsgffddfhdj','kljjj','ksjkfjsfjss','unpublish','2019-12-26 11:30:00'),
	('20191227090723','20191216225839','sddsadsad','dasdsdsa','dasdsada','unpublish','2019-12-27 09:07:23');

/*!40000 ALTER TABLE `tref_comment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tref_config
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_config`;

CREATE TABLE `tref_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `navbar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_config` WRITE;
/*!40000 ALTER TABLE `tref_config` DISABLE KEYS */;

INSERT INTO `tref_config` (`id`, `header`, `navbar`)
VALUES
	(1,'CMS DUZ v2','[{\"id\":1},{\"id\":2},{\"id\":3},{\"id\":4},{\"id\":5}]');

/*!40000 ALTER TABLE `tref_config` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tref_gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_gallery`;

CREATE TABLE `tref_gallery` (
  `id_gallery` varchar(25) NOT NULL DEFAULT '',
  `album_id` varchar(25) NOT NULL DEFAULT '',
  `gallery_name` varchar(255) NOT NULL DEFAULT '',
  `gallery_desc` varchar(255) NOT NULL DEFAULT '',
  `gallery_image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_gallery` WRITE;
/*!40000 ALTER TABLE `tref_gallery` DISABLE KEYS */;

INSERT INTO `tref_gallery` (`id_gallery`, `album_id`, `gallery_name`, `gallery_desc`, `gallery_image`)
VALUES
	('20191218154837','20191217082610','TEST','sasasasas','18122019154925.png');

/*!40000 ALTER TABLE `tref_gallery` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tref_menu
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_menu`;

CREATE TABLE `tref_menu` (
  `id_menu` varchar(25) NOT NULL DEFAULT '',
  `menu_name` varchar(255) NOT NULL DEFAULT '',
  `menu_link` varchar(255) NOT NULL DEFAULT '',
  `menu_default` varchar(11) NOT NULL DEFAULT '',
  `menu_disable` varchar(11) NOT NULL DEFAULT '',
  `menu_parent` varchar(25) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_menu` WRITE;
/*!40000 ALTER TABLE `tref_menu` DISABLE KEYS */;

INSERT INTO `tref_menu` (`id_menu`, `menu_name`, `menu_link`, `menu_default`, `menu_disable`, `menu_parent`, `menu_order`)
VALUES
	('20191218145549','Dashboard','','no','no','',1),
	('20191218145559','Kategori','kategori.html','no','no','',2),
	('20191218145622','Berita','berita.html','no','no','',3),
	('20191218145641','Album','album.html','no','no','',4),
	('20191218145657','Galeri','galeri.html','no','no','20191218145641',5),
	('20191218211557','Otomotif','kategori/otomotif.html','no','no','20191218145559',5),
	('20191218212130','Politik','kategori/politik.html','no','no','20191218145559',3),
	('20191218212148','Musik','kategori/musik.html','no','no','20191218145559',4),
	('20191218212209','Teknologi','kategori/teknologi.html','no','no','20191218145559',6),
	('20191221184211','Pengumuman','halaman/pengumuman.html','no','no','20191218145657',6),
	('20200115091955','Sdsadsad','','no','no','20191221184211',7);

/*!40000 ALTER TABLE `tref_menu` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tref_news
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_news`;

CREATE TABLE `tref_news` (
  `id_news` varchar(25) NOT NULL DEFAULT '',
  `category_id` varchar(25) NOT NULL DEFAULT '',
  `user_id` varchar(11) NOT NULL DEFAULT '',
  `news_title` varchar(255) NOT NULL DEFAULT '',
  `news_slug` varchar(255) NOT NULL DEFAULT '',
  `news_content` text NOT NULL,
  `news_image` varchar(255) NOT NULL DEFAULT '',
  `news_publish` varchar(11) NOT NULL DEFAULT '',
  `news_viewer` int(11) NOT NULL,
  `news_tag` varchar(255) NOT NULL DEFAULT '',
  `news_date` date NOT NULL,
  `headline` varchar(11) NOT NULL DEFAULT '',
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id_news`),
  KEY `category_id` (`category_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_news` WRITE;
/*!40000 ALTER TABLE `tref_news` DISABLE KEYS */;

INSERT INTO `tref_news` (`id_news`, `category_id`, `user_id`, `news_title`, `news_slug`, `news_content`, `news_image`, `news_publish`, `news_viewer`, `news_tag`, `news_date`, `headline`, `datetime`)
VALUES
	('20191216225837','20191216214513','1','Metal Gear Solid 5: Everything You Need to Know Before Playing','metal-gear-solid-5-everything-you-need-to-know-before-playing','<p>Etiam tincidunt, erat eu feugiat eleifend, eros nisl dictum ante, a vulputate mauris orci vitae magna. Vestibulum porttitor semper tempus. Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem. Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat.</p>\r\n\r\n<blockquote>\r\n<p>If you do what you love, you&rsquo;ll never work a day in your life.</p>\r\nMarc Anthony, <strong>Twitter, Inc.</strong></blockquote>\r\n\r\n<p>Blandit mollit parturient hendrerit architecto adipisicing, sem anim iure nobis! Laborum dapibus! Perspiciatis cupidatat! Molestias, magnis ab aliquam? Lacus veniam ullamco libero aptent varius ac laoreet laoreet! Porttitor? Voluptatem eveniet alias leo accusantium dictumst nam id? Dui cupiditate egestas pellentesque platea condimentum suspendisse dignissim. Lacinia dolorem enim recusandae eos tempor? Ex facere! Eligendi donec iaculis convallis ullamco aliquid blandit blandit! Posuere class reprehenderit senectus. Phasellus morbi, nostrum vitae, sollicitudin egestas porta cillum. Veritatis magni eius? Maecenas dictumst? Voluptatibus, nisl nunc omnis sapiente. Aptent natus, cumque? Velit cursus nisi, esse mollitia est! Pharetra! Accusamus incididunt nisl? Incididunt, donec possimus ducimus adipisicing.</p>\r\n\r\n<p>Maecenas purus libero, bibendum at tempus et, pulvinar ut urna&hellip;</p>\r\n\r\n<p>Blandit mollit parturient hendrerit architecto adipisicing, sem anim iure nobis! Laborum dapibus! Perspiciatis cupidatat! Molestias, magnis ab aliquam? Lacus veniam ullamco libero aptent varius ac laoreet laoreet! Porttitor? Voluptatem eveniet alias leo accusantium dictumst nam id? Dui cupiditate egestas pellentesque platea condimentum suspendisse dignissim. Lacinia dolorem enim recusandae eos tempor? Ex facere! Eligendi donec iaculis convallis ullamco aliquid blandit blandit! Posuere class reprehenderit senectus. Phasellus morbi, nostrum vitae, sollicitudin egestas porta cillum. Veritatis magni eius? Maecenas dictumst? Voluptatibus, nisl nunc omnis sapiente. Aptent natus, cumque? Velit cursus nisi, esse mollitia est! Pharetra! Accusamus incididunt nisl? Incididunt, donec possimus ducimus adipisicing.</p>\r\n\r\n<hr />\r\n<p><strong>Gypsy Flamenco With Play and Passion, Not Flash</strong></p>\r\n\r\n<p>Etiam tincidunt, erat eu feugiat eleifend, eros nisl dictum ante, a vulputate mauris orci vitae magna. Vestibulum porttitor semper tempus. Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem.</p>\r\n\r\n<ul>\r\n	<li>The art of <a href=\"http://site.com/template/fastnews/themeforest-12777214-fastnews-responsive-magazine-template/fastnews-2015.09.11/html/post_standard.html#\">flamenco</a> has changed and changed again</li>\r\n	<li>It was fun to see how many combs flew out of Ms. Moneo&rsquo;s hair, the center-front strands of Mr. Torres&rsquo;s hair were loose, and both Ms. Moneo and Ms. Vargas displayed generously curved figures</li>\r\n	<li>All the dancing avoided metric predictability</li>\r\n</ul>\r\n\r\n<p>Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat, quis suscipit lorem blandit. Sed malesuada mi tellus, porttitor eleifend diam aliquet vitae. Nam eget dui tellus.</p>\r\n','16122019225931.png','publish',89,'Teknologi,Musik','2019-12-12','yes','2019-12-16 22:59:31'),
	('20191216225838','20191218150303','1','Nick Rangos, Creator of a Beloved Pimento Cheese','nick-rangos-creator-of-a-beloved-pimento-cheese','<p>Etiam tincidunt, erat eu feugiat eleifend, eros nisl dictum ante, a vulputate mauris orci vitae magna. Vestibulum porttitor semper tempus. Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem. Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat.</p>\r\n\r\n<blockquote>\r\n<p>If you do what you love, you&rsquo;ll never work a day in your life.</p>\r\nMarc Anthony, <strong>Twitter, Inc.</strong></blockquote>\r\n\r\n<p>Blandit mollit parturient hendrerit architecto adipisicing, sem anim iure nobis! Laborum dapibus! Perspiciatis cupidatat! Molestias, magnis ab aliquam? Lacus veniam ullamco libero aptent varius ac laoreet laoreet! Porttitor? Voluptatem eveniet alias leo accusantium dictumst nam id? Dui cupiditate egestas pellentesque platea condimentum suspendisse dignissim. Lacinia dolorem enim recusandae eos tempor? Ex facere! Eligendi donec iaculis convallis ullamco aliquid blandit blandit! Posuere class reprehenderit senectus. Phasellus morbi, nostrum vitae, sollicitudin egestas porta cillum. Veritatis magni eius? Maecenas dictumst? Voluptatibus, nisl nunc omnis sapiente. Aptent natus, cumque? Velit cursus nisi, esse mollitia est! Pharetra! Accusamus incididunt nisl? Incididunt, donec possimus ducimus adipisicing.</p>\r\n\r\n<p>Maecenas purus libero, bibendum at tempus et, pulvinar ut urna&hellip;</p>\r\n\r\n<p>Blandit mollit parturient hendrerit architecto adipisicing, sem anim iure nobis! Laborum dapibus! Perspiciatis cupidatat! Molestias, magnis ab aliquam? Lacus veniam ullamco libero aptent varius ac laoreet laoreet! Porttitor? Voluptatem eveniet alias leo accusantium dictumst nam id? Dui cupiditate egestas pellentesque platea condimentum suspendisse dignissim. Lacinia dolorem enim recusandae eos tempor? Ex facere! Eligendi donec iaculis convallis ullamco aliquid blandit blandit! Posuere class reprehenderit senectus. Phasellus morbi, nostrum vitae, sollicitudin egestas porta cillum. Veritatis magni eius? Maecenas dictumst? Voluptatibus, nisl nunc omnis sapiente. Aptent natus, cumque? Velit cursus nisi, esse mollitia est! Pharetra! Accusamus incididunt nisl? Incididunt, donec possimus ducimus adipisicing.</p>\r\n\r\n<hr />\r\n<p><strong>Gypsy Flamenco With Play and Passion, Not Flash</strong></p>\r\n\r\n<p>Etiam tincidunt, erat eu feugiat eleifend, eros nisl dictum ante, a vulputate mauris orci vitae magna. Vestibulum porttitor semper tempus. Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem.</p>\r\n\r\n<ul>\r\n	<li>The art of <a href=\"http://site.com/template/fastnews/themeforest-12777214-fastnews-responsive-magazine-template/fastnews-2015.09.11/html/post_standard.html#\">flamenco</a> has changed and changed again</li>\r\n	<li>It was fun to see how many combs flew out of Ms. Moneo&rsquo;s hair, the center-front strands of Mr. Torres&rsquo;s hair were loose, and both Ms. Moneo and Ms. Vargas displayed generously curved figures</li>\r\n	<li>All the dancing avoided metric predictability</li>\r\n</ul>\r\n\r\n<p>Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat, quis suscipit lorem blandit. Sed malesuada mi tellus, porttitor eleifend diam aliquet vitae. Nam eget dui tellus.</p>\r\n','16122019225931.png','publish',50,'Teknologi,Musik','2019-12-12','yes','2019-12-16 22:59:31'),
	('20191216225839','20191216214513','1','West Football Team Play in Gaza For First Time','west-football-team-play-in-gaza-for-first-time','<p>Etiam tincidunt, erat eu feugiat eleifend, eros nisl dictum ante, a vulputate mauris orci vitae magna. Vestibulum porttitor semper tempus. Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem. Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat.</p>\r\n\r\n<blockquote>\r\n<p>If you do what you love, you&rsquo;ll never work a day in your life.</p>\r\nMarc Anthony, <strong>Twitter, Inc.</strong></blockquote>\r\n\r\n<p>Blandit mollit parturient hendrerit architecto adipisicing, sem anim iure nobis! Laborum dapibus! Perspiciatis cupidatat! Molestias, magnis ab aliquam? Lacus veniam ullamco libero aptent varius ac laoreet laoreet! Porttitor? Voluptatem eveniet alias leo accusantium dictumst nam id? Dui cupiditate egestas pellentesque platea condimentum suspendisse dignissim. Lacinia dolorem enim recusandae eos tempor? Ex facere! Eligendi donec iaculis convallis ullamco aliquid blandit blandit! Posuere class reprehenderit senectus. Phasellus morbi, nostrum vitae, sollicitudin egestas porta cillum. Veritatis magni eius? Maecenas dictumst? Voluptatibus, nisl nunc omnis sapiente. Aptent natus, cumque? Velit cursus nisi, esse mollitia est! Pharetra! Accusamus incididunt nisl? Incididunt, donec possimus ducimus adipisicing.</p>\r\n\r\n<p>Maecenas purus libero, bibendum at tempus et, pulvinar ut urna&hellip;</p>\r\n\r\n<p>Blandit mollit parturient hendrerit architecto adipisicing, sem anim iure nobis! Laborum dapibus! Perspiciatis cupidatat! Molestias, magnis ab aliquam? Lacus veniam ullamco libero aptent varius ac laoreet laoreet! Porttitor? Voluptatem eveniet alias leo accusantium dictumst nam id? Dui cupiditate egestas pellentesque platea condimentum suspendisse dignissim. Lacinia dolorem enim recusandae eos tempor? Ex facere! Eligendi donec iaculis convallis ullamco aliquid blandit blandit! Posuere class reprehenderit senectus. Phasellus morbi, nostrum vitae, sollicitudin egestas porta cillum. Veritatis magni eius? Maecenas dictumst? Voluptatibus, nisl nunc omnis sapiente. Aptent natus, cumque? Velit cursus nisi, esse mollitia est! Pharetra! Accusamus incididunt nisl? Incididunt, donec possimus ducimus adipisicing.</p>\r\n\r\n<hr />\r\n<p><strong>Gypsy Flamenco With Play and Passion, Not Flash</strong></p>\r\n\r\n<p>Etiam tincidunt, erat eu feugiat eleifend, eros nisl dictum ante, a vulputate mauris orci vitae magna. Vestibulum porttitor semper tempus. Vestibulum eu dictum nibh. In congue, purus gravida ultricies fermentum, leo orci cursus nibh, a sollicitudin lectus mi eget felis. Proin eu metus id augue ornare maximus. Sed non nulla vel lectus ullamcorper aliquet eget sed sem.</p>\r\n\r\n<ul>\r\n	<li>The art of <a href=\"http://site.com/template/fastnews/themeforest-12777214-fastnews-responsive-magazine-template/fastnews-2015.09.11/html/post_standard.html#\">flamenco</a> has changed and changed again</li>\r\n	<li>It was fun to see how many combs flew out of Ms. Moneo&rsquo;s hair, the center-front strands of Mr. Torres&rsquo;s hair were loose, and both Ms. Moneo and Ms. Vargas displayed generously curved figures</li>\r\n	<li>All the dancing avoided metric predictability</li>\r\n</ul>\r\n\r\n<p>Nam justo ipsum, pretium ut porta non, molestie blandit metus. Sed pellentesque velit ullamcorper libero volutpat, quis suscipit lorem blandit. Sed malesuada mi tellus, porttitor eleifend diam aliquet vitae. Nam eget dui tellus.</p>\r\n','16122019225931.png','publish',50,'Teknologi,Musik','2019-12-12','yes','2019-12-16 22:59:31');

/*!40000 ALTER TABLE `tref_news` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tref_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tref_user`;

CREATE TABLE `tref_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tref_user` WRITE;
/*!40000 ALTER TABLE `tref_user` DISABLE KEYS */;

INSERT INTO `tref_user` (`id_user`, `user_name`, `user_pass`, `last_login`)
VALUES
	(1,'21232f297a57a5a743894a0e4a801fc3','ccb515a4ead21739114d875e2352747f','2017-05-10 14:48:22');

/*!40000 ALTER TABLE `tref_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
