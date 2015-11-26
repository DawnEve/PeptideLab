<?php include('header.php');
//login.php
?>

<style>

</style>
<div class='wrap'>
	
	<div class="loginleft">
		<div class="logintitle">
			<span class="ftitle">用户登录</span>
			<span class="ftbg"></span>
			
			<form name="form1" method="POST" action="index_do.php">
				<ul class="logininfo">
					<li><span>用户名</span><input class="inputbtn" id="txtUsername" name="userid"></li>
					<li><span>密码</span><input type="password" class="inputbtn" id="txtPassword" name="pwd"></li>
					<li><span>&nbsp;</span><input name="keeptime" type="checkbox" value="2592000">&nbsp;&nbsp;在这台电脑上记住我&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="resetpassword.php">忘记密码?</a></b></li>
					<li><span>&nbsp;</span><input name="" type="submit" class="ulogin" value="登录"><input name="" type="button" class="ureg" onclick="window.location.href='register.php'" value="注册"></li>
				</ul>
				<input type="hidden" name="fmdo" value="login">
				<input type="hidden" name="dopost" value="login">
				<input type="hidden" name="nocheck" value="yes">
				 <input type="hidden" name="gourl" value="">
			</form>
			
		</div>
    </div>
    
	
	
	
	
	<div class=clear></div>
	

</div>
<?php
include('footer.php');
?>