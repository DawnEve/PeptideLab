<?php
class Dawn{
	//get����
	static function get($key,$default=''){
		if(isset($_GET[$key])){
			return $_GET[$key];
		}else{
			return $default;
		}
	}
	//post����
	static function post($key,$default=''){
		if(isset($_POST[$key])){
			return $_POST[$key];
		}else{
			return $default;
		}
	}
	//session����-set
	static function sessionSet($key,$value){
		$_SESSION[$key]=$value;
	}
	//session����-get
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
	
	//�������ʾ ������ҳ
	public static function died(){
		die('Invalid visit.<br><a href="index.php">������ҳ</a>');
	}
	
	//������ͼ
	public static function view($viewname){
		//include('BathPath' . '../view/' . $viewname . '.html');
		include('view/' . $viewname . '.html');
	}
	
	//�˳�
	public static function logout(){
		//�˳��������£�
		if(isset($_SESSION['uid'])){
			//1.��������еĻỰ��Ϣ
			$_SESSION['uid']=null;//������ȫ���û�����
			$_SESSION=array();//���session
			
			//2.���cookie
			setcookie(session_name(),false, time()-3600);
			
			//3.���ٷ������ϵĻỰ�ļ�
			session_destroy();
		}
		
		//��ת����ҳ
		header("Location:index.php");
		//echo 'logout';
	}
	
}