<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	//protected $tablePrefix='t_';//修改表前缀
	//protected $tableName='abc';//修改表名 'think.think_abc' doesn't exist
	//protected $trueTableName='abc';//修改表真名 'think.abc' doesn't exist
	//protected $dbName='test';//修改数据库名 'test.think_user' doesn't exist 
	
	/*
	//定义自动验证
	protected $_validate=array(
		array('name','require','标题必须'),
	);
	
	//定义自动完成
	protected $_auto=array(
		array('create_time','time',1,'function'),
	);
	*/
	public function __construct(){
		parent::__construct();
		echo '[from UserModel->__construct()]<hr>';
	}

}