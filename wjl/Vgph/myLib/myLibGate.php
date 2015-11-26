<?php
/*===========================================
* =====配置信息、函数库
* 文件规则：所有项目都通用的文件放到common中
* 类文件放到class文件中
//===========================================*/
//编码方式
header("Content-Type: text/html; charset=utf8");
//时区设置
date_default_timezone_set('PRC');

//处理路径
if(!isset($path)){ die('invalid URL');}
$slash=substr($path,strlen($path)-1);
if( $slash!="/" && $slash!="\\" ){
	$path .= "/";
}

//包含数据库连接
include $path . 'common/conn.php';
//包含函数库
include $path . 'function.php';

//自动导入类
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








