function menuFix() {
  var sfEls = document.getElementById("jieqi_menu").getElementsByTagName("li");
  for (var i=0; i<sfEls.length; i++) {
    sfEls[i].onmouseover=function() {
      this.className+=(this.className.length>0? " ": "") + "sfhover";
    }
    sfEls[i].onMouseDown=function() {
      this.className+=(this.className.length>0? " ": "") + "sfhover";
    }
    sfEls[i].onMouseUp=function() {
      this.className+=(this.className.length>0? " ": "") + "sfhover";
    }
    sfEls[i].onmouseout=function() {
      this.className=this.className.replace(new RegExp("( ?|^)sfhover\\b"), "");
    }
  }
}
window.onload=menuFix;