<?php
	session_start();
  include 'configDB.php';

  if(isset($_POST['login'])){
    $acct = $_POST['acctType'];
		$username = $_POST['username'];
		$password = $_POST['password'];

		//Employee Condition
		if($acct == "employee"){
			$sql = "SELECT * FROM employ_acct WHERE username = '$username'";
			$query = $conn->query($sql);

			if($query->num_rows < 1){
				$_SESSION['error'] = 'ERROR: Cannot find Employee Account with the Username!';
			}
			else{
				$row = $query->fetch_assoc();
				if(password_verify($password, $row['password'])){
					session_start();
					$_SESSION["loggedin_employee"] = true;
					$_SESSION["fullname"] = $row["fname"] . " " . $row["lname"];
					$_SESSION["status"] = "Admin";

					header('location: ../../../../POS-System-Farmers/src/ui/public/user/EmployeeHomeDash.php');
				}
				else{
					$_SESSION['error'] = 'ERROR: Incorrect password';
				}
			}
    }

		//Admin Condition
    else if($acct == "admin"){
			$query = $conn->query("SELECT * FROM admin_acct WHERE username = '$username'");
			$query2 = $conn->query($sql2);

			if($query->num_rows < 1){
				$_SESSION['error'] = 'ERROR: Cannot find Admin Account with the ID';
			}
			else{
				$sql2 = "SELECT * from admin_acct";

				$row = $query->fetch_assoc();
				if($password == $row['password']){
					session_start();

					$_SESSION["loggedin_admin"] = true;
					$_SESSION['username'] = $row['username'];
					$_SESSION['user_info'] = $row['fname'] . " ".  $row['lname'];

					header("location: ../admin/AdminHomeDash.php");
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

	header("location: ../login.php");
	exit;
	$conn->close();
  ?>
