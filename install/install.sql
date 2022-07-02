DROP TABLE IF EXISTS `web_config`;
CREATE TABLE `web_config` (
  `k` varchar(32) NOT NULL,
  `v` text,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `web_app`;
CREATE TABLE `web_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `jianjie` text NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `web_dh`;
CREATE TABLE `web_dh` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `name` text,
  `jianjie` text NOT NULL,
  `content` longtext NOT NULL,
  `active` int(11) NOT NULL,
  `downn` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

DROP TABLE IF EXISTS `web_gxjl`;
CREATE TABLE `web_gxjl` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` text,
  `content` longtext NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;


DROP TABLE IF EXISTS `web_liuyan`;
CREATE TABLE `web_liuyan` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `headlogo` varchar(255) DEFAULT NULL,
  `name` text,
  `addtime` date NOT NULL,
  `content` longtext NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

SET FOREIGN_KEY_CHECKS = 1;
INSERT INTO `web_config` VALUES ('version', '1025');
INSERT INTO `web_config` VALUES ('admin_user', 'admin');
INSERT INTO `web_config` VALUES ('admin_pwd', '123456');
INSERT INTO `web_config` VALUES ('style', '1');
INSERT INTO `web_config` VALUES ('sitename', '大彭Sir');
INSERT INTO `web_config` VALUES ('title', '成就更好的我，遇上更好的你！');
INSERT INTO `web_config` VALUES ('keywords', '大彭Sir,HK工作室,彭先生,彭先生博客,Brief,彭Sir工具箱,彭Sir导航,炫酷个人主页');
INSERT INTO `web_config` VALUES ('description', '大彭Sir的个人主页，这里整合了各种好用的开发工具以及学习网站！');
INSERT INTO `web_config` VALUES ('kfqq', '123456');
INSERT INTO `web_config` VALUES ('anounce', '');
INSERT INTO `web_config` VALUES ('modal', '关于页面的网站介绍');
INSERT INTO `web_config` VALUES ('music', 'XICP备19000001号');
INSERT INTO `web_config` VALUES ('url', '');
INSERT INTO `web_config` VALUES ('email_from', 'hk@hkiii.cn');
INSERT INTO `web_config` VALUES ('qqjump', '0');
INSERT INTO `web_config` VALUES ('email_pw', '');
INSERT INTO `web_config` VALUES ('email_user', '');
INSERT INTO `web_config` VALUES ('tsid', '');
COMMIT;