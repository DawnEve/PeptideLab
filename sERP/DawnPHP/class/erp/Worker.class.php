<?php
namespace erp;

class Worker{
	function hi(){
		echo 'hi';
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
	
	
	/**
		用户是否签到
	*/
	function isSigned($usr){
		return false;
	}


}

