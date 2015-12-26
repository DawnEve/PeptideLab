<?php
defined('BathPath')||die('invalid!<br><a href="index.php">Go to index page</a>');

use erp\Worker;
use erp\Status;
use erp\Money;


//1.如果签到了，就可以看到签到记录
if( Status::check($worker['usr']) ){
	$w=new Worker($worker['usr']);
	echo '已经签到(一天只需签到一次)<hr>';
	$data=$w->listStatus();
	
	$status=$data['status'];
	
	$data=json_encode($data);
	Dawn::view('status');
	echo "\n<script type='text/javascript'>var data=getJson('$data');</script>\n";
	//1.1 如果是在岗
	//1.2如果是差，则显示费用及报销等级表
	if( $status[0]['status']=='今天出差' ){
		//
		Dawn::view('money');
	}
}else{
//2.如果没有签到，则显示签到页面
	Dawn::view('qiandao');
	exit();
}
