<?php
session_start();

/*
$_SESSION['id']='001';
$_SESSION['name']='wjl';


echo '<pre>';
print_r( $_SESSION );
echo '</pre>';
*/

//1.编码方式head头
header("Content-type: text/html; charset=utf-8");

//2.设置时区
date_default_timezone_set('PRC');

//3.显示服务器时间
date("Y-m-d H:i:s", time());

//4.静态方法比动态方法效率高。
/*
ffmpeg 视频转换

*/


//获取模型数据
include('model.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 
这句很好的解决了兼容性！！
http://www.jb51.net/css/383986.html
-->
<meta http-equiv=”X-UA-Compatible” content=”IE=edge,chrome=1″ />
<link href="css/bioMooc.css" rel="stylesheet" type="text/css">


</head>
<body>
<div id='topNav'>
	<span class=right>
		<a href="login.php">登陆</a> | 
		<a href="register.php">注册</a>
	</span>

	<a class="logo" href="index.php" title="生物慕课网">生物慕课网</a>
</div>

<div class="clear"></div>


<ul class="wrap nav">
	<li><a href="index.php">首页</a></li>  
	<li><a href="upload.php">上传视频</a></li> 
	<li><a href="#">关于</a></li> 
	<li><a href="http://www.uimaker.com/member/reg_new.php" target="_blank">美工参考</a></li> 
	<li><a href="http://www.w3school.com.cn/php/func_filesystem_move_uploaded_file.asp" target="_blank">php参考</a></li> 
	<li><a href="http://jquery.cuishifeng.cn/" target="_blank">jQuery手册</a></li> 
	<li><a href="note.txt" target="_blank">开发文档</a></li> 
</ul>