<?php
header("Access-Control-Allow-Origin: *");

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

	require '../src/vendor/autoload.php';
	$app = new \Slim\App;


	$app->get('/getName/{name}/{category}/{unit}/{reorder}/', function (Request $request, Response
	$response, array $args) {

	//endpoint get greeting
	return $response;
	});



	//AdminProducts endpoints
	//endpoint post greeting
	$app->post('/adminproductpostName', function (Request $request, Response $response, array $args)
	{
	$data=json_decode($request->getBody());
		$name =$data->name ;
		$category =$data->category ;
		$unit =$data->unit ;
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
		$sql = "INSERT INTO emproduc (name, category, unit, reorder)
		VALUES ('". $name ."','". $category ."','". $unit ."','". $reorder ."')";

		// use exec() because no results are returned
		$conn->exec($sql);
		$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
		} catch(PDOException $e){
		$response->getBody()->write(json_encode(array("status"=>"error","message"=>$e->getMessage())));
		}
		$conn = null;
});


	//endpoint post print
	$app->post('/adminproductpostPrint', function (Request $request, Response $response, array $args) {

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
			array_push($data,array("product"=>$row["product"] ,"name"=>$row["name"] ,"category"=>$row["category"],"unit"=>$row["unit"], "reorder"=>$row["reorder"]));
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
	$app->post('/adminsearchproduct', function (Request $request, Response $response, array
	$args) {
	$data=json_decode($request->getBody());
	$product =$data->product;

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
			$sql = "SELECT * FROM emproduc where product='". $product ."'";
			$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				$data=array();
					while($row = $result->fetch_assoc()) {
					array_push($data,array("product"=>$row["product"] ,"name"=>$row["name"] ,"category"=>$row["category"], "unit"=>$row["unit"], "reorder"=>$row["reorder"]));
					}
					$data_body=array("status"=>"success","data"=>$data);
					$response->getBody()->write(json_encode($data_body));
				} else {
					$response->getBody()->write(array("status"=>"success","data"=>null));
					}$conn->close();
					return $response;
				});


	//endpoint update
		$app->post('/adminupdateproduct', function (Request $request, Response $response, array $args) {
		$data=json_decode($request->getBody());
		$product =$data->product ;
		$name =$data->name ;
		$category =$data->category ;
		$unit =$data->unit ;
		$reorder =$data->reorder ;

	//Database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "pos";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

		// set the PDO error mode to exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE emproduc set name='". $name ."', category='". $category ."', unit='". $unit ."', reorder='". $reorder ."' where product='". $product ."'";

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
		$app->post('/admindeleteproduct', function (Request $request, Response $response, array
		$args) {
		$data=json_decode($request->getBody());
		$product =$data->product;

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
			$sql = "DELETE FROM emproduc where product='". $product ."'";
			if ($conn->query($sql) === TRUE) {
				$response->getBody()->write(json_encode(array("status"=>"success","data"=>null)));
			}
			$conn->close();
		return $response;
		});
//end of AdminProducts endpoints

$app->get('/getName/{fname}/{lname}/{mini}/{numb}/{address}/', function (Request $request, Response
$response, array $args) {

//endpoint get greeting
return $response;
});



//AdminProducts endpoints
//endpoint post greeting
$app->post('/adminmemberpostName', function (Request $request, Response $response, array $args)
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
$app->post('/adminmemberpostPrint', function (Request $request, Response $response, array $args) {

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
$app->post('/adminsearchmember', function (Request $request, Response $response, array
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
	$app->post('/adminupdatemember', function (Request $request, Response $response, array $args) {
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
	$app->post('/admindeletemember', function (Request $request, Response $response, array
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

	//Endpoints of AdminEmployees
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
			array_push($data,array("id"=>$row["id"] ,"fname"=>$row["fname"] ,"lname"=>$row["lname"],"minit"=>$row["minit"], "phone_num"=>$row["phone_num"], "address"=>$row["address"]));
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
