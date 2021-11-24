<?php
header("Access-Control-Allow-Origin: *");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

	require '../src/vendor/autoload.php';
	$app = new \Slim\App;


	$app->get('/getName/{lname}/{fname}/{mname}/{uname}/{pword}/', function (Request $request, Response
	$response, array $args) {

	//endpoint get greeting
	return $response;
	});
	//endpoint post greeting
	$app->post('/postName', function (Request $request, Response $response, array $args)
	{
	$data=json_decode($request->getBody());
		$lname =$data->lname ;
		$fname =$data->fname ;
		$mname =$data->mname ;
		$uname =$data->uname ;
		$pword =$data->pword ;


		//Database
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "api";

			try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,
		PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO names (lname, mname, fname, uname, pword)
		VALUES ('". $lname ."','". $mname ."','". $fname ."','". $uname ."','". $pword ."')";

		// use exec() because no results are returned
		$conn->exec($sql);
		$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
		} catch(PDOException $e){
		$response->getBody()->write(json_encode(array("status"=>"error","message"=>$e->getMessage())));
		}
		$conn = null;
});

	//endpoint post print
	$app->post('/postPrint', function (Request $request, Response $response, array $args) {

	//Database
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "api";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}
		$sql = "SELECT * FROM names";
		$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$data=array();
			while($row = $result->fetch_assoc()) {
			array_push($data,array("id"=>$row["id"] ,"fname"=>$row["fname"] ,"lname"=>$row["lname"],"mname"=>$row["mname"],"uname"=>$row["uname"],"pword"=>$row["pword"]));
			}

		$data_body=array("status"=>"success","data"=>$data);
		$response->getBody()->write(json_encode($data_body));
	} else {
		$response->getBody()->write(array("status"=>"success","data"=>null));
	}
	$conn->close();

	return $response;
	});

	//endpoint search student
	$app->post('/searchStudent', function (Request $request, Response $response, array
	$args) {
	$data=json_decode($request->getBody());
	$id =$data->id;

	//Database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "api";

	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT * FROM names where id='". $id ."'";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				$data=array();
					while($row = $result->fetch_assoc()) {
					array_push($data,array("id"=>$row["id"] ,"fname"=>$row["fname"] ,"lname"=>$row["lname"], "mname"=>$row["mname"], "uname"=>$row["uname"], "pword"=>$row["pword"]));
					}
					$data_body=array("status"=>"success","data"=>$data);
					$response->getBody()->write(json_encode($data_body));
				} else {
					$response->getBody()->write(array("status"=>"success","data"=>null));
					}$conn->close();
					return $response;
				});

	//endpoint update student
		$app->post('/updateStudent', function (Request $request, Response $response, array $args) {
		$data=json_decode($request->getBody());
		$id =$data->id ;
		$lname =$data->lname ;
		$fname =$data->fname ;
		$mname =$data->mname ;
		$uname =$data->uname ;
		$pword =$data->pword ;

	//Database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "api";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE names set fname='". $fname ."', lname='". $lname ."', mname='". $mname ."', uname='". $uname ."', pword='". $pword ."' where id='". $id ."'";

	   // use exec() because no results are returned
			$conn->exec($sql);
			$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
			} catch(PDOException $e){
			$response->getBody()->write(json_encode(array("status"=>"error","message"=>$e->getMessage())));
			}

			$conn = null;
			return $response;
});

	//endpoint delete student
		$app->post('/deleteStudent', function (Request $request, Response $response, array
		$args) {
		$data=json_decode($request->getBody());
		$id =$data->id;

		//Database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "api";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}
			$sql = "DELETE FROM names where id='". $id ."'";
			if ($conn->query($sql) === TRUE) {
				$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
			}
			$conn->close();
		return $response;
		});
$app->run();



?>
