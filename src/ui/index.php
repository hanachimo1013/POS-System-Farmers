<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../../vendor/autoload.php';

$app = new \Slim\App();

//Front-End UI
$app->get('/', function(Request $req, Response $res, $args = []){
  include 'pages\home_login.php';
  return $res;
});

$app->get('/voting_status', function(Request $req, Response $res, $args = []){
  include 'pages\home_voting_sts.php';
  return $res;
});

$app->run();
