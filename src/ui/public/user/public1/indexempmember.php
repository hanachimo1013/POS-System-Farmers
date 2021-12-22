<?php
header("Access-Control-Allow-Origin: *");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

	require '../src/vendor/autoload.php';
	$app = new \Slim\App;

	$app->get('/getName/{fname}/{lname}/{mini}/{numb}/{address}/', function (Request $request, Response
	$response, array $args) {

	//endpoint get greeting
	return $response;
	});



	//EmployeeProducts endpoints
	//endpoint post greeting
	$app->post('/employeememberpostName', function (Request $request, Response $response, array $args)
	{
	$data=json_decode($request->getBody());
		$fname =$data->fname ;
		$lname =$data->lname ;
		$mini =$data->mini ;
		$numb =$data->numb ;
		$address =$data->address ;


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
		$sql = "INSERT INTO adminmem (fname, lname, mini, numb, address)
		VALUES ('". $fname ."','". $lname ."','". $mini ."','". $numb ."','". $address ."')";

		// use exec() because no results are returned
		$conn->exec($sql);
		$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
		} catch(PDOException $e){
		$response->getBody()->write(json_encode(array("status"=>"error","message"=>$e->getMessage())));
		}
		$conn = null;
	});


	//endpoint post print
	$app->post('/employeememberpostPrint', function (Request $request, Response $response, array $args) {

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
		$sql = "SELECT * FROM adminmem";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$data=array();
			while($row = $result->fetch_assoc()) {
			array_push($data,array("id"=>$row["id"] ,"fname"=>$row["fname"] ,"lname"=>$row["lname"],"mini"=>$row["mini"], "numb"=>$row["numb"], "address"=>$row["address"]));
			}

		$data_body=array("status"=>"success","data"=>$data);
		$response->getBody()->write(json_encode($data_body));
	} else {
		$response->getBody()->write(array("status"=>"success","data"=>null));
	}
	$conn->close();

	return $response;
	});


	//endpoint search
	$app->post('/employeesearchmember', function (Request $request, Response $response, array
	$args) {
	$data=json_decode($request->getBody());
	$id =$data->id;

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
			$data=array();
			$sql = "SELECT * FROM adminmem where id='". $id ."'";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					if($row = $result->fetch_assoc()) {
						array_push($data,array("id"=>$row["id"], "fname"=>$row["fname"], "lname"=>$row["lname"], "mini"=>$row["mini"], "numb"=>$row["numb"], "address"=>$row["address"]));
					}
					$data_body=array("status"=>"success","data"=>$data);
					$response->getBody()->write(json_encode($data_body));
				} else {
					$response->getBody()->write(array("status"=>"success","data"=>null));
					}$conn->close();
					return $response;
				});


	//endpoint update
		$app->post('/employeeupdatemember', function (Request $request, Response $response, array $args) {
		$data=json_decode($request->getBody());
		$id =$data->id ;
		$fname =$data->fname ;
		$lname =$data->lname ;
		$mini =$data->mini ;
		$numb =$data->numb ;
		$address =$data->address ;

	//Database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pos";

		try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE adminmem set fname='". $fname ."', lname='". $lname ."', mini='". $mini ."', numb='". $numb ."', address='". $address ."' where id='". $id ."'";

		 // use exec() because no results are returned
			$conn->exec($sql);
			$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
			} catch(PDOException $e){
			$response->getBody()->write(json_encode(array("status"=>"error","message"=>$e->getMessage())));
			}

			$conn = null;
			return $response;
	});


	//endpoint delete
		$app->post('/employeedeletemember', function (Request $request, Response $response, array
		$args) {
		$data=json_decode($request->getBody());
		$id =$data->id;

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
			$sql = "DELETE FROM adminmem where id='". $id ."'";
			if ($conn->query($sql) === TRUE) {
				$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
			}
			$conn->close();
		return $response;
		});
	///
	$app->run();
	?>
