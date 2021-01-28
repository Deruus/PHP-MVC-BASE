<?php
class Mysql extends Conexion 
{
  private $con;
  private $query;
  private $values;

  function __construct () 
  {
    $this->con = new Conexion();
    $this->con = $this->con->conn();
  }

  //Insertar un registro
  public function insert (string $query, array $values)
  {
    $this->query = $query;
    $this->values = $values;
    $insert = $this->con->prepare($this->query);
    $reIns =$insert->execute($this->values);
    if($reIns)
    {
      $lastInsert = $this->con->lastInsertId();
    }
    else{
      $lastInsert = 0;
    }
    return $lastInsert;
  }

  //Buscar un registro
  public function select(string $query)
  {
    $this->query = $query;
    $result = $this->con->prepare($this->query);
    $result->execute();
    $data = $result->fetch(PDO::FETCH_ASSOC);
    return $data;
  }

  //Buscar todos los registros de una tabla
  public function select_all(string $query)
  {
    $this->query = $query;
    $result = $this->con->prepare($this->query);
    $result->execute();
    $data = $result->fetchall(PDO::FETCH_ASSOC);
    return $data;
  }
  //Actualizar registros
  public function update(string $query, array $values)
  {
    $this->query = $query;
    $this->values = $values;
    $update = $this->con->prepare($this->query);
    $resExecute = $update->execute($this->values);
    return $resExecute;
  }

  //Eliminar un registro
  public function delete(string $query)
  {
    $this->query = $query;
    $result = $this->con->prepare($this->query);
    $result->execute();
    return $result;
  }
}
?>