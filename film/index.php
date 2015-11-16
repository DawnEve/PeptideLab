<?php  include('header.php'); ?>
<div class=wrap>

<style>

#videoList{border:1px solid #fff; overflow:hidden;}
.box,.box img{width:227px; height:176px; }
.box{float:left;position:relative;
	opacity:0.8;/*ff,chrome 50%*/
	filter:alpha(opacity=80); /*IE滤镜，透明度50%*/
	border:3px solid #fff;
	overflow:hidden;
	margin:3px;
}
.box span{ position:absolute; 
	background:#fff; padding:5px;  left:0px;top:0px;
	width:100%;
	opacity:0.8;/*ff,chrome */
	filter:alpha(opacity=80); /*IE滤镜，透明度*/
}
.box span a{
	display: inline-block;
    color: #fff;
    background: #00C4F5;
    padding: 3px 5px;
}
.box:hover{
	opacity:1;/*ff,chrome 100%*/
	filter:alpha(opacity=100); /*IE滤镜，透明度100%*/
	border:3px solid #0096ff;
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


<script src="html5media/jquery-1.11.2.min.js"></script>
<script type="text/javascript">
/** 鼠标悬停时图片放大 */
$(function(){
	var imgWid = 0 ;
	var imgHei = 0 ; //变量初始化
	var big = 1.1;//放大倍数
	$(".box").each(function(index){
		$(this).hover(function(){
			$(this).stop(true,true);
			var imgWid2 = 0;var imgHei2 = 0;//局部变量
			imgWid = $(this).find('img').width();
			imgHei = $(this).find('img').height();
			imgWid2 = imgWid * big;
			imgHei2 = imgHei * big;
			$(this).find('img').css({"z-index":2});
			$(this).find('img').animate({"width":imgWid2,"height":imgHei2,  "margin-left":-imgWid2/20,"margin-top":-imgHei2/20 });
		},function(){
			$(this).find('img').stop().animate({"width":imgWid,"height":imgHei,"z-index":1,  "margin-left":0,"margin-top":0});
		});
	});
});
</script>


<?php 	include('footer.php'); ?>