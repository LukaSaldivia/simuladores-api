<?php

require_once './app/models/model.php';

class SeasonModel extends Model{
    function getSeasons($page = 1, $orderQuery = ''){



        $query = $this->db->prepare('SELECT * FROM temporadas '.$orderQuery.' LIMIT 5 OFFSET '.(($page-1)*5));
        $query->execute();
        $temporadas = $query->fetchAll(PDO::FETCH_OBJ);

        return $temporadas;
    }

    function addSeason($nombre){
        $query = $this->db->prepare('INSERT INTO temporadas (nombretemp) VALUES (?)');
        $query->execute([$nombre]);
    
        return $this->db->lastInsertId();
      }

    function deleteSeason($id){
        $query = $this->db->prepare('DELETE FROM temporadas WHERE idtemp = ?');
        $query->execute([$id]);
      }
    
    function editSeason($id, $nombre){
        $query = $this->db->prepare('UPDATE temporadas SET nombretemp = ? WHERE idtemp = ?');
        $query->execute([$nombre,$id]);
    }


  
    public function getSeason($id){
      $query = $this->db->prepare('SELECT * FROM temporadas WHERE idtemp = ?');
      $query->execute([$id]);
      
      return $query->fetch(PDO::FETCH_OBJ);
  }

  function seasonHasColumn($column){
    $query = $this->db->prepare("DESCRIBE temporadas");
    $query->execute();
    $columnas = $query->fetchAll(PDO::FETCH_COLUMN);

    return in_array($column,$columnas);
  }
  
}