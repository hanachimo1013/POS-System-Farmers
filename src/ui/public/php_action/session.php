<?php
  session_start();
  if(isset($_SESSION["loggedin_admin"]) && $_SESSION["loggedin_admin"] === true){
      header("location: admin/AdminHomeDash.php");
      exit;
  }
    if(isset($_SESSION["loggedin_employee"]) && $_SESSION["loggedin_employee"] === true){
        header("location: user/EmployeeHomeDash.php");
        exit;
    }
?>
