<?php
/**
 * ��վ��ҳ
 *
 * Ĭ����ҳ������/configs/blocks.php�������õ�����
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: index.php 344 2009-06-23 03:06:07Z juny $
 */

//���屾ҳ����������
define('JIEQI_MODULE_NAME', 'system');
require_once('global.php');

//�����������
jieqi_getconfigs(JIEQI_MODULE_NAME, 'blocks', 'jieqiBlocks');

//����ҳͷҳβ
include_once(JIEQI_ROOT_PATH.'/header.php');
$jieqiTpl->assign('jieqi_indexpage',1);  //������ҳ��־������ģ����������ж�
$jieqiTset['jieqi_contents_template'] = '';  //����λ�ò���ֵ��ȫ��������
include_once(JIEQI_ROOT_PATH.'/footer.php');
?>