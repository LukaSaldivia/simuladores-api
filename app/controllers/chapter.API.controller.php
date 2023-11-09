<?php

require_once './app/models/chapters.model.php';
require_once './app/controllers/API.controller.php';
require_once './app/views/API.view.php';

class ChapterAPIController extends APIController{
  protected $model;
  
  function __construct(){
    parent::__construct();
    $this->model = new ChaptersModel();
  }

  function get($params = []) {
    if(empty($params)){
      $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
      $season = isset($_GET['season']) ? $_GET['season'] : null;
      $seasonQuery = '';

      if (isset($season)) {
        $seasonQuery = 'WHERE temporada = '.$season;
      }

      $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
      $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';
      $orderQuery = '';
      $acceptedOrders = ['ASC','DESC'];

      if (isset($sort) && $this->model->chapterHasColumn($sort) && in_array(strtoupper($order),$acceptedOrders)) {
        $orderQuery = 'ORDER BY '.$sort.' '.$order;
      }else{
        $this->view->response(['response' => 'Bad Request'],400);
        return;
      }

      $chapters = $this->model->getChapters($page,$seasonQuery,$orderQuery);
      
      if (isset($chapters)) {
        $this->view->response($chapters,200);
      }else{
        $this->view->response(['response' => 'Bad Request'],400);
      }
    }else{
      $chapter = $this->model->getChapter($params[':ID']);
      
      if (!empty($chapter)) {
        $this->view->response($chapter,200);
      }else{
        $this->view->response(['response' => 'Not Found'],404);
      }
    }
  }

  function delete($params = []) {
    $chapter = $this->model->getChapter($params[':ID']);
    
    if ($chapter) {
      $this->model->deleteChapter($params[':ID']);
      $this->view->response(['response' => 'Chapter deleted'],200);
    }else{
      $this->view->response(['response' => 'Not Found'],404);
    }
    
  }
  
  function add(){
    $body = $this->getData();
    $idcap = $body->idcap;
    $nombrecap = $body->nombrecap;
    $descripcion = $body->descripcion;
    $temporada = $body->temporada;
    $cast = explode(',',$body->cast);
    
    $boolean = $this->model->addChapter($idcap,$nombrecap,$descripcion,$temporada,$cast);
    
    if ($boolean) {
      $this->view->response(['response' => 'Chapter added'],201);
    }else{
      $this->view->response(['response' => 'Error on adding'],404);
    }
  }
  
  function update($params = []){
    
    $idcap = $params[':ID'];
    $chapter = $this->model->getChapter($idcap);
    
    if ($chapter) {
      $body = $this->getData();
      $nombrecap = $body->nombrecap;
      $descripcion = $body->descripcion;
      $temporada = $body->temporada;
      $cast = explode(',',$body->cast);
      
      $boolean = $this->model->updateChapter($idcap,$nombrecap,$descripcion,$temporada,$cast);
      
      if ($boolean) {
        $this->view->response(['response' => 'Chapter '.$idcap.' updated'],200);
      }else{
        $this->view->response(['response' => 'Error on updating'],404);
      }

    }


  }
}