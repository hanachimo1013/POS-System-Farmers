<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../../vendor/autoload.php';

$app = new \Slim\App();

//Front-End UI
$app->get('/', function(Request $req, Response $res, $args = []){
  include 'pages\login.php';
  return $res;
});

$app->get('/voting_status', function(Request $req, Response $res, $args = []){
  include '#';
  return $res;
});

$app->run();
