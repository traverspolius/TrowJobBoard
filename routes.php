<?php

$router->get('/public/index.php','controllers/home.php');
$router->get('/public/listings','controllers/listings/index.php');
$router->get('/public/listings/create','controllers/listings/create.php');