<?php
/**
 * ���ݱ������ѡ���ֵ�Ķ�Ӧ��ϵ
 * multiple 0 ��ѡ 1 ��ѡ
 * default Ĭ��ֵ
 * items ѡ���б�
*/
//������Ȩ
$jieqiOption['article']['authorflag'] = array('multiple' => 0, 'default' => 0, 'items' => array(1 => '��Ȩ��������', 0 => '��ʱ������Ȩ'));

//��Ȩ����
$jieqiOption['article']['permission'] = array('multiple' => 0, 'default' => 2, 'items' => array(3 => 'ר����Ʒ', 2 => 'פվ��Ʒ', 1 => '��Ȩ��Ʒ', 0 => '��δ��Ȩ'));

//�׷�״̬
$jieqiOption['article']['firstflag'] = array('multiple' => 0, 'default' => 1, 'items' => array(1 => '��վ�׷�', 0 => '��վ�׷�'));

//����״̬
$jieqiOption['article']['fullflag'] = array('multiple' => 0, 'default' => 0, 'items' => array(0 => '������', 1 => '�����'));

?>