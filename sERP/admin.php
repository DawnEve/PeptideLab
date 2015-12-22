<?php
define("BathPath","F:/xampp/htdocs/sERP/dawnPHP/");
include('dawnPHP/mylib.php');
//session
session_start();

echo ' <a href="index.php">&lt;&lt;前台首页</a>';
echo ' | <a href="admin.php">后台首页</a>';
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
echo ' | <a href="admin.php?a=pool">汇总查询</a>';
echo ' | <a href="admin.php?a=usr">管理用户</a>';
echo ' | <a href="index.php?a=logout">退出</a>';

echo '<hr>';


//引入命名空间
use erp\Worker;
use erp\Status;
use erp\Money;
//======================
//逻辑处理阶段

//员工登陆过
if(isset($_SESSION['uid'])){
	//如果是post提交
	if(isset($_POST['send'])){
		switch($action){
			case 'qiandao'://签到控制器
				$status=$_POST['send'];
				break;
			default: //默认排错控制器
				MyDebug::p($_GET);
				MyDebug::p($_POST);
				break;
		}
	}else{
		$action=Dawn::get('a','');
		//获取所有用户的信息
		$u=new Worker();
		$data=json_encode( $u->mylist() );
		echo "<script type='text/javascript'>var list ='$data';</script>";
		
		//默认是列表
		if($action==''){
			Dawn::view('admin');
		}
		//用户管理
		if($action=='usr'){
			echo 'usr admin';
			
			Dawn::view('adminUsr');
		}
		//数据汇总
		if($action=='pool'){
			//列出所有用户，指定时间段
			Dawn::view('detail_select');
			//如果没有指定用户
			$usr=Dawn::get('u','');
			$m=new Money();
			if($usr==''){
				$list = $m->detail();
			}else{
				$list = $m->detail($usr);
			}
			
			//加载模型
			$list = json_encode($list);
			Dawn::view('detail');
			echo "<script type='text/javascript'>var usr='$usr', data = getJson('$list');</script>";
			exit();
		}
		
		
		
	}
}
			
			

?>