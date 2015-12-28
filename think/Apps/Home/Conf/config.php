<?php
return array(
	//'配置项'=>'配置值'
	'name'=>'Jimmy',
	'email'=>'JimmyMall@163.com',
	
	'URL_CASE_INSENSITIVE'  =>  true,  
	
	
	//db by wjl
	'DB_TYPE' =>  "mysql",
	'DB_HOST' =>  "localhost",
	'DB_NAME' =>  "test",
	'DB_USER' =>  "root",
	'DB_PWD' =>  "",
	'DB_PORT' =>  "3306",
	'DB_PREFIX' =>  "t_",


	'DB_CHARSET' => "utf8",
	
	//router config
	'URL_ROUTER_ON'=>true,
	'URL_ROUTE_RULES'=>array(
		'news/:year/:month/:day' => array('News/archive', 'status=1'),
		'news/:id'               => 'News/read',
		'news/read/:id'          => '/news/:1',
	 ),
 
);