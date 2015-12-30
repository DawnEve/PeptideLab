<?php
//引用库
define("BathPath","F:/xampp/htdocs/jsonBlog/jsonPHP/");
include('jsonPHP/door.php');

//获取数据
$c=Dawn::get('c','Index') . 'Controller';
$a=Dawn::get('a','index');
$k=Dawn::get('k','');
$id=Dawn::get('id','-1');


//显示当前页
//$topic = $k;

//显示顶部菜单
//showMenu($topic);


//实例化控制器
$controller=new $c();
$controller->$a($k,$id);