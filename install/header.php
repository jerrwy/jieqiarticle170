<?php
//  ------------------------------------------------------------------------ 
//                                杰奇网络                                     
//                    Copyright (c) 2008 jieqi.com                         
//                       <http://www.jieqi.com/>                           
//  ------------------------------------------------------------------------
//  设计：杰奇网络
//  邮箱: 377653@qq.com
//  ------------------------------------------------------------------------
//包含模板类

if(is_file(JIEQI_ROOT_PATH.'/configs/install.lock')) jieqi_printfail($jieqiLang['install']['locked']);

include_once(JIEQI_ROOT_PATH.'/lib/template/template.php');
$jieqiTpl=&JieqiTpl::getInstance();
$jieqiTpl->assign('jieqi_page_title', $jieqiLang[JIEQI_MODULE_NAME]['page_title']);
$jieqiTpl->assign('jieqi_page_head', $jieqiLang[JIEQI_MODULE_NAME]['page_head']);
$jieqiTpl->assign('step_menu0', $jieqiLang[JIEQI_MODULE_NAME]['step_nav0']);
$jieqiTpl->assign('step_menu1', $jieqiLang[JIEQI_MODULE_NAME]['step_nav1']);
$jieqiTpl->assign('step_menu2', $jieqiLang[JIEQI_MODULE_NAME]['step_nav2']);
$jieqiTpl->assign('step_menu3', $jieqiLang[JIEQI_MODULE_NAME]['step_nav3']);
$jieqiTpl->assign('step_menu4', $jieqiLang[JIEQI_MODULE_NAME]['step_nav4']);
$jieqiTpl->assign('step_menu5', $jieqiLang[JIEQI_MODULE_NAME]['step_nav5']);
$jieqiTpl->assign('step_menu6', $jieqiLang[JIEQI_MODULE_NAME]['step_nav6']);
$jieqiTpl->assign('step_menu7', $jieqiLang[JIEQI_MODULE_NAME]['step_nav7']);
$jieqiTpl->assign('step_menu8', $jieqiLang[JIEQI_MODULE_NAME]['step_nav8']);
$jieqiTpl->assign('jieqi_charset', JIEQI_CHAR_SET);
?>