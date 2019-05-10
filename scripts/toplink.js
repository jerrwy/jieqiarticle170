var jieqiUserId = 0;
var jieqiUserName = '';
var jieqiUserPassword = '';
var jieqiUserGroup = 0;
var jieqiNewMessage = 0;

if(document.cookie.indexOf('jieqiUserInfo') >= 0){
	
	var jieqiUserInfo = get_cookie_value('jieqiUserInfo');
	
	start = 0;
	offset = jieqiUserInfo.indexOf(',', start); 
	while(offset > 0){
		tmpval = jieqiUserInfo.substring(start, offset);
		tmpidx = tmpval.indexOf('=');
		if(tmpidx > 0){
           tmpname = tmpval.substring(0, tmpidx);
		   tmpval = tmpval.substring(tmpidx+1, tmpval.length);
		   if(tmpname == 'jieqiUserId') jieqiUserId = tmpval;
		   else if(tmpname == 'jieqiUserName_un') jieqiUserName = tmpval;
		   else if(tmpname == 'jieqiUserPassword') jieqiUserPassword = tmpval;
		   else if(tmpname == 'jieqiUserGroup') jieqiUserGroup = tmpval;
		   else if(tmpname == 'jieqiNewMessage') jieqiNewMessage = tmpval;
		}
		start = offset+1;
		if(offset < jieqiUserInfo.length){
		  offset = jieqiUserInfo.indexOf(',', start); 
		  if(offset == -1) offset =  jieqiUserInfo.length;
		}else{
          offset = -1;
		}
	}
}

if(jieqiUserId != 0 && jieqiUserName != '' && (document.cookie.indexOf('PHPSESSID') != -1 || jieqiUserPassword != '')){
  document.write('<table width="100%"  border="0" cellspacing="0" cellpadding="0">');
  document.write('<tr>');
  document.write('<td align="left" valign="middle" height="20">&nbsp;欢迎您！ '+jieqiUserName+'&nbsp;&nbsp;&nbsp;<a href="/userdetail.php" target="_top">查看资料</a> | <a href="/modules/article/bookcase.php" target="_top">我的书架</a>');
  if(jieqiNewMessage > 0){
	  document.write(' | <a href="/message.php?box=inbox" target="_top" class="mue1">您有短信</a>');
  }else{
	  document.write(' | <a href="/message.php?box=inbox" target="_top">查看短信</a>');
  }
  document.write(' | <a href="/logout.php" target="_self">退出登陆</a>&nbsp;</td>');
  document.write('</tr>');
  document.write('</table>');
}else{
  var jumpurl="";
  if(location.href.indexOf("jumpurl") == -1){
    jumpurl=location.href;
  }
  document.write('<table width="100%"  border="0" cellspacing="0" cellpadding="0">');
  document.write('<form name="framelogin" method="post" action="/login.php">');
  document.write('<tr>');
  document.write('<td align="left" valign="middle">用户名：');
  document.write('<input name="username" type="text" class="text" onkeypress="javascript: if (event.keyCode==32) return false;" value="" size="8" maxlength="30" />');
  document.write('&nbsp;密码：<input type="password" class="text" size="8" maxlength="30" name="password" />');
  document.write('<input type="hidden" name="action" value="login" />');
  document.write('<input type="hidden" name="jumpurl" value="'+jumpurl+'" />');
  document.write(' <input type="checkbox" class="checkbox" name="usecookie" value="1" />');
  document.write('记录cookie&nbsp;');
  document.write('<input type="submit" class="button" value="登录" name="submit" />');
  document.write('&nbsp;<a href="/register.php" target="_top">用户注册</a> &nbsp;<a href="/getpass.php" target="_top">取回密码</a>&nbsp;</td>');
  document.write('</tr>');
  document.write('</form>');
  document.write('</table>');
}

function get_cookie_value(Name) { 
  var search = Name + "=";
　var returnvalue = ""; 
　if (document.cookie.length > 0) { 
　  offset = document.cookie.indexOf(search) 
　　if (offset != -1) { 
　　  offset += search.length 
　　  end = document.cookie.indexOf(";", offset); 
　　  if (end == -1) 
　　  end = document.cookie.length; 
　　  returnvalue=unescape(document.cookie.substring(offset, end));
　　} 
　} 
　return returnvalue; 
}