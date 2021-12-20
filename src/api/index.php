<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';

$app = new \Slim\App();

//Front-End UI
$app->get('/', function(Request $req, Response $res, $args = []){
  include '#';
  return $res;
});

$app->get('/admin', function(Request $req, Response $res, $args = []){
  include '#';
  return $res;
});

$app->get('/user', function(Request $req, Response $res, $args = []){
  include '#';
  return $res;
});

$app->run();
