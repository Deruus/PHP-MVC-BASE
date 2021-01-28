<?php
$cF = "controllers/".$controller.".php";

if(file_exists($cF)){
  require_once($cF);
  $controller = new $controller();
  if(method_exists($controller, $method))
  {
    $controller->{$method}($args);
  }else{
    require_once("controllers/err.php");
  }
}
else{
  require_once("controllers/err.php");
}
?>