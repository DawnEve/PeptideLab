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
	
	
	
	
	
	
	
<!--	
<form accept-charset="UTF-8" action="/session" data-form-nonce="db5729f55df6970eced7b3d98c74979879cc945c" method="post">
	
	<div style="margin:0;padding:0;display:inline">
		<input name="utf8" type="hidden" value="">
		<input name="authenticity_token" type="hidden" value=<?php echo session_id();?>>
	</div> 
	<div class="auth-form-header">
        <h1 class="hosted-signin-title">Sign in</h1>
    </div>
	
	<div class="auth-form-body">
		<label for="login_field">
			Username or email address
		</label>
		<input autocapitalize="off" autocorrect="off" autofocus="autofocus" class="input-block" id="login_field" name="login" tabindex="1" type="text">

		<label for="password">
			Password <a href="/password_reset">(forgot password)</a>
		</label>
		<input class="input-block" id="password" name="password" tabindex="2" type="password">

		<input id="return_to" name="return_to" type="hidden" value="/join">
		<input class="btn " data-disable-with="Signing in…" name="commit" tabindex="3" type="submit" value="Sign in">
	</div>
</form>
	-->
	




</div>
<?php
include('footer.php');
?>