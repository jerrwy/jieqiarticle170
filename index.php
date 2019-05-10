<?php
/**
 * 网站首页
 *
 * 默认首页是载入/configs/blocks.php里面配置的区块
 * 
 * 调用模板：无
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: index.php 344 2009-06-23 03:06:07Z juny $
 */

//定义本页面所属区块
define('JIEQI_MODULE_NAME', 'system');
require_once('global.php');

//包含区块参数
jieqi_getconfigs(JIEQI_MODULE_NAME, 'blocks', 'jieqiBlocks');

//包含页头页尾
include_once(JIEQI_ROOT_PATH.'/header.php');
$jieqiTpl->assign('jieqi_indexpage',1);  //设置首页标志，便于模板里面可以判断
$jieqiTset['jieqi_contents_template'] = '';  //内容位置不赋值，全部用区块
include_once(JIEQI_ROOT_PATH.'/footer.php');
?>