<?php 
/**
 * ucenter1.5接口-用户注册、登录、退出处理
 *
 * 使用ucenter接口时候，把本文件改成 funuser.php
 * 配置好 /uc_client/config.inc.php 中的参数
 * 
 * 调用模板：无
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funuser_ucenter.php 344 2009-06-23 03:06:07Z juny $
 */

include_once(JIEQI_ROOT_PATH.'/uc_client/config.inc.php');
include_once(JIEQI_ROOT_PATH.'/uc_client/client.php');

/**
 * 用户接口，注册预处理
 * 
 * @param      array       $params 参数数组
 * 必须参数： $params['username'] - 用户名,$params['password'] - 密码,$params['email'] - 邮箱
 * @access     public
 * @return     int    
 */
function jieqi_uregister_iprepare(&$params){
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');

	$params['uc_uid'] = uc_user_register($params['username'], $params['password'], $params['email']);
	/*
	-1 用户名不合法, -2 包含要允许注册的词语, -3 用户名已经存在, -4 Email 格式有误, -5 Email 不允许注册, -6 该 Email 已经被注册
	*/
	if($params['uc_uid'] > 0){
		return true;
	}else{
		switch($params['uc_uid']){
			case -1:
				$params['error'] = $jieqiLang['system']['error_user_format'];
				break;
			case -2:
				$params['error'] = $jieqiLang['system']['error_user_format'];
				break;
			case -3:
				$params['error'] = $jieqiLang['system']['error_user_format'];
				break;
			case -4:
				$params['error'] = $jieqiLang['system']['error_email_format'];
				break;
			case -5:
				$params['error'] = $jieqiLang['system']['email_has_registered'];
				break;
			case -6:
				$params['error'] = $jieqiLang['system']['email_has_registered'];
				break;
			default:
				$params['error'] = $jieqiLang['system']['register_failure'];
				break;
		}
		if($params['return']) return false;
		else jieqi_printfail($params['error']);
	}
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
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');

	if($params['uc_uid'] > 0) $ucsyncode = uc_user_synlogin($params['uc_uid']);
	else $ucsyncode = '';

	if(defined('JIEQI_WAP_PAGE')) jieqi_wapgourl($params['jumpurl']);
	elseif($_REQUEST['jumphide']) jieqi_jumppage($params['jumpurl'], '', $ucsyncode, true);
	else jieqi_jumppage($params['jumpurl'], $jieqiLang['system']['registered_title'], $jieqiLang['system']['register_success'].$ucsyncode);
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
	global $jieqiLang;
	global $jieqiConfigs;

	//通过接口判断登录帐号的正确性，返回值为数组
	list($uid, $username, $password, $email) = uc_user_login($params['username'], $params['password']);
	//uid 大于 0:返回用户 ID，表示用户登录成功 -1:用户不存在，或者被删除 -2:密码错 -3:安全提问错
	$params['uc_uid'] = $uid;

	//如果uc登录成功，jieqi这个用户不存在，在jieqi自动注册
	if($params['uc_uid'] > 0){
		$params['email'] = $email;
		include_once(JIEQI_ROOT_PATH.'/class/users.php');
		$users_handler =& JieqiUsersHandler::getInstance('JieqiUsersHandler');
		$user = $users_handler->getByname($params['username'], 3);
		if($user == false){
			if(!isset($jieqiConfigs['system'])) jieqi_getconfigs('system', 'configs');
			include_once(JIEQI_ROOT_PATH.'/lib/text/textfunction.php');
			$newUser = $users_handler->create();
			$newUser->setVar('siteid', JIEQI_SITE_ID);
			$newUser->setVar('uname', $params['username']);
			$newUser->setVar('name', $params['username']);
			$newUser->setVar('pass', $users_handler->encryptPass($params['password']));
			$newUser->setVar('groupid', JIEQI_GROUP_USER);
			$newUser->setVar('regdate', JIEQI_NOW_TIME);
			$newUser->setVar('initial', jieqi_getinitial($params['username']));
			$newUser->setVar('sex', 0);
			$newUser->setVar('email', $params['email']);
			$newUser->setVar('url', '');
			$newUser->setVar('avatar', 0);
			$newUser->setVar('workid', 0);
			$newUser->setVar('qq', '');
			$newUser->setVar('icq', '');
			$newUser->setVar('msn', '');
			$newUser->setVar('mobile', '');
			$newUser->setVar('sign', '');
			$newUser->setVar('intro', '');
			$newUser->setVar('setting', '');
			$newUser->setVar('badges', '');
			$newUser->setVar('lastlogin', JIEQI_NOW_TIME);
			$newUser->setVar('showsign', 0);
			$newUser->setVar('viewemail', 0);
			$newUser->setVar('notifymode', 0);
			$newUser->setVar('adminemail', 0);
			$newUser->setVar('monthscore', 0);
			$newUser->setVar('experience', intval($jieqiConfigs['system']['scoreregister']));
			$newUser->setVar('score', intval($jieqiConfigs['system']['scoreregister']));
			$newUser->setVar('egold', 0);
			$newUser->setVar('esilver', 0);
			$newUser->setVar('credit', 0);
			$newUser->setVar('goodnum', 0);
			$newUser->setVar('badnum', 0);
			$newUser->setVar('isvip', 0);
			$newUser->setVar('overtime', 0);
			$newUser->setVar('state', 0);
			$users_handler->insert($newUser);
		}elseif(is_object($user)){
			$upflag = false;
			if($user->getVar('pass', 'n') != $users_handler->encryptPass($params['password'])){
				$user->setVar('pass', $users_handler->encryptPass($params['password']));
				$upflag = true;
			}
			if($user->getVar('email', 'n') != $params['email']){
				$user->setVar('email', $params['email']);
				$upflag = true;
			}
			if($upflag) $users_handler->insert($user);
		}
	}
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
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');

	$ucsyncode = '';
	if($params['uc_uid'] > 0){
		//jieqi登录成功，uc也登陆成功，同步登录
		$ucsyncode = uc_user_synlogin($params['uc_uid']);
	}elseif($params['uc_uid'] == -1){
		//jieqi登录成功，uc该用户不存在，自动注册
		$params['uc_uid'] = uc_user_register($_REQUEST['username'], $_REQUEST['password'], $_SESSION['jieqiUserEmail']);
		if($params['uc_uid'] > 0) $ucsyncode = uc_user_synlogin($params['uc_uid']);
	}elseif($params['uc_uid'] == -2){
		//jieqi登录成功，uc该用户密码错
		if($data = uc_get_user($params['username'])) {
			$params['uc_uid'] = $data[0];
			if($params['uc_uid'] > 0){
				uc_user_edit($params['username'], '', $params['password'], '', 1);
				$ucsyncode = uc_user_synlogin($params['uc_uid']);
			}
		}
	}elseif($params['uc_uid'] == -3){
		//jieqi登录成功，uc该用户安全提问错
		if($data = uc_get_user($params['username'])) {
			$params['uc_uid'] = $data[0];
			if($params['uc_uid'] > 0) $ucsyncode = uc_user_synlogin($params['uc_uid']);
		}
	}

	if(defined('JIEQI_WAP_PAGE')) jieqi_wapgourl($params['jumpurl']);
	elseif($_REQUEST['jumphide']) jieqi_jumppage($params['jumpurl'], '', $ucsyncode, true);
	else jieqi_jumppage($params['jumpurl'], $jieqiLang['system']['logon_title'], sprintf($jieqiLang['system']['login_success'], jieqi_htmlstr($params['username'])).$ucsyncode);
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
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');

	$ucsyncode = '';

	//生成同步退出的代码
	$ucsyncode = uc_user_synlogout();

	if(defined('JIEQI_WAP_PAGE')) jieqi_wapgourl($params['jumpurl']);
	elseif($_REQUEST['jumphide']) jieqi_jumppage($params['jumpurl'], '', $ucsyncode, true);
	else jieqi_jumppage($params['jumpurl'], $jieqiLang['system']['logout_title'], $jieqiLang['system']['logout_success'].$ucsyncode);
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

	uc_user_delete($params['username']);

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

	$ucresult = uc_user_edit($params['username'], strval($params['oldpass']), strval($params['newpass']), strval($params['email']), 1);

	$lang_success = empty($_REQUEST['lang_success']) ? $jieqiLang['system']['change_user_success'] : $_REQUEST['lang_success'];
	if(defined('JIEQI_WAP_PAGE')) jieqi_wapgourl($params['jumpurl']);
	elseif($_REQUEST['jumphide']) header('Location: '.$params['jumpurl']);
	else jieqi_jumppage($params['jumpurl'], LANG_DO_SUCCESS, $lang_success);
	return true;
}

?>