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

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- 
这句很好的解决了兼容性！！
http://www.jb51.net/css/383986.html
-->
<meta http-equiv=”X-UA-Compatible” content=”IE=edge,chrome=1″ />
<style>

body {
    font: 12px/1.2 Tahoma,'Microsoft Yahei','Simsun';
	background: #f9f9f9;
}

.wrap{ width:1200px; margin:20px auto; border:2px solid #eee; padding:10px; border-radius:10px;
	border-bottom: 1px solid #CCCCCC;
}

a {
    text-decoration: none;
	cursor: pointer;
	
    font-weight: normal;
    font-size: 14px;
    color: #555;
}
a:hover{
    color: #06a7e1;
}

ul{
	list-style: none;
	overflow:hidden;
}
ul li{
	float:left; 
	border-left:1px solid grey;
	padding:0 10px;
}



/*顶部标题样式*/
#topNav{position:fixed; top:0px;  background:#0096ff;overflow:hidden; padding:8px 0; margin:0;
	width:100%; height:20px;}
#topNav .right{ float:right; color:#fff; padding:0 20px;}
#topNav a{ color:#fff;}


/*视频样式*/
video{width:600px;  border:2px solid #0096ff; padding:10px; background-color:#000;}

.clear{width:100%; height:20px; clear:both;overflow:hidden;}

.footer{text-align:center; width:1200px; margin:20px auto;
	border:1px solid #E9E8E8;
}
.anounce{text-align:left; margin: 10px 0; padding:10px;	
	background: #F9F9F9;}
	
	
</style>
</head>
<body>
<div id='topNav'>
	<span class=right>
		<a href="login.php">登陆</a> | 
		<a href="signin.php">注册</a>
	</span>
</div>
<div class="clear"></div>

<div class=wrap>
	<h1>xx慕课网</h1>
</div>
<ul class="wrap menu">
	<li><a href="index.php">首页</a></li>  
	<li><a href="xx">视频</a></li> 
	<li><a href="xx">上传</a></li> 
	<li><a href="xx">关于</a></li> 
	<li><a href="note.txt" target="_blank">开发文档</a></li> 
</ul>