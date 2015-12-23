<?php
define("BathPath","F:/xampp/htdocs/sERP/dawnPHP/");
include('dawnPHP/mylib.php');
//session
session_start();

//引入命名空间
use erp\Worker;
use erp\Status;
use erp\Money;

$action=Dawn::get('a','');
if(isset($_POST['send'])){
	switch($action){
		case 'signListByDate'://返回ajax请求数据：签到列表
			//获取数据
			$info=$_POST;
			$date=$info['date'];
			//请求数据
			$s=new Status();
			$data=json_encode( $s->listByDate($date) );
			echo $data;
	}
}				
?>