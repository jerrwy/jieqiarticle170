//取得一个对象，相当于getElementById()
function $_() {
  var elements = new Array();
  for (var i = 0; i < arguments.length; i++) {
    var element = arguments[i];
    if (typeof element == 'string') element = document.getElementById(element);
	Method.Element.apply(element);
    if (arguments.length == 1) return element;
    elements.push(element);
  }
  return elements;
}
//兼容jquery
if(typeof $ == "undefined") $ = $_;

//把它接收到的单个的参数转换成一个Array对象。
function $A(list){
	var arr = [];
	for (var i=0,len=list.length; i<len; i++){arr[i] = list[i];}
	return arr;
}

//常用函数扩展
var Method = {
	Element	: function(){
		this.hide = function(){this.style.display="none"; return this;};
		this.show = function(){this.style.display=""; return this;};
		this.getValue = function(){if(this.value === undefined) return this.innerHTML; else return this.value;};
		this.setValue = function(s){if(this.value === undefined) this.setInnerHTML(s); else this.value = s;};
		this.subTag = function(){return $A(this.getElementsByTagName(arguments[0])).each(function(n){$_(n);});};
		this.remove = function(){return this.parentNode.removeChild(this);};
		this.nextElement = function(){var n = this;	for(var i=0,n; n = n.nextSibling; i++) if(n.nodeType==1) return $_(n); return null;};
		this.previousElement = function(){var n = this;	for (var i=0,n; n = n.previousSibling; i++) if(n.nodeType==1) return $_(n); return null;};
		this.getPosition =  function(){var e = this; var t=e.offsetTop; var l=e.offsetLeft; while(e=e.offsetParent){if($_(e).getStyle('position') == 'absolute' || $_(e).getStyle('position') == 'relative') break; t+=e.offsetTop; l+=e.offsetLeft;} return {x:l, y:t};};
		this.getStyle = function(name){ if(this.style[name]) return this.style[name]; else if(this.currentStyle) return this.currentStyle[name]; else if(document.defaultView && document.defaultView.getComputedStyle){ name = name.replace(/([A-Z])/g,"-$1").toLowerCase(); var s = document.defaultView.getComputedStyle(this,""); return s && s.getPropertyValue(name); } else return null;};
		this.setInnerHTML = function(s){var ua = navigator.userAgent.toLowerCase();s = s.replace(/<script([^>]+)src\s*=\s*\"([^>\"\']*)\"([^>]*)>\s*<\/script>/gi,'');if (ua.indexOf('msie') >= 0 && ua.indexOf('opera') < 0){ s = '<div style="display:none">for IE</div>' + s; s = s.replace(/<script([^>]*)>/gi,'<script$1 defer>'); this.innerHTML = '';this.innerHTML = s;	this.removeChild(this.firstChild);}else{var el_next = this.nextSibling; var el_parent = this.parentNode; el_parent.removeChild(this); this.innerHTML = s; if(el_next) el_parent.insertBefore(this, el_next); else el_parent.appendChild(this);}};	
	},
	Array :	function(){
		this.indexOf = function(){for (i=0; i<this.length; i++) if (this[i]==arguments[0]) return i; return -1;};
		this.each = function(fn){for (var i=0,len=this.length; i<len; i++){	fn(this[i],i);} return this;};
	},
	String : function(){
		this.trim = function(){var _re,_argument = arguments[0] || " ";	typeof(_argument)=="string"?(_argument == " "?_re = /(^\s*)|(\s*$)/g : _re = new RegExp("(^"+_argument+"*)|("+_argument+"*$)","g")) : _re = _argument; return this.replace(_re,"");};
		this.stripTags = function(){return this.replace(/<\/?[^>]+>/gi, '');};
		this.cint = function(){return this.replace(/\D/g,"")*1;};
		this.hasSubString = function(s,f){if(!f) f="";return (f+this+f).indexOf(f+s+f)==-1?false:true;};
	}
};
Method.Array.apply(Array.prototype);
Method.String.apply(String.prototype);

//cookie处理
var Cookie = {
    get : function(n){
	    var dc = "; "+document.cookie+"; ";
	    var coo = dc.indexOf("; "+n+"=");
	    if (coo!=-1){
		    var s = dc.substring(coo+n.length+3,dc.length);
		    return unescape(s.substring(0, s.indexOf("; ")));
	    }else{
		    return null;
	    }
    },
    set : function(name,value,expires,path,domain,secure){
        var expDays = expires*24*60*60*1000;
        var expDate = new Date();
        expDate.setTime(expDate.getTime()+expDays);
        var expString = expires ? "; expires="+expDate.toGMTString() : "";
        var pathString = "; path="+(path||"/");
		var domain = domain ? "; domain="+domain : "";
        document.cookie = name + "=" + escape(value) + expString + domain + pathString + (secure?"; secure":"");
    },
    del : function(n){
	    var exp = new Date();
	    exp.setTime(exp.getTime() - 1);
	    var cval=this.get(n);
	    if(cval!=null) document.cookie= n + "="+cval+";expires="+exp.toGMTString();
    }
}

//form相关函数
var Form = {
	//把表格内容转化成string
  serialize: function(form) {
    var elements = Form.getElements($_(form));
    var queryComponents = new Array();
    for (var i = 0; i < elements.length; i++) {
      var queryComponent = Form.Element.serialize(elements[i]);
      if (queryComponent) queryComponents.push(queryComponent);
    }
    return queryComponents.join('&');
  },
  //取得表单内容为数组形式
  getElements: function(form) {
    form = $_(form);
    var elements = new Array();
    for (tagName in Form.Element.Serializers) {
      var tagElements = form.getElementsByTagName(tagName);
      for (var j = 0; j < tagElements.length; j++)
        elements.push(tagElements[j]);
    }
    return elements;
  },
  //disable表单所有内容
  disable: function(form) {
    var elements = Form.getElements(form);
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      element.blur();
      element.disabled = 'true';
    }
  },
  //enable表单所有内容
  enable: function(form) {
    var elements = Form.getElements(form);
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      element.disabled = '';
    }
  },
  //Reset表单
  reset: function(form) {
    $_(form).reset();
  }
}

//form里面元素定义
Form.Element = {
  serialize: function(element) {
    element = $_(element);
    var method = element.tagName.toLowerCase();
    var parameter = Form.Element.Serializers[method](element);
    if (parameter) {
      var key = encodeURIComponent(parameter[0]);
      if (key.length == 0) return;
      if (parameter[1].constructor != Array) return key + '=' + encodeURIComponent(parameter[1]);
	  tmpary = new Array();
	  for (var i = 0; i < parameter[1].length; i++) {
		  tmpary[i] = key + encodeURIComponent('[]') + '=' + encodeURIComponent(parameter[1][i]);
	  }
      return tmpary.join('&');
    }	
  },
  getValue: function(element) {
    element = $_(element);
    var method = element.tagName.toLowerCase();
    var parameter = Form.Element.Serializers[method](element);
    if (parameter) return parameter[1];
  }
}

Form.Element.Serializers = {
  input: function(element) {
    switch (element.type.toLowerCase()) {
      case 'submit':
      case 'hidden':
      case 'password':
      case 'text':
        return Form.Element.Serializers.textarea(element);
      case 'checkbox':
      case 'radio':
        return Form.Element.Serializers.inputSelector(element);
    }
    return false;
  },

  inputSelector: function(element) {
    if (element.checked) return [element.name, element.value];
  },

  textarea: function(element) {
    return [element.name, element.value];
  },

  select: function(element) {
    return Form.Element.Serializers[element.type == 'select-one' ? 'selectOne' : 'selectMany'](element);
  },

  selectOne: function(element) {
    var value = '', opt, index = element.selectedIndex;
    if (index >= 0) {
      opt = element.options[index];
      value = opt.value;
      if (!value && !('value' in opt))
        value = opt.text;
    }
    return [element.name, value];
  },

  selectMany: function(element) {
    var value = new Array();
    for (var i = 0; i < element.length; i++) {
      var opt = element.options[i];
      if (opt.selected) {
        var optValue = opt.value;
        if (!optValue && !('value' in opt))
          optValue = opt.text;
        value.push(optValue);
      }
    }
    return [element.name, value];
  }
}

//取form里面物件的值，等同于Form.Element.getValue()
var $F = Form.Element.getValue;

//ajax处理
function jieqi_ajax() {
	this.init = function() {
		this.handler = null;
		this.method = "POST";
  		this.queryStringSeparator = "?";
		this.argumentSeparator = "&";
		this.URLString = "";
		this.encodeURIString = true;
  		this.execute = false;
		this.requestFile = null;
		this.vars = new Object();
		this.responseStatus = new Array(2);
		this.failed = false;
		this.response = "";
		this.asynchronous = true;

		this.onLoading = function() { };
  		this.onLoaded = function() { };
  		this.onInteractive = function() { };
  		this.onComplete = function() { };
  		this.onError = function() { };
		this.onFail = function() { };

		try {
			this.handler = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {
				this.handler = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {
				this.handler = null;
			}
		}

		if (! this.handler) {
			if (typeof XMLHttpRequest != "undefined") {
				this.handler = new XMLHttpRequest();
			} else {
				this.failed = true;
			}
		}
  	};
	this.setVar = function(name, value, encoded){
		this.vars[name] = Array(value, encoded);
	};
	this.encVar = function(name, value, returnvars) {
		if (true == returnvars) {
			return Array(encodeURIComponent(name), encodeURIComponent(value));
		} else {
			this.vars[encodeURIComponent(name)] = Array(encodeURIComponent(value), true);
		}
	};
	this.processURLString = function(string, encode) {
		//regexp = new RegExp(this.argumentSeparator + "|" + encodeURIComponent(this.argumentSeparator));
		regexp = new RegExp(this.argumentSeparator);
		varArray = string.split(regexp);
		for (i = 0; i < varArray.length; i++){
			urlVars = varArray[i].split("=");
			if (true == encode){
				this.encVar(urlVars[0], urlVars[1], false);
			} else {
				this.setVar(urlVars[0], urlVars[1], true);
			}
		}
	};
	this.createURLString = function(urlstring) {
		if (urlstring) {
			if (this.URLString.length) {
				this.URLString += this.argumentSeparator + urlstring;
			} else {
				this.URLString = urlstring;
			}
		}
		this.setVar("ajax_request", new Date().getTime(), false);
		urlstringtemp = new Array();
		for (key in this.vars) {
			if (false == this.vars[key][1] && true == this.encodeURIString) {
				encoded = this.encVar(key, this.vars[key][0], true);
				delete this.vars[key];
				this.vars[encoded[0]] = Array(encoded[1], true);
				key = encoded[0];
			}
			urlstringtemp[urlstringtemp.length] = key + "=" + this.vars[key][0];
		}
		if (urlstring){
			this.URLString += this.argumentSeparator + urlstringtemp.join(this.argumentSeparator);
		} else {
			this.URLString += urlstringtemp.join(this.argumentSeparator);
		}
	};
	this.runResponse = function() {
		eval(this.response);
	};
	this.runAJAX = function(urlstring) {
		if (this.failed) {
			this.onFail();
		} else {
			if(this.requestFile.indexOf(this.queryStringSeparator) > 0){
				var spoint = this.requestFile.indexOf(this.queryStringSeparator);
				this.processURLString(this.requestFile.substr(spoint + this.queryStringSeparator.length), false);
				this.requestFile = this.requestFile.substr(0, spoint);
			}
			this.createURLString(urlstring);
			if (this.handler) {
				var self = this;
				
				if (this.method == "GET") {
					totalurlstring = this.requestFile + this.queryStringSeparator + this.URLString;
					this.handler.open(this.method, totalurlstring, this.asynchronous);
				} else {
					this.handler.open(this.method, this.requestFile, this.asynchronous);
					try {
						this.handler.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
					} catch (e) { }
				}

				this.handler.onreadystatechange = function() {
					switch (self.handler.readyState) {
						case 1:
							self.onLoading();
							break;
						case 2:
							self.onLoaded();
							break;
						case 3:
							self.onInteractive();
							break;
						case 4:
							self.response = self.handler.responseText;
							self.responseXML = self.handler.responseXML;
							self.responseStatus[0] = self.handler.status;
							self.responseStatus[1] = self.handler.statusText;

							if (self.execute) {
								self.runResponse();
							}

							if (self.responseStatus[0] == "200") {
								self.onComplete();
							} else {
								self.onError();
							}

							self.URLString = "";
							break;
					}
				}
				this.handler.send(this.method == "GET" ? null : this.URLString);
			}
		}
	};
	this.submitForm = function(form) {
		if(this.requestFile == null) this.requestFile = $_(form).attributes["action"].value;
		this.runAJAX(Form.serialize(form));
	};
	this.init();
}

//ajax功能对象
var Ajax = {
	Request	: function(vname, vars){
		var ajax = new jieqi_ajax();
		var param = {method:"",parameters:"",asynchronous:true,onLoading:function(){},onLoaded:function(){},onInteractive:function(){},onComplete:function(){},onError:function(){},onFail:function(){}};
		for (var key in vars) param[key] = vars[key];
		if(param["parameters"] != "") ajax.processURLString(param["parameters"], false);
		ajax.asynchronous = param["asynchronous"];
		ajax.onLoading = param["onLoading"];
		ajax.onLoaded = param["onLoaded"];
		ajax.onInteractive = param["onInteractive"];
		ajax.onError = param["onError"];
		ajax.onFail = param["onFail"];
		ajax.onComplete = param["onComplete"];
		if($_(vname) != null && typeof $_(vname).tagName != "undefined" && $_(vname).tagName.toLowerCase() == "form"){
			ajax.method = param["method"]=="" ? "POST" : param["method"];
			ajax.submitForm(vname);
		}else{
			ajax.method = param["method"]=="" ? "GET" : param["method"];
			ajax.requestFile = vname;
			ajax.runAJAX();
		}
	},
	Update : function(vname, vars){
		var param = {outid:"",tipid:"",onLoading:"", outhide:0, cursor:"wait", parameters:""};
		for (var key in vars) param[key] = vars[key];

		var isform = ($_(vname) != null && typeof $_(vname).tagName != "undefined" && $_(vname).tagName.toLowerCase() == "form") ? true : false;

		if(typeof param["onLoading"] == 'function'){
			var doLoading = param["onLoading"];
		}else{
			var doLoading = function(){
				if(param["cursor"] != "") document.body.style.cursor=param["cursor"];
				if(param["tipid"] != null && param["tipid"] != "") {$_(param["tipid"]).setValue(param["onLoading"]);$_(param["tipid"]).show();}
				if(isform) Form.disable(vname);
			}
		}
		var doComplete = function(){
			if(param["cursor"] != "") document.body.style.cursor="auto";
			if(param["tipid"] != null && param["tipid"] != "") {$_(param["tipid"]).setValue("");$_(param["tipid"]).hide();}
			if(param["outid"] != "") {$_(param["outid"]).setValue(this.response);$_(param["outid"]).show();}
			if(param["outhide"] != "") {setTimeout(function(){$_(param["outid"]).hide()},param["outhide"]);}
			if(isform) Form.enable(vname);
		}
		var doError = function(){
			if(param["outid"] != "")  $_(param["outid"]).setValue("ERROR:"+this.responseStatus[1]+"("+this.responseStatus[0]+")");
			if(isform) Form.enable(vname);
		}
		var doFail = function() {
			alert("Your browser does not support AJAX!");
			if(isform) Form.enable(vname);
		}
		
		Ajax.Request(vname, {onLoading:doLoading, onComplete:doComplete, onError:doError, onFail:doFail, parameters:param["parameters"]});
	},
	Tip : function(event, url, timeout){
		event = event ? event : (window.event ? window.event : null);
		timeout = timeout ? timeout : 3000;
		var eid = event.srcElement ? event.srcElement.id : event.target.id;
		var tid = eid + "_tip";
		var ele = $_(eid);
		var pos = ele.getPosition();
		var atip  = $_(tid);
		if(!atip) {
			atip = document.createElement("div");
			atip.id = tid;
			atip.style.display = "none";
			atip.className = "ajaxtip";
			document.body.appendChild(atip);
			atip.onclick = function(){$_(tid).hide();};
		}
		atip.style.top = (pos.y + ele.offsetHeight + 2)  + "px";
		atip.style.left = pos.x + "px";
		atip.innerHTML = "";
		atip.style.display="";
		this.Update(url, {outid:tid, tipid:tid, onLoading:"Loading...", outhide:timeout, cursor:"wait"});
	}
}

//页面宽度
function pageWidth(){
	return window.innerWidth != null ? window.innerWidth : document.documentElement && document.documentElement.clientWidth ? document.documentElement.clientWidth : document.body != null ? document.body.clientWidth : null;
}
//页面高度
function pageHeight(){
	return window.innerHeight != null? window.innerHeight : document.documentElement && document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body != null? document.body.clientHeight : null;
}
//页顶坐标
function pageTop(){
	return typeof window.pageYOffset != 'undefined' ? window.pageYOffset : document.documentElement && document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop ? document.body.scrollTop : 0;
}
//页左坐标
function pageLeft(){
	return typeof window.pageXOffset != 'undefined' ? window.pageXOffset : document.documentElement && document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft ? document.body.scrollLeft : 0;
}
//显示阴影背景
function showMask(){
	var sWidth,sHeight;
	sWidth = document.body.scrollWidth;
	sWidth = window.screen.availWidth > document.body.scrollWidth ? window.screen.availWidth : document.body.scrollWidth;
	sHeight = window.screen.availHeight > document.body.scrollHeight ? window.screen.availHeight : document.body.scrollHeight;
	var mask = document.createElement("div");
	mask.setAttribute('id','mask');
	mask.style.width = sWidth + "px";
	mask.style.height = sHeight + "px";
	mask.style.zIndex = "5000";
	document.body.appendChild(mask);
}
//隐藏阴影背景
function hideMask(){
	var mask = document.getElementById("mask");
	if(mask != null){
		if(document.body) document.body.removeChild(mask); 
		else document.documentElement.removeChild(mask); 
	}
}

var dialogs = new Array();
//显示弹出框
function displayDialog(html){
	var dialog;
	dialog = document.getElementById("dialog");
	if(dialog != null) closeDialog(1);
	dialog = document.createElement("div");
	dialog.setAttribute('id','dialog');
	dialog.style.zIndex = "6000";
	if(document.all){
		dialog.style.width = "300px";
		dialog.style.height = "200px";
	}
	document.body.appendChild(dialog);
	$_("dialog").setInnerHTML( html + '<iframe src="" frameborder="0" style="position:absolute;visibility:inherit;top:0px;left:0px;width:0px !important; height:0px !important;width:expression(this.parentNode.offsetWidth);height:expression(this.parentNode.offsetHeight);z-index:-1;filter=\'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)\';"></iframe><a onclick="closeDialog()" style="position:absolute;top: 5px;right:5px;display:inline-block;cursor:pointer;font-size:14px;font-weight:bold;font-family:Arial;color:#333333;outline:thin solid #cccccc;border:1px solid #ffffff;padding:1px 4px;">X</a>');
	var dialog_w = parseInt(dialog.scrollWidth);
	var dialog_h = parseInt(dialog.scrollHeight);
	if(dialog_w < 300){
		dialog.style.width = "300px";
		dialog_w = parseInt(dialog.clientWidth);
	}else{
		dialog.style.width = dialog_w + "px";
	}
	if(dialog_h < 200){
		dialog.style.height = "200px";
		dialog_h = parseInt(dialog.clientHeight);
	}else{
		dialog.style.height = dialog_h + "px";
	}
	var page_w = pageWidth(); 
	var page_h = pageHeight();
	var page_l = pageLeft();
	var page_t = pageTop();

	var dialog_top = page_t + (page_h / 2) - (dialog_h / 2);
	if(dialog_top < page_t) dialog_top = page_t;
	var dialog_left = page_l + (page_w / 2) - (dialog_w / 2);
	if(dialog_left < page_l) dialog_left = page_l + page_w - dialog_w;

	dialog.style.left = dialog_left + "px";
	dialog.style.top =  dialog_top + "px";
	dialog.style.visibility = "visible";
}
//根据url打开弹出框
function openDialog(url, mask){
	if(mask) showMask();
	if(typeof dialogs[url] == 'undefined'){
		if(url.match(/\.(gif|jpg|jpeg|png|bmp)$/ig)){
			dialogs[url]='<img src="'+url+'" class="imgdialog" onclick="closeDialog()" style="cursor:pointer" />';
			displayDialog(dialogs[url]);
		}else{
			Ajax.Request(url,{onLoading:function(){dialogs[url]=this.response; displayDialog('Loading...');}, onComplete:function(){dialogs[url]=this.response; displayDialog(this.response);}});
		}
	}else{
		displayDialog(dialogs[url]);
	}
}
//关闭弹出框
function closeDialog(){
	var dialog = document.getElementById("dialog");
	if(document.body){
		document.body.removeChild(dialog); 
	}else{
		document.documentElement.removeChild(dialog); 
	}
	if(arguments.length == 0) hideMask();
}
//图片缩小的适合大小
function imgResize(obj){
	var width = arguments.length < 2 ? 600 : arguments[1];
	if(obj.width > width) {
		obj.resized = true; 
		obj.width = width;
		obj.style.cursor='pointer';
	}
}
//图片功能菜单
function imgMenu(obj){

}
//显示图片弹出框
function  imgDialog(url){
	if(arguments.length < 2 || arguments[1].resized) openDialog(url, true);
}
//载入js
function loadJs(url){
	if(arguments.length >= 2 && typeof arguments[1] == 'function') funload = arguments[1];
	if(arguments.length >= 3 && typeof arguments[2] == 'function') funerror = arguments[2];
	var ss=document.getElementsByTagName("script");
	for(i=0;i<ss.length;i++){
		if(ss[i].src && ss[i].src.indexOf(url) != -1){
			if(typeof funload == "function") funload();
			return;
		}
	}
	s=document.createElement("script");
	s.type="text/javascript";
	s.defer = "defer";
	s.src=url;
	document.getElementsByTagName("head")[0].appendChild(s);
	
	if(document.all){
		s.onreadystatechange=function(){
			 if((this.readyState == 'loaded' || this.readyState == 'complete') && typeof funload == "function") funload(); 
		}
	}else{
		s.onload=function(){
			if(typeof funload == "function") funload();
		}
	}
	
	s.onerror=function(){
		this.parentNode.removeChild(this);
		if(typeof funerror == "function") funerror();
	}
}
//载入CSS
function loadCss(url){
	var c=document.createElement("link"); 
	c.rel="stylesheet";
	c.type="text/css";
	c.href=url;
	document.getElementsByTagName("head")[0].appendChild(c);
}
//获得事件
function getEvent() {
	if(window.event) return window.event;
	func = getEvent.caller;
	while(func != null) {
		var arg0 = func.arguments[0];
		if (arg0) {
			if((arg0.constructor  == Event || arg0.constructor == MouseEvent) || (typeof(arg0) == "object" && arg0.preventDefault && arg0.stopPropagation)) {
				return arg0;
			}
		}
		func=func.caller;
	}
	return null;
}
//取消事件
function stopEvent(event) {
	e = event ? event : window.event;
	if(!e) e = getEvent();
	if(e && document.all) {
		e.returnValue = false;
		e.cancelBubble = true;
	} else if(e) {
		e.stopPropagation();
		e.preventDefault();
	}
}