-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 06 月 14 日 01:25
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
-- 表的结构 `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin_level_0', '1', 1401804519),
('custom_level_0', '1', 1401804519),
('member_level_5', '1', 1401804557),
('special_level_0', '1', 1401804557),
('special_levle_1', '1', 1401804519);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin_level_0', 1, '管理员', NULL, 's:0:"";', 1401720843, 1401720843),
('admin_level_1', 1, '超级版主', NULL, 's:0:"";', 1401720881, 1401720881),
('admin_level_2', 1, '版主', NULL, 's:0:"";', 1401720900, 1401720900),
('category_post', 2, '帖子权限', NULL, 's:0:"";', 1401452696, 1401452696),
('category_thread', 2, '主题权限', NULL, 's:0:"";', 1401452713, 1401452713),
('custom_level_0', 1, '自定义角色0', NULL, 's:0:"";', 1401720765, 1401720765),
('custom_level_1', 1, '自定义角色1', NULL, 's:7:"s:0:"";";', 1401720781, 1401721363),
('group_admin', 1, '管理员组', NULL, 's:0:"";', 1401369900, 1401369900),
('group_custom', 1, '自定义组', NULL, 's:0:"";', 1401451311, 1401451311),
('group_member', 1, '会员组', NULL, 's:0:"";', 1401369927, 1401369927),
('group_special', 1, '特殊组', NULL, 's:0:"";', 1401369950, 1401369950),
('member_level_0', 1, '限制会员', NULL, 's:7:"s:0:"";";', 1401720496, 1401722061),
('member_level_1', 1, '新手上路', NULL, 's:0:"";', 1401720515, 1401720515),
('member_level_2', 1, '注册会员', NULL, 's:0:"";', 1401720529, 1401720529),
('member_level_3', 1, '中级会员', NULL, 's:0:"";', 1401720551, 1401720551),
('member_level_4', 1, '高级会员', NULL, 's:0:"";', 1401720567, 1401720567),
('member_level_5', 1, '金牌会员', NULL, 's:7:"s:0:"";";', 1401720580, 1401801898),
('member_level_6', 1, '论坛元老', NULL, 's:0:"";', 1401720596, 1401720596),
('post_add', 2, '增加回帖', NULL, 's:0:"";', 1401455750, 1401455750),
('post_delete', 2, '删除回帖', NULL, 's:0:"";', 1401455785, 1401455785),
('post_edit', 2, '编辑回帖', NULL, 's:7:"s:0:"";";', 1401455770, 1401459773),
('root_permission', 2, '', NULL, 's:0:"";', 1401451120, 1401451120),
('root_role', 1, '', NULL, 's:0:"";', 1401451102, 1401451102),
('special_level_0', 1, '特殊角色0', NULL, 's:0:"";', 1401720708, 1401720708),
('special_levle_1', 1, '特殊角色1', NULL, 's:0:"";', 1401720727, 1401720727),
('thread_add', 2, '添加主题', NULL, 's:0:"";', 1401455680, 1401455680),
('thread_delete', 2, '删除主题', NULL, 's:0:"";', 1401455712, 1401455712),
('thread_edit', 2, '修改主题', NULL, 's:7:"s:0:"";";', 1401455698, 1401722495),
('thread_view', 2, '浏览主题', NULL, 's:4:"hhhh";', 1401455728, 1401753005);

-- --------------------------------------------------------

--
-- 表的结构 `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('group_admin', 'admin_level_0'),
('group_admin', 'admin_level_1'),
('group_admin', 'admin_level_2'),
('root_permission', 'category_post'),
('root_permission', 'category_thread'),
('group_custom', 'custom_level_0'),
('group_custom', 'custom_level_1'),
('root_role', 'group_admin'),
('root_role', 'group_custom'),
('root_role', 'group_member'),
('root_role', 'group_special'),
('group_member', 'member_level_0'),
('group_member', 'member_level_1'),
('group_member', 'member_level_2'),
('group_member', 'member_level_3'),
('group_member', 'member_level_4'),
('group_member', 'member_level_5'),
('group_member', 'member_level_6'),
('admin_level_0', 'post_add'),
('category_post', 'post_add'),
('member_level_2', 'post_add'),
('member_level_3', 'post_add'),
('member_level_4', 'post_add'),
('member_level_5', 'post_add'),
('member_level_6', 'post_add'),
('admin_level_0', 'post_delete'),
('category_post', 'post_delete'),
('member_level_0', 'post_delete'),
('member_level_1', 'post_delete'),
('member_level_2', 'post_delete'),
('member_level_3', 'post_delete'),
('member_level_4', 'post_delete'),
('member_level_5', 'post_delete'),
('member_level_6', 'post_delete'),
('admin_level_0', 'post_edit'),
('category_post', 'post_edit'),
('member_level_0', 'post_edit'),
('member_level_1', 'post_edit'),
('member_level_2', 'post_edit'),
('member_level_3', 'post_edit'),
('member_level_4', 'post_edit'),
('member_level_5', 'post_edit'),
('member_level_6', 'post_edit'),
('group_special', 'special_level_0'),
('group_special', 'special_levle_1'),
('admin_level_0', 'thread_add'),
('category_thread', 'thread_add'),
('member_level_1', 'thread_add'),
('member_level_2', 'thread_add'),
('member_level_3', 'thread_add'),
('member_level_4', 'thread_add'),
('member_level_5', 'thread_add'),
('member_level_6', 'thread_add'),
('special_level_0', 'thread_add'),
('admin_level_0', 'thread_delete'),
('category_thread', 'thread_delete'),
('member_level_0', 'thread_delete'),
('member_level_1', 'thread_delete'),
('member_level_2', 'thread_delete'),
('member_level_3', 'thread_delete'),
('member_level_4', 'thread_delete'),
('member_level_5', 'thread_delete'),
('member_level_6', 'thread_delete'),
('admin_level_0', 'thread_edit'),
('category_thread', 'thread_edit'),
('member_level_1', 'thread_edit'),
('member_level_2', 'thread_edit'),
('member_level_3', 'thread_edit'),
('member_level_4', 'thread_edit'),
('member_level_5', 'thread_edit'),
('member_level_6', 'thread_edit'),
('special_level_0', 'thread_edit'),
('admin_level_0', 'thread_view'),
('category_thread', 'thread_view'),
('member_level_1', 'thread_view'),
('member_level_2', 'thread_view'),
('member_level_3', 'thread_view'),
('member_level_4', 'thread_view'),
('member_level_5', 'thread_view'),
('member_level_6', 'thread_view'),
('special_level_0', 'thread_view');

-- --------------------------------------------------------

--
-- 表的结构 `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `migration`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

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
(10, 104, 1, 'admin', '2014-06-12 14:11:11', '2014-06-12 14:11:11', 1, 3, 4, 18, 1, 'Joining with Relations ', 'i,s,,', '', '', '', '', 'ort the orders b', ' sort the orders by the customer id and the order id. also eager loading "customer"\r\n$orders = Order::find()->joinWith(''customer'')->orderBy(''customer.id, order.id'')->all();\r\n// find all orders that contain books, and eager loading "books"\r\n$orders = Order::find()->innerJoi', 'c', 'adminxxx');

-- --------------------------------------------------------

--
-- 表的结构 `model_test`
--

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
-- 表的结构 `user`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=121 ;

--
-- 转存表中的数据 `yii_channel`
--

INSERT INTO `yii_channel` (`id`, `parent_id`, `name`, `name_alias`, `name_url`, `redirect_url`, `is_leaf`, `is_nav`, `sort_num`, `table`, `channel_tpl`, `list_tpl`, `detail_tpl`, `page_size`, `note`, `note2`) VALUES
(95, 0, '下载', '下载', '', '', 0, 0, 0, 'model_download', '8', '8', '7', NULL, '', ''),
(102, 95, '软件', '软件', '', '', 1, 0, 0, 'model_download', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(103, 0, '新闻', 'cc', 'news', '', 0, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(104, 103, '国际人物', '国际人物', '', '', 1, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(105, 103, '国际', '国际', '', '', 0, 0, 0, 'model_news', '9', '9', '8', NULL, '', ''),
(106, 103, '科技', '科技', '', '', 1, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(107, 103, '国内', '国内', '', '', 0, 0, 0, 'model_news', '9', '9', '8', NULL, '', ''),
(108, 105, '环球视野', '环球视野', '', '', 1, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(109, 105, '军事', '军事', '', '', 1, 0, 0, 'model_news', '9', '9', '8', NULL, '', ''),
(110, 107, '时政', '时政', '', '', 0, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(111, 107, '港澳台', '港澳台', '', '', 1, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', ''),
(112, 0, '视频', '视频', '', '', 0, 0, 0, 'model_video', '7', '7', '6', NULL, '', ''),
(118, 112, '爱情', '爱情', '', '', 1, 0, 0, 'model_video', '7', '7', '6', NULL, '', ''),
(119, 112, '恐怖', '恐怖', '', '', 1, 0, 0, 'model_video', '7', '7', '6', NULL, '', ''),
(120, 0, 'yyyy', 'yyyy', '', '', 1, 0, 0, 'model_news', 'channel_default.php', 'list_default.php', 'detail_default.php', NULL, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table`
--

CREATE TABLE IF NOT EXISTS `yii_define_table` (
  `name` varchar(80) CHARACTER SET gbk NOT NULL,
  `name_en` varchar(80) CHARACTER SET gbk NOT NULL,
  `description` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `channel_tpl` varchar(64) DEFAULT NULL,
  `list_tpl` varchar(64) DEFAULT NULL,
  `detail_tpl` varchar(64) DEFAULT NULL,
  `back_form_tpl` varchar(64) DEFAULT NULL,
  `front_form_tpl` varchar(64) DEFAULT NULL,
  `note` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`name_en`),
  UNIQUE KEY `name` (`name_en`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yii_define_table`
--

INSERT INTO `yii_define_table` (`name`, `name_en`, `description`, `is_default`, `channel_tpl`, `list_tpl`, `detail_tpl`, `back_form_tpl`, `front_form_tpl`, `note`) VALUES
('下载', 'model_download', '', 0, NULL, NULL, NULL, NULL, NULL, ''),
('新闻', 'model_news', '', 1, '', '', '', '', '', ''),
('测试表', 'model_test', '测试表', 0, '', '', '', '', '', ''),
('视频', 'model_video', '', 0, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table_field`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=170 ;

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
(168, 'model_test', '内容', 'content', 'text', NULL, 1, 1, 0, 11, '内容', 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL),
(169, 'model_news', '作者', 'author', 'varchar', 255, 1, 0, 0, NULL, '', 1, '', '', '', 'text', '', '', '', NULL, NULL, 1, '', '', '', 'text', '', 'admin', '', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table_field_meta`
--

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
-- 表的结构 `yii_fragment_category`
--

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
-- 表的结构 `yii_tpl_channel`
--

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

--
-- 限制导出的表
--

--
-- 限制表 `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- 限制表 `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
