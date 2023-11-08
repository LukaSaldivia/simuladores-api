<?php

require './app/models/chapters.model.php';
require_once './app/views/API.view.php';

class ChapterAPIController{
  private $view;
  private $model;
  
  function __construct(){

    $this->model = new ChaptersModel();
    $this->view = new APIView();
  }

  function get($params = []) {
    if(empty($params)){
      $page = isset($_GET['page']) ? abs($_GET['page']) : 1;
      $season = isset($_GET['season']) ? $_GET['season'] : null;
      $sort = isset($_GET['sort']) ? $_GET['sort'] : null;
      $order = isset($_GET['order']) ? $_GET['order'] : 'ASC';

      $chapters = $this->model->getChapters($page,$season,$sort,$order);
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
}