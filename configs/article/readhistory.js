var hiscookiename = 'jieqiHistoryBooks'; //cookie����
var splitrecord = '|||'; //�ָ�ÿ����¼���ַ���
var splitfiled = '///'; //һ����¼����ָ���id���������Ե��ַ���
var hisbookmax = 20;  //��ౣ�������Ķ���¼


var hiscookievalue = jieqi_get_cookie(hiscookiename); //ȡcookie
var bookid = article_id; //��id
//����ҳ�����������
var searchword = document.title;
var searchlen = searchword.indexOf('-');
if(searchlen > 0) searchword = searchword.substr(0,searchlen);
searchword = searchword.replace(/(^\s*)|(\s*$)/g,  "");
var bookname=searchword; //����



//��cookie�������Ķ���¼����
var bookary = hiscookievalue.split(splitrecord);
var booknum = bookary.length;
var bidary = new Array();
var bnameary = new Array();   
var bookexists = 0;
var k = 0;
for(i=0; i<booknum; i++){
	tmpvar = bookary[i];
	tmpary = tmpvar.split(splitfiled);
	if(tmpary.length >= 2){
		bidary[k] = tmpary[0];
		bnameary[k] = tmpary[1];
		if(bidary[k] == bookid) bookexists = 1;
		k++;
	}
}
//��ʾ����Ķ�
if(k > 0){
	document.write('<div id="div_hisbooks" style="position:absolute;z-index:20; visibility:hidden;width:100;border:1px solid #000000;text-align:left;"><div style="background: #e4e1d8;text-align:center;line-height:150%;border-bottom:1px solid #000000;">����Ķ�</div><ul style="margin:0px; padding:3px; list-style:none; font-size:12px;background: #f0f0f0;">');
	for(i=k-1; i>=0; i--){
		document.write('<li><a href="/files/article/html/'+Math.floor(bidary[i] / 1000)+'/'+bidary[i]+'/index.html">'+bnameary[i]+'</a></li>');
	}
	document.write('</ul></div>');
	//����Ư��
	jieqi_move_layer('div_hisbooks');
}

//�µ�������Ķ���¼
if(bookexists == 0){
	//��ʷ��¼�ﵽ���ֵ��ɾ��һ��
	if(booknum >= hisbookmax){
		offset = hiscookievalue.indexOf(splitrecord);
		if(offset > 0){
			hiscookievalue = hiscookievalue.substr(offset + splitrecord.length);
		}
	}
	if(hiscookievalue.length > 0) hiscookievalue = hiscookievalue + splitrecord;
	hiscookievalue = hiscookievalue + bookid + splitfiled + bookname;
	var expDate = new Date(); 
	expDate.setTime(expDate.getTime() + (365*24*60*60*1000));

	
	document.cookie = hiscookiename+'=' + escape(hiscookievalue) + "; expires=" + expDate.toGMTString() +  "; path=/";     
}

//��ȡcookie
function jieqi_get_cookie(Name) {
	var search = Name + "="
	var returnvalue = "";
	if (document.cookie.length > 0) {
		offset = document.cookie.indexOf(search)
		if (offset != -1) {
			offset += search.length
			end = document.cookie.indexOf(";", offset);
			if (end == -1) end = document.cookie.length;
			returnvalue=unescape(document.cookie.substring(offset, end))
		}
	}
	return returnvalue;
}

//divƯ��
function jieqi_move_layer(layerName) {
	var divobj = document.getElementById(layerName);
	var x = window.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft || 0;
	var t = document.documentElement.offsetWidth || document.body.offsetWidth || 0;
	x = x + t - 20 - parseInt(divobj.style.width);
	var y = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
	y = y + 150;
	
	divobj.style.posTop = y;
	divobj.style.posLeft = x;
	divobj.style.visibility = 'visible';
	setTimeout("jieqi_move_layer('"+layerName+"');", 20);
}