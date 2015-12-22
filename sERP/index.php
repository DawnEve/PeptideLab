<?php
define("BathPath","F:/xampp/htdocs/sERP/dawnPHP/");
include('dawnPHP/mylib.php');

//session
session_start();
use erp\Worker;
use erp\Status;
use erp\Money;

//显示用户状态
if(isset($_SESSION['uid'])){
	$worker=$_SESSION['uid'];
	$usr=$worker['usr'];
	if($worker['group']==1){
		echo '管理员[ ' . $worker['usr'] .' ]已登陆';
	}else{
		echo '普通用户[ ' . $worker['usr'] .' ]已登陆';
	}
	echo ' | <a href="index.php?a=logout">退出</a>';
	if($worker['group']==1){
		//显示管理员页面
		echo ' | <a href="admin.php">管理</a>';
	}
	echo '<hr>';
	
}else{
	echo '目前没有用户登陆。请登陆。<hr>';
}


//退出
$action=Dawn::get('a','');
if($action=='logout'){
	Dawn::logout();
}

//员工登陆过
if(isset($_SESSION['uid'])){
	//如果是post提交
	if(isset($_POST['send'])){
		switch($action){
			case 'qiandao'://签到控制器
				$status=$_POST['send'];
				$result=Status::add($usr,$status);
				if($result[0]==1){
					header("Location:index.php");
				}else{
					die('签到失败；请<a href="index.php">重试</a>');
				}
				break;
			case 'fee'://添加费用控制器
				$fee=Dawn::post('fee',0);
				$category=Dawn::post('category',0);
				if($fee>0){
					$arr=Money::add($usr, $fee, $category);
					if($arr[0]!=1){
						debug($arr[1]);
					}
				}
				header("Location:index.php");
				break;
			case 'delMoney'://删除费用控制器
				$id=Dawn::get('id','');
				if($id!=''){
					$arr=Money::delete($id);
					if($arr[0]==1){
						//成功
					}
				}
				header("Location:index.php");
				break;
			default: //默认排错控制器
				MyDebug::p($_GET);
				MyDebug::p($_POST);
				break;
		}
	}else{
		//如果不是post提交
		
		//则进入用户处理页面
		include('userPage.php');
		exit();
	}
	exit();
}



//===================如果没有登陆
$usr=Dawn::post('usr','');
if($usr==''){
	//没有登陆，提示登陆
	Dawn::view('login');
	//include("login.php");
	exit();
}else{
	//已经登陆，则验证密码是否正确
	$psw=Dawn::post('psw','');
	$w=new Worker();
	$w->login($usr,$psw);
}