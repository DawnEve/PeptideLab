<?php
class Controller{
	//从php到模板传值。
	public $data;
	
	function __construct(){
		//啥也没做
	}
	
	function loadModel($class){
		//加载模型
		$classPath=BathPath . '../Model/';
		$path=$classPath. $class . '.class.php';
		if(file_exists($path)){
			require($path);
			return;
		}
	}
	
	/**
		[作废，不好用]显示视图
	*/
	function view($file){
		include('View/'.$file.'.html');
		//echo $file;
	}
	
	/**
		获取顶部菜单
	*/
	function getTopMenu($keyword){
		$data=Json::get('title');
		$arr=array('keyword'=>$keyword);
		$arr['data']=json_decode($data,true);
		
		return $arr;
	}
	
	/**
		获取左侧菜单
	*/
	function getLeftMenu($keyword,$id){
		$data=Json::get($keyword);
		$arr=array('keyword'=>$keyword);
		$arr['id']=$id;
		$arr['data']=json_decode($data,true);
		
		return $arr;
	}

}