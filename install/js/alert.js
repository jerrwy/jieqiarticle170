//�������ݿ�ȷ�Ϻ���
function doAlert(){
	var objForm=document.forms['form1'];
	if(objForm.elements['setup_table'].checked){
		if(confirm("������ͬ�����ݿ⣬ԭ���ݽ���ʧ����\r\n\r\n����ȷ�ϡ�")){
			objForm.elements['setup_table'].checked=true;
		}else{
			objForm.elements['setup_table'].checked=false;
		}
	}
}
//�ж������Ƿ�һ�º���
function checkPass(){
	var objForm=document.forms['form1'];
	if(objForm.elements['system_pass'].value!=objForm.elements['system_pass_confirm'].value){
		alert("�Բ�����������������벻һ�£�");
		objForm.elements['system_pass_confirm'].select();
		return false;
	}else return true;
}