<?php
define("BathPath","F:/xampp/htdocs/sERP/dawnPHP/");
include('dawnPHP/mylib.php');

session_start();


$isLogin=Dawn::get('m',0);

if($isLogin){
	echo 'login<pre>';
	print_r( $_SESSION ); 
	exit();
}





		echo 'logout';
		//�˳��������£�
		if($_SESSION['uid']){
			//1.��������еĻỰ��Ϣ
			$_SESSION['uid']=null;//������ȫ���û�����
			$_SESSION=array();//���session
			
			//2.���cookie
			setcookie(session_name(),false, time()-3600);
			
			//3.���ٷ������ϵĻỰ�ļ�
			session_destroy();
		}
		
		//��ת����ҳ
		//header("Location:index.php");
		echo '<pre>';
		print_r( $_SESSION ); 
		exit();
/*

*/