<?php 
/**
 * ��̨ϵͳ����������
 *
 * ��̨ϵͳ����������
 * 
 * ����ģ�壺��
 * 
 * @category   jieqicms
 * @package    system
 * @copyright  Copyright (c) Hangzhou Jieqi Network Technology Co.,Ltd. (http://www.jieqi.com)
 * @author     $Author: juny $
 * @version    $Id: adminmenu.php 187 2008-11-24 09:30:03Z juny $
 */

/**
'layer'     - �˵���ȣ�Ĭ�� 0
'caption'   - �˵�����
'command'   - ���ӵ���ַ
'target'    - ��������Ƿ���´���(0-���¿���1-�¿�)
'publish'   - �Ƿ���ʾ��0-����ʾ��1-��ʾ��
*/

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => 'ϵͳ����', 'command'=>JIEQI_URL.'/admin/configs.php?mod=system&define=1', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '��������', 'command'=>JIEQI_URL.'/admin/configs.php?mod=system', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => 'Ȩ������', 'command'=>JIEQI_URL.'/admin/power.php?mod=system', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => 'Ȩ������', 'command'=>JIEQI_URL.'/admin/right.php?mod=system', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '�û������', 'command'=>JIEQI_URL.'/admin/groups.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => 'ͷ�ι���', 'command'=>JIEQI_URL.'/admin/honors.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '�������', 'command'=>JIEQI_URL.'/admin/blocks.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => 'ģ�����ù���', 'command'=>JIEQI_URL.'/admin/managemodules.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '�û�����', 'command'=>JIEQI_URL.'/admin/users.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '�û���־', 'command'=>JIEQI_URL.'/admin/userlog.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '�û�����', 'command'=>JIEQI_URL.'/admin/reportlist.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '�����û�����', 'command'=>JIEQI_URL.'/admin/online.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => 'ϵͳ�ռ���', 'command'=>JIEQI_URL.'/admin/message.php?box=inbox', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => 'ϵͳ������', 'command'=>JIEQI_URL.'/admin/message.php?box=outbox', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '���Ͷ���', 'command'=>JIEQI_URL.'/admin/newmessage.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '�û���ֵ��¼', 'command'=>$GLOBALS['jieqiModules']['pay']['url'].'/admin/paylog.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['system'][] = array('layer' => 0, 'caption' => '���ɾ�̬��ҳ', 'command'=>JIEQI_URL.'/indexs.php?refresh=1', 'target' => 0, 'publish' => 1);

//==========================================================
//���ݿ�ά������
//==========================================================

$jieqiAdminmenu['database'][] = array('layer' => 0, 'caption' => '���ݿⱸ��', 'command'=>JIEQI_URL.'/admin/dbmanage.php?option=export', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['database'][] = array('layer' => 0, 'caption' => '���ݿ�ָ�', 'command'=>JIEQI_URL.'/admin/dbmanage.php?option=import', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['database'][] = array('layer' => 0, 'caption' => '���ݿ��Ż�', 'command'=>JIEQI_URL.'/admin/dboptimize.php?option=optimize', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['database'][] = array('layer' => 0, 'caption' => '���ݿ��޸�', 'command'=>JIEQI_URL.'/admin/dboptimize.php?option=repair', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['database'][] = array('layer' => 0, 'caption' => '���ݿ�����', 'command'=>JIEQI_URL.'/admin/dbquery.php', 'target' => 0, 'publish' => 1);

//==========================================================
//ϵͳ���ߵ���
//==========================================================

$jieqiAdminmenu['tools'][] = array('layer' => 0, 'caption' => 'ˢ�¾�̬��ҳ', 'command'=>JIEQI_URL.'/indexs.php?refresh=1', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['tools'][] = array('layer' => 0, 'caption' => '�������黺��', 'command'=>JIEQI_URL.'/admin/cleancache.php?target=blockcache', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['tools'][] = array('layer' => 0, 'caption' => '������ҳ����', 'command'=>JIEQI_URL.'/admin/cleancache.php?target=cache', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['tools'][] = array('layer' => 0, 'caption' => '���������뻺��', 'command'=>JIEQI_URL.'/admin/cleancache.php?target=compiled', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['tools'][] = array('layer' => 0, 'caption' => 'ϵͳ��Ϣ���Ż�����', 'command'=>JIEQI_URL.'/admin/sysinfo.php', 'target' => 0, 'publish' => 1);

$jieqiAdminmenu['tools'][] = array('layer' => 0, 'caption' => 'ϵͳ�ռ���', 'command'=>JIEQI_URL.'/admin/message.php?box=inbox', 'target' => 0, 'publish' => 1);

?>