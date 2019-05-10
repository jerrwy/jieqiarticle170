//许可协议处理函数
if(!document.forms['f1'].elements['cb1'].checked) document.forms['f1'].elements['bt1'].disabled=true;
function doAgree(){
	if(document.forms['f1'].elements['cb1'].checked==true){
		document.forms['f1'].elements['bt1'].disabled=false;
	}else{
		document.forms['f1'].elements['bt1'].disabled=true;
	}
}