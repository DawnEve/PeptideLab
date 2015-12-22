<?php
define("BathPath","F:/xampp/htdocs/sERP/dawnPHP/");
include('dawnPHP/mylib.php');
//session
session_start();

echo ' <a href="index.php">Home Page</a><hr>';

if(!isset($_SESSION['uid'])){
	die('Invalid visit! Please login.');
}

$worker=$_SESSION['uid'];
if($worker['group']!=1){
	die('Invalid visit! Not administrator.');
}

use erp\Worker;
use erp\Status;
use erp\Money;
//======================

echo 'admin';

$m=new Money();
$m->detail();




?>