<?php

//定义库的路径，以/结尾
$path="F:/xampp/htdocs/wjl/Vgph/myLib/";
//包含库文件
require $path.'myLibGate.php';


//===========================================
//=====工作代码
//===========================================
//获取class值 http://blog.sina.com.cn/s/blog_aadf4b9201011d4t.html
if(empty($_GET["c"]))die('invalid URL');//禁止直接访问
$vclass=$_GET["c"];

//设置变量保存响应值：
$response= "<div class=separator>Searching parameters</div>";
$response.= "Done at ".date("Y-m-d H:i:s",time()).", ";
$response.="in the class: $vclass, ";
$responseT="";//保存响应的表格

//引进引物;
//get the q parameter from URL
if(empty($_GET["q"])){
	$primer0= "CAG GTG CAG CTG CAG GAG TCS G"; 
	//设置默认引物，====================================bug
	//不能设置默认引物？？？
}else{
	$primer0=trim($_GET["q"]);//去掉2端空格
}




//$primer0= "CAG GTA CAG CTG CAG CAG TCA"; //原始引物序列
$primer1= preg_replace("/\s/","",$primer0); //删除空格后
$len=strlen($primer1);//删除空格后的引物长度
$primer2=replaceATGC($primer1);//替换引物中的简并碱基为ATGC

//引物序列确定
$primer=$primer2;

//输出引物
$response .= "<b>primer info: </b><div id=primr>
OriInput:$primer0<br />delSpace:$primer1 length:$len<br />aftSubst:$primer2</div>";



//	sql语句
	//$sql='insert into user3(name,sex) values("大海", "boy");';
//	执行sql语句
	//$a=mysql_query($sql);//成功则返回1；



//sql语句
//$result = mysql_query("SELECT * FROM user2",$conn);

	//$result = mysql_query("SELECT * FROM vgene where class='humIGHV'",$conn);
	//$result = mysql_query("SELECT * FROM vgene where class='".$vclass. "'",$conn);

//构建sql语句	
if($vclass=="humIGLVAndhumIGKV"){
	$sql="SELECT * FROM vgene where class in('humIGLV','humIGKV')";
}else if($vclass=="all"){
	$sql="SELECT * FROM vgene";
}else{
	//$result = mysql_query("SELECT * FROM vgene where class='".$vclass. "'",$conn);
	$sql="SELECT * FROM vgene where class='".$vclass. "'";
}
//执行sql语句
	$result = mysql_query($sql,$conn);

//分析sql语句	
if ($myrow = mysql_fetch_array($result)) {
	$responseT .= "<table class=show border=1>\n";
	$responseT .= "<tr><th>Id</th><th>GeneName</th><th>class</th><th>sequence</th></tr>\n";
	
	$i=0;//hit数
	$i_totle=0;//查询总数
	$names="";//hit的v基因名字
	
	do {
		$i_totle++;//查询条目的计算器
		$template=$myrow["base"];
		$template2 = preg_replace("/($primer)/is", "<span class=highlight>$1</span>", $template);
		if($template!=$template2){
			$names.=$myrow["name"]." ";//命中的V基因名字
			//命中的V基因详细信息
			$responseT .='<tr><td>' . $myrow["No"]. '</td><td>'. $myrow["name"].'</td> <td>'. $myrow["class"] .'</td><td>'. $template2.'</td>';
			$i++;//命中记录的计数器
		}
	}while ($myrow = mysql_fetch_array($result));
	
	$responseT .= "</table>\n";
} else {
	$responseT = "对不起，没有找到记录！"; 
}


//命中条目总数
$response.= "<div class=separator>Brief results</div>";
$response .= "<span class=blue><span class='hit'>Totally hit $i record(s) after searching  $i_totle record(s)</span>. The gene names are:</span><br />";

//命中条目的名字
$response .="$names";

//加上响应的表格
$response.= "<div class=separator>Detailed results</div>";
$response.=$responseT."<hr />End of detailed results...";

echo $response;
//章节1 课时 4 
// http://study.163.com/course/courseLearn.htm?courseId=706085#/learn/video?lessonId=866409&courseId=706085
?>