/*
 Navicat Premium Data Transfer

 Source Server         : localhost 
 Source Server Type    : MySQL
 Source Server Version : 50163
 Source Host           : localhost
 Source Database       : web

 Target Server Type    : MySQL
 Target Server Version : 50163
 File Encoding         : utf-8

 Date: 09/24/2015 21:16:50 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `artist`
-- ----------------------------
DROP TABLE IF EXISTS `artist`;
CREATE TABLE `artist` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `identity` varchar(30) DEFAULT NULL,
  `hyperlink` varchar(30) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`username`),
  CONSTRAINT `artist_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `artist`
-- ----------------------------
BEGIN;
INSERT INTO `artist` VALUES ('art', 'No', 'art@163.com', null), ('bl2582', 'Yes', 'bl@music.com', ' excellence'), ('red231', 'No', 'red@music.com', 'classical'), ('tt111', null, '', 'aasasa'), ('uuu111', 'No', 'www.iii.com', null), ('wh09455', 'Yes', 'wh@music.com', 'famous singer');
COMMIT;

-- ----------------------------
--  Table structure for `artist_play`
-- ----------------------------
DROP TABLE IF EXISTS `artist_play`;
CREATE TABLE `artist_play` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `subtype` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`,`subtype`),
  KEY `subtype` (`subtype`),
  CONSTRAINT `artist_play_ibfk_1` FOREIGN KEY (`username`) REFERENCES `artist` (`username`),
  CONSTRAINT `artist_play_ibfk_2` FOREIGN KEY (`subtype`) REFERENCES `type` (`subtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `artist_play`
-- ----------------------------
BEGIN;
INSERT INTO `artist_play` VALUES ('bl2582', 'Bebob'), ('uuu111', 'Bebob'), ('wh09455', 'Blues Shouter'), ('bl2582', 'Cool Jazz'), ('wh09455', 'Country Blues'), ('bl2582', 'Free Jazz'), ('red231', 'Freestyle Rap');
COMMIT;

-- ----------------------------
--  Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `rating` int(10) DEFAULT NULL,
  `cid` int(10) NOT NULL DEFAULT '0',
  `review` text,
  `ratetime` datetime DEFAULT NULL,
  PRIMARY KEY (`cid`,`username`),
  KEY `username` (`username`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `concert` (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `comments`
-- ----------------------------
BEGIN;
INSERT INTO `comments` VALUES ('dl2598', '9', '3', '\r\n111sds', '2014-12-09 16:18:27'), ('bl2582', '9', '5', 'Such a great one!', '2014-12-08 04:18:28'), ('dl2598', '10', '5', 'very good', '2014-10-16 08:48:12'), ('dy654', '10', '5', 'Good', '2014-12-04 04:19:31'), ('dy654', '8', '6', 'Not bad I have to say.', '2014-12-08 19:20:35'), ('mdd221', '8', '15', 'Funny.', '2014-12-09 15:07:37'), ('dl2598', '8', '21', 'Cool one.', '2014-12-01 15:09:02'), ('uuu111', '9', '21', 'Awesome!', '2014-12-08 02:06:54'), ('dy654', '7', '23', 'Mmmmm', '2014-12-02 15:10:45'), ('dl2598', '8', '24', 'Mmmm', '2014-12-03 15:12:03'), ('dl2598', '10', '28', 'safsdf', '2014-12-09 16:30:46');
COMMIT;

-- ----------------------------
--  Table structure for `concert`
-- ----------------------------
DROP TABLE IF EXISTS `concert`;
CREATE TABLE `concert` (
  `cid` int(10) NOT NULL DEFAULT '0',
  `cname` varchar(30) DEFAULT NULL,
  `ctime` datetime DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `availability` varchar(30) DEFAULT NULL,
  `actor` varchar(30) DEFAULT NULL,
  `poster` varchar(30) DEFAULT NULL,
  `posttime` datetime DEFAULT NULL,
  `image` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`cid`),
  KEY `poster` (`poster`),
  KEY `actor` (`actor`),
  CONSTRAINT `concert_ibfk_1` FOREIGN KEY (`poster`) REFERENCES `users` (`username`),
  CONSTRAINT `concert_ibfk_2` FOREIGN KEY (`actor`) REFERENCES `artist` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `concert`
-- ----------------------------
BEGIN;
INSERT INTO `concert` VALUES ('1', 'concert1', '2014-12-01 07:24:55', '25.00', 'Yes', 'bl2582', 'dy654', '2014-11-04 07:25:34', './images/p5.jpg'), ('2', 'concert2', '2014-11-28 07:25:56', '10.00', 'Yes', 'wh09455', 'adminstrator', '2014-11-03 07:26:19', './images/p1.jpg'), ('3', 'concert3', '2014-12-02 07:45:50', '11.00', 'Yes', 'wh09455', 'dl2598', '2014-11-17 07:46:32', './images/p2.jpg'), ('4', 'concert4', '2014-12-19 07:46:55', '22.00', 'Yes', 'art', 'art', '2014-11-16 07:47:28', './images/p3.jpg'), ('5', 'concert5', '2014-10-15 08:46:17', '12.00', 'No', 'bl2582', 'dl2598', '2014-10-02 08:46:47', './images/p4.jpg'), ('6', 'concert6', '2014-12-06 21:21:13', '19.00', 'No', 'bl2582', 'dy654', '2014-12-03 21:21:43', './images/p6.jpg'), ('7', 'concert7', '2014-12-16 22:01:12', '22.00', 'Yes', 'wh09455', 'dy654', '2014-12-06 22:01:35', './images/p7.jpg'), ('8', 'concert8', '2014-12-30 22:03:19', '10.00', 'Yes', 'wh09455', 'red231', '2014-12-03 22:05:50', './images/p8.jpg'), ('9', 'concert9', '2014-12-30 22:03:24', '14.50', 'Yes', 'bl2582', 'dy654', '2014-12-03 22:05:55', './images/p9.jpg'), ('10', 'concert10', '2014-12-28 22:03:28', '15.00', 'Yes', 'bl2582', 'dy654', '2014-12-06 22:06:09', './images/p10.jpg'), ('11', 'concert11', '2014-12-22 22:03:32', '23.50', 'Yes', 'wh09455', 'dy654', '2014-12-06 22:06:13', './images/p11.jpg'), ('12', 'concert12', '2014-12-27 22:03:36', '30.00', 'Yes', 'bl2582', 'dy654', '2014-12-01 22:06:16', './images/p12.jpg'), ('13', 'concert13', '2014-12-22 22:03:39', '40.00', 'Yes', 'bl2582', 'uuu111', '2014-12-06 22:06:22', './images/p13.jpg'), ('14', 'concert14', '2014-12-21 22:03:43', '33.00', 'Yes', 'bl2582', 'dl2598', '2014-12-06 22:06:25', './images/p1.jpg'), ('15', 'concert15', '2014-12-18 22:03:47', '20.00', 'Yes', 'art', 'dl2598', '2014-12-06 22:06:28', './images/p3.jpg'), ('16', 'concert16', '2014-12-19 22:03:51', '15.00', 'Yes', 'wh09455', 'bl2582', '2014-12-04 22:06:32', './images/p2.jpg'), ('17', 'concert17', '2014-12-18 22:03:56', '5.50', 'Yes', 'bl2582', 'dl2598', '2014-12-04 22:06:36', './images/p11.jpg'), ('18', 'concert18', '2014-12-16 22:04:00', '10.00', 'Yes', 'bl2582', 'red231', '2014-12-01 22:06:40', './images/p6.jpg'), ('19', 'concert19', '2014-12-29 22:04:04', '12.00', 'Yes', 'wh09455', 'dl2598', '2014-12-02 22:06:44', './images/p1.jpg'), ('20', 'concert20', '2014-12-31 22:04:08', '22.00', 'Yes', 'bl2582', 'bl2582', '2014-12-01 22:06:48', './images/p4.jpg'), ('21', 'concert21', '2014-12-08 04:29:08', '30.00', 'Yes', 'red231', 'red231', '2014-12-07 04:29:33', './images/p10.jpg'), ('22', 'name', '2014-12-25 03:02:00', '11.00', 'Yes', 'bl2582', 'dl2598', '2014-12-09 00:18:35', null), ('23', 'concert777', '2014-12-19 01:01:00', '33.00', 'Yes', 'wh09455', 'wh09455', '2014-12-09 00:20:01', null), ('24', 'new concert', '2014-12-31 07:07:00', '20.00', 'Yes', 'wh09455', 'dl2598', '2014-12-09 00:21:42', null), ('25', 'conecrt28', '2014-12-24 00:11:00', '20.00', 'Yes', 'art', 'dl2598', '2014-12-09 15:30:13', null), ('26', 'concert99', '2014-12-24 00:12:00', '11.00', 'Yes', 'art', 'dl2598', '2014-12-09 16:19:14', null), ('27', 'concert5', '2014-12-15 00:12:00', '121.00', 'Yes', 'bl2582', 'dl2598', '2014-12-09 16:23:22', null), ('28', 'concert5', '2014-10-10 00:12:00', '100.00', 'Yes', 'bl2582', 'dl2598', '2014-12-09 16:25:06', null), ('29', 'concert1101', '2014-12-25 00:12:00', '11.00', 'Yes', 'bl2582', 'bl2582', '2014-12-09 16:34:54', null);
COMMIT;

-- ----------------------------
--  Table structure for `concert_type`
-- ----------------------------
DROP TABLE IF EXISTS `concert_type`;
CREATE TABLE `concert_type` (
  `cid` int(10) NOT NULL DEFAULT '0',
  `ctype` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`cid`,`ctype`),
  KEY `ctype` (`ctype`),
  CONSTRAINT `concert_type_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `concert` (`cid`),
  CONSTRAINT `concert_type_ibfk_2` FOREIGN KEY (`ctype`) REFERENCES `type` (`subtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `concert_type`
-- ----------------------------
BEGIN;
INSERT INTO `concert_type` VALUES ('23', 'Bebob'), ('24', 'Bebob'), ('25', 'Bebob'), ('26', 'Bebob'), ('22', 'Blues Shouter'), ('3', 'breakbeat'), ('10', 'breakbeat'), ('11', 'breakbeat'), ('15', 'breakbeat'), ('17', 'breakbeat'), ('29', 'Breakbeat'), ('2', 'chicago blues'), ('9', 'chicago blues'), ('20', 'chicago blues'), ('21', 'chicago blues'), ('5', 'Cool Jazz'), ('7', 'Cool Jazz'), ('12', 'Cool Jazz'), ('13', 'Cool Jazz'), ('19', 'Cool Jazz'), ('28', 'Cool Jazz'), ('6', 'Country Blues'), ('16', 'Country Blues'), ('1', 'Free Jazz'), ('4', 'Free Jazz'), ('8', 'Free Jazz'), ('14', 'Free Jazz'), ('18', 'Free Jazz'), ('27', 'Free Jazz');
COMMIT;

-- ----------------------------
--  Table structure for `follow`
-- ----------------------------
DROP TABLE IF EXISTS `follow`;
CREATE TABLE `follow` (
  `followee` varchar(30) NOT NULL DEFAULT '',
  `follower` varchar(30) NOT NULL DEFAULT '',
  `followtime` datetime DEFAULT NULL,
  PRIMARY KEY (`followee`,`follower`),
  KEY `follower` (`follower`),
  CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`followee`) REFERENCES `users` (`username`),
  CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`follower`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `follow`
-- ----------------------------
BEGIN;
INSERT INTO `follow` VALUES ('art', 'dl2598', '2014-12-02 15:06:45'), ('bl2582', 'dl2598', '2014-12-09 16:16:55'), ('bl2582', 'dy654', '2014-12-03 04:47:41'), ('dl2598', 'bl2582', '2014-12-01 04:48:01'), ('dl2598', 'dy654', '2014-11-02 07:47:48'), ('dy654', 'bl2582', '2014-12-09 16:38:48'), ('dy654', 'dl2598', '2014-12-09 16:17:11'), ('mdd221', 'dl2598', '2014-12-08 23:46:48'), ('red231', 'dl2598', '2014-09-18 04:28:49');
COMMIT;

-- ----------------------------
--  Table structure for `located`
-- ----------------------------
DROP TABLE IF EXISTS `located`;
CREATE TABLE `located` (
  `cid` int(10) NOT NULL DEFAULT '0',
  `vname` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`cid`,`vname`),
  KEY `vname` (`vname`),
  CONSTRAINT `located_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `concert` (`cid`),
  CONSTRAINT `located_ibfk_2` FOREIGN KEY (`vname`) REFERENCES `venue` (`vname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `located`
-- ----------------------------
BEGIN;
INSERT INTO `located` VALUES ('1', 'Barclay Center'), ('11', 'Barclay Center'), ('14', 'Barclay Center'), ('19', 'Barclay Center'), ('21', 'Barclay Center'), ('22', 'Barclay Center'), ('23', 'Barclay Center'), ('25', 'Barclay Center'), ('26', 'Barclay Center'), ('29', 'Barclay Center'), ('5', 'Central Park'), ('10', 'Central Park'), ('18', 'Central Park'), ('27', 'Central Park'), ('28', 'Central Park'), ('3', 'Grand Place'), ('15', 'Grand Place'), ('16', 'Grand Place'), ('2', 'Madison Garden'), ('4', 'Madison Garden'), ('12', 'Madison Garden'), ('20', 'Madison Garden'), ('6', 'Sunshine Park'), ('7', 'Sunshine Park'), ('8', 'Sunshine Park'), ('9', 'Sunshine Park'), ('13', 'Sunshine Park'), ('17', 'Sunshine Park'), ('24', 'Sunshine Park');
COMMIT;

-- ----------------------------
--  Table structure for `plans_attend`
-- ----------------------------
DROP TABLE IF EXISTS `plans_attend`;
CREATE TABLE `plans_attend` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `cid` int(10) NOT NULL DEFAULT '0',
  `plan` text,
  `attended` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`username`,`cid`),
  KEY `cid` (`cid`),
  CONSTRAINT `plans_attend_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `concert` (`cid`),
  CONSTRAINT `plans_attend_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `plans_attend`
-- ----------------------------
BEGIN;
INSERT INTO `plans_attend` VALUES ('dl2598', '6', 'Yes', null), ('dl2598', '7', 'Yes', null), ('dl2598', '9', 'Yes', null), ('dl2598', '11', 'Yes', null), ('dl2598', '14', 'Yes', null), ('dl2598', '15', 'Yes', null), ('dl2598', '17', 'Yes', null), ('dl2598', '25', 'Yes', null), ('dy654', '1', 'Yes', 'No'), ('dy654', '4', 'Yes', 'No');
COMMIT;

-- ----------------------------
--  Table structure for `recommend_type`
-- ----------------------------
DROP TABLE IF EXISTS `recommend_type`;
CREATE TABLE `recommend_type` (
  `cid` int(10) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `rtype` varchar(30) NOT NULL DEFAULT '',
  `rname` varchar(30) NOT NULL,
  PRIMARY KEY (`cid`,`username`,`rtype`,`rname`),
  KEY `rtype` (`rtype`),
  CONSTRAINT `recommend_type_ibfk_2` FOREIGN KEY (`rtype`) REFERENCES `type` (`subtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `recommend_type`
-- ----------------------------
BEGIN;
INSERT INTO `recommend_type` VALUES ('4', 'bl2582', 'Bebob', 'BOB'), ('9', 'dl2598', 'Chicago Blues', 'new list'), ('2', 'mdd221', 'Cool Jazz', 'Jazz List'), ('1', 'mdd221', 'Country Blues', 'Blues List'), ('4', 'dl2598', 'Country Blues', 'nice_music'), ('4', 'dl2598', 'Free Jazz', 'Fancy');
COMMIT;

-- ----------------------------
--  Table structure for `recommendlist`
-- ----------------------------
DROP TABLE IF EXISTS `recommendlist`;
CREATE TABLE `recommendlist` (
  `cid` int(10) NOT NULL DEFAULT '0',
  `username` varchar(30) NOT NULL DEFAULT '',
  `rname` varchar(30) NOT NULL DEFAULT '',
  `rtime` datetime DEFAULT NULL,
  PRIMARY KEY (`cid`,`username`,`rname`),
  KEY `username` (`username`),
  CONSTRAINT `recommendlist_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `concert` (`cid`),
  CONSTRAINT `recommendlist_ibfk_2` FOREIGN KEY (`username`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `recommendlist`
-- ----------------------------
BEGIN;
INSERT INTO `recommendlist` VALUES ('1', 'mdd221', 'Blues List', '2014-12-03 03:09:26'), ('1', 'mdd221', 'Jazz List', '2014-12-07 17:47:08'), ('2', 'mdd221', 'Jazz List', '2014-12-01 21:18:47'), ('4', 'bl2582', 'BOB', '2014-11-11 08:17:18'), ('4', 'dl2598', 'Fancy', '2014-12-01 04:33:13'), ('4', 'mdd221', 'Jazz List', '2014-11-15 08:18:04'), ('5', 'dl2598', 'Fancy', '2014-08-22 04:32:49'), ('7', 'mdd221', 'Jazz List', '2014-12-02 18:13:40'), ('9', 'dl2598', 'new list', '2014-12-09 15:27:07'), ('17', 'dl2598', 'Fancy', '2014-12-02 04:32:46'), ('18', 'mdd221', 'Jazz List', '2014-11-03 17:47:25'), ('21', 'dl2598', 'nice_music', '2014-10-08 03:39:52'), ('29', 'dl2598', 'Fancy', '2014-12-09 16:44:28');
COMMIT;

-- ----------------------------
--  Table structure for `type`
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `subtype` varchar(30) NOT NULL DEFAULT '',
  `type` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`subtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `type`
-- ----------------------------
BEGIN;
INSERT INTO `type` VALUES ('Bebob', 'Jazz'), ('Blues Shouter', 'Blues'), ('Breakbeat', 'Hip Hop'), ('Chicago Blues', 'Blues'), ('Cool Jazz', 'Jazz'), ('Country Blues', 'Blues'), ('Country Rap', 'Hip Hop'), ('Free Jazz', 'Jazz'), ('Freestyle Rap', 'Hip Hop');
COMMIT;

-- ----------------------------
--  Table structure for `user_like`
-- ----------------------------
DROP TABLE IF EXISTS `user_like`;
CREATE TABLE `user_like` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `subtype` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`,`subtype`),
  KEY `subtype` (`subtype`),
  CONSTRAINT `user_like_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`),
  CONSTRAINT `user_like_ibfk_2` FOREIGN KEY (`subtype`) REFERENCES `type` (`subtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_like`
-- ----------------------------
BEGIN;
INSERT INTO `user_like` VALUES ('jerm11', 'Bebob'), ('dl2598', 'Breakbeat'), ('bl2582', 'Chicago Blues'), ('dy654', 'Chicago Blues'), ('bl2582', 'Cool Jazz'), ('dl2598', 'Cool Jazz'), ('dl2598', 'Country Blues'), ('dl2598', 'Free Jazz'), ('dy654', 'Free Jazz'), ('mdd221', 'Freestyle Rap');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `passwords` varchar(40) DEFAULT NULL,
  `namess` varchar(30) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `trustscore` int(10) DEFAULT NULL,
  `lastlogintime` datetime DEFAULT NULL,
  `image` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('111', '11111111', '111', null, null, null, '1', '2014-12-09 16:16:21', null), ('23223', '44444444', '3223', null, null, null, '1', '2014-12-09 08:04:43', null), ('adminstrator', '********', 'admin', '2014-11-01', 'admin@gmail.com', 'New York', '10', '2014-11-23 07:08:46', null), ('art', '11111111', 'Artist Lv', '1989-09-10', 'al@gmail.com', 'Bufflo', '5', '2014-12-07 15:02:05', './images/art.png'), ('bl2582', '44445555', 'Black', '1985-12-10', 'black@gmail.com', 'Boston', '11', '2014-12-09 16:40:23', './images/black.png'), ('dl2598', '22223333', 'Dong Li', '1989-08-15', 'dl2598@nyu.edu', 'Brooklyn', '11', '2014-12-09 16:32:39', './images/dongli.png'), ('dy654', '11112222', 'Dawei Yuan', '1990-11-24', 'dy654@nyu.edu', 'New York', '10', '2014-11-18 06:55:20', null), ('jerm11', '22223333', 'Kay', '1999-10-10', 'gg123432@gmai.com', 'Los Angels', '7', '2014-12-08 23:09:41', null), ('mdd221', '33334444', 'Mark', '1991-05-18', 'mark@gmail.com', 'Los Angels', '2', '2014-12-09 15:43:23', null), ('red231', '66667777', 'Red Violoncello', '1974-06-06', 'red@gmail.com', 'Boston', '10', '2014-11-06 08:33:57', './images/red.png'), ('sasas', '11111111', 'asasas', null, null, null, '1', null, null), ('test', '25d55ad283aa400af464c76d713c07ad', null, null, null, null, '1', null, null), ('tt111', '11111111', 'tim', null, null, null, '1', '2014-12-09 15:57:25', null), ('ttty', '11111111', 'kaka', null, null, null, '1', null, null), ('uuu111', '11112222', 'bear', null, null, null, '1', null, null), ('uuuu', '11111111', 'uuuu', null, null, null, '1', null, null), ('wh09455', '55556666', 'White', '1984-08-06', 'white@gmail.com', 'New York', '10', '2014-11-05 07:10:21', null);
COMMIT;

-- ----------------------------
--  Table structure for `venue`
-- ----------------------------
DROP TABLE IF EXISTS `venue`;
CREATE TABLE `venue` (
  `vname` varchar(30) NOT NULL DEFAULT '',
  `city` varchar(30) DEFAULT NULL,
  `sellinghyperlink` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`vname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `venue`
-- ----------------------------
BEGIN;
INSERT INTO `venue` VALUES ('Barclay Center', 'New York', 'barclaycenter.com'), ('Central Park', 'New York', 'centralpark.com'), ('Grand Place', 'Chicago', 'grandp.com'), ('Madison Garden', 'New York', 'madisongrarden.com'), ('Sunshine Park', 'Orlando', 'sunshinepark.com');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
