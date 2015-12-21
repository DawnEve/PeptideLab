<?php
defined('BathPath')||die('invalid!<br><a href="index.php">Go to index page</a>');

use erp\Worker;


$w=new Worker();
//1.如果签到了，就可以看到签到记录
if( $w->isSigned($worker['usr']) ){
	//1.1 如果是在岗
	
	//1.2如果是差，则显示费用及报销等级表
	

}else{
//2.如果没有签到，则显示签到
	Dawn::view('qiandao');
	exit();
}
