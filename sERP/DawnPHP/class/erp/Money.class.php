<?php
namespace erp;

class Money{
	//TODO
	static function check($usr,$date=''){
		if($date==''){
			$date=date('Ymd',time());
		}
		//如果仅仅是检查
		$sql='select id from status where usr="%s" and date=%s';
		$sql=sprintf($sql,
			mysql_real_escape_string($usr,$GLOBALS['DB']),
			mysql_real_escape_string($date,$GLOBALS['DB'])
		);
		$result=mysql_query($sql,$GLOBALS['DB']);
		if( mysql_affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	
	//增加记录
	function add($usr,$fee,$category){
		$add_time = time();
		$sid=Status::check($usr);
		$query=sprintf('insert into money(usr,sid,fee,add_time,category) values("%s","%s","%s","%s","%s");',
			mysql_real_escape_string($usr,$GLOBALS['DB']),
			mysql_real_escape_string($sid,$GLOBALS['DB']),
			mysql_real_escape_string($fee,$GLOBALS['DB']),
			mysql_real_escape_string($add_time,$GLOBALS['DB']),
			mysql_real_escape_string($category,$GLOBALS['DB'])
		);
		
		$result=mysql_query($query,$GLOBALS['DB']);
		if($result){
			return array(1,mysql_insert_id());
		}else{
			return array(0,mysql_error());
		}

		//header("Location:index.php");
	}
	
	static function delete($id){
		$query=sprintf('delete from money where id="%s";',
			mysql_real_escape_string($id,$GLOBALS['DB']));
		$result=mysql_query($query,$GLOBALS['DB']);

		if($result){
			return array(1,mysql_affected_rows());
		}else{
			return array(0,mysql_error());
		}
	}
	
	//列出这个人的花费
	static function mylist($usr,$date=''){
		if($date==''){
			$date=date('Ymd',time());
		}
		$sid=Status::check($usr);

		$sql='select * from money where usr="%s" and sid=%s';
		$sql=sprintf($sql,
			mysql_real_escape_string($usr,$GLOBALS['DB']),
			mysql_real_escape_string($sid,$GLOBALS['DB'])
		);
		$result=mysql_query($sql,$GLOBALS['DB']);
		$arr=array();
		if($result){
			while($row=mysql_fetch_assoc($result)){
				$row['add_time']=date('Y-m-d H:i:s',$row['add_time']);
				$arr[]=$row;
			}
		}
		return $arr;
	}
	
	/**
		返回花费列表
	*/
	function detail($usr=''){
		//如果usr为空，则调取所有人的花费
		if($usr==''){
			$sql='select * from money order by usr,add_time, category;';
		}else{
		//调取usr的花费
			$sql='select * from money where usr="%s" order by usr, add_time, category;';
			$sql=sprintf($sql,
			mysql_real_escape_string($usr,$GLOBALS['DB']));
		}
		
		$result=mysql_query($sql,$GLOBALS['DB']);
		$arr=array();
		if($result){
			while($row=mysql_fetch_assoc($result)){
				$row['add_time']=date('Y-m-d H:i:s',$row['add_time']);
				$arr[]=$row;
			}
		}
		
		//按照用户名,重组数组
		$arrByUsr=array();
		for($i=0;$i<count($arr);$i++){
			$usr=$arr[$i]['usr'];
			$arrByUsr[$usr][]=$arr[$i];
		}

		return $arrByUsr;
	
	}
	
	/**
		删除用户资料
	*/
	static function del($usr){
		if($usr==''){
			return array(0,'用户名不能为空');
		}
		$sql='delete from money where usr="%s"';
		$sql=sprintf($sql,
			mysql_real_escape_string($usr,$GLOBALS['DB']) );
			

		$result=mysql_query($sql,$GLOBALS['DB']);
		if(mysql_affected_rows()>0){
			return array(1,'删除成功');
		}else{
			return array(0,mysql_error());
		}
	}
}

