<?php include('header.php');
//login.php
?>

<style>

</style>
<div class='wrap'>
	

	
	
	<div class="regleft">
    
    <ul class="regtab">
    <span class="ftitle">找回密码</span>
    <span class="ftbg"></span>
    </ul>
    
	<div class="clearfix"></div>

      
<?php
	if(!isset($_POST['mysubmit'])){
?>    
    <form name="form1" method="POST" action="resetpassword.php">
      <input type="hidden" name="dopost" value="getpwd">
      <input type="hidden" name="gourl" value="">
	  
      <ul class="regul">
        <li><span>用户名：</span><input name="userid" type="text" id="txtUsername" class="inputbtn"></li>
        <li><span>邮&nbsp;&nbsp;&nbsp;箱：</span><input name="mail" type="text" id="txtPassword" class="inputbtn"></li>
         <li> <span>验证码：</span>
          <input id="vdcode" class="inputbtn" type="text" style="width: 50px; text-transform: uppercase;" name="vdcode">
          <img id="vdimgck" align="absmiddle" onclick="this.src=this.src+'?'" style="cursor: pointer;" alt="看不清？点击更换" src="../include/vdimgck.php" original="../include/vdimgck.php">
           看不清？ <a href="#" onclick="changeAuthCode();">点击更换</a> </li>
           

        <li><span>&nbsp;</span>
          <button class="rlogin" id="btnSignCheck" name='mysubmit' type="submit">发送到邮箱</button>
        </li>
      </ul>
	  
    </form>
 <?php
 }else{
 ?>   
    
	<form name="form1" method="POST" action="resetpassword.php">
      
		<ul class="regul">
			<li>重置密码的链接已经发送到邮箱，请查收。</li>

	  
			<li><span>&nbsp;</span>
			  <button class="rlogin" id="btnSignCheck" name='mysubmit'>请登陆邮箱</button>
			</li>
		</ul>
	  
    </form>
	
	
	
	
	
  <?php
}
 ?>    
    </div>
	
	
	
	
	
	
	
	

	<div class=clear></div>
	
</div>
<?php
include('footer.php');
?>