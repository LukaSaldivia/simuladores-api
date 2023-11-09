<?php

require_once './app/models/cast.model.php';
require_once './app/views/API.view.php';
require_once './app/controllers/API.controller.php';


class CastAPIController extends ApiController{
  protected $model;
  
  function __construct(){
    parent::__construct();
    $this->model = new CastModel();
  }

  function get($params = []) {
    if(empty($params)){
      $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
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