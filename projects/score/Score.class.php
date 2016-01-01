<?php

class Score{
	protected $conn=null;
	function __construct($conn){
		$this->conn=$conn;
	}
	//获取所有分数
	function get(){
		$rows=mysql_query('select * from score order by add_time DESC;',$this->conn);
		$arr=array();
		while($row=mysql_fetch_assoc($rows)){
			$row['add_time']=date('Y-m-d H:i:s', $row['add_time']);
			$arr[]=$row;
		}
		return $arr;
	}



}