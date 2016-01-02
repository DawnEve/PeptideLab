<?php

class User{
	static function login($usr,$psw){
		//
		if($usr=='admin' && $psw=='1qazxsw2'){
			$_SESSION['user']=array(
				'uid'=>'admin',
			);
			
			return true;
		}
		
		return false;	
	}
	
	static function logout(){
		$_SESSION['user']=null;
	}	

	
	static function isLog(){
		if(isset($_SESSION['user'])){
			return true;
		}else{
			return false;
		}
	}
	
	

}