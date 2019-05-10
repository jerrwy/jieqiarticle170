<?php 
/**
 * discuz通行证接口-用户注册、登录、退出处理
 *
 * 使用discuz通行证，把本文件改成 funuser.php
 * 配置好下面的私有密钥和通行证地址
 * 
 * 调用模板：无
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: funuser_discuz.php 317 2009-01-06 09:03:33Z juny $
 */

//Discuz的私有密匙
define('DISCUZ_PASSPORT_KEY', '1234567890');
//Discuz通行证地址
define('DISCUZ_PASSPORT_URL', 'http://localhost/demo/bbs/discuz/api/passport.php');

//用户注册后的附加处理
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
	//jieqi_jumppage($gourl, '*注册成功*', '恭喜您，您已成功注册成为本站用户！');
}

//用户登陆后的附加处理
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
	//jieqi_jumppage($gourl, '*登录成功*', jieqi_htmlstr($_REQUEST['username']).'，欢迎您到来！');
}

//用户退出后的附加处理
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
	//jieqi_jumppage($gourl, '*退出登录*', '您已经成功退出,感谢您的访问！');
}


//以下discuz需要的函数

/**
	* Passport 加密函数
	*
	* @param		string		等待加密的原字串
	* @param		string		私有密匙(用于解密和加密)
	*
	* @return	string		原字串经过私有密匙加密后的结果
	*/
	function passport_encrypt($txt, $key) {

		// 使用随机数发生器产生 0~32000 的值并 MD5()
		srand((double)microtime() * 1000000);
		$encrypt_key = md5(rand(0, 32000));

		// 变量初始化
		$ctr = 0;
		$tmp = '';

		// for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
		for($i = 0; $i < strlen($txt); $i++) {
			// 如果 $ctr = $encrypt_key 的长度，则 $ctr 清零
			$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
			// $tmp 字串在末尾增加两位，其第一位内容为 $encrypt_key 的第 $ctr 位，
			// 第二位内容为 $txt 的第 $i 位与 $encrypt_key 的 $ctr 位取异或。然后 $ctr = $ctr + 1
			$tmp .= $encrypt_key[$ctr].($txt[$i] ^ $encrypt_key[$ctr++]);
		}

		// 返回结果，结果为 passport_key() 函数返回值的 base65 编码结果
		return base64_encode(passport_key($tmp, $key));

	}

	/**
	* Passport 解密函数
	*
	* @param		string		加密后的字串
	* @param		string		私有密匙(用于解密和加密)
	*
	* @return	string		字串经过私有密匙解密后的结果
	*/
	function passport_decrypt($txt, $key) {

		// $txt 的结果为加密后的字串经过 base64 解码，然后与私有密匙一起，
		// 经过 passport_key() 函数处理后的返回值
		$txt = passport_key(base64_decode($txt), $key);

		// 变量初始化
		$tmp = '';

		// for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
		for ($i = 0; $i < strlen($txt); $i++) {
			// $tmp 字串在末尾增加一位，其内容为 $txt 的第 $i 位，
			// 与 $txt 的第 $i + 1 位取异或。然后 $i = $i + 1
			$tmp .= $txt[$i] ^ $txt[++$i];
		}

		// 返回 $tmp 的值作为结果
		return $tmp;

	}

	/**
	* Passport 密匙处理函数
	*
	* @param		string		待加密或待解密的字串
	* @param		string		私有密匙(用于解密和加密)
	*
	* @return	string		处理后的密匙
	*/
	function passport_key($txt, $encrypt_key) {

		// 将 $encrypt_key 赋为 $encrypt_key 经 md5() 后的值
		$encrypt_key = md5($encrypt_key);

		// 变量初始化
		$ctr = 0;
		$tmp = '';

		// for 循环，$i 为从 0 开始，到小于 $txt 字串长度的整数
		for($i = 0; $i < strlen($txt); $i++) {
			// 如果 $ctr = $encrypt_key 的长度，则 $ctr 清零
			$ctr = $ctr == strlen($encrypt_key) ? 0 : $ctr;
			// $tmp 字串在末尾增加一位，其内容为 $txt 的第 $i 位，
			// 与 $encrypt_key 的第 $ctr + 1 位取异或。然后 $ctr = $ctr + 1
			$tmp .= $txt[$i] ^ $encrypt_key[$ctr++];
		}

		// 返回 $tmp 的值作为结果
		return $tmp;

	}

	/**
	* Passport 信息(数组)编码函数
	*
	* @param		array		待编码的数组
	*
	* @return	string		数组经编码后的字串
	*/
	function passport_encode($array) {

		// 数组变量初始化
		$arrayenc = array();

		// 遍历数组 $array，其中 $key 为当前元素的下标，$val 为其对应的值
		foreach($array as $key => $val) {
			// $arrayenc 数组增加一个元素，其内容为 "$key=经过 urlencode() 后的 $val 值"
			$arrayenc[] = $key.'='.urlencode($val);
		}

		// 返回以 "&" 连接的 $arrayenc 的值(implode)，例如 $arrayenc = array('aa', 'bb', 'cc', 'dd')，
		// 则 implode('&', $arrayenc) 后的结果为 ”aa&bb&cc&dd"
		return implode('&', $arrayenc);

	}

?>