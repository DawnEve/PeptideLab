<?php
namespace erp;

class Status{
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
			$row=mysql_fetch_assoc($result);
			return $row['id'];
		}else{
			return false;
		}
	}
	
	
	function add($usr,$status=''){
		$add_time=time();
		$date=date('Ymd',$add_time);
		$query=sprintf('insert into status(usr,date,add_time,status) values("%s","%s","%s","%s");',
			mysql_real_escape_string($usr,$GLOBALS['DB']),
			mysql_real_escape_string($date,$GLOBALS['DB']),
			mysql_real_escape_string($add_time,$GLOBALS['DB']),
			mysql_real_escape_string($status,$GLOBALS['DB'])
		);
		
		if(Status::check($usr)){
			return array(1,'今天已经签到过了。');
		}else{
			$result=mysql_query($query,$GLOBALS['DB']);
			if($result){
				return array(1,mysql_insert_id());
			}else{
				return array(0,mysql_error());
			}
		}
		//header("Location:index.php");
	}
	
	
	//列出这个人的状态
	static function mylist($usr,$date=''){
		if($date==''){
			$date=date('Ymd',time());
		}
		//如果仅仅是检查
		$sql='select * from status where usr="%s" and date=%s';
		$sql=sprintf($sql,
			mysql_real_escape_string($usr,$GLOBALS['DB']),
			mysql_real_escape_string($date,$GLOBALS['DB'])
		);
		$result=mysql_query($sql,$GLOBALS['DB']);
		$arr=array();
		while($row=mysql_fetch_assoc($result)){
			$row['add_time']=date('Y-m-d H:i:s',$row['add_time']);
			$arr[]=$row;
		}
		return $arr;
	}
}

