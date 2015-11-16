<?php include('header.php');
//login.php
?>

<div class='wrap'>
	
	
	<div class="loginleft">
		<div class="logintitle">
			<span class="ftitle">上传视频</span>
			<span class="ftbg"></span>
	
			<form name="form1" method="POST" action="upload_do.php" enctype="multipart/form-data">
				<ul class="logininfo">
					<li><span>视频名称</span><input class="inputbtn" id="txtName" name="v_name"></li>
					<li><span>视频封面</span><input class="inputFile" type="file" name="picture"></li>
					<li><span>视频</span><input class="inputFile" type="file" name="video"></li>
					<li><span>标签</span><input class="inputbtn" type="text" id="tags" name="tags">
						<i id="_tags"><em class="red">* 标签之间用逗号或空格隔开</em></i>
					</li>
					
					
					<li class=higher><span>视频内容简介</span><textarea name="content" rows="10" cols="50"></textarea></li>
					
					<li><span>&nbsp;</span><input name="mysubmit" type="submit" class="ulogin" value="上传" onclick="return chkinput(form1);">
					<input name="" type="reset" class="ureg" value="重置"></li>
				</ul>
				<input type="hidden" name="userid" value='<?php echo "uid";?>'></td>
				<input type="hidden" name="fmdo" value="login">
				<input type="hidden" name="dopost" value="upload">
				<input type="hidden" name="nocheck" value="yes">
			</form>
		</div>
    </div>
	
	
	
	
	<div class=clear></div>
	

</div>
<?php
include('footer.php');
?>