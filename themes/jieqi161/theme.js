//下拉菜单
function menufix() {
	var sfEls=document.getElementById("jieqi_menu");
	if(sfEls) sfEls=sfEls.getElementsByTagName("li");
	if(sfEls){
		for(var i=0; i<sfEls.length; i++){
			sfEls[i].onmouseover=function(){ this.className="sfhover"; }
			sfEls[i].onmouseout=function(){ this.className="nohover"; }
			sfEls[i].onmousedown=function(){ this.className="sfhover"; }
			sfEls[i].onmouseup=function(){ this.className="sfhover"; }
		}
	}
}
if (document.all){
	window.attachEvent('onload',menufix);
}else{
	window.addEventListener('load',menufix,false);
}

//浮动提示框（显示title内容）
var tipname = "tips";
var tiptag = "a,label,div,img,span"; 
var tipx = 0;
var tipy = 15;
var tipobj = null;

function tipinit() {
	var tipNameSpaceURI = "http://www.w3.org/1999/xhtml";
	if(!tipContainerID){ var tipContainerID = tipname;}
	var tipContainer = document.getElementById(tipContainerID);

	if(!tipContainer) {
	  tipContainer = document.createElementNS ? document.createElementNS(tipNameSpaceURI, "div") : document.createElement("div");
		tipContainer.setAttribute("id", tipContainerID);
	  document.getElementsByTagName("body").item(0).appendChild(tipContainer);
	}

	if (!document.getElementById) return;
	tipobj = document.getElementById(tipname);
	if(tipobj) document.onmousemove = function(evt){tipmove(evt)};

	var a, sTitle, elements;
	
	var elementList = tiptag.split(",");
	for(var j = 0; j < elementList.length; j++)
	{	
		elements = document.getElementsByTagName(elementList[j]);
		if(elements)
		{
			for (var i = 0; i < elements.length; i ++)
			{
				a = elements[i];
				sTitle = a.getAttribute("title");				
				if(sTitle && typeof(a.onmouseover) != "function" && typeof(a.onmouseout) != "function")
				{
					a.setAttribute("tiptitle", sTitle);
					a.removeAttribute("title");
					a.removeAttribute("alt");
					a.onmouseover = function() {tipshow(this.getAttribute('tiptitle'))};
					a.onmouseout = function() {tiphide()};
				}
			}
		}
	}
}

function tipmove(evt) {
	if(tipobj.style.display == "block"){
		var x=0, y=0;
		if (document.all) {
			x = (document.documentElement && document.documentElement.scrollLeft) ? document.documentElement.scrollLeft : document.body.scrollLeft;
			y = (document.documentElement && document.documentElement.scrollTop) ? document.documentElement.scrollTop : document.body.scrollTop;
			x += window.event.clientX;
			y += window.event.clientY;
		} else {
			x = evt.pageX;
			y = evt.pageY;
		}
		tipobj.style.left = (x + tipx) + "px";
		tipobj.style.top = (y + tipy) + "px";
	}
}

function tipshow(text) {
	if (!tipobj) return;
	tipobj.innerHTML = text;
	tipobj.style.display = "block";
}

function tiphide() {
	if (!tipobj) return;
	tipobj.innerHTML = "";
	tipobj.style.display = "none";
}

if (document.all){
	window.attachEvent('onload',tipinit);
}else{
	window.addEventListener('load',tipinit,false);
} 

//tab效果
function selecttab(obj){
	var n = 0;
	var tabs = obj.parentNode.parentNode.getElementsByTagName("li"); 
	for(i=0; i<tabs.length; i++){
		tmp = tabs[i].getElementsByTagName("a")[0];
		if(tmp == obj){
			tmp.className="selected";
			n=i;
		}else{
			tmp.className="";
		}
 	}
	var contents = obj.parentNode.parentNode.parentNode.parentNode.getElementsByTagName("div")[1].getElementsByTagName("div");
	for(i=0; i<contents.length; i++){
		contents[i].style.display = i==n ? "block" : "none";   
 	}
}