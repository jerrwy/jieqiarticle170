-- 
-- 导出表中的数据 `jieqi_system_blocks`
-- 

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '帖子列表区块', 'forum', 'block_topiclist', 'BlockForumTopiclist', 0, '最新帖子', '&nbsp;&nbsp;&nbsp;&nbsp;本区块允许用户自定义模板和参数，并且不同的设置可以保存成不同的区块。<br>&nbsp;&nbsp;&nbsp;&nbsp;区块默认模板文件为“block_topiclist.html”，在/modules/forum/templates/blocks目录下，如果您定义了另外模板文件，也必须在此目录。模板文件设置留空表示使用默认模板。<br>&nbsp;&nbsp;&nbsp;&nbsp;区块允许设置四个参数，不同参数之间用英文逗号分隔“,”。<br>&nbsp;&nbsp;&nbsp;&nbsp;参数一是排行方式（默认按最近更新），允许以下几种设置：1、“replytime” - 按最近更新；2、“topictime” - 按主题发表时间；3、“topicviews” - 按阅读次数；4、“topicreplies” - 按回复次数；<br>&nbsp;&nbsp;&nbsp;&nbsp;参数二是显示行数，使用整数（默认 10）<br>&nbsp;&nbsp;&nbsp;&nbsp;参数三是论坛类别（默认 0 表示所有类别），此处使用得是论坛板块序号而不是名称，比如“网友交流”版块序号是 3 ，这里就设置成 3，如果要同时选择多个版块，可以用“|”分隔，比如 3|4|7<br>&nbsp;&nbsp;&nbsp;&nbsp;参数四是指显示顺序（默认 0 表示按从大到小排序），1 表示从小到大排序。<br>&nbsp;&nbsp;&nbsp;&nbsp;参数设置中一项或者多项留空均表示使用默认值。例子： “replytime,20,0,0” 表示显示20条最近更新的帖子。', '', 'replytime,10,0,0', 'block_topiclist.html', 0, 4, 40100, 0, 0, 0, 0, 1);

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '帖子推荐区块', 'forum', 'block_topiccommend', 'BlockForumTopiccommend', 0, '推荐帖子', '&nbsp;&nbsp;&nbsp;&nbsp;本区块根据参数里面的ID显示对应的推荐主题。<br>&nbsp;&nbsp;&nbsp;&nbsp;区块允许设置一个参数，即推荐的主题ID。不过ID可以是多个用“|”分隔，如 12|34|56', '', '', 'block_topiccommend.html', 0, 4, 41100, 0, 0, 0, 0, 2);

-- 
-- 导出表中的数据 `jieqi_system_configs`
-- 

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'topicnum', '每页显示几个主题', '30', '', 0, 3, '', 10100, '显示控制');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'postnum', '每页显示几个回复', '10', '', 0, 3, '', 10200, '显示控制');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'quotelength', '回复时的最大引用长度', '200', '', 0, 3, '', 10300, '显示控制');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'searchtype', '搜索匹配方式', '0', '', 0, 7, 'a:3:{i:0;s:8:"模糊匹配";i:1;s:10:"半模糊匹配";i:2;s:8:"完整匹配";}', 10950, '显示控制');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'minsearchlen', '搜索关键字最少长度', '4', '', 0, 3, '', 11000, '显示控制');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'maxsearchres', '最大搜索结果数', '300', '', 0, 3, '', 11100, '显示控制');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'minsearchtime', '两次搜索最少间隔时间', '30', '', 0, 3, '', 11200, '显示控制');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'textwatermark', '文字水印', '', '指的是隐藏在阅读页面，的一些文字。其中<{$randtext}>将被替换成一组随机字符', 0, 2, '', 11300, '显示控制');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'scoretopic', '发表主题积分', '2', '', 0, 3, '', 20100, '积分设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'scorereply', '发表回复积分', '1', '', 0, 3, '', 20200, '积分设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'scoregoodtopic', '主题精华积分', '5', '', 0, 3, '', 20300, '积分设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachdir', '附件保存目录', 'attachment', '', 0, 1, '', 30100, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachurl', '访问附件的URL', '', '附件用相对路径的话此处留空，否则用完整url，最后不带斜杠', 0, 1, '', 30120, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachtype', '允许上传的附件类型', 'gif jpg jpeg png bmp swf zip rar txt', '多个附件用空格格开', 0, 1, '', 30200, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'maxattachnum', '一次发帖最多附件数', '5', '设成 0 就表示禁止附件上传', 0, 3, '', 30300, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'maximagesize', '图片附件最大允许几K', '1000', '', 0, 3, '', 30400, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'maxfilesize', '文件附件最大允许几K', '1000', '', 0, 3, '', 30500, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachwater', '图片附件添加水印及位置', '0', '本功能需要 GD 库支持才能使用，对 JPG/PNG/GIF 格式的上传图片有效', 0, 7, 'a:11:{i:0;s:8:"不加水印";i:1;s:8:"顶部居左";i:2;s:8:"顶部居中";i:3;s:8:"顶部居右";i:4;s:8:"中部居左";i:5;s:8:"中部居中";i:6;s:8:"中部居右";i:7;s:8:"底部居左";i:8;s:8:"底部居中";i:9;s:8:"底部居右";i:10;s:8:"随机位置";}', 36010, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachwimage', '附件水印图片文件', 'watermark.gif', '允许 JPG/PNG/GIF 格式，默认只需填文件名，放在 modules/article/images 目录下', 0, 1, '', 36020, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachwtrans', '水印图片与原图片的融合度', '30', '范围为 1～100 的整数，数值越大水印图片透明度越低。', 0, 3, '', 36030, '附件设置');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachwquality', 'jpeg图片质量', '90', '范围为 0～100 的整数，数值越大结果图片效果越好，但尺寸也越大。', 0, 3, '', 36040, '附件设置');


-- 
-- 导出表中的数据 `jieqi_system_modules`
-- 

INSERT INTO `jieqi_system_modules` (`mid`, `name`, `caption`, `description`, `version`, `lastupdate`, `weight`, `publish`, `modtype`) VALUES (0, 'forum', '交流论坛', '与本站结合的论坛', 170, 0, 0, 1, 0);

-- 
-- 导出表中的数据 `jieqi_system_power`
-- 

INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES(0, 'forum', 'adminconfig', '管理参数设置', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES(0, 'forum', 'adminpower', '管理权限设置', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES(0, 'forum', 'manageforum', '管理论坛', '', '');

-- 默认论坛版块
INSERT INTO `jieqi_forum_forumcat` (`catid`, `cattitle`, `catorder`) VALUES (1, '默认分类', 1);
INSERT INTO `jieqi_forum_forums` (`forumid`, `catid`, `forumname`, `forumdesc`, `forumstatus`, `forumorder`, `forumtype`, `forumtopics`, `forumposts`, `forumlastinfo`, `authview`, `authread`, `authpost`, `authreply`, `authupload`, `authedit`, `authdelete`, `master`) VALUES (1, 1, '默认版块', '默认的论坛版块，需要更多版块可到后台论坛管理里面调整', 0, 1, 0, 0, 0, '', '', '', '', '', '', '', '', '');