<?php
session_start();

//1.编码方式head头
header("Content-type: text/html; charset=utf-8");

//2.设置时区
date_default_timezone_set('PRC');

//3.显示服务器时间
//date("Y-m-d H:i:s", time());

include('Db.class.php');
include('Score.class.php');
include('User.class.php');
include('function.php');

$isLog=User::isLog();


$action='';
if(isset($_GET['a'])){
	$action=$_GET['a'];
}

switch ($action){
	case "get":
		$db=(new Db())->get();
		$score=new Score($db);
		echo json_encode( $score->get() );
		break;
	case "add":
		//如果没有登陆，则不允许操作
		if(!$isLog){
			//
			$data = array(2015,'请登陆后操作。');
			echo json_encode( $data );
			exit;
		}
		
		$uid=$_GET['uid'];
		$sc=$_GET['score'];
		
		$db=(new Db())->get();
		$score=new Score($db);
		$score->add($uid,$sc);
		
		echo json_encode( $score->get() );
		break;
	case "initDb":
		//如果没有登陆，则不允许操作
		if(!$isLog){
			//
			$data = array(2015,'请登陆后操作。');
			echo json_encode( $data );
			exit;
		}
		
		$db=(new Db())->get();
		$score=new Score($db);
		
		$result=$score->init();
		if($result){
			echo '清理成功';
		}else{
			echo '清理失败';
		}
		echo '<hr><a href="index.html">回到首页</a>';
		break;
	case "isLog":
		echo json_encode( array($isLog) );
		break;
	case "login":
		$db=(new Db())->get();
		$score=new Score($db);
		
		$usr=$_POST['usr'];
		$psw=$_POST['psw'];
		
		$result=User::login($usr,$psw);
		if($result){
			echo '登陆成功';
		}else{
			echo '登陆失败';
		}
		echo '<hr><a href="index.html">回到首页</a>';
		//echo json_encode( $score->get() );
		break;
	case "logout":
		User::logout();
		 if(!isset($_SESSION['user'])){
			echo '已退出';
		 }else{
			echo '退出失败，请重试';
		 }
		echo '<hr><a href="index.html">回到首页</a>';
		break;
}