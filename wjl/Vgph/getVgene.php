<?php
//----------------------------------
//定义库的路径，以/结尾。包含库文件
$path="F:/xampp/htdocs/wjl/Vgph/myLib/";
require $path.'myLibGate.php';
//----------------------------------

//获取class值
$vclass=get("c",'',true);//禁止直接访问
//获取引物值 // 'CAG GTG CAG CTG CAG GAG TCS G'
$primer0=get("q",'',true);//原始引物序列?这个默认值不起作用

//引物序列确定
$primer1= preg_replace("/\s/","",$primer0); //删除空格后
$len=strlen($primer1);//删除空格后的引物长度
$primer=replaceATGC($primer1);//替换引物中的简并碱基为ATGC

//设置变量保存响应值：
$response = "<div class=separator>Searching parameters</div>";
$response .= "Done at ".date("Y-m-d H:i:s",time()).", ";
$response .= "in the class: $vclass, ";

//输出引物
$response .= "<b>primer info: </b><div id=primr>
OriInput:$primer0<br />delSpace:$primer1 length:$len<br />aftSubst:$primer</div>";

//获取查询数据库的结果
$result=getVgeneList( $vclass,$primer);

//命中条目总数
$response .= "<div class=separator>Brief results</div>";
$response .= "<span class=blue><span class='hit'>Totally hit {$result[1]} record(s) after searching  {$result[2]} record(s)</span>. The gene names are:</span><br />";

//命中条目的名字
$response .=join(', ',$result[3]);

//加上v基因列表信息
$response.= "<div class=separator>Detailed results</div>";
$response.=$result[0]."<hr />End of detailed results.";

echo $response;
?>