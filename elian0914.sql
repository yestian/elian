-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2017 年 09 月 14 日 23:56
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `ck_admin`
--

INSERT INTO `ck_admin` (`id`, `username`, `password`) VALUES
(18, 'admin10', 'e10adc3949ba59abbe56e057f20f883e'),
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
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '代理级别：0无1银牌2金牌3钻石',
  `domain` varchar(64) NOT NULL COMMENT '正式域名',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '代理状态0关闭1正常',
  `upid` int(8) NOT NULL DEFAULT '0' COMMENT '上级代理id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ck_agent`
--

INSERT INTO `ck_agent` (`id`, `username`, `password`, `agentname`, `level`, `domain`, `status`, `upid`) VALUES
(1, 'agent1', '123456', '代理商公司名称一', 3, 'www.ddd.com', 1, 0),
(2, 'agent2', '123456', '代理商公司名称二', 2, 'www.ddd666.com', 1, 1),
(3, 'agent3', '123456', '代理商公司名称三', 1, 'www.ddd.com.cn', 0, 1),
(4, 'agent5', '123456', '代理商公司名称四', 0, 'www.ddd000.com', 1, 1),
(5, 'agent6', '123456', '代理商公司名称五', 2, 'www.kkkddd.com', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ck_agent_buy`
--

CREATE TABLE IF NOT EXISTS `ck_agent_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense` decimal(10,2) NOT NULL COMMENT '消费金额',
  `extime` char(10) NOT NULL COMMENT '消费时间',
  `purpose` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用途0模板1新闻2服务',
  `status` tinyint(1) NOT NULL COMMENT '0未支付1支付成功',
  `aid` int(11) NOT NULL COMMENT '代理商id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ck_agent_buy`
--

INSERT INTO `ck_agent_buy` (`id`, `expense`, `extime`, `purpose`, `status`, `aid`) VALUES
(4, '444.00', '1504698565', 0, 1, 1),
(5, '123.00', '1504698565', 1, 1, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `ck_agent_info`
--

INSERT INTO `ck_agent_info` (`gid`, `linkman`, `phone`, `tel`, `fax`, `wechat`, `qq`, `address`, `signdate`, `agentdate`, `thumb`, `aid`) VALUES
(25, '田先生', '18217710701', '00853-63000205', '00853-63000205', 'yestian', '69719701', '上海市科苑路151号', 1504515993, 0, '\\uploads/20170904\\b00d36a07ac7ab08470e379f6e783f3e.jpg', 5),
(24, '朱先生', '18217710701', '80392515', '80392515', 'yestian', '69719701', '上海市科苑路151号', 1504515922, 0, '\\uploads/20170904\\5c0880d152a812f0eebc20f7e1e2347d.jpg', 4),
(23, '田伟', '18217710701', '80392515', '80392515', 'yestian', '69719701', '上海市科苑路151号', 1504515833, 0, '\\uploads/20170904\\9cb95c051717ee7faf44dd75d4fa43f7.jpg', 3),
(22, '潘先生', '18217710701', '80392515', '80392515', '6666666', '69719701', '上海市浦东新区科苑路151号', 1504515768, 0, '\\uploads/20170904\\6550b91ddb9998da8f8f6e92440850ec.jpg', 2),
(21, '田先生', '18217710701', '021-80392515', '021-80392515', 'yestian', '69719701', '上海市浦东新区科苑路151号', 1504515724, 0, '\\uploads/20170904\\126254ca50e0f467897f2fa7db4dcd9a.jpg', 1),
(20, '潘先生', '18217710701', '021-80392515', '021-80392515', 'yestian', '69719701', '上海市浦东新区科苑路151号', 1504515582, 0, '\\uploads/20170904\\dea44764cdf89445f6540808217b338e.jpg', 23);

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
  `serials` varchar(32) NOT NULL COMMENT '流水号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `ck_agent_pay`
--

INSERT INTO `ck_agent_pay` (`id`, `paytime`, `money`, `payway`, `aid`, `serials`) VALUES
(5, '1504518984', '200.00', 0, 1, ''),
(6, '1504518984', '300.00', 0, 1, ''),
(7, '1504518984', '600.00', 1, 1, ''),
(8, '1504518984', '50.00', 0, 1, '');

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
  `pubdate` char(10) NOT NULL COMMENT '发布时间',
  `click` mediumint(10) NOT NULL DEFAULT '0' COMMENT '访问数',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不调用 1调用',
  `time` int(10) NOT NULL COMMENT '提交时间',
  `cateid` mediumint(9) NOT NULL COMMENT '栏目所属id',
  `rec` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不推荐 1推荐',
  `zan` mediumint(11) NOT NULL DEFAULT '0' COMMENT '点赞数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `ck_article`
--

INSERT INTO `ck_article` (`id`, `title`, `author`, `desc`, `content`, `keywords`, `thumb`, `pubdate`, `click`, `status`, `time`, `cateid`, `rec`, `zan`) VALUES
(13, '企业要根据用户群定位确定网络推广渠道', '', '很多企业在网络日益发达的今天，采取各种渠道进行网络营销，我们上海网站建设公司认为，网络营销推广也要注意精准营销的定位，要知道很多情况下，渠道网络推广是需要投入人力物力的，精准营销有利于企业将有限的资源投入到正确的地方，首先我们要根据用户群定位来确定网络推广渠道。', '<p style="text-indent: 2em;">很多企业在网络日益发达的今天，采取各种渠道进行网络营销，我们<a href="http://www.zwzsh.net/" target="_blank">上海网站建设</a>公司认为，网络营销推广也要注意精准营销的定位，要知道很多情况下，渠道网络推广是需要投入人力物力的，精准营销有利于企业将有限的资源投入到正确的地方，首先我们要根据用户群定位来确定网络推广渠道。</p><p style="text-indent: 2em;">我们上海网站建设公司认为，企业首先要进行数据分析，针对自己准备投入的渠道，进行分析统计，当我们在通过一系列数据的分析和掌握之后，我们知道了方向，知道了自己的用户群，在定义网站的用户群体，那么接下来我们要根据这个核心市场找出搜索我们的是谁？谁在搜索我们的网站？通常根据产品的使用范围，我们能够很容易定位我们的消费群体，但大多数时候会较为笼统。那么如何看待用户群定位呢？</p><p style="text-indent: 2em;">我们上海网站建设公司认为，这要先确定一个维度，比如按性别还是年龄，还有地域，收入层次等。这点要根据企业产品定位与市场范围来占展开，这中间很多可能是重叠的，男性市场还是女性市场?&nbsp;女性市场居多?那么用户的年龄层次?用户的消费水平?用户的访问设备以便于我们沟通?我相信在统计工具中你要发现用户年龄层，对用户做好区分，乃至于性别区分等等。这样我们就可以根据用户群体的定位，然后去确定推广的渠道。</p><p style="text-indent: 2em;">同时，我们上海网站建设公司认为，我们要根据目标用户的行为分析，根据这部分用户惯性思维去推敲用户的搜索习惯和用户对产品的哪个环节比较注重，这个时候你再去推广你的网站还会难吗?你的营销策划还会那么迷茫吗？企业的收益还会少吗？</p>', '', '\\uploads/20170914\\1b53488445e3162af04859b0f8d24d27.jpg', '1505389094', 0, 0, 0, 54, 0, 0),
(14, '搜索引擎友好型网站设计', '', '首先是网站的结构，我们发现很多网站结构大同小异，相似度高，没有特色。出现这样的情况往往是使用模版造成的。', '<p style="text-indent: 2em;">首先是网站的结构，我们发现很多网站结构大同小异，相似度高，没有特色。出现这样的情况往往是使用模版造成的。很多模板网站栏目是固定设置的，有的站点上面的文字都是相同的，出现这样的情况，我们上海网站设计公司提醒大家，这样对于搜索引擎来说，很容易会被认为这样的站点是在抄袭是在模仿，这样就容易被搜索引擎降低网站的权重。同时，对于用户访问来说，自然而然你公司本身很多细节就不能好的体现出来，当下是一个竞争白热化的时代，一个毫无特点的网站就犹如一个普通的芸芸大众，别人是很难第一时间记住我们的。</p><p style="text-indent: 2em;">&nbsp; 再次，网站要通过细节把自己想要为浏览者呈现的细节表现出来，模版网站不能把公司想要的东西呈现出来。正因为是模板所以，很多时候自己企业独特的价值和服务，甚至是符合我们自己的功能模块都难以在首页上进行展现，心有余而力不足，正好是符合了当下很多企业网站的窘态。</p><p style="text-indent: 2em;">&nbsp; 最后，我们上海网站设计公司认为，我们网站设计要从seo的角度考虑网站建设的细节。作为专业的网站设计人员，一定要通过seo的角度进行网站细节的综合考虑，比如，网站结构设计，网站的首页布局，网站分类页和频道页的设计，作为网站设计人员建一定要非常清楚建站细节的策划，设计一个良好的符合优化的网站结构和布局，这样在后期优化过程中可以大大提升优化效率，并且减少很多优化成本。</p><p><br/></p>', '', '\\uploads/20170914\\7b8275eb6f87b968c6b716d33d161b15.jpg', '1505389094', 0, 0, 0, 53, 0, 0),
(15, '外贸型网站静态化处理对网站推广的意义', '', ' 我们知道，外贸网站针对的是国外的客户，搜索引擎对应的是谷歌等国外的搜索引擎，那么外贸型网站主要针对的是谷歌', '<p style="text-indent: 2em;">&nbsp;我们知道，外贸网站针对的是国外的客户，搜索引擎对应的是谷歌等国外的搜索引擎，那么外贸型网站主要针对的是谷歌，外贸网站如何做好谷歌的搜索引擎优化呢?从行业经验来说，谷歌更重视网站自身的质量，就是说，你的把网站做好，什么模板建站、免费建站、二级域名网站都不要去选择了，定制网站才是上策。同时网站要进行静态化的处理。</p><p style="text-indent: 2em;">&nbsp; 以静态HTML页面为主。很多上海网站建设公司都知道，大量的动态网页不利于谷歌检索，静态网页是相对于动态网页而言，是指没有后台数据库、不含程序和不可交互的网页。静态网页相对更新起来比较麻烦，适用于一般更新较少的展示型网站。我们上海网站建设公司通常采用特定的方式进行静态化处理。很多朋友容易误解的是静态页面都是htm这类页面，实际上静态也不是完全静态，他也可以出现各种动态的效果，如GIF格式的动画、FLASH、滚动字幕等，这些并非动态。</p><p><br/></p>', '', '\\uploads/20170914\\5c8ef4f7eef14fbfc6fcbe5c5db5d98d.jpg', '1505389094', 0, 0, 0, 53, 0, 0),
(16, '网站设计提高用户体验容易忽视的两个细节', '', '  首先是站内搜索的功能，很多网站设计公司容易忽视这个功能，用户点进去我们的网站之后，一般会根据导航条来寻找自己感兴趣的内容', '<p style="text-indent: 2em;">&nbsp; 首先是站内搜索的功能，很多网站设计公司容易忽视这个功能，用户点进去我们的网站之后，一般会根据导航条来寻找自己感兴趣的内容，但很多时候网站内容如果太多，依靠导航条不一定能够帮助用户寻找到他们感兴趣的内容，那么站内搜索的作用就体现出来了。用户可以在站内实现搜索功能的帮助下，快速找到自己感兴趣的内容。当网站有了搜索功能就不用担心客户在上千篇中找不到需求了。很多网站设计公司担心用户搜索的时候，这样会对网站造成负担，其实一般的网站，有用户搜索的情况对网站影响不大，在这样的情况下，即使是对内容的过多搜索，也不会对网站的搜索功能产生很大的负担，这样也可以很好的提高用户体验度，实现用户对网站的信任。</p><p style="text-indent: 2em;">&nbsp; 再就是回到网页顶部的细节，这一点也是很多上海网站设计公司容易忽视的。我们一定要注意回到网站顶部这个细节。回到网站顶部这个功能对于用户体验度的提高很是到位，大家自己在浏览页面的时候，不是也经常烦恼自己需要拉进度条让页面回到顶部吗？出席这样的情况，可能是您没有发现网站的这个功能，或者是网站设计的时候没有设置这样的功能。网页有了这样的功能，可以很好地实现在用户访问长页面的时候达到最好的效果。同时也要注意让这个功能提示醒目一些，避免用户发现不了。</p><p><br/></p>', '', '\\uploads/20170914\\ffcc8df940aff67ea249e779b6da9d4a.jpg', '1505389094', 0, 0, 0, 54, 0, 0);

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
(19, 7),
(20, 6);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- 转存表中的数据 `ck_cate`
--

INSERT INTO `ck_cate` (`id`, `catename`, `content`, `type`, `pid`, `keywords`, `desc`, `sort`, `rec_index`, `rec_bottom`) VALUES
(48, '博客', '', 1, 0, '', '', 50, 0, 0),
(53, '案例研究', '', 1, 48, '', '', 50, 1, 0),
(54, '品牌', '', 1, 48, '', '', 50, 1, 0),
(55, '插图', '', 1, 48, '', '', 50, 1, 0),
(56, '动画', '', 1, 48, '', '', 50, 1, 0);

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
(28, 'QQ号码', 'qq', 1, '69719701', '', 50),
(26, '座机', 'tel', 1, '021-80392515', '', 50),
(27, '手机', 'phone', 1, '18217710701', '', 50),
(25, '备案号', 'beian', 1, '', '', 50),
(22, '网站名称', 'sitename', 1, '埃连建站平台', '', 50),
(23, '网站关键词', 'keywords', 1, '快速建站，自助建站', '', 50);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `ck_file`
--

INSERT INTO `ck_file` (`id`, `path`, `filename`, `addtime`, `owner`) VALUES
(24, '/uploads/20170904\\f6c9efba8469b3e4b341a4f71cfd6ad4.docx', '代理加盟合同.docx', '1504518403', 1),
(25, '/uploads/20170904\\05a859df0b89a4c4759f7c7fe2d4d953.docx', '会员建站协议.docx', '1504518436', 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

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
(32, '1504105854', '127.0.0.1', '1'),
(33, '1504140481', '127.0.0.1', '1'),
(34, '1504183816', '127.0.0.1', '1'),
(35, '1504230237', '127.0.0.1', '1'),
(36, '1504236235', '127.0.0.1', '1'),
(37, '1504279148', '127.0.0.1', '1'),
(38, '1504449011', '127.0.0.1', '1'),
(39, '1504504234', '127.0.0.1', '1'),
(40, '1504587618', '127.0.0.1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `ck_media`
--

CREATE TABLE IF NOT EXISTS `ck_media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(32) NOT NULL COMMENT '媒体名称',
  `url` varchar(64) NOT NULL COMMENT '参考链接',
  `entrance` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0没有入口1首页2频道3栏目',
  `zid` int(11) NOT NULL COMMENT '地区关联id',
  `cid` int(11) NOT NULL COMMENT '频道类型关联id',
  `pid` int(11) NOT NULL COMMENT '门户类型关联id',
  `source` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不限1百度新闻源2百度网页3百度最新相关',
  `place` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不限1首页2首页焦点图',
  `prize` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '标准价格',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1启用0不启用',
  `remark` varchar(128) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ck_media`
--

INSERT INTO `ck_media` (`id`, `title`, `url`, `entrance`, `zid`, `cid`, `pid`, `source`, `place`, `prize`, `status`, `remark`) VALUES
(1, '联合中文网', 'http://www.unionews.cn/v-1-302418.aspx', 2, 1, 1, 1, 1, 0, '5.00', 1, '秒杀新闻'),
(2, '企智新闻网', 'http://www.chinayet.com/201709/66077.html', 2, 3, 2, 1, 1, 1, '5.00', 0, '发各行业稿件'),
(4, '每日中国', 'http://www.chinayet.com/201709/66077.html', 2, 1, 1, 1, 1, 2, '5.00', 1, '最新秒杀'),
(5, '好头条', '', 0, 2, 1, 2, 1, 2, '5.00', 1, '');

-- --------------------------------------------------------

--
-- 表的结构 `ck_media_channel`
--

CREATE TABLE IF NOT EXISTS `ck_media_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel` varchar(32) NOT NULL COMMENT '频道类型',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ck_media_channel`
--

INSERT INTO `ck_media_channel` (`id`, `channel`) VALUES
(1, '门户媒体'),
(2, '报社官方媒体'),
(3, '最新秒杀'),
(4, 'IT-科技');

-- --------------------------------------------------------

--
-- 表的结构 `ck_media_portal`
--

CREATE TABLE IF NOT EXISTS `ck_media_portal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `portal` varchar(8) NOT NULL COMMENT '门户站点名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ck_media_portal`
--

INSERT INTO `ck_media_portal` (`id`, `portal`) VALUES
(1, '新浪网'),
(2, '搜狐网'),
(3, '腾讯网'),
(4, '网易网'),
(5, '凤凰网'),
(6, '中华网');

-- --------------------------------------------------------

--
-- 表的结构 `ck_media_post`
--

CREATE TABLE IF NOT EXISTS `ck_media_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(128) NOT NULL COMMENT '上传文档路径',
  `title` varchar(128) NOT NULL COMMENT '标题',
  `content` text NOT NULL COMMENT '文章内容',
  `mid` int(11) NOT NULL COMMENT '媒体id',
  `sendtime` char(10) NOT NULL COMMENT '添加事件',
  `remark` varchar(255) NOT NULL COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0提交失败1提交成功',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '会员id',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '代理商id',
  `success_url` varchar(128) NOT NULL COMMENT '媒体发布成功链接',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ck_media_post`
--

INSERT INTO `ck_media_post` (`id`, `file`, `title`, `content`, `mid`, `sendtime`, `remark`, `status`, `uid`, `aid`, `success_url`) VALUES
(1, 'http://tool.chinaz.com/Tools/unixtime.aspx', '文章标题是这个吧', '<p>内容。。。。</p>', 1, '1505317896', '成功了', 3, 1, 0, 'http://tool.chinaz.com/Tools/unixtime.aspx'),
(2, 'http://tool.chinaz.com/Tools/unixtime.aspx', '3434', '3333', 2, '1505317896', '', 0, 0, 1, 'http://tool.chinaz.com/Tools/unixtime.aspx'),
(3, '', '文章标题2', '3333', 4, '1505317896', '标题不合格', 2, 1, 0, 'http://tool.chinaz.com/Tools/unixtime.aspx'),
(4, '', '文章标题3', '3333', 2, '1505317896', '', 3, 1, 0, 'http://tool.chinaz.com/Tools/unixtime.aspx'),
(5, '', '文章标题4', '3333', 5, '1505317896', '', 0, 1, 0, 'http://tool.chinaz.com/Tools/unixtime.aspx');

-- --------------------------------------------------------

--
-- 表的结构 `ck_media_zone`
--

CREATE TABLE IF NOT EXISTS `ck_media_zone` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zonename` varchar(16) NOT NULL COMMENT '地区名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ck_media_zone`
--

INSERT INTO `ck_media_zone` (`id`, `zonename`) VALUES
(1, '全国'),
(2, '北京'),
(3, '上海'),
(4, '广东'),
(5, '广西'),
(6, '浙江');

-- --------------------------------------------------------

--
-- 表的结构 `ck_member`
--

CREATE TABLE IF NOT EXISTS `ck_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `domain` varchar(64) NOT NULL COMMENT '域名',
  `company` varchar(64) NOT NULL COMMENT '公司名称',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '代理商id0直接客户',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '会员状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ck_member`
--

INSERT INTO `ck_member` (`id`, `username`, `password`, `domain`, `company`, `aid`, `state`) VALUES
(1, 'user1', '1234567', 'www.ddd.com', '会员公司一', 0, 1),
(2, 'user2', '123456', 'www.ddd.com', '会员公司名称二', 1, 0),
(3, 'user3', '123456', 'www.ddd.com', '会员公司三', 1, 1),
(4, 'user4', '123456', 'www.ddd.com', '会员公司四', 1, 1),
(5, 'user5', '123456', 'www.ddd.com', '会员公司5', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ck_member_buy`
--

CREATE TABLE IF NOT EXISTS `ck_member_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expense` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '消费',
  `purpose` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0模板1新闻源2其他',
  `status` tinyint(1) NOT NULL COMMENT '0未支付1支付成功',
  `uid` int(11) NOT NULL COMMENT '会员id',
  `time` char(10) NOT NULL COMMENT '消费时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ck_member_info`
--

CREATE TABLE IF NOT EXISTS `ck_member_info` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `linkman` varchar(16) NOT NULL COMMENT '联系人',
  `phone` varchar(16) NOT NULL COMMENT '手机',
  `tel` varchar(16) NOT NULL COMMENT '座机',
  `fax` varchar(16) NOT NULL COMMENT 'fax',
  `wechat` varchar(32) NOT NULL COMMENT '微信',
  `qq` varchar(16) NOT NULL COMMENT 'qq',
  `address` varchar(64) NOT NULL COMMENT '联系地址',
  `signdate` char(10) NOT NULL COMMENT '注册时间',
  `thumb` varchar(128) NOT NULL COMMENT '头像',
  `uid` int(11) NOT NULL COMMENT '会员id',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ck_member_info`
--

INSERT INTO `ck_member_info` (`gid`, `linkman`, `phone`, `tel`, `fax`, `wechat`, `qq`, `address`, `signdate`, `thumb`, `uid`) VALUES
(1, '田先生', '18217710701', '80392515', '80392515', 'yestian', '69719701', '上海市科苑路151号', '1504516232', '\\uploads/20170904\\740d4db4d5ddc91d2cae2038110a0fa8.jpg', 1),
(2, '潘先生', '18217710701', '80392515', '80392515', 'yestian', '69719701', '上海市浦东新区科苑路151号', '1504516356', '\\uploads/20170904\\a38391f02d86b956b3f1c586d7aa75b5.jpg', 2),
(3, '田先生', '18217710701', '80392515', '80392515', 'yestian', '69719701', '上海市科苑路151号', '1504516397', '\\uploads/20170904\\b36fcd2356b3f63de2edba32f4714c61.jpg', 3),
(4, '田先生', '18217710701', '80392515', '80392515', 'yestian', '69719701', '上海市科苑路151号', '1504516439', '\\uploads/20170904\\2417d3459136b13527645090039fb503.jpg', 4),
(5, '潘先生', '18217710701', '80392515', '80392515', 'yestian', '69719701', '上海市科苑路151号', '1504516489', '\\uploads/20170904\\e2614ed48cb4dcdad9863edc0fdb7d63.jpg', 5);

-- --------------------------------------------------------

--
-- 表的结构 `ck_member_pay`
--

CREATE TABLE IF NOT EXISTS `ck_member_pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '会员充值',
  `time` char(10) NOT NULL COMMENT '充值时间',
  `payway` tinyint(1) NOT NULL COMMENT '充值方式0官方代充1支付宝2微信3银行卡4paypal',
  `uid` int(11) NOT NULL COMMENT '会员id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ck_site`
--

CREATE TABLE IF NOT EXISTS `ck_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0免费1标准2专业3商城',
  `years` tinyint(2) NOT NULL DEFAULT '0',
  `paytime` char(10) NOT NULL COMMENT '开通时间',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '会员id',
  `aid` int(11) NOT NULL DEFAULT '0' COMMENT '代理商id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `ck_site`
--

INSERT INTO `ck_site` (`id`, `type`, `years`, `paytime`, `uid`, `aid`) VALUES
(1, 3, 1, '1504756554', 1, 0),
(2, 1, 2, '1504756554', 2, 0),
(3, 1, 1, '1504776918', 1, 0),
(5, 3, 2, '1504788093', 0, 1),
(6, 2, 1, '1504788137', 0, 2);

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
