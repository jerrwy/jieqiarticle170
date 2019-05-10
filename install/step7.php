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
@define('CURRENT_STEP', 7);
@define('JIEQI_IS_OPEN','1');
//COOKIE判断安装顺序
if(@is_array($_COOKIE['jieqi_step']))
if(!@in_array(CURRENT_STEP, $_COOKIE['jieqi_step']) && !@in_array(0, $_COOKIE['jieqi_step'])){@header("Location: index.php");break;}
@setcookie('jieqi_step['.(CURRENT_STEP+1).']', CURRENT_STEP+1);
//包含文件
require_once('../global.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/lang/language.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/header.php');

$jieqiTpl->assign('step_title', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_title']);
$jieqiTpl->assign('step_summary', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_summary']);
$jieqiTpl->assign('next_page', 'step'.(CURRENT_STEP+1).'.php');
$jieqiTpl->assign('current_step', CURRENT_STEP);

//检查已安装模块
//包含数据库类
jieqi_includedb();
$inmodules=array();
$db_query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
$res=$db_query->execute("SHOW TABLES LIKE '".jieqi_dbprefix('system_modules')."'");
if($db_query->getRow($res)){
	$res=$db_query->execute('SELECT * FROM '.jieqi_dbprefix('system_modules'));
	$inmodules=array();
	if($res){
		$inmodules[] = 'system';
		while($row = $db_query->getRow($res)) $inmodules[] = $row['name'];
	}
}
//检测安装文件
$i=0;
$sql_dir='sql';
$mod_array=array();
$jieqiDir=dir($sql_dir);
while($mod_dir=$jieqiDir->read()){
	if((is_dir($sql_dir.'/'.$mod_dir)) && ($mod_dir!==".") && ($mod_dir!=="..")){
		
		if(file_exists($sql_dir.'/'.$mod_dir.'/modinfo.php')){
			include_once($sql_dir.'/'.$mod_dir.'/modinfo.php');
			if(isset($jieqiModinfo[$mod_dir])) $mod_array[$i] = $jieqiModinfo[$mod_dir];
		}else{
			$mod_array[$i] = array('name'=>$mod_dir, 'caption'=>'', 'description'=>'');
		}
		if(in_array(strtolower($mod_dir), $inmodules)) $mod_array[$i]['status']=3;
		elseif(strtolower($mod_dir) == 'system') $mod_array[$i]['status']=2;
		elseif(file_exists($sql_dir.'/'.$mod_dir.'/struct.sql')) $mod_array[$i]['status']=1;
		else $mod_array[$i]['status']=0;
	}
	$i++;
}
$mod_list=array();
foreach($mod_array as $v){
	if(strtolower($v['name']) == 'system'){
		$mod_list[]=$v;
	}
}
foreach($mod_array as $v){
	if(strtolower($v['name']) != 'system') $mod_list[]=$v;
}
$jieqiTpl->assign('mod_list', $mod_list);
$jieqiTpl->setCaching(0);
$jieqiTpl->assign('jieqi_content', $jieqiTpl->fetch(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/templates/step'.CURRENT_STEP.'.html'));

include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/footer.php');
?>