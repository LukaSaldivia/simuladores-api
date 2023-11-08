<?php

require './app/models/cast.model.php';
require_once './app/views/API.view.php';

class CastAPIController{
  private $view;
  private $model;
  
  function __construct(){

    $this->model = new CastModel();
    $this->view = new APIView();
  }

  function get($params = []) {
    if(empty($params)){
      $page = isset($_GET['page']) ? abs($_GET['page']) : 1;
      $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
      $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

      $cast = $this->model->getCast($page,$sort,$order);
      if (isset($cast)) {
        $this->view->response($cast,200);
      }else{
        $this->view->response(['response' => 'Bad Request'],400);
      }
    }else{
      $cast = $this->model->getCastById($params[':ID']);
      
      if (!empty($cast)) {
        $this->view->response($cast,200);
      }else{
        $this->view->response(['response' => 'Not Found'],404);
      }
    }
}
}