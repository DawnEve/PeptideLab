<?php
/******************************************
* ���Լ��Ŀ��: dawnPHP v0.1.0
* 
* ��Ҫ�ѿ��ļ��ĵ�ַ����Ϊ���� define("BathPath","D:/xampp/dawnPHP/");
* Ȼ�����øÿ�ͷ�ļ� include('dawnPHP/mylib.php');
******************************************/
//1.�����ַ���
header("Content-type: text/html; charset=utf-8");
//2.�����ںϷ���
//�������·��ʾ�� define("BathPath","D:/xampp/htdocs/php/php_user/dawnPHP/");
defined('BathPath') or die('BathPath not defined.');
//3.����ʱ��
date_default_timezone_set('PRC');
//date_default_timezone_set('Asia/Shanghai');
//4.����css��js�ļ��е���һ��λ�ã�
$publicPath='public/';
//5.���ݿ�����
//include(BathPath . 'conn.php');
//6.�����Զ��庯����
include(BathPath . 'function.php');
//7.�Զ�������
/***begin****/
//�����Զ�����
function myAutoload($class){
	//�������
	$classPath=BathPath . 'class/';
	$path=$classPath. $class . '.class.php';
	if(file_exists($path)){
		require($path);
		return;
	}
	
	//���ؿ�����
	$classPath=BathPath . '../Controller/';
	$path=$classPath. $class . '.class.php';
	if(file_exists($path)){
		require($path);
		return;
	}
};


//ע���Զ����غ���
spl_autoload_register('myAutoload'); 
//============================

/***end****/