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
根据输入参数，获取vgene列表。
参数包括：
	数据库查询的资源句柄： $rows 
	兼并替换过的引物： $primer
	该引物是否为反向引物，默认为否：$isReverse=false
*/
function getVgeneList($rows,$primer,$isReverse=false){
	//分析查询结果	
	$tbl="";//保存响应的表格
	if ($row = mysql_fetch_array($rows)) {
		$tbl .= "<table class=show border=1>\n";
		$tbl .= "<tr><th>Id</th><th>GeneName</th><th>class</th><th>sequence</th></tr>\n";
		
		$i=0;//hit数
		$i_totle=0;//查询总数
		$aHitNames=array();//hit的v基因名字
		
		do {
			$i_totle++;//查询条目的计算器
			$template=$row["base"];
			
			//引物反向，从5'-3'到3'-5'
			if($isReverse){
				$primer=strrev($primer);
			}
			
			//检测是否匹配
			$template2 = preg_replace("/($primer)/is", "<span class=highlight>$1</span>", $template);
			if($template!=$template2){
				$aHitNames[]= $row["name"];//命中的V基因名字
				//命中的V基因详细信息
				$tbl .='<tr><td>' . $row["No"]. '</td><td>'. $row["name"].'</td> <td>'. $row["class"] .'</td><td>'. $template2.'</td>';
				$i++;//命中记录的计数器
			}
		}while ($row = mysql_fetch_array($rows));
		
		$tbl .= "</table>\n";
	} else {
		$tbl = "对不起，没有找到记录！"; 
	}
	return array($tbl,$i,$i_totle,$aHitNames);
}