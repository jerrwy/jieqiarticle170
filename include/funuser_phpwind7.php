<?php 
/**
 * PHPWIND 7 通行证接口
 *
 * 基于 PHPWIND 7.3.2 测试
 * 
 * 调用模板：无
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funuser_phpwind7.php 317 2009-05-27 09:03:33Z juny $
 */

/*
PHPWIND 7 通行证接口，JIEQI CMS作为服务端，具体设置如下：

1、分别安装好JIEQI CMS和PHPWIND

2、进入PHPWIND后台，“插件中心”的“通行证”管理，做如下设置，并提交
   是否开启通行证        是
   通行证私有密钥        生成一个任意字符串
   将该网站做为通行证的  客户端
   服务器端设置          这里的 通行证兼容模式 和 需要同步登录的客户端地址 都默认，不要填
   通行证服务器地址      设置成你自己安装好JIEQI CMS的网址（最后不带斜杠），如 http://www.jieqi.com
   通行证登录地址        login.php
   通行证退出地址        logout.php?action=logout
   通行证注册地址        register.php
   选择需要同步的积分    都不选
   
3、在JIEQI CMS里面，编辑 /include/funuser_phpwind7.php
  把 PHPWIND_PASSPORT_KEY 对应的值改成PHPWIND里面设置的 “通行证私有密钥”
  把 PHPWIND_PASSPORT_URL 对应的值改成PHPWIND安装好的网址（最后不带斜杠）
  然后把本目录下的 funuser.php 备份（比如改名成funuser_default.php）
  再把 funuser_phpwind7.php 改名成 funuser.php 这样就启用了phpwind接口
*/


//通行证的私有密匙
define('PHPWIND_PASSPORT_KEY', '1234567890');
//phpwind地址，最后不带斜杠
define('PHPWIND_PASSPORT_URL', 'http://localhost/demo/bbs/phpwind7');



/**
 * 用户接口，注册预处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_uregister_iprepare(&$params){
	return true;
}

/**
 * 用户接口，注册处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_uregister_iprocess(&$params){
	//赋值
	$userdb['uid']		= $params['uid'];//用户编号
	$userdb['username']	= $params['username'];//用户名
	$userdb['password']	= md5($params['password']);//密码
	$userdb['email']	= $params['email'];//邮箱
	/*
	$userdb['rvrc']		= $params['rvrc'];//威望
	$userdb['money']	= $params['money'];//铜币
	$userdb['credit']	= $params['credit'];//贡献值
	$userdb['currency']	= $params['currency'];//银元
	*/
	$userdb['time']		= time();//时间
	$userdb['cktime']	= 'F';
	
	if(!empty($_REQUEST['forward'])) $params['jumpurl'] = $_REQUEST['forward'];

	//字符串化用户基本信息
	$userdb_encode='';
	foreach($userdb as $key=>$val){
		$userdb_encode .= $userdb_encode ? "&$key=$val" : "$key=$val";
	}
	//加密数据
	$userdb_encode=str_replace('=','',StrCode($userdb_encode));
	//加密字串
	$verify = md5('login'.$userdb_encode.$params['jumpurl'].PHPWIND_PASSPORT_KEY);
	header('Location: '.PHPWIND_PASSPORT_URL.'/passport_client.php?action=login&userdb='.rawurlencode($userdb_encode).'&forward='.rawurlencode($params['jumpurl']).'&verify='.rawurlencode($verify));

	return true;
}
//*****************************************************************
//*****************************************************************

/**
 * 用户接口，登录预处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_ulogin_iprepare(&$params){
	return true;
}

/**
 * 用户接口，登录处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_ulogin_iprocess(&$params){
	//赋值
	$userdb['uid']		= $_SESSION['jieqiUserId'];//用户编号
	$userdb['username']	= $_SESSION['jieqiUserUname'];//用户名
	$userdb['password']	= md5($params['password']);//密码
	$userdb['email']	= $_SESSION['jieqiUserEmail'];//邮箱
	/*
	$userdb['rvrc']		= $params['rvrc'];//威望
	$userdb['money']	= $params['money'];//铜币
	$userdb['credit']	= $params['credit'];//贡献值
	$userdb['currency']	= $params['currency'];//银元
	*/
	$userdb['time']		= time();//时间
	$userdb['cktime']	= 'F';
	
	if(!empty($_REQUEST['forward'])) $params['jumpurl'] = $_REQUEST['forward'];

	//字符串化用户基本信息
	$userdb_encode='';
	foreach($userdb as $key=>$val){
		$userdb_encode .= $userdb_encode ? "&$key=$val" : "$key=$val";
	}
	//加密数据
	$userdb_encode=str_replace('=','',StrCode($userdb_encode));
	//加密字串
	$verify = md5('login'.$userdb_encode.$params['jumpurl'].PHPWIND_PASSPORT_KEY);
	header('Location: '.PHPWIND_PASSPORT_URL.'/passport_client.php?action=login&userdb='.rawurlencode($userdb_encode).'&forward='.rawurlencode($params['jumpurl']).'&verify='.rawurlencode($verify));

	return true;
}

//*****************************************************************
//*****************************************************************

/**
 * 用户接口，退出预处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_ulogout_iprepare(&$params){
	return true;
}

/**
 * 用户接口，退出处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_ulogout_iprocess(&$params){
	//赋值
	$userdb['uid']		= $_SESSION['jieqiUserId'];//用户编号
	$userdb['username']	= $_SESSION['jieqiUserUname'];//用户名
	$userdb['password']	= '';//密码
	$userdb['email']	= $_SESSION['jieqiUserEmail'];//邮箱
	/*
	$userdb['rvrc']		= $params['rvrc'];//威望
	$userdb['money']	= $params['money'];//铜币
	$userdb['credit']	= $params['credit'];//贡献值
	$userdb['currency']	= $params['currency'];//银元
	*/
	$userdb['time']		= time();//时间
	$userdb['cktime']	= 'F';
	
	if(!empty($_REQUEST['forward'])) $params['jumpurl'] = $_REQUEST['forward'];

	//字符串化用户基本信息
	$userdb_encode='';
	foreach($userdb as $key=>$val){
		$userdb_encode .= $userdb_encode ? "&$key=$val" : "$key=$val";
	}
	//加密数据
	$userdb_encode=str_replace('=','',StrCode($userdb_encode));
	//加密字串
	$verify = md5('quit'.$userdb_encode.$params['jumpurl'].PHPWIND_PASSPORT_KEY);
	header('Location: '.PHPWIND_PASSPORT_URL.'/passport_client.php?action=quit&userdb='.rawurlencode($userdb_encode).'&forward='.rawurlencode($params['jumpurl']).'&verify='.rawurlencode($verify));

	return true;
}

//*****************************************************************
//*****************************************************************

/**
 * 用户接口，删除预处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_udelete_iprepare(&$params){
	return true;
}

/**
 * 用户接口，删除处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_udelete_iprocess(&$params){
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');
	if(defined('JIEQI_WAP_PAGE')) jieqi_wapgourl($params['jumpurl']);
	elseif($_REQUEST['jumphide']) header('Location: '.$params['jumpurl']);
	else jieqi_jumppage($params['jumpurl'], LANG_DO_SUCCESS, $jieqiLang['system']['delete_user_success']);
	return true;
}

//*****************************************************************
//*****************************************************************

/**
 * 用户接口，编辑预处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_uedit_iprepare(&$params){
	return true;
}

/**
 * 用户接口，编辑处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_uedit_iprocess(&$params){
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');
	$lang_success = empty($_REQUEST['lang_success']) ? $jieqiLang['system']['change_user_success'] : $_REQUEST['lang_success'];
	if(defined('JIEQI_WAP_PAGE')) jieqi_wapgourl($params['jumpurl']);
	elseif($_REQUEST['jumphide']) header('Location: '.$params['jumpurl']);
	else jieqi_jumppage($params['jumpurl'], LANG_DO_SUCCESS, $lang_success);
	return true;
}


//*****************************************************************
//*****************************************************************
/**
 * PHPWIND接口专用函数，用于字符串加密解密
 * 
 * @param      string       $string 原始字符串
 * @param      string       $action 动作 'ENCODE'-加密，'DECODE'-解密
 * @access     public
 * @return     string       返回加密或者解密后的字符串
 */
function StrCode($string,$action='ENCODE'){
	$action != 'ENCODE' && $string = base64_decode($string);
	$code = '';
	$key  = substr(md5($_SERVER['HTTP_USER_AGENT'].PHPWIND_PASSPORT_KEY),8,18);
	$keylen = strlen($key); $strlen = strlen($string);
	for ($i=0;$i<$strlen;$i++) {
		$k		= $i % $keylen;
		$code  .= $string[$i] ^ $key[$k];
	}
	return ($action!='DECODE' ? base64_encode($code) : $code);
}
?>