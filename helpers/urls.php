<?php
$url =!empty($_GET['url']) ? $_GET['url'] : 'inicio/inicio';
$aUrl = explode("/", $url);

$controller = $aUrl[0];
$method = $aUrl[0];
$args = "";

if(!empty($aUrl[1]))
{
  if($aUrl[1] != "")
  {
    $method = $aUrl[1];
  }
}
if(!empty($aUrl[2]))
{
  if($aUrl[2] != "")
  {
    for($i=2; $i < count($aUrl); $i++)
    {
      $args .= $aUrl[$i].',';
    }
    $args = trim($args);
  }
}
?>