<?php

//标题和注释
$arr=array(
	'javascript'=>'1',
	'html-css'=>'2',
	'thinkPHP'=>'3',
	'ci'=>'4',
	'phpCMS'=>'5',
);

$file='index.json';
echo file_put_contents($file, json_encode($arr) );

