<?php
header("Access-Control-Allow-Origin: *");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

	require '../src/vendor/autoload.php';
	$app = new \Slim\App;

	$app->post('/adminEmpPostPrint', function (Request $request, Response $response, array $args) {

	//Database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "pos";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM employ_acct";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$data=array();
			while($row = $result->fetch_assoc()) {
			array_push($data,array("id"=>$row["id"] ,"fname"=>$row["fname"] ,"lname"=>$row["lname"],"minit"=>$row["minit"], "address"=>$row["address"] "phone_num"=>$row["phone_num"]));
			}

		$data_body=array("status"=>"success","data"=>$data);
		$response->getBody()->write(json_encode($data_body));
	} else {
		$response->getBody()->write(array("status"=>"success","data"=>null));
	}
	$conn->close();

	return $response;
	});


$app->run();
?>
