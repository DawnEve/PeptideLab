<?php
namespace erp;

class Worker{
	private $usr='';
	
	
	function __construct($usr=''){
		if($usr!=''){
			$this->usr=$usr;
		}
	}
	
	/**
		检查用户是否存在
	*/
	function check($usr){
		$query=sprintf('select * from worker where usr="%s";',
			mysql_real_escape_string($usr,$GLOBALS['DB'])
		);
		$rows = mysql_query($query,$GLOBALS['DB']);
		return mysql_fetch_assoc($rows);
	}

	/**
		用户登陆
	*/
	function login($usr,$psw){
		$query=sprintf('select * from worker where usr="%s" and psw="%s";',
			mysql_real_escape_string($usr,$GLOBALS['DB']),
			sha1($psw)
		);
		$result=mysql_query($query,$GLOBALS['DB']);
		$rows=mysql_fetch_assoc($result);
		
		if($rows){
			$_SESSION['uid']=$rows;
			header("Location:index.php");
			return true;
		}else{
			//debug($rows);
			echo '用户名错误。请重试。<a href="index.php">Go to index page</a>';
			return false;
		
		}
		//header("Location:index.php");
	}
	
	//列出所有人员的信息
	static function mylist($usr=''){
		if(''==$usr){
			$sql='select * from worker order by `group` DESC, add_time';
		}else{
			$sql='select * from worker where usr="'. $usr .'" order by `group` DESC, add_time';
		}

		$result=mysql_query($sql,$GLOBALS['DB']);
		$arr=array();
		if($result){
			while($row=mysql_fetch_assoc($result)){
				//$row['add_time']=date('Y-m-d H:i:s',$row['add_time']);
				unset($row['psw']);
				$row['add_time']=date('Y-m-d H:i:s',$row['add_time']);
				$arr[]=$row;
			}
		}
		return $arr;
	}
	
	/**
		列出用户所有资料
	*/
	function listStatus(){
		$usr=$this->usr;
		$arr=array();
		$arr['status']=Status::mylist($usr);
		$arr['money']=Money::mylist($usr);
		
		//echo '<pre>';	print_r($arr);
		return $arr;
	}
	
	/**
		删除用户资料
	*/
	static function del($usr){
		if($usr==''){
			return array(0,'用户名不能为空');
		}
		$sql='delete from worker where usr="%s"';
		$sql=sprintf($sql,
			mysql_real_escape_string($usr,$GLOBALS['DB']) );
			

		$result=mysql_query($sql,$GLOBALS['DB']);
		if(mysql_affected_rows()>0){
			$arr1=Status::del($usr);//删除签到信息
			$arr2=Money::del($usr);//删除花费信息
			
			return array(1,'删除成功');
		}else{
			return array(0,mysql_error());
		}
	}
	//更新用户信息
	function update($info){
		//插入新记录
		//如果密码为空，则放弃修改密码，否则修改密码
		if(''==trim($info['psw'])){
			$query=sprintf('update worker set phone="%s",QQ="%s",email="%s",`group`="%s" where usr="%s";',
				mysql_real_escape_string($info['phone'],$GLOBALS['DB']),
				mysql_real_escape_string($info['QQ'],$GLOBALS['DB']),
				mysql_real_escape_string($info['email'],$GLOBALS['DB']),
				mysql_real_escape_string($info['group'],$GLOBALS['DB']),
				mysql_real_escape_string($info['usr'],$GLOBALS['DB'])
			);
		}else{
			$query=sprintf('update worker set psw="%s",phone="%s",QQ="%s",email="%s",`group`="%s" where usr="%s";',
				sha1($info['psw']),
				mysql_real_escape_string($info['phone'],$GLOBALS['DB']),
				mysql_real_escape_string($info['QQ'],$GLOBALS['DB']),
				mysql_real_escape_string($info['email'],$GLOBALS['DB']),
				mysql_real_escape_string($info['group'],$GLOBALS['DB']),
				mysql_real_escape_string($info['usr'],$GLOBALS['DB'])
			);
		}
		$result=mysql_query($query,$GLOBALS['DB']);

		//if(mysql_affected_rows()>0){ 如果没有更新，则会返回影响0条，以为失败，其实是成功的。
		if($result){
			//return array(1,mysql_insert_id());
			return array(1, $info['usr']);
		}else{
			return array(0,mysql_error($GLOBALS['DB']));
		}
	}
	
	//增加用户
	function add($info){
		//查看是否重复
		if($this->check($info['usr'])){
			return array(0,'该用户已经存在！');
		};
		
		//插入新记录
		$query=sprintf('insert into worker(usr,psw,add_time,phone,QQ,email,`group`) values("%s","%s","%s","%s","%s","%s","%s");',
			mysql_real_escape_string($info['usr'],$GLOBALS['DB']),
			sha1($info['psw']),
			time(),
			mysql_real_escape_string($info['phone'],$GLOBALS['DB']),
			mysql_real_escape_string($info['QQ'],$GLOBALS['DB']),
			mysql_real_escape_string($info['email'],$GLOBALS['DB']),
			mysql_real_escape_string($info['group'],$GLOBALS['DB'])
		);
		
		$result=mysql_query($query,$GLOBALS['DB']);
		if(mysql_affected_rows()>0){
			//return array(1,mysql_insert_id());
			return array(1, $info['usr']);
		}else{
			return array(0,mysql_error());
		}
		//debug($query);
	}

}

