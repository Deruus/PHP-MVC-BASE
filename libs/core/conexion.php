<?php 
class Conexion
{
  private $conn;
  public function __construct() 
  {
    $conString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
    try 
    {
      $this->conn = new PDO($conString, DB_USER, DB_PASSWORD);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
      $this->conn = "Error de conexión";
      echo "ERROR: ". $e->getMessage();
    }
  }
  public function conn()
  {
    return $this->conn;
  }
}

?>