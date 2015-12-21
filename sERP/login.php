<?php
defined('BathPath')||die('invalid!<br><a href="index.php">Go to index page</a>');

?>
<h1>请登陆</h1>

<form method='post' action="index.php">
	用户名：<input type='text' name='usr'>
	密码：<input type='password' name='psw'>

	<input type='submit' name='send' value='登陆'>
	<input type='reset' name='send' value='重置'>

</form>