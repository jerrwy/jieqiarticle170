<?php 
/**
 * discuzͨ��֤�ӿ�-�û�ע�ᡢ��¼���˳�����
 *
 * ʹ��discuzͨ��֤���ѱ��ļ��ĳ� funuser.php
 * ���ú������˽����Կ��ͨ��֤��ַ
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funuser_discuz.php 317 2009-01-06 09:03:33Z juny $
 */

//Discuz��˽���ܳ�
define('DISCUZ_PASSPORT_KEY', '1234567890');
//Discuzͨ��֤��ַ
define('DISCUZ_PASSPORT_URL', 'http://localhost/demo/bbs/discuz/api/passport.php');

//�û�ע���ĸ��Ӵ���
function jieqi_registerdo($gourl){
	if(strpos($gourl, 'http') === false){
		if($_SERVER['HTTP_HOST'] != '') $gourl='http://'.$_SERVER['HTTP_HOST'].$gourl;
		else $gourl=JIEQI_URL.$gourl;
	}
	$member = array
		(
		'cookietime'	=> 0,
		'time'		=> JIEQI_NOW_TIME,
		'username'	=> $_REQUEST['username'],
		'password'	=> md5($_REQUEST['password']),
		'email'		=> $_REQUEST['email'],
		'isadmin'   => 0,
		'credits'	=> 0,
		'gender'    => $_REQUEST['sex'],
		'bday'      => '',
		'regip'		=> '',
		'regdate'	=> JIEQI_NOW_TIME,
		'nickname'  => '',
		'site'      => $_REQUEST['url'],
		'qq'        => $_REQUEST['qq'],
		'icq'       => '',
		'msn'		=> 'email@hotmail.com',
		'yahoo'     => ''
		);
		
	$action='login';
	$auth = passport_encrypt(passport_encode($member), DISCUZ_PASSPORT_KEY);
	$verify = md5($action.$auth.$gourl.DISCUZ_PASSPORT_KEY);
	header('Location: '.DISCUZ_PASSPORT_URL.'?action='.$action.'&auth='.rawurlencode($auth).'&forward='.rawurlencode($gourl).'&verify='.$verify);
	//jieqi_jumppage($gourl, '*ע��ɹ�*', '��ϲ�������ѳɹ�ע���Ϊ��վ�û���');
}

//�û���½��ĸ��Ӵ���
function jieqi_logindo($gourl){
	if(strpos($gourl, 'http') === false){
		if($_SERVER['HTTP_HOST'] != '') $gourl='http://'.$_SERVER['HTTP_HOST'].$gourl;
		else $gourl=JIEQI_URL.$gourl;
	}
	if($_SESSION['jieqiUserGroup']==JIEQI_GROUP_ADMIN) $isadmin=1;
	else $isadmin=0;
	$member = array
		(
		'time'		=> JIEQI_NOW_TIME,
		'username'	=> $_REQUEST['username'],
		'password'	=> md5($_REQUEST['password']),
		'email'		=> $_SESSION['jieqiUserEmail'],
		'isadmin'   => $isadmin
		);
		
	$action='login';
	$auth = passport_encrypt(passport_encode($member), DISCUZ_PASSPORT_KEY);
	$verify = md5($action.$auth.$gourl.DISCUZ_PASSPORT_KEY);
	header('Location: '.DISCUZ_PASSPORT_URL.'?action='.$action.'&auth='.rawurlencode($auth).'&forward='.rawurlencode($gourl).'&verify='.$verify);
	//jieqi_jumppage($gourl, '*��¼�ɹ�*', jieqi_htmlstr($_REQUEST['username']).'����ӭ��������');
}

//�û��˳���ĸ��Ӵ���
function jieqi_logoutdo($gourl){
	if(strpos($gourl, 'http') === false){
		if($_SERVER['HTTP_HOST'] != '') $gourl='http://'.$_SERVER['HTTP_HOST'].$gourl;
		else $gourl=JIEQI_URL.$gourl;
	}
	$member = array
		(
		'time'		=> JIEQI_NOW_TIME,
		'username'	=> $_REQUEST['username'],
		'password'	=> md5($_REQUEST['password']),
		'email'		=> $_REQUEST['email'],
		'isadmin'   => 0,
		'credits'	=> 0,
		'gender'    => $_REQUEST['sex'],
		'bday'      => '',
		'regip'		=> '',
		'regdate'	=> JIEQI_NOW_TIME,
		'nickname'  => '',
		'site'      => $_REQUEST['url'],
		'qq'        => $_REQUEST['qq'],
		'icq'       => '',
		'msn'		=> 'email@hotmail.com',
		'yahoo'     => ''
		);
		
	$action='logout';
	$auth = '';
	$verify = md5($action.$auth.$gourl.DISCUZ_PASSPORT_KEY);
	header('Location: '.DISCUZ_PASSPORT_URL.'?action='.$action.'&forward='.rawurlencode($gourl).'&verify='.$verify);
	//jieqi_jumppage($gourl, '*�˳���¼*', '���Ѿ��ɹ��˳�,��л���ķ��ʣ�');
}


//����discuz��Ҫ�ĺ���

/**
	* Passport ���ܺ���
	*
	* @param		string		�ȴ����ܵ�ԭ�ִ�
	* @param		string		˽���ܳ�(���ڽ��ܺͼ���)
	*
	* @return	string		ԭ�ִ�����˽���ܳ׼��ܺ�Ľ��
	*/
	function passport_encrypt($txt, $key) {

		// ʹ����������������� 0~32000 ��ֵ�� MD5()
		srand((double)microtime() * 1000000);
		$encrypt_key = md5(rand(0, 32000));

		// ������ʼ��
		$ctr = 0;
		$tmp = '';

		// for ѭ����$i Ϊ�� 0 ��ʼ����С�� $txt �ִ����ȵ�����
		for($i = 0; $i < strlen($txt); $i++) {
			// ��� $ctr = $encrypt_key �ĳ��ȣ��� $ctr ����
			$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
			// $tmp �ִ���ĩβ������λ�����һλ����Ϊ $encrypt_key �ĵ� $ctr λ��
			// �ڶ�λ����Ϊ $txt �ĵ� $i λ�� $encrypt_key �� $ctr λȡ���Ȼ�� $ctr = $ctr + 1
			$tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]);
		}

		// ���ؽ�������Ϊ passport_key() ��������ֵ�� base65 ������
		return base64_encode(passport_key($tmp, $key));

	}

	/**
	* Passport ���ܺ���
	*
	* @param		string		���ܺ���ִ�
	* @param		string		˽���ܳ�(���ڽ��ܺͼ���)
	*
	* @return	string		�ִ�����˽���ܳ׽��ܺ�Ľ��
	*/
	function passport_decrypt($txt, $key) {

		// $txt �Ľ��Ϊ���ܺ���ִ����� base64 ���룬Ȼ����˽���ܳ�һ��
		// ���� passport_key() ���������ķ���ֵ
		$txt = passport_key(base64_decode($txt), $key);

		// ������ʼ��
		$tmp = '';

		// for ѭ����$i Ϊ�� 0 ��ʼ����С�� $txt �ִ����ȵ�����
		for ($i = 0; $i < strlen($txt); $i++) {
			// $tmp �ִ���ĩβ����һλ��������Ϊ $txt �ĵ� $i λ��
			// �� $txt �ĵ� $i + 1 λȡ���Ȼ�� $i = $i + 1
			$tmp .= $txt[$i] ^ $txt[++$i];
		}

		// ���� $tmp ��ֵ��Ϊ���
		return $tmp;

	}

	/**
	* Passport �ܳ״�����
	*
	* @param		string		�����ܻ�����ܵ��ִ�
	* @param		string		˽���ܳ�(���ڽ��ܺͼ���)
	*
	* @return	string		�������ܳ�
	*/
	function passport_key($txt, $encrypt_key) {

		// �� $encrypt_key ��Ϊ $encrypt_key �� md5() ���ֵ
		$encrypt_key = md5($encrypt_key);

		// ������ʼ��
		$ctr = 0;
		$tmp = '';

		// for ѭ����$i Ϊ�� 0 ��ʼ����С�� $txt �ִ����ȵ�����
		for($i = 0; $i < strlen($txt); $i++) {
			// ��� $ctr = $encrypt_key �ĳ��ȣ��� $ctr ����
			$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
			// $tmp �ִ���ĩβ����һλ��������Ϊ $txt �ĵ� $i λ��
			// �� $encrypt_key �ĵ� $ctr + 1 λȡ���Ȼ�� $ctr = $ctr + 1
			$tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
		}

		// ���� $tmp ��ֵ��Ϊ���
		return $tmp;

	}

	/**
	* Passport ��Ϣ(����)���뺯��
	*
	* @param		array		�����������
	*
	* @return	string		���龭�������ִ�
	*/
	function passport_encode($array) {

		// ���������ʼ��
		$arrayenc = array();

		// �������� $array������ $key Ϊ��ǰԪ�ص��±꣬$val Ϊ���Ӧ��ֵ
		foreach($array as $key => $val) {
			// $arrayenc ��������һ��Ԫ�أ�������Ϊ "$key=���� urlencode() ��� $val ֵ"
			$arrayenc[] = $key.'='.urlencode($val);
		}

		// ������ "&" ���ӵ� $arrayenc ��ֵ(implode)������ $arrayenc = array('aa', 'bb', 'cc', 'dd')��
		// �� implode('&', $arrayenc) ��Ľ��Ϊ ��aa&bb&cc&dd"
		return implode('&', $arrayenc);

	}

?>