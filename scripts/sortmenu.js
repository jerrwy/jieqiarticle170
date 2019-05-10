/**
 * ���޼�����ѡ��˵���
 * sortValue:���ѡ����ֵ��ҳ��Ԫ������
 * sortSelect:��ʾ�ò˵���ҳ��Ԫ������
 * sortArray:��ʾ�˵���������飬��ʽ����
 * sortArray[0] = ["���ID1", "���һ", "����ID1"];
 * sortArray[1] = ["���ID2", "����", "����ID2"];
 * sortCaption:��������Ĭ����ʾ���ַ������硰��ѡ��...��
 */
function sortMenu(sortValue, sortSelect, sortArray, selectSize, sortCaption)
{
	this.sortValue=document.getElementById(sortValue);
    this.sortSelect=document.getElementById(sortSelect);
	this.sortArray=sortArray;
	this.selectSize=selectSize;
	this.sortCaption=sortCaption;

	/**
	 * ��ȡ��һ����࣬����ʾ��sortSelect��
	 */
	this.initSorts=function()
	{
        this.sortValue.value=0;
        _select=document.createElement("select");
		this.sortSelect.insertBefore(_select,this.sortSelect.firstChild); 
        _select.sortMenuObj=this;
        _select.onchange=function()
        {
            this.sortMenuObj.setSorts(this,this.sortMenuObj);
        }
		_select.size = this.selectSize;
        _select.options.add(new Option(this.sortCaption,""));
		for (var i = 0; i < this.sortArray.length; i++)
		{
			if (this.sortArray[i][2] == 0)
			{
                _select.options.add(new Option(this.sortArray[i][1],this.sortArray[i][0]));
			}
		}		
	}

	/**
	 * ����������
	 * _curSelect:��ǰѡ���������
	 */
	this.setSorts=function(_curSelect)
	{
		//����ǰ��������滹�������򣬼����¼�������ʱ������¼��������ں�������������¼�����
		//�¼��������뵱ǰ���������ڶ�����ʾ��sortSelect�У����������ֵܹ�ϵ��������nextSibling��ȡ
		while (_curSelect.nextSibling)
		{
			_curSelect.parentNode.removeChild(_curSelect.nextSibling);
		}
		
		//��ȡ��ǰѡ���ֵ
		_iValue = _curSelect.options[_curSelect.selectedIndex].value;
		//���ѡ������������һ��(��һ���ֵΪ"")
		if (_iValue == "")
		{
			//�������ϼ�������
			if (_curSelect.previousSibling)
			{
				//ȡֵΪ�ϼ�������ѡ��ֵ
				this.sortValue.value = _curSelect.previousSibling.options[_curSelect.previousSibling.selectedIndex].value;
			}
			else
			{
				//û�ϼ���ȡֵΪ0
				this.sortValue.value = 0;
			}
			//ѡ���һ��(��ѡ��...),û���¼�ѡ��,����Ҫ����
			return false;
		}
		//ѡ��Ĳ��ǵ�һ��
		this.sortValue.value = _iValue;
		
		//ȥ����ǰ������ԭ����ѡ��״̬
        //��ѡ�е�ѡ���Ӧ�������Ϊ selected
        for (i=0;i<_curSelect.options.length;i++)
        {
            if (_curSelect.options[i].selected=="selected")
            {
                _curSelect.options[i].removeAttribute("selected");
            }
            if (_curSelect.options[i].value==_iValue)
            {
                _curSelect.options[i].selected="selected";
            }
        }
        //�����ɵ��¼������б�
        _hasChild=false;
        for (var i = 0; i < this.sortArray.length; i++)
		{
            if (this.sortArray[i][2] == _iValue)
            {
                if (_hasChild==false)
                {
                    _siblingSelect=document.createElement("select");
                    this.sortSelect.appendChild(_siblingSelect);
                    _siblingSelect.sortMenuObj=this;
                    _siblingSelect.onchange=function()
                    {
                        this.sortMenuObj.setSorts(this,this.sortMenuObj);
                    }
					_siblingSelect.size = this.selectSize;
                    _siblingSelect.options.add(new Option(this.sortCaption,""));
                    _siblingSelect.options.add(new Option(this.sortArray[i][1],this.sortArray[i][0]));
                    _hasChild=true;
                }
                else
                {                   
                    _siblingSelect.options.add(new Option(this.sortArray[i][1],this.sortArray[i][0]));
                }
            }
        }
	}

	/**
	 * ������С��ѡȡֵ�������������˵�,�ɺ���ǰ�ݹ����
	 * _minCataValue:��С���ȡֵ
	 */
	this.init=function(_minCataValue)
	{
        if (this.sortValue.value=="undefined" || this.sortValue.value=="")
        {
            this.sortValue.value=_minCataValue;
        }
		if (_minCataValue == 0)
		{
			//minCataValueΪ0��Ҳ���ǳ�ʼ����
			this.initSorts();
			//��ʼ����ɺ��˳�����
			return false;
		}
		//����ID
		_parentID=null;
        _select=document.createElement("select");
        _select.sortMenuObj=this;
        _select.onchange=function()
        {
            this.sortMenuObj.setSorts(this,this.sortMenuObj);
        }
		this.sortSelect.insertBefore(_select,this.sortSelect.firstChild); 
		_select.size = this.selectSize;
        _select.options.add(new Option(this.sortCaption,""));	
		for (var i = 0; i < this.sortArray.length; i++)
		{
			if (_minCataValue == this.sortArray[i][0])
			{
				_parentID = this.sortArray[i][2];
				break;
			}
		}
		for (var i = 0; i < this.sortArray.length; i++)
		{
			if (this.sortArray[i][2] == _parentID)
			{
				if (this.sortArray[i][0] == _minCataValue)
				{
                    _opt=new Option(this.sortArray[i][1],this.sortArray[i][0]); 
                    _select.options.add(_opt);
                    _opt.selected="selected";
				}
				else					
				{
                    _select.options.add(new Option(this.sortArray[i][1],this.sortArray[i][0]));
                }
			}
		}		
		if (_parentID > 0)
		{
			this.init(_parentID);
		}
	}
}