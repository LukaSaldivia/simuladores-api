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

      $orderQuery = '';
      $acceptedOrders = ['ASC','DESC'];

      if (isset($sort)) {
        if ($this->model->castHasColumn($sort) && in_array(strtoupper($order),$acceptedOrders)) {
          $orderQuery = 'ORDER BY '.$sort.' '.$order;
        }else{
          $this->view->response(['response' => 'Bad Request'],400);
          return;
        }
      }

      $cast = $this->model->getCast($page,$orderQuery);
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
  function add(){
    $body = $this->getData();
    $nombrecast = $body->nombrecast;
    $apellido = $body->apellido;
    $id = $this->model->addCast($nombrecast,$apellido);

    if ($id) {
      $this->view->response(['response' => 'Cast added with id '.$id],200);
    }else{
      $this->view->response(['response' => 'Error on adding'],404);
    }
  }

  function delete($params = []){
    $cast = $this->model->getCast($params[':ID']);
    if ($cast) {
      $this->model->deleteCast($params[':ID']);
      $this->view->response(['response' => 'Cast deleted'],200);
    }else{
      $this->view->response(['response' => 'Not Found'],404);
    }
  }

  function edit($params = []){
    $idcast = $params[':ID'];
    $cast = $this->model->getCast($idcast);

    if ($cast) {
      $body = $this->getData();
      $nombrecast = $body->nombrecast;
      $apellido = $body->apellido;

      $boolean = $this->model->editCast($idcast, $nombrecast,$apellido);
      if ($boolean) {
        $this->view->response(['response' => 'Cast '.$idcast.' updated'],200);
      }else{
        $this->view->response(['response' => 'Error on updating'],404);
      }
    }
  }  
}