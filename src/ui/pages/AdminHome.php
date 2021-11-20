<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
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
  		    Admin
  	</center>
  </div>
  <ul class="sidebar-navigation">
    <li class="header">Navigation</li>
    <li>
      <a href="#">
        <i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i> Members
      </a>
    </li>
    <li>
      <a href="#">
      	<i class="fa fa-shopping-bag" aria-hidden="true"></i>Products
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-cart-plus" aria-hidden="true"></i> Sales
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-tags" aria-hidden="true"></i> Vouchers
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-line-chart" aria-hidden="true"></i> Sales Report
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-credit-card" aria-hidden="true"></i> Account Recievable
      </a>
    </li>
    <!-- End can
    <li class="header">Another Menu</li>
    <li>
      <a href="#">
        <i class="fa fa-users" aria-hidden="true"></i> Friends
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-cog" aria-hidden="true"></i> Settings
      </a>
    </li>
    <li>
      <a href="#">
        <i class="fa fa-info-circle" aria-hidden="true"></i> Information
      </a>
    </li>
	-->
  </ul>
</div>

<div class="content-container">

  <div class="container-fluid">
  	<!--Chart-->
	<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    <h3>Bar Series</h3>
                </div>
                <div class="card-block">
                    <div id="chart1"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card ">
                <div class="card-header">
                    <h3>Multiple Bar Series</h3>
                </div>
                <div id="chart2" class="card-block">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script type="text/javascript">
    jQuery(function ($) {
        var data1 = [12, 3, 4, 2, 12, 3, 4, 17, 22, 34, 54, 67];
        var data2 = [3, 9, 12, 14, 22, 32, 45, 12, 67, 45, 55, 7];
        var data3 = [23, 19, 11, 134, 242, 352, 435, 22, 637, 445, 555, 57];

        $("#chart1").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Break-Down for selected quarter"
                }
            },
            dataSeries: [{
                seriesType: "bar",
                data: data1
            }]
        });

        $("#chart2").shieldChart({
            exportOptions: {
                image: false,
                print: false
            },
            axisY: {
                title: {
                    text: "Break-Down for selected quarter"
                }
            },
            dataSeries: [{
                seriesType: "bar",
                data: data2
            }, {
                seriesType: "bar",
                data: data3
            }]
        });
    });
</script>
  	<!--Chart end-->

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
    <!--Admin Button-->
    <br>
    <br>
    <div class="card-columns">
  <div class="card bg-primary">
    <div class="card-body text-center">
      <p class="card-text"><i class="fa fa-users" aria-hidden="true"></i> Members</p>
    </div>
  </div>
  <div class="card bg-warning">
    <div class="card-body text-center">
      <p class="card-text"><i class="fa fa-tags" aria-hidden="true"></i> Vouchers</p>
    </div>
  </div>
  <div class="card bg-success">
    <div class="card-body text-center">
      <p class="card-text"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Products</p>
    </div>
  </div>
  <div class="card bg-danger">
    <div class="card-body text-center">
      <p class="card-text"><i class="fa fa-line-chart" aria-hidden="true"></i> Sales Report</p>
    </div>
  </div>
  <div class="card bg-dark">
    <div class="card-body text-center">
      <p class="card-text"><i class="fa fa-cart-plus" aria-hidden="true"></i> Sales</p>
    </div>
  </div>
  <div class="card bg-info">
    <div class="card-body text-center">
      <p class="card-text"><i class="fa fa-credit-card" aria-hidden="true"></i> Account Recievable</p>
    </div>
  </div>
</div>
    <!--Admin Button End-->

  </div>
</div>

</body>
</html>
