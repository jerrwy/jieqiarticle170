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
@define('CURRENT_STEP', 8);
@define('JIEQI_IS_OPEN','1');
//COOKIE判断安装顺序
if(@is_array($_COOKIE['jieqi_step']))
if(!@in_array(CURRENT_STEP, $_COOKIE['jieqi_step'])){@header("Location: index.php");break;}
@setcookie('jieqi_step['.(CURRENT_STEP+1).']', CURRENT_STEP+1);
//包含文件
require_once('../global.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/lang/language.php');
include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/header.php');

$jieqiTpl->assign('step_title', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_title']);
$jieqiTpl->assign('step_summary', $jieqiLang[JIEQI_MODULE_NAME]['step'.CURRENT_STEP.'_summary']);
$jieqiTpl->assign('current_step', CURRENT_STEP);
//定义SQL文件目录
$sql_dir='sql';
//包含数据库类
jieqi_includedb();
$db_query=JieqiQueryHandler::getInstance('JieqiQueryHandler');
$db_query->execute('show tables');
$mysql_version=@mysql_get_server_info();
$upmodules=false;
unset($jieqiModules);
include(JIEQI_ROOT_PATH.'/configs/modules.php');
if(is_array($_POST['mod_name']) && count($_POST['mod_name'])>0){
	foreach($_POST['mod_name'] as $v){
		if(file_exists($sql_dir.'/'.$v.'/struct.sql') && file_exists($sql_dir.'/'.$v.'/data.sql')){
			if(!isset($jieqiModules[$v])){
				$jieqiModules[$v] = array('caption'=>$v, 'dir'=>'', 'path'=>'', 'url'=>'', 'theme'=>'', 'publish'=>'1');
				$upmodules = true;
			}elseif($jieqiModules[$v]['publish'] <= 0){
				$jieqiModules[$v]['publish'] = 1;
				$upmodules = true;
			}

			$file_content =jieqi_readfile($sql_dir.'/'.$v.'/struct.sql');
			$file_content.=jieqi_readfile($sql_dir.'/'.$v.'/data.sql');
			//...
			$sqlary=array();
			jieqi_splitsqlfile($sqlary,
			preg_replace(
			array(
			'/DROP\s+TABLE\s+IF\s+EXISTS\s+`?jieqi_([a-z1-9_]+)`?\s*;/isU',
			'/TABLE\s+`?jieqi_([a-z1-9_]+)`?(;|\s)/isU',
			'/INSERT\s+INTO\s+`?jieqi_([a-z1-9_]+)`?(;|\s)/isU',
			'/UPDATE\s+`?jieqi_([a-z1-9_]+)`?(;|\s)/isU'),
			array(
			'DROP TABLE IF EXISTS `'.JIEQI_DB_PREFIX.'_\\1`;',
			'TABLE `'.JIEQI_DB_PREFIX.'_\\1`\\2',
			'INSERT INTO `'.JIEQI_DB_PREFIX.'_\\1`\\2',
			'UPDATE `'.JIEQI_DB_PREFIX.'_\\1`\\2'),
			$file_content)
			);

			$sqlerr=array();
			foreach($sqlary as $v){
				$v=trim($v);
				if(!empty($v) and strlen($v)>5){
					if($mysql_version < '4.1'){
						if(preg_match('/^\s*CREATE\s+TABLE/is',$v)){
							$v=preg_replace(array('/ENGINE\s*=\s*MyISAM[^;]*;/i', '/TYPE\s*=\s*MEMORY[^;]*;/i'), array('TYPE=MyISAM;', 'TYPE=HEAP;'), $v);
						}
					}else{
						if(preg_match('/^\s*CREATE\s+TABLE/is',$v)){
							$v = preg_replace(array('/DEFAULT CHARSET\s*=\s*[a-zA-Z0-9_-]+/', '/TYPE\s*=\s*MyISAM/i', '/TYPE\s*=\s*HEAP/i'), array('DEFAULT CHARSET='.JIEQI_DB_CHARSET, 'ENGINE=MyISAM DEFAULT CHARSET='.JIEQI_DB_CHARSET, 'TYPE=MEMORY DEFAULT CHARSET='.JIEQI_DB_CHARSET), $v);
						}
					}

					$retflag=$db_query->execute($v);
					if(!$retflag){
						$sqlerr[]=array('sql'=>$v, 'error'=>$db_query->db->error());
						//显示错误
						$jieqiTpl->assign('status', 0);
						$jieqiTpl->assign('step_content', sprintf($jieqiLang[JIEQI_MODULE_NAME]['print_sql_error'], jieqi_htmlstr($v), jieqi_htmlstr($db_query->db->error())));
						break;
					}
				}
			}
		}
	}
	if(!empty($sqlerr)){
		$errorinfo='';
		foreach($sqlerr as $v){
			$errorinfo.=sprintf($jieqiLang[JIEQI_MODULE_NAME]['show_error_format'], jieqi_htmlstr($v['sql']), jieqi_htmlstr($v['error']));
		}
		$jieqiTpl->assign('status', 0);
		$jieqiTpl->assign('step_content', sprintf($jieqiLang[JIEQI_MODULE_NAME]['sql_some_error'], $errorinfo));
	}else{
		$errorinfo='';
		//导入管理员账户信息
		//删除原账号，导入新账号
		if($_SESSION['system_user'] && $_SESSION['system_pass']){
			include_once(JIEQI_ROOT_PATH.'/lib/text/textfunction.php');
			if(!$db_query->execute('DELETE FROM '.jieqi_dbprefix('system_users')))
			$errorinfo.=$jieqiLang[JIEQI_MODULE_NAME]['delete_table_error'].'<br />';
			if(!$db_query->execute("INSERT INTO `".jieqi_dbprefix('system_users')."` (`uid`, `siteid`, `uname`, `name`, `pass`, `groupid`, `regdate`, `initial`, `sex`, `email`) VALUES (0, 0, '".jieqi_dbslashes($_SESSION['system_user'])."', '".jieqi_dbslashes($_SESSION['system_user'])."', '".jieqi_dbslashes(md5($_SESSION['system_pass']))."', 2, ".time().", '".jieqi_dbslashes(jieqi_getinitial($_SESSION['system_user']))."', 0, '".jieqi_dbslashes($_SESSION['system_email'])."')"))
			$errorinfo.=$jieqiLang[JIEQI_MODULE_NAME]['insert_table_error'].'<br />';

			if(isset($_SESSION['local_root'])) $db_query->execute("UPDATE ".jieqi_dbprefix('system_configs')." SET cvalue = '".jieqi_dbslashes($_SESSION['local_root'])."' WHERE modname='system' AND cname='JIEQI_URL';");

			if(isset($_SESSION['mysql_host'])) $db_query->execute("UPDATE ".jieqi_dbprefix('system_configs')." SET cvalue = '".jieqi_dbslashes($_SESSION['mysql_host'])."' WHERE modname='system' AND cname='JIEQI_DB_HOST';");

			if(isset($_SESSION['mysql_name'])) $db_query->execute("UPDATE ".jieqi_dbprefix('system_configs')." SET cvalue = '".jieqi_dbslashes($_SESSION['mysql_name'])."' WHERE modname='system' AND cname='JIEQI_DB_NAME';");

			if(isset($_SESSION['mysql_user'])) $db_query->execute("UPDATE ".jieqi_dbprefix('system_configs')." SET cvalue = '".jieqi_dbslashes($_SESSION['mysql_user'])."' WHERE modname='system' AND cname='JIEQI_DB_USER';");

			if(isset($_SESSION['mysql_pass'])) $db_query->execute("UPDATE ".jieqi_dbprefix('system_configs')." SET cvalue = '".jieqi_dbslashes($_SESSION['mysql_pass'])."' WHERE modname='system' AND cname='JIEQI_DB_PASS';");

			if(isset($_SESSION['mysql_charset'])) $db_query->execute("UPDATE ".jieqi_dbprefix('system_configs')." SET cvalue = '".jieqi_dbslashes($_SESSION['mysql_charset'])."' WHERE modname='system' AND cname='JIEQI_DB_CHARSET';");

			unset($_SESSION);
		}
		if(empty($errorinfo)){
			$jieqiTpl->assign('admin_page', JIEQI_URL.'/admin/');
			$jieqiTpl->assign('index_page', JIEQI_URL);
			$jieqiTpl->assign('status', 1);
			$jieqiTpl->assign('step_content', $jieqiLang[JIEQI_MODULE_NAME]['execute_sql_success']);
			$lockdata='';
			if($upmodules){
				$varstring="<?php\n".jieqi_extractvars('jieqiModules', $jieqiModules)."\n?>";
				jieqi_writefile(JIEQI_ROOT_PATH.'/configs/modules.php', $varstring);
			}
			jieqi_writefile(JIEQI_ROOT_PATH.'/configs/install.lock', $lockdata);
		}else{
			$jieqiTpl->assign('status', 0);
			$jieqiTpl->assign('step_content', $errorinfo);
		}
	}
}

$jieqiTpl->setCaching(0);
$jieqiTpl->assign('jieqi_content', $jieqiTpl->fetch(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/templates/step'.CURRENT_STEP.'.html'));

include_once(JIEQI_ROOT_PATH.'/'.JIEQI_MODULE_NAME.'/footer.php');

//SQL分割函数
function jieqi_splitsqlfile(&$ret, $sql, $release=32270){
	$sql          = trim($sql);
	$sql_len      = strlen($sql);
	$char         = '';
	$string_start = '';
	$in_string    = FALSE;

	for ($i = 0; $i < $sql_len; ++$i) {
		$char = $sql[$i];

		// We are in a string, check for not escaped end of strings except for
		// backquotes that can't be escaped
		if ($in_string) {
			for (;;) {
				$i         = strpos($sql, $string_start, $i);
				// No end of string found -> add the current substring to the
				// returned array
				if (!$i) {
					$ret[] = $sql;
					return TRUE;
				}
				// Backquotes or no backslashes before quotes: it's indeed the
				// end of the string -> exit the loop
				else if ($string_start == '`' || $sql[$i-1] != '\\') {
					$string_start      = '';
					$in_string         = FALSE;
					break;
				}
				// one or more Backslashes before the presumed end of string...
				else {
					// ... first checks for escaped backslashes
					$j                     = 2;
					$escaped_backslash     = FALSE;
					while ($i-$j > 0 && $sql[$i-$j] == '\\') {
						$escaped_backslash = !$escaped_backslash;
						$j++;
					}
					// ... if escaped backslashes: it's really the end of the
					// string -> exit the loop
					if ($escaped_backslash) {
						$string_start  = '';
						$in_string     = FALSE;
						break;
					}
					// ... else loop
					else {
						$i++;
					}
				} // end if...elseif...else
			} // end for
		} // end if (in string)

		// We are not in a string, first check for delimiter...
		else if ($char == ';') {
			// if delimiter found, add the parsed part to the returned array
			$ret[]      = substr($sql, 0, $i);
			$sql        = ltrim(substr($sql, min($i + 1, $sql_len)));
			$sql_len    = strlen($sql);
			if ($sql_len) {
				$i      = -1;
			} else {
				// The submited statement(s) end(s) here
				return TRUE;
			}
		} // end else if (is delimiter)

		// ... then check for start of a string,...
		else if (($char == '"') || ($char == '\'') || ($char == '`')) {
			$in_string    = TRUE;
			$string_start = $char;
		} // end else if (is start of string)

		// ... for start of a comment (and remove this comment if found)...
		else if ($char == '#'
		|| ($char == ' ' && $i > 1 && $sql[$i-2] . $sql[$i-1] == '--')) {
			// starting position of the comment depends on the comment type
			$start_of_comment = (($sql[$i] == '#') ? $i : $i-2);
			// if no "\n" exits in the remaining string, checks for "\r"
			// (Mac eol style)
			$end_of_comment   = (strpos(' ' . $sql, "\012", $i+2))
			? strpos(' ' . $sql, "\012", $i+2)
			: strpos(' ' . $sql, "\015", $i+2);
			if (!$end_of_comment) {
				// no eol found after '#', add the parsed part to the returned
				// array if required and exit
				if ($start_of_comment > 0) {
					$ret[]    = trim(substr($sql, 0, $start_of_comment));
				}
				return TRUE;
			} else {
				$sql          = substr($sql, 0, $start_of_comment)
				. ltrim(substr($sql, $end_of_comment));
				$sql_len      = strlen($sql);
				$i--;
			} // end if...else
		} // end else if (is comment)

		// ... and finally disactivate the "/*!...*/" syntax if MySQL < 3.22.07
		else if ($release < 32270
		&& ($char == '!' && $i > 1  && $sql[$i-2] . $sql[$i-1] == '/*')) {
			$sql[$i] = ' ';
		} // end else if
	} // end for

	// add any rest to the returned array
	if (!empty($sql) && preg_match('/[^[:space:]]+/', $sql)) {
		$ret[] = $sql;
	}

	return TRUE;
}
?>