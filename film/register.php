<?php include('header.php');
//login.php
?>
<script src="html5media/jquery-1.11.2.min.js"></script>
<div class='wrap'>
	
<div class="regleft">
    
    <ul class="regtab">
		<span class="ftitle">用户注册</span>
		<span class="ftbg"></span>
    </ul>
    
	<div class="clearfix"></div>

<form action="register_do.php" method="post" id="regUser" name="form2">
	<input name="authenticity_token" type="hidden" value=<?php echo session_id();?>>
	<ul class="regul">
		<li><span>用户名</span><input class="inputbtn" id="txtUsername" name="userid"><i id="_userid"><em class="red">*</em>用户名必须是3-15个中文、数字、字母、下划线</i></li>
		
		<li><span>昵称</span><input class="inputbtn" id="uname" name="uname"><i id="_uname"><em class="red">*</em></i></li>
		
		<li><span>密码</span><input class="inputbtn" type="password" id="txtPassword" name="userpwd"><i id="_txtPassword"><em class="red">*</em></i></li>
		<li><span>确认密码</span><input class="inputbtn" type="password" id="userpwdok" name="userpwdok"><i id="_userpwdok"><em class="red">*</em></i></li>
		
		
		<li><span>邮箱</span><input class="inputbtn" id="email" name="email"><i id="_email">请填写真实邮箱</i></li>
		<li><span>性别</span><cite><input type="radio" checked="checked" value="男" name="sex">&nbsp;&nbsp;男&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="男" name="sex">&nbsp;&nbsp;女</cite></li>

		
		<li><span>&nbsp;</span><input type="checkbox" value="" checked="checked" id="agree" name="agree">&nbsp;&nbsp;<cite>我已阅读并接受版权声明</cite></li>
		<li><span>&nbsp;</span><input name="" type="submit" class="rlogin" value="注册"><cite><b>已经有账号？</b><a href="/member/login.php" class="alogin">请登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="resetpassword.php">忘记密码？</a></cite></li>
	</ul>
		<input type="hidden" value="0" id="checkA">
		<input type="hidden" value="0" id="checkB">
		<input type="hidden" value="0" id="checkC">

</form>
    <script>
	var reMethod = "GET",pwdmin = 6;
	//var regUser = document.getElementById("regUser");
	//var uname = document.getElementById("uname");
	//var userpwd = document.getElementById("userpwd");
	//regUser.onsubmit = function(){
		
	//	return false;	
	//}
	var yzztA = 0;
	var yzztB = 0;
	var yzztC = 0;
	var yzztD = 0;
	$('#regUser').submit(function ()
	{
		if(!$('#agree').get(0).checked) {
			alert("你必须同意注册协议！");
			return false;
		}
		if($('#txtUsername').val()==""){
			$('#txtUsername').focus();
			$("#_userid").html("<font color='red'><b>×用户名不能为空！</b></font>");
			return false;
		}
		if($('#uname').val()==""){
			$('#uname').focus();
			$("#_uname").html("<font color='red'><b>×用户呢称不能为空！</b></font>");
			return false;
		}
		if($('#txtPassword').val()=="")
		{
			$('#txtPassword').focus();
			$("#_userpwdok").html("<font color='red'><b>×登陆密码不能为空！</b></font>");
			return false;
		}
		if($('#txtPassword').val()!=$('#userpwdok').val())
		{
			$('#userpwdok').focus();
			$("#_userpwdok").html("<font color='red'><b>×两次密码不一致！</b></font>");
			return false;
		}
		if($('#uname').val()=="")
		{
			$('#uname').focus();
			$("#_uname").html("<font color='red'><b>×用户昵称不能为空！</b></font>");
			return false;
		}
		if($('#email').val()=="")
		{
			//$('#email').focus();
			$("#_email").html("<font color='red'><b>×邮箱地址不能为空！</b></font>");
			return false;
		}
		var sEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
		if(!sEmail.exec($("#email").val()))
		{
			$('#_email').html("<font color='red'><b>×Email格式不正确</b></font>");
			//$('#email').focus();
			return false;
		}
		if($('#checkA').val()=="0")
		{
			$('#txtUsername').focus();
			$.ajax({type: reMethod,url: "index_do.php",
			data: "dopost=checkuser&fmdo=user&cktype=1&uid="+$("#txtUsername").val(),
			dataType: 'html',
			success: function(result){$("#_userid").html(result);if(result.toLowerCase().indexOf('red')!=-1){return false}else{$("#checkA").val(1);yzztA=0}}}); 
			return false;
		}
		
		if($('#checkB').val()=="0")
		{
			$('#uname').focus();
			$.ajax({type: reMethod,url: "index_do.php",
			data: "dopost=checkuser&fmdo=user&cktype=0&uid="+$("#uname").val(),
			dataType: 'html',
			success: function(result){$("#_uname").html(result);if(result.toLowerCase().indexOf('red')!=-1){return false}else{$("#checkB").val(1);yzztB=0}}}); 
			return false;
		}
		
		if($('#checkC').val()=="0")
		{
			$('#email').focus();
			$.ajax({type: reMethod,url: "index_do.php",
			data: "dopost=checkmail&fmdo=user&email="+$("#email").val(),
			dataType: 'html',
			success: function(result){$("#_email").html(result);if(result.toLowerCase().indexOf('red')!=-1){return false}else{$("#checkC").val(1);yzztC=0}}}); 
			return false;
		}
		
		//if($('#vdcode').val()=="")
//		{
//			$('#vdcode').focus();
//			alert("验证码不能为空！");
//			return false;
//		}
		//$.ajax({type: reMethod,url: "index_do.php",
//		data: "dopost=checkuser&fmdo=user&cktype=1&uid="+$("#txtUsername").val(),
//		dataType: 'html',
//		success: function(result){$("#_userid").html(result);if(result.toLowerCase().indexOf('red')!=-1){return false}}}); 
//		
//		$.ajax({type: reMethod,url: "index_do.php",
//		data: "dopost=checkuser&fmdo=user&cktype=0&uid="+$("#uname").val(),
//		dataType: 'html',
//		success: function(result){$("#_uname").html(result);if(result.toLowerCase().indexOf('red')!=-1){return false}}}); 
//		
//		$.ajax({type: reMethod,url: "index_do.php",
//		data: "dopost=checkmail&fmdo=user&email="+$("#email").val(),
//		dataType: 'html',
//		success: function(result){$("#_email").html(result);if(result.toLowerCase().indexOf('red')!=-1){return false}}}); 
			if(yzztA>0){$("#_userid").html("<font color='red'><b>×用户名输入有误，请重新输入！</b></font>");$('#txtUsername').focus();return false;}
			if(yzztB>0){$("#_uname").html("<font color='red'><b>×用户昵称输入有误，请重新输入！</b></font>");$('#uname').focus();return false;}
			if(yzztC>0){$("#_email").html("<font color='red'><b>×邮箱输入有误，请重新输入！</b></font>");$('#email').focus();return false;}
			if(yzztD>0){$("#_userpwdok").html("<font color='red'><b>×密码输入有误，请重新输入！</b></font>");$('#userpwdok').focus();return false;}
			
		
	});
	//AJAX changChickValue
	$("#txtUsername").blur( function() {
		if(this.value){
			$.ajax({type: reMethod,url: "index_do.php",
			data: "dopost=checkuser&fmdo=user&cktype=1&uid="+$("#txtUsername").val(),
			dataType: 'html',
			success: function(result){$("#_userid").html(result);if(result.toLowerCase().indexOf('red')!=-1){yzztA=1}else{$("#checkA").val(1);yzztA=0}}}); 
		}
	});
	$("#uname").blur( function() {
		if(this.value){
			$.ajax({type: reMethod,url: "index_do.php",
			data: "dopost=checkuser&fmdo=user&cktype=0&uid="+$("#uname").val(),
			dataType: 'html',
			success: function(result){$("#_uname").html(result);if(result.toLowerCase().indexOf('red')!=-1){yzztB=1}else{$("#checkB").val(1);yzztB=0}}}); 
		}
	});
	$("#email").blur( function() {
		var sEmail = /\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
		if(!sEmail.exec($("#email").val()))
		{
			$('#_email').html("<font color='red'><b>×Email格式不正确</b></font>");
			//$('#email').focus();
		}else{
			$.ajax({type: reMethod,url: "index_do.php",
			data: "dopost=checkmail&fmdo=user&email="+$("#email").val(),
			dataType: 'html',
			success: function(result){$("#_email").html(result);if(result.toLowerCase().indexOf('red')!=-1){yzztC=1}else{$("#checkC").val(1);yzztC=0}}}); 
		}
	});	
	$('#txtPassword').blur( function(){
		if($('#txtPassword').val().length < pwdmin)
		{
			$('#_txtPassword').html("<font color='red'><b>×密码不能小于"+pwdmin+"位</b></font>");
			yzztD=4;
		}
		else if($('#userpwdok').val()!=$('txtPassword').val())
		{
			$('#_userpwdok').html("<font color='red'><b>×两次输入密码不一致</b></font>");
			yzztD=4;
		}
		else if($('#userpwdok').val().length < pwdmin)
		{
			$('#_userpwdok').html("<font color='red'><b>×密码不能小于"+pwdmin+"位</b></font>");
			yzztD=4;
		}
		else
		{
			$('#_txtPassword').html("<font color='#4E7504'><b>√填写正确</b></font>");
			$('#_userpwdok').html("<font color='#4E7504'><b>√填写正确</b></font>");
			yzztD=0;
		}
	});
	
	$('#userpwdok').blur( function(){
		if($('#userpwdok').val().length < pwdmin)
		{
			$('#_userpwdok').html("<font color='red'><b>×密码不能小于"+pwdmin+"位</b></font>");
			yzztD=4;
		}
		else if($('#userpwdok').val()=='')
		{
			$('#_userpwdok').html("<b>请填写确认密码</b>");
			yzztD=4;
		}
		else if($('#userpwdok').val()!=$('#txtPassword').val())
		{
			$('#_userpwdok').html("<font color='red'><b>×两次输入密码不一致</b></font>");
			yzztD=4;
		}
		else
		{
			$('#_txtPassword').html("<font color='#4E7504'><b>√填写正确</b></font>");
			$('#_userpwdok').html("<font color='#4E7504'><b>√填写正确</b></font>");
			yzztD=0;
		}
	});
	</script>
    
    
    
    </div>
	
	
	
	
	<div class=clear></div>

</div>
<?php
//本页风格：http://www.uimaker.com/member/reg_new.php
include('footer.php');
?>