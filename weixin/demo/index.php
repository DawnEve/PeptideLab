<?php
/**
  * wechat php test
  */

include('../MyDebug.class.php');
include('WeChat.class.php');

$wc=new WeChat('wx527dd89a15670d7e','d4624c36b6795d1d99dcf0547af5443d','');
$wc->responseMsg();

?>