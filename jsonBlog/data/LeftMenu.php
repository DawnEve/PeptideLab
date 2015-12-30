<?php

//标题和注释
$arr=array(
	array(1,'php文件操作',array(
		'1'=>'打开文件',
		'2'=>'关闭文件',
		'3'=>'读取',
		'4'=>'写入',
	)),
	
	array(2,'mysql数据库操作',array(
		'1'=>'数据库连接',
		'2'=>'select语句',
		'3'=>'insert语句',
		'4'=>'update',
		'5'=>'delete',
	)),
);

$file='PHP.json';
echo file_put_contents($file, json_encode($arr) );

