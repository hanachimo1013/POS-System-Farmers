<?php
	session_start();
  include 'configDB.php';

  if(isset($_POST['login'])){
    $acct = $_POST['acctType'];
		$idNum = $_POST['idNum'];
		$password = $_POST['password'];

		//Voter Condition
		if($acct == "voter"){
			$sql = "SELECT * FROM voters WHERE voters_id = '$idNum'";
			$query = $conn->query($sql);

			if($query->num_rows < 1){
				$_SESSION['error'] = 'ERROR: Cannot find Voter Account with the ID';
			}
			else{
				$row = $query->fetch_assoc();
				if(password_verify($password, $row['password'])){
					session_start();
					$_SESSION["loggedin_voter"] = true;
					$_SESSION["voter"] = $row['id'];
					$_SESSION["id"] = $row["voters_id"];
					$_SESSION["fullname"] = $row["firstname"] . " " . $row["lastname"];

					header('location: ../../../../VotingProject3B/index.php');
				}
				else{
					$_SESSION['error'] = 'ERROR: Incorrect password';
				}
			}
    }

		//Admin Condition
    else if($acct == "admin"){
			$query = $conn->query("SELECT * FROM admin WHERE username = '$idNum'");

			if($query->num_rows < 1){
				$_SESSION['error'] = 'ERROR: Cannot find Admin Account with the ID';
			}
			else{
				$sql2 = "SELECT * from voters";
				$query2 = $conn->query($sql2);
				$row_count_value = mysqli_num_rows($query2);

				$row = $query->fetch_assoc();
				if(password_verify($password, $row['password'])){
					session_start();

					$_SESSION["loggedin_admin"] = true;
					$_SESSION['admin'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					$_SESSION['user_info'] = $row['firstname'] . " ".  $row['lastname'];
					$_SESSION['rank'] = $row['position'] . " | " . $row['department'];
					$_SESSION['voters_acct'] = $row_count_value;

					header("location: ../../../../VotingProject3B/adminUtility/home.php");
				}
				else{
					$_SESSION['error'] = 'ERROR: Incorrect password';
				}
			}
    }
		else{
			$_SESSION['error'] = 'Something wrong. Contact WebMaster.';
		}
  }

	header("location: ../../../../VotingProject3B/login.php");
	exit;
	$conn->close();
  ?>
