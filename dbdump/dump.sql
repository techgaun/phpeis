-- MySQL dump 10.13  Distrib 5.1.57, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: a1768716_phpeis
-- ------------------------------------------------------
-- Server version	5.1.57
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bans`
--

DROP TABLE IF EXISTS `bans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bans` (
  `ban_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(60) NOT NULL,
  `ipaddr` varchar(100) NOT NULL,
  `expires` int(11) NOT NULL,
  `ban_maker` int(11) NOT NULL,
  PRIMARY KEY (`ban_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bans`
--

LOCK TABLES `bans` WRITE;
/*!40000 ALTER TABLE `bans` DISABLE KEYS */;
/*!40000 ALTER TABLE `bans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_desc` varchar(100) DEFAULT NULL,
  `disp_pos` int(11) DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'General Discussions','Just the general discussions for lulz',1),(2,'Computer Systems','Analyze the computer systems.',1);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `censor`
--

DROP TABLE IF EXISTS `censor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `censor` (
  `censor_id` int(11) NOT NULL AUTO_INCREMENT,
  `searchword` varchar(100) NOT NULL,
  `replaceword` varchar(100) NOT NULL,
  PRIMARY KEY (`censor_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `censor`
--

LOCK TABLES `censor` WRITE;
/*!40000 ALTER TABLE `censor` DISABLE KEYS */;
/*!40000 ALTER TABLE `censor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat_message`
--

DROP TABLE IF EXISTS `chat_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chat_message` (
  `row_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `posted` datetime NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`row_id`),
  UNIQUE KEY `row_id` (`row_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat_message`
--

LOCK TABLES `chat_message` WRITE;
/*!40000 ALTER TABLE `chat_message` DISABLE KEYS */;
INSERT INTO `chat_message` VALUES (1,'samar','2011-07-15 13:39:29','test'),(2,'samar','2011-07-15 13:39:33','lets do a test.'),(3,'samar','2011-07-15 13:39:39','hey how&#039;re you?'),(4,'NIGESH','2011-07-15 13:53:11','ok let&#039;s do'),(5,'NIGESH','2011-07-15 14:07:01','hello'),(6,'tester','2011-07-15 14:40:06','this is a test.'),(7,'tester','2011-07-15 14:40:20','*censored*'),(8,'tester','2011-07-15 14:50:55','sex'),(9,'tester','2011-07-15 14:51:07','*censored*'),(10,'anuj','2011-07-15 14:52:14','*censored*'),(11,'anuj','2011-07-15 14:52:26','*censored* kha'),(12,'samar','2011-07-17 13:28:11','test');
/*!40000 ALTER TABLE `chat_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `cmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `tut_id` int(11) NOT NULL,
  PRIMARY KEY (`cmt_id`),
  KEY `tut_id` (`tut_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'samar','samar_acharya@hotmail.com','ryq','127.0.0.1',19),(2,'samar','samar_acharya@hotmail.com','&lt;br&gt;&lt;a href=&#039;test.php&#039;&gt;test&lt;/a&gt;','127.0.0.1',19),(3,'samar','samar_acharya@hotmail.com','&lt;script type=&#039;text/javascript&#039;&gt;alert(1)&lt;/script&gt;','127.0.0.1',19),(4,'Chaadi','chaadi@gmail.com','good good.','110.34.4.242',14),(5,'hello','hello@world','hello world! :d','27.34.63.83',22),(6,'hello','hello@world','hello world! :d','27.34.63.83',22),(7,'hello','hello@world','hello world! :d','27.34.63.83',22),(8,'name','email@email','&lt;h1&gt;hello&lt;/h1&gt;','27.34.63.83',22),(9,'lolBahadur','hawa@guu.com','khatra xa hai lol','202.166.201.74',14),(10,'lolBahadur','hawa@guu.com','khatra xa hai lol','202.166.201.74',14);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `config_name` varchar(100) NOT NULL,
  `config_value` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `downloads`
--

DROP TABLE IF EXISTS `downloads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `downloads` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `download_title` varchar(100) NOT NULL,
  `download_desc` text,
  `download_path` varchar(255) NOT NULL,
  `uploaded_by` varchar(60) NOT NULL,
  PRIMARY KEY (`download_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `downloads`
--

LOCK TABLES `downloads` WRITE;
/*!40000 ALTER TABLE `downloads` DISABLE KEYS */;
INSERT INTO `downloads` VALUES (10,'JPT Files','Just Test','phpeis_test.sql.zip','samar'),(9,'TechGaun.Com','Lots of Linux Geek Stuffs.','phpeis_3D_heart.zip','samar');
/*!40000 ALTER TABLE `downloads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_permission`
--

DROP TABLE IF EXISTS `forum_permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_permission` (
  `group_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `view_forum` tinyint(1) NOT NULL DEFAULT '1',
  `post_topics` tinyint(1) NOT NULL DEFAULT '1',
  `post_replies` tinyint(1) NOT NULL DEFAULT '1',
  KEY `group_id` (`group_id`,`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_permission`
--

LOCK TABLES `forum_permission` WRITE;
/*!40000 ALTER TABLE `forum_permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forums`
--

DROP TABLE IF EXISTS `forums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forums` (
  `forum_id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_name` varchar(100) NOT NULL,
  `forum_desc` text NOT NULL,
  `moderators` text,
  `num_topics` int(11) NOT NULL DEFAULT '0',
  `num_posts` int(11) NOT NULL DEFAULT '0',
  `last_post` int(11) NOT NULL DEFAULT '0',
  `last_post_id` int(11) NOT NULL,
  `last_poster` varchar(60) NOT NULL,
  `disp_position` int(11) NOT NULL DEFAULT '0',
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`forum_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forums`
--

LOCK TABLES `forums` WRITE;
/*!40000 ALTER TABLE `forums` DISABLE KEYS */;
INSERT INTO `forums` VALUES (3,'Rules and Regulations','Site Rules and Regulations. Please read before posting any shits.',NULL,2,6,0,0,'pankaj',0,1),(4,'Site News','General sites news and announcements are posted regularly here.',NULL,3,4,0,0,'anuj',0,1),(5,'General Computing','Share talk about general computing technologies',NULL,0,0,0,0,'samar',0,2),(6,'Programming','Discuss on various programming languages in this forum',NULL,0,0,0,0,'samar',0,2);
/*!40000 ALTER TABLE `forums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_title` varchar(40) NOT NULL,
  `group_permission` tinyint(4) NOT NULL DEFAULT '3',
  PRIMARY KEY (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'Member',3),(2,'Administrator',1),(3,'Moderator',2);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL,
  `link_title` varchar(60) NOT NULL,
  `link_desc` varchar(255) NOT NULL DEFAULT 'Useful website for students',
  PRIMARY KEY (`link_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

LOCK TABLES `links` WRITE;
/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (1,'http://www.techgaun.com','Technology and more stuffs','Useful website for students'),(2,'http://www.nepali.netau.net','Hacking Challenges','Useful website for students'),(13,'http://www.yahoo.com','Yahoo','Yahoo!!!'),(12,'http://www.techgaun.com','Crazy Linux Stuffs','Few crazy linux stuffs for everyone'),(11,'www.google.com','Google Search','Your Online Mother'),(14,'http://www.gmail.com','Gmail','Mail From Google Inc.'),(15,'http://www.nepsecure.com','NepSecure','NepSecure Nepali Security Group'),(16,'http://www.smshell.hostei.com','SMS Stuffs','Lots of SMS stuffs for free');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_body` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'phpEIS development going rapidly','phpEIS development is going rapidly and we\'are positive about finishing the development within thursday. Thanks all for constant support and advices. :)','2011-07-12 15:17:55'),(2,'Working on forum','I am currently working on the forum part and I am positive about finishing this stuff by tomorrow. Stay tuned for the updated phpEIS system.I am currently working on the forum part and I am positive about finishing this stuff by tomorrow. Stay tuned for the updated phpEIS system.I am currently working on the forum part and I am positive about finishing this stuff by tomorrow. Stay tuned for the updated phpEIS system.I am currently working on the forum part and I am positive about finishing this stuff by tomorrow. Stay tuned for the updated phpEIS system.I am currently working on the forum part and I am positive about finishing this stuff by tomorrow. Stay tuned for the updated phpEIS system.I am currently working on the forum part and I am positive about finishing this stuff by tomorrow. Stay tuned for the updated phpEIS system.','2011-07-12 15:30:08'),(7,'On the way to presentation','We&#039;re on our way to do presentation. I hope it goes good. :)','2011-07-15 10:07:05');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `online`
--

DROP TABLE IF EXISTS `online`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `online` (
  `user_id` int(11) NOT NULL,
  `ip` varchar(120) NOT NULL,
  `timestamp` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `online`
--

LOCK TABLES `online` WRITE;
/*!40000 ALTER TABLE `online` DISABLE KEYS */;
/*!40000 ALTER TABLE `online` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `group_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `post_reply` tinyint(1) NOT NULL,
  `post_topics` tinyint(1) NOT NULL,
  `view_forum` tinyint(1) NOT NULL,
  KEY `group_id` (`group_id`,`forum_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `poster` varchar(40) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `poster_ip` varchar(40) NOT NULL,
  `message` text NOT NULL,
  `posted` datetime NOT NULL,
  `edited` int(11) DEFAULT NULL,
  `edited_by` varchar(40) DEFAULT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`),
  KEY `topic_id` (`topic_id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (30,'samar',7,'127.0.0.1','you can use this site for your benefits as well as to help others. but you are not allowed to use any sort of vulgar, racial or offensive languages. we hope you remain cool with this. :)','2011-07-15 07:37:13',NULL,NULL,9),(31,'samar',7,'127.0.0.1','this is a test.','2011-07-15 08:34:32',NULL,NULL,9),(32,'samar',7,'127.0.0.1','this is a test. :)','2011-07-15 08:45:31',NULL,NULL,10),(33,'samar',7,'127.0.0.1','just a simple test','2011-07-15 08:49:21',NULL,NULL,9),(34,'samar',7,'127.0.0.1','*censored* these rules.','2011-07-15 09:43:02',NULL,NULL,9),(35,'NIGESH',5,'10.42.43.22','k cha halkhabar??','2011-07-15 10:07:31',NULL,NULL,11),(36,'anuj',9,'10.42.43.22','this is a test thread. :)','2011-07-15 11:00:37',NULL,NULL,12),(37,'anuj',9,'10.42.43.22','*censored* test','2011-07-15 11:01:32',NULL,NULL,12),(38,'anuj',9,'10.42.43.22','helllo *censored*ing world.','2011-07-15 11:08:11',NULL,NULL,13),(39,'pankaj',11,'127.0.0.1','test','2011-07-17 09:52:30',NULL,NULL,11);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ranks`
--

DROP TABLE IF EXISTS `ranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ranks` (
  `rank_id` int(11) NOT NULL AUTO_INCREMENT,
  `rank_title` varchar(60) NOT NULL,
  `rank_posts` int(11) NOT NULL,
  PRIMARY KEY (`rank_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ranks`
--

LOCK TABLES `ranks` WRITE;
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic_subscriptions`
--

DROP TABLE IF EXISTS `topic_subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic_subscriptions` (
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`,`topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic_subscriptions`
--

LOCK TABLES `topic_subscriptions` WRITE;
/*!40000 ALTER TABLE `topic_subscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `topic_subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_creator` varchar(60) NOT NULL,
  `subject` text NOT NULL,
  `body` text NOT NULL,
  `first_post_id` int(11) NOT NULL,
  `last_post_id` int(11) NOT NULL,
  `last_poster` varchar(60) NOT NULL,
  `num_views` int(11) NOT NULL DEFAULT '1',
  `num_replies` int(11) NOT NULL DEFAULT '0',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `sticky` tinyint(1) NOT NULL DEFAULT '0',
  `forum_id` int(11) NOT NULL,
  PRIMARY KEY (`topic_id`),
  KEY `forum_id` (`forum_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` VALUES (1,'samar','Samar Waz Here','Samar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz Here',0,0,'pankaj',1,0,0,0,1),(2,'samar','Samar Waz HereSamar Waz HereSamar Waz Here','Samar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz HereSamar Waz Here',0,0,'pankaj',1,0,0,0,1),(3,'tester','This is a test','This is a test to see how it works.',0,0,'pankaj',1,0,0,0,1),(4,'tester','Another test','This is another test to see if it works or not. :D',0,0,'pankaj',1,0,0,0,2),(5,'tester','Just another test','This is another test to see if the forum is working right or not. This is another test to see if the forum is working right or not. This is another test to see if the forum is working right or not.',0,0,'pankaj',1,0,0,0,2),(6,'tester','Another Test Test','This is a testThis is a testThis is a testThis is a testThis is a testThis is a testThis is a testThis is a testThis is a testThis is a testThis is a testThis is a test',0,0,'pankaj',1,0,0,0,2),(7,'anuj','Suggestion for the improvement of the forum!!','Brainstorm !!',0,0,'pankaj',1,0,0,0,2),(8,'samar','Just testing','is it working???',0,0,'pankaj',1,0,0,0,2),(9,'samar','Sites Rules','you can use this site for your benefits as well as to help others. but you are not allowed to use any sort of vulgar, racial or offensive languages. we hope you remain cool with this. :)',0,0,'pankaj',1,0,0,0,3),(10,'samar','Test Test Test','this is a test. :)',0,0,'pankaj',1,0,0,0,4),(11,'NIGESH','hello world','k cha halkhabar??',0,0,'pankaj',1,0,0,0,3),(12,'anuj','Test Thread','this is a test thread. :)',0,0,'pankaj',1,0,0,0,4),(13,'anuj','hello world','helllo *censored*ing world.',0,0,'pankaj',1,0,0,0,4);
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tutorial`
--

DROP TABLE IF EXISTS `tutorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tutorial` (
  `tut_id` int(11) NOT NULL AUTO_INCREMENT,
  `tut_title` varchar(100) NOT NULL,
  `tut_desc` varchar(255) NOT NULL DEFAULT 'Useful tutorial for students',
  `tut_body` text,
  `tut_rating` float DEFAULT NULL,
  `uploaded_by` varchar(60) NOT NULL,
  PRIMARY KEY (`tut_id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tutorial`
--

LOCK TABLES `tutorial` WRITE;
/*!40000 ALTER TABLE `tutorial` DISABLE KEYS */;
INSERT INTO `tutorial` VALUES (12,'Just a test','This is just a test to see','Its a tutorial for enhancing your technology mind. Lets be here everyday to improve yourself. Just a test. Just test :D',NULL,'samar'),(13,'Another test','This is just a test to see','This is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to see',NULL,'samar'),(14,'Crazy Linux Stuffs','Crazy and cool linux stuffs','Today I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss some\r\n\r\nToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss some',NULL,'samar'),(16,'phpEIS chat system','Today I am going to discuss some','Today I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss some\r\n\r\nToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss some',NULL,'samar'),(17,'New tutorial Added','This is just a test to see','Today I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss some\r\n\r\nToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss someToday I am going to discuss some',NULL,'samar'),(18,'TechGaun.Com','This is just a test to see','This is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to see\r\n\r\nThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seev\r\n\r\nThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to seeThis is just a test to see',NULL,'samar'),(19,'TechGaun.Com','Lots of Linux Geek Stuffs.','Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test Jpt Test',NULL,'samar'),(21,'gg','ggg','hgfjvjfuv',NULL,'anuj'),(22,'hello world','learn hello world in c','#include &lt;stdio.h&gt;\r\n\r\nint main(){\r\n\r\nprintf(\\\\&quot;hello world\\\\&quot;);\r\n\r\nreturn 0;\r\n\r\n}',NULL,''),(23,'gGPXuf rG  nb SBn VsSV kZ','','&lt;a href=http://www.ami-bonnymethod.org/cgi/brandviagra/#27&gt;continue reading this..&lt;/a&gt; generic viagra us customs - viagra 20 years old',NULL,''),(24,'U9Sa9L2W','X384UdRWCo2','Wow you are so talented!! I am a pthaogropher too (learning and experiencing still)â€¦ and I can really recognize your creativity and talentâ€¦ alsoâ€¦ your capacity to shine in musicâ€¦ wowâ€¦ please never never stopâ€¦ God gave you these gifts and you have to use them!!! Your music and pictures are now internationalâ€¦ I am from Argentinaâ€¦ I am a Christian tooâ€¦ I grew up in a church just like yours but here in my country that is not a usual thing (it is a catholic country)â€¦ with that I just want to say that I feel we have a few things in common.And I also absolutely love your blog!!!  Soâ€¦ Jonâ€¦ you have a fan down here in Buenos Airesâ€¦',NULL,''),(25,'hXjH22izhTe','1H8tGweW','hey! , i am from peru, and i just saw ur photos, amzinag! You use a canon 5d right? Im 15 and i recently got a camera, a canon t3i, would you help me how to configure it so i can record a video with a very similar quality as some of your videos? This is my passion, im still learning by myself, it would mean the world if you reply to this. Thank you a lot http://idkjzew.com [url=http://plwmlk.com]plwmlk[/url] [link=http://kylfbskep.com]kylfbskep[/link]',NULL,''),(26,'nike free 3 billig','pfblfoydwp@gmail.com','ces variations modifis de Nike cosaque de ne pas accomplir acclamant Femme Chaussures Nike No charge Operate Various.\r\n &lt;a href=\\\\&quot;http://performpatch.com/index.asp?id=17\\\\&quot; title=\\\\&quot;nike free 3 billig\\\\&quot;&gt;nike free 3 billig&lt;/a&gt;',NULL,''),(27,'ray ban sale','ray ban sale','[url=http://www.raybanoutletsales.com]ray ban sale[/url]',NULL,''),(28,'Discount Christian Louboutin','Discount Christian Louboutin','http://www.ghdsukcheap.comCheap GHDshttp://www.raybanwayfarersglasses.co.ukRay Ban Aviatorshttp://fr.ibeatsbydrdre.com Beats In Oreillehttp://uk.ibeatsbydrdre.comBeats By Dre UKhttp://www.uk-beats.co.ukCheap Beats By Dr Drehttp://www.mulberryukforsale.co.ukCheap Mulberry UKhttp://www.redsoleshoespromo.com/Discount Christian Louboutinhttp://www.hiphaus.at/typo3conf/cheapkobe9.phpCheap Kobe 9\r\nDiscount Christian Louboutin http://www.redsoleshoespromo.com',NULL,''),(29,'GHD UK','GHD UK','http://cathedralridgewinery.com/wp-content/uploads/cheapghd.phpCheap GHDs UKhttp://mie-kanteishi.info/wp/wp-content/ghdsstraighteners.phpGHDs Straightenershttp://internshipfund.org/wp-content/ghdsale.phpBuy Cheap GHDshttp://tamandayu.com/CheapGHDsUK.phpGHD Greenhttp://odeeh.com/relaunch/wp-content/ghdblack.phpGHD Outlethttp://mie-kanteishi.info/wp/wp-content/ghdsstraighteners.phpCheap GHDs Straightenershttp://cathedralridgewinery.com/wp-content/uploads/cheapghd.phpGHDs UK Outlethttp://princetonmicrowave.com/GHDOutlet.phpGHD Outlethttp://rochp.org/wp-content/ghdoutlet.phpGHD Outlethttp://rochp.org/wp-content/ghdoutlet.phpCheap GHD UKhttp://ginaforsyth.com/wp/wp-content/ghdaustralia.phpGHD Rarehttp://tamandayu.com/CheapGHDsUK.phpGHDs UK Outlethttp://therehabboutique.co.uk/ghdkisshair.phpGHD New Wave Limited Edition Gift Sethttp://www.paccollars.co.uk/ghdspink.php2014 New GHDs Silvery UK For Salehttp://www.paccollars.co.uk/ghdspink.php2014 New GHDs Pink Lady UK For Sale\r\nGHD UK http://giab.se/GHDUK.php',NULL,''),(30,'I like','','Thanks for consisting of the stunning images-- so vulnerable to a sense of contemplation. \r\n \r\nmy website - http://onlinesmpt200.com',NULL,''),(31,'VCUpeQzlrvoMlubPCk','dzf4oN  &lt;a href=\\\\&quot;http://siracwbincgg.com/\\\\&quot;&gt;siracwbincgg&lt;/a&gt;, [url=http://uwjdztdwzmib.com/]uwjdztdwzmib[/url], [link=http://ejbubdxkufzw.com/]ejbubdxkufzw[/link], http://ocojtwdepdrk.com/','dzf4oN  &lt;a href=\\\\&quot;http://siracwbincgg.com/\\\\&quot;&gt;siracwbincgg&lt;/a&gt;, [url=http://uwjdztdwzmib.com/]uwjdztdwzmib[/url], [link=http://ejbubdxkufzw.com/]ejbubdxkufzw[/link], http://ocojtwdepdrk.com/',NULL,''),(32,'jHKDZCwmFLAmaHQG','UfcMxcYWpkhEL','aCJyAA  &lt;a href=\\\\&quot;http://vpaghcnstgfa.com/\\\\&quot;&gt;vpaghcnstgfa&lt;/a&gt;, [url=http://ujckwparzurh.com/]ujckwparzurh[/url], [link=http://ewpyglgrjwqu.com/]ewpyglgrjwqu[/link], http://howtclxsufax.com/',NULL,''),(33,'lNpMmdsANOEatFq','bNHYUMzhB','p3zX4A  &lt;a href=\\\\&quot;http://dcpijvwevkiz.com/\\\\&quot;&gt;dcpijvwevkiz&lt;/a&gt;, [url=http://pwuoajikxcxj.com/]pwuoajikxcxj[/url], [link=http://wrxnfgndmbxx.com/]wrxnfgndmbxx[/link], http://kkpnrxcfytgn.com/',NULL,''),(34,'TFQBHHqyCv','hBIqmMJQ','YrQvSw  &lt;a href=\\\\&quot;http://oucgczcrojtp.com/\\\\&quot;&gt;oucgczcrojtp&lt;/a&gt;, [url=http://hrqseuafnycy.com/]hrqseuafnycy[/url], [link=http://vihnhsyejhpv.com/]vihnhsyejhpv[/link], http://skekdbwxhiau.com/',NULL,''),(35,'alnbAkDOelS','UXwCxliFxmwGWtHha','nzhKet  &lt;a href=\\\\&quot;http://hrhqcirmkxdb.com/\\\\&quot;&gt;hrhqcirmkxdb&lt;/a&gt;, [url=http://llujromoewez.com/]llujromoewez[/url], [link=http://onirduwlsdxc.com/]onirduwlsdxc[/link], http://hwyolvikncfk.com/',NULL,''),(36,'WwxsNMQhYgVMfQGm','KEmoNAluBVMbwg','HhuL1S  &lt;a href=\\\\&quot;http://jqjomddejetu.com/\\\\&quot;&gt;jqjomddejetu&lt;/a&gt;, [url=http://tbviqeiwqsep.com/]tbviqeiwqsep[/url], [link=http://oqtvwuqqfkcy.com/]oqtvwuqqfkcy[/link], http://wcaeuqwwgpqr.com/',NULL,''),(37,'zSsEMCfBaBxJ','XmTFybkqYezYjXM','n02SMa  &lt;a href=\\\\&quot;http://yyiknbqluxsw.com/\\\\&quot;&gt;yyiknbqluxsw&lt;/a&gt;, [url=http://ctbvohlpfylz.com/]ctbvohlpfylz[/url], [link=http://svghcfrxeluu.com/]svghcfrxeluu[/link], http://bejyutpsvuob.com/',NULL,''),(38,'ePPVlMyFUV','VlxlUHVHyjLsCqG','rCTyEv  &lt;a href=\\\\&quot;http://lqiqxdvhnfil.com/\\\\&quot;&gt;lqiqxdvhnfil&lt;/a&gt;, [url=http://uqdrtpbfxeoh.com/]uqdrtpbfxeoh[/url], [link=http://zawfmnaltreg.com/]zawfmnaltreg[/link], http://ewxmynscbqgj.com/',NULL,''),(39,'BKxmcnjrl','MIHfAuCSoWhhbwOfu','6NQOmz  &lt;a href=\\\\&quot;http://bfokmyjdbzgd.com/\\\\&quot;&gt;bfokmyjdbzgd&lt;/a&gt;, [url=http://dvlkxtfcvjxu.com/]dvlkxtfcvjxu[/url], [link=http://zwwpnkbxivqr.com/]zwwpnkbxivqr[/link], http://jukqdvsoorwo.com/',NULL,''),(40,'xlmBUcgZOr','YVJBFwXNrh','JsLcXp  &lt;a href=\\\\&quot;http://ybshurmkahvl.com/\\\\&quot;&gt;ybshurmkahvl&lt;/a&gt;, [url=http://fvgiifugfkij.com/]fvgiifugfkij[/url], [link=http://gfaiffirixcz.com/]gfaiffirixcz[/link], http://ucmccusiuwuj.com/',NULL,''),(41,'mboIMhytzzDoMI','ZNOqTcpbe','16VChu  &lt;a href=\\\\&quot;http://nakmznmvhggq.com/\\\\&quot;&gt;nakmznmvhggq&lt;/a&gt;, [url=http://gpbbncteeavv.com/]gpbbncteeavv[/url], [link=http://qserdxneyuky.com/]qserdxneyuky[/link], http://tlnfceltzdht.com/',NULL,''),(42,'OVrMgCfzrJHeWYe','zwxdaMlnhaUUBHzqR','m29e70  &lt;a href=\\\\&quot;http://dvdsnqenxzwx.com/\\\\&quot;&gt;dvdsnqenxzwx&lt;/a&gt;, [url=http://ordyltcbxvdj.com/]ordyltcbxvdj[/url], [link=http://dycaqcxqfqgl.com/]dycaqcxqfqgl[/link], http://ldghkqksfdbf.com/',NULL,''),(43,'FEgTmLTmfFBbpdVuckX','EaRGjkGlYNuhPgeF','wkFk4L  &lt;a href=\\\\&quot;http://tzkpqivtdqfi.com/\\\\&quot;&gt;tzkpqivtdqfi&lt;/a&gt;, [url=http://jvgpzsmeyqls.com/]jvgpzsmeyqls[/url], [link=http://uxmjonpfmvtk.com/]uxmjonpfmvtk[/link], http://opmfvqnnwfgg.com/',NULL,''),(44,'fBUxzZuCsQzDe','JFXpjssotzcf','Gfuu4H  &lt;a href=\\\\&quot;http://rfjgywlgnfxv.com/\\\\&quot;&gt;rfjgywlgnfxv&lt;/a&gt;, [url=http://jltxwlibfwhz.com/]jltxwlibfwhz[/url], [link=http://cizsmerqbcow.com/]cizsmerqbcow[/link], http://deogssrccbdn.com/',NULL,''),(45,'QnCKUiVQNMgsThFZcQ','jvPrWVvCPu','e1T7TN  &lt;a href=\\\\&quot;http://wnzarfgzqfuv.com/\\\\&quot;&gt;wnzarfgzqfuv&lt;/a&gt;, [url=http://mtcnlkfyllud.com/]mtcnlkfyllud[/url], [link=http://nazubvyyastj.com/]nazubvyyastj[/link], http://avjdmkhmpdvc.com/',NULL,''),(46,'parajumpers kodiak dame','parajumpers kodiak dame','parajumpers kodiak xxs\r\n[url=http://www.downjacketno.com/tag/parajumpers-kodiak-dame/]parajumpers kodiak dame[/url]',NULL,''),(47,'Parajumpers arches','Parajumpers arches','parajumpers new Big Bend\r\n[url=http://www.downjacketno.com/tag/Parajumpers-arches/]Parajumpers arches[/url]',NULL,'');
/*!40000 ALTER TABLE `tutorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_msn` varchar(100) DEFAULT NULL,
  `user_gtalk` varchar(100) DEFAULT NULL,
  `user_yahoo` varchar(100) DEFAULT NULL,
  `user_country` varchar(100) NOT NULL,
  `sig` varchar(250) DEFAULT '0',
  `style` varchar(40) NOT NULL DEFAULT 'default',
  `num_posts` int(11) NOT NULL DEFAULT '0',
  `last_visit` datetime NOT NULL,
  `activate_string` varchar(100) NOT NULL,
  `is_confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test','412491faeaa8e2d1b262f83555040145','test@gmail.com','97324223','','','','nepal','0','default',0,'0000-00-00 00:00:00','0382e9c24d20bee38cd7c67603323f1e',0,3),(2,'tester','8e87a0a889e13cd06318868a038a8752','tester@hotmail.com','879827387','test@test.com','test@test.com','test@yahoo.com','Nepal','&lt;b&gt;Mero Nepal&lt;/b&gt;','default',0,'0000-00-00 00:00:00','513822d164f0d809f79a20bc09844ac3',0,3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-01 11:07:18
