<?php
$aa='{"html":"0","css":"1","javascript":"2","PHP":"3","thinkPHP":"3","ci":"4","phpCMS":"5"}';
echo '<pre>';

$arr=json_decode($aa,true);


//数组写入文件
	function array2config($arr,$file){
		$str='<?php'.PHP_EOL.'return '.var_export($arr,TRUE).';';
		file_put_contents($file, $str);
	}
$data=array2config($arr,'title.php');

echo $data;