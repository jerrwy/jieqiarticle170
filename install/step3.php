<?php
//  ------------------------------------------------------------------------ 
//                                ��������                                     
//                    Copyright (c) 2008 jieqi.com                         
//                       <http://www.jieqi.com/>                           
//  ------------------------------------------------------------------------
//  ��ƣ���������
//  ����: 377653@qq.com
//  ------------------------------------------------------------------------
@define('JIEQI_MODULE_NAME', 'install');
@define('CURRENT_STEP', 3);
@define('JIEQI_IS_OPEN','1');
//COOKIE�жϰ�װ˳��
if(@is_array($_COOKIE['jieqi_step']))
if(!@in_array(CURRENT_STEP, $_COOKIE['jieqi_step'])){@header("Location: index.php");break;}
@setcookie('jieqi_step['.(CURRENT_STEP+1).']', CURRENT_STEP+1);
//�����ļ�
require_once('../global.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/lang/language.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/header.php');

$jieqiTpl->assign('step_title', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_title']);
$jieqiTpl->assign('step_summary', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_summary']);
$jieqiTpl->assign('next_page', 'step'.(CURRENT_STEP+1).'.php');
$jieqiTpl->assign('current_step', CURRENT_STEP);
//�����������
$sysinfo=array();
//php�汾 PHP_VERSION
if(floatval(PHP_VERSION)<4.3){$state=0;}else{$state=1;}
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_php_version'], 
	'value'=>PHP_VERSION, 
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_php_version_suggest'], 
	'status'=>$state
);
//����ϵͳ PHP_OS
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_php_os'], 
	'value'=>PHP_OS, 
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_php_os_suggest'], 
	'status'=>1
);
//�������汾 $_SERVER['SERVER_SOFTWARE']
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_server_software'], 
	'value'=>$_SERVER['SERVER_SOFTWARE'], 
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_server_software_suggest'], 
	'status'=>1
);
//MySQL ���ݿ� function_exists("mysql_close")
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_mysql_support'],
	'value'=>function_exists("mysql_close")?'YES':'NO',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_mysql_support_suggest'],
	'status'=>function_exists("mysql_close")?1:0
);
//�Զ���ȫ�ֱ��� get_cfg_var("register_globals")
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_register_globals'],
	'value'=>get_cfg_var('register_globals')?'ON':'OFF',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_register_globals_suggest'],
	'status'=>get_cfg_var('register_globals')?2:1
);
//ħ�����ã����Ƽ���get_cfg_var('magic_quotes_gpc');
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_magic_quotes'],
	'value'=>get_cfg_var('magic_quotes_gpc')?'ON':'OFF',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_magic_quotes_suggest'],
	'status'=>1
);
//��ʾ������Ϣ get_cfg_var("display_errors")
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_display_errors'],
	'value'=>get_cfg_var("display_errors")?'ON':'OFF',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_display_errors_suggest'],
	'status'=>get_cfg_var("display_errors")?2:1
);
//ͼ������ function_exists("imageline")
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_gd_support'],
	'value'=>function_exists("gd_info")?'YES':'NO',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_gd_support_suggest'],
	'status'=>function_exists("gd_info")?1:2
);
//XML�﷨������ function_exists('xml_parser_set_option');
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_xml_parser'],
	'value'=>function_exists('xml_parser_set_option')?'YES':'NO',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_xml_parser_suggest'],
	'status'=>function_exists('xml_parser_set_option')?1:0
);
//ѹ���ļ�������(Zlib) function_exists("gzclose")
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_zlib_support'],
	'value'=>function_exists("gzclose")?'YES':'NO',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_zlib_support_suggest'],
	'status'=>function_exists("gzclose")?1:0
);
//Session֧�� function_exists("session_start")
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_session_support'],
	'value'=>function_exists("session_start")?'YES':'NO',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_session_support_suggest'],
	'status'=>function_exists("session_start")?1:0
);
//Socket֧�� function_exists("fsockopen")
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_socket_support'],
	'value'=>function_exists("fsockopen")?'YES':'NO',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_socket_support_suggest'],
	'status'=>function_exists("fsockopen")?1:0
);
//������ʽ������ function_exists("preg_match")
$sysinfo[]=array(
	'name'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_preg_support'],
	'value'=>function_exists("preg_match")?'YES':'NO',
	'advice'=>$jieqiLang[JIEQI_MODULE_NAME]['sys_preg_support_suggest'],
	'status'=>function_exists("preg_match")?1:0
);
//�жϼ��״̬,�Ƿ�������һ��
$check_status=0;
for($i=0;$i<count($sysinfo);$i++){
	if($sysinfo[$i]['status']==0){
		$check_status=0;
		break;
	}
	$check_status=1;
}
$jieqiTpl->assign('check_status', $check_status);
$jieqiTpl->assign('sysinfo_list', $sysinfo);
$jieqiTpl->setCaching(0);
$jieqiTpl->assign('jieqi_content', $jieqiTpl->fetch(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/templates/step'.CURRENT_STEP.'.html'));

include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/footer.php');
?>