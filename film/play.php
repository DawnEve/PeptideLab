<?php 
	include('header.php');

	
	//1.获取参数
	if(isset($_GET['id'])){
		$id=$_GET['id'];
	}else{
		$id=1;
	}
	
	//echo "<script>v_id=$id;</script>";
	
	//2.获取视频列表

	
	//3.获取视频目录和文件名
	$v_name=$v_list[$id];
	$dir='media/';
	
	//4.显示视频
?>
  <!-- for players  begin-->
  <link rel="stylesheet" href="html5media/flowplayer/skin/minimalist.css">
  <script src="html5media/jquery-1.11.2.min.js"></script>
  <script src="html5media/flowplayer/flowplayer.min.js"></script>
  <!-- for players  end-->
   <style>
  /*视频样式*/
#flowplayer{width:600px; border:2px solid #0096ff; padding:10px; background-color:black; color:red;}
</style>

<div class=wrap>

	<h1><?php echo $v_name;?></h1>


	
<div class="flowplayer" id=flowplayer width="320" height="240" controls="controls" preload="auto" name="media">
	<video poster="<?php echo $dir.$v_name;?>.jpg">
		<source type="video/mp4" src="<?php echo $dir.$v_name;?>.mp4">

		您的浏览器不支持html5视频标签。推荐chrome等现代浏览器。
	</video>
</div>
	
	

	<br />
	<a id='list' href="index.php" target="_blank">返回列表</a> | 
	<a id='store' href="javascript:void(0);">收藏</a> | 
	<a id='download' href="<?php echo $dir.$v_name;?>.mp4" target="_">下载</a> | 
	
	<hr>
	<p>评论</p>
	
	
	
	<!-- UY BEGIN 评论代码-- >
	<div id="uyan_frame"></div>
	<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js"></script>
	<!-- UY END -->


</div>

<script>
$(document).ready(function(){
  // 在这里写你的代码...
	$('#store').click(function(){
		alert('该功能正在开发中...');
	});

});


</script>

<?php 	include('footer.php'); ?>