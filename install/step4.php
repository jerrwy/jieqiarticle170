<?php
//  ------------------------------------------------------------------------ 
//                                杰奇网络                                     
//                    Copyright (c) 2008 jieqi.com                         
//                       <http://www.jieqi.com/>                           
//  ------------------------------------------------------------------------
//  设计：杰奇网络
//  邮箱: 377653@qq.com
//  ------------------------------------------------------------------------
@define('JIEQI_MODULE_NAME', 'install');
@define('CURRENT_STEP', 4);
@define('JIEQI_IS_OPEN','1');
//COOKIE判断安装顺序
if(@is_array($_COOKIE['jieqi_step']))
if(!@in_array(CURRENT_STEP, $_COOKIE['jieqi_step'])){@header("Location: index.php");break;}
@setcookie('jieqi_step['.(CURRENT_STEP+1).']', CURRENT_STEP+1);
//包含文件
require_once('../global.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/lang/language.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/header.php');

$jieqiTpl->assign('step_title', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_title']);
$jieqiTpl->assign('step_summary', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_summary']);
$jieqiTpl->assign('next_page', 'step'.(CURRENT_STEP+1).'.php');
$jieqiTpl->assign('current_step', CURRENT_STEP);
//定义目录数组
$filepath=array();
//定义需要设置权限的目录(可依次添加)
//$filepath[]=array('path'=>JIEQI_ROOT_PATH.'/blockcache/', 'status'=>0);
$filepath[]=array('path'=>JIEQI_ROOT_PATH.'/cache/', 'status'=>0);
$filepath[]=array('path'=>JIEQI_ROOT_PATH.'/configs/', 'status'=>0);
$filepath[]=array('path'=>JIEQI_ROOT_PATH.'/compiled/', 'status'=>0);
$filepath[]=array('path'=>JIEQI_ROOT_PATH.'/files/', 'status'=>0);
//判断权限分配并标记
if(is_array($filepath) && count($filepath)>0){
	for($i=0;$i<count($filepath);$i++){
		if(is_dir($filepath[$i]['path']) && is_writable($filepath[$i]['path'])) $filepath[$i]['status']=1;
		else $filepath[$i]['status']=0;
		$filepath[$i]['path']=substr($filepath[$i]['path'], strlen(JIEQI_ROOT_PATH));
	}
}
//判断检测状态,是否允许下一步
$check_status=0;
for($i=0;$i<count($filepath);$i++){
	if($filepath[$i]['status']==0){
		$check_status=0;
		break;
	}
	$check_status=1;
}
//赋值数组到模板
$jieqiTpl->assign('check_status', $check_status);
$jieqiTpl->assign('path_list', $filepath);
$jieqiTpl->setCaching(0);
$jieqiTpl->assign('jieqi_content', $jieqiTpl->fetch(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/templates/step'.CURRENT_STEP.'.html'));

include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/footer.php');
?>