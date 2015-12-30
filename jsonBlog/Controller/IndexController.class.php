<?php

class IndexController extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index($k='',$id=''){
		if($k=='')return;
		if($id=='')return;
	
		//1.获得数据
		//1.1 获得顶部导航
		$arrTop=$this->getTopMenu($k);
		//1.2获得左侧导航信息
		$arrLeft=$this->getLeftMenu($k,$id);

		
		//2.包含视图
		$c = substr(__class__,0,stripos(__class__,'Controller'));
		$a = substr(__method__,2+stripos(__method__,'::'));

		$file=$c.'/'.$a;
		include('View/'.$file.'.html');
	}

}