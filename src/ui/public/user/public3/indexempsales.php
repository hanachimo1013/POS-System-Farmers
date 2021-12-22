<?php
header("Access-Control-Allow-Origin: *");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

	require '../src/vendor/autoload.php';
	$app = new \Slim\App;


	$app->get('/getName/{name}/{category}/{unit}/{quantity}/{reorder}/', function (Request $request, Response
	$response, array $args) {

	//endpoint get greeting
	return $response;
	});



	//AdminProducts endpoints
	//endpoint post greeting
	$app->post('/employeesalepostName', function (Request $request, Response $response, array $args)
	{
	$data=json_decode($request->getBody());
		$name =$data->name ;
		$category =$data->category ;
		$unit =$data->unit ;
		$quantity =$data->quantity ;
		$reorder =$data->reorder ;


		//Database
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "pos";

			try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO emproduc (name, category, unit, quantity, reorder)
		VALUES ('". $name ."','". $category ."','". $unit ."','". $quantity ."','". $reorder ."')";

		// use exec() because no results are returned
		$conn->exec($sql);
		$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
		} catch(PDOException $e){
		$response->getBody()->write(json_encode(array("status"=>"error","message"=>$e->getMessage())));
		}
		$conn = null;
});


	//endpoint post print
	$app->post('/employeesalepostPrint', function (Request $request, Response $response, array $args) {

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
		$sql = "SELECT * FROM emproduc";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$data=array();
			while($row = $result->fetch_assoc()) {
			array_push($data,array("product"=>$row["product"] ,"name"=>$row["name"] ,"category"=>$row["category"],"unit"=>$row["unit"], "quantity"=>$row["quantity"], "reorder"=>$row["reorder"]));
			}

		$data_body=array("status"=>"success","data"=>$data);
		$response->getBody()->write(json_encode($data_body));
	} else {
		$response->getBody()->write(array("status"=>"success","data"=>null));
	}
	$conn->close();

	return $response;
	});

?>
