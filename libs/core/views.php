<?php
class Views
{
  function getView($controller,$view, $data="")
  {
    $controller = get_class($controller);
    if($controller == "Inicio")
    {
      $view = VIEWS.$view.".php";
    }
    else{
      $view = VIEWS.$controller."/".$view.".php";
    }
    require_once($view);
  }
}
?>