<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_SCHEMA', 'test');
define('DB_TBL_PREFIX', '');


class Db{
	//http://www.nowamagic.net/librarys/veda/detail/911
	protected $conn=null;
	//用单例模式写一下。todo
	function get(){
		$this->conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db(DB_SCHEMA,$this->conn);

		return $this->conn;
	}
}

/*
CREATE TABLE `score` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `uid` int(20) DEFAULT NULL,
  `score` int(20) DEFAULT NULL,
  `add_time` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

insert into score(uid,score,add_time)values
(0,1,'1451294382'),
(0,1,'1451294372'),
(0,1,'1451294362'),
(1,-1,'1451294383'),
(1,1,'1451294384'),
(1,1,'1451294385'),
(1,1,'1451294386'),
(1,1,'1451294387'),
(1,1,'1451294388'),
(1,1,'1451294389'),
(1,1,'1451294380'),
(2,1,'1451294390');


*/