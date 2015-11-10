<?
class dispatcher
{
  public static function dispatch($router)
  {
    global $app;
    ob_start();
    $start = microtime(true);
    $controller = $router->getController();
    $action = $router->getAction();
    $params = $router->getParams();
    $controllerfile = "app/controllers/{$controller}.php";
    if (file_exists($controllerfile)){
      require_once($controllerfile);
      $app = new $controller();
      $app->setParams($params);
      $app->$action();
      if (isset($start)) echo "

Tota1l time for dispatching is : ".(microtime(true)-$start)." seconds.

";
      $output = ob_get_clean();
      echo $output;
     }else{
	throw new Exception("Controller not found");
     }
   }
}