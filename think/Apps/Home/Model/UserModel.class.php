<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	//�����Զ���֤
	protected $_validate=array(
		array('name','require','�������'),
	);
	
	//�����Զ����
	protected $_auto=array(
		array('create_time','time',1,'function'),
	);

} 