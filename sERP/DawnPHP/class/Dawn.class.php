<?php
class Dawn{
	//get函数
	static function get($key,$default=''){
		if(isset($_GET[$key])){
			return $_GET[$key];
		}else{
			return $default;
		}
	}
	//post函数
	static function post($key,$default=''){
		if(isset($_POST[$key])){
			return $_POST[$key];
		}else{
			return $default;
		}
	}
	//session函数-set
	static function sessionSet($key,$value){
		$_SESSION[$key]=$value;
	}
	//session函数-get
	static function sessionGet($key){
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		}else{
			return -1;
		}
	}
	
	//to array
	public static function toArray($obj){
		$_array = is_object($obj)?get_object_vars($obj): $obj;
	 
		foreach ($_array as $key => $value) {
			$value = (is_array($value) || is_object($value)) ? Dawn::toArray($value) : $value;
			$array[$key] = $value;
		}
	 
		return $array;
	}
	
	//出错后显示 返回首页
	public static function died(){
		die('Invalid visit.<br><a href="index.php">返回首页</a>');
	}
	
	//加载视图
	public static function view($viewname){
		//include('BathPath' . '../view/' . $viewname . '.html');
		include('view/' . $viewname . '.html');
	}
	
	//退出
	public static function logout(){
		//退出干三件事：
		if(isset($_SESSION['uid'])){
			//1.清除数组中的会话信息
			$_SESSION['uid']=null;//或其他全局用户变量
			$_SESSION=array();//清空session
			
			//2.清除cookie
			setcookie(session_name(),false, time()-3600);
			
			//3.销毁服务器上的会话文件
			session_destroy();
		}
		
		//跳转回首页
		header("Location:index.php");
		//echo 'logout';
	}
	
	/**
		显示回退按钮
	*/
	static function showBackBtn($words='后退'){
		echo ' <a href="javascript:window.history.back();">'. $words .'</a> ';
	
	} 
	
	
}