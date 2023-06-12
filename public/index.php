<?php

require '../bootstrap.php';

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', 'app\controllers\HomeController:index');

$app->get('/user/{id}', 'app\controllers\UserController:show');
$app->post('/user/subscribe', 'app\controllers\SubscribeController:store');

$app->get('/contact', 'app\controllers\ContactController:show');

$app->get('/posts', 'app\controllers\PostsController:index');

$app->get('/register', 'app\controllers\RegisterController:create');
$app->post('/register/store', 'app\controllers\RegisterController:store');

$app->run();
