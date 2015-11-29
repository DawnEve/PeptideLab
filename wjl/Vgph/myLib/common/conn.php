<?php
//连接数据库：
$conn=mysql_connect("localhost","root","");
//选择要操作的数据库；
mysql_select_db("test");
//修改mysql客户端和连接字符集；
mysql_query("set names utf8");