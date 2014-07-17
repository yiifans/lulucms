-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 06 月 23 日 12:52
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `lulucms`
--
CREATE DATABASE IF NOT EXISTS `lulucms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lulucms`;

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1400502923),
('m130524_201442_init', 1400502936);

-- --------------------------------------------------------

--
-- 表的结构 `model_download`
--

DROP TABLE IF EXISTS `model_download`;
CREATE TABLE IF NOT EXISTS `model_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `att1` tinyint(4) NOT NULL,
  `att2` tinyint(4) NOT NULL,
  `att3` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(120) NOT NULL,
  `title_format` varchar(120) DEFAULT NULL,
  `title_pic` varchar(120) DEFAULT NULL,
  `redirect_url` varchar(120) DEFAULT NULL,
  `keywords` varchar(120) DEFAULT NULL,
  `sub_title` varchar(120) DEFAULT NULL,
  `summary` varchar(500) DEFAULT NULL,
  `content` text,
  `tt` varchar(255) NOT NULL,
  `xxtt` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `model_download`
--

INSERT INTO `model_download` (`id`, `channel_id`, `user_id`, `user_name`, `publish_time`, `edit_time`, `att1`, `att2`, `att3`, `flag`, `status`, `title`, `title_format`, `title_pic`, `redirect_url`, `keywords`, `sub_title`, `summary`, `content`, `tt`, `xxtt`) VALUES
(1, 102, 0, '', '2014-06-05 15:22:27', '2014-06-05 15:22:27', 0, 0, 0, 0, 0, 'a', '0,', 'd', 'c', 'b', 'e', 'f', 'g', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `model_news`
--

DROP TABLE IF EXISTS `model_news`;
CREATE TABLE IF NOT EXISTS `model_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `att1` tinyint(4) NOT NULL,
  `att2` tinyint(4) NOT NULL,
  `att3` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(128) NOT NULL,
  `title_format` varchar(128) DEFAULT NULL,
  `title_pic` varchar(128) DEFAULT NULL,
  `redirect_url` varchar(128) DEFAULT NULL,
  `keywords` varchar(128) DEFAULT NULL,
  `sub_title` varchar(128) DEFAULT NULL,
  `summary` varchar(512) DEFAULT NULL,
  `content` text,
  `source` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `model_news`
--

INSERT INTO `model_news` (`id`, `channel_id`, `user_id`, `user_name`, `publish_time`, `modify_time`, `att1`, `att2`, `att3`, `flag`, `status`, `title`, `title_format`, `title_pic`, `redirect_url`, `keywords`, `sub_title`, `summary`, `content`, `source`, `author`) VALUES
(1, 104, 1, 'admin', '2014-06-08 01:49:21', '2014-06-08 01:49:21', 1, 2, 3, 1, 1, 'a', '0,1,2,', 'c', 'd', 'e', 'f', 'g', '', 'c', NULL),
(2, 104, 1, 'admin', '2014-06-08 02:13:26', '2014-06-08 02:13:26', 2, 0, 0, 1, 1, 'aa', '0,1,', 'cc', 'dd', 'ee', 'ff', 'gg', '', 'c', NULL),
(3, 104, 1, 'admin', '2014-06-08 02:22:51', '2014-06-08 02:22:51', 0, 0, 0, 1, 1, 'ax', '0,1,2,', 'a', 'b', 'c', 'd', 'e', '', 'c', NULL),
(4, 104, 1, 'admin', '2014-06-08 02:30:30', '2014-06-08 02:30:30', 6, 3, 1, 1, 1, 'dsasfasf', '0,1,2,', 'tt', 'xx', 'dd', 'aa', 'sss', '', 'c', NULL),
(5, 104, 1, 'admin', '2014-06-08 02:45:31', '2014-06-08 02:45:31', 2, 3, 4, 6, 1, 'tt', 'i,u,a,', 'x', 'b', 't', 's', 'a', 'bb', 'a', NULL),
(6, 104, 1, 'admin', '2014-06-10 15:34:45', '2014-06-10 15:34:45', 2, 3, 4, 36, 1, '已', 'b,i,u,,', '', '', '', '', '', '忆', 'a', NULL),
(7, 104, 1, 'admin', '2014-06-10 15:43:53', '2014-06-10 15:43:53', 0, 0, 0, 0, 0, 'Yii 与ThinkPHP 对比，说一下优缺点，都用过的可以进来看下 [问题点数：40分]', ',', '', '', '', '有没有既用过Yii 又用过ThinkPHP的', '有没有既用过Yii 又用过ThinkPHP的', '最近一直用ThinkPHP，但每次都听到很多人说Yii特别厉害，特别强尤其是负载能力。\r\n今天下载了Yii 1.1.14最新版，看了下，感觉文件结构比较乱。而且有很多在被引入的数组里面执行PHP。\r\n\r\n\r\n有没有既用过Yii 又用过ThinkPHP的，且对他们都比较熟悉的。\r\n谈一下他们两者的优缺点。', 'c', NULL),
(8, 109, 1, 'admin', '2014-06-10 15:46:01', '2014-06-10 15:46:01', 0, 0, 0, 0, 0, 'Yii 关联查询问题 [问题点数：20分]', ',', '', '', '', '', '', '三张表 A B C\r\n\r\nAB是一对多\r\nBC是一对一\r\n\r\n怎么查询满足C的 最终显示 A 的记录', 'c', NULL),
(9, 108, 1, 'admin', '2014-06-10 23:07:53', '2014-06-10 23:07:53', 0, 0, 0, 0, 0, '女人就像是一列火', ',', '', '', '', '', '', '女人就像是一列火车 她们基本都是在……………逛…………吃…………逛…………吃…………逛…………吃………… 时不时的还555555555……', 'c', NULL),
(10, 104, 1, 'admin', '2014-06-12 14:11:11', '2014-06-12 14:11:11', 1, 3, 4, 18, 1, 'Joining with Relations ', 'i,s,,', '', '', '', '', 'ort the orders b', ' sort the orders by the customer id and the order id. also eager loading "customer"\r\n$orders = Order::find()->joinWith(''customer'')->orderBy(''customer.id, order.id'')->all();\r\n// find all orders that contain books, and eager loading "books"\r\n$orders = Order::find()->innerJoi', 'c', 'adminxxx'),
(11, 104, 1, 'admin', '2014-06-14 09:37:08', '2014-06-14 09:37:08', 1, 2, 2, 6, 0, 'bbbb', 'i,u,,', '', '', '', '', 'asdf', '', 'c', 'admin'),
(12, 104, 1, 'admin', '2014-06-14 09:42:00', '2014-06-14 09:42:00', 1, 2, 2, 6, 0, 'bbbb', 'i,u,,', '', '', '', '', 'asdf', '', 'c', 'admin'),
(13, 108, 1, 'admin', '2014-06-14 13:37:25', '2014-06-14 13:37:25', 2, 4, 6, 22, 0, 'gggbbb', 'i,u,,', '', '', '', '', 'aa', 'bb', 'c', 'admin'),
(14, 104, 1, 'admin', '2014-06-21 15:43:28', '2014-06-21 15:43:28', 1, 2, 3, 10, 1, '基本原则在', 'i,u,,', '', '', '', '', '式', '了', 'c', 'admin'),
(15, 104, 1, 'admin', '2014-06-21 15:43:43', '2014-06-21 15:43:43', 0, 0, 0, 0, 0, '民', ',', '在', '', '', '', '', '', 'c', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `model_test`
--

DROP TABLE IF EXISTS `model_test`;
CREATE TABLE IF NOT EXISTS `model_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `att1` tinyint(4) NOT NULL,
  `att2` tinyint(4) NOT NULL,
  `att3` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(128) NOT NULL,
  `title_format` varchar(128) DEFAULT NULL,
  `title_pic` varchar(128) DEFAULT NULL,
  `redirect_url` varchar(128) DEFAULT NULL,
  `keywords` varchar(128) DEFAULT NULL,
  `sub_title` varchar(128) DEFAULT NULL,
  `summary` varchar(512) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `model_video`
--

DROP TABLE IF EXISTS `model_video`;
CREATE TABLE IF NOT EXISTS `model_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `att1` tinyint(4) NOT NULL,
  `att2` tinyint(4) NOT NULL,
  `att3` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(128) NOT NULL,
  `title_format` varchar(128) DEFAULT NULL,
  `title_pic` varchar(128) DEFAULT NULL,
  `redirect_url` varchar(128) DEFAULT NULL,
  `keywords` varchar(128) DEFAULT NULL,
  `sub_title` varchar(128) DEFAULT NULL,
  `summary` varchar(512) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `model_xxx`
--

DROP TABLE IF EXISTS `model_xxx`;
CREATE TABLE IF NOT EXISTS `model_xxx` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `att1` tinyint(4) NOT NULL,
  `att2` tinyint(4) NOT NULL,
  `att3` tinyint(4) NOT NULL,
  `flag` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(128) NOT NULL,
  `title_format` varchar(128) DEFAULT NULL,
  `title_pic` varchar(128) DEFAULT NULL,
  `redirect_url` varchar(128) DEFAULT NULL,
  `keywords` varchar(128) DEFAULT NULL,
  `sub_title` varchar(128) DEFAULT NULL,
  `summary` varchar(512) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin888', '4vm-qK-cfxgIJLEYtXNyBYVc4UaXbYN.', '$2y$13$fsfov.z5NKSQKO2nguZIoO7uxJ.78JqMoXmYIh3PEN9LNHIeS1.4W', NULL, 'admin@admin.com', 10, 10, 1400767208, 1400767208),
(2, 'admin111', 'Lq29qqtiJz5ZXOP617QzfAstO8nMAXsf', '$2y$13$dm49MgM7CLitGSvwDZXuO.Ol.CNLOuF13jfzZYiIcVqZaDZd4W.YK', NULL, 'admin111@admin.com', 10, 10, 1400939375, 1400939375);

-- --------------------------------------------------------

--
-- 表的结构 `yii_channel`
--

DROP TABLE IF EXISTS `yii_channel`;
CREATE TABLE IF NOT EXISTS `yii_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `name_alias` varchar(120) DEFAULT NULL,
  `name_url` varchar(120) DEFAULT NULL,
  `redirect_url` varchar(120) DEFAULT NULL,
  `is_leaf` tinyint(1) NOT NULL,
  `is_nav` tinyint(1) NOT NULL,
  `sort_num` int(11) NOT NULL DEFAULT '0',
  `table` varchar(80) DEFAULT NULL,
  `channel_tpl` varchar(64) DEFAULT NULL,
  `list_tpl` varchar(64) DEFAULT NULL,
  `detail_tpl` varchar(64) DEFAULT NULL,
  `page_size` int(11) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL,
  `note2` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=122 ;

--
-- 转存表中的数据 `yii_channel`
--

INSERT INTO `yii_channel` (`id`, `parent_id`, `name`, `name_alias`, `name_url`, `redirect_url`, `is_leaf`, `is_nav`, `sort_num`, `table`, `channel_tpl`, `list_tpl`, `detail_tpl`, `page_size`, `note`, `note2`) VALUES
(95, 0, '下载', '下载', '', '', 0, 0, 0, 'model_download', 'channel.php', 'list.php', 'detail.php', NULL, '', ''),
(102, 95, '软件', '软件', '', '', 1, 0, 0, 'model_download', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(103, 0, '新闻中心', '新闻中心', 'news', '', 0, 0, 0, 'model_news', 'channel.php', 'list.php', 'detail.php', NULL, '', ''),
(104, 103, '国际人物', '国际人物', '', '', 1, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(105, 103, '体育新闻', '体育新闻', '', '', 1, 0, 0, 'model_news', 'channel.php', 'list.php', 'detail.php', NULL, '', ''),
(106, 103, '娱乐新闻', '娱乐新闻', '', '', 1, 0, 0, 'model_news', 'channel.php', 'list.php', 'detail.php', NULL, '', ''),
(107, 103, '国内新闻', '国内新闻', '', '', 0, 0, 0, 'model_news', 'channel.php', 'list.php', 'detail.php', NULL, '', ''),
(110, 107, '时政新闻', '时政新闻', '', '', 1, 0, 0, 'model_news', 'channel.php', 'list.php', 'detail.php', NULL, '', ''),
(111, 107, '港澳台新闻', '港澳台新闻', '', '', 1, 0, 0, 'model_news', 'channel.php', 'list.php', 'detail.php', NULL, '', ''),
(112, 0, '视频', '视频', '', '', 0, 0, 0, 'model_video', '7', '7', '6', NULL, '', ''),
(118, 112, '爱情', '爱情', '', '', 1, 0, 0, 'model_video', '7', '7', '6', NULL, '', ''),
(119, 112, '恐怖', '恐怖', '', '', 1, 0, 0, 'model_video', '7', '7', '6', NULL, '', ''),
(120, 0, 'yyyy', 'yyyy', '', '', 0, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(121, 0, '测试', '测试', '', '', 0, 0, 0, 'model_test', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_config`
--

DROP TABLE IF EXISTS `yii_config`;
CREATE TABLE IF NOT EXISTS `yii_config` (
  `scope` varchar(64) NOT NULL,
  `variable` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `value` text,
  `description` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`variable`),
  UNIQUE KEY `variable` (`variable`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yii_config`
--

INSERT INTO `yii_config` (`scope`, `variable`, `name`, `value`, `description`) VALUES
('seo', 'seo_description', '', 'c', 'seo_description'),
('seo', 'seo_keywords', '', 'b', 'seo_keywords'),
('seo', 'seo_title', '', 'a', 'seo_title'),
('site', 'site_admin_email', '管理员邮箱', 'e', ''),
('site', 'site_copyright', 'site_copyright', 'g', ''),
('site', 'site_icp', 'site_icp', 'f', ''),
('site', 'site_logo', 'site_logo', 'd', ''),
('site', 'site_name', '站点名称', '内容管理系统——LuLu CMS ', ''),
('site', 'site_path', 'site_path', '/lulu', ''),
('site', 'site_stats', 'site_stats', 'h', ''),
('site', 'site_status', 'site_status', '1', ''),
('site', 'site_status_message', 'site_status_message', 'i', ''),
('site', 'site_url', '网站url', 'b', '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table`
--

DROP TABLE IF EXISTS `yii_define_table`;
CREATE TABLE IF NOT EXISTS `yii_define_table` (
  `name` varchar(80) CHARACTER SET gbk NOT NULL,
  `name_en` varchar(80) CHARACTER SET gbk NOT NULL,
  `description` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `back_action_index` tinyint(1) DEFAULT '0',
  `back_action_create` tinyint(1) DEFAULT '0',
  `back_action_update` tinyint(1) DEFAULT '0',
  `back_action_delete` tinyint(1) DEFAULT '0',
  `back_action_other` tinyint(1) DEFAULT '0',
  `back_action_custom` varchar(512) DEFAULT NULL,
  `front_action_channel` tinyint(1) DEFAULT '0',
  `front_action_list` tinyint(1) DEFAULT '0',
  `front_action_detail` tinyint(1) DEFAULT '0',
  `front_action_search` tinyint(1) DEFAULT '0',
  `front_action_index` tinyint(1) DEFAULT '0',
  `front_action_create` tinyint(1) DEFAULT '0',
  `front_action_update` tinyint(1) DEFAULT '0',
  `front_action_delete` tinyint(1) DEFAULT '0',
  `front_action_other` tinyint(1) DEFAULT '0',
  `front_action_custom` varchar(512) DEFAULT NULL,
  `note` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`name_en`),
  UNIQUE KEY `name` (`name_en`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yii_define_table`
--

INSERT INTO `yii_define_table` (`name`, `name_en`, `description`, `is_default`, `back_action_index`, `back_action_create`, `back_action_update`, `back_action_delete`, `back_action_other`, `back_action_custom`, `front_action_channel`, `front_action_list`, `front_action_detail`, `front_action_search`, `front_action_index`, `front_action_create`, `front_action_update`, `front_action_delete`, `front_action_other`, `front_action_custom`, `note`) VALUES
('下载', 'model_download', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
('新闻', 'model_news', 'xxx', 1, 0, 0, 0, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 'bbb'),
('测试表nnn', 'model_test', '测试表', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'ddd'),
('视频', 'model_video', 'nnn', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nnn'),
('xxx', 'model_xxx', 'xxx', 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 'xxx');

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table_field`
--

DROP TABLE IF EXISTS `yii_define_table_field`;
CREATE TABLE IF NOT EXISTS `yii_define_table_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(80) NOT NULL,
  `name` varchar(80) CHARACTER SET gbk NOT NULL,
  `name_en` varchar(80) CHARACTER SET gbk NOT NULL,
  `type` varchar(80) CHARACTER SET gbk NOT NULL,
  `length` int(11) DEFAULT NULL,
  `is_null` tinyint(1) NOT NULL DEFAULT '1',
  `is_main` tinyint(1) NOT NULL DEFAULT '1',
  `is_sys` tinyint(1) NOT NULL DEFAULT '0',
  `sort_num` int(11) DEFAULT '0',
  `note` varchar(200) DEFAULT NULL,
  `front_status` tinyint(1) NOT NULL DEFAULT '1',
  `front_fun_add` varchar(64) DEFAULT NULL,
  `front_fun_update` varchar(64) DEFAULT NULL,
  `front_fun_show` varchar(64) DEFAULT NULL,
  `front_form_type` varchar(64) DEFAULT NULL,
  `front_form_option` varchar(128) DEFAULT NULL,
  `front_form_default` varchar(128) DEFAULT NULL,
  `front_form_source` varchar(512) DEFAULT NULL,
  `front_form_html` varchar(512) DEFAULT NULL,
  `front_note` varchar(512) DEFAULT NULL,
  `back_status` tinyint(1) NOT NULL DEFAULT '1',
  `back_fun_add` varchar(64) DEFAULT NULL,
  `back_fun_update` varchar(64) DEFAULT NULL,
  `back_fun_show` varchar(64) DEFAULT NULL,
  `back_form_type` varchar(64) DEFAULT NULL,
  `back_form_option` varchar(128) DEFAULT NULL,
  `back_form_default` varchar(128) DEFAULT NULL,
  `back_form_source` varchar(512) DEFAULT NULL,
  `back_form_html` varchar(512) DEFAULT NULL,
  `back_note` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=181 ;

--
-- 转存表中的数据 `yii_define_table_field`
--

INSERT INTO `yii_define_table_field` (`id`, `table`, `name`, `name_en`, `type`, `length`, `is_null`, `is_main`, `is_sys`, `sort_num`, `note`, `front_status`, `front_fun_add`, `front_fun_update`, `front_fun_show`, `front_form_type`, `front_form_option`, `front_form_default`, `front_form_source`, `front_form_html`, `front_note`, `back_status`, `back_fun_add`, `back_fun_update`, `back_fun_show`, `back_form_type`, `back_form_option`, `back_form_default`, `back_form_source`, `back_form_html`, `back_note`) VALUES
(126, 'model_download', '副标题', 'sub_title', 'varchar', 120, 0, 1, 0, 0, '0', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(127, 'model_download', '简介', 'summary', 'varchar', 512, 0, 1, 0, 0, '0', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(128, 'model_download', '内容', 'content', 'TEXT', NULL, 0, 1, 0, 0, '0', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(133, 'model_download', 'tt', 'tt', 'VARCHAR', 255, 1, 1, 1, NULL, '', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(134, 'model_download', 'xxtt', 'xxtt', 'VARCHAR', 255, 0, 0, 0, NULL, '', 0, '', '', '', 'text', '', '', '', '', '', 0, '', '', '', 'text', '', '', '', '', ''),
(135, 'model_news', '标题', 'title', 'varchar', 128, 0, 1, 1, 1, '标题', 1, '', '', '', 'text', '', '', '', '', '', 1, '', '', '', 'text', '', '', '', '', ''),
(136, 'model_news', '标题格式', 'title_format', 'varchar', 128, 1, 1, 1, 2, '标题格式', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(137, 'model_news', '自定义属性', 'att', 'tinyint', 4, 1, 1, 1, 3, '自定义属性', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(138, 'model_news', '聚合标签', 'flag', 'tinyint', 4, 1, 1, 1, 4, '聚合标签', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(139, 'model_news', '状态', 'status', 'tinyint', 1, 1, 1, 1, 5, '状态', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(140, 'model_news', '标题图片', 'title_pic', 'varchar', 128, 1, 1, 1, 6, '标题图片', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(141, 'model_news', '转向连接', 'redirect_url', 'varchar', 128, 1, 1, 1, 7, '转向连接', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(142, 'model_news', '关键字', 'keywords', 'varchar', 128, 1, 1, 1, 8, '关键字', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(143, 'model_news', '副标题', 'sub_title', 'varchar', 128, 1, 1, 1, 9, '副标题', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(144, 'model_news', '简介', 'summary', 'varchar', 512, 1, 1, 1, 10, '简介', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(145, 'model_news', '内容', 'content', 'text', NULL, 0, 0, 0, 11, '内容', 1, '', '', '', 'text', '', '', '', '', '', 1, '', '', '', 'textarea', 'rows=>10', '', '', '', ''),
(146, 'model_news', '来源', 'source', 'VARCHAR', 255, 0, 1, 0, NULL, '', 1, '', '', '', 'text', '', '', '', '', '', 1, '', '', '', 'select', '', 'c', 'a=>测试a\r\nb=>测试b\r\nc=>测试c\r\nd=>测试d', '', ''),
(147, 'model_video', '标题', 'title', 'varchar', 128, 0, 1, 1, 1, '标题', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(148, 'model_video', '标题格式', 'title_format', 'varchar', 128, 1, 1, 1, 2, '标题格式', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(149, 'model_video', '自定义属性', 'att', 'tinyint', 4, 1, 1, 1, 3, '自定义属性', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(150, 'model_video', '聚合标签', 'flag', 'tinyint', 4, 1, 1, 1, 4, '聚合标签', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(151, 'model_video', '状态', 'status', 'tinyint', 1, 1, 1, 1, 5, '状态', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(152, 'model_video', '标题图片', 'title_pic', 'varchar', 128, 1, 1, 1, 6, '标题图片', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(153, 'model_video', '转向连接', 'redirect_url', 'varchar', 128, 1, 1, 1, 7, '转向连接', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(154, 'model_video', '关键字', 'keywords', 'varchar', 128, 1, 1, 1, 8, '关键字', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(155, 'model_video', '副标题', 'sub_title', 'varchar', 128, 1, 1, 1, 9, '副标题', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(156, 'model_video', '简介', 'summary', 'varchar', 512, 1, 1, 1, 10, '简介', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(157, 'model_video', '内容', 'content', 'text', NULL, 1, 1, 0, 11, '内容', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(158, 'model_test', '标题', 'title', 'varchar', 128, 0, 1, 1, 1, '标题', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(159, 'model_test', '标题格式', 'title_format', 'varchar', 128, 1, 1, 1, 2, '标题格式', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(160, 'model_test', '自定义属性', 'att', 'tinyint', 4, 1, 1, 1, 3, '自定义属性', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(161, 'model_test', '聚合标签', 'flag', 'tinyint', 4, 1, 1, 1, 4, '聚合标签', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(162, 'model_test', '状态', 'status', 'tinyint', 1, 1, 1, 1, 5, '状态', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(163, 'model_test', '标题图片', 'title_pic', 'varchar', 128, 1, 1, 1, 6, '标题图片', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(164, 'model_test', '转向连接', 'redirect_url', 'varchar', 128, 1, 1, 1, 7, '转向连接', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(165, 'model_test', '关键字', 'keywords', 'varchar', 128, 1, 1, 1, 8, '关键字', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(166, 'model_test', '副标题', 'sub_title', 'varchar', 128, 1, 1, 1, 9, '副标题', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(167, 'model_test', '简介', 'summary', 'varchar', 512, 1, 1, 1, 10, '简介', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(168, 'model_test', '内容', 'content', 'text', NULL, 0, 1, 0, 11, '内容', 1, '', '', '', 'text', '', '', '', NULL, NULL, 1, '', '', '', 'textarea', '', '', '', NULL, NULL),
(169, 'model_news', '作者', 'author', 'varchar', 255, 1, 0, 0, NULL, '', 1, '', '', '', 'text', '', '', '', NULL, NULL, 1, '', '', '', 'text', '', 'admin', '', NULL, NULL),
(170, 'model_xxx', '标题', 'title', 'varchar', 128, 0, 1, 1, 1, '标题', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(171, 'model_xxx', '标题格式', 'title_format', 'varchar', 128, 1, 1, 1, 2, '标题格式', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(172, 'model_xxx', '自定义属性', 'att', 'tinyint', 4, 1, 1, 1, 3, '自定义属性', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(173, 'model_xxx', '聚合标签', 'flag', 'tinyint', 4, 1, 1, 1, 4, '聚合标签', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(174, 'model_xxx', '状态', 'status', 'tinyint', 1, 1, 1, 1, 5, '状态', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(175, 'model_xxx', '标题图片', 'title_pic', 'varchar', 128, 1, 1, 1, 6, '标题图片', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(176, 'model_xxx', '转向连接', 'redirect_url', 'varchar', 128, 1, 1, 1, 7, '转向连接', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(177, 'model_xxx', '关键字', 'keywords', 'varchar', 128, 1, 1, 1, 8, '关键字', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(178, 'model_xxx', '副标题', 'sub_title', 'varchar', 128, 1, 1, 1, 9, '副标题', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(179, 'model_xxx', '简介', 'summary', 'varchar', 512, 1, 1, 1, 10, '简介', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(180, 'model_xxx', '内容', 'content', 'text', NULL, 1, 1, 0, 11, '内容', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table_field_meta`
--

DROP TABLE IF EXISTS `yii_define_table_field_meta`;
CREATE TABLE IF NOT EXISTS `yii_define_table_field_meta` (
  `front_status` tinyint(1) NOT NULL DEFAULT '1',
  `front_fun_add` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_fun_update` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_fun_show` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_form_type` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_form_option` varchar(512) CHARACTER SET gbk DEFAULT NULL,
  `front_form_default` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_form_source` text,
  `front_form_html` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_status` tinyint(1) NOT NULL DEFAULT '1',
  `back_fun_add` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_fun_update` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_fun_show` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_form_type` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_form_option` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_form_default` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_form_source` text,
  `back_form_html` varchar(80) CHARACTER SET gbk DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yii_dict`
--

DROP TABLE IF EXISTS `yii_dict`;
CREATE TABLE IF NOT EXISTS `yii_dict` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `value` varchar(1024) DEFAULT NULL,
  `datatype` varchar(32) DEFAULT NULL,
  `cache_key` varchar(64) NOT NULL,
  `is_sys` tinyint(1) NOT NULL DEFAULT '0',
  `sort_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `yii_dict`
--

INSERT INTO `yii_dict` (`id`, `parent_id`, `name`, `value`, `datatype`, `cache_key`, `is_sys`, `sort_num`) VALUES
(1, 0, '内容属性', 'xxx', '', 'content_att', 0, 0),
(2, 0, 'nn', NULL, NULL, 'nn', 0, 0),
(5, 1, 'a', 's', 'string', 'content_att', 0, 0),
(6, 1, 'bb', 's', '', 'content_att', 0, 0),
(7, 1, 'bbb', '', 'string', 'content_att', 0, 0),
(8, 5, 'b', '', 'string', 'content_att', 0, 0),
(10, 8, 'c', 'bbbb', 'string', 'content_att', 0, 0),
(11, 0, '内容属性名称', NULL, NULL, 'content_att_name', 0, 0),
(12, 0, '内容属性1', NULL, NULL, 'content_att1', 0, 0),
(13, 0, '内容属性2', NULL, NULL, 'content_att2', 0, 0),
(14, 0, '内容属性3', NULL, NULL, 'content_att3', 0, 0),
(15, 0, '聚合标签', NULL, NULL, 'content_flag', 0, 0),
(16, 12, '一级头条', '1', 'int', 'content_att1', 0, 0),
(17, 12, '二级头条', '2', 'int', 'content_att1', 0, 0),
(18, 12, '三级头条', '3', 'int', 'content_att1', 0, 0),
(19, 12, '四级头条', '4', 'int', 'content_att1', 0, 0),
(20, 12, '五级头条', '5', 'int', 'content_att1', 0, 0),
(21, 12, '六级头条', '6', 'int', 'content_att1', 0, 0),
(22, 12, '七级头条', '7', 'int', 'content_att1', 0, 0),
(23, 12, '八级头条', '8', 'int', 'content_att1', 0, 0),
(24, 12, '九级头条', '9', 'int', 'content_att1', 0, 0),
(25, 11, '内容属性1文本', '头条', 'string', 'content_att_name', 0, 0),
(26, 11, '内容属性2文本', '推荐', 'string', 'content_att_name', 0, 0),
(27, 11, '内容属性3文本', '置顶', 'string', 'content_att_name', 0, 0),
(28, 0, '婚姻', NULL, NULL, 'marital', 0, 0),
(29, 28, '未婚', '1', 'string', 'marital', 0, 0),
(30, 28, '已婚', '2', 'string', 'marital', 0, 0),
(31, 28, '离异', '3', 'string', 'marital', 0, 0),
(32, 28, '丧偶', '4', 'string', 'marital', 0, 0),
(33, 1, 'ee', 'ee', 'string', 'content_att', 0, 0),
(34, 10, 'dddd', 'bbb', 'string', 'content_att', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `yii_dict_category`
--

DROP TABLE IF EXISTS `yii_dict_category`;
CREATE TABLE IF NOT EXISTS `yii_dict_category` (
  `key` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `is_sys` tinyint(1) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yii_dict_category`
--

INSERT INTO `yii_dict_category` (`key`, `name`, `description`, `is_sys`) VALUES
('content_att1', '内容自定义属性1值', '', 1),
('content_att2', '内容自定义属性2值', '', 1),
('content_att3', '内容自定义属性3值', '', 1),
('content_atts', '内容自定义属性名称', '', 1),
('content_flag', '内容聚合标签', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `yii_fragment_category`
--

DROP TABLE IF EXISTS `yii_fragment_category`;
CREATE TABLE IF NOT EXISTS `yii_fragment_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `max_num` int(11) NOT NULL,
  `is_text` tinyint(1) NOT NULL,
  `sort_num` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yii_fragment_html`
--

DROP TABLE IF EXISTS `yii_fragment_html`;
CREATE TABLE IF NOT EXISTS `yii_fragment_html` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `data` text NOT NULL,
  `sort_num` int(11) NOT NULL,
  `note` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yii_fragment_text`
--

DROP TABLE IF EXISTS `yii_fragment_text`;
CREATE TABLE IF NOT EXISTS `yii_fragment_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `title_style` varchar(120) DEFAULT NULL,
  `url` varchar(120) DEFAULT NULL,
  `sub_title` varchar(120) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `note` int(11) DEFAULT NULL,
  `note2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yii_model_myttt`
--

DROP TABLE IF EXISTS `yii_model_myttt`;
CREATE TABLE IF NOT EXISTS `yii_model_myttt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catalog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_headline` tinyint(4) NOT NULL,
  `is_top` tinyint(4) NOT NULL,
  `is_recommend` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(80) NOT NULL,
  `title_format` varchar(80) NOT NULL,
  `title_redirect_url` varchar(80) NOT NULL,
  `title_pic` varchar(80) NOT NULL,
  `note` varchar(80) NOT NULL,
  `note2` varchar(80) NOT NULL,
  `aaa` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yii_page`
--

DROP TABLE IF EXISTS `yii_page`;
CREATE TABLE IF NOT EXISTS `yii_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `publish_time` datetime NOT NULL,
  `modify_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL,
  `title` varchar(128) NOT NULL,
  `title_format` varchar(64) DEFAULT NULL,
  `title_pic` varchar(128) DEFAULT NULL,
  `summary` varchar(512) DEFAULT NULL,
  `body` text NOT NULL,
  `tpl` varchar(64) NOT NULL,
  `seo_title` varchar(128) DEFAULT NULL,
  `seo_keywords` varchar(128) DEFAULT NULL,
  `seo_description` varchar(512) DEFAULT NULL,
  `sort_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `yii_page`
--

INSERT INTO `yii_page` (`id`, `category_id`, `publish_time`, `modify_time`, `status`, `title`, `title_format`, `title_pic`, `summary`, `body`, `tpl`, `seo_title`, `seo_keywords`, `seo_description`, `sort_num`) VALUES
(1, 2, '2014-06-21 22:26:38', '2014-06-21 14:26:38', 0, 'asdf', 'asdf', '', '', 'd', '0', '', '', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `yii_page_category`
--

DROP TABLE IF EXISTS `yii_page_category`;
CREATE TABLE IF NOT EXISTS `yii_page_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `sort_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `yii_page_category`
--

INSERT INTO `yii_page_category` (`id`, `name`, `description`, `sort_num`) VALUES
(1, 'ddd', 'aadsf', 0),
(2, 'xxx', 'xxx', 0),
(3, 'bbb', 'bbb', 0);

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_channel`
--

DROP TABLE IF EXISTS `yii_tpl_channel`;
CREATE TABLE IF NOT EXISTS `yii_tpl_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `file_path` varchar(80) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_content` mediumtext,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `yii_tpl_channel`
--

INSERT INTO `yii_tpl_channel` (`id`, `category_id`, `table_id`, `name`, `file_path`, `file_name`, `file_content`, `create_time`, `modify_time`, `note`) VALUES
(7, 0, 1, 'aa', 'content', 'channel_aa', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\grid\\GridView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var yii\\data\\ActiveDataProvider $dataProvider\r\n * @var app\\models\\search\\CatalogSearch $searchModel\r\n */\r\n\r\n$this->title = $currentChannel->name;\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-index">\r\n\r\n<?php foreach ($dataList as $name=>$value):?>\r\n		<div class="tbox">\r\n			<div class="hd">\r\n				<h2>\r\n				<?php \r\n					$channel=$this->params[''cachedChannel''][$name];\r\n					if($channel[''is_leaf''])\r\n					{\r\n						echo ''<li><a href="index.php?r=content/list&chnid=''.$channel[''id''].''"><font color="red">''.$channel[''name''].''</font></a></li>'';\r\n					}\r\n					else\r\n					{\r\n						echo ''<li><a href="index.php?r=content/index&chnid=''.$channel[''id''].''">''.$channel[''name''].''</a></li>'';\r\n					}\r\n				?></h2>\r\n			</div>\r\n			<div class="bd">\r\n				<table width="100%" class="table">\r\n					<?php foreach ($value as $row ): ?>\r\n					<tr>\r\n					<td><a href="index.php?r=content/view&id=<?php echo $row[''id'']?>&chnid=<?php echo $row[''channel_id'']?>" target="_blank"><?php echo $row[''title'']?></a></td>\r\n					<td width="180px"><?php echo $row[''publish_time'']?></td>\r\n					</tr>\r\n					<?php endforeach;?>\r\n				</table>\r\n\r\n			</div>\r\n		</div>\r\n	<?php endforeach;?>\r\n	\r\n\r\n</div>\r\n', NULL, NULL, ''),
(8, 0, 2, 'bb', 'content', 'channel_bb', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\grid\\GridView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var yii\\data\\ActiveDataProvider $dataProvider\r\n * @var app\\models\\search\\CatalogSearch $searchModel\r\n */\r\n\r\n$this->title = $currentChannel->name;\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-index">\r\n\r\n<?php foreach ($dataList as $name=>$value):?>\r\n		<div class="tbox">\r\n			<div class="hd">\r\n				<h2>\r\n				<?php \r\n					$channel=$this->params[''cachedChannel''][$name];\r\n					if($channel[''is_leaf''])\r\n					{\r\n						echo ''<li><a href="index.php?r=content/list&chnid=''.$channel[''id''].''"><font color="red">''.$channel[''name''].''</font></a></li>'';\r\n					}\r\n					else\r\n					{\r\n						echo ''<li><a href="index.php?r=content/index&chnid=''.$channel[''id''].''">''.$channel[''name''].''</a></li>'';\r\n					}\r\n				?></h2>\r\n			</div>\r\n			<div class="bd">\r\n				<ul>\r\n				<?php foreach ($value as $data):?>\r\n					<li><?php echo $data[''title'']?></li>\r\n					<?php endforeach;?>\r\n				</ul>\r\n			</div>\r\n		</div>\r\n	<?php endforeach;?>\r\n	\r\n\r\n</div>\r\n', NULL, NULL, ''),
(9, 0, 5, 'cc', 'content', 'channel_cc', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\grid\\GridView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var yii\\data\\ActiveDataProvider $dataProvider\r\n * @var app\\models\\search\\CatalogSearch $searchModel\r\n */\r\n\r\n$this->title = $currentChannel->name;\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-index">\r\n\r\n<?php\r\n	$index=0;\r\n	\r\n 	foreach ($dataList as $id=>$value)\r\n	{\r\n		if(count($value)==0)\r\n		{\r\n			//continue;\r\n		}\r\n		\r\n		$channel=$this->params[''cachedChannel''][$id];\r\n		\r\n		$index+=1;\r\n		if($index%2==0)\r\n		{\r\n			$style='' floatr'';\r\n		}\r\n		else \r\n		{\r\n			$style='' floatl'';\r\n		}\r\n?>\r\n	<div class="tbox border <?php echo $style; ?>" style="width:49%;">\r\n		<div class="hd">\r\n			<h2>\r\n			<?php \r\n				if($channel[''is_leaf''])\r\n				{\r\n					echo ''<a href="index.php?r=content/list&chnid=''.$channel[''id''].''"><font color="red">''.$channel[''name''].''</font></a>'';\r\n				}\r\n				else\r\n				{\r\n					echo ''<a href="index.php?r=content/index&chnid=''.$channel[''id''].''">''.$channel[''name''].''</a>'';\r\n				}\r\n			?></h2>\r\n		</div>\r\n		<div class="bd">\r\n			<ul>\r\n				<?php foreach ($value as $row ): ?>\r\n				<li><a href="index.php?r=content/view&id=<?php echo $row[''id'']?>&chnid=<?php echo $row[''channel_id'']?>" target="_blank"><?php echo $row[''title'']?></a>\r\n				<span class="time"><?php echo $row[''publish_time'']?></span></li>\r\n				<?php endforeach;?>\r\n			</ul>\r\n		</div>\r\n	</div>\r\n<?php \r\n		if($index%2==0)\r\n		{\r\n			echo ''<div class="clear"></div>'';\r\n		}\r\n	}\r\n?>\r\n	\r\n\r\n</div>\r\n', NULL, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_channel_category`
--

DROP TABLE IF EXISTS `yii_tpl_channel_category`;
CREATE TABLE IF NOT EXISTS `yii_tpl_channel_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `yii_tpl_channel_category`
--

INSERT INTO `yii_tpl_channel_category` (`id`, `name`, `note`) VALUES
(1, 'aa', 'aa'),
(2, 'bb', 'bb'),
(3, 'ccq', 'ccq'),
(4, 'q', 'q');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_form`
--

DROP TABLE IF EXISTS `yii_tpl_form`;
CREATE TABLE IF NOT EXISTS `yii_tpl_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '1：前台表单,2：后台表单',
  `name` varchar(80) NOT NULL,
  `file_path` varchar(80) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_content` mediumtext,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `yii_tpl_form`
--

INSERT INTO `yii_tpl_form` (`id`, `category_id`, `table_id`, `type`, `name`, `file_path`, `file_name`, `file_content`, `create_time`, `modify_time`, `note`) VALUES
(9, 0, 1, 0, 'aa', 'content', 'form_back_aa', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\widgets\\ActiveForm;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var app\\models\\Catalog $model\r\n */\r\n\r\n$this->title = ''Create ''.$channelModel->name;\r\n$this->params[''breadcrumbs''][] = [''label'' => ''Goods(Clothing)'', ''url'' => [''index'']];\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="content-create">\r\n\r\n	<h1><?= Html::encode($this->title) ?></h1>\r\n\r\n<div class="content-form">\r\n\r\n	<?php $form = ActiveForm::begin(); ?>\r\n	<input type="hidden" id="content-channel_id" name="Content[channel_id]" value="<?php echo $chnid?>"/>\r\n<table>\r\n<tr>\r\n<td>title</td>\r\n<td><input type="text" id="content-title" class="form-control" name="Content[title]"/></td>\r\n</tr>\r\n\r\n\r\n<tr>\r\n<td>title_pic</td>\r\n<td><input type="text" id="content-title_pic" class="form-control" name="Content[title_pic]"/></td>\r\n</tr>\r\n\r\n<tr>\r\n<td>content</td>\r\n<td><textarea  id="content-content" class="form-control" name="Content[content]" rows="6" ></textarea></td>\r\n</tr>\r\n\r\n<tr>\r\n<td>username</td>\r\n<td><input type="text" id="content-username" class="form-control" name="Content[username]"/></td>\r\n</tr>\r\n\r\n<tr>\r\n<td>note</td>\r\n<td><input type="text" id="content-note" class="form-control" name="Content[note]"/></td>\r\n</tr>\r\n\r\n<tr>\r\n<td>price</td>\r\n<td><input type="text" id="content-price" class="form-control" name="Content[price]"/></td>\r\n</tr>\r\n\r\n<tr>\r\n<td>weight</td>\r\n<td><input type="text" id="content-weight" class="form-control" name="Content[weight]"/></td>\r\n</tr>\r\n\r\n</table>\r\n		\r\n	\r\n\r\n		<div class="form-group">\r\n			<?= Html::submitButton( ''Create'' , [''class'' =>  ''btn btn-primary'']) ?>\r\n		</div>\r\n\r\n	<?php ActiveForm::end(); ?>\r\n\r\n</div>\r\n	\r\n\r\n\r\n</div>\r\n', NULL, NULL, ''),
(10, 0, 1, 1, 'aa', 'content', 'form_front_aa', 'aa', NULL, NULL, ''),
(11, 0, 5, 0, 'cc', 'content', 'form_back_cc', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\widgets\\ActiveForm;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var app\\models\\Catalog $model\r\n */\r\n\r\n$this->title = ''Create Content'';\r\n$this->params[''breadcrumbs''][] = [''label'' => ''Catalogs'', ''url'' => [''index'']];\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-create">\r\n\r\n	<h1><?= Html::encode($this->title) ?></h1>\r\n\r\n<div class="content-form">\r\n\r\n	<?php $form = ActiveForm::begin(); ?>\r\n	<input type="hidden" id="content-channel_id" name="Content[channel_id]" value="<?php echo $chnid?>"/>\r\n<table>\r\n<tr>\r\n<td>title</td>\r\n<td><input type="text" id="content-title" class="form-control" name="Content[title]"/></td>\r\n</tr>\r\n\r\n<tr>\r\n<td>title_format</td>\r\n<td><input type="text" id="content-title_format" class="form-control" name="Content[title_format]"/></td>\r\n</tr>\r\n\r\n<tr>\r\n<td>title_pic</td>\r\n<td><input type="text" id="content-title_pic" class="form-control" name="Content[title_pic]"/></td>\r\n</tr>\r\n\r\n<tr>\r\n<td>username</td>\r\n<td><input type="text" id="content-username" class="form-control" name="Content[user_name]"/></td>\r\n</tr>\r\n\r\n\r\n</table>\r\n		\r\n	\r\n\r\n		<div class="form-group">\r\n			<?= Html::submitButton( ''Create'' , [''class'' =>  ''btn btn-primary'']) ?>\r\n		</div>\r\n\r\n	<?php ActiveForm::end(); ?>\r\n\r\n</div>\r\n	\r\n\r\n\r\n</div>\r\n', NULL, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_form_category`
--

DROP TABLE IF EXISTS `yii_tpl_form_category`;
CREATE TABLE IF NOT EXISTS `yii_tpl_form_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_index`
--

DROP TABLE IF EXISTS `yii_tpl_index`;
CREATE TABLE IF NOT EXISTS `yii_tpl_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `file_path` varchar(80) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_content` mediumtext,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `is_enable` tinyint(1) NOT NULL,
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `yii_tpl_index`
--

INSERT INTO `yii_tpl_index` (`id`, `name`, `file_path`, `file_name`, `file_content`, `create_time`, `modify_time`, `is_enable`, `note`) VALUES
(1, '首页模板', 'site', 'index', '<?php\r\n/**\r\n * @var yii\\web\\View $this\r\n */\r\n$this->title = ''My Yii Application'';\r\n?>\r\n<div class="site-index">\r\n\r\n	<div class="jumbotron">\r\n		<h1>Congratulations!</h1>\r\n\r\n		<p class="lead">You have successfully created your Yii-powered application.</p>\r\n\r\n		<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>\r\n	</div>\r\n\r\n	<div class="body-content">\r\n\r\n		<div class="row">\r\n			<div class="col-lg-4">\r\n				<h2>Heading</h2>\r\n\r\n				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et\r\n					dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip\r\n					ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu\r\n					fugiat nulla pariatur.</p>\r\n\r\n				<p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>\r\n			</div>\r\n			<div class="col-lg-4">\r\n				<h2>Heading</h2>\r\n\r\n				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et\r\n					dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip\r\n					ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu\r\n					fugiat nulla pariatur.</p>\r\n\r\n				<p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>\r\n			</div>\r\n			<div class="col-lg-4">\r\n				<h2>Heading</h2>\r\n\r\n				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et\r\n					dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip\r\n					ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu\r\n					fugiat nulla pariatur.</p>\r\n\r\n				<p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>\r\n			</div>\r\n		</div>\r\n\r\n	</div>\r\n</div>\r\n', NULL, NULL, 1, ''),
(5, 'tt', 'site', 'index_tt', 'tttt', NULL, NULL, 1, ''),
(9, 'bb', 'site', 'index_bb', 'bb', NULL, NULL, 1, ''),
(10, 'bb', 'site', 'index_bb', 'bb', NULL, NULL, 1, ''),
(12, 'ww', 'site', 'index_ww', 'ww', NULL, NULL, 1, ''),
(13, 'tt', 'site', 'index_tt', 'tttt', NULL, NULL, 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_item`
--

DROP TABLE IF EXISTS `yii_tpl_item`;
CREATE TABLE IF NOT EXISTS `yii_tpl_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `file_path` varchar(80) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_content` text,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `yii_tpl_item`
--

INSERT INTO `yii_tpl_item` (`id`, `category_id`, `model_id`, `name`, `file_path`, `file_name`, `file_content`, `create_time`, `modify_time`, `note`) VALUES
(1, 1, 8, '水果模型列表页模板', 'content', 'list_goods_fruit', '', NULL, NULL, ''),
(2, 1, 9, '服装模型列表页模板', 'content', 'list_goods_clothing', '', NULL, NULL, ''),
(3, 2, 8, '水果模型列表页2', 'content', 'list_goods_fruit2', '', NULL, NULL, ''),
(4, 1, 1, '公司模型列表', 'content', 'list_one', '', NULL, NULL, ''),
(5, 1, 3, 'aa', 'content', 'list_aa', '', NULL, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_item_category`
--

DROP TABLE IF EXISTS `yii_tpl_item_category`;
CREATE TABLE IF NOT EXISTS `yii_tpl_item_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `yii_tpl_item_category`
--

INSERT INTO `yii_tpl_item_category` (`id`, `name`, `note`) VALUES
(1, 'aa', 'aa'),
(2, 'ddaa', '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_list`
--

DROP TABLE IF EXISTS `yii_tpl_list`;
CREATE TABLE IF NOT EXISTS `yii_tpl_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `file_path` varchar(80) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_content` mediumtext,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `yii_tpl_list`
--

INSERT INTO `yii_tpl_list` (`id`, `category_id`, `table_id`, `name`, `file_path`, `file_name`, `file_content`, `create_time`, `modify_time`, `note`) VALUES
(7, 0, 1, 'aa', 'content', 'list_aa', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\grid\\GridView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var yii\\data\\ActiveDataProvider $dataProvider\r\n * @var app\\models\\search\\CatalogSearch $searchModel\r\n */\r\n\r\n$this->title = $currentChannel->name;\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-index">\r\n\r\n<\r\n<table width="100%" class="table">\r\n    <tr class="tb_header">\r\n      <th width="40px"> ID</th>\r\n      <th width="100px"> Channel Id</th>\r\n      <th>title</th>\r\n      <th width="10%">do</th>\r\n    </tr>\r\n	<?php foreach ($dataList as $row ): ?>\r\n	<tr>\r\n	<td><?php echo $row[''id'']?></td>\r\n	<td><?php echo $row[''channel_id'']?></td>\r\n	<td><a href="index.php?r=content/view&id=<?php echo $row[''id'']?>&chnid=<?php echo $row[''channel_id'']?>" target="_blank"><?php echo $row[''title'']?></a></td>\r\n	<td><?php echo ''''?></td>\r\n	</tr>\r\n	<?php endforeach;?>\r\n</table>\r\n\r\n</div>\r\n', NULL, NULL, ''),
(8, 0, 2, 'bb', 'content', 'list_bb', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\grid\\GridView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var yii\\data\\ActiveDataProvider $dataProvider\r\n * @var app\\models\\search\\CatalogSearch $searchModel\r\n */\r\n\r\n$this->title = $currentChannel->name;\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-index">\r\n\r\n<\r\n<table width="100%" class="table">\r\n    <tr class="tb_header">\r\n      <th width="40px"> ID</th>\r\n      <th width="100px"> Channel Id</th>\r\n      <th>title</th>\r\n      <th width="10%">do</th>\r\n    </tr>\r\n	<?php foreach ($dataList as $row ): ?>\r\n	<tr>\r\n	<td><?php echo $row[''id'']?></td>\r\n	<td><?php echo $row[''channel_id'']?></td>\r\n	<td><a href="index.php?r=content/view&id=<?php echo $row[''id'']?>&chnid=<?php echo $row[''channel_id'']?>" target="_blank"><?php echo $row[''title'']?></a></td>\r\n	<td><?php echo ''''?></td>\r\n	</tr>\r\n	<?php endforeach;?>\r\n</table>\r\n\r\n</div>\r\n', NULL, NULL, ''),
(9, 0, 5, 'cc', 'content', 'list_cc', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\grid\\GridView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var yii\\data\\ActiveDataProvider $dataProvider\r\n * @var app\\models\\search\\CatalogSearch $searchModel\r\n */\r\n\r\n$this->title = $currentChannel->name;\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-index">\r\n\r\n<table width="100%" class="table">\r\n	<?php foreach ($dataList as $row ): ?>\r\n	<tr>\r\n	<td><a href="index.php?r=content/view&id=<?php echo $row[''id'']?>&chnid=<?php echo $row[''channel_id'']?>" target="_blank"><?php echo $row[''title'']?></a></td>\r\n	<td width="180px"><?php echo $row[''publish_time'']?></td>\r\n	</tr>\r\n	<?php endforeach;?>\r\n</table>\r\n\r\n</div>\r\n', NULL, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_list_category`
--

DROP TABLE IF EXISTS `yii_tpl_list_category`;
CREATE TABLE IF NOT EXISTS `yii_tpl_list_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `yii_tpl_list_category`
--

INSERT INTO `yii_tpl_list_category` (`id`, `name`, `note`) VALUES
(1, 'aa', 'aa');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_view`
--

DROP TABLE IF EXISTS `yii_tpl_view`;
CREATE TABLE IF NOT EXISTS `yii_tpl_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `file_path` varchar(80) NOT NULL,
  `file_name` varchar(80) NOT NULL,
  `file_content` mediumtext,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modify_time` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `yii_tpl_view`
--

INSERT INTO `yii_tpl_view` (`id`, `category_id`, `table_id`, `name`, `file_path`, `file_name`, `file_content`, `create_time`, `modify_time`, `note`) VALUES
(6, 0, 1, 'aa', 'content', 'view_aa', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\widgets\\DetailView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var app\\models\\Catalog $model\r\n */\r\n\r\n$this->title = '''';\r\n$this->params[''breadcrumbs''][] = [''label'' => ''Catalogs'', ''url'' => [''index'']];\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-view">\r\n\r\n	<h1><?= Html::encode($this->title) ?></h1>\r\n\r\n	<table class="table">\r\n		<tr>\r\n			<th width="120px">名称</th>\r\n			<th>值</th>\r\n		</tr>\r\n	\r\n		<?php \r\n			foreach ($model as $name=>$value)\r\n			{\r\n				echo ''<tr><td>''.$name.''</td><td>''.$value.''</td></tr>'';\r\n			}\r\n		?>\r\n	</table>\r\n	\r\n	\r\n</div>\r\n', NULL, NULL, ''),
(7, 0, 2, 'bb', 'content', 'view_bb', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\widgets\\DetailView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var app\\models\\Catalog $model\r\n */\r\n\r\n$this->title = '''';\r\n$this->params[''breadcrumbs''][] = [''label'' => ''Catalogs'', ''url'' => [''index'']];\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-view">\r\n\r\n	<h1><?= Html::encode($this->title) ?></h1>\r\n\r\n	<table class="table">\r\n		<tr>\r\n			<th width="120px">名称</th>\r\n			<th>值</th>\r\n		</tr>\r\n	\r\n		<?php \r\n			foreach ($model as $name=>$value)\r\n			{\r\n				echo ''<tr><td>''.$name.''</td><td>''.$value.''</td></tr>'';\r\n			}\r\n		?>\r\n	</table>\r\n	\r\n	\r\n</div>\r\n', NULL, NULL, ''),
(8, 0, 5, 'cc', 'content', 'view_cc', '<?php\r\n\r\nuse yii\\helpers\\Html;\r\nuse yii\\widgets\\DetailView;\r\n\r\n/**\r\n * @var yii\\web\\View $this\r\n * @var app\\models\\Catalog $model\r\n */\r\n\r\n$this->title = '''';\r\n$this->params[''breadcrumbs''][] = [''label'' => ''Catalogs'', ''url'' => [''index'']];\r\n$this->params[''breadcrumbs''][] = $this->title;\r\n?>\r\n<div class="catalog-view">\r\n\r\n	<h1><?= Html::encode($this->title) ?></h1>\r\n\r\n	<table class="table">\r\n		<tr>\r\n			<th width="120px">名称</th>\r\n			<th>值</th>\r\n		</tr>\r\n	\r\n		<?php \r\n			foreach ($model as $name=>$value)\r\n			{\r\n				echo ''<tr><td>''.$name.''</td><td>''.$value.''</td></tr>'';\r\n			}\r\n		?>\r\n	</table>\r\n	\r\n	\r\n</div>\r\n', NULL, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_tpl_view_category`
--

DROP TABLE IF EXISTS `yii_tpl_view_category`;
CREATE TABLE IF NOT EXISTS `yii_tpl_view_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `note` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `yii_tpl_view_category`
--

INSERT INTO `yii_tpl_view_category` (`id`, `name`, `note`) VALUES
(1, 'bb', 'bb'),
(2, 'dd', 'dd');

-- --------------------------------------------------------

--
-- 表的结构 `yii_variable`
--

DROP TABLE IF EXISTS `yii_variable`;
CREATE TABLE IF NOT EXISTS `yii_variable` (
  `variable` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `value` text,
  `data_type` tinyint(4) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `is_cache` tinyint(1) NOT NULL,
  `sort_num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
