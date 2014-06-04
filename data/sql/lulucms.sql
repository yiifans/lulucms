-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 06 月 04 日 00:16
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
-- 表的结构 `aa`
--

CREATE TABLE IF NOT EXISTS `aa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
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
  `aa` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `weight` float NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `aa`
--

INSERT INTO `aa` (`id`, `channel_id`, `user_id`, `username`, `publish_time`, `is_headline`, `is_top`, `is_recommend`, `status`, `title`, `title_format`, `title_redirect_url`, `title_pic`, `note`, `note2`, `aa`, `price`, `weight`, `content`) VALUES
(1, 98, 0, 'c', '2014-04-20 13:04:49', 0, 0, 0, 0, 'a', '', '', 'b', 'd', '', '', 0, 0, ''),
(2, 97, 0, 'tt', '2014-04-20 13:05:09', 0, 0, 0, 0, 'tt', '', '', 'tt', 'tt', '', '', 0, 0, ''),
(3, 97, 0, 'aa', '2014-04-20 13:05:28', 0, 0, 0, 0, 'aa', '', '', 'aa', 'aa', '', '', 4, 4, ''),
(4, 97, 0, 'bb', '2014-04-20 13:05:37', 0, 0, 0, 0, 'bb', '', '', 'bb', 'bb', '', '', 0, 0, ''),
(5, 97, 0, 'tt', '2014-04-20 13:12:47', 0, 0, 0, 0, 'tt', '', '', 'tt', 'tt', '', '', 3, 4, ''),
(6, 97, 0, '', '2014-04-20 15:12:48', 0, 0, 0, 0, '用update和replace在mysql中替换某一个字段的部分内容', '', '', '', '', '', '', 1, 1, 'update article set body = (REPLACE(body, ''</div>'', '' '')) where typeid=21\r\n\r\n\r\n用update和replace在mysql中替换某一个字段的部分内容\r\nupdate users_settings set `ConfigValue` = replace(configvalue,'' fromstr'' ''tostr'') where `ConfigName`=''accesslist''\r\n\r\n\r\n对于针对字符串位置的操作，第一个位置被标记为1。\r\n\r\nASCII(str)\r\n返回字符串str的最左面字符的ASCII代码值。如果str是空字符串，返回0。如果str是NULL，返回NULL。\r\nmysql> select ASCII(''2'');\r\n-> 50\r\nmysql> select ASCII(2);\r\n-> 50\r\nmysql> select ASCII(''dx'');\r\n-> 100\r\n也可参见ORD()函数。\r\n\r\nORD(str)\r\n如果字符串str最左面字符是一个多字节字符，通过以格式((first byte ASCII code)*256+(second byte ASCII code))[*256+third byte ASCII code...]返回字符的ASCII代码值来返回多字节字符代码。如果最左面的字符不是一个多字节字符。返回与ASCII()函数返回的相同值。\r\nmysql> select ORD(''2'');\r\n-> 50\r\nCONV(N,from_base,to_base)\r\n在不同的数字基之间变换数字。返回数字N的字符串数字，从from_base基变换为to_base基，如果任何参数是NULL，返回NULL。参数N解释为一个整数，但是可以指定为一个整数或一个字符串。最小基是2且最大的基是36。如果to_base是一个负数，N被认为是一个有符号数，否则，N被当作无符号数。CONV以64位点精度工作。\r\nmysql> select CONV("a",16,2);\r\n-> ''1010''\r\nmysql> select CONV("6E",18,8);\r\n-> ''172''\r\nmysql> select CONV(-17,10,-18);\r\n-> ''-H''\r\nmysql> select CONV(10+"10"+''10''+0xa,10,10);\r\n-> ''40''\r\nBIN(N)\r\n返回二进制值N的一个字符串表示，在此N是一个长整数(BIGINT)数字，这等价于CONV(N,10,2)。如果N是NULL，返回NULL。\r\nmysql> select BIN(12);\r\n-> ''1100''\r\nOCT(N)\r\n返回八进制值N的一个字符串的表示，在此N是一个长整型数字，这等价于CONV(N,10,8)。如果N是NULL，返回NULL。\r\nmysql> select OCT(12);\r\n-> ''14''\r\nHEX(N)\r\n返回十六进制值N一个字符串的表示，在此N是一个长整型(BIGINT)数字，这等价于CONV(N,10,16)。如果N是NULL，返回NULL。\r\nmysql> select HEX(255);\r\n-> ''FF''\r\nCHAR(N,...)\r\nCHAR()将参数解释为整数并且返回由这些整数的ASCII代码字符组成的一个字符串。NULL值被跳过。\r\nmysql> select CHAR(77,121,83,81,''76'');\r\n-> ''MySQL''\r\nmysql> select CHAR(77,77.3,''77.3'');\r\n-> ''MMM''\r\nCONCAT(str1,str2,...)\r\n返回来自于参数连结的字符串。如果任何参数是NULL，返回NULL。可以有超过2个的参数。一个数字参数被变换为等价的字符串形式。\r\nmysql> select CONCAT(''My'', ''S'', ''QL'');\r\n-> ''MySQL''\r\nmysql> select CONCAT(''My'', NULL, ''QL'');\r\n-> NULL\r\nmysql> select CONCAT(14.3);\r\n-> ''14.3''\r\nLENGTH(str)\r\n　\r\nOCTET_LENGTH(str)\r\n　\r\nCHAR_LENGTH(str)\r\n　\r\nCHARACTER_LENGTH(str)\r\n返回字符串str的长度。\r\nmysql> select LENGTH(''text'');\r\n-> 4\r\nmysql> select OCTET_LENGTH(''text'');\r\n-> 4\r\n注意，对于多字节字符，其CHAR_LENGTH()仅计算一次。\r\n\r\nLOCATE(substr,str)\r\n　\r\nPOSITION(substr IN str)\r\n返回子串substr在字符串str第一个出现的位置，如果substr不是在str里面，返回0.\r\nmysql> select LOCATE(''bar'', ''foobarbar'');\r\n-> 4\r\nmysql> select LOCATE(''xbar'', ''foobar'');\r\n-> 0\r\n该函数是多字节可靠的。\r\nLOCATE(substr,str,pos)\r\n返回子串substr在字符串str第一个出现的位置，从位置pos开始。如果substr不是在str里面，返回0。\r\nmysql> select LOCATE(''bar'', ''foobarbar'',5);\r\n-> 7\r\n这函数是多字节可靠的。\r\n\r\nINSTR(str,substr)\r\n返回子串substr在字符串str中的第一个出现的位置。这与有2个参数形式的LOCATE()相同，除了参数被颠倒。\r\nmysql> select INSTR(''foobarbar'', ''bar'');\r\n-> 4\r\nmysql> select INSTR(''xbar'', ''foobar'');\r\n-> 0\r\n这函数是多字节可靠的。\r\n\r\nLPAD(str,len,padstr)\r\n返回字符串str，左面用字符串padstr填补直到str是len个字符长。\r\nmysql> select LPAD(''hi'',4,''??'');\r\n-> ''??hi''\r\nRPAD(str,len,padstr)\r\n返回字符串str，右面用字符串padstr填补直到str是len个字符长。\r\nmysql> select RPAD(''hi'',5,''?'');\r\n-> ''hi???''\r\nLEFT(str,len)\r\n返回字符串str的最左面len个字符。\r\nmysql> select LEFT(''foobarbar'', 5);\r\n-> ''fooba''\r\n该函数是多字节可靠的。\r\n\r\nRIGHT(str,len)\r\n返回字符串str的最右面len个字符。\r\nmysql> select RIGHT(''foobarbar'', 4);\r\n-> ''rbar''\r\n该函数是多字节可靠的。\r\n\r\nSUBSTRING(str,pos,len)\r\n　\r\nSUBSTRING(str FROM pos FOR len)\r\n　\r\nMID(str,pos,len)\r\n从字符串str返回一个len个字符的子串，从位置pos开始。使用FROM的变种形式是ANSI SQL92语法。\r\nmysql> select SUBSTRING(''Quadratically'',5,6);\r\n-> ''ratica''\r\n该函数是多字节可靠的。\r\n\r\nSUBSTRING(str,pos)\r\n　\r\nSUBSTRING(str FROM pos)\r\n从字符串str的起始位置pos返回一个子串。\r\nmysql> select SUBSTRING(''Quadratically'',5);\r\n-> ''ratically''\r\nmysql> select SUBSTRING(''foobarbar'' FROM 4);\r\n-> ''barbar''\r\n该函数是多字节可靠的。\r\n\r\nSUBSTRING_INDEX(str,delim,count)\r\n返回从字符串str的第count个出现的分隔符delim之后的子串。如果count是正数，返回最后的分隔符到左边(从左边数) 的所有字符。如果count是负数，返回最后的分隔符到右边的所有字符(从右边数)。\r\nmysql> select SUBSTRING_INDEX(''www.mysql.com'', ''.'', 2);\r\n-> ''www.mysql''\r\nmysql> select SUBSTRING_INDEX(''www.mysql.com'', ''.'', -2);\r\n-> ''mysql.com''\r\n该函数对多字节是可靠的。\r\n\r\nLTRIM(str)\r\n返回删除了其前置空格字符的字符串str。\r\nmysql> select LTRIM(''  barbar'');\r\n-> ''barbar''\r\nRTRIM(str)\r\n返回删除了其拖后空格字符的字符串str。\r\nmysql> select RTRIM(''barbar   '');\r\n-> ''barbar''\r\n该函数对多字节是可靠的。\r\nTRIM([[BOTH | LEADING | TRAILING] [remstr] FROM] str)\r\n返回字符串str，其所有remstr前缀或后缀被删除了。如果没有修饰符BOTH、LEADING或TRAILING给出，BOTH被假定。如果remstr没被指定，空格被删除。\r\nmysql> select TRIM(''  bar   '');\r\n-> ''bar''\r\nmysql> select TRIM(LEADING ''x'' FROM ''xxxbarxxx'');\r\n-> ''barxxx''\r\nmysql> select TRIM(BOTH ''x'' FROM ''xxxbarxxx'');\r\n-> ''bar''\r\nmysql> select TRIM(TRAILING ''xyz'' FROM ''barxxyz'');\r\n-> ''barx''\r\n该函数对多字节是可靠的。\r\n\r\nSOUNDEX(str)\r\n返回str的一个同音字符串。听起来“大致相同”的2个字符串应该有相同的同音字符串。一个“标准”的同音字符串长是4个字符，但是SOUNDEX()函数返回一个任意长的字符串。你可以在结果上使用SUBSTRING()得到一个“标准”的 同音串。所有非数字字母字符在给定的字符串中被忽略。所有在A-Z之外的字符国际字母被当作元音。\r\nmysql> select SOUNDEX(''Hello'');\r\n-> ''H400''\r\nmysql> select SOUNDEX(''Quadratically'');\r\n-> ''Q36324''\r\nSPACE(N)\r\n返回由N个空格字符组成的一个字符串。\r\nmysql> select SPACE(6);\r\n-> ''      ''\r\nREPLACE(str,from_str,to_str)\r\n返回字符串str，其字符串from_str的所有出现由字符串to_str代替。\r\nmysql> select REPLACE(''www.mysql.com'', ''w'', ''Ww'');\r\n-> ''WwWwWw.mysql.com''\r\n该函数对多字节是可靠的。\r\n\r\nREPEAT(str,count)\r\n返回由重复countTimes次的字符串str组成的一个字符串。如果count <= 0，返回一个空字符串。如果str或count是NULL，返回NULL。\r\nmysql> select REPEAT(''MySQL'', 3);\r\n-> ''MySQLMySQLMySQL''\r\nREVERSE(str)\r\n返回颠倒字符顺序的字符串str。\r\nmysql> select REVERSE(''abc'');\r\n-> ''cba''\r\n该函数对多字节可靠的。\r\n\r\nINSERT(str,pos,len,newstr)\r\n返回字符串str，在位置pos起始的子串且len个字符长得子串由字符串newstr代替。\r\nmysql> select INSERT(''Quadratic'', 3, 4, ''What'');\r\n-> ''QuWhattic''\r\n该函数对多字节是可靠的。\r\n\r\nELT(N,str1,str2,str3,...)\r\n如果N=1，返回str1，如果N=2，返回str2，等等。如果N小于1或大于参数个数，返回NULL。ELT()是FIELD()反运算。\r\nmysql> select ELT(1, ''ej'', ''Heja'', ''hej'', ''foo'');\r\n-> ''ej''\r\nmysql> select ELT(4, ''ej'', ''Heja'', ''hej'', ''foo'');\r\n-> ''foo''\r\nFIELD(str,str1,str2,str3,...)\r\n返回str在str1,str2,str3,...清单的索引。如果str没找到，返回0。FIELD()是ELT()反运算。\r\nmysql> select FIELD(''ej'', ''Hej'', ''ej'', ''Heja'', ''hej'', ''foo'');\r\n-> 2\r\nmysql> select FIELD(''fo'', ''Hej'', ''ej'', ''Heja'', ''hej'', ''foo'');\r\n-> 0\r\nFIND_IN_SET(str,strlist)\r\n如果字符串str在由N子串组成的表strlist之中，返回一个1到N的值。一个字符串表是被“,”分隔的子串组成的一个字符串。如果第一个参数是一个常数字符串并且第二个参数是一种类型为SET的列，FIND_IN_SET()函数被优化而使用位运算！如果str不是在strlist里面或如果strlist是空字符串，返回0。如果任何一个参数是NULL，返回NULL。如果第一个参数包含一个“,”，该函数将工作不正常。\r\nmysql> SELECT FIND_IN_SET(''b'',''a,b,c,d'');\r\n-> 2\r\nMAKE_SET(bits,str1,str2,...)\r\n返回一个集合 (包含由“,”字符分隔的子串组成的一个字符串)，由相应的位在bits集合中的的字符串组成。str1对应于位0，str2对应位1，等等。在str1,str2,...中的NULL串不添加到结果中。\r\nmysql> SELECT MAKE_SET(1,''a'',''b'',''c'');\r\n-> ''a''\r\nmysql> SELECT MAKE_SET(1 | 4,''hello'',''nice'',''world'');\r\n-> ''hello,world''\r\nmysql> SELECT MAKE_SET(0,''a'',''b'',''c'');\r\n-> ''''\r\nEXPORT_SET(bits,on,off,[separator,[number_of_bits]])\r\n返回一个字符串，在这里对于在“bits”中设定每一位，你得到一个“on”字符串，并且对于每个复位(reset)的位，你得到一个 “off”字符串。每个字符串用“separator”分隔(缺省“,”)，并且只有“bits”的“number_of_bits” (缺省64)位被使用。\r\nmysql> select EXPORT_SET(5,''Y'',''N'','','',4)\r\n-> Y,N,Y,N\r\nLCASE(str)\r\n　\r\nLOWER(str)\r\n返回字符串str，根据当前字符集映射(缺省是ISO-8859-1 Latin1)把所有的字符改变成小写。该函数对多字节是可靠的。\r\nmysql> select LCASE(''QUADRATICALLY'');\r\n-> ''quadratically''\r\nUCASE(str)\r\n　\r\nUPPER(str)\r\n返回字符串str，根据当前字符集映射(缺省是ISO-8859-1 Latin1)把所有的字符改变成大写。该函数对多字节是可靠的。\r\nmysql> select UCASE(''Hej'');\r\n-> ''HEJ''\r\n该函数对多字节是可靠的。\r\n\r\nLOAD_FILE(file_name)\r\n读入文件并且作为一个字符串返回文件内容。文件必须在服务器上，你必须指定到文件的完整路径名，而且你必须有file权限。文件必须所有内容都是可读的并且小于max_allowed_packet。如果文件不存在或由于上面原因之一不能被读出，函数返回NULL。\r\nmysql> UPDATE table_name\r\nSET blob_column=LOAD_FILE("/tmp/picture")\r\nWHERE id=1;\r\nMySQL必要时自动变换数字为字符串，并且反过来也如此：\r\n\r\nmysql> SELECT 1+"1";\r\n-> 2\r\nmysql> SELECT CONCAT(2,'' test'');\r\n-> ''2 test''\r\n如果你想要明确地变换一个数字到一个字符串，把它作为参数传递到CONCAT()。\r\n\r\n如果字符串函数提供一个二进制字符串作为参数，结果字符串也是一个二进制字符串。被变换到一个字符串的数字被当作是一个二进制字符串。这仅影响比较。'),
(7, 101, 0, 'd', '2014-04-21 13:21:26', 0, 0, 0, 0, 'a', '', '', 'b', '', '', '', 1, 1, 'e');

-- --------------------------------------------------------

--
-- 表的结构 `abb`
--

CREATE TABLE IF NOT EXISTS `abb` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- 表的结构 `bb`
--

CREATE TABLE IF NOT EXISTS `bb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
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
  `bb` varchar(255) NOT NULL,
  `cc` varchar(255) NOT NULL,
  `ddd` varchar(255) NOT NULL,
  `bbcc` varchar(255) NOT NULL,
  `aa` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `cc`
--

CREATE TABLE IF NOT EXISTS `cc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `publish_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `att1` tinyint(4) NOT NULL,
  `att2` tinyint(4) NOT NULL,
  `att3` tinyint(4) NOT NULL,
  `flag` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `title` varchar(120) NOT NULL,
  `title_format` varchar(120) DEFAULT NULL,
  `title_pic` varchar(120) DEFAULT NULL,
  `redirect_url` varchar(120) DEFAULT NULL,
  `sub_title` varchar(120) DEFAULT NULL,
  `keywords` varchar(120) DEFAULT NULL,
  `summary` varchar(500) DEFAULT NULL,
  `content` varchar(2000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- 转存表中的数据 `cc`
--

INSERT INTO `cc` (`id`, `channel_id`, `user_id`, `user_name`, `publish_time`, `edit_time`, `att1`, `att2`, `att3`, `flag`, `status`, `title`, `title_format`, `title_pic`, `redirect_url`, `sub_title`, `keywords`, `summary`, `content`) VALUES
(1, 104, 0, 'tt', '2014-04-25 14:15:48', '2014-04-25 14:15:48', 0, 0, 0, 0, 0, 'tt', 'tt', 'tt', NULL, NULL, NULL, NULL, ''),
(2, 104, 0, 'bb', '2014-04-25 15:08:47', '2014-04-25 15:08:47', 2, 3, 4, 127, 0, 'bb', 'bb', 'bb', NULL, NULL, NULL, NULL, ''),
(3, 104, 0, '', '2014-04-25 15:09:20', '2014-04-25 15:09:20', 2, 3, 4, 1, 0, 'a', 'a', 'a', NULL, NULL, NULL, NULL, ''),
(4, 104, 0, '', '2014-04-25 15:09:32', '2014-04-25 15:09:32', 2, 2, 2, 2, 0, 'b', 'b', 'b', NULL, NULL, NULL, NULL, ''),
(5, 104, 0, '', '2014-04-25 15:09:48', '2014-04-25 15:09:48', 3, 4, 5, 127, 0, 'c', 'c', 'c', NULL, NULL, NULL, NULL, ''),
(6, 104, 0, 'd', '2014-04-25 15:10:45', '2014-04-25 15:10:45', 1, 1, 1, 4, 0, 'd', 'd', 'd', NULL, NULL, NULL, NULL, ''),
(7, 104, 0, '', '2014-04-25 15:10:54', '2014-04-25 15:10:54', 1, 1, 1, 8, 0, 'e', 'e', 'e', NULL, NULL, NULL, NULL, ''),
(8, 104, 0, 'f', '2014-04-25 15:11:29', '2014-04-25 15:11:29', 1, 1, 1, 16, 0, 'f', 'f', 'f', NULL, NULL, NULL, NULL, ''),
(9, 104, 0, '', '2014-04-25 15:11:42', '2014-04-25 15:11:42', 1, 1, 1, 32, 0, 'g', 'g', 'g', NULL, NULL, NULL, NULL, ''),
(10, 104, 0, '', '2014-04-25 15:11:54', '2014-04-25 15:11:54', 1, 1, 1, 64, 0, 'h', 'h', 'h', NULL, NULL, NULL, NULL, ''),
(11, 104, 0, 'i', '2014-04-25 15:12:14', '2014-04-25 15:12:14', 1, 1, 1, 127, 0, 'i', 'i', 'i', NULL, NULL, NULL, NULL, ''),
(12, 104, 0, 'w', '2014-04-25 15:13:37', '2014-04-25 15:13:37', 1, 1, 1, 127, 0, 'w', 'w', 'w', NULL, NULL, NULL, NULL, ''),
(13, 104, 0, '', '2014-04-25 15:17:23', '2014-04-25 15:17:23', 1, 1, 1, 128, 0, 't', 't', 't', NULL, NULL, NULL, NULL, ''),
(14, 104, 0, 'uu', '2014-04-25 15:22:05', '2014-04-25 15:22:05', 1, 1, 1, 3, 0, 'uu', 'uu', 'uu', NULL, NULL, NULL, NULL, ''),
(15, 104, 0, '', '2014-04-26 12:00:27', '2014-04-26 12:00:27', 0, 0, 0, 1, 0, 'mysql 使用位运算', '', '', NULL, NULL, NULL, NULL, '如果你不知道什么是位运算的话， 那么请你先去看看基础的C语言教程吧。 \r\n与运算 a & b  , \r\n或运算 a | b ,  \r\n异或运算 a ^ b ,\r\n\r\n或者 \r\n你也可以将 与运算理解为 + 法  \r\n例如 \r\n1|2 = 3   （1+2 = 3）\r\n1|2|4 = 7 （1+2+4 = 7）\r\n\r\n将 异或运算理解为 - 法\r\n例如 \r\n3^2 = 1 （3-2 = 1）\r\n3^1 = 2  （3-1 = 2）\r\n\r\n最后将 与运算 作为判断\r\n例如 \r\n3&2 = 1    (3 = 1 + 2, 由 1和2组成 ，所以判断3&2 = 1 )  \r\n3&4 = 0   ( 3 没有由 4组成,所以判断3&4 = 0)\r\n\r\n那么位运算有何用处呢， 例如 UNIX系统中的权限， 通常我们所知  权限分为  r 读, w 写, x 执行,其中 它们的权值分别为4,2,1， 所以 如果用户要想拥有这三个权限 就必须  chomd 7  , 即 7=4+2+1 表明 这个用户具有rwx权限，如果只想这个用户具有r,x权限 那么就 chomd 5即可\r\n\r\n说道此处就要涉及到数据库了。\r\n\r\n通常 我们的数据表中 可能会包含各种状态属性， 例如 blog表中 ， 我们需要有字段表示其是否公开，是否有设置密码，是否被管理员封锁，是否被置顶等等。 也会遇到在后期运维中，策划要求增加新的功能而造成你需要增加新的字段。\r\n\r\n这样会造成后期的维护困难，数据库增大，索引增大的情况。 这时使用位运算就可以巧妙的解决。\r\n\r\n例如\r\n\r\n<?php\r\ndefine(''B_PUBLIC'',1);  // 公开 \r\ndefine(''B_PASSWORD'',2);  // 加密\r\ndefine(''B_LOCK'',4); // 封锁\r\ndefine(''B_TOP'',8); // 置顶\r\n?>\r\n\r\n-- 公开blog  给status进行或运算\r\nUPDATE blog SET status = status | 1; \r\n-- 加密blog 给status进行或运算\r\nUPDATE blog SET status = status | 2; \r\n-- 封锁blog\r\nUPDATE blog SET status = status | 4;\r\n-- 解锁blog\r\nUPDATE blog SET status = status ^ 4;\r\n--查询所有被置顶的blog\r\nSELECT * FROM blog WHERE status & 8;\r\n\r\n虽然节省了空间，但是由于没有办法对status字段使用索引，所以如何使用来优化查询才是最重点的。'),
(16, 104, 0, '', '2014-04-26 12:15:12', '2014-04-26 12:15:12', 1, 1, 1, 1, 0, '习近平：使暴恐分子成为“过街老鼠人人喊打”', '', '', NULL, NULL, NULL, NULL, '新华网北京4月26日电 中共中央政治局4月25日下午就切实维护国家安全和社会安定进行第十四次集体学习。中共中央总书记习近平在主持学习时强调，面对新形势新挑战，维护国家安全和社会安定，对全面深化改革、实现“两个一百年”奋斗目标、实现中华民族伟大复兴的中国梦都十分紧要。各地区各部门要各司其职、各负其责，密切配合、通力合作，勇于负责、敢于担当，形成维护国家安全和社会安定的强大合力。\r\n中央政法委汪永清同志就这个问题进行讲解，并谈了意见和建议。\r\n中共中央政治局各位同志认真听取了讲解，并就有关问题进行了讨论。\r\n习近平在主持学习时发表了讲话。他指出，改革开放以来，我们党始终高度重视正确处理改革发展稳定关系，始终把维护国家安全和社会安定作为党和国家的一项基础性工作。我们保持了我国社会大局稳定，为改革开放和社会主义现代化建设营造了良好环境。“安而不忘危，存而不忘亡，治而不忘乱。”同时，必须清醒地看到，新形势下我国国家安全和社会安定面临的威胁和挑战增多，特别是各种威胁和挑战联动效应明显。我们必须保持清醒头脑、强化底线思维，有效防范、管理、处理国家安全风险，有力应对、处置、化解社会安定挑战。'),
(17, 108, 0, '', '2014-04-26 12:47:03', '2014-04-26 12:47:03', 1, 1, 1, 1, 0, 'c++的性能, c#的产能？！鱼和熊掌可以兼得，.NET NATIVE初窥(已添加初步体验和对比图）', '', '', NULL, NULL, NULL, NULL, '    .Net当初的出现是因为Java让人了解到计算机发展的今天，语言的产能重要性是高于性能的。于是微软便出了CLR和.Net。JIT（运行时编译）虽然消耗了性能，却大大增加了产能。但是ObjectC又告诉了大家在平板和智能手机内存和存储受限的情况下，机器码编译性能是多么重要，而且也省电，这也很重要不是吗。\r\n\r\n         微软W8出现是平板时代应运而生的，于是便出现了开发时的产能，运行时的性能的合体：.NET NATIVE。\r\n\r\n \r\n\r\n　　.NET NATIVE目的是为了生产上的流水线产出的手工产品，易于开发，运行时精致。\r\n\r\n \r\n\r\n         .NET NATIVE之前被称为Project N, 它可以把C#语言编译成机器码native code，使之可以像C++一样运行。其实这样讲比较笼统，具体是在NATIVE里微软重写了.NET Framework，将程序所需要的framework里的元素加进去而其他的则不用，生成可以运行的机器码，最终实现运行时本地机器码，不用动态编译，节省了内存和空间。\r\n\r\n　　这其中有个误区，很多人认为是.NET NATIVE把C#编译成了C++，其实并不是，C++编译器后端接受IL作为输入，生成MDIL。\r\n\r\n　　.NET NATIVE解决了很多.NET的问题，比如.NET运行时计算，是消耗内存和开销更多电量，.NET NATIVE编译时只有用到的才会静态链接，其他部分就不要了，内存中放入的只有框架的一部分，所以内存占用很少，电量消耗也少，很适合平板等内存相比较小的设备。\r\n\r\n \r\n\r\n　　.Net native也实现了云编译，开发者提供.NET代码，而消费者安装的是自己设备可以使用的机器码.\r\n\r\n　　.Net native解决了.NET 版本管理的问题。开发中最常遇到这个东西.NET 低版本不支持，或者是要支持一些低版本机器，导致我们开发的环境一直是以低版本.net来进行的。.net native编译成机器码就不存在这种问题了。个人认为这个是其商业价值所在。\r\n\r\n　　据官网，用native编译的windows商店程序, 启动速度加快60%,占用内存减少将近20%.\r\n\r\n　　现在.net native支持windows store apps，暂时不支持其他的一些.net桌面程序，WPF等。但我们可以期待以后会出现全盘都支持的时代。私人认为WPF是难点，毕竟是用了GPU.\r\n\r\n　　安卓也有类似的，4.4出现了ART。希望有ART开发经验的来一起研究进行对比。http://www.pcpop.com/doc/0/967/967006.shtml\r\n\r\n　　现在我PC正在安装VS2013 Update2（3G，苦逼了我的64G 苏菲PRO)和.net native,之后会陆陆续续出一些关于.net native的使用和外国博客的翻译，毕竟国外走的还是比较前的。\r\n\r\n　　个人认为出现的有点略晚，XP已经下架了。现在基本都是.net 3.5及以上了。还是以观后效吧。\r\n\r\n　　2L说的性能对比，之后我会尽量做得。正在安装UPDATE2中。'),
(18, 108, 0, '', '2014-04-26 12:47:29', '2014-04-26 12:47:29', 2, 0, 0, 2, 0, 'make_shared和shared_ptr的区别', '', '', NULL, NULL, NULL, NULL, 'truct A;\r\nstd::shared_ptr<A> p1 = std::make_shared<A>();\r\nstd::shared_ptr<A> p2(new A);\r\n上面两者有什么区别呢？ 区别是：std::shared_ptr构造函数会执行两次内存申请，而std::make_shared则执行一次。\r\n\r\nstd::shared_ptr在实现的时候使用的refcount技术，因此内部会有一个计数器（控制块，用来管理数据）和一个指针，指向数据。因此在执行std::shared_ptr<A> p2(new A)的时候，首先会申请数据的内存，然后申请内控制块，因此是两次内存申请，而std::make_shared<A>()则是只执行一次内存申请，将数据和控制块的申请放到一起。那这一次和两次的区别会带来什么不同的效果呢？\r\n\r\n异常安全\r\n考虑下面一段代码：\r\n\r\nvoid f(std::shared_ptr<Lhs> &lhs, std::shared_ptr<Rhs> &rhs){...}\r\n\r\nf(std::shared_ptr<Lhs>(new Lhs()),\r\n  std::shared_ptr<Rhs>(new Rhs())\r\n);\r\n因为C++允许参数在计算的时候打乱顺序，因此一个可能的顺序如下:\r\n\r\nnew Lhs()\r\nnew Rhs()\r\nstd::shared_ptr\r\nstd::shared_ptr\r\n此时假设第2步出现异常，则在第一步申请的内存将没处释放了，上面产生内存泄露的本质是当申请数据指针后，没有马上传给std::shared_ptr，因此一个可能的解决办法是：\r\n\r\nauto lhs = std::shared_ptr<Lhs>(new Lhs());\r\nauto rhs = std::shared_ptr<Rhs>(new Rhs());\r\nf(lhs, rhs);\r\n而一个比较好的方法是使用std::make_shared。\r\n\r\nf(std::make_shared<Lhs>(),\r\n  std::make_shared<Rhs>()\r\n);\r\nmake_shared的缺点\r\n因为make_shared只申请一次内存，因此控制块和数据块在一起，只有当控制块中不再使用时，内存才会释放，但是weak_ptr却使得控制块一直在使用。\r\n\r\n什么是weak_ptr？\r\nweak_ptr是用来指向shared_ptr，用来判断shared_ptr指向的数据内存是否还存在了（通过方法lock），下面是一段示例代码：\r\n\r\n#include <memory>\r\n#include <iostream>\r\nusing namespace std;\r\nstruct A{\r\n    int _i;\r\n    A(): _i(int()){}\r\n    A(int i): _i(i){}\r\n};\r\n\r\nint main()\r\n{\r\n    shared_ptr<A> sharedPtr(new A(2));\r\n    weak_ptr<A> weakPtr = sharedPtr;\r\n    sharedPtr.reset(new A(3)); // reset，weakPtr指向的失效了。\r\n    cout << weakPtr.use_count() <<endl;\r\n}\r\n通过lock（）来判断是否存在了，lock（）相当于'),
(19, 108, 0, '', '2014-04-26 12:48:25', '2014-04-26 12:48:25', 1, 0, 1, 1, 0, '浅谈 == 与 === 的性能问题', '', '', NULL, NULL, NULL, NULL, '大家都知道 == 是不区分类型是否相同，只要结果一致即可，而 === 则是连类型也必须相同才行。\r\n比如  "1" == 1  是 true, 而  "1" === 1  是 false ，这个理所当然都知道的。\r\n但很少有人用 === 因为很多新手对 js 不熟，为了保证不出错所以全用 ==\r\n或者是因为 == 方便，不必考虑结果类型，等等，反正 == 比 === 方便，而且不容易出错。\r\n确实 == 比较方便而且兼容性好，但是他的性能问题也不容小嘘的。\r\n\r\n翻阅 V8 源码（查看 == 源码， 查看 === 源码）可以很明显发现 == 源码里各种比较各种转换。\r\n而 === 源码里只对 字符串 和 数字 进行了比较，如果不是 字符串 和 数字 则直接比较是否为同一引用。\r\n\r\n上面 V8  源码对应的 ECMA-262 章节详细描述了 == 与 === 的判定方法：\r\nECMA-262 Section 11.9.3, ECMA-262 Section 11.9.4, ( === 的算法部分在 ECMA-262 Section 11.9.6 )\r\n\r\n虽然我英文不太好，但是勉强看到 == 各种判断和转换，而 === 则明显少很多。\r\n\r\n不说那些条条框框的，我们用例子来测试下吧。'),
(20, 108, 0, '', '2014-04-26 12:48:45', '2014-04-26 12:48:45', 1, 1, 0, 3, 0, '一道淘汰85%面试者的百度开发者面试题', '', '', NULL, NULL, NULL, NULL, ' 最近在CSDN上看到一道题，据说淘汰了85%的面试者（只是据说而已）。心血来潮，随便写个算法，该算法很简单，主要就是考察应聘者是否注重细节。题干如下：\r\n\r\n    依序遍历0到100闭区间内所有的正整数，如果该数字能被3整除，则输出该数字及‘*’标记；如果该数字能被5整除，则输出该数字及‘#’标记；如果该数字既能被3整除又能被5整除，则输出该数字及‘*#’标记。\r\n\r\n    该题主要考察了如下几点。\r\n\r\n    1.  正整数。不知这题怎么出了，这是数学的概念。看到有很多答案从0开始扫描，0是整数，非正非负，应该从1、2或3开始扫描都可以。\r\n\r\n    2.  题目给出了3个条件，应该先考虑条件苛刻的，也就是同时被3和5整除的，然后再考虑被3或被5整除的。\r\n\r\n    3.  闭区间（这TM的玩文字游戏呢！）。所以不能用for(int i = 0; i < 100;i++)。有很多家伙习惯了，条件都是用“<”。\r\n\r\n    下面是题目的答案。'),
(21, 109, 0, '', '2014-04-26 12:50:00', '2014-04-26 12:50:00', 1, 0, 2, 2, 0, '【干货】通用静态扩展类', '', '', NULL, NULL, NULL, NULL, '在开发过程中，我们通常会将常用方法封装在一个辅助类里，提高可复用性。自.net3.5以后，.net已经支持通过this关键字为类进行扩展，目前只可以扩展静态方法，这对于常用方法的封装是很有用的。比如，给asp.net的Page类扩展WriteJson方法，直接在页面代码里用 this.WriteJson(....)，即可轻松调用扩展的静态方法。以下是在工作中积累的部分代码，后续会持续更新，直接上干货：'),
(22, 109, 0, '', '2014-04-26 12:50:29', '2014-04-26 12:50:29', 0, 1, 0, 19, 0, '使用Ubuntu 12.04作为日常电脑环境', '', '', NULL, NULL, NULL, NULL, '搜狗输入法出来之后，我觉得有必要写一篇博客说明一下，如何使用Ubuntu作为日常的电脑系统。我使用的Ubuntu版本是12.04，没有使用Ubuntukylin，因为的电脑比较老，使用那个版本，电脑有点卡。不知道是驱动问题还是什么问题。但是安装12.04非常的稳定，而已速度很快。\r\n\r\n在Windows下，一个系统应付日常使用，也就是微软定义的家庭普通版。以下讨论的不涉及用于专业人士和工程相关人士的电脑桌面环境。所以这里只针对普通用户而言。特别是在微软从2014年4月8日开始不支持Windows XP时，使用另外一款桌面系统来代替XP系统也是值得研究的。\r\n\r\nWindows平台\r\n在Windows下，一般有一下类软件必须要有。\r\n\r\n1.操作系统：Windows系统，大家基本都是XP，Windows7，以及Windows8。Windows Vista和其他版本也有，但是市场份额太小。\r\n\r\n2.Office软件，虽说普通用户，但是也不免要使用Word,Excel,PowerPoint。现在Outlook客户端，家庭用户基本都不用，一般都用在线的163邮箱，Gmail，outlook.com,QQ邮箱等\r\n\r\n3.浏览器：IE，Chrome和Firefox应该是主流浏览器，因为很多应用都没有客户端了，都可以直接在网页里面完成。\r\n\r\n4.输入法：是一个系统核心软件。没有一款好的输入法，用户就不习惯使用这款系统。我目前觉得iPhone和iPad设备上，不可以装第三方输入法，我是有点想不通。\r\n\r\n5.即时通讯：但是有一个软件大家还是喜欢使用客户端。那就是即时通讯软件-QQ。这个是中国人，只要上网了，基本都有一个QQ账号，而已是通讯和交流的必备工具。\r\n\r\n6.这个在普通用户中，使用人数还是蛮多的。杀毒软件。国内windows用户在360大肆宣传免费杀毒之后，很多普通用户都装了360杀毒软件和360卫士。到目前为止，我也没有弄懂它两者的区别。真正在企业里面，大多数企业会购买企业版卡巴斯基。目前360在企业市场上还没有什么大的产品。所以卡巴斯基有句广告词：从此只有卡巴斯基。\r\n\r\n普通用户在拥有以上6个软件，基本能满足他们的大多数需求。\r\n\r\n那切换到GNU/Linux环境下有什么不同呢？那么下面谈谈我目前的方案：'),
(23, 109, 0, '', '2014-04-26 12:51:42', '2014-04-26 12:51:42', 1, 1, 0, 2, 0, '我涉及的数据可视化的实现技术和工具', '', '', NULL, NULL, NULL, NULL, '1. HTML5 canvas\r\n乔教主去世的前后两年，HTML5非常火，在乔教主的指引下，HTML5仿佛是未来的明灯，将一统移动端和桌面的浏览器，甚至制造各种原生应用，似乎开个web相关会议不谈谈HTML5大方向就落伍了。但是到了2013年，HTML5的话题一下子沉寂了下来，仿佛之前的热闹都是假象——事实上这是因为这个东西已经从未来变成的现实，一个新技术进入了平稳发展期，自然没必要像宣传普及期那么大张旗鼓了。\r\n\r\nHTML5标准主要是给给浏览器厂商看的，就是要让浏览器支持从调用摄像头到3d绘图等一系列功能，通过统一标准来减轻web开发者的负担。不过HTML5推进过程也不像原来想象得那么顺利。HTML5遇到的最大问题是浏览器兼容性，标准不断地补充修改，但是并非所有浏览器都能使用。造成这种现状的原因有二，一方面有浏览器厂商因为利益原因大打出手（例如google反对h.264导致video标签难产），一方面有个别浏览器厂商不求上进半天不支持主要标准（微软现在也着急了，IE12已经迎头赶上了）。\r\n\r\n从2010年末起我就开始接触使用HTML5相关的新技术。而用的最多的就是绘图相关的canvas标签。canvas标签的浏览器兼容性比较好。根据最新的统计（百度统计|流量研究院 ）。国内还在使用IE6的用户已经接近10%。\r\n\r\n<canvas></canvas>是html5出现的新标签，像所有的dom对象一样它有自己本身的属性、方法和事件。 使用canvas的基本方式是，使用js调用canvas的API绘图。例如，绘制一段贝塞尔曲线，需要用写这样一段javascript来生成：\r\n\r\nfunction draw24(id) {\r\n    var canvas = document.getElementById(id);\r\n    if (canvas == null) {\r\n        return false;\r\n    }\r\n    var context = canvas.getContext("2d"); //获取convas 2d对象，其中封装了很多绘图方法（现在canvas只有2D对象可以调用）\r\n\r\n    context.moveTo(50, 50); //移动绘图中心点\r\n    context.bezierCurveTo(50, 50,150, 50, 150, 150); //绘制贝塞尔曲线\r\n    context.stroke(); //绘制边框\r\n    context.quadraticCurveTo(150, 250, 250, 250); //绘制2次样条曲线\r\n    context.stroke(); //绘制边框\r\n}\r\n最后绘制的结果如下图所示：'),
(24, 109, 0, '', '2014-04-26 12:52:17', '2014-04-26 12:52:17', 0, 1, 0, 2, 0, 'sql优化（oracle）', '', '', NULL, NULL, NULL, NULL, '1） create  a cursor  创建游标\r\n\r\n　　2） parse the statement 分析语句\r\n\r\n　　3)  describe results of a query 描述查询的结果集\r\n\r\n　　4）define output of a query 定义查询的输出数据\r\n\r\n　　5）bind any variables 绑定变量\r\n\r\n　　6）parallelize the statement 并行执行语句\r\n\r\n　　7）run the statement 运行语句\r\n\r\n　　8）fetch rows of a query 取查询结果\r\n\r\n　　9）close the cursor 关闭游标\r\n\r\n \r\n\r\n2.SQL 共享\r\n　　1. 为不重复解析相同的SQL语句，oracle 将执行过的SQL语句存放在内存的共享池（shared buffer pool）中，可以被所有数据库用户共享\r\n\r\n　　2. 当执行一个SQL语句时，如果它和之前执行过的语句完全相同（注意同义词和表是不同对象），oracle就能获得已经被解析的语句；\r\n\r\n \r\n\r\n3.bind variables绑定变量\r\n     1）解决重编译问题'),
(25, 110, 0, '', '2014-04-26 12:56:31', '2014-04-26 12:56:31', 1, 1, 0, 17, 0, '设计模式之美：Type Object（类型对象）', '', '', NULL, NULL, NULL, NULL, '意图\r\n\r\n允许在运行时动态灵活的创建新的 "类"，而这些类的实例代表着一种不同的对象类型。\r\n\r\nAllow the flexible creation of new “classes” by creating a single class, each instance of which represents a different type of object.\r\n\r\n结构\r\n\r\n\r\n\r\nType Object 模式包含两个具体类。一个用于描述对象，另一个用于描述类型。每个对象都包含一个指向其类型的指针。\r\n\r\n\r\n\r\n参与者\r\n\r\nTypeClass\r\n\r\n是 TypeObject 的种类。\r\n每个种类都会有一个单独的类。\r\nTypeObject\r\n\r\n是 TypeClass 的实例。\r\n代表着一种对象。定义一种对象所包含的属性和行为。\r\n适用性\r\n\r\n当以下情况成立时可以使用 Type Object 模式：\r\n\r\n类的实例需要根据它们的通用属性或者行为进行分组。\r\n类需要为每个分组定义一个子类来实现该分组的通用属性和行为。\r\n类需要大量的子类或者多种变化的子类甚至无法预期子类的变化。\r\n你需要有能力在运行时创建一些无法在设计阶段预测的新的分组。\r\n你需要有能力在类已经被实例化的条件下更改一个对象的子类。\r\n效果\r\n\r\n运行时创建新的类型对象。\r\n避免子类膨胀。\r\n客户程序无需了解实例与类型的分离。\r\n可以动态的更改类型。\r\n相关模式\r\n\r\nType Object 模式有些类似于 Strategy 和 State 模式。这三种模式都是通过将对象内部的一些行为代理到外部的对象中。Stategy 和 State 通常是纯行为的代理，而 Type Object 则包含更多个共享数据状态。State 可以被频繁的更改，Type Object 则很少被改变。Strategy 通常仅包含一个职责，Type Object 则通常包含多个职责。\r\nType Object 的实现与 Bridge 模式中的 Abstraction 和 Implementor 的关系很像。区别在于，客户程序可以与 Type Object 直接协作，而不会直接与 Implementor 进行交互。\r\nType Object 有点像 Flyweight 一样处理它的对象。两个对象使用相同的 Type Object 可能看起来是使用的各自的实例，但实际是共享的对象。\r\nType Object 可以解决多个对象共享数据和行为的问题。类似的问题也可以用 Prototype 模式来解决。'),
(26, 110, 0, '', '2014-04-26 12:56:56', '2014-04-26 12:56:56', 0, 1, 1, 1, 0, ' Javascript多线程引擎(十)---Web服务器', '', '', NULL, NULL, NULL, NULL, '　　经过一天的努力, 引擎可以支持web服务的功能了并且支持UTF-8的编码, 具有对HTTP参数的解析，状态码的配置， 响应报文的输出等.\r\n\r\n提供了\r\n\r\n　　startServer(function(request, response){\r\n\r\n \r\n\r\n},port)\r\n\r\n　　函数来打开Web服务.\r\n\r\n　　而requset的方法为:\r\n\r\n　　　　getParameter(): String 可以让您指定请求参数名称，以取得对应的设定值.\r\n　　　　getServerName():String	 请求的服务器.\r\n　　　　getMethod(): "POST" | "GET" | "DELETE" ...	请求方法.\r\n　　　　getServerPort(): Number	 请求端口号.\r\n　　　　getRequestURI():URI路径.-> ''/main/list.do''	除去http://localhost:8080/部分的地址\r\n\r\n　　response方法为:\r\n\r\n　　　　setHeader(String,String): 是一个通用的标头设定方法，您可以用它来设定任何「名称/值」的标头.\r\n　　　　setStatus(Number):	 状态码\r\n　　　　write(String) : 写入返回文本\r\n　　　　clear():	 清空write内容\r\n\r\n　　这样子基本上可以实现了一个对功能点的实现.\r\n\r\n　　一下是一个测试环境, 通过lighttpd 提供html等静态文件的服务，而js引擎专注于功能点的实现, 之间通过方向代理来完成链接.\r\n\r\n　　lighttpd 主要配置如下:'),
(27, 110, 0, '', '2014-04-26 12:57:25', '2014-04-26 12:57:25', 0, 1, 0, 3, 0, '从循环引用谈依赖倒置原则', '', '', NULL, NULL, NULL, NULL, '在业务开发中，通常会按照业务或者逻辑将项目分成好几个工程文件以方便重用和模块化，有时候我们分开的两个项目可能存在相互引用的情况，举个例子，比如有两个系统，订单系统和产品系统，订单系统需要从产品系统中了解当前产品是否有剩余。产品系统需要从订单系统中了解产品的销售情况，这时候就存在相互引用的情况。\r\n\r\n循环引用在Visual Studio中是编译不通过的。出现循环引用很可能是设计上抽象不够导致的，根据设计模式的依赖倒置-高层模块不应该依赖于低层模块。二者都应该依赖于抽象，抽象不应该依赖于细节，细节应该依赖于抽象这一原则，可以来解决循环引用。\r\n\r\n在一些项目中，使用一些依赖注入的框架如SPRING.net，CASTLE可以在一定程度上避免循环引用。 Class A中用到了Class B的对象b，一般情况下，需要在A的代码中显式的new一个B的对象。采用依赖注入技术之后，A的代码只需要定义一个私有的B对象，不需要直接new来获得这个对象，而是通过相关的容器控制程序来将B对象在外部new出来并注入到A类里的引用中。而具体获取的方法、对象被获取时的状态由配置文件（如XML）来指定。\r\n\r\n但有时候，项目中一些小的功能点如果使用这些框架会显得“过重”，并且解决功能点之间的循环引用也不太复杂，简言之就是抽象出接口。下面就演示一下如何解决项目间的循环引用。\r\n\r\n为了演示，首先新建Product 和Order两个类库，Product类库中内容如下：'),
(28, 106, 0, '', '2014-04-26 12:58:04', '2014-04-26 12:58:04', 1, 1, 0, 1, 0, '跟着大神重写的KNN 文档归类小工具', '', '', NULL, NULL, NULL, NULL, '在知道KNN之前，楼主有时候会粗糙地做一些分类模型的计算。在拜读了Orisun大神[http://www.cnblogs.com/zhangchaoyang/articles/2162393.html]的一些文章从中得到了一些启发，这些天突发奇想决定把N年前的分类模型按照KNN的思路重写，重新把大神的思路形象地再回溯一下，方便后人更加清晰的认识整个过程。很多时候，历史的进步来源于前辈们的传道、授业、解惑。既然大神给JAVA，不材这边就继续补充一个C++的，为陷在JAVA中的斗士们吹一曲老革命之歌。\r\n\r\n·设计思路\r\n\r\n    像大多数的ML体系一下，向量和概率学几乎是整个ML体系的基础，但从历史经验的推断又是ML的命门，人类与机器之间的战争从未体质。文档分类工具的设计初衷是希望拿到的这边文章能够准确的归为某一类，大神是通过KNN把复旦的语料分个类。楼主这边就简单地把公司投诉内容也简单归个类。KNN的最早设计模型如下图所示：'),
(29, 106, 0, '', '2014-04-26 12:58:37', '2014-04-26 12:58:37', 1, 0, 0, 1, 0, '[Linux实用工具]Windows下同步Linux文件（Linux安装Samba和配置）', '', '', NULL, NULL, NULL, NULL, '场景需求：\r\n\r\n安装了Ubuntu在虚拟机上，但是代码编辑或者其它更多的操作的时候，还是习惯在windows下进行。如果windows下编辑完再上传到服务器，再编译执行，就太繁琐了。一次两次还好说，这编译级别上千次的，每次也需要上传的话，无疑是个人间悲剧。但是有了Samba，犹如雪中送炭啊。\r\n \r\n安装\r\nUbuntu下安装比较简单，执行\r\n # install samba samba-common\r\n即可。当然也可以直接去官网（https://www.samba.org/）下载安装。\r\n \r\n配置\r\n1. 新建共享的目录：\r\n# mkdir /home/用户名/share\r\n# chmod 777 /home/用户名/share\r\n \r\n2. 修改配置smb.conf\r\n修改前最好先备份smb.conf文件。\r\n# cp /etc/samba/smb.conf /etc/samba/smb.conf_bak\r\n# vim /etc/samba/smb.conf\r\n    2.1 取消 # security = user 的注释，并在后面一行加上 username map = /etc/samba/smbusers\r\nsecurity = user\r\nusername map = /etc/samba/smbusers\r\n    2.2 在文件的最后面加上以下配置  '),
(30, 106, 0, '', '2014-04-26 12:58:59', '2014-04-26 12:58:59', 0, 1, 0, 2, 0, 'C#之玩转反射', '', '', NULL, NULL, NULL, NULL, '前言\r\n\r\n之所以要写这篇关于C#反射的随笔，起因有两个:\r\n\r\n  第一个是自己开发的网站需要用到\r\n\r\n  其次就是没看到这方面比较好的文章。\r\n\r\n所以下定决心自己写一篇，废话不多说开始进入正题。\r\n\r\n \r\n\r\n前期准备\r\n\r\n在VS2012中新建一个控制台应用程序（我的命名是ReflectionStudy），这个项目是基于.net 4.0。接着我们打开Program.cs文件，按照如下在Program中写一个我们自己的类：\r\n'),
(31, 104, 0, '', '2014-04-27 13:37:32', '2014-04-27 13:37:32', 0, 1, 0, 2, 0, 'php中is_dir函数的不足', '', '', NULL, NULL, NULL, NULL, 'is_dir 函数只能够判断一个目录是否是合法的，就像文件名命名是不是合法一样，但是却不能判断目录的真实性，比如\r\n$path = ''/aaaa/bbb/ccc/ddd/'';\r\n$fileName = ''/aaa/bbb/ccc/ddd.txt'';\r\n用is_dir($path)判断,不论目录是否存在，函数永远返回true \r\n用is_file($fileName)判断,如果存在则返回true,否则返回false.\r\n我不知道这算不算php5中的一个bug ,因为我没用过php4 ,所以暂时认为是php5的一个不足之处。\r\n                               \r\n                                           leobyrds.bokee.com\r\n                                           QQ:181033104'),
(32, 108, 0, '', '2014-04-27 15:03:18', '2014-04-27 15:03:18', 1, 0, 0, 9, 0, '习近平两月内六次提反恐', 'c,', '', '', '两月内六次提反恐', '反恐 习近平', '中共中央政治局25日下午就切实维护国家安全和社会安定进行第十四次集体学习。习近平强调，面对新形势新挑战，维护国家安全和社会安定，对全面深化改革、实现“两个一百年”奋斗目标、实现中华民族伟大复兴的中国梦都十分紧要。据不完全统计，这已是习近平两月内第六次提及反恐。', '中共中央政治局25日下午就切实维护国家安全和社会安定进行第十四次集体学习。习近平强调，面对新形势新挑战，维护国家安全和社会安定，对全面深化改革、实现“两个一百年”奋斗目标、实现中华民族伟大复兴的中国梦都十分紧要。据不完全统计，这已是习近平两月内第六次提及反恐。\r\n\r\n　　各种威胁挑战联动效应明显\r\n\r\n　　习近平指出，改革开放以来，我们党始终高度重视正确处理改革发展稳定关系，始终把维护国家安全和社会安定作为党和国家的一项基础性工作。我们保持了我国社会大局稳定，为改革开放和社会主义现代化建设营造了良好环境。“安而不忘危，存而不忘亡，治而不忘乱。”同时，必须清醒地看到，新形势下我国国家安全和社会安定面临的威胁和挑战增多，特别是各种威胁和挑战联动效应明显。我们必须保持清醒头脑、强化底线思维，有效防范、管理、处理国家安全风险，有力应对、处置、化解社会安定挑战。\r\n\r\n　　习近平强调，各地区各部门要贯彻总体国家安全观，准确把握我国国家安全形势变化新特点新趋势，坚持既重视外部安全又重视内部安全、既重视国土安全又重视国民安全、既重视传统安全又重视非传统安全、既重视发展问题又重视安全问题、既重视自身安全又重视共同安全，切实做好国家安全各项工作。要加强对人民群众的国家安全教育，提高全民国家安全意识。\r\n\r\n　　满足正常宗教需求，抵御极端渗透\r\n\r\n　　习近平指出，反恐怖斗争事关国家安全，事关人民群众切身利益，事关改革发展稳定全局，是一场维护祖国统一、社会安定、人民幸福的斗争，必须采取坚决果断措施，保持严打高压态势，坚决把暴力恐怖分子嚣张气焰打下去。要建立健全反恐工作格局，完善反恐工作体系，加强反恐力量建设。要坚持专群结合、依靠群众，深入开展各种形式的群防群治活动，筑起铜墙铁壁，使暴力恐怖分子成为“过街老鼠、人人喊打”。要发挥爱国宗教人士作用，加强对信教群众的正面引导，既满足他们正常宗教需求，又有效抵御宗教极端思想的渗透。\r\n\r\n　　习近平强调，暴力恐怖活动漠视基本人权、践踏人道正义，挑战的是人类文明共同的底线，既不是民族问题，也不是宗教问题，而是各族人民的共同敌人。我们要坚定不移相信和依靠各族干部群众，团结他们一道维护民族团结和社会稳定。\r\n\r\n　　及时解决影响民族团结矛盾纠纷\r\n\r\n　　习近平指出，要加强新形势下反分裂斗争，高举各民族大团结的旗帜，坚持各民族共同团结奋斗、共同繁荣发展的主题，深入开展民族团结宣传教育，打牢民族团结的思想基础，最大限度团结各族群众。要加强基层组织和基层政权建设，多做深入细致的群众工作。要正确把握党的民族、宗教政策，及时妥善解决影响民族团结的矛盾纠纷，坚决遏制和打击境内外敌对势力利用民族问题进行的分裂、渗透、破坏活动。\r\n\r\n　　习近平强调，维护国家安全，必须做好维护社会和谐稳定工作，做好预防化解社会矛盾工作，从制度、机制、政策、工作上积极推动社会矛盾预防化解工作。要增强发展的全面性、协调性、可持续性，加强保障和改善民生工作，从源头上预防和减少社会矛盾的产生。要以促进社会公平正义、增进人民福祉为出发点和落脚点，加大协调各方面利益关系的力度，推动发展成果更多更公平惠及全体人民。要完善和落实维护群众合法权益的体制机制，完善和落实社会稳定风险评估机制，预防和减少利益冲突。要全面推进依法治国，更好维护人民群众合法权益。对各类社会矛盾，要引导群众通过法律程序、运用法律手段解决，推动形成办事依法、遇事找法、解决问题用法、化解矛盾靠法的良好环境。'),
(33, 108, 0, '', '2014-04-27 15:05:35', '2014-04-27 15:05:35', 1, 0, 0, 9, 0, '"广西一号传销大案"公开宣判 118人获刑', NULL, '', '', '广西一号传销大案', '传销', '', '中新网南宁4月27日 4月27日，广西南宁市西乡塘区法院一审公开宣判被列为“广西一号传销大案”的“1.18”组织、领导传销活动系列案，以犯组织、领导传销活动罪，分别判处被告人李永兵、赵晨江、常景等118人10年至1年7个月不等有期徒刑，并处罚金人民币200万元至10万元不等。\r\n\r\n因报告人数众多，宣判从当日上午8时起持续进行一天。被告人家属、媒体记者及各界民众百余人参加旁听。\r\n\r\n据悉，前述系列传销案分为三个案件共118名被告人，分别是被告人李永兵等46人、赵晨江等33人、常景等39人组织、领导传销活动案。三个案件一审开庭审理长达11天，直接参加庭审押解、保障的法警和公安人员达200余人，辩护律师近百人，备受社会关注。\r\n\r\n李永兵、赵晨江、常景等118名被告人的年龄主要集中在30至40岁，其中最小的26岁，最大的69岁，各被告人均属于同一“纯资本运作”传销体系，整个传销体系成员人数众多，涉及多个省份，涉案金额特别巨大。各被告人均有一定文化程度，最高的达到研究生学历。\r\n\r\n法院审理查明，被告人李永兵、赵晨江、常景等人自2009年起在南宁以参加“纯资本运作”为名，要求参加者缴纳申购款购买“份额”获取加入资格，然后参加者通过“拉人头”方式发展下线，并按照“五级三晋制”进行管理，上级人员按参加者发展的人数及申购份额等瓜分参加者交纳的申购款。\r\n\r\n该组织发展庞大，传销体系成员超1900人，涉及新疆、安徽、四川、山东、甘肃等多个省(自治区)，网络层级超过40级，涉案金额特别巨大。\r\n\r\n法院经审理并根据被告人的犯罪事实，犯罪性质、情节和对社会的危害程度等，依法作出上述判决。'),
(34, 108, 0, '', '2014-04-27 15:13:06', '2014-04-27 15:13:06', 1, 0, 0, 2, 0, 'PHP isset()与empty()的使用区别详解', 'b,i,c,', '', '', 'PHP isset()与empty()的使用区别详解', '', '通过对PHP语言的学习，应该知道它是基于函数的一款HTML脚本语言。庞大的函数库支持着PHP语言功能的实现。下面我们为大家介绍有关PHP函数isset()与empty()的相关用法。', 'PHP的isset()函数 一般用来检测变量是否设置 \r\n格式：bool isset ( mixed var [, mixed var [, ...]] ) \r\n\r\n功能：检测变量是否设置 \r\n\r\n返回值： \r\n\r\n若变量不存在则返回 FALSE \r\n若变量存在且其值为NULL，也返回 FALSE \r\n若变量存在且值不为NULL，则返回 TURE \r\n同时检查多个变量时，每个单项都符合上一条要求时才返回 TRUE，否则结果为 FALSE \r\n版本：PHP 3, PHP 4, PHP 5 \r\n更多说明： \r\n使用 unset() 释放变量之后，它将不再是 isset()。 \r\nPHP函数isset()只能用于变量，传递任何其它参数都将造成解析错误。 \r\n检测常量是否已设置可使用 defined() 函数。 \r\n\r\nPHP的empty()函数 判断值为否为空 \r\n\r\n格式：bool empty ( mixed var ) \r\n\r\n功能：检查一个变量是否为空 \r\n\r\n返回值： \r\n\r\n若变量不存在则返回 TRUE \r\n若变量存在且其值为""、0、"0"、NULL、、FALSE、array()、var $var; 以及没有任何属性的对象，则返回 TURE \r\n若变量存在且值不为""、0、"0"、NULL、、FALSE、array()、var $var; 以及没有任何属性的对象，则返回 FALSE \r\n版本：PHP 3, PHP 4, PHP 5 \r\n更多说明： \r\nempty()的返回值=!(boolean) var，但不会因为变量未定义而产生警告信息。参见转换为布尔值获取更多信息。 \r\nempty() 只能用于变量，传递任何其它参数都将造成Paser error而终止运行。 \r\n检测常量是否已设置可使用 defined() 函数。 \r\n例子： empty() 与 isset() 的一个简单比较 ');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

CREATE TABLE IF NOT EXISTS `goods` (
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
  `price` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `catalog_id`, `user_id`, `username`, `publish_time`, `is_headline`, `is_top`, `is_recommend`, `status`, `title`, `title_format`, `title_redirect_url`, `title_pic`, `note`, `note2`, `price`, `weight`) VALUES
(1, 14, 0, '', '2014-04-08 14:09:57', 0, 0, 0, 0, '水果', '', '', '水果', '', '', '40', 30),
(2, 18, 0, '', '2014-04-08 14:34:48', 0, 0, 0, 0, '服装标题', '', '', '服装图片', '', '', '40', 10);

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
-- 表的结构 `model_news4`
--

CREATE TABLE IF NOT EXISTS `model_news4` (
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
  `tt` varchar(255) NOT NULL,
  `ww` varchar(255) NOT NULL,
  `aa` varchar(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `model_news4`
--

INSERT INTO `model_news4` (`id`, `catalog_id`, `user_id`, `username`, `publish_time`, `is_headline`, `is_top`, `is_recommend`, `status`, `title`, `title_format`, `title_redirect_url`, `title_pic`, `note`, `note2`, `tt`, `ww`, `aa`) VALUES
(1, 8, 0, 'e', '2014-04-06 03:42:28', 0, 0, 0, 0, 'aabbb', '', '', 'e', 'e', '', '', '', ''),
(2, 13, 0, '公司动态新闻', '2014-04-06 06:20:04', 0, 0, 0, 0, '公司动态新闻', '', '', '公司动态新闻', '公司动态新闻', '', '', '', ''),
(3, 1, 0, 'dd', '2014-04-06 08:44:50', 0, 0, 0, 0, 'aa', '', '', 'tt', 'aa', '', '', '', ''),
(4, 0, 0, '公司动态3', '2014-04-06 09:15:41', 0, 0, 0, 0, '公司动态3', '', '', '公司动态3', '公司动态3', '', '', '', ''),
(5, 0, 0, 'tt', '2014-04-06 09:16:18', 0, 0, 0, 0, 'tt', '', '', 'tt', 'tt', '', '', '', ''),
(6, 1, 0, 'tt', '2014-04-06 09:17:48', 0, 0, 0, 0, 'tt', '', '', 'tt', 'tt', '', '', '', ''),
(7, 13, 0, 'tt', '2014-04-06 09:42:33', 0, 0, 0, 0, 'tt', '', '', 'tt', 'tt', '', '', '', ''),
(8, 13, 0, 'ee', '2014-04-06 09:43:15', 0, 0, 0, 0, 'aa', '', '', 'ee', 'ee', '', '', '', ''),
(9, 13, 0, 'dd', '2014-04-06 09:44:03', 0, 0, 0, 0, 'aa', '', '', 'dd', 'dd', '', '', '', ''),
(10, 1, 0, 'tt', '2014-04-06 09:44:55', 0, 0, 0, 0, 'tt', '', '', 'tt', 'tt', '', '', '', ''),
(11, 13, 0, '', '2014-04-06 09:45:06', 0, 0, 0, 0, '', '', '', '', '', '', '', '', ''),
(12, 13, 0, 'rr', '2014-04-06 13:03:17', 0, 0, 0, 0, 'rr', '', '', 'rr', '', '', '', '', ''),
(13, 17, 0, 'wpf', '2014-04-08 15:38:52', 0, 0, 0, 0, 'wpf', '', '', 'wpf', 'wpf', '', '', '', ''),
(14, 13, 0, '', '2014-04-08 16:18:44', 0, 0, 0, 0, '企业文化', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `q` int(11) NOT NULL AUTO_INCREMENT,
  `w` text NOT NULL,
  `e` mediumtext NOT NULL,
  `r` longtext NOT NULL,
  `test` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`q`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `test`
--

INSERT INTO `test` (`q`, `w`, `e`, `r`, `test`) VALUES
(1, 'a', 'a', 'b', 'dddas2222222dddas');

-- --------------------------------------------------------

--
-- 表的结构 `ttbb`
--

CREATE TABLE IF NOT EXISTS `ttbb` (
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
  `ww` varchar(255) NOT NULL,
  `qq` varchar(255) NOT NULL,
  `tt` varchar(255) NOT NULL,
  `ee` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `ttbb`
--

INSERT INTO `ttbb` (`id`, `catalog_id`, `user_id`, `username`, `publish_time`, `is_headline`, `is_top`, `is_recommend`, `status`, `title`, `title_format`, `title_redirect_url`, `title_pic`, `note`, `note2`, `ww`, `qq`, `tt`, `ee`) VALUES
(1, 1, 1, '1', '2014-04-05 15:31:21', 1, 1, 1, 1, '1', '1', '1', '1', '1', '1', '', '', '', ''),
(2, 2, 2, '2', '2014-04-05 15:31:38', 2, 2, 2, 2, '2', '2', '2', '2', '2', '2', '', '', '', ''),
(3, 3, 3, '3', '2014-04-05 15:31:53', 3, 3, 3, 3, '3', '3', '3', '3', '3', '3', '', '', '', ''),
(4, 4, 4, '工工', '2014-04-05 15:32:20', 4, 4, 4, 4, '笔工工工工', '工工工工', '在', '在', '和', '和', '', '', '', ''),
(5, 1, 0, 'yy', '2014-04-06 01:29:59', 0, 0, 0, 0, 'yy', '', '', 'yy', 'yy', '', '', '', '', ''),
(6, 1, 0, 'tt', '2014-04-06 01:33:04', 0, 0, 0, 0, 'tt', '', '', 'tt', 'tt', '', '', '', '', ''),
(7, 7, 0, 'uu', '2014-04-06 01:34:52', 0, 0, 0, 0, 'uu', '', '', 'uu', 'uu', '', '', '', '', ''),
(8, 9, 0, 'dd', '2014-04-06 02:49:41', 0, 0, 0, 0, 'tt', '', '', 'aa', 'ee', '', '', '', '', ''),
(9, 8, 0, '', '2014-04-06 03:34:45', 0, 0, 0, 0, '基本原则', '', '', '基有和人工', '', '', '', '', '', ''),
(10, 7, 0, '和', '2014-04-06 03:37:17', 0, 0, 0, 0, '工工工工工工工工工工工', '', '', '和', '和', '', '', '', '', '');

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
  `parent_ids` varchar(2000) DEFAULT '',
  `child_ids` varchar(2000) DEFAULT '',
  `leaf_ids` varchar(2000) DEFAULT '',
  `name` varchar(120) NOT NULL,
  `name_alias` varchar(120) DEFAULT NULL,
  `name_url` varchar(120) DEFAULT NULL,
  `redirect_url` varchar(120) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `is_leaf` tinyint(1) NOT NULL,
  `is_nav` tinyint(1) NOT NULL,
  `sort_num` int(11) NOT NULL DEFAULT '0',
  `table_id` int(11) DEFAULT NULL,
  `table_name` varchar(80) DEFAULT NULL,
  `tpl_channel` int(11) DEFAULT NULL,
  `tpl_list` int(11) DEFAULT NULL,
  `tpl_view` int(11) DEFAULT NULL,
  `page_size` int(11) DEFAULT NULL,
  `note` varchar(80) DEFAULT NULL,
  `note2` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=112 ;

--
-- 转存表中的数据 `yii_channel`
--

INSERT INTO `yii_channel` (`id`, `parent_id`, `parent_ids`, `child_ids`, `leaf_ids`, `name`, `name_alias`, `name_url`, `redirect_url`, `level`, `is_leaf`, `is_nav`, `sort_num`, `table_id`, `table_name`, `tpl_channel`, `tpl_list`, `tpl_view`, `page_size`, `note`, `note2`) VALUES
(93, 0, '0,', '97,98,99,', '97,101,', 'aa的频道1', 'aa的频道1', '', '', 0, 0, 0, 0, 1, 'aa', 7, 7, 6, NULL, '', ''),
(94, 0, '0,', '', '', 'aa的频道2', 'aa的频道2', '', '', 0, 0, 0, 0, 1, 'aa', 7, 7, 6, NULL, '', ''),
(95, 0, '0,', '102,', '102,', 'bb的频道2', 'bb的频道2', '', '', 0, 0, 0, 0, 2, 'bb', 8, 8, 7, NULL, '', ''),
(96, 0, '0,', '', '', 'bb的频道1', 'bb的频道1', '', '', 0, 0, 0, 0, 2, 'bb', 8, 8, 7, NULL, '', ''),
(97, 93, '0,93,', '', '', 'aa1_a', 'aa1_a', '', '', 1, 1, 0, 0, 1, 'aa', 7, 7, 6, NULL, '', ''),
(98, 93, '0,93,', '100,101,', '101,', 'aa1_b', 'aa1_b', '', '', 1, 0, 0, 0, 1, 'aa', 7, 7, 6, NULL, '', ''),
(99, 93, '0,93,', '', '', 'aa1_c', 'aa1_c', '', '', 1, 0, 0, 0, 1, 'aa', 7, 7, 6, NULL, '', ''),
(100, 98, '0,93,98,', '', '', 'aa1_b_1', 'aa1_b_1', '', '', 2, 0, 0, 0, 1, 'aa', 7, 7, 6, NULL, '', ''),
(101, 98, '0,93,98,', '', '', 'aa1_b_2', 'aa1_b_2', '', '', 2, 1, 0, 0, 1, 'aa', 7, 7, 6, NULL, '', ''),
(102, 95, '0,95,', '', '', 'bb2_1', 'bb2_1', '', '', 1, 1, 0, 0, 1, 'aa', 7, 7, 6, NULL, '', ''),
(103, 0, '0,', '104,105,106,107,', '104,106,108,109,111,110,', '新闻', 'cc', 'news', '', 0, 0, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', ''),
(104, 103, '0,103,', '', '', '国际人物', '国际人物', '', '', 1, 1, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', ''),
(105, 103, '0,103,', '108,109,', '108,109,', '国际', '国际', '', '', 1, 0, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', ''),
(106, 103, '0,103,', '', '', '科技', '科技', '', '', 1, 1, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', ''),
(107, 103, '0,103,', '111,110,', '111,110,', '国内', '国内', '', '', 1, 0, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', ''),
(108, 105, '0,103,105,', '', '', '环球视野', '环球视野', '', '', 2, 1, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', ''),
(109, 105, '0,103,105,', '', '', '军事', '军事', '', '', 2, 1, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', ''),
(110, 107, '0,103,107,', '', '', '时政', '时政', '', '', 2, 1, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', ''),
(111, 107, '0,103,107,', '', '', '港澳台', '港澳台', '', '', 2, 1, 0, 0, 5, 'cc', 9, 9, 8, NULL, '', '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table`
--

CREATE TABLE IF NOT EXISTS `yii_define_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) CHARACTER SET gbk NOT NULL,
  `name_en` varchar(80) CHARACTER SET gbk NOT NULL,
  `description` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `note` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name_en`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `yii_define_table`
--

INSERT INTO `yii_define_table` (`id`, `name`, `name_en`, `description`, `note`) VALUES
(1, 'aa', 'aa', '', ''),
(2, 'bb', 'bb', '', ''),
(5, 'c表', 'cc', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table_field`
--

CREATE TABLE IF NOT EXISTS `yii_define_table_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `name` varchar(80) CHARACTER SET gbk NOT NULL,
  `name_en` varchar(80) CHARACTER SET gbk NOT NULL,
  `type` varchar(80) CHARACTER SET gbk NOT NULL,
  `length` int(11) DEFAULT NULL,
  `sort_num` int(11) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `yii_define_table_field`
--

INSERT INTO `yii_define_table_field` (`id`, `table_id`, `name`, `name_en`, `type`, `length`, `sort_num`, `note`) VALUES
(12, 27, 'aa', 'aa', 'VARCHAR', NULL, NULL, ''),
(13, 23, 'tt', 'tt', 'VARCHAR', NULL, NULL, ''),
(15, 25, 'qq', 'qq', 'VARCHAR', NULL, NULL, ''),
(16, 27, 'tt', 'tt', 'VARCHAR', NULL, NULL, ''),
(17, 25, 'tt', 'tt', 'VARCHAR', NULL, NULL, ''),
(18, 25, 'ww', 'ww', 'VARCHAR', NULL, NULL, ''),
(19, 25, 'ee', 'ee', 'VARCHAR', NULL, NULL, ''),
(20, 27, 'ww', 'ww', 'VARCHAR', NULL, NULL, ''),
(21, 27, 'aa', 'aa', 'VARCHAR', 4, NULL, ''),
(22, 27, '标题', 'title', 'VARCHAR', NULL, NULL, ''),
(23, 31, '价格', 'price', 'VARCHAR', NULL, NULL, ''),
(24, 31, '重量', 'weight', 'INT', NULL, NULL, ''),
(25, 1, 'aa', 'aa', 'VARCHAR', NULL, NULL, ''),
(26, 1, 'price', 'price', 'INT', NULL, NULL, ''),
(27, 1, 'weight', 'weight', 'FLOAT', NULL, NULL, ''),
(28, 1, '内容', 'content', 'TEXT', NULL, NULL, ''),
(29, 5, '标题', 'title', 'varchar', 120, 0, '0'),
(30, 5, '标题格式', 'title_format', 'varchar', 120, 0, '0'),
(31, 5, '标题图片', 'title_pic', 'varchar', 120, 0, '0'),
(32, 5, '跳转连接', 'redirect_url', 'varchar', 120, 0, '0'),
(33, 5, '子标题', 'sub_title', 'varchar', 120, 0, '0'),
(34, 5, '关键字', 'keywords', 'varchar', 120, 0, '0'),
(35, 5, '简介', 'summary', 'varchar', 512, 0, '0'),
(36, 5, '内容', 'content', 'VARCHAR', 2000, NULL, '');

-- --------------------------------------------------------

--
-- 表的结构 `yii_define_table_field_meta`
--

CREATE TABLE IF NOT EXISTS `yii_define_table_field_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_id` int(11) NOT NULL,
  `table_name` varchar(80) NOT NULL,
  `lable` varchar(80) CHARACTER SET gbk NOT NULL,
  `name` varchar(80) CHARACTER SET gbk NOT NULL,
  `type` varchar(80) CHARACTER SET gbk NOT NULL,
  `length` int(11) DEFAULT NULL,
  `sort_num` int(11) NOT NULL DEFAULT '0',
  `front_fun_add` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_fun_update` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_fun_show` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_form_type` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_form_option` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_form_default` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `front_form_html` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_fun_add` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_fun_update` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_fun_show` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_form_type` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_form_option` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_form_default` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  `back_form_html` varchar(80) CHARACTER SET gbk DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- 表的结构 `经经`
--

CREATE TABLE IF NOT EXISTS `经经` (
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
