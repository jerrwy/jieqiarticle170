<?php
//  ------------------------------------------------------------------------
//                                杰奇网络
//                    Copyright (c) 2008 jieqi.com
//                       <http://www.jieqi.com/>
//  ------------------------------------------------------------------------
//  设计：杰奇网络
//  邮箱: 377653@qq.com
//  ------------------------------------------------------------------------
@session_start();
@define('JIEQI_MODULE_NAME', 'install');
@define('CURRENT_STEP', 6);
@define('JIEQI_IS_OPEN','1');
//@define('JIEQI_NEED_SESSION', 1);
//COOKIE判断安装顺序
if(@is_array($_COOKIE['jieqi_step']))
if(!@in_array(CURRENT_STEP, $_COOKIE['jieqi_step'])){@header("Location: index.php");break;}
@setcookie('jieqi_step['.(CURRENT_STEP+1).']', CURRENT_STEP+1);
//包含文件
require_once('../global.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/lang/language.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/header.php');
include_once(JIEQI_ROOT_PATH.'/lib/text/textfunction.php');
jieqi_getconfigs('system', 'configs');
//赋值参数到模板
$jieqiTpl->assign('step_title', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_title']);
$jieqiTpl->assign('step_summary', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_summary']);
$jieqiTpl->assign('next_page', 'step'.(CURRENT_STEP+1).'.php');
$jieqiTpl->assign('current_step', CURRENT_STEP);
//处理POST参数
foreach($_POST as $k=>$v){
	$_POST[$k]=str_replace(array('`','\'', '"', '\\'),'',$_POST[$k]);
}
$_POST['local_root']=trim($_POST['local_root']);

$_POST['mysql_host']=trim($_POST['mysql_host']);
$_POST['mysql_name']=trim($_POST['mysql_name']);
$_POST['mysql_user']=trim($_POST['mysql_user']);
$_POST['mysql_pass']=trim($_POST['mysql_pass']);
$_POST['mysql_charset']=trim($_POST['mysql_charset']);
$_POST['setup_table'] = isset($_POST['setup_table']) ? trim($_POST['setup_table']) : '';

$_POST['system_user']=trim($_POST['system_user']);
$_POST['system_pass']=trim($_POST['system_pass']);
$_POST['system_pass_confirm']=trim($_POST['system_pass_confirm']);
$_POST['system_email']=trim($_POST['system_email']);

//测试连接Mysql并建立数据库
include_once(JIEQI_ROOT_PATH.'/lib/database/mysql/db.php');
$db_query=new JieqiMySQLDatabase();
$errtext='';
if(method_exists($db_query, 'setDbset')){
	$dbset = array('dbtype'=>'mysql', 'dbhost'=>$_POST['mysql_host'], 'dbuser'=>$_POST['mysql_user'], 'dbpass'=>$_POST['mysql_pass'], 'dbname'=>'', 'dbpconnect'=>0, 'dbcharset'=>$_POST['mysql_charset'], 'dbusage'=>0);
	$db_query->setDbset($dbset);
	$isconnect = $db_query->connect(true);
}else{
	$isconnect = $db_query->connect($_POST['mysql_host'], $_POST['mysql_user'], $_POST['mysql_pass'], $_POST['mysql_name'], false);
}

if($isconnect){
	//创建数据库
	if($_POST['setup_table']=='yes'){
		//判断数据库名称合法性
		if(preg_match('/^[A-Za-z0-9_\-]+$/', $_POST['mysql_name'])){

			if(!$db_query->query('DROP DATABASE IF EXISTS `'.$_POST['mysql_name'].'`'))
			$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['drop_db_error'].'<br />';
			//判断MYSQL版本
			$mysql_version=@mysql_get_server_info();
			if($mysql_version<'4.1') $sql='CREATE DATABASE `'.$_POST['mysql_name'].'`';
			else $sql='CREATE DATABASE `'.$_POST['mysql_name'].'` DEFAULT CHARACTER SET '.$_POST['mysql_charset'];
			if(!$db_query->query($sql))
			$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['create_db_error'].'<br />';
		}else{
			$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['error_name_format'].'<br />';
		}
	}else{
		if(!mysql_select_db($_POST['mysql_name'])) $errtext .= sprintf($jieqiLang[JIEQI_MODULE_NAME]['dbname_not_exists'], htmlspecialchars($_POST['mysql_name'])).'<br />';
	}
	//保存至配置文件
	if(empty($errtext)){
		$file_name=JIEQI_ROOT_PATH.'/configs/define.php';
		$file_content=jieqi_readfile($file_name);
		$file_content=str_replace('<?php', '',  $file_content);
		$file_content=str_replace('?>', '',  $file_content);
		$config_array=explode(';', $file_content);
		if(is_array($config_array) && count($config_array)>0){
			for($i=0;$i<count($config_array);$i++){
				if(strpos($config_array[$i], 'JIEQI_URL')){
					$config_array[$i]="\r\n@define('JIEQI_URL','".$_POST['local_root']."')";
				}else if(strpos($config_array[$i], 'JIEQI_DB_HOST')){
					$config_array[$i]="\r\n@define('JIEQI_DB_HOST','".$_POST['mysql_host']."')";
				}else if(strpos($config_array[$i], 'JIEQI_DB_NAME')){
					$config_array[$i]="\r\n@define('JIEQI_DB_NAME','".$_POST['mysql_name']."')";
				}else if(strpos($config_array[$i], 'JIEQI_DB_USER')){
					$config_array[$i]="\r\n@define('JIEQI_DB_USER','".$_POST['mysql_user']."')";
				}else if(strpos($config_array[$i], 'JIEQI_DB_PASS')){
					$config_array[$i]="\r\n@define('JIEQI_DB_PASS','".$_POST['mysql_pass']."')";
				}else if(strpos($config_array[$i], 'JIEQI_DB_CHARSET')){
					$config_array[$i]="\r\n@define('JIEQI_DB_CHARSET','".$_POST['mysql_charset']."')";
				}
			}
			$file_content="<?php";
			for($i=0;$i<(count($config_array)-1);$i++){
				$file_content.=$config_array[$i].';';
			}
			$file_content.="\r\n\r\n?>";
			//写入配置文件
			if(!jieqi_writefile($file_name, $file_content))
			$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['write_file_error'].'<br />';
		}
	}
	//检测注册账号合法性
	if($_POST['system_user'] && $_POST['system_pass'] && $_POST['system_pass_confirm']){
		//检查用户名格式
		if(strlen($_POST['system_user'])==0)
		$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['need_user_name'].'<br />';
		if(!jieqi_safestring($_POST['system_user']) || (strpos($_POST['system_user'], '　')!==false))
		$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['error_user_format'].'<br />';
		if($jieqiConfigs['system']['usernamelimit']==1 && !preg_match('/^[A-Za-z0-9]+$/',$_POST['system_user']))		$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['username_need_engnum'].'<br />';
		//检查密码
		if(strlen($_POST['system_pass'])==0 || strlen($_POST['system_pass_confirm'])==0)
		$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['need_pass_word'].'<br />';
		if($_POST['system_pass'] != $_POST['system_pass_confirm'])
		$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['pass_not_equal'].'<br />';
		//检查Email
		if (strlen($_POST['system_email'])==0) $errtext .= $jieqiLang[JIEQI_MODULE_NAME]['need_email'].'<br />';
		elseif ( !preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+([\.][a-z0-9-]+)+$/i",$_POST['system_email']) ) $errtext .= $jieqiLang[JIEQI_MODULE_NAME]['error_email_format'].'<br />';
	}
}else{
	$errtext.=$jieqiLang[JIEQI_MODULE_NAME]['mysql_connect_failure'].'<br />'.mysql_error().'<br />';
}

if(empty($errtext)){
	$link_status=1;
	//纪录注册账号会话
	$_SESSION['system_user']=$_POST['system_user'];
	$_SESSION['system_pass']=$_POST['system_pass'];
	$_SESSION['system_email']=$_POST['system_email'];

	$_SESSION['local_root']=$_POST['local_root'];
	$_SESSION['mysql_host']=$_POST['mysql_host'];
	$_SESSION['mysql_name']=$_POST['mysql_name'];
	$_SESSION['mysql_user']=$_POST['mysql_user'];
	$_SESSION['mysql_pass']=$_POST['mysql_pass'];
	$_SESSION['mysql_charset']=$_POST['mysql_charset'];

	$jieqiTpl->assign('step_content', $jieqiLang[JIEQI_MODULE_NAME]['mysql_connect_success']);
}else{
	$link_status=0;
	$jieqiTpl->assign('step_content', $errtext);
}
$jieqiTpl->assign('link_status', $link_status);
$jieqiTpl->setCaching(0);
$jieqiTpl->assign('jieqi_content', $jieqiTpl->fetch(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/templates/step'.CURRENT_STEP.'.html'));

include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/footer.php');
?>