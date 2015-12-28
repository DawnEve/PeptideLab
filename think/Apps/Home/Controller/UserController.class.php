<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
		echo 'UserController->index: ';
		
		//echo C('URL_MODEL',1);
		//echo U('Index/Login');
		
		$data=M('User');
		$result=$data->find(18);
		//dump($result);
		$this->assign('data',$result);
		$this->display();
		
		//D('User'); //实例化UserModel
		//D('User','Logic'); //实例化UserLogic
		
	}
	
    public function add(){
		echo 'UserController->add';
		$this->show();
	}
	
	public function insert(){
		$form=D('user');
		if($form->create()){
			$result=$form->add();
			if($result){
				$this->success('添加成功');
			}else{
				$this->error('添加失败！');
			}
		}else{
			$this->error($form->getError());
		}
		
	}
	
	
	public function Login($var){
		echo 'from user->login:' . $var;
	}
	
	
	public function blog(){
		echo 'hello user->blog: ';
		echo 'http://tp.dawneve.cc/home/user/blog';
	}
	
	function i(){
		//变量操作
		//http://tp.dawneve.cc/home/user/i/id/3/name/300sa%7D%7B
		echo '<pre>';
		print_r( I('get.') ); //获取整个$_GET
		echo '<hr>';
		
		echo I('get.id'); //相当于$_GET['id']
		//http://tp.dawneve.cc/home/user/i/id/3
		//echo I('get.name','some names');//默认值
		echo I('get.name','some names','htmlspecialchars');//过滤
		
		
		echo '<hr>',I('get.name/d');//强制转换为整形数字
		echo '<hr>',I('get.name/f');//强制转换为浮点数字
		
	}
	
	
	
}

//http://tp.dawneve.cc/index.php/home/User/index

/*
http://tp.dawneve.cc/index.php?c=user
http://tp.dawneve.cc/home/user/login/var/value

*/
