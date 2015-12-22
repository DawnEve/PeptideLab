<?php
define("BathPath","F:/xampp/htdocs/sERP/dawnPHP/");
include('dawnPHP/mylib.php');

session_start();


$isLogin=Dawn::get('m',0);

if($isLogin){
	echo 'login<pre>';
	print_r( $_SESSION ); 
	exit();
}





		echo 'logout';
		//退出干三件事：
		if($_SESSION['uid']){
			//1.清除数组中的会话信息
			$_SESSION['uid']=null;//或其他全局用户变量
			$_SESSION=array();//清空session
			
			//2.清除cookie
			setcookie(session_name(),false, time()-3600);
			
			//3.销毁服务器上的会话文件
			session_destroy();
		}
		
		//跳转回首页
		//header("Location:index.php");
		echo '<pre>';
		print_r( $_SESSION ); 
		exit();
/*

*/