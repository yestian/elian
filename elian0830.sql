-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 08 月 31 日 01:52
-- 服务器版本: 5.5.40-log
-- PHP 版本: 5.4.33

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `elian`
--

-- --------------------------------------------------------

--
-- 表的结构 `ck_admin`
--

CREATE TABLE IF NOT EXISTS `ck_admin` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `username` varchar(30) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `ck_admin`
--

INSERT INTO `ck_admin` (`id`, `username`, `password`) VALUES
(18, 'admin1', '21232f297a57a5a743894a0e4a801fc3'),
(19, 'admin2', '21232f297a57a5a743894a0e4a801fc3'),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- 表的结构 `ck_agent`
--

CREATE TABLE IF NOT EXISTS `ck_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL COMMENT '登录用户名',
  `password` char(32) NOT NULL COMMENT '登录密码',
  `agentname` varchar(64) NOT NULL COMMENT '代理商名称',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '代理级别：0无1普通2钻石3皇冠4合伙人',
  `domain` varchar(64) NOT NULL COMMENT '正式域名',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '代理状态0关闭1正常',
  `upid` int(8) NOT NULL DEFAULT '0' COMMENT '上级代理id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- 转存表中的数据 `ck_agent`
--

INSERT INTO `ck_agent` (`id`, `username`, `password`, `agentname`, `level`, `domain`, `status`, `upid`) VALUES
(1, 'yestian', '123456', '上海传酷网络科技有限公司', 3, 'dddd', 0, 0),
(2, 'aselian', '123456', '上海埃连科技', 4, '', 0, 0),
(3, 'test', '123456', '测试账号', 0, '', 0, 2),
(4, 'elian', '123456', '埃连测试账号', 2, '', 1, 0),
(5, 'yinglan', '123456', '上海映蓝设计', 3, '', 1, 2),
(6, 'renzhi', '123456', '人智科技', 4, '', 0, 1),
(7, 'abcd', '123456', '北京凤舞吉祥', 1, '', 1, 2),
(8, 'sonrenzhi', '123456', '人智科技的代理商', 3, '', 1, 6),
(9, 'ailian2', '123456', '上海埃连科技代理商', 2, '', 1, 2),
(10, 'abcdef', '123456', '上海埃连科技123', 3, '', 1, 2),
(11, 'admin666', '123456', '上海传酷网络科技有限公司', 3, '66666666', 1, 0),
(12, 'admin666999', '123456', '上海传酷网络科技有限公司', 3, '66666666', 1, 0),
(13, '908908908', '123456', '上海传酷网络科技有限公司', 3, '9pi9p', 1, 0),
(14, 'hyfghfgh', 'hfhfgh', 'hfghfg', 3, 'hfghfghf', 1, 1),
(15, 'hyfghfgh5555', 'hfhfgh', 'hfghfg', 3, 'hfghfghf', 1, 1),
(16, 'hyfgh45445', 'hfhfgh', 'hfghfg', 3, 'hfghfghf', 1, 1),
(17, 'hyfgh4544544', 'hfhfgh', 'hfghfg', 3, 'hfghfghf', 1, 1),
(18, 'hyfg4444', 'hfhfgh', 'hfghfg', 3, 'hfghfghf', 1, 1),
(19, 'aaaa', 'aaaaaa', 'aaaabbb', 2, '', 0, 2),
(20, '677657657', '76577657', '76765', 3, '5t6retret', 1, 1),
(21, '222222', '123456', '上海传酷网络科技有限公司', 2, 'www.ddd.com', 1, 2),
(22, '444636', '445435', '上海埃连科技', 3, 'www.ddd.com', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ck_agent_buy`
--

CREATE TABLE IF NOT EXISTS `ck_agent_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense` decimal(10,2) NOT NULL COMMENT '消费金额',
  `extime` char(10) NOT NULL COMMENT '消费时间',
  `purpose` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用途0模板1新闻2服务',
  `aid` int(11) NOT NULL COMMENT '代理商id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ck_agent_buy`
--

INSERT INTO `ck_agent_buy` (`id`, `expense`, `extime`, `purpose`, `aid`) VALUES
(1, '500.00', '', 0, 1),
(2, '600.00', '', 0, 4),
(3, '200.00', '', 0, 3);

-- --------------------------------------------------------

--
-- 表的结构 `ck_agent_info`
--

CREATE TABLE IF NOT EXISTS `ck_agent_info` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `linkman` varchar(64) NOT NULL COMMENT '联系人',
  `phone` varchar(16) NOT NULL COMMENT '手机号',
  `tel` varchar(16) NOT NULL COMMENT '电话',
  `fax` varchar(16) NOT NULL COMMENT '传真',
  `wechat` varchar(64) NOT NULL COMMENT '微信',
  `qq` varchar(16) NOT NULL COMMENT 'qq',
  `address` varchar(128) NOT NULL COMMENT '联系地址',
  `signdate` int(10) NOT NULL COMMENT '注册时间',
  `agentdate` int(10) NOT NULL COMMENT '加盟时间',
  `thumb` varchar(128) NOT NULL COMMENT '用户头像',
  `aid` int(11) NOT NULL COMMENT '代理商id',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `ck_agent_info`
--

INSERT INTO `ck_agent_info` (`gid`, `linkman`, `phone`, `tel`, `fax`, `wechat`, `qq`, `address`, `signdate`, `agentdate`, `thumb`, `aid`) VALUES
(1, '田先生7', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 1503987558, 1503930824, '\\uploads/20170829\\74ea139950f1268f94e5587c4dff8a76.jpg', 1),
(2, '666', '', '', '', '', '', '', 0, 0, '', 12),
(3, 'hfhfg', '6666', '021-80392515', '021-80392515', '6666666', 'rewre', '上海市科苑路151号', 1503975435, 0, '\\uploads/20170829\\3f680a8c01571f7ef1f73b251f51d09c.jpg', 18),
(4, '田先生', '18217710701', '80392515', '021-80392515', '6666666', '69719701', '上海市科苑路151号', 1503975490, 0, '\\uploads/20170829\\74edd3657c212cbc8716f0faa482ce6a.jpg', 19),
(5, '田先生', '18217710701', '80392515', '021-80392515', '6666666', '69719701', '上海市科苑路151号', 1503980484, 0, '', 19),
(6, '田先生', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 1503981875, 0, '\\uploads/20170829\\a93b4cf80ed964dcf5d32e8fe298b05f.jpg', 1),
(7, '田先生', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 1503981886, 0, '\\uploads/20170829\\e62748e1f945d970398be42d5bb73da0.jpg', 1),
(8, '田先生', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 1503981988, 0, '', 1),
(9, '田先生888', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 1503982007, 0, '', 1),
(10, '田先生', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 1503982163, 0, '', 1),
(11, '田先生666', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 1503982235, 0, '', 1),
(12, '田先生7777555', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 1503987581, 0, '', 1),
(13, '田先生7777555', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 0, 0, '', 1),
(14, '田先生7777555', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 0, 0, '', 1),
(15, '田先生7777555', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 0, 0, '\\uploads/20170829\\7fe501f7d504ed3f496000dca6052725.jpg', 1),
(16, '田先生7777555', '18217710701', '80392515', '80382515', 'yestian', '69719701', '浦东新区科苑路151号', 0, 0, '\\uploads/20170829\\9fe26eca5b01b57ca5cb57634e99a844.jpg', 1),
(17, '田先生', '18217710701', '80392515', '80392515', 'yestian', '69719701', '上海市科苑路151号', 1503992130, 0, '\\uploads/20170829\\45b12606cce4c2a58928cd77c335ea5b.jpg', 20),
(18, '田先生', '6666', '80392515', '80392515', 'yestian', '69719701', '上海市科苑路151号', 1503992178, 0, '\\uploads/20170829\\bd02241a143b2f57b4bc8635a360a73f.jpg', 21),
(19, '潘先生', '18217710701', '021-80392515', '021-80392515', '6666666', 'rewre', '', 1504064853, 0, '', 22);

-- --------------------------------------------------------

--
-- 表的结构 `ck_agent_login`
--

CREATE TABLE IF NOT EXISTS `ck_agent_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logintime` char(10) NOT NULL COMMENT '登录时间',
  `loginip` varchar(16) NOT NULL COMMENT '登录ip',
  `aid` int(11) NOT NULL COMMENT '代理商id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `ck_agent_login`
--

INSERT INTO `ck_agent_login` (`id`, `logintime`, `loginip`, `aid`) VALUES
(1, '1504021701', '44.33.2.2', 1),
(2, '1504021701', '444.565.77.88', 2),
(3, '1504022352', '44.33.2.2', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ck_agent_pay`
--

CREATE TABLE IF NOT EXISTS `ck_agent_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paytime` char(10) NOT NULL COMMENT '充值时间',
  `money` decimal(10,2) NOT NULL COMMENT '金额',
  `payway` tinyint(1) NOT NULL DEFAULT '0' COMMENT '充值方式0官方代充1支付宝2微信3银行卡4paypal',
  `aid` int(11) NOT NULL COMMENT '代理商id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ck_agent_pay`
--

INSERT INTO `ck_agent_pay` (`id`, `paytime`, `money`, `payway`, `aid`) VALUES
(1, '1504015333', '5555.00', 0, 1),
(2, '1504015382', '2223.00', 0, 4),
(3, '1503849600', '123.00', 0, 1),
(4, '1504015840', '544.00', 0, 4);

-- --------------------------------------------------------

--
-- 表的结构 `ck_article`
--

CREATE TABLE IF NOT EXISTS `ck_article` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(120) NOT NULL COMMENT '文章标题',
  `author` varchar(30) NOT NULL COMMENT '文章作者',
  `desc` varchar(255) NOT NULL COMMENT '文章简介',
  `content` text NOT NULL COMMENT '文章内容',
  `keywords` varchar(100) NOT NULL COMMENT '文章关键词',
  `thumb` varchar(160) NOT NULL,
  `click` mediumint(10) NOT NULL DEFAULT '0' COMMENT '访问数',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不调用 1调用',
  `time` int(10) NOT NULL COMMENT '提交时间',
  `cateid` mediumint(9) NOT NULL COMMENT '栏目所属id',
  `rec` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不推荐 1推荐',
  `zan` mediumint(11) NOT NULL DEFAULT '0' COMMENT '点赞数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- 表的结构 `ck_auth_group`
--

CREATE TABLE IF NOT EXISTS `ck_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `ck_auth_group`
--

INSERT INTO `ck_auth_group` (`id`, `title`, `status`, `rules`) VALUES
(4, '超级管理员', 1, '25,27,26,28,24,19,23'),
(6, '管理员', 1, '24,19,23'),
(7, '信息发布员', 1, '25,27,30');

-- --------------------------------------------------------

--
-- 表的结构 `ck_auth_group_access`
--

CREATE TABLE IF NOT EXISTS `ck_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ck_auth_group_access`
--

INSERT INTO `ck_auth_group_access` (`uid`, `group_id`) VALUES
(1, 4),
(12, 4),
(13, 4),
(14, 7),
(15, 6),
(16, 4),
(18, 6),
(19, 7);

-- --------------------------------------------------------

--
-- 表的结构 `ck_auth_rule`
--

CREATE TABLE IF NOT EXISTS `ck_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上级权限，0顶级权限',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '权限级别',
  `sort` int(5) NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- 转存表中的数据 `ck_auth_rule`
--

INSERT INTO `ck_auth_rule` (`id`, `name`, `title`, `type`, `status`, `condition`, `pid`, `level`, `sort`) VALUES
(27, 'auth_group/lst', '用户组列表', 1, 1, '', 25, 1, 50),
(25, 'admin', '管理员', 1, 1, '', 0, 0, 50),
(26, 'admin/lst', '管理列表', 1, 1, '', 25, 1, 50),
(24, 'sys', '系统设置', 1, 1, '', 0, 0, 50),
(19, 'conf/conf', '前台配置', 1, 1, '', 24, 1, 50),
(23, 'conf/lst', '后台配置', 1, 1, '', 24, 1, 50),
(29, 'index', '通用', 1, 1, '', 0, 0, 50),
(30, 'index/index', '后台首页', 1, 1, '', 0, 0, 50),
(28, 'auth_rule/lst', '权限列表', 1, 1, '', 25, 1, 50);

-- --------------------------------------------------------

--
-- 表的结构 `ck_cate`
--

CREATE TABLE IF NOT EXISTS `ck_cate` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `catename` varchar(30) NOT NULL COMMENT '栏目名称',
  `content` text NOT NULL COMMENT '栏目内容',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '栏目类型  1列表 2单页 3图集',
  `pid` mediumint(9) NOT NULL DEFAULT '0' COMMENT '上级栏目Id',
  `keywords` varchar(255) NOT NULL COMMENT '栏目关键词',
  `desc` varchar(255) NOT NULL COMMENT '栏目描述',
  `sort` mediumint(9) NOT NULL DEFAULT '50' COMMENT '栏目排序',
  `rec_index` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐首页 0不推荐 1推荐',
  `rec_bottom` tinyint(1) NOT NULL DEFAULT '0' COMMENT '推荐到底部 0不推荐 1推荐',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- 转存表中的数据 `ck_cate`
--

INSERT INTO `ck_cate` (`id`, `catename`, `content`, `type`, `pid`, `keywords`, `desc`, `sort`, `rec_index`, `rec_bottom`) VALUES
(46, '常见问题', '', 1, 0, '', '', 50, 0, 0),
(48, '联系我们', '', 2, 0, '', '', 50, 0, 0),
(47, '关于我们', '', 2, 0, '', '', 50, 0, 0),
(44, '公司介绍', '', 2, 0, '', '', 50, 0, 0),
(45, '产品列表', '', 3, 0, '', '', 50, 0, 0),
(49, '类别1', '<p>要<br/></p>', 1, 45, '', '', 50, 0, 0),
(50, '类别2', '', 1, 45, '', '', 50, 0, 0),
(51, '类别111', '', 1, 49, '', '', 50, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ck_conf`
--

CREATE TABLE IF NOT EXISTS `ck_conf` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '配置id',
  `cnname` varchar(50) NOT NULL COMMENT '中文名',
  `enname` varchar(50) NOT NULL COMMENT '英文名',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '表单类型',
  `value` varchar(255) NOT NULL COMMENT '表单值',
  `values` varchar(255) NOT NULL COMMENT '可选值',
  `sort` smallint(6) NOT NULL DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `ck_conf`
--

INSERT INTO `ck_conf` (`id`, `cnname`, `enname`, `type`, `value`, `values`, `sort`) VALUES
(28, 'QQ号码', 'qq', 1, '', '', 50),
(26, '座机', 'tel', 1, '', '', 50),
(27, '手机', 'phone', 1, '', '', 50),
(25, '备案号', 'beian', 1, '', '', 50),
(22, '网站名称', 'sitename', 1, '', '', 50),
(23, '网站关键词', 'keywords', 1, '', '', 50),
(24, '网站描述', 'desc', 2, '', '', 50);

-- --------------------------------------------------------

--
-- 表的结构 `ck_file`
--

CREATE TABLE IF NOT EXISTS `ck_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(128) NOT NULL COMMENT '文件路径',
  `filename` varchar(32) NOT NULL COMMENT '文件别名',
  `addtime` char(10) NOT NULL COMMENT '上传时间',
  `owner` tinyint(1) NOT NULL DEFAULT '0' COMMENT '文件归属0平台1代理商2会员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `ck_file`
--

INSERT INTO `ck_file` (`id`, `path`, `filename`, `addtime`, `owner`) VALUES
(10, '/uploads/20170831\\b704d618fd59fa94946ed022e4c1b68d.png', 'rtretre.png', '1504113772', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ck_link`
--

CREATE TABLE IF NOT EXISTS `ck_link` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `url` varchar(60) NOT NULL,
  `sort` mediumint(9) NOT NULL DEFAULT '50',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ck_link`
--

INSERT INTO `ck_link` (`id`, `title`, `desc`, `url`, `sort`) VALUES
(3, '上海SEO', 'SEO教程', 'http://www.tianweiseo.com/', 6),
(5, '上海网站建设', '公司官网', 'http://www.chuankukeji.com/', 50);

-- --------------------------------------------------------

--
-- 表的结构 `ck_login_record`
--

CREATE TABLE IF NOT EXISTS `ck_login_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datetime` varchar(10) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `uid` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `ck_login_record`
--

INSERT INTO `ck_login_record` (`id`, `datetime`, `ip`, `uid`) VALUES
(1, '0000-00-00', '127.0.0.1', '1'),
(2, '0000-00-00', '127.0.0.1', '1'),
(3, '0000-00-00', '127.0.0.1', '1'),
(4, '1503658734', '127.0.0.1', '1'),
(5, '1503658829', '127.0.0.1', '1'),
(6, '1503660364', '127.0.0.1', '1'),
(7, '1503660387', '127.0.0.1', '1'),
(8, '1503707931', '127.0.0.1', '1'),
(9, '1503723046', '127.0.0.1', '1'),
(10, '1503740289', '127.0.0.1', '1'),
(11, '1503795052', '127.0.0.1', '1'),
(12, '1503879083', '127.0.0.1', '1'),
(13, '1503897407', '127.0.0.1', '1'),
(14, '1503970352', '127.0.0.1', '1'),
(15, '1504022998', '127.0.0.1', '1'),
(16, '1504023219', '127.0.0.1', '1'),
(17, '1504023256', '127.0.0.1', '1'),
(18, '1504023360', '127.0.0.1', '1'),
(19, '1504023409', '127.0.0.1', '1'),
(20, '1504023460', '127.0.0.1', '1'),
(21, '1504023606', '127.0.0.1', '1'),
(22, '1504023672', '127.0.0.1', '1'),
(23, '1504024038', '127.0.0.1', '1'),
(24, '1504024135', '127.0.0.1', '1'),
(25, '1504024380', '127.0.0.1', '1'),
(26, '1504024459', '127.0.0.1', '1'),
(27, '1504024480', '127.0.0.1', '1'),
(28, '1504024619', '127.0.0.1', '1'),
(29, '1504053122', '127.0.0.1', '1'),
(30, '1504059002', '127.0.0.1', '1'),
(31, '1504067588', '127.0.0.1', '1'),
(32, '1504105854', '127.0.0.1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `ck_member`
--

CREATE TABLE IF NOT EXISTS `ck_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL COMMENT '用户名',
  `company` varchar(64) NOT NULL COMMENT '公司名称',
  `phone` varchar(16) NOT NULL COMMENT '手机',
  `qq` varchar(16) NOT NULL COMMENT 'qq',
  `wechat` varchar(32) NOT NULL COMMENT '微信',
  `email` varchar(64) NOT NULL COMMENT '邮箱',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '代理商id0直接客户',
  `signtime` varchar(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ck_member`
--

INSERT INTO `ck_member` (`id`, `username`, `company`, `phone`, `qq`, `wechat`, `email`, `aid`, `signtime`) VALUES
(1, 'sssss', '公司一', '', '', '', '', 0, ''),
(2, '65666', '公司二', '', '', '', '', 1, ''),
(3, '55555', '公司三', '', '', '', '', 2, ''),
(4, '233333', '公司四', '', '', '', '', 2, '');

-- --------------------------------------------------------

--
-- 表的结构 `ck_member_buy`
--

CREATE TABLE IF NOT EXISTS `ck_member_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purpose` tinyint(1) NOT NULL COMMENT '0余额1网站2新闻源3客服系统',
  `expense` decimal(10,2) NOT NULL COMMENT '消费金额',
  `uid` int(11) NOT NULL COMMENT '会员Id',
  `time` char(10) NOT NULL COMMENT '消费时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ck_member_pay`
--

CREATE TABLE IF NOT EXISTS `ck_member_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(10,2) NOT NULL COMMENT '会员充值',
  `time` char(10) NOT NULL COMMENT '充值时间',
  `payway` tinyint(1) NOT NULL COMMENT '充值方式0官方代充1支付宝2微信3银行卡4paypal',
  `uid` int(11) NOT NULL COMMENT '会员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ck_member_pay`
--

INSERT INTO `ck_member_pay` (`id`, `money`, `time`, `payway`, `uid`) VALUES
(1, '555.00', '1504054341', 1, 1),
(2, '111.00', '1504054341', 0, 2),
(3, '222.00', '1504054341', 2, 2),
(4, '999.00', '1504054341', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ck_tag`
--

CREATE TABLE IF NOT EXISTS `ck_tag` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT COMMENT '标签的id',
  `tagname` varchar(30) NOT NULL COMMENT '标签名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
