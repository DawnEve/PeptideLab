<?php
/*===========================================
* =====������Ϣ��������
* �ļ�����������Ŀ��ͨ�õ��ļ��ŵ�common��
* ���ļ��ŵ�class�ļ���
//===========================================*/
//���뷽ʽ
header("Content-Type: text/html; charset=utf8");
//ʱ������
date_default_timezone_set('PRC');

//����·��
if(!isset($path)){ die('invalid URL');}
$slash=substr($path,strlen($path)-1);
if( $slash!="/" && $slash!="\\" ){
	$path .= "/";
}

//�������ݿ�����
include $path . 'common/conn.php';
//����������
include $path . 'function.php';

//�Զ�������
function my_autoloader($classname) {
	global $path;
	$classpath=$path.'class/'.$classname.'.class.php';
	if(file_exists($classpath)){
		require($classpath);
	}
	else{
		die( 'class file '.$classname.'.class.php not found!');
	}
}

spl_autoload_extensions(".class.php"); // comma-separated list
spl_autoload_register('my_autoloader');








