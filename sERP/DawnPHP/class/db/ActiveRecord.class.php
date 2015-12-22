<?php  
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'test');
define('TABLE_PREFIX', 't_');

include('../../function.php');

class ActiveRecord {  
    private $tablepre;  
    private $class;  
    private $table;  
    private static $link;  
    private $data;  

    public $primaryKey = 'id';  
    
	//构造函数
    public function __construct() {  
        $this->tablepre = TABLE_PREFIX;  
        $this->class = get_class($this);  
        $this->table = $this->tablepre . strtolower($this->class);  
        $this->data = array();  
        $this->connect();  
    }  
    
	//数据库连接
    private function connect() {  
        if(!self::$link) {  
            self::$link = mysql_connect(DBHOST, DBUSER, DBPASS);  
            mysql_select_db(DBNAME);  
        }  
        return self::$link;  
    }  
    //设置
    public function __set($name, $value) {  
        $this->data[$name] = $value;  
    }  
    
	//分拆字段名
    private function implodefields($cond) {  
        $fields = array();  
        foreach($cond as $key => $value) {  
            $value = mysql_real_escape_string($value);  
            $fields[] = "`$key`='$value'";  
        }  
        return implode(', ', $fields);  
    }  
    
	//增加记录
    public function add() {  
        $fields = $this->implodefields($this->data);
        $sql = "INSERT INTO `{$this->table}` SET $fields";
        $this->query($sql);
    }  
    
	//通过id查找一个
    public function findById($id) {  
        $sql = "SELECT * FROM `{$this->table}` WHERE `{$this->primaryKey}`='$id' LIMIT 1";  
        $data = $this->getOne($sql);  
        return $this->makeObjFromArray($data);  
    }  
    
	//从数组重建对象
    private function makeObjFromArray($data) {  
        $obj = new $this->class;
        foreach($data as $key => $value) {  
            $obj->$key = $value;  
        }  
        return $obj; 
    }
    
	//执行查询
    private function query($sql) {
        echo $sql . "\n";  
        return mysql_query($sql, self::$link);  
    }
    
	//查找一个
    private function getOne($sql) {  
        $data = $this->query($sql);  
        if($data) {  
            $item = mysql_fetch_assoc($data);  
            return $item;  
        }  
        return false;  
    }  
}
/*
CREATE TABLE `t_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) DEFAULT NULL,
  `email` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/

class User extends ActiveRecord {  
    var $primaryKey = 'id';  
}
  
$user = new User();  
$user->name = 'films';  
$user->email = 'aaa@bb.com';  
$user->add();  

$user = $user->findById(2);
echo '<pre>';
print_r($user);  