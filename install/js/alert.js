//建立数据库确认函数
function doAlert(){
	var objForm=document.forms['form1'];
	if(objForm.elements['setup_table'].checked){
		if(confirm("若存在同名数据库，原数据将丢失！！\r\n\r\n请您确认。")){
			objForm.elements['setup_table'].checked=true;
		}else{
			objForm.elements['setup_table'].checked=false;
		}
	}
}
//判断密码是否一致函数
function checkPass(){
	var objForm=document.forms['form1'];
	if(objForm.elements['system_pass'].value!=objForm.elements['system_pass_confirm'].value){
		alert("对不起，您两次输入的密码不一致！");
		objForm.elements['system_pass_confirm'].select();
		return false;
	}else return true;
}