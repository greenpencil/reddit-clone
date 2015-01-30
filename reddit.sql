/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50539
Source Host           : localhost:3306
Source Database       : reddit

Target Server Type    : MYSQL
Target Server Version : 50539
File Encoding         : 65001

Date: 2015-01-30 19:16:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(10) NOT NULL,
  `karma` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '1', 'ffffff', '1', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2015_01_29_191221_CreateUsersTable', '1');
INSERT INTO `migrations` VALUES ('2015_01_29_191255_CreatePostsTable', '1');
INSERT INTO `migrations` VALUES ('2015_01_29_191324_CreateSubredditsTable', '1');
INSERT INTO `migrations` VALUES ('2015_01_29_191347_CreateCommentsTable', '1');
INSERT INTO `migrations` VALUES ('2015_01_29_191428_CreateSubscriptionsTable', '1');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subreddit_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `karma` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES ('1', 'Je n\'ai rien à cacher. ', 'default', 'http://jenairienacacher.fr/', '1', '1', '1', '2015-01-29 21:03:07', '2015-01-29 21:03:00');
INSERT INTO `posts` VALUES ('2', 'Les lycéens face aux attentats: le témoignage de Mohamed Kacimi : fiction ou bidon ?', 'default', 'https://pbs.twimg.com/media/B8h10z3IEAEMNhd.jpg', '1', '1', '1', '2015-01-29 21:04:10', '2015-01-29 21:04:13');

-- ----------------------------
-- Table structure for subreddits
-- ----------------------------
DROP TABLE IF EXISTS `subreddits`;
CREATE TABLE `subreddits` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of subreddits
-- ----------------------------
INSERT INTO `subreddits` VALUES ('1', 'france', 'The subreddit for France', '1', '2015-01-29 20:24:39', '2015-01-29 20:24:41');
INSERT INTO `subreddits` VALUES ('2', 'aww', 'Isn\'t it cute', '1', '2015-01-29 20:25:45', '2015-01-29 20:25:43');
INSERT INTO `subreddits` VALUES ('3', 'masseffect', 'This reddit is for people who love the Mass Effect universe', '1', '2015-01-29 20:26:42', '2015-01-29 20:26:39');
INSERT INTO `subreddits` VALUES ('4', 'likeus', 'Subreddit dedicated to the cause of gathering evidence that animals are conscious like us.', '1', '2015-01-29 20:27:14', '2015-01-29 20:27:10');
INSERT INTO `subreddits` VALUES ('5', 'Accounting', 'Seek appropriate professional advice. We have never verified the credentials of any user.', '1', '2015-01-29 20:30:53', '2015-01-29 20:30:51');
INSERT INTO `subreddits` VALUES ('6', 'Kappa', 'Collusion', '1', '2015-01-29 20:35:36', '2015-01-29 20:35:33');

-- ----------------------------
-- Table structure for subscriptions
-- ----------------------------
DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subreddit` int(10) NOT NULL,
  `username` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of subscriptions
-- ----------------------------
INSERT INTO `subscriptions` VALUES ('1', '1', '1', '2015-01-29 21:04:24', '2015-01-29 21:04:28');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Tititesouris', 'tititesouris@laposte.net', '$2y$10$D4Ouwmx2qfRC2r/uJR7IKupbpsyOA.OKdnFQyqniIlQj5FfxqRLRq', null, '2015-01-29 19:23:54', '2015-01-29 19:23:54');
INSERT INTO `users` VALUES ('2', 'greenpencil', 'rstamac@gmail.com', '$2y$10$0rkN2JpyK0wQle5Jv2zWSeDUUbRxvadsYf89BxlE.lD8Xtt811vI.', 'LkykmUnuiLunIcyYCcA5hnPo7zA0gVTCg74xZIqTHvxofKcdJdfeeDiJ3fEi', '2015-01-29 19:23:54', '2015-01-30 16:06:15');
INSERT INTO `users` VALUES ('3', 'newAccount', 'test@test.com', 'password', 'JkFjiXS69TWaDts1MiOQVZMTRLYmSqHQOO3JazVVTfq4sVHs2doh4OVQMhew', '2015-01-30 15:51:49', '2015-01-30 15:52:19');
INSERT INTO `users` VALUES ('4', 'jimj316', 'jimj316@gmail.com', 'jimcat', 'XyM9PBPBxcPMStp3HsCGHxwB5LdPYwG14wpEc7jREhjsNkD8QUA9yeEA9aGY', '2015-01-30 16:06:45', '2015-01-30 16:10:22');
