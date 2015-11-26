<?php

//简并引物替换函数
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