-- --------------------------------------------------------

--
-- 表的结构 `jieqi_forum_attachs`
--

DROP TABLE IF EXISTS `jieqi_forum_attachs`;
CREATE TABLE `jieqi_forum_attachs` (
  `attachid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `topicid` int(11) unsigned NOT NULL default '0',
  `postid` int(11) unsigned NOT NULL default '0',
  `name` varchar(80) NOT NULL default '',
  `description` varchar(100) NOT NULL default '',
  `class` varchar(30) NOT NULL default '',
  `postfix` varchar(30) NOT NULL default '',
  `size` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `needperm` int(10) unsigned NOT NULL default '0',
  `needscore` int(10) unsigned NOT NULL default '0',
  `needexp` int(11) unsigned NOT NULL default '0',
  `needprice` int(10) unsigned NOT NULL default '0',
  `uptime` int(11) NOT NULL default '0',
  `uid` int(10) unsigned NOT NULL default '0',
  `remote` tinyint(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`attachid`),
  KEY `topicid` (`topicid`),
  KEY `postid` (`postid`,`attachid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_forum_forumcat`
--

DROP TABLE IF EXISTS `jieqi_forum_forumcat`;
CREATE TABLE `jieqi_forum_forumcat` (
  `catid` mediumint(6) unsigned NOT NULL auto_increment,
  `cattitle` varchar(100) NOT NULL default '',
  `catorder` mediumint(6) unsigned NOT NULL default '0',
  PRIMARY KEY  (`catid`),
  KEY `catorder` (`catorder`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_forum_forumposts`
--

DROP TABLE IF EXISTS `jieqi_forum_forumposts`;
CREATE TABLE `jieqi_forum_forumposts` (
  `postid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `topicid` int(11) unsigned NOT NULL default '0',
  `istopic` tinyint(1) NOT NULL default '0',
  `replypid` int(10) unsigned NOT NULL default '0',
  `ownerid` int(10) unsigned NOT NULL default '0',
  `posterid` int(11) NOT NULL default '0',
  `poster` varchar(30) binary NOT NULL default '',
  `posttime` int(11) NOT NULL default '0',
  `posterip` varchar(25) NOT NULL default '',
  `editorid` int(10) NOT NULL default '0',
  `editor` varchar(30) NOT NULL default '',
  `edittime` int(11) NOT NULL default '0',
  `editorip` varchar(25) NOT NULL default '',
  `editnote` varchar(250) NOT NULL default '',
  `iconid` tinyint(3) NOT NULL default '0',
  `attachment` text NOT NULL,
  `subject` varchar(80) NOT NULL default '',
  `size` int(10) NOT NULL default '0',
  `posttext` mediumtext NOT NULL,
  PRIMARY KEY  (`postid`),
  KEY `ownerid` (`ownerid`),
  KEY `ptopicid` (`topicid`,`posttime`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_forum_forums`
--

DROP TABLE IF EXISTS `jieqi_forum_forums`;
CREATE TABLE `jieqi_forum_forums` (
  `forumid` smallint(6) unsigned NOT NULL auto_increment,
  `catid` mediumint(6) unsigned NOT NULL default '0',
  `forumname` varchar(100) NOT NULL default '',
  `forumdesc` text NOT NULL,
  `forumstatus` tinyint(4) NOT NULL default '0',
  `forumorder` mediumint(6) unsigned NOT NULL default '0',
  `forumtype` tinyint(1) NOT NULL default '0',
  `forumtopics` int(11) unsigned NOT NULL default '0',
  `forumposts` int(11) unsigned NOT NULL default '0',
  `forumlastinfo` text NOT NULL,
  `authview` text NOT NULL,
  `authread` text NOT NULL,
  `authpost` text NOT NULL,
  `authreply` text NOT NULL,
  `authupload` text NOT NULL,
  `authedit` text NOT NULL,
  `authdelete` text NOT NULL,
  `master` text NOT NULL,
  PRIMARY KEY  (`forumid`),
  KEY `forumorder` (`forumorder`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_forum_forumtopics`
--

DROP TABLE IF EXISTS `jieqi_forum_forumtopics`;
CREATE TABLE `jieqi_forum_forumtopics` (
  `topicid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `ownerid` int(10) unsigned NOT NULL default '0',
  `title` varchar(80) NOT NULL default '',
  `posterid` int(10) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(10) NOT NULL default '0',
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
  `lastinfo` varchar(250) NOT NULL default '',
  `linkurl` varchar(100) NOT NULL default '',
  `size` int(11) NOT NULL default '0',
  PRIMARY KEY  (`topicid`),
  KEY `topictype` (`sortid`),
  KEY `ownerid` (`ownerid`,`istop`,`replytime`),
  KEY `posterid` (`posterid`,`replytime`)
) ENGINE=MyISAM;
