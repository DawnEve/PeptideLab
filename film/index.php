<?php  include('header.php'); ?>
<div class=wrap>

<style>

.box,.box img{width:260px; height:176px; }
.box{float:left;position:relative;
	opacity:0.5;/*ff,chrome 50%*/
	filter:alpha(opacity=50); /*IE滤镜，透明度50%*/
	border:5px solid #fff;
	overflow:hidden;
	padding:10px;
}
.box span{ position:absolute; 
	background:#fff; padding:10px 20px;  left:5px;top:5px;
	width:100%;
	opacity:0.9;/*ff,chrome */
	filter:alpha(opacity=90); /*IE滤镜，透明度*/
}
.box span a{
	display: inline-block;
    color: #fff;
    background: #00C4F5;
    padding: 3px 5px;
}
.box:hover{
	opacity:0.9;/*ff,chrome 90%*/
	filter:alpha(opacity=90); /*IE滤镜，透明度90%*/
	border:5px solid #0096ff;
}
.box span p{z-indent:2;}
</style>

<div id='videoList'>
<?php
	$str='';
	for($i=1;$i<=count($v_list);$i++){
		$str = '';
		$str .= '<div class=box>';
		$str .= "	<a href='play.php?id={$i}'>";
		$str .= '		<img src="media/'. $v_list[$i] .'.jpg">';
		$str .= '	</a> ';
		$str .= '	<span><b>'. $v_list[$i] .'</b> | ';
		$str .= '		<a href="media/'. $v_list[$i] .'.mp4" target="_" title="请右键，选择 另存为">下载</a>';
		$str .='	</span> ';
		$str .= "</div>\n\n";
		echo $str;
	};

?>
</div>


	
<div class=clear></div>
<div class=clear></div>
	
	
	
	<!-- UY BEGIN 评论代码-- >
	<div id="uyan_frame"></div>
	<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js"></script>
	<!-- UY END -->


</div>

<script>
	


</script>

<?php 	include('footer.php'); ?>