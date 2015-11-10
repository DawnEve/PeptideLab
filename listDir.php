<form method="post" target="">
<input type="text" name="fileName">
<input type="submit" name="submit">
</form>

<?php
/**standard PHP library,SPL
文件目录迭代器：生成文件列表
*/
//文档字符集
header("Content-type: text/html; charset=utf-8");

/**
生成文件列表树
*/
function listDir($dirName,$n,$separater='|-'){
	//生成文件数列表前的占位符
	$i=$n;
	while($i--){
		//$separater='&nbsp;' . $separater;
		$separater='-' . $separater;
	}
	$separater='|' . $separater;
	//显示当前目录名
	//echo "<hr><b>+[{$dirName}]</b><br>";
	echo "<hr><b>+[".
		iconv("GBK","UTF-8",  $dirName)
	."]</b><br>";
	//迭代器对象
	$iterator=new \DirectoryIterator($dirName);
	//遍历对象
	foreach($iterator as $item){
		$fileName=$item->getFilename();
		//过滤点号
		if($fileName=='.' or $fileName=='..') continue;
		//从gbk到utf-8
		$name=iconv("GBK","UTF-8",  $item->getFilename());
		//打印文件名
		echo "{$separater}{$name}<br>";
		//如果是文件，则迭代
		if($item->isDir()){
			listDir("{$dirName}/{$item}",++$n);
		}
	}
	return $iterator;
}

if(isset($_POST['fileName'])){
	$fileName=$_POST['fileName'];
}else{
	$fileName="C:/xampp/htdocs/angularJS/angularJS1.4.4";
}

//输入文件名
echo "<pre>";
$dir=listDir($fileName,0);
//$dir=listDir("..",0);
//$dir=listDir("../PHPCodePackage001",0);
//$dir=listDir("E:",0);
//$dir=listDir("../wordpress",0);


//显示迭代器复杂的数据结构
echo "<hr>";
echo "<hr>";
echo "<hr>";echo 'print_r($dir);<br>';
print_r($dir);

//echo "<hr>";echo 'var_dump($dir);<br>';
//var_dump($dir);

//echo "<hr>";echo 'var_dump( get_class_vars("DirectoryIterator") );<br>';
//var_dump( get_class_vars('DirectoryIterator') );

//echo "<hr>";echo 'var_dump( get_class_methods($dir) );<br>';
//var_dump( get_class_methods($dir) );

?>
<style>
b{color:red;}

</style>