
<div class="footer">
<div class="wrap">
	<div class='copyright'>
		Copyright © 2001-2015 xxMooc, All Rights Reserved. <a href='index.php'>某某慕课网</a> 版权所有
	</div>
	
	<div class=anounce>
		<b>欢迎监督和反馈：</b><br>
	某某慕课xxMOOC（xx massive open online courses）仅提供交流平台。<br>
	欢迎协助我们监督管理，共同维护互联网健康，如果您对网站上面的内容有异议，请立即发邮件到 xxMooc@163.com 联系通知管理员，也可以通过QQ周知，我们的QQ号为: 123456789 <br>
	我们保证在1个工作日内给予处理和答复，谢谢您的监督。
	</div>
	
	<div class='links'>
	<?php //友情链接
/**
* 根据友情链接数组，输出拼接好的字符串
* 输入link数组
*/
function print_links($links){
	$str='';
	for($i=0; $i<count($links); $i++){
		//
		$arr=$links[$i];
		$str .= "<a href='". $arr[0] ."' target='_blank'>". $arr[1] ."</a>";
		if($i!= (count($links)-1) ) $str .=  ' | ';
		if( ($i!=0) && ($i%15==0) ) $str .=  '<br />';
	}
	return $str;
}
	
		//计算机技术类============================工具类
		$links_IT_tools=array(
			array('http://jquery.cuishifeng.cn/','jQuery手册'),
			array('http://www.php100.com/manual/css3_0/media-20queries.shtml','css3手册'),
			array('http://www.w3school.com.cn/','w3school'),
			array('http://miostudio.sinaapp.com/','mySinaapp'),
			array('http://php.net/','PHP'),
			array('http://www.sqlite.org/','sqlite'),
			array('https://openresty.org/download/agentzh-nginx-tutorials-zhcn.html','Nginx教程(版本2015.03.19)'),
			//  
			array('http://aibusy.com/blog/?p=226','Sublime插件'),
			array('http://www.uimaker.com/member/reg_new.php','UI制造者'),
			array('http://bonsaiden.github.io/JavaScript-Garden/zh/#function.closures','js秘密花园'),
			array('http://www.qietu.com/','切图网'),
			array('http://www.php100.com/','php100'),
			array('http://www.bootcss.com/','bootstrap'),
			array('http://www.shejidaren.com/free-bootstrap-ui-kits.html','设计达人'),
		);
		echo '<br />友情链接[IT Tools]: ', print_links($links_IT_tools);

		//计算机技术类============================资料类
		$links_IT=array(
			array('http://www.imeixue.cn/','每学网'),// 韩顺平的作品？
			array('http://www.w3cplus.com/','w3cplus'),// 大漠
			array('http://www.css88.com/archives/1706','前端'),
			array('http://study.163.com/','网易云课堂'),
			array('http://www.imooc.com/','慕课网'),

			array('http://www.shejipi.com/12931.html','设计癖'),
			array('http://www.w3cfuns.com/article-1306-1.html','响应式布局'),
			array('http://code.csdn.net/news/2819417','25个前端框架'),
			array('http://aibusy.com/course_list.html','前端大纲'),
			array('http://www.cnblogs.com/ljchow/archive/2010/06/09/1754352.html','js动画原理'),
			array('http://www.blogdaren.com/','php博客花园'),
			array('http://gaodc.com/','8年php高东臣博客'),
			array('http://www.shouce.ren/api/index','在线手册下载'),
		);
		echo '<br />友情链接[IT]: ', print_links($links_IT);
		
		
		//某某技术类===========================
		$links=array(
			array('http://emuch.net/','小木虫'),
			array('http://www.dxy.cn/','丁香园'),
		);
		echo '<br />友情链接[scholar]: ', print_links($links);
	?>
	</div>
</div>
</div>

<style>

</style>
<a href="#container" class="gotop" style="display: inline;">Top</a>


</body>
</html>