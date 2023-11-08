<?php

require './app/models/seasons.model.php';
require_once './app/views/API.view.php';

class SeasonAPIController{
  private $view;
  private $model;
  
  function __construct(){

    $this->model = new SeasonModel();
    $this->view = new APIView();
  }

  function get($params = []) {
    if(empty($params)){
      $page = isset($_GET['page']) ? abs($_GET['page']) : 1;
      $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
      $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

      $seasons = $this->model->getSeasons($page,$sort,$order);
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