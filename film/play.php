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
<div class=wrap>

	<h1 id=title><?php echo $v_name;?></h1>

	<video id=myVideo poster="<?php echo $dir.$v_name;?>.jpg" controls preload="auto" name="media">
		<source src="<?php echo $dir.$v_name;?>.mp4" type="video/mp4">
		您的浏览器不支持html5“视频”标签。请使用chrome浏览器观看本站。
	</video>
	<div id=info></div>

	<br />
	<a id=list href="index.php" target="_blank">返回列表</a> | 
	<a id=playOrPause href="javascript:void(0);">播放</a> | 
	<a id=download href="<?php echo $dir.$v_name;?>.mp4" target="_">下载</a> | 
	
	<hr>
	<p>评论</p>
	
	
	
	<!-- UY BEGIN 评论代码-- >
	<div id="uyan_frame"></div>
	<script type="text/javascript" src="http://v2.uyan.cc/code/uyan.js"></script>
	<!-- UY END -->


</div>

<script>
//获取元素
function $(s){return document.getElementById(s);}

/**
* 将秒数换成时分秒格式
* 整理：www.jbxue.com
*/
//从秒转化为时分秒
function formatSeconds(value) {
    var s = parseInt(value);// 秒
    var m = 0;// 分
    var h = 0;// 小时
	
    if(s > 60) {
        m = parseInt(s/60);
        s = parseInt(s%60);
		if(m > 60) {
			h = parseInt(m/60);
			m = parseInt(m%60);
		}
    }
	var result = ""+parseInt(s)+"秒";
	if(m > 0)  result = ""+parseInt(m)+"分"+result;
	if(h > 0)  result = ""+parseInt(h)+"小时"+result;

    return result;
}

window.onload=function(){
	var myVideo = $('myVideo');//获取video元素
	var tol = 0;
	myVideo.addEventListener("loadedmetadata", function(){
		tol = myVideo.duration;//获取总时长
		$('info').innerHTML=formatSeconds(tol);
	});
	
	$('playOrPause').onclick=playToggle;
	
	//播放与暂停
	function playToggle(){
		if(myVideo.paused){
			myVideo.play();//播放
			this.innerHTML='暂停';
		}else{
			myVideo.pause();//暂停
			this.innerHTML='播放';
		}
	}
	
	//====================备用[0,时长(秒)]
	//可以记录播放的位置，放在关闭浏览器的事件中
	//播放时间点更新时
	myVideo.addEventListener("timeupdate", function(){
		var currentTime = myVideo.currentTime;//获取当前播放时间
		console.log(currentTime);//在调试器中打印
	});
	
	//设置播放点
	function playBySeconds(num){ 
		myVideo.currentTime = num;
	}
	
	//====================备用
	//可以记录播放的音量，放在关闭浏览器的事件中[0,1]
	//音量改变时
	myVideo.addEventListener("volumechange", function(){
		var volume = myVideo.volume;//获取当前音量
		console.log(volume);//在调试器中打印
	});
	//设置音量
	function setVol(num){ 
		myVideo.volume = num;
	}

	window.onunload = onbeforeunload_handler;      
    function onbeforeunload_handler(){   
       window.event.returnValue="确定要退出本页吗？"; 
    }

}


</script>

<?php 	include('footer.php'); ?>