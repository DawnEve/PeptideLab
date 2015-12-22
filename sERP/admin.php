<?php
define("BathPath","F:/xampp/htdocs/sERP/dawnPHP/");
include('dawnPHP/mylib.php');
//session
session_start();

echo ' <a href="index.php">返回首页</a>';
//如果没登陆，报错
if(!isset($_SESSION['uid'])){
	die('Invalid visit! Please login.');
}
//如果不是管理员，报错
$worker=$_SESSION['uid'];
if($worker['group']!=1){
	die('Invalid visit! Not administrator.');
}
//高级菜单项目
echo ' | <a href="index.php">汇总查询</a>';
echo ' | <a href="index.php">管理用户</a>';

echo '<hr>';


//引入命名空间
use erp\Worker;
use erp\Status;
use erp\Money;
//======================
//逻辑处理阶段
$m=new Money();
$list = $m->detail();
$list = json_encode($list);
Dawn::view('detail');
echo "<script type='text/javascript'>var data = getJson('$list');</script>";


?>