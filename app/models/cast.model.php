<?php

require_once './app/models/model.php';

class CastModel extends Model{


  function getCast($page = 1, $orderQuery = ''){

    $query = $this->db->prepare('SELECT * FROM cast '.$orderQuery.' LIMIT 5 OFFSET '.(($page-1)*5));
    $query->execute();
    $cast = $query->fetchAll(PDO::FETCH_OBJ);

    return $cast;

  }

  function addCast($nombre, $apellido){
    try {
      $query = $this->db->prepare('INSERT INTO cast (nombrecast, apellido) VALUES ( ? , ? )');
      $query->execute([$nombre,$apellido]);
      return $this->db->lastInsertId();
    } catch (PDOException $e) {
      return null;
    }

  }

  function editCast($id, $nombre, $apellido){
    try {
      $query = $this->db->prepare('UPDATE cast SET nombrecast = ?, apellido = ? WHERE idcast = ?');
      $query->execute([$nombre,$apellido,$id]);
      return true;
    } catch (PDOException $e) {
      return false;
    }
    
  }

  function deleteCast($id){
    $query = $this->db->prepare('DELETE FROM cast WHERE idcast = ?');
    $query->execute([$id]);
  }

  public function getCastById($id){
    $query = $this->db->prepare('SELECT * FROM cast WHERE idcast = ?');
    $query->execute([$id]);
    
    return $query->fetch(PDO::FETCH_OBJ);
  }

  function castHasColumn($column){
    $query = $this->db->prepare("DESCRIBE cast");
    $query->execute();
    $columnas = $query->fetchAll(PDO::FETCH_COLUMN);

    return in_array($column,$columnas);
  }
  
}