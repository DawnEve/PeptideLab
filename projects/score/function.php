<?php
function debug($s){
	echo '<pre>';
	print_r($s);
	
	echo '</pre>';
	die();
}