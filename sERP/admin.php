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
echo ' | <a href="admin.php?a=sign">签到汇总</a>';
echo ' | <a href="admin.php?a=fee">花费汇总</a>';
echo ' | <a href="admin.php?a=usr">管理用户</a>';
echo ' | 管理员[ ' . $worker['usr'] .' ]已登陆';
echo ' | <a href="index.php?a=logout">退出</a>';

echo '<hr>';


//引入命名空间
use erp\Worker;
use erp\Status;
use erp\Money;
//======================
//逻辑处理阶段

//员工登陆过
$action=Dawn::get('a','');
if(isset($_SESSION['uid'])){
	/**
		如果是post提交，则执行数据增删改查
	*/
	if(isset($_POST['send'])){
		switch($action){
			case 'addUsr'://添加用户控制器
				$info=$_POST;
				//debug($info);
				$w=new Worker();
				$result=$w->add($info);
				
				//显示结果信息
				echo '<a href="admin.php?a=usr">查看用户</a> <br><br>';
				if($result[0]==0){
					die($result[1]); 
				}
				echo $result[1].' 已添加。';
				
				break;
			case 'delUsr'://删除用户控制器
				$usr=Dawn::get('usr','');
				echo '<a href="admin.php?a=usr">查看用户</a> <br><br>';
				
				//如果是自己，则不能删除					
				if($usr!=$worker['usr']){
					$result=Worker::del($usr);
					//debug($result);
				}else{
					$result=array(0,'不能删除自己的账号！');
				}
				//显示结果信息
				if($result[0]==0){
					die($result[1]); 
				}
				echo $result[1];
				break;
			default: //默认排错控制器
				MyDebug::p($_GET);
				MyDebug::p($_POST);
				break;
		}
	}else{
		/**
			如果是不是post提交，则执行显示
		*/
		//获取所有用户的信息
		$u=new Worker();
		$data=json_encode( $u->mylist() );
		echo "<script type='text/javascript'>var list ='$data';</script>";
		
		//默认是列表
		if($action==''){
			Dawn::view('admin');
		}
		//签到汇总
		if($action=='sign'){
			//签到汇总
			echo '签到汇总';
			Dawn::view('adminSign');
		}
		//用户管理
		if($action=='usr'){
			echo 'usr admin';
			Dawn::view('adminUsr');
		}
		//数据汇总
		if($action=='fee'){
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
			
			//加载视图
			$list = json_encode($list);
			Dawn::view('detail');
			echo "<script type='text/javascript'>var usr='$usr', data = getJson('$list');</script>";
			exit();
		}
	}
}
			
			

?>