<?php
header("Access-Control-Allow-Origin: *");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

	require '../src/vendor/autoload.php';
	$app = new \Slim\App;

	///
		$app->get('/getName/{name}/{date}/{addquan}/{prodes}/', function (Request $request, Response
		$response, array $args) {

		//endpoint get greeting
		return $response;
		});
		//AdminStocks endpoints
		//endpoint post greeting
		$app->post('/adminstockpostName', function (Request $request, Response $response, array $args)
		{
		$data=json_decode($request->getBody());
			$name =$data->name ;
			$date =$data->date ;
			$addquan =$data->addquan ;
			$prodes =$data->prodes ;


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
			$sql = "INSERT INTO adminstock (name, date, addquan, prodes)
			VALUES ('". $name ."','". $date ."','". $addquan ."','". $prodes ."')";

			// use exec() because no results are returned
			$conn->exec($sql);
			$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
			} catch(PDOException $e){
			$response->getBody()->write(json_encode(array("status"=>"error","message"=>$e->getMessage())));
			}
			$conn = null;
		});


		//endpoint post print
		$app->post('/adminstockpostPrint', function (Request $request, Response $response, array $args) {

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
			$sql = "SELECT * FROM adminstock";
			$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			$data=array();
				while($row = $result->fetch_assoc()) {
				array_push($data,array("pcode"=>$row["pcode"] ,"name"=>$row["name"] ,"date"=>$row["date"],"addquan"=>$row["addquan"], "[prodes]"=>$row["prodes"]));
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
		$app->post('/adminsearchstock', function (Request $request, Response $response, array
		$args) {
		$data=json_decode($request->getBody());
		$pcode =$data->pcode;

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
				$sql = "SELECT * FROM adminstock where pcode='". $pcode ."'";
				$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						if($row = $result->fetch_assoc()) {
							array_push($data,array("pcode"=>$row["pcode"], "name"=>$row["name"], "date"=>$row["date"], "addquan"=>$row["addquan"], "prodes"=>$row["prodes"]));
						}
						$data_body=array("status"=>"success","data"=>$data);
						$response->getBody()->write(json_encode($data_body));
					} else {
						$response->getBody()->write(array("status"=>"success","data"=>null));
						}$conn->close();
						return $response;
					});


		//endpoint update
			$app->post('/adminupdatestock', function (Request $request, Response $response, array $args) {
			$data=json_decode($request->getBody());
			$pcode =$data->pcode ;
			$name =$data->name ;
			$date =$data->date ;
			$addquan =$data->addquan ;
			$prodes =$data->prodes ;

		//Database
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "pos";

			try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

			// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE adminstock set name='". $name ."', date='". $date."', addquan='". $adddquan ."', prodes='". $prodes ."' where pcode='". $pcode ."'";

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
			$app->post('/admindeletestock', function (Request $request, Response $response, array
			$args) {
			$data=json_decode($request->getBody());
			$pcode =$data->pcode;

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
				$sql = "DELETE FROM adminstock where pcode='". $pcode ."'";
				if ($conn->query($sql) === TRUE) {
					$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
				}
				$conn->close();
			return $response;
			});
