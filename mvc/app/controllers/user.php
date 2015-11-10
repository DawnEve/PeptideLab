<?php
//user.php
class user
{
  function base()
  {
  }
  
  public function login()
  {
    echo 'login html page';
  }
  
  public function register()
  {
    echo 'register html page';
  }
  
  public function setParams($params){
	var_dump($params);
  }
  
}