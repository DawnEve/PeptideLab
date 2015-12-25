<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
		echo 'UserController->index';
		
		//D('User'); //实例化UserModel
		//D('User','Logic'); //实例化UserLogic
		
	}
	
    public function read(){
		echo 'UserController->read';
		$this->show();

	}
	
	
	public function Login($var){
		echo 'from user->login:' . $var;
	}
	
	
	
	
	
}

//http://tp.dawneve.cc/index.php/home/User/index

/*
http://tp.dawneve.cc/index.php?c=user
http://tp.dawneve.cc/home/user/login/var/value

*/
