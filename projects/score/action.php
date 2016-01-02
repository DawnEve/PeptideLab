<?php

//1.编码方式head头
header("Content-type: text/html; charset=utf-8");

//2.设置时区
date_default_timezone_set('PRC');

//3.显示服务器时间
//date("Y-m-d H:i:s", time());

include('Db.class.php');
include('Score.class.php');
include('function.php');



$action='';
if(isset($_GET['a'])){
	$action=$_GET['a'];
}

switch ($action){
	case "get":
		$db=new Db();
		$score=new Score($db->get());
		echo json_encode( $score->get() );
		break;
	case "add":
		$uid=$_GET['uid'];
		$sc=$_GET['score'];
				
		$db=new Db();
		$score=new Score($db->get());
		$score->add($uid,$sc);
		
		echo json_encode( $score->get() );
		break;
}