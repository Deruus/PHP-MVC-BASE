<?php 
//devuelve la url de la pagina
function base_url(){
  return BASE_URL;
}
//Retorna la url de Assets
function media()
{
  return BASE_URL."/assets";
}

//Muestra informacion formateada
function dep($data){
  $format = print_r('<prev>');
  $format .= print_r($data);
  $format .= print_r('</prev>');
}
//Muestra el header del admin
/* function headerAdmin($data=""){
  $view_header = "views/template/header_admin.php";
  require_once($view_header);
} */
//Muestra el footer del admin
/* function footerAdmin($data=""){
  $view_footer = "views/template/footer_admin.php";
  require_once($view_footer);
} */
//Muestra el header de la tienda
/* function headerMain($data=""){
  $view_header = "views/template/header_main.php";
  require_once($view_header);
} */
//Muestra el footer de la tienda
/* function footerMain($data=""){
  $view_footer = "views/template/footer_main.php";
  require_once($view_footer);
} */
//Muestra un modal
/* function getModal(string $nombre, $data){
  $view_modal = "views/template/modals/{$nombre}.php";
  require_once($view_modal);
}
 */


//funcion para generar un nombre aleatorio
function random_string($length) {
  $key = '';
  $keys = array_merge(range(0, 9), range('a', 'z'));

  for ($i = 0; $i < $length; $i++) {
      $key .= $keys[array_rand($keys)];
  }

  return $key;
}
//función para eliminar un directorio y todos los elementos dentro de el 
function delete_files($target)
{
  if(!is_link($target) && is_dir($target))
  {
    // it's a directory; recursively delete everything in it
    $files = array_diff( scandir($target), array('.', '..') );
    foreach($files as $file) {
        delete_files("$target/$file");
    }
    rmdir($target);
  }
  else
  {
    // probably a normal file or a symlink; either way, just unlink() it
    unlink($target);
  }
}
//función para comprimir imagenes al subirlas
function compressImage($source, $destination, $quality = 75) { 
  // Obtenemos la información de la imagen
  $imgInfo = getimagesize($source); 
  $mime = $imgInfo['mime']; 
  // Creamos una imagen
  switch($mime){ 
      case 'image/jpeg': 
          $image = imagecreatefromjpeg($source); 
          break; 
      case 'image/png': 
          $image = imagecreatefrompng($source); 
          break; 
      case 'image/gif': 
          $image = imagecreatefromgif($source); 
          break;
      case 'image/webp': 
        $image = imagecreatefromwebp($source); 
        break; 
      default: 
          $image = imagecreatefromjpeg($source); 
  } 
  // Guardamos la imagen
  imagejpeg($image, $destination, $quality); 
  // Devolvemos la imagen comprimida
  return $destination; 
} 

//Elimina exceso de espacios entre palabras
function strC($str){
  $str = preg_replace(['/\s+/','/^\s|\s$/'],[' ', ''], $str);
  $str = trim($str);
  $str = str_ireplace("<script>","", $str);
  $str = str_ireplace("</scrip>", "", $str);
  $str = str_ireplace("<script scr>", "", $str);
  $str = str_ireplace("<script type=>", "", $str);
  $str = str_ireplace("SELECT * FROM", "", $str);
  $str = str_ireplace("DELETE FROM", "", $str);
  $str = str_ireplace("INSERT INTO", "", $str);
  $str = str_ireplace("SELECT COUNT(*) FROM", "", $str);
  $str = str_ireplace("DROP TABLE", "", $str);
  $str = str_ireplace("OR '1'='1", "", $str);
  $str = str_ireplace("is NULL; --", "" ,$str);
  $str = str_ireplace("LIKE ' ", "", $str);
  $str = str_ireplace("--", "", $str);
  $str = str_ireplace("^", "", $str);
  $str = str_ireplace("[", "", $str);
  $str = str_ireplace("]", "", $str);
  $str = str_ireplace("{", "", $str);
  $str = str_ireplace("}","",$str);
  $str = str_ireplace("==", "", $str);
  return $str;
}
//Genera una contraseña de 12 caracteres
function passGenerator($L = 12){
  $pass = "";
  $cadena = "ABCDEF#G425H789I12J{}KLMNOPQRS[]TUVWXYZabcdefghijklmnopqrstuvwxyz1234567890#@]}{]{}";
  $longitudCadena = strlen($cadena);
  for($i=1; $i<=$L; $i++)
  {
    $pos = rand(0,$longitudCadena-1);
    $pass .= substr($cadena, $pos, 1);
  }
  return $pass;
}
//Genera un token
function token(){
  $r1 = bin2hex(random_bytes(10));
  $r2 = bin2hex(random_bytes(10));
  $r3 = bin2hex(random_bytes(10));
  $r4 = bin2hex(random_bytes(10));
  $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
  return $token;
}
//Formato para valores monetarios
function formatMoney($cantidad){
  return number_format($cantidad,2,SPD,SPM);
}
?>