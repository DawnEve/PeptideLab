<?php
//顶部菜单
$aa='{"html":"0","css":"1","javascript":"2","PHP":"3","thinkPHP":"3","ci":"4","phpCMS":"5"}';

//侧边菜单
$aa='[[1,"php\u6587\u4ef6\u64cd\u4f5c",{"1":"\u6253\u5f00\u6587\u4ef6","2":"\u5173\u95ed\u6587\u4ef6","3":"\u8bfb\u53d6","4":"\u5199\u5165"}],[2,"mysql\u6570\u636e\u5e93\u64cd\u4f5c",{"1":"\u6570\u636e\u5e93\u8fde\u63a5","2":"select\u8bed\u53e5","3":"insert\u8bed\u53e5","4":"update","5":"delete"}]]';

$arr=json_decode($aa,true);


//数组写入文件
	function array2config($arr,$file){
		$str='<?php'.PHP_EOL.'return '.var_export($arr,TRUE).';';
		file_put_contents($file, $str);
	}
$data=array2config($arr,'PHP.php');


echo '<pre>';
echo $data;