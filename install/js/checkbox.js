//判断是否选择安装模块
function doCheck(){
	var objForm=document.forms['form1'];
	for(i=0;i<objForm.elements['mod_name[]'].length;i++){
		if(objForm.elements['mod_name[]'][i].checked==true){
			objForm.elements['bt2'].disabled=false;
			break;
		}
		objForm.elements['bt2'].disabled=true;
	}
}
//
doCheck();