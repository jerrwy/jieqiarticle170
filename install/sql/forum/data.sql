-- 
-- �������е����� `jieqi_system_blocks`
-- 

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�����б�����', 'forum', 'block_topiclist', 'BlockForumTopiclist', 0, '��������', '&nbsp;&nbsp;&nbsp;&nbsp;�����������û��Զ���ģ��Ͳ��������Ҳ�ͬ�����ÿ��Ա���ɲ�ͬ�����顣<br>&nbsp;&nbsp;&nbsp;&nbsp;����Ĭ��ģ���ļ�Ϊ��block_topiclist.html������/modules/forum/templates/blocksĿ¼�£����������������ģ���ļ���Ҳ�����ڴ�Ŀ¼��ģ���ļ��������ձ�ʾʹ��Ĭ��ģ�塣<br>&nbsp;&nbsp;&nbsp;&nbsp;�������������ĸ���������ͬ����֮����Ӣ�Ķ��ŷָ���,����<br>&nbsp;&nbsp;&nbsp;&nbsp;����һ�����з�ʽ��Ĭ�ϰ�������£����������¼������ã�1����replytime�� - ��������£�2����topictime�� - �����ⷢ��ʱ�䣻3����topicviews�� - ���Ķ�������4����topicreplies�� - ���ظ�������<br>&nbsp;&nbsp;&nbsp;&nbsp;����������ʾ������ʹ��������Ĭ�� 10��<br>&nbsp;&nbsp;&nbsp;&nbsp;����������̳���Ĭ�� 0 ��ʾ������𣩣��˴�ʹ�õ�����̳�����Ŷ��������ƣ����硰���ѽ������������� 3 ����������ó� 3�����Ҫͬʱѡ������飬�����á�|���ָ������� 3|4|7<br>&nbsp;&nbsp;&nbsp;&nbsp;��������ָ��ʾ˳��Ĭ�� 0 ��ʾ���Ӵ�С���򣩣�1 ��ʾ��С��������<br>&nbsp;&nbsp;&nbsp;&nbsp;����������һ����߶������վ���ʾʹ��Ĭ��ֵ�����ӣ� ��replytime,20,0,0�� ��ʾ��ʾ20��������µ����ӡ�', '', 'replytime,10,0,0', 'block_topiclist.html', 0, 4, 40100, 0, 0, 0, 0, 1);

INSERT INTO `jieqi_system_blocks` (`bid`, `blockname`, `modname`, `filename`, `classname`, `side`, `title`, `description`, `content`, `vars`, `template`, `cachetime`, `contenttype`, `weight`, `showstatus`, `custom`, `canedit`, `publish`, `hasvars`) VALUES(0, '�����Ƽ�����', 'forum', 'block_topiccommend', 'BlockForumTopiccommend', 0, '�Ƽ�����', '&nbsp;&nbsp;&nbsp;&nbsp;��������ݲ��������ID��ʾ��Ӧ���Ƽ����⡣<br>&nbsp;&nbsp;&nbsp;&nbsp;������������һ�����������Ƽ�������ID������ID�����Ƕ���á�|���ָ����� 12|34|56', '', '', 'block_topiccommend.html', 0, 4, 41100, 0, 0, 0, 0, 2);

-- 
-- �������е����� `jieqi_system_configs`
-- 

INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'topicnum', 'ÿҳ��ʾ��������', '30', '', 0, 3, '', 10100, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'postnum', 'ÿҳ��ʾ�����ظ�', '10', '', 0, 3, '', 10200, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'quotelength', '�ظ�ʱ��������ó���', '200', '', 0, 3, '', 10300, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'searchtype', '����ƥ�䷽ʽ', '0', '', 0, 7, 'a:3:{i:0;s:8:"ģ��ƥ��";i:1;s:10:"��ģ��ƥ��";i:2;s:8:"����ƥ��";}', 10950, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'minsearchlen', '�����ؼ������ٳ���', '4', '', 0, 3, '', 11000, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'maxsearchres', '������������', '300', '', 0, 3, '', 11100, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'minsearchtime', '�����������ټ��ʱ��', '30', '', 0, 3, '', 11200, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'textwatermark', '����ˮӡ', '', 'ָ�����������Ķ�ҳ�棬��һЩ���֡�����<{$randtext}>�����滻��һ������ַ�', 0, 2, '', 11300, '��ʾ����');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'scoretopic', '�����������', '2', '', 0, 3, '', 20100, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'scorereply', '����ظ�����', '1', '', 0, 3, '', 20200, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'scoregoodtopic', '���⾫������', '5', '', 0, 3, '', 20300, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachdir', '��������Ŀ¼', 'attachment', '', 0, 1, '', 30100, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachurl', '���ʸ�����URL', '', '���������·���Ļ��˴����գ�����������url����󲻴�б��', 0, 1, '', 30120, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachtype', '�����ϴ��ĸ�������', 'gif jpg jpeg png bmp swf zip rar txt', '��������ÿո��', 0, 1, '', 30200, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'maxattachnum', 'һ�η�����฽����', '5', '��� 0 �ͱ�ʾ��ֹ�����ϴ�', 0, 3, '', 30300, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'maximagesize', 'ͼƬ�����������K', '1000', '', 0, 3, '', 30400, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'maxfilesize', '�ļ������������K', '1000', '', 0, 3, '', 30500, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachwater', 'ͼƬ�������ˮӡ��λ��', '0', '��������Ҫ GD ��֧�ֲ���ʹ�ã��� JPG/PNG/GIF ��ʽ���ϴ�ͼƬ��Ч', 0, 7, 'a:11:{i:0;s:8:"����ˮӡ";i:1;s:8:"��������";i:2;s:8:"��������";i:3;s:8:"��������";i:4;s:8:"�в�����";i:5;s:8:"�в�����";i:6;s:8:"�в�����";i:7;s:8:"�ײ�����";i:8;s:8:"�ײ�����";i:9;s:8:"�ײ�����";i:10;s:8:"���λ��";}', 36010, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachwimage', '����ˮӡͼƬ�ļ�', 'watermark.gif', '���� JPG/PNG/GIF ��ʽ��Ĭ��ֻ�����ļ��������� modules/article/images Ŀ¼��', 0, 1, '', 36020, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachwtrans', 'ˮӡͼƬ��ԭͼƬ���ں϶�', '30', '��ΧΪ 1��100 ����������ֵԽ��ˮӡͼƬ͸����Խ�͡�', 0, 3, '', 36030, '��������');
INSERT INTO `jieqi_system_configs` (`cid`, `modname`, `cname`, `ctitle`, `cvalue`, `cdescription`, `cdefine`, `ctype`, `options`, `catorder`, `catname`) VALUES(0, 'forum', 'attachwquality', 'jpegͼƬ����', '90', '��ΧΪ 0��100 ����������ֵԽ����ͼƬЧ��Խ�ã����ߴ�ҲԽ��', 0, 3, '', 36040, '��������');


-- 
-- �������е����� `jieqi_system_modules`
-- 

INSERT INTO `jieqi_system_modules` (`mid`, `name`, `caption`, `description`, `version`, `lastupdate`, `weight`, `publish`, `modtype`) VALUES (0, 'forum', '������̳', '�뱾վ��ϵ���̳', 170, 0, 0, 1, 0);

-- 
-- �������е����� `jieqi_system_power`
-- 

INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES(0, 'forum', 'adminconfig', '�����������', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES(0, 'forum', 'adminpower', '����Ȩ������', '', '');
INSERT INTO `jieqi_system_power` (`pid`, `modname`, `pname`, `ptitle`, `pdescription`, `pgroups`) VALUES(0, 'forum', 'manageforum', '������̳', '', '');

-- Ĭ����̳���
INSERT INTO `jieqi_forum_forumcat` (`catid`, `cattitle`, `catorder`) VALUES (1, 'Ĭ�Ϸ���', 1);
INSERT INTO `jieqi_forum_forums` (`forumid`, `catid`, `forumname`, `forumdesc`, `forumstatus`, `forumorder`, `forumtype`, `forumtopics`, `forumposts`, `forumlastinfo`, `authview`, `authread`, `authpost`, `authreply`, `authupload`, `authedit`, `authdelete`, `master`) VALUES (1, 1, 'Ĭ�ϰ��', 'Ĭ�ϵ���̳��飬��Ҫ������ɵ���̨��̳�����������', 0, 1, 0, 0, 0, '', '', '', '', '', '', '', '', '');