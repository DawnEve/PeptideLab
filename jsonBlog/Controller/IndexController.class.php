<?php

class IndexController extends Controller{
	function __construct(){
		parent::__construct();
	}
	
	function index($k='',$id=''){
		if($k=='')return;
		if($id=='')return;
	
		//1.�������
		//1.1 ��ö�������
		$arrTop=$this->getTopMenu($k);
		//1.2�����ർ����Ϣ
		$arrLeft=$this->getLeftMenu($k,$id);

		
		//2.������ͼ
		$c = substr(__class__,0,stripos(__class__,'Controller'));
		$a = substr(__method__,2+stripos(__method__,'::'));

		$file=$c.'/'.$a;
		include('View/'.$file.'.html');
	}

}