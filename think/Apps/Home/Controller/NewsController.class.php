<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
    public function index(){
		echo 'news->index(): ';
		dump( $_GET);
		
	}
	
	function archive(){
		echo 'news->archive(): ';
		dump( $_GET);
		
		$this->show();
	}

	function read($id){
		echo 'news->read(): ';
		echo $id;//http://tp.dawneve.cc/news/22   22
		dump( $_GET);
	}
	
	
}

//http://tp.dawneve.cc/index.php/home/User/index

/*
http://tp.dawneve.cc/index.php?c=user
http://tp.dawneve.cc/home/user/login/var/value

*/
