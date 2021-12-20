<?php
session_start();
include 'php_configs.php';

if(isset($_SESSION["loggedin_employee"]) && $_SESSION["loggedin_employee"] === true){
  header("location: ../user/EmployeeHomeDash.php");
}
if(isset($_SESSION["loggedin_admin"]) && $_SESSION["loggedin_admin"] === !true){
  header("location: ../login.php");
}
?>
