<?php

require_once './app/models/seasons.model.php';
require_once './app/views/API.view.php';
require_once './app/controllers/API.controller.php';


class SeasonAPIController extends ApiController{
  protected $model;
  
  function __construct(){
    parent::__construct();
    $this->model = new SeasonModel();
  }

  function get($params = []) {
    if(empty($params)){
      $page = isset($_GET['page']) && $_GET['page'] > 0 ? $_GET['page'] : 1;
      $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
      $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

      $orderQuery = '';
      $acceptedOrders = ['ASC','DESC'];

      if (isset($sort)) {
        if ($this->model->seasonHasColumn($sort) && in_array(strtoupper($order),$acceptedOrders)) {
          $orderQuery = 'ORDER BY '.$sort.' '.$order;
        }else{
          $this->view->response(['response' => 'Bad Request'],400);
          return;
        }
      }

      $seasons = $this->model->getSeasons($page,$orderQuery);
      if (isset($seasons)) {
        $this->view->response($seasons,200);
      }else{
        $this->view->response(['response' => 'Bad Request'],400);
      }
    }else{
      $season = $this->model->getSeason($params[':ID']);
      
      if (!empty($season)) {
        $this->view->response($season,200);
      }else{
        $this->view->response(['response' => 'Not Found'],404);
      }
    }
}
}