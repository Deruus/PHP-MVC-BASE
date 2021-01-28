<?php 
class Inicio extends Controllers
{
  public function __construct()
  {
    parent::__construct();
  }
  public function inicio($args){

    $data['page_title'] = "Página Principal";
    $data['page_name'] = "Safero";
    $this->views->getView($this,"inicio", $data);
  }
  
}
?>