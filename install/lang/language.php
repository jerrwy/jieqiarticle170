<?php
//common
$jieqiLang['install']['page_title']='杰奇网站管理系统安装程序';
$jieqiLang['install']['page_head']='欢迎使用杰奇网站管理系统安装程序';
$jieqiLang['install']['step_nav0']='欢迎使用';
$jieqiLang['install']['step_nav1']='选择安装语言';
$jieqiLang['install']['step_nav2']='安装协议';
$jieqiLang['install']['step_nav3']='检测系统环境';
$jieqiLang['install']['step_nav4']='检测读写权限';
$jieqiLang['install']['step_nav5']='写入配置参数';
$jieqiLang['install']['step_nav6']='检测数据库连接';
$jieqiLang['install']['step_nav7']='选择安装模块';
$jieqiLang['install']['step_nav8']='开始安装程序';
$jieqiLang['install']['locked']='程序已经安装，如果您需要重新安装，请删除 /configs/install.lock 文件，再访问本页面！';
//step0
$jieqiLang['install']['step0_title']='选择安装方式';
$jieqiLang['install']['step0_summary']='安装方式分两种：1、全新安装；2、模块安装。';
$jieqiLang['install']['step0_content']='<b>－欢迎使用杰奇网站管理系统(JIEQI CMS)－</b><br /><br />程序包里面system目录里面是系统框架程序，mod_xxx目录里面是各个模块的程序（这里 xxx 表示模块英文标记）。<br /><br />安装前先把系统框架和您需要的模块程序传到网站根目录下。（注：是把system和mod_xxx里面的内容上传，而不是整个目录名上传）<br /><br />如果系统已经存在，需要安装新的模块，则上传本模块目录下文件即可。<br /><br />例如：要安装小说连载模块（article），正确的文件存放目录结构如下：<br /><br />/files/article/*.*<br />/configs/article/*.*<br />/modules/article/*.*<br />/install/sql/article/struct.sql<br />/install/sql/article/data.sql';
//step1
$jieqiLang['install']['step1_title']='选择安装语言';
$jieqiLang['install']['step1_summary']='选择当前安装程序使用的默认语言。';
$jieqiLang['install']['step1_content']='';
//step2
$jieqiLang['install']['step2_title']='安装协议';
$jieqiLang['install']['step2_summary']='请仔细阅读下述安装协议，要继续安装必须同意以下协议条款。';
//step3
$jieqiLang['install']['step3_title']='检测系统环境';
$jieqiLang['install']['step3_summary']='检测系统目前环境变量设置，并指引您优化您的系统配置。';
$jieqiLang['install']['sys_php_version']='PHP版本';
$jieqiLang['install']['sys_php_version_suggest']='>=4.3.0';
$jieqiLang['install']['sys_php_os']='操作系统';
$jieqiLang['install']['sys_php_os_suggest']='Windows/Linux';
$jieqiLang['install']['sys_server_software']='服务器软件';
$jieqiLang['install']['sys_server_software_suggest']='Apache/IIS';
$jieqiLang['install']['sys_mysql_support']='支持Mysql';
$jieqiLang['install']['sys_mysql_support_suggest']='必须支持';
$jieqiLang['install']['sys_register_globals']='开启全局变量';
$jieqiLang['install']['sys_register_globals_suggest']='建议关闭';
$jieqiLang['install']['sys_magic_quotes']='开启魔术引用';
$jieqiLang['install']['sys_magic_quotes_suggest']='默认设置';
$jieqiLang['install']['sys_display_errors']='显示错误消息';
$jieqiLang['install']['sys_display_errors_suggest']='建议关闭';
$jieqiLang['install']['sys_gd_support']='支持GD函数库';
$jieqiLang['install']['sys_gd_support_suggest']='建议支持';
$jieqiLang['install']['sys_xml_parser']='支持XML语法解析';
$jieqiLang['install']['sys_xml_parser_suggest']='必须支持';
$jieqiLang['install']['sys_zlib_support']='支持Zlib函数库';
$jieqiLang['install']['sys_zlib_support_suggest']='必须支持';
$jieqiLang['install']['sys_session_support']='支持Session';
$jieqiLang['install']['sys_session_support_suggest']='必须支持';
$jieqiLang['install']['sys_socket_support']='支持Socket';
$jieqiLang['install']['sys_socket_support_suggest']='必须支持';
$jieqiLang['install']['sys_preg_support']='正则表达式函数库';
$jieqiLang['install']['sys_preg_support_suggest']='必须支持';
//step4
$jieqiLang['install']['step4_title']='检测读写权限';
$jieqiLang['install']['step4_summary']='检测系统安装所必须的文件目录读写权限是否符合要求，如果权限不够，可能影响您的正常使用，请立即设置相关权限。[如: 通过FTP软件更改文件属性(CHMOD)为0777]';
//step5
$jieqiLang['install']['step5_0_title']='配置网站根目录';
$jieqiLang['install']['step5_0_summary']='配置网站程序的URL路径，请输入存储程序的根目录，通常是您网站的域名，例如：http://www.jieqi.com，注意末尾不要“/”。';
$jieqiLang['install']['step5_1_title']='配置Mysql连接参数';
$jieqiLang['install']['step5_1_summary']='输入Mysql的连接参数，以创建数据库并建立数据库、数据表。';
$jieqiLang['install']['step5_2_title']='配置管理员账号';
$jieqiLang['install']['step5_2_summary']='配置系通管理员的账号信息，该账号拥有最高管理权限，全部留空将采用默认账号(admin)密码(admin)。';
//step6
$jieqiLang['install']['step6_title']='检测数据库参数';
$jieqiLang['install']['step6_summary']='根据设置的链接参数判断是否正常连接到Mysql主机，并写入配置文件。';

$jieqiLang['install']['dbname_not_exists']='数据库 %s 不存在！';
$jieqiLang['install']['error_name_format']='数据库名称格式错误！';
$jieqiLang['install']['drop_db_error']='删除原数据库失败！';
$jieqiLang['install']['create_db_error']='创建新数据库失败！';
$jieqiLang['install']['write_file_error']='写入配置文件失败！';
$jieqiLang['install']['need_user_name']='请输入系统管理员账号！';
$jieqiLang['install']['error_user_format']='系统管理员账号格式错误！';
$jieqiLang['install']['username_need_engnum']='账号名称不允许使用汉字！';
$jieqiLang['install']['need_pass_word']='请输入管理员密码！';
$jieqiLang['install']['pass_not_equal']='两次输入的密码不一致！';
$jieqiLang['install']['need_email']='Email不能为空！';
$jieqiLang['install']['error_email_format']='Email格式错误！';
$jieqiLang['install']['mysql_connect_success']='Mysql数据库主机连接成功！<br />配置文件写入成功！';
$jieqiLang['install']['mysql_connect_failure']='Mysql数据库主机连接失败！请重新设置。';
//step7
$jieqiLang['install']['step7_title']='选择安装模块';
$jieqiLang['install']['step7_summary']='选择您需要安装的模块名称。';
//step8
$jieqiLang['install']['step8_title']='开始安装程序';
$jieqiLang['install']['step8_summary']='设置完成，现在开始安装程序。。。';
$jieqiLang['install']['delete_table_error']='清空原账号数据失败！';
$jieqiLang['install']['insert_table_error']='插入新账号数据失败！';
$jieqiLang['install']['print_sql_error']='SQL执行失败：<br />SQL语句：%s<br />错误提示：%s';
$jieqiLang['install']['show_error_format']='<hr />SQL语句：%s<br />错误提示：%s';
$jieqiLang['install']['sql_some_error']='SQL执行完成，其中有错误提示如下：<br />%s';
$jieqiLang['install']['execute_sql_success']='恭喜您，网站安装成功，请登录后台进行详细的配置！<br /><br />安装好之后请务必删除 /install 目录，以避免重复安装导致数据被清空。';
?>