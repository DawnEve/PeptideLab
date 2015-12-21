<?php
define("BathPath","F:/xampp/htdocs/sERP/dawnPHP/");
include('dawnPHP/mylib.php');

//session
session_start();
use erp\Worker;

//显示用户状态
if(isset($_SESSION['uid'])){
	$worker=$_SESSION['uid'];
	echo '用户[ ' . $worker['usr'] .' ]已登陆';
	echo ' | <a href="index.php?a=logout">退出</a><hr>';
}else{
	echo '目前没有用户登陆。请登陆。<hr>';
}


//退出
$logout=Dawn::get('a','');
if($logout=='logout'){
	Dawn::logout();
}

//员工登陆
if(isset($_SESSION['uid'])){

	$action=Dawn::post('a','');
	if($action==''){
		//已经登陆，则提示可以创建用户
		//MyDebug::p($_SESSION['uid']);
		$worker=$_SESSION['uid'];
		include('userPage.php');
		exit();
	}
	switch($action){
		case 'logout':
			Dawn::logout();
			break;
	}
	
}



//如果没有登陆
$usr=Dawn::post('usr','');
if($usr==''){
	//没有登陆，提示登陆
	include("login.php");
	exit();
}else{
	//已经登陆，则验证密码是否正确
	$psw=Dawn::post('psw','');
	$w=new Worker();
	$w->login($usr,$psw);
}