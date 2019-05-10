-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_adminmenu`
--

DROP TABLE IF EXISTS `jieqi_system_adminmenu`;
CREATE TABLE `jieqi_system_adminmenu` (
  `menuid` int(10) unsigned NOT NULL auto_increment,
  `modname` varchar(50) NOT NULL default '',
  `layer` tinyint(3) NOT NULL default '0',
  `caption` varchar(50) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `command` varchar(100) NOT NULL default '',
  `power` tinyint(1) NOT NULL default '0',
  `target` tinyint(1) NOT NULL default '0',
  `weight` int(10) unsigned NOT NULL default '0',
  `publish` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`menuid`),
  KEY `modname` (`modname`),
  KEY `weight` (`weight`),
  KEY `publish` (`publish`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_blockconfigs`
--

DROP TABLE IF EXISTS `jieqi_system_blockconfigs`;
CREATE TABLE `jieqi_system_blockconfigs` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `modules` varchar(30) NOT NULL default '',
  `name` varchar(30) NOT NULL default '',
  `file` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_blocks`
--

DROP TABLE IF EXISTS `jieqi_system_blocks`;
CREATE TABLE `jieqi_system_blocks` (
  `bid` mediumint(8) unsigned NOT NULL auto_increment,
  `blockname` varchar(50) NOT NULL default '',
  `modname` varchar(50) NOT NULL default '',
  `filename` varchar(50) NOT NULL default '',
  `classname` varchar(50) NOT NULL default '',
  `side` tinyint(3) NOT NULL default '0',
  `title` text NOT NULL,
  `description` text NOT NULL,
  `content` mediumtext NOT NULL,
  `vars` text NOT NULL,
  `template` varchar(50) NOT NULL default '',
  `cachetime` int(11) NOT NULL default '0',
  `contenttype` tinyint(3) NOT NULL default '0',
  `weight` mediumint(8) unsigned NOT NULL default '0',
  `showstatus` tinyint(1) unsigned NOT NULL default '0',
  `custom` tinyint(1) unsigned NOT NULL default '0',
  `canedit` tinyint(1) unsigned NOT NULL default '0',
  `publish` tinyint(1) unsigned NOT NULL default '0',
  `hasvars` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`bid`),
  KEY `modname` (`modname`),
  KEY `publish` (`publish`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_configs`
--

DROP TABLE IF EXISTS `jieqi_system_configs`;
CREATE TABLE `jieqi_system_configs` (
  `cid` int(10) unsigned NOT NULL auto_increment,
  `modname` varchar(50) NOT NULL default '',
  `cname` varchar(50) NOT NULL default '',
  `ctitle` varchar(50) NOT NULL default '',
  `cvalue` text NOT NULL,
  `cdescription` text NOT NULL,
  `cdefine` tinyint(1) NOT NULL default '0',
  `ctype` tinyint(1) NOT NULL default '0',
  `options` text NOT NULL,
  `catorder` int(10) NOT NULL default '0',
  `catname` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`cid`),
  UNIQUE KEY `modname` (`modname`,`cname`),
  KEY `catorder` (`catorder`),
  KEY `cdefine` (`cdefine`),
  KEY `catname` (`catname`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_defaultmenu`
--

DROP TABLE IF EXISTS `jieqi_system_defaultmenu`;
CREATE TABLE `jieqi_system_defaultmenu` (
  `menuid` int(10) unsigned NOT NULL auto_increment,
  `modname` varchar(50) NOT NULL default '',
  `layer` tinyint(3) NOT NULL default '0',
  `caption` varchar(50) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `command` varchar(100) NOT NULL default '',
  `power` tinyint(1) NOT NULL default '0',
  `target` tinyint(1) NOT NULL default '0',
  `weight` int(10) unsigned NOT NULL default '0',
  `publish` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`menuid`),
  KEY `modname` (`modname`),
  KEY `weight` (`weight`),
  KEY `publish` (`publish`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_friends`
--

DROP TABLE IF EXISTS `jieqi_system_friends`;
CREATE TABLE `jieqi_system_friends` (
  `friendsid` int(11) unsigned NOT NULL auto_increment,
  `adddate` int(11) NOT NULL default '0',
  `myid` int(11) unsigned NOT NULL default '0',
  `myname` varchar(30) binary NOT NULL default '',
  `yourid` int(11) unsigned NOT NULL default '0',
  `yourname` varchar(30) binary NOT NULL default '',
  `teamid` int(11) unsigned NOT NULL default '0',
  `team` varchar(50) NOT NULL default '',
  `fset` text NOT NULL,
  `state` tinyint(1) NOT NULL default '0',
  `flag` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`friendsid`),
  UNIQUE KEY `myid` (`myid`,`yourid`),
  KEY `teamid` (`teamid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_groups`
--

DROP TABLE IF EXISTS `jieqi_system_groups`;
CREATE TABLE `jieqi_system_groups` (
  `groupid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `description` text NOT NULL,
  `grouptype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`groupid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_honors`
--

DROP TABLE IF EXISTS `jieqi_system_honors`;
CREATE TABLE `jieqi_system_honors` (
  `honorid` smallint(5) unsigned NOT NULL auto_increment,
  `caption` varchar(250) NOT NULL default '',
  `minscore` int(11) NOT NULL default '0',
  `maxscore` int(11) NOT NULL default '0',
  `setting` text NOT NULL,
  `honortype` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`honorid`),
  KEY `minscore` (`minscore`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_logs`
--

DROP TABLE IF EXISTS `jieqi_system_logs`;
CREATE TABLE `jieqi_system_logs` (
  `logid` int(11) NOT NULL auto_increment,
  `siteid` int(11) NOT NULL default '0',
  `logtype` tinyint(3) NOT NULL default '0',
  `loglevel` tinyint(3) NOT NULL default '0',
  `logtime` int(11) NOT NULL default '0',
  `userid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `userip` varchar(25) NOT NULL default '',
  `targetname` varchar(60) NOT NULL default '',
  `targetid` int(11) NOT NULL default '0',
  `targettitle` varchar(60) NOT NULL default '',
  `logurl` varchar(100) NOT NULL default '',
  `logcode` int(11) NOT NULL default '0',
  `logtitle` varchar(100) NOT NULL default '',
  `logdata` text NOT NULL default '',
  `lognote` text NOT NULL default '',
  `fromdata` text NOT NULL default '',
  `todata` text NOT NULL default '',
  PRIMARY KEY  (`logid`),
  KEY `logtype` (`logtype`),
  KEY `loglevel` (`loglevel`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_mainmenu`
--

DROP TABLE IF EXISTS `jieqi_system_mainmenu`;
CREATE TABLE `jieqi_system_mainmenu` (
  `menuid` int(10) unsigned NOT NULL auto_increment,
  `modname` varchar(50) NOT NULL default '',
  `layer` tinyint(3) NOT NULL default '0',
  `caption` varchar(50) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  `command` varchar(100) NOT NULL default '',
  `power` tinyint(1) NOT NULL default '0',
  `target` tinyint(1) NOT NULL default '0',
  `weight` int(10) unsigned NOT NULL default '0',
  `publish` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`menuid`),
  KEY `modname` (`modname`),
  KEY `weight` (`weight`),
  KEY `publish` (`publish`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_mblock`
--

DROP TABLE IF EXISTS `jieqi_system_mblock`;
CREATE TABLE `jieqi_system_mblock` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `modules` varchar(10) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  `file` varchar(20) NOT NULL default '',
  `classname` varchar(20) NOT NULL default '',
  `introduce` mediumtext NOT NULL,
  `vars` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_message`
--

DROP TABLE IF EXISTS `jieqi_system_message`;
CREATE TABLE `jieqi_system_message` (
  `messageid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `postdate` int(11) NOT NULL default '0',
  `fromid` int(11) unsigned NOT NULL default '0',
  `fromname` varchar(30) binary NOT NULL default '',
  `toid` int(11) unsigned NOT NULL default '0',
  `toname` varchar(30) binary NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `content` mediumtext NOT NULL,
  `messagetype` tinyint(1) NOT NULL default '0',
  `isread` tinyint(1) NOT NULL default '0',
  `fromdel` tinyint(1) NOT NULL default '0',
  `todel` tinyint(1) NOT NULL default '0',
  `enablebbcode` tinyint(1) NOT NULL default '1',
  `enablehtml` tinyint(1) NOT NULL default '0',
  `enablesmilies` tinyint(1) NOT NULL default '1',
  `attachsig` tinyint(1) NOT NULL default '1',
  `attachment` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`messageid`),
  KEY `fromid` (`fromid`),
  KEY `toid` (`toid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_modules`
--

DROP TABLE IF EXISTS `jieqi_system_modules`;
CREATE TABLE `jieqi_system_modules` (
  `mid` smallint(5) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `caption` varchar(50) NOT NULL default '',
  `description` text NOT NULL,
  `version` smallint(5) unsigned NOT NULL default '100',
  `vtype` varchar(30) NOT NULL default '',
  `lastupdate` int(10) unsigned NOT NULL default '0',
  `weight` smallint(5) unsigned NOT NULL default '0',
  `publish` tinyint(1) unsigned NOT NULL default '0',
  `modtype` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`mid`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_online`
--

DROP TABLE IF EXISTS `jieqi_system_online`;
CREATE TABLE `jieqi_system_online` (
  `uid` int(11) unsigned NOT NULL default '0',
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `sid` varchar(32) NOT NULL default '',
  `uname` varchar(30) binary NOT NULL default '',
  `name` varchar(30) binary NOT NULL default '',
  `pass` varchar(32) NOT NULL default '',
  `email` varchar(60) NOT NULL default '',
  `groupid` tinyint(3) NOT NULL default '0',
  `logintime` int(11) unsigned NOT NULL default '0',
  `updatetime` int(11) unsigned NOT NULL default '0',
  `operate` varchar(100) NOT NULL default '',
  `ip` varchar(25) NOT NULL default '',
  `browser` varchar(50) NOT NULL default '',
  `os` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `state` tinyint(1) NOT NULL default '0',
  `flag` tinyint(1) NOT NULL default '0',
  KEY `uid` (`uid`),
  KEY `sid` (`sid`),
  KEY `groupid` (`groupid`),
  KEY `updatetime` (`updatetime`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_power`
--

DROP TABLE IF EXISTS `jieqi_system_power`;
CREATE TABLE `jieqi_system_power` (
  `pid` int(10) unsigned NOT NULL auto_increment,
  `modname` varchar(50) NOT NULL default '',
  `pname` varchar(50) NOT NULL default '',
  `ptitle` varchar(50) NOT NULL default '',
  `pdescription` text NOT NULL,
  `pgroups` text NOT NULL,
  PRIMARY KEY  (`pid`),
  UNIQUE KEY `modname` (`modname`,`pname`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_pposts`
--

DROP TABLE IF EXISTS `jieqi_system_pposts`;
CREATE TABLE `jieqi_system_pposts` (
  `postid` int(10) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `topicid` int(10) unsigned NOT NULL default '0',
  `istopic` tinyint(1) NOT NULL default '0',
  `replypid` int(10) unsigned NOT NULL default '0',
  `ownerid` int(11) unsigned NOT NULL default '0',
  `posterid` int(11) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(11) NOT NULL default '0',
  `posterip` varchar(25) NOT NULL default '',
  `editorid` int(10) NOT NULL default '0',
  `editor` varchar(30) NOT NULL default '',
  `edittime` int(10) NOT NULL default '0',
  `editorip` varchar(25) NOT NULL default '',
  `editnote` varchar(250) NOT NULL default '',
  `iconid` tinyint(3) NOT NULL default '0',
  `attachment` text NOT NULL,
  `subject` varchar(80) NOT NULL default '',
  `posttext` mediumtext NOT NULL,
  `size` int(11) NOT NULL default '0',
  PRIMARY KEY  (`postid`),
  KEY `ownerid` (`ownerid`),
  KEY `ptopicid` (`topicid`,`posttime`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_promotions`
--

DROP TABLE IF EXISTS `jieqi_system_promotions`;
CREATE TABLE `jieqi_system_promotions` (
  `ip` varchar(15) NOT NULL default '',
  `uid` int(11) NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  PRIMARY KEY  (`ip`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_ptopics`
--

DROP TABLE IF EXISTS `jieqi_system_ptopics`;
CREATE TABLE `jieqi_system_ptopics` (
  `topicid` mediumint(8) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `ownerid` int(11) unsigned NOT NULL default '0',
  `title` varchar(80) NOT NULL default '',
  `posterid` int(11) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(11) NOT NULL default '0',
  `replierid` int(10) NOT NULL default '0',
  `replier` varchar(30) NOT NULL default '',
  `replytime` int(11) NOT NULL default '0',
  `views` mediumint(8) unsigned NOT NULL default '0',
  `replies` mediumint(8) unsigned NOT NULL default '0',
  `islock` tinyint(1) NOT NULL default '0',
  `istop` int(11) NOT NULL default '0',
  `isgood` tinyint(1) NOT NULL default '0',
  `rate` tinyint(1) NOT NULL default '0',
  `attachment` tinyint(1) NOT NULL default '0',
  `needperm` int(10) unsigned NOT NULL default '0',
  `needscore` int(10) unsigned NOT NULL default '0',
  `needexp` int(10) unsigned NOT NULL default '0',
  `needprice` int(10) unsigned NOT NULL default '0',
  `sortid` tinyint(3) NOT NULL default '0',
  `iconid` tinyint(3) NOT NULL default '0',
  `typeid` tinyint(3) NOT NULL default '0',
  `lastinfo` varchar(255) NOT NULL default '',
  `linkurl` varchar(100) NOT NULL default '',
  `size` int(11) NOT NULL default '0',
  PRIMARY KEY  (`topicid`),
  KEY `ownerid` (`ownerid`,`istop`,`replytime`),
  KEY `posterid` (`posterid`,`replytime`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_registerip`
--

DROP TABLE IF EXISTS `jieqi_system_registerip`;
CREATE TABLE `jieqi_system_registerip` (
  `ip` char(15) NOT NULL default '',
  `regtime` int(11) unsigned NOT NULL default '0',
  `count` smallint(6) NOT NULL default '0',
  KEY `ip` (`ip`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_report`
--

DROP TABLE IF EXISTS `jieqi_system_report`;
CREATE TABLE `jieqi_system_report` (
  `reportid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `reporttime` int(11) unsigned NOT NULL default '0',
  `reportuid` int(11) unsigned NOT NULL default '0',
  `reportname` varchar(30) binary NOT NULL default '',
  `authtime` int(11) unsigned NOT NULL default '0',
  `authuid` int(11) unsigned NOT NULL default '0',
  `authname` varchar(30) binary NOT NULL default '',
  `reporttitle` varchar(100) NOT NULL default '',
  `reporttext` mediumtext NOT NULL,
  `reportsize` int(11) unsigned NOT NULL default '0',
  `reportfield` varchar(250) NOT NULL default '',
  `authnote` text NOT NULL,
  `reportsort` smallint(6) unsigned NOT NULL default '0',
  `reporttype` smallint(6) unsigned NOT NULL default '0',
  `authflag` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`reportid`),
  KEY `reportsort` (`reportsort`),
  KEY `reporttype` (`reporttype`),
  KEY `reportname` (`reportname`),
  KEY `authname` (`authname`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_right`
--

DROP TABLE IF EXISTS `jieqi_system_right`;
CREATE TABLE `jieqi_system_right` (
  `rid` int(11) unsigned NOT NULL auto_increment,
  `modname` varchar(50) NOT NULL default '',
  `rname` varchar(50) NOT NULL default '',
  `rtitle` varchar(50) NOT NULL default '',
  `rdescription` text NOT NULL,
  `rhonors` text NOT NULL,
  PRIMARY KEY  (`rid`),
  KEY `modname` (`modname`,`rname`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_session`
--

DROP TABLE IF EXISTS `jieqi_system_session`;
CREATE TABLE `jieqi_system_session` (
  `sess_id` varchar(32) NOT NULL default '',
  `sess_updated` int(11) unsigned NOT NULL default '0',
  `sess_data` text NOT NULL,
  PRIMARY KEY  (`sess_id`),
  KEY `sess_updated` (`sess_updated`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_userlink`
--

DROP TABLE IF EXISTS `jieqi_system_userlink`;
CREATE TABLE `jieqi_system_userlink` (
  `ulid` int(11) unsigned NOT NULL auto_increment,
  `ultitle` varchar(60) NOT NULL default '',
  `ulurl` varchar(100) NOT NULL default '',
  `ulinfo` varchar(255) NOT NULL default '',
  `userid` int(11) unsigned NOT NULL default '0',
  `username` varchar(30) NOT NULL default '',
  `score` tinyint(1) NOT NULL default '0',
  `weight` smallint(6) NOT NULL default '0',
  `toptime` int(11) NOT NULL default '0',
  `addtime` int(11) NOT NULL default '0',
  `allvisit` int(11) NOT NULL default '0',
  PRIMARY KEY  (`ulid`),
  KEY `userid` (`userid`,`toptime`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_userlog`
--

DROP TABLE IF EXISTS `jieqi_system_userlog`;
CREATE TABLE `jieqi_system_userlog` (
  `logid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `logtime` int(11) unsigned NOT NULL default '0',
  `fromid` int(11) unsigned NOT NULL default '0',
  `fromname` varchar(30) binary NOT NULL default '',
  `toid` int(11) unsigned NOT NULL default '0',
  `toname` varchar(30) binary NOT NULL default '',
  `reason` text NOT NULL,
  `chginfo` text NOT NULL,
  `chglog` text NOT NULL,
  `isdel` tinyint(1) unsigned NOT NULL default '0',
  `userlog` mediumtext NOT NULL,
  PRIMARY KEY  (`logid`),
  KEY `logtime` (`logtime`),
  KEY `fromid` (`fromid`),
  KEY `toid` (`toid`),
  KEY `fromname` (`fromname`),
  KEY `toname` (`toname`),
  KEY `isdel` (`isdel`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_system_users`
--

DROP TABLE IF EXISTS `jieqi_system_users`;
CREATE TABLE `jieqi_system_users` (
  `uid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `uname` varchar(30) binary NOT NULL default '',
  `name` varchar(60) NOT NULL default '',
  `pass` varchar(32) NOT NULL default '',
  `groupid` tinyint(3) NOT NULL default '0',
  `regdate` int(11) unsigned NOT NULL default '0',
  `initial` char(1) NOT NULL default '',
  `sex` tinyint(1) NOT NULL default '0',
  `email` varchar(60) NOT NULL default '',
  `url` varchar(100) NOT NULL default '',
  `avatar` int(11) NOT NULL default '0',
  `workid` tinyint(3) NOT NULL default '0',
  `qq` varchar(15) NOT NULL default '',
  `icq` varchar(15) NOT NULL default '',
  `msn` varchar(60) NOT NULL default '',
  `mobile` varchar(20) NOT NULL default '',
  `sign` text NOT NULL,
  `intro` text NOT NULL,
  `setting` text NOT NULL,
  `badges` text NOT NULL,
  `lastlogin` int(10) unsigned NOT NULL default '0',
  `showsign` tinyint(1) unsigned NOT NULL default '0',
  `viewemail` tinyint(1) unsigned NOT NULL default '0',
  `notifymode` tinyint(1) NOT NULL default '0',
  `adminemail` tinyint(1) unsigned NOT NULL default '1',
  `monthscore` int(11) NOT NULL default '0',
  `weekscore` int(11) NOT NULL default '0',
  `dayscore` int(11) NOT NULL default '0',
  `lastscore` int(11) unsigned NOT NULL default '0',
  `experience` int(11) NOT NULL default '0',
  `score` int(11) NOT NULL default '0',
  `egold` int(11) NOT NULL default '0',
  `esilver` int(11) NOT NULL default '0',
  `credit` int(11) NOT NULL default '0',
  `goodnum` int(11) NOT NULL default '0',
  `badnum` int(11) NOT NULL default '0',
  `isvip` tinyint(1) unsigned NOT NULL default '0',
  `overtime` int(11) NOT NULL default '0',
  `state` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `email` (`email`),
  KEY `groupid` (`groupid`),
  KEY `state` (`state`)
) ENGINE=MyISAM;
