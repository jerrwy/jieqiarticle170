//��������ͼƬ����
var divimgs = new Array(); 
function imgsearch(){
	var divs = document.getElementsByTagName('div');
	var j = 0;
	for (i=0; i < divs.length; i++){
		if(divs[i].className == 'divimage'){
			divimgs[j]=divs[i];
			j++;
		}
	}
}

//���������ʾͼƬ
function imgclickshow(id, url){
	 if(document.getElementById(id).innerHTML.toLowerCase().indexOf('<img') == -1) document.getElementById(id).innerHTML = '<img src="' + url + '" border="0" class="imagecontent" />';
}

//�Զ���ʾͼƬ
function imgautoshow() {
	var documentTop = document.documentElement.scrollTop|| document.body.scrollTop;
	var docHeight = document.documentElement.clientHeight|| document.body.clientHeight;
	for (i=0; i < divimgs.length; i++){
		if(documentTop > divimgs[i].offsetTop - docHeight - docHeight && documentTop < divimgs[i].offsetTop + divimgs[i].offsetHeight  && divimgs[i].innerHTML.toLowerCase().indexOf('<img') == -1){
			divimgs[i].innerHTML = '<img src="' + divimgs[i].title + '" border="0" class="imagecontent" />';
		}
	}
	setTimeout("imgautoshow()", 300);
}

//����ͼƬ��ʾ����
function imgcontentinit(){
	imgsearch();
	imgautoshow();
}

//����ͼƬ��ʾ����
if (document.all){
	window.attachEvent('onload',imgcontentinit);
}else{
	window.addEventListener('load',imgcontentinit,false);
}