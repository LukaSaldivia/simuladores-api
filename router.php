<?php

require_once './libs/Router.php';
require_once './app/controllers/chapter.API.controller.php';
require_once './app/controllers/season.API.controller.php';
require_once './app/controllers/cast.API.controller.php';

$router = new Router();

$router->addRoute('chapters','GET','ChapterAPIController','get');
$router->addRoute('chapters/:ID','GET','ChapterAPIController','get');
$router->addRoute('chapters/:ID','DELETE','ChapterAPIController','delete');
$router->addRoute('chapters','POST','ChapterAPIController','add');
$router->addRoute('chapters/:ID','PUT','ChapterAPIController','update');

$router->addRoute('seasons/','GET','SeasonAPIController','get');
$router->addRoute('seasons/:ID','GET','SeasonAPIController','get');
$router->addRoute('seasons','POST','SeasonAPIController','add');
$router->addRoute('seasons/:ID','DELETE','SeasonAPIController','delete');
$router->addRoute('seasons/:iD','PUT','SeasonAPIController','update');

$router->addRoute('cast/','GET','CastAPIController','get');
$router->addRoute('cast/:ID','GET','CastAPIController','get');
$router->addRoute('cast','POST','CastAPIController','add');
$router->addRoute('cast/:ID','DELETE','CastAPIController','delete');
$router->addRoute('cast/:ID','PUT','CastAPIController','update');



$router->route($_GET['resource'],$_SERVER['REQUEST_METHOD']);