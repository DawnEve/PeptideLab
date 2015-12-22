<?php
namespace erp;

class Worker{
	private $usr='';
	
	
	function __construct($usr=''){
		if($usr!=''){
			$this->usr=$usr;
		}
	}

	/**
		用户登陆
	*/
	function login($usr,$psw){
		$query=sprintf('select * from worker where usr="%s" and psw="%s";',
			mysql_real_escape_string($usr,$GLOBALS['DB']),
			sha1($psw)
		);
		$result=mysql_query($query,$GLOBALS['DB']);
		$rows=mysql_fetch_assoc($result);
		
		if($rows){
			$_SESSION['uid']=$rows;
			header("Location:index.php");
			return true;
		}else{
			//debug($rows);
			echo '用户名错误。请重试。<a href="index.php">Go to index page</a>';
			return false;
		
		}
		//header("Location:index.php");
	}
	
	//列出所有人员的信息
	static function mylist(){
		$sql='select * from worker';
		
		$result=mysql_query($sql,$GLOBALS['DB']);
		$arr=array();
		if($result){
			while($row=mysql_fetch_assoc($result)){
				//$row['add_time']=date('Y-m-d H:i:s',$row['add_time']);
				unset($row['psw']);
				$row['add_time']=date('Y-m-d H:i:s',$row['add_time']);
				$arr[]=$row;
			}
		}
		return $arr;
	}
	
	/**
		列出用户所有资料
	*/
	function listStatus(){
		$usr=$this->usr;
		$arr=array();
		$arr['status']=Status::mylist($usr);
		$arr['money']=Money::mylist($usr);
		
		//echo '<pre>';	print_r($arr);
		return $arr;
	}


}

