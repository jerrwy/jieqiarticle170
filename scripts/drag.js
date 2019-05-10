/**
 * Base class of Drag
 * @example:
 * Drag.init( header_element, element );
 */
var Drag = {
	// �����element�����ã�һ��ֻ����קһ��Element
	obj: null , 
	/**
	 * @param: elementHeader	used to drag..
	 * @param: element			used to follow..
	 */
	init: function(elementHeader, element) {
		// �� start �󶨵� onmousedown �¼���������괥�� start
		elementHeader.onmousedown = Drag.start;
		// �� element �浽 header �� obj ���棬���� header ��ק��ʱ������
		elementHeader.obj = element;
		// ��ʼ�����Ե����꣬��Ϊ���� position = absolute ���Բ�����ʲô���ã����Ƿ�ֹ���� onDrag ��ʱ�� parse ������
		if(isNaN(parseInt(element.style.left))) {
			element.style.left = "0px";
		}
		if(isNaN(parseInt(element.style.top))) {
			element.style.top = "0px";
		}
		// ���Ͽ� Function����ʼ���⼸����Ա���� Drag.init �����ú�Űﶨ��ʵ�ʵĺ���
		element.onDragStart = new Function();
		element.onDragEnd = new Function();
		element.onDrag = new Function();
	},
	// ��ʼ��ק�İ󶨣��󶨵������ƶ��� event ��
	start: function(event) {
		var element = Drag.obj = this.obj;
		// �����ͬ������� event ģ�Ͳ�ͬ������
		event = Drag.fixE(event);
		// �����ǲ���������
		if(event.which != 1){
			// �����������������
			return true ;
		}
		// ������������Ľ��ͣ����Ͽ�ʼ��ק�Ĺ���
		element.onDragStart();
		// ��¼�������
		element.lastMouseX = event.clientX;
		element.lastMouseY = event.clientY;
		// ���¼�
		document.onmouseup = Drag.end;
		document.onmousemove = Drag.drag;
		return false ;
	}, 
	// Element���ڱ��϶��ĺ���
	drag: function(event) {
		event = Drag.fixE(event);
		if(event.which == 0 ) {
		 	return Drag.end();
		}
		// ���ڱ��϶���Element
		var element = Drag.obj;
		// �������
		var _clientX = event.clientY;
		var _clientY = event.clientX;
		// ������û����ʲô������
		if(element.lastMouseX == _clientY && element.lastMouseY == _clientX) {
			return	false ;
		}
		// �ղ� Element ������
		var _lastX = parseInt(element.style.top);
		var _lastY = parseInt(element.style.left);
		// �µ�����
		var newX, newY;
		// �����µ����꣺ԭ�ȵ�����+����ƶ���ֵ��
		newX = _lastY + _clientY - element.lastMouseX;
		newY = _lastX + _clientX - element.lastMouseY;
		// �޸� element ����ʾ����
		element.style.left = newX + "px";
		element.style.top = newY + "px";
		// ��¼ element ���ڵ����깩��һ���ƶ�ʹ��
		element.lastMouseX = _clientY;
		element.lastMouseY = _clientX;
		// ������������Ľ��ͣ��ҽ��� Drag ʱ�Ĺ���
		element.onDrag(newX, newY);
		return false;
	},
	// Element ���ڱ��ͷŵĺ�����ֹͣ��ק
	end: function(event) {
		event = Drag.fixE(event);
		// ����¼���
		document.onmousemove = null;
		document.onmouseup = null;
		// �ȼ�¼�� onDragEnd �Ĺ��ӣ����Ƴ� obj
		var _onDragEndFuc = Drag.obj.onDragEnd();
		// ��ק��ϣ�obj ���
		Drag.obj = null ;
		return _onDragEndFuc;
	},
	// �����ͬ������� event ģ�Ͳ�ͬ������
	fixE: function(ig_) {
		if( typeof ig_ == "undefined" ) {
			ig_ = window.event;
		}
		if( typeof ig_.layerX == "undefined" ) {
			ig_.layerX = ig_.offsetX;
		}
		if( typeof ig_.layerY == "undefined" ) {
			ig_.layerY = ig_.offsetY;
		}
		if( typeof ig_.which == "undefined" ) {
			ig_.which = ig_.button;
		}
		return ig_;
	}
};