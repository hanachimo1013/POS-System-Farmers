<!DOCTYPE html>
<html>
<head>
	<title>Employee Vouchers</title>
	<?php include 'components/head_content.php' ?>
</head>
<style>
.poslogo{
	width: 50px;
	border-radius: 20px;
}
.navbar{
  top: 0;
  width: 100%;
  position: relative;
}
.sidebar-container {
  position: absolute;
  width: 220px;
  height: 100%;
  left: 0;
  overflow-x: hidden;
  overflow-y: auto;
  background: #78B7F1;
  color: #fff;
}

.content-container {
  padding-top: 20px;
}

.sidebar-logo {
  padding: 10px 15px 10px 30px;
  font-size: 20px;
  background-color: #78B7F1;
}

.sidebar-navigation {
  padding: 0;
  margin: 0;
  list-style-type: none;
  position: relative;
}

.sidebar-navigation li {
  background-color: transparent;
  position: relative;
  display: inline-block;
  width: 100%;
  line-height: 20px;
}

.sidebar-navigation li a {
  padding: 10px 15px 10px 30px;
  display: block;
  color: #fff;
}

.sidebar-navigation li .fa {
  margin-right: 10px;
}

.sidebar-navigation li a:active,
.sidebar-navigation li a:hover,
.sidebar-navigation li a:focus {
  text-decoration: none;
  outline: none;
}

.sidebar-navigation li::before {
  background-color: #2574A9;
  position: absolute;
  content: '';
  height: 100%;
  left: 0;
  top: 0;
  -webkit-transition: width 0.2s ease-in;
  transition: width 0.2s ease-in;
  width: 3px;
  z-index: -1;
}

.sidebar-navigation li:hover::before {
  width: 100%;
}

.sidebar-navigation .header {
  font-size: 12px;
  text-transform: uppercase;
  background-color: #5BADFA;
  padding: 10px 15px 10px 30px;
}

.sidebar-navigation .header::before {
  background-color: transparent;
}

.content-container {
  padding-left: 220px;
}
.chr1{
	width: 800px;
	height: 200px;
}
.card-text{
	color: ;
}
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 40%;
  font-size: 12px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 50%;
  border: 1px solid #ddd;
  font-size: 12px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
.divpps{
  position: absolute;
  left: 60%;
  top: 20%;
  width: 35%;
}
.fsize{
  font-size: 13px;
}
</style>
<body>
	<!--nav main-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#"><img class="poslogo" src="img/POSlogo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Farmers Gate <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-success my-2 my-sm-0" type="submit">
      <i class="fa fa-sign-out" aria-hidden="true"></i>
      Log out</button>
    </form>
  </div>
  <!---->
</nav>
	<!--nav main end-->
	<div class="sidebar-container">
	  <div class="sidebar-logo">
	  	<center>
	  		<i class="fa fa-user-circle fa-4x" aria-hidden="true"></i>
	  		<br>
	  		    Employee
	  	</center>
	  </div>
	  <ul class="sidebar-navigation">
	    <li class="header">Navigation</li>
	    <li>
	      <a href="EmployeeHomeDash.php">
	        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
	      </a>
	    </li>
	    <li>
	      <a href="EmployeeMembers.php">
	        <i class="fa fa-users" aria-hidden="true"></i> Members
	      </a>
	    </li>
	    <li>
	      <a href="EmployeeProducts.php">
	      	<i class="fa fa-shopping-bag" aria-hidden="true"></i>Products
	      </a>
	    </li>
	    <li>
	      <a href="EmployeeSales.php">
	        <i class="fa fa-cart-plus" aria-hidden="true"></i> Sales
	      </a>
	    </li>
	    <li>
	      <a href="EmployeeSalesCredit.php">
	        <i class="fa fa-money" aria-hidden="true"></i> Sales Credit
	      </a>
	    </li>
	    <li>
	      <a href="EmployeeVouchers.php">
	        <i class="fa fa-tags" aria-hidden="true"></i> Vouchers
	      </a>
	    </li>
	    <li>
	      <a href="EmployeeSalesReport.php">
	        <i class="fa fa-line-chart" aria-hidden="true"></i> Sales Report
	      </a>
	    </li>
	    <li>
	      <a href="EmployeeAccRecievable.php">
	        <i class="fa fa-credit-card" aria-hidden="true"></i> Account Recievable
	      </a>
	    </li>
	  </ul>
	</div>

<div class="content-container">

  <div class="container-fluid">
    <h2>Vouchers</h2>
    <div class="card text-center">
      <div class="card-header">
       Featured
      </div>
      <div class="card-body">
        <h5 class="card-title">Voucher Coupon</h5>
        <p class="card-text"><b>20% OFF YOUR PURCHASE</b></p>
        <p class="card-text"><b>35% OFF For Registered Farmers</b></p>
        <a href="#" class="btn btn-primary">Generate Code</a>
        <br><br>
        <center>
        <div class="col-sm-2">
          <input type="text" class="form-control" value="XXXXX" readonly>
         </div>
       </center>
        <br><br>
        <a href="#" class="btn btn-primary">Print</a>
      </div>
      <div class="card-footer text-muted">
        © Alright Reserved
      </div>
    </div>

    <!-- Main component for a primary marketing message or call to action -->
    <!--trial
    <div class="jumbotron">
      <h1>Navbar example</h1>
      <p>This example is a quick exercise to illustrate how the default, static and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
      <p>To see the difference between static and fixed top navbars, just scroll.</p>
      <p>
        <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
      </p>
    </div>
    -->


  </div>
</div>

</body>
</html>