<?php


/**
	get方式获取参数
参数列表：
	想要获取的参数名，默认值，没有该参数是否die
*/
function get($name,$default,$isDie=false){
	if(empty($_GET[$name])){
		if($isDie){die('invalid URL.');}
		return $default;
	}else{
		return trim($_GET[$name]);//去掉2端空格
	}
}








/**
	访问数据库，返回查询后的资源句柄
*/
function query($vclass){
	//构建sql语句	
	if($vclass=="humIGLVAndhumIGKV"){
		$sql="SELECT * FROM vgene where class in('humIGLV','humIGKV')";
	}else if($vclass=="all"){
		$sql="SELECT * FROM vgene";
	}else{
		$sql="SELECT * FROM vgene where class='".$vclass. "'";
	}
	//执行sql语句
	return mysql_query($sql);
}


/**
	简并引物替换函数
*/
function replaceATGC($str){
    $str=preg_replace("/R/is", "[AG]", $str);
    $str=preg_replace("/Y/is", "[TC]", $str);
    $str=preg_replace("/M/is", "[AC]", $str);
    $str=preg_replace("/K/is", "[TG]", $str);
    $str=preg_replace("/S/is", "[GC]", $str);
    $str=preg_replace("/W/is", "[AT]", $str);
	
    $str=preg_replace("/H/is", "[ATC]", $str);
    $str=preg_replace("/B/is", "[TGC]", $str);
    $str=preg_replace("/V/is", "[AGC]", $str);
    $str=preg_replace("/D/is", "[ATG]", $str);
	
    $str=preg_replace("/N/is", "[ATGC]", $str);

    return $str;
}

/**
	碱基是否相等；
	前一个是引物（可以兼并），后一个是模板（不能兼并）
	Degenerate base: 
		R:AG	Y:CT	M:AC	K:GT	S:GC	W:AT 
		H:ATC	B:GTC	V:GAC	D:GAT	N:ATGC
*/
function isEqual($strP,$strT){
	//先大写
	$strP=strtoupper($strP);
	$strT=strtoupper($strT);
	
	//判断
	if($strT=="A" && in_array($strP,array("A","R","M","W","H","V","D","N")) ){
		return true;
	}
	if($strT=="T" && in_array($strP,array("T","Y","K","W","H","B","D","N")) ){
		return true;
	}
	if($strT=="G" && in_array($strP,array("G","R","K","S","V","B","D","N")) ){
		return true;
	}
	if($strT=="C" && in_array($strP,array("C","Y","M","S","H","B","V","N")) ){
		return true;
	}
	
	return false;
}


/*
	匹配的一些限制词，全场使用
*/
class Limit{
	//定义匹配的条件
	static $firstMach=5;//3'端匹配至少数
	static $minMach=20;//至少匹配总数
	static $maxError=4;//最多的错误个数
}


/*	
	//检测是否匹配
	//$template2 = preg_replace("/($primer)/is", "<span class=highlight>$1</span>", $template);
	//输入引入和模板，返回关联数组，记录匹配详细信息
		[0] 错配个数;
		[1] 

*/
function doMatch($primer,$template){

	//1.找到匹配核，从模板的20个碱基之后找
	$len=Limit::$minMach-Limit::$firstMach;
	$template1=substr($template,$len);
	$template2 = preg_replace("/($primer)/is", "<span class=highlight>$1</span>", $template1);
	
	//2.找到之后向前延伸，使用isEqual函数判断，并记录正确和错误数
	
	//3.如果错误数大于最大数，或至少匹配总数达到，停止延伸
	
	//4.返回匹配核位置，正确数，错误数


}


/**
根据输入参数，获取vgene列表。
参数包括：
	数据库查询条件-v基因类型： $vclass
	兼并替换过的引物： $primer
	该引物是否为反向引物，默认为否：$isReverse=false
*/
function getVgeneList($vclass,$primer,$isReverse=false){
	// 用抗体类查询数据库
	$rows=query($vclass);
	
	// 分析查询结果	
	$tbl="";//保存数据table
	
	
	
	//逐个分析引物与模板的匹配关系
	if ($row = mysql_fetch_array($rows)) {
		$tbl .= "<table class=show border=1>\n";
		$tbl .= "<tr><th>Id</th><th>GeneName</th><th>class</th><th>sequence</th></tr>\n";
		
		$i=0;//hit数
		$i_totle=0;//查询总数
		$aHitNames=array();//hit的v基因名字的数组
		
		do {
			$i_totle++;//查询条目的计算器
			$template=$row["base"];//单条模板
			
			//引物是否反向，从5'-3'到3'-5'
			if($isReverse){
				$primer=strrev($primer);
			}
			
			//检测是否匹配
			//$template2 = preg_replace("/($primer)/is", "<span class=highlight>$1</span>", $template);
			//输入引入和模板，返回关联数组，记录匹配详细信息
			/*	
				[0] 错配个数;
				[1] 
			
			*/
			$arrResult=doMatch($primer,$template);
			
			
			
			
			if($template!=$template2){
				$aHitNames[]= $row["name"];//命中的V基因名字
				//命中的V基因详细信息
				$tbl .='<tr><td>' . $row["No"]. '</td><td>'. $row["name"].'</td> <td>'. $row["class"] .'</td><td>'. $template2.'</td>';
				$i++;//命中记录的计数器
			}
		}while ($row = mysql_fetch_assoc($rows));
		
		$tbl .= "</table>\n";
	} else {
		$tbl = "对不起，没有找到记录！"; 
	}
	return array($tbl,$i,$i_totle,$aHitNames);
	//返回数组：用于显示的表单，命中条目，总数，命中基因的名字。
}