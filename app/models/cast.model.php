<?php

require_once './app/models/model.php';

class CastModel extends Model{


  function getCast($page = 1, $sort = null, $order = 'ASC'){


    $orderQuery = '';
    

    if (isset($sort)) {
      $orderQuery = 'ORDER BY '.$sort.' '.$order;
    }


    if (strlen($orderQuery) > 0) {
      $query = $this->db->prepare("DESCRIBE cast");
      $query->execute();
      $columnas = $query->fetchAll(PDO::FETCH_COLUMN);

      if (!in_array($sort,$columnas) || (strtoupper($order) != 'ASC' && strtoupper($order) != 'DESC')) {
        return null;
      }
    }



    $query = $this->db->prepare('SELECT * FROM cast '.$orderQuery.' LIMIT 5 OFFSET '.(($page-1)*5));
    $query->execute();
    $cast = $query->fetchAll(PDO::FETCH_OBJ);

    return $cast;

  }

  function addCast($nombre, $apellido){
    $query = $this->db->prepare('INSERT INTO cast (nombrecast, apellido) VALUES ( ? , ? )');
    $query->execute([$nombre,$apellido]);

  }

  function editCast($id, $nombre, $apellido){
    $query = $this->db->prepare('UPDATE cast SET nombrecast = ?, apellido = ? WHERE idcast = ?');
    $query->execute([$nombre,$apellido,$id]);
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
  
}