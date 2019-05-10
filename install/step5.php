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
@define('CURRENT_STEP', 5);
@define('JIEQI_IS_OPEN','1');
//COOKIE判断安装顺序
if(@is_array($_COOKIE['jieqi_step']))
if(!@in_array(CURRENT_STEP, $_COOKIE['jieqi_step'])){@header("Location: index.php");break;}
@setcookie('jieqi_step['.(CURRENT_STEP+1).']', CURRENT_STEP+1);
//包含文件
require_once('../global.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/lang/language.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/header.php');

$jieqiTpl->assign('step_title0', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_0_title']);
$jieqiTpl->assign('step_summary0', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_0_summary']);

$jieqiTpl->assign('step_title1', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_1_title']);
$jieqiTpl->assign('step_summary1', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_1_summary']);

$jieqiTpl->assign('step_title2', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_2_title']);
$jieqiTpl->assign('step_summary2', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_2_summary']);
$tmpvar=dirname(dirname($_SERVER['PHP_SELF']));
if($tmpvar == '/' || $tmpvar == '\\') $tmpvar='';
$jieqiTpl->assign('local_root', jieqi_gethost().$tmpvar);
$jieqiTpl->assign('next_page', 'step'.(CURRENT_STEP+1).'.php');
$jieqiTpl->assign('current_step', CURRENT_STEP);

//获取网站域名函数
function jieqi_gethost($isport=false){
	$scheme=(isset($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS'])!='off'))?'https://':'http://';
	if(!empty($_SERVER['HTTP_X_FORWARDED_HOST'])){
		$t=strpos($_SERVER['HTTP_X_FORWARDED_HOST'], ':');
		if($t>0){
			$host=substr($_SERVER['HTTP_X_FORWARDED_HOST'], 0, $t);
			$port=substr($_SERVER['HTTP_X_FORWARDED_HOST'], $t+1);
		}else{
			$host=$_SERVER['HTTP_X_FORWARDED_HOST'];
		}
	}else if(!empty($_SERVER['HTTP_HOST'])){
		$t=strpos($_SERVER['HTTP_HOST'], ':');
		if($t >0){
			$host=substr($_SERVER['HTTP_HOST'], 0, $t);
			$port=substr($_SERVER['HTTP_HOST'], $t+1);
		}else{
			$host=$_SERVER['HTTP_HOST'];
		}
	}else if(!empty($_SERVER['SERVER_NAME'])){
		$host = $_SERVER['SERVER_NAME'];
	}
	if(empty($port)){
		$port = $_SERVER['SERVER_PORT'];
	}
	if($isport){
		return $scheme.$host.':'.$port;
	}else{
		return $scheme.$host;
	}
}
$jieqiTpl->setCaching(0);
$jieqiTpl->assign('jieqi_content', $jieqiTpl->fetch(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/templates/step'.CURRENT_STEP.'.html'));

include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/footer.php');
?>