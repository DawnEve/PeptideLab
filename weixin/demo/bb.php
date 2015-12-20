<?php
include('MyDebug.class.php');

MyDebug::f($_GET,'bb.post.txt');

if (isset($_GET['code'])){
    echo $_GET['code'];
}else{
    echo "NO CODE";
}
?>