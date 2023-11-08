<?php

require_once './libs/Router.php';
require_once './app/controllers/chapter.API.controller.php';
require_once './app/controllers/season.API.controller.php';
require_once './app/controllers/cast.API.controller.php';

$router = new Router();

$router->addRoute('chapters','GET','ChapterAPIController','get');
$router->addRoute('chapters/:ID','GET','ChapterAPIController','get');

$router->addRoute('seasons/','GET','SeasonAPIController','get');
$router->addRoute('seasons/:ID','GET','SeasonAPIController','get');

$router->addRoute('cast/','GET','CastAPIController','get');
$router->addRoute('cast/:ID','GET','CastAPIController','get');

$router->route($_GET['resource'],$_SERVER['REQUEST_METHOD']);