<?php 
/**
 * PHPWIND 7 ͨ��֤�ӿ�
 *
 * ���� PHPWIND 7.3.2 ����
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funuser_phpwind7.php 317 2009-05-27 09:03:33Z juny $
 */

/*
PHPWIND 7 ͨ��֤�ӿڣ�JIEQI CMS��Ϊ����ˣ������������£�

1���ֱ�װ��JIEQI CMS��PHPWIND

2������PHPWIND��̨����������ġ��ġ�ͨ��֤���������������ã����ύ
   �Ƿ���ͨ��֤        ��
   ͨ��֤˽����Կ        ����һ�������ַ���
   ������վ��Ϊͨ��֤��  �ͻ���
   ������������          ����� ͨ��֤����ģʽ �� ��Ҫͬ����¼�Ŀͻ��˵�ַ ��Ĭ�ϣ���Ҫ��
   ͨ��֤��������ַ      ���ó����Լ���װ��JIEQI CMS����ַ����󲻴�б�ܣ����� http://www.jieqi.com
   ͨ��֤��¼��ַ        login.php
   ͨ��֤�˳���ַ        logout.php?action=logout
   ͨ��֤ע���ַ        register.php
   ѡ����Ҫͬ���Ļ���    ����ѡ
   
3����JIEQI CMS���棬�༭ /include/funuser_phpwind7.php
  �� PHPWIND_PASSPORT_KEY ��Ӧ��ֵ�ĳ�PHPWIND�������õ� ��ͨ��֤˽����Կ��
  �� PHPWIND_PASSPORT_URL ��Ӧ��ֵ�ĳ�PHPWIND��װ�õ���ַ����󲻴�б�ܣ�
  Ȼ��ѱ�Ŀ¼�µ� funuser.php ���ݣ����������funuser_default.php��
  �ٰ� funuser_phpwind7.php ������ funuser.php ������������phpwind�ӿ�
*/


//ͨ��֤��˽���ܳ�
define('PHPWIND_PASSPORT_KEY', '1234567890');
//phpwind��ַ����󲻴�б��
define('PHPWIND_PASSPORT_URL', 'http://localhost/demo/bbs/phpwind7');



/**
 * �û��ӿڣ�ע��Ԥ����
 * 
 * @param      array       $params ��������
 * ��������� $params['username'] - �û���,$params['password'] - ����,$params['email'] - ����
 * @access     public
 * @return     int    
 */
function jieqi_uregister_iprepare(&$params){
	return true;
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
	//��ֵ
	$userdb['uid']		= $params['uid'];//�û����
	$userdb['username']	= $params['username'];//�û���
	$userdb['password']	= md5($params['password']);//����
	$userdb['email']	= $params['email'];//����
	/*
	$userdb['rvrc']		= $params['rvrc'];//����
	$userdb['money']	= $params['money'];//ͭ��
	$userdb['credit']	= $params['credit'];//����ֵ
	$userdb['currency']	= $params['currency'];//��Ԫ
	*/
	$userdb['time']		= time();//ʱ��
	$userdb['cktime']	= 'F';
	
	if(!empty($_REQUEST['forward'])) $params['jumpurl'] = $_REQUEST['forward'];

	//�ַ������û�������Ϣ
	$userdb_encode='';
	foreach($userdb as $key=>$val){
		$userdb_encode .= $userdb_encode ? "&$key=$val" : "$key=$val";
	}
	//��������
	$userdb_encode=str_replace('=','',StrCode($userdb_encode));
	//�����ִ�
	$verify = md5('login'.$userdb_encode.$params['jumpurl'].PHPWIND_PASSPORT_KEY);
	header('Location: '.PHPWIND_PASSPORT_URL.'/passport_client.php?action=login&userdb='.rawurlencode($userdb_encode).'&forward='.rawurlencode($params['jumpurl']).'&verify='.rawurlencode($verify));

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
	//��ֵ
	$userdb['uid']		= $_SESSION['jieqiUserId'];//�û����
	$userdb['username']	= $_SESSION['jieqiUserUname'];//�û���
	$userdb['password']	= md5($params['password']);//����
	$userdb['email']	= $_SESSION['jieqiUserEmail'];//����
	/*
	$userdb['rvrc']		= $params['rvrc'];//����
	$userdb['money']	= $params['money'];//ͭ��
	$userdb['credit']	= $params['credit'];//����ֵ
	$userdb['currency']	= $params['currency'];//��Ԫ
	*/
	$userdb['time']		= time();//ʱ��
	$userdb['cktime']	= 'F';
	
	if(!empty($_REQUEST['forward'])) $params['jumpurl'] = $_REQUEST['forward'];

	//�ַ������û�������Ϣ
	$userdb_encode='';
	foreach($userdb as $key=>$val){
		$userdb_encode .= $userdb_encode ? "&$key=$val" : "$key=$val";
	}
	//��������
	$userdb_encode=str_replace('=','',StrCode($userdb_encode));
	//�����ִ�
	$verify = md5('login'.$userdb_encode.$params['jumpurl'].PHPWIND_PASSPORT_KEY);
	header('Location: '.PHPWIND_PASSPORT_URL.'/passport_client.php?action=login&userdb='.rawurlencode($userdb_encode).'&forward='.rawurlencode($params['jumpurl']).'&verify='.rawurlencode($verify));

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
	//��ֵ
	$userdb['uid']		= $_SESSION['jieqiUserId'];//�û����
	$userdb['username']	= $_SESSION['jieqiUserUname'];//�û���
	$userdb['password']	= '';//����
	$userdb['email']	= $_SESSION['jieqiUserEmail'];//����
	/*
	$userdb['rvrc']		= $params['rvrc'];//����
	$userdb['money']	= $params['money'];//ͭ��
	$userdb['credit']	= $params['credit'];//����ֵ
	$userdb['currency']	= $params['currency'];//��Ԫ
	*/
	$userdb['time']		= time();//ʱ��
	$userdb['cktime']	= 'F';
	
	if(!empty($_REQUEST['forward'])) $params['jumpurl'] = $_REQUEST['forward'];

	//�ַ������û�������Ϣ
	$userdb_encode='';
	foreach($userdb as $key=>$val){
		$userdb_encode .= $userdb_encode ? "&$key=$val" : "$key=$val";
	}
	//��������
	$userdb_encode=str_replace('=','',StrCode($userdb_encode));
	//�����ִ�
	$verify = md5('quit'.$userdb_encode.$params['jumpurl'].PHPWIND_PASSPORT_KEY);
	header('Location: '.PHPWIND_PASSPORT_URL.'/passport_client.php?action=quit&userdb='.rawurlencode($userdb_encode).'&forward='.rawurlencode($params['jumpurl']).'&verify='.rawurlencode($verify));

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
	$lang_success = empty($_REQUEST['lang_success']) ? $jieqiLang['system']['change_user_success'] : $_REQUEST['lang_success'];
	if(defined('JIEQI_WAP_PAGE')) jieqi_wapgourl($params['jumpurl']);
	elseif($_REQUEST['jumphide']) header('Location: '.$params['jumpurl']);
	else jieqi_jumppage($params['jumpurl'], LANG_DO_SUCCESS, $lang_success);
	return true;
}


//*****************************************************************
//*****************************************************************
/**
 * PHPWIND�ӿ�ר�ú����������ַ������ܽ���
 * 
 * @param      string       $string ԭʼ�ַ���
 * @param      string       $action ���� 'ENCODE'-���ܣ�'DECODE'-����
 * @access     public
 * @return     string       ���ؼ��ܻ��߽��ܺ���ַ���
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