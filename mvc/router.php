<?php
class router
{
  private $route;
  private $controller;
  private $action;
  private $params;
  public function __construct()
  {
    $path = array_keys($_GET);
    if (!isset($path[0])){
      if (!empty($default_controller))
           $path[0] = $default_controller;
      else
           $path[0] = "index";
    }
    $route= $path[0];
    $this->route = $route;
    $routeParts = split( "/",$route);
    $this->controller=$routeParts[0];
    $this->action=isset($routeParts[1])? $routeParts[1]:"base";
    array_shift($routeParts);
    array_shift($routeParts);
    $this->params=$routeParts;
  }
  
  public function getAction() {
    if (empty($this->action)) $this->action="main";
    return $this->action;
  }
  
  public function getController()  {
    return $this->controller;
  }
  
  public function getParams()  {
    return $this->params;
  }
}