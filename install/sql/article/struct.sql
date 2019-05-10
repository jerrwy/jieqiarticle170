
-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_applywriter`
--

DROP TABLE IF EXISTS `jieqi_article_applywriter`;
CREATE TABLE `jieqi_article_applywriter` (
  `applyid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `applytime` int(11) unsigned NOT NULL default '0',
  `applyuid` int(11) unsigned NOT NULL default '0',
  `applyname` varchar(30) binary NOT NULL default '',
  `penname` varchar(30) binary NOT NULL default '',
  `authtime` int(11) unsigned NOT NULL default '0',
  `authuid` int(11) unsigned NOT NULL default '0',
  `authname` varchar(30) binary NOT NULL default '',
  `applytitle` varchar(100) NOT NULL default '',
  `applytext` mediumtext NOT NULL,
  `applysize` int(11) unsigned NOT NULL default '0',
  `authnote` text NOT NULL,
  `applyflag` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`applyid`),
  KEY `applyflag` (`applyflag`),
  KEY `applyename` (`applyname`),
  KEY `authname` (`authname`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_article`
--

DROP TABLE IF EXISTS `jieqi_article_article`;
CREATE TABLE `jieqi_article_article` (
  `articleid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `postdate` int(11) unsigned NOT NULL default '0',
  `lastupdate` int(11) unsigned NOT NULL default '0',
  `articlename` varchar(50) binary NOT NULL default '',
  `keywords` varchar(50) NOT NULL default '',
  `initial` char(1) NOT NULL default '',
  `authorid` int(11) unsigned NOT NULL default '0',
  `author` varchar(30) binary NOT NULL default '',
  `posterid` int(11) unsigned NOT NULL default '0',
  `poster` varchar(30) binary NOT NULL default '',
  `agentid` int(11) unsigned NOT NULL default '0',
  `agent` varchar(30) binary NOT NULL default '',
  `sortid` smallint(3) unsigned NOT NULL default '0',
  `typeid` smallint(3) unsigned NOT NULL default '0',
  `intro` text NOT NULL,
  `notice` text NOT NULL,
  `setting` text NOT NULL,
  `lastvolumeid` int(11) unsigned NOT NULL default '0',
  `lastvolume` varchar(100) NOT NULL default '',
  `lastchapterid` int(11) unsigned NOT NULL default '0',
  `lastchapter` varchar(100) NOT NULL default '',
  `chapters` smallint(6) unsigned NOT NULL default '0',
  `size` int(11) unsigned NOT NULL default '0',
  `lastvisit` int(11) unsigned NOT NULL default '0',
  `dayvisit` int(11) unsigned NOT NULL default '0',
  `weekvisit` int(11) unsigned NOT NULL default '0',
  `monthvisit` int(11) unsigned NOT NULL default '0',
  `allvisit` int(11) unsigned NOT NULL default '0',
  `lastvote` int(11) unsigned NOT NULL default '0',
  `dayvote` int(11) unsigned NOT NULL default '0',
  `weekvote` int(11) unsigned NOT NULL default '0',
  `monthvote` int(11) unsigned NOT NULL default '0',
  `allvote` int(11) unsigned NOT NULL default '0',
  `vipvotetime` int(11) NOT NULL default '0',
  `vipvotenow` int(11) NOT NULL default '0',
  `vipvotepreview` int(11) NOT NULL default '0',
  `goodnum` int(11) unsigned NOT NULL default '0',
  `badnum` int(11) unsigned NOT NULL default '0',
  `toptime` int(11) unsigned NOT NULL default '0',
  `saleprice` int(11) unsigned NOT NULL default '0',
  `salenum` int(11) unsigned NOT NULL default '0',
  `totalcost` int(11) unsigned NOT NULL default '0',
  `articletype` tinyint(1) unsigned NOT NULL default '0',
  `permission` tinyint(1) unsigned NOT NULL default '0',
  `firstflag` tinyint(1) unsigned NOT NULL default '0',
  `fullflag` tinyint(1) unsigned NOT NULL default '0',
  `imgflag` tinyint(1) unsigned NOT NULL default '0',
  `power` tinyint(1) unsigned NOT NULL default '0',
  `display` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`articleid`),
  KEY `articlename` (`articlename`),
  KEY `posterid` (`posterid`),
  KEY `authorid` (`authorid`),
  KEY `agentid` (`agentid`),
  KEY `initial` (`initial`),
  KEY `sortid` (`sortid`,`typeid`),
  KEY `display` (`display`),
  KEY `size` (`size`),
  KEY `lastupdate` (`lastupdate`),
  KEY `author` (`author`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_articlelog`
--

DROP TABLE IF EXISTS `jieqi_article_articlelog`;
CREATE TABLE `jieqi_article_articlelog` (
  `logid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `logtime` int(11) unsigned NOT NULL default '0',
  `userid` int(11) unsigned NOT NULL default '0',
  `username` varchar(30) binary NOT NULL default '',
  `articleid` int(11) unsigned NOT NULL default '0',
  `articlename` varchar(255) binary NOT NULL default '',
  `chapterid` int(11) unsigned NOT NULL default '0',
  `chaptername` varchar(255) NOT NULL default '',
  `reason` text NOT NULL,
  `chginfo` text NOT NULL,
  `chglog` text NOT NULL,
  `ischapter` tinyint(1) unsigned NOT NULL default '0',
  `isdel` tinyint(1) unsigned NOT NULL default '0',
  `databak` mediumtext NOT NULL,
  PRIMARY KEY  (`logid`),
  KEY `userid` (`userid`),
  KEY `ischapter` (`ischapter`),
  KEY `isdel` (`isdel`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_attachs`
--

DROP TABLE IF EXISTS `jieqi_article_attachs`;
CREATE TABLE `jieqi_article_attachs` (
  `attachid` int(11) unsigned NOT NULL auto_increment,
  `articleid` int(11) unsigned NOT NULL default '0',
  `chapterid` int(11) unsigned NOT NULL default '0',
  `name` varchar(80) NOT NULL default '',
  `class` varchar(30) NOT NULL default '',
  `postfix` varchar(30) NOT NULL default '',
  `size` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `needexp` int(11) unsigned NOT NULL default '0',
  `uptime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`attachid`),
  KEY `articleid` (`articleid`),
  KEY `chapterid` (`chapterid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_avote`
--

DROP TABLE IF EXISTS `jieqi_article_avote`;
CREATE TABLE `jieqi_article_avote` (
  `voteid` int(11) unsigned NOT NULL auto_increment,
  `articleid` int(11) unsigned NOT NULL default '0',
  `posterid` int(11) NOT NULL default '0',
  `poster` varchar(30) NOT NULL default '',
  `posttime` int(11) NOT NULL default '0',
  `title` varchar(100) NOT NULL default '',
  `item1` varchar(100) NOT NULL default '',
  `item2` varchar(100) NOT NULL default '',
  `item3` varchar(100) NOT NULL default '',
  `item4` varchar(100) NOT NULL default '',
  `item5` varchar(100) NOT NULL default '',
  `item6` varchar(100) NOT NULL default '',
  `item7` varchar(100) NOT NULL default '',
  `item8` varchar(100) NOT NULL default '',
  `item9` varchar(100) NOT NULL default '',
  `item10` varchar(100) NOT NULL default '',
  `useitem` tinyint(2) NOT NULL default '0',
  `description` text NOT NULL,
  `ispublish` tinyint(1) NOT NULL default '0',
  `mulselect` tinyint(1) NOT NULL default '0',
  `timelimit` tinyint(1) NOT NULL default '0',
  `needlogin` tinyint(1) NOT NULL default '0',
  `starttime` int(11) NOT NULL default '0',
  `endtime` int(11) NOT NULL default '0',
  PRIMARY KEY  (`voteid`),
  KEY `articleid` (`articleid`,`ispublish`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_avstat`
--

DROP TABLE IF EXISTS `jieqi_article_avstat`;
CREATE TABLE `jieqi_article_avstat` (
  `statid` int(11) unsigned NOT NULL auto_increment,
  `voteid` int(11) unsigned NOT NULL default '0',
  `statall` int(11) unsigned NOT NULL default '0',
  `stat1` int(11) unsigned NOT NULL default '0',
  `stat2` int(11) unsigned NOT NULL default '0',
  `stat3` int(11) unsigned NOT NULL default '0',
  `stat4` int(11) unsigned NOT NULL default '0',
  `stat5` int(11) unsigned NOT NULL default '0',
  `stat6` int(11) unsigned NOT NULL default '0',
  `stat7` int(11) unsigned NOT NULL default '0',
  `stat8` int(11) unsigned NOT NULL default '0',
  `stat9` int(11) unsigned NOT NULL default '0',
  `stat10` int(11) unsigned NOT NULL default '0',
  `canstat` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`statid`),
  KEY `voteid` (`voteid`,`canstat`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_bookcase`
--

DROP TABLE IF EXISTS `jieqi_article_bookcase`;
CREATE TABLE `jieqi_article_bookcase` (
  `caseid` int(11) unsigned NOT NULL auto_increment,
  `articleid` int(11) unsigned NOT NULL default '0',
  `articlename` varchar(50) binary NOT NULL default '',
  `classid` smallint(3) NOT NULL default '0',
  `userid` int(11) unsigned NOT NULL default '0',
  `username` varchar(30) binary NOT NULL default '',
  `chapterid` int(11) unsigned NOT NULL default '0',
  `chaptername` varchar(100) binary NOT NULL default '',
  `chapterorder` smallint(6) unsigned NOT NULL default '0',
  `joindate` int(11) unsigned NOT NULL default '0',
  `lastvisit` int(11) unsigned NOT NULL default '0',
  `flag` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`caseid`),
  KEY `articleid` (`articleid`),
  KEY `userid` (`userid`,`classid`),
  KEY `chapterid` (`chapterid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_chapter`
--

DROP TABLE IF EXISTS `jieqi_article_chapter`;
CREATE TABLE `jieqi_article_chapter` (
  `chapterid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `articleid` int(11) unsigned NOT NULL default '0',
  `articlename` varchar(50) binary NOT NULL default '',
  `volumeid` int(11) unsigned NOT NULL default '0',
  `posterid` int(11) unsigned NOT NULL default '0',
  `poster` varchar(30) binary NOT NULL default '',
  `postdate` int(11) unsigned NOT NULL default '0',
  `lastupdate` int(11) unsigned NOT NULL default '0',
  `chaptername` varchar(100) binary NOT NULL default '',
  `chapterorder` smallint(6) unsigned NOT NULL default '0',
  `size` int(11) unsigned NOT NULL default '0',
  `saleprice` int(11) unsigned NOT NULL default '0',
  `salenum` int(11) unsigned NOT NULL default '0',
  `totalcost` int(11) unsigned NOT NULL default '0',
  `attachment` text NOT NULL,
  `isvip` tinyint(1) unsigned NOT NULL default '0',
  `chaptertype` tinyint(1) unsigned NOT NULL default '0',
  `power` tinyint(1) unsigned NOT NULL default '0',
  `display` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`chapterid`),
  KEY `articleid` (`articleid`),
  KEY `volumeid` (`volumeid`),
  KEY `chapterorder` (`chapterorder`),
  KEY `display` (`display`),
  KEY `articlename` (`articlename`,`chaptername`),
  KEY `lastupdate` (`lastupdate`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_draft`
--

DROP TABLE IF EXISTS `jieqi_article_draft`;
CREATE TABLE `jieqi_article_draft` (
  `draftid` int(11) unsigned NOT NULL auto_increment,
  `articleid` int(11) unsigned NOT NULL default '0',
  `articlename` varchar(50) binary NOT NULL default '',
  `posterid` int(11) unsigned NOT NULL default '0',
  `poster` varchar(30) binary NOT NULL default '',
  `postdate` int(11) unsigned NOT NULL default '0',
  `lastupdate` int(11) unsigned NOT NULL default '0',
  `draftname` varchar(100) binary NOT NULL default '',
  `content` mediumtext NOT NULL,
  `size` int(11) unsigned NOT NULL default '0',
  `note` text NOT NULL,
  `drafttype` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`draftid`),
  KEY `articleid` (`articleid`),
  KEY `drafttype` (`drafttype`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_replies`
--

DROP TABLE IF EXISTS `jieqi_article_replies`;
CREATE TABLE `jieqi_article_replies` (
  `postid` int(10) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `topicid` int(10) unsigned NOT NULL default '0',
  `istopic` tinyint(1) NOT NULL default '0',
  `replypid` int(10) unsigned NOT NULL default '0',
  `ownerid` int(10) unsigned NOT NULL default '0',
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
-- 表的结构 `jieqi_article_review`
--

DROP TABLE IF EXISTS `jieqi_article_review`;
CREATE TABLE `jieqi_article_review` (
  `reviewid` int(11) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `postdate` int(11) unsigned NOT NULL default '0',
  `articleid` int(11) unsigned NOT NULL default '0',
  `articlename` varchar(50) binary NOT NULL default '',
  `userid` int(11) unsigned NOT NULL default '0',
  `username` varchar(30) binary NOT NULL default '',
  `reviewtitle` varchar(100) NOT NULL default '',
  `reviewtext` mediumtext NOT NULL,
  `topflag` tinyint(1) unsigned NOT NULL default '0',
  `goodflag` tinyint(1) unsigned NOT NULL default '0',
  `display` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`reviewid`),
  KEY `articleid` (`articleid`),
  KEY `userid` (`userid`),
  KEY `display` (`display`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_reviews`
--

DROP TABLE IF EXISTS `jieqi_article_reviews`;
CREATE TABLE `jieqi_article_reviews` (
  `topicid` mediumint(8) unsigned NOT NULL auto_increment,
  `siteid` smallint(6) unsigned NOT NULL default '0',
  `ownerid` int(10) unsigned NOT NULL default '0',
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
  KEY `posterid` (`posterid`,`replytime`),
  KEY `ownerid` (`ownerid`,`istop`,`replytime`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_searchcache`
--

DROP TABLE IF EXISTS `jieqi_article_searchcache`;
CREATE TABLE `jieqi_article_searchcache` (
  `cacheid` int(11) unsigned NOT NULL auto_increment,
  `searchtime` int(11) unsigned NOT NULL default '0',
  `hashid` varchar(32) NOT NULL default '0',
  `keywords` varchar(60) binary NOT NULL default '',
  `searchtype` tinyint(1) NOT NULL default '0',
  `results` int(11) unsigned NOT NULL default '0',
  `aids` text NOT NULL,
  PRIMARY KEY  (`cacheid`),
  UNIQUE KEY `hashid` (`hashid`)
) ENGINE=MyISAM;

-- --------------------------------------------------------

--
-- 表的结构 `jieqi_article_sort`
--

DROP TABLE IF EXISTS `jieqi_article_sort`;
CREATE TABLE `jieqi_article_sort` (
  `sortid` int(11) unsigned NOT NULL auto_increment,
  `layer` tinyint(3) unsigned NOT NULL default '0',
  `weight` smallint(6) unsigned NOT NULL default '0',
  `caption` varchar(50) NOT NULL default '',
  `shortname` varchar(20) NOT NULL default '',
  `description` text NOT NULL,
  `imgurl` varchar(100) NOT NULL default '',
  `authflag` tinyint(1) unsigned NOT NULL default '0',
  `authview` varchar(255) NOT NULL default '',
  `authread` varchar(255) NOT NULL default '',
  `authpost` varchar(255) NOT NULL default '',
  `authreply` varchar(255) NOT NULL default '',
  `authupload` varchar(255) NOT NULL default '',
  `authedit` varchar(255) NOT NULL default '',
  `authdelete` varchar(255) NOT NULL default '',
  `publish` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`sortid`),
  KEY `layer` (`layer`),
  KEY `weight` (`weight`),
  KEY `authflag` (`authflag`),
  KEY `publish` (`publish`)
) ENGINE=MyISAM;
