<!DOCTYPE html>
<html>
<head>
	<title>Employee Sales</title>
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
	color: white;
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
.table-wrapper {
    width: 100%;
    margin: 40px auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .add-new {
        float: right;
    height: 30px;
    font-weight: bold;
    font-size: 12px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 13px;
    }
  .table-title .add-new i {
    margin-right: 4px;
  }
    table.table {
        table-layout: fixed;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
    cursor: pointer;
        display: inline-block;
        margin: 0 5px;
    min-width: 24px;
    }
  table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
  table.table td a.add i {
        font-size: 24px;
      margin-right: -1px;
        position: relative;
        top: 3px;
    }
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
  table.table .form-control.error {
    border-color: #f50000;
  }
  table.table td .add {
    display: none;
  }

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 70%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
.total{
  text-align: right;
}
.quanpos{
  position: absolute;
  top: 0%;
  left: 98%;
}
.productadd{
  position: absolute;
  top: 0%;
  left: 663px;
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
    <h2>Sales Credit</h2>

<div>
  <div class="container-fluid">
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="form-group row">
                  <label for="staticEmail" class="col-sm-2 col-form-label">Member Name:</label>
                    <div class="col-sm-6">
                       <input type="text" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-5">
                      <select class="custom-select">
                          <option selected>Select Products:</option>
                          <option value="1">Pataba</option>
                          <option value="2">Seeds</option>
                          <option value="3">Tools</option>
                        </select>
                        <input type="text" class="form-control col-sm-4 quanpos" placeholder="Quantity">
                        <button type="submit" class="btn btn-success productadd">Add</button>&nbsp;
                    </div>
                </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0001</td>
                        <td>Nestea</td>
                        <td>100.00</td>
                        <td>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>0002</td>
                        <td>Roller Coaster</td>
                        <td>1000.00</td>
                        <td>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>0003</td>
                        <td>Pagod Nako..</td>
                        <td>700.00</td>
                        <td>
                            <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p class="total">Total:</p></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
     <center>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Save</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cash</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Farmers Name:</label>
                    <input type="text" class="form-control" id="recipient-name" readonly>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Print Reciept</button>
              </div>
            </div>
          </div>
        </div>
     </center>
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
