<?php
 session_start();
 
 if(isset($_SESSION['user'])){
	echo '管理员已经登陆。';
	echo '<hr><a href="index.html">回到首页</a>';
	
	echo '<br><br>';
	echo '<br><br>';

	echo '<br>请谨慎操作：<br>';
	echo '<hr><a href="action.php?a=init">清空数据</a>';
	
	
	die();
 }

?>
目前没有用户登陆。请登陆。
<a href="index.html">回到首页</a>
<hr>

<h1>请登陆</h1>

<form method='post' action="action.php?a=login">
	用户名：<input type='text' name='usr'>
	密码：<input type='password' name='psw'>

	<input type='submit' name='send' value='登陆'>
	<input type='reset' name='send' value='重置'>

</form>