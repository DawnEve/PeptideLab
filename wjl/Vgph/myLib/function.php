<?php
/**
	�������ݿ⣬���ز�ѯ�����Դ���
*/
function query($vclass){
	//����sql���	
	if($vclass=="humIGLVAndhumIGKV"){
		$sql="SELECT * FROM vgene where class in('humIGLV','humIGKV')";
	}else if($vclass=="all"){
		$sql="SELECT * FROM vgene";
	}else{
		$sql="SELECT * FROM vgene where class='".$vclass. "'";
	}
	//ִ��sql���
	return mysql_query($sql);
}


/**
	�������滻����
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
���������������ȡvgene�б�
����������
	���ݿ��ѯ����Դ����� $rows 
	�沢�滻������� $primer
	�������Ƿ�Ϊ�������Ĭ��Ϊ��$isReverse=false
*/
function getVgeneList($rows,$primer,$isReverse=false){
	//������ѯ���	
	$tbl="";//������Ӧ�ı��
	if ($row = mysql_fetch_array($rows)) {
		$tbl .= "<table class=show border=1>\n";
		$tbl .= "<tr><th>Id</th><th>GeneName</th><th>class</th><th>sequence</th></tr>\n";
		
		$i=0;//hit��
		$i_totle=0;//��ѯ����
		$aHitNames=array();//hit��v��������
		
		do {
			$i_totle++;//��ѯ��Ŀ�ļ�����
			$template=$row["base"];
			
			//���ﷴ�򣬴�5'-3'��3'-5'
			if($isReverse){
				$primer=strrev($primer);
			}
			
			//����Ƿ�ƥ��
			$template2 = preg_replace("/($primer)/is", "<span class=highlight>$1</span>", $template);
			if($template!=$template2){
				$aHitNames[]= $row["name"];//���е�V��������
				//���е�V������ϸ��Ϣ
				$tbl .='<tr><td>' . $row["No"]. '</td><td>'. $row["name"].'</td> <td>'. $row["class"] .'</td><td>'. $template2.'</td>';
				$i++;//���м�¼�ļ�����
			}
		}while ($row = mysql_fetch_array($rows));
		
		$tbl .= "</table>\n";
	} else {
		$tbl = "�Բ���û���ҵ���¼��"; 
	}
	return array($tbl,$i,$i_totle,$aHitNames);
}