<?php
set_include_path(get_include_path() . PATH_SEPARATOR . "core/main");
//set_include_path бк Sets the include_path configuration option
function __autoload($object){
  require_once("{$object}.php");
}