<?php

require_once './app/models/model.php';

class ChaptersModel extends Model{


  function getChapters($page = 1, $season = null, $sort = null, $order = 'ASC'){
    $seasonQuery = '';
    $orderQuery = '';

    if (isset($sort)) {
      $orderQuery = 'ORDER BY '.$sort.' '.$order;
    }

    if (isset($season)) {
      $seasonQuery = 'WHERE temporada = '.$season;
    }

    if (strlen($orderQuery) > 0) {
      $query = $this->db->prepare("DESCRIBE capitulos");
      $query->execute();
      $columnas = $query->fetchAll(PDO::FETCH_COLUMN);

      if (!in_array($sort,$columnas) || (strtoupper($order) != 'ASC' && strtoupper($order) != 'DESC')) {
        return null;
      }
      }
    
      $query = $this->db->prepare('SELECT * FROM capitulos '.$seasonQuery.' '.$orderQuery.' LIMIT 5 OFFSET '.(($page-1)*5));
      $query->execute();
  
      $capitulos = $query->fetchAll(PDO::FETCH_OBJ);
  
      foreach($capitulos as $capitulo){
        $capitulo->cast = $this->getCastFromChapter($capitulo->idcap);
      }
  
      return $capitulos;
    



  }

  function addChapter($id,$nombre, $descripcion,$temporadaid,$cast){
    
    try{
    $query = $this->db->prepare('INSERT INTO `capitulos` (`idcap`, `nombrecap`, `descripcion`, `temporada`) VALUES ( ? , ? , ? , ?)');
    $query->execute([$id,$nombre,$descripcion,$temporadaid]);

    
    foreach($cast as $idCast){
      
      $query = $this->db->prepare('INSERT INTO `castXcapitulo` (`id_cast`, `id_capitulo`) VALUES ( ? , ? )');
      $query->execute([$idCast,$id]);
    }
    return true;
  }catch(PDOException $e){
    return null;
  }

  }

  function deleteChapter($id){
    $query = $this->db->prepare('DELETE FROM capitulos WHERE idcap = ?');
    $query->execute([$id]);
  }

  function editChapter($id, $titulo, $descripcion, $temporada, $cast){

    $query = $this->db->prepare('UPDATE capitulos SET nombrecap = ?, descripcion = ? , temporada = ? WHERE idcap = ?');
    $query->execute([$titulo, $descripcion, $temporada, $id]);

    $query = $this->db->prepare('DELETE FROM castXcapitulo WHERE id_capitulo = ?');
    $query->execute([$id]);

    foreach($cast as $idCast){
      $query = $this->db->prepare('INSERT INTO `castXcapitulo` (`id_cast`, `id_capitulo`) VALUES ( ? , ? )');
      $query->execute([$idCast,$id]);

    }


  }
  
  function getChapterData($id) {
    $cast = $this->getCastFromChapter($id);
    $query = $this->db->prepare('SELECT * FROM capitulos LEFT JOIN temporadas ON temporada = idtemp WHERE idcap = ?');
    $query->execute([$id]);

    $cap = $query->fetchAll(PDO::FETCH_OBJ);

    return array(
      'cap' => $cap,
      'cast' => $cast,
    );

  }

  function getChapter($id) {
    
    $query = $this->db->prepare('SELECT * FROM capitulos WHERE idcap = ?');
    $query->execute([$id]);

    $cap = $query->fetch(PDO::FETCH_OBJ);
    if (!empty($cap)) {
      $cap->cast = $this->getCastFromChapter($cap->idcap);
    }

    return $cap;

    
  }

  function getCastFromChapter($id) {
    $query = $this->db->prepare('SELECT cast.*
    FROM capitulos
    LEFT JOIN castxcapitulo ON capitulos.idcap = castxcapitulo.id_capitulo
    LEFT JOIN cast ON castxcapitulo.id_cast = cast.idcast
    WHERE capitulos.idcap = ?');

    $query->execute([$id]);

    $cast = $query->fetchAll(PDO::FETCH_OBJ);

    return $cast;


  }

}