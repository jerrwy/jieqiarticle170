<?php 
/**
 * ucenter1.5�ӿ�-�û�ע�ᡢ��¼���˳�����
 *
 * ʹ��ucenter�ӿ�ʱ�򣬰ѱ��ļ��ĳ� funuser.php
 * ���ú� /uc_client/config.inc.php �еĲ���
 * 
 * ����ģ�壺��
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
 * �û��ӿڣ�ע��Ԥ����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
 * @access     public
 * @return     int    
 */
function jieqi_uregister_iprepare(&$params){
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');

	$params['uc_uid'] = uc_user_register($params['username'], $params['password'], $params['email']);
	/*
	-1 �û������Ϸ�, -2 ����Ҫ����ע��Ĵ���, -3 �û����Ѿ�����, -4 Email ��ʽ����, -5 Email ������ע��, -6 �� Email �Ѿ���ע��
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
 * �û��ӿڣ�ע�ᴦ��
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
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
 * �û��ӿڣ���¼Ԥ����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
 * @access     public
 * @return     int    
 */
function jieqi_ulogin_iprepare(&$params){
	global $jieqiLang;
	global $jieqiConfigs;

	//ͨ���ӿ��жϵ�¼�ʺŵ���ȷ�ԣ�����ֵΪ����
	list($uid, $username, $password, $email) = uc_user_login($params['username'], $params['password']);
	//uid ���� 0:�����û� ID����ʾ�û���¼�ɹ� -1:�û������ڣ����߱�ɾ�� -2:����� -3:��ȫ���ʴ�
	$params['uc_uid'] = $uid;

	//���uc��¼�ɹ���jieqi����û������ڣ���jieqi�Զ�ע��
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
 * �û��ӿڣ���¼����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
 * @access     public
 * @return     int    
 */
function jieqi_ulogin_iprocess(&$params){
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');

	$ucsyncode = '';
	if($params['uc_uid'] > 0){
		//jieqi��¼�ɹ���ucҲ��½�ɹ���ͬ����¼
		$ucsyncode = uc_user_synlogin($params['uc_uid']);
	}elseif($params['uc_uid'] == -1){
		//jieqi��¼�ɹ���uc���û������ڣ��Զ�ע��
		$params['uc_uid'] = uc_user_register($_REQUEST['username'], $_REQUEST['password'], $_SESSION['jieqiUserEmail']);
		if($params['uc_uid'] > 0) $ucsyncode = uc_user_synlogin($params['uc_uid']);
	}elseif($params['uc_uid'] == -2){
		//jieqi��¼�ɹ���uc���û������
		if($data = uc_get_user($params['username'])) {
			$params['uc_uid'] = $data[0];
			if($params['uc_uid'] > 0){
				uc_user_edit($params['username'], '', $params['password'], '', 1);
				$ucsyncode = uc_user_synlogin($params['uc_uid']);
			}
		}
	}elseif($params['uc_uid'] == -3){
		//jieqi��¼�ɹ���uc���û���ȫ���ʴ�
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
 * �û��ӿڣ��˳�Ԥ����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
 * @access     public
 * @return     int    
 */
function jieqi_ulogout_iprepare(&$params){
	return true;
}

/**
 * �û��ӿڣ��˳�����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
 * @access     public
 * @return     int    
 */
function jieqi_ulogout_iprocess(&$params){
	global $jieqiLang;
	if(!isset($jieqiLang['system'])) jieqi_loadlang('users', 'system');

	$ucsyncode = '';

	//����ͬ���˳��Ĵ���
	$ucsyncode = uc_user_synlogout();

	if(defined('JIEQI_WAP_PAGE')) jieqi_wapgourl($params['jumpurl']);
	elseif($_REQUEST['jumphide']) jieqi_jumppage($params['jumpurl'], '', $ucsyncode, true);
	else jieqi_jumppage($params['jumpurl'], $jieqiLang['system']['logout_title'], $jieqiLang['system']['logout_success'].$ucsyncode);
	return true;
}

//*****************************************************************
//*****************************************************************

/**
 * �û��ӿڣ�ɾ��Ԥ����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
 * @access     public
 * @return     int    
 */
function jieqi_udelete_iprepare(&$params){
	return true;
}

/**
 * �û��ӿڣ�ɾ������
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
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
 * �û��ӿڣ��༭Ԥ����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
 * @access     public
 * @return     int    
 */
function jieqi_uedit_iprepare(&$params){
	return true;
}

/**
 * �û��ӿڣ��༭����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
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