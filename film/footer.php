
<div class="wrap footer">
	<div style="color:gray;">
		Copyright © 2001-2015 bioMOOC, All Rights Reserved. <a href='index.php'>生物慕课网</a> 版权所有
	</div>
	
	<div class=anounce>
		<b>欢迎监督和反馈：</b><br>
	生物慕课Bio MOOC（biology massive open online courses）仅提供交流平台。<br>
	欢迎协助我们监督管理，共同维护互联网健康，如果您对网站上面的内容有异议，请立即发邮件到 bioMOOC@163.com 联系通知管理员，也可以通过QQ周知，我们的QQ号为: 123456789 <br>
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
		if( ($i!=0) && ($i%10==0) ) $str .=  '<br />';
	}
	return $str;
}
	
		//计算机技术类============================
		$links_IT=array(
			array('http://www.imeixue.cn/','每学网'),// 韩顺平的作品？
			array('http://www.css88.com/archives/1706','前端'),
			array('http://jquery.cuishifeng.cn/','jQuery手册'),
			array('http://jquery.cuishifeng.cn/','jQuery手册'),
			array('http://www.w3school.com.cn/','w3school'),
			array('http://miostudio.sinaapp.com/','mySinaapp'),
			array('http://php.net/','PHP'),
			array('http://www.imooc.com/','慕课网'),
			array('http://www.uimaker.com/member/reg_new.php','UI制造者'),
			array('http://study.163.com/','网易云课堂'),
		);
		echo '友情链接[IT]: ', print_links($links_IT);
		
		
		//生物技术类===========================
		$links=array(
			array('http://emuch.net/','小木虫'),
			array('http://www.dxy.cn/','丁香园'),
		);
		echo '<br />友情链接[bio]: ', print_links($links);
	?>
	</div>
</div>

</body>
</html>