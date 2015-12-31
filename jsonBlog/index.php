<?php
//引用库
define("BathPath","F:/xampp/htdocs/jsonBlog/jsonPHP/");
include('jsonPHP/door.php');

//获取数据
$c=Dawn::get('c','Index') . 'Controller';//控制器
$a=Dawn::get('a','index');//动作
$k=Dawn::get('k','');//关键词
$id=Dawn::get('id','0_1');//关键词下的页面


//实例化控制器
$controller=new $c();
$controller->$a($k,$id);