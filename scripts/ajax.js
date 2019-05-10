//取得一个对象，相当于getElementById()
function $() {
  var elements = new Array();
  for (var i = 0; i < arguments.length; i++) {
    var element = arguments[i];
    if (typeof element == 'string')
      element = document.getElementById(element);
    if (arguments.length == 1)
      return element;
    elements.push(element);
  }
  return elements;
}

//把它接收到的单个的参数转换成一个Array对象。
var $A = Array.from = function(iterable) {
  if (!iterable) return [];
  if (iterable.toArray) {
    return iterable.toArray();
  } else {
    var results = [];
    for (var i = 0; i < iterable.length; i++)
      results.push(iterable[i]);
    return results;
  }
}

//form相关函数
var Form = {
	//把表格内容转化成string
  serialize: function(form) {
    var elements = Form.getElements($(form));
    var queryComponents = new Array();
    for (var i = 0; i < elements.length; i++) {
      var queryComponent = Form.Element.serialize(elements[i]);
      if (queryComponent) queryComponents.push(queryComponent);
    }
    return queryComponents.join('&');
  },
  //取得表格内容为数组形式
  getElements: function(form) {
    form = $(form);
    var elements = new Array();

    for (tagName in Form.Element.Serializers) {
      var tagElements = form.getElementsByTagName(tagName);
      for (var j = 0; j < tagElements.length; j++)
        elements.push(tagElements[j]);
    }
    return elements;
  },
  //disable表格所有内容
  disable: function(form) {
    var elements = Form.getElements(form);
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      element.blur();
      element.disabled = 'true';
    }
  },
  //enable表格所有内容
  enable: function(form) {
    var elements = Form.getElements(form);
    for (var i = 0; i < elements.length; i++) {
      var element = elements[i];
      element.disabled = '';
    }
  },
  //找到form里面第一个元素
  findFirstElement: function(form) {
    return Form.getElements(form).find(function(element) {
      return element.type != 'hidden' && !element.disabled &&
        ['input', 'select', 'textarea'].include(element.tagName.toLowerCase());
    });
  },
  //把焦点集中在表格第一个元素上
  focusFirstElement: function(form) {
    Field.activate(Form.findFirstElement(form));
  },
  //Reset表格
  reset: function(form) {
    $(form).reset();
  }
}

//form里面元素定义
Form.Element = {
  serialize: function(element) {
    element = $(element);
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
    element = $(element);
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

//*******************************************************
// ajax类
//*******************************************************

function jieqi_ajax(url) {
	this.handler = null;
	//初始化
	this.init = function() {
		this.method = "POST";
  		this.queryStringSeparator = "?";
		this.argumentSeparator = "&";
		this.URLString = "";
		this.encodeURIString = true;
  		this.execute = false;
		this.requestFile = url;
		this.vars = new Object();
		this.responseStatus = new Array(2);
		this.failed = false;
		this.response ="";

		this.onLoading = function() { };
  		this.onLoaded = function() { };
  		this.onInteractive = function() { };
  		this.onCompletion = function() { };
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

	//设置变量
	this.setVar = function(name, value){
		this.vars[name] = Array(value, false);
	};

	//变量编码
	this.encVar = function(name, value, returnvars) {
		if (true == returnvars) {
			return Array(encodeURIComponent(name), encodeURIComponent(value));
		} else {
			this.vars[encodeURIComponent(name)] = Array(encodeURIComponent(value), true);
		}
	}

	//拆分查询字符串
	this.processURLString = function(string, encode) {
		encoded = encodeURIComponent(this.argumentSeparator);
		regexp = new RegExp(this.argumentSeparator + "|" + encoded);
		varArray = string.split(regexp);
		for (i = 0; i < varArray.length; i++){
			urlVars = varArray[i].split("=");
			if (true == encode){
				this.encVar(urlVars[0], urlVars[1]);
			} else {
				this.setVar(urlVars[0], urlVars[1]);
			}
		}
	}
	
	//建立编码后的查询字符串
	this.createURLString = function(urlstring) {
		if (urlstring) {
			if (this.URLString.length) {
				this.URLString += this.argumentSeparator + urlstring;
			} else {
				this.URLString = urlstring;
			}
		}
		this.setVar("fromajax", new Date().getTime());
		this.setVar("ajax_request", new Date().getTime());
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
	}

	//运行结果
	this.runResponse = function() {
		eval(this.response);
	}
	
	//提交信息
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
					this.handler.open(this.method, totalurlstring, true);
				} else {
					this.handler.open(this.method, this.requestFile, true);
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
								self.onCompletion();
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
	}

	//提交form
	this.submitForm = function(form) {
		if(this.requestFile == null) this.requestFile = $(form).action;
		//this.URLString = Form.serialize(form);
		this.runAJAX(Form.serialize(form));
	}

	this.init();
}

//url, show, tip, loading, loaded, interactive, completed
function ajax_gethtml(){
	if(arguments.length == 0) return false;
	var url = arguments.length > 0 ? arguments[0] : "";
	var show = arguments.length > 1 ? arguments[1] : "";
	var tip = arguments.length > 2 ? arguments[2] : "";
	var loading = arguments.length > 3 ? arguments[3] : "";
	var loaded = arguments.length > 4 ? arguments[4] : "";
	var interactive = arguments.length > 5 ? arguments[5] : "";
	var completed = arguments.length > 6 ? arguments[6] : "";
	var ajax = new jieqi_ajax();
	ajax.method = "GET";
	ajax.requestFile = url;
	if(tip != ""){
		$(tip).innerHTML = "";
		$(tip).style.display = "";
		if(loading != "") ajax.onLoading = function(){$(tip).innerHTML = loading;};
		if(loaded != "") ajax.onLoaded = function(){$(tip).innerHTML = loaded;};
		if(interactive != "") ajax.onInteractive = function(){$(tip).innerHTML = interactive;};
		ajax.onError = function() {$(tip).innerHTML = "ERROR:"+ajax.responseStatus[1]+"("+ajax.responseStatus[0]+")";};
		ajax.onFail = function() {$(tip).innerHTML = "Your browser does not support AJAX!";};
	}
	ajax.onCompletion = function(){
		if(tip != ""){
			if(completed != "") $(tip).innerHTML = completed;
			else if(tip != show){
				$(tip).innerHTML = "";
				$(tip).style.display = "none";
			}
		}
		$(show).innerHTML = ajax.response;
	};
	ajax.runAJAX();
}

