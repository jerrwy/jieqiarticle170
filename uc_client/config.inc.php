<?php
define('UC_CONNECT', 'mysql');				// ���� UCenter �ķ�ʽ: mysql/NULL, Ĭ��Ϊ��ʱΪ fscoketopen()
// mysql ��ֱ�����ӵ����ݿ�, Ϊ��Ч��, ������� mysql

//���ݿ���� (mysql ����ʱ, ����û������ UC_DBLINK ʱ, ��Ҫ�������±���)
define('UC_DBHOST', 'localhost');			// UCenter ���ݿ�����
define('UC_DBUSER', 'root');				// UCenter ���ݿ��û���
define('UC_DBPW', 'root');					// UCenter ���ݿ�����
define('UC_DBNAME', 'ucenter');				// UCenter ���ݿ�����
define('UC_DBCHARSET', 'gbk');				// UCenter ���ݿ��ַ���
define('UC_DBTABLEPRE', 'ucenter.uc_');			// UCenter ���ݿ��ǰ׺

//ͨ�����
define('UC_KEY', uniqid(rand()));				// �� UCenter ��ͨ����Կ, Ҫ�� UCenter ����һ��
define('UC_API', 'http://localhost/demo/uc/ucenter');	// UCenter �� URL ��ַ, �ڵ���ͷ��ʱ�����˳���
define('UC_CHARSET', 'gbk');				// UCenter ���ַ���
define('UC_IP', '');					// UCenter �� IP, �� UC_CONNECT Ϊ�� mysql ��ʽʱ, ���ҵ�ǰӦ�÷�������������������ʱ, �����ô�ֵ
define('UC_APPID', 4);					// ��ǰӦ�õ� ID
?>