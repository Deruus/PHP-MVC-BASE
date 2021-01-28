<?php 
spl_autoload_register(function($class){
  if(file_exists(LIBS.'core/'.$class.".php")){
    require(LIBS.'core/'.$class.".php");
  }
});
?>