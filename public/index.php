<?php

require '../bootstrap.php';

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', 'app\controllers\HomeController:index');

$app->run();
