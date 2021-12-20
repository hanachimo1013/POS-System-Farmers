<?php include 'php_action/session.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>POS System</title>
	<?php include 'head_content.php' ?>
	<style>
	.line{
	border: none;
	border-top: 5px solid;
    background: #1E40F4;
    color: #1E40F4;
	}
	.login-form {
	    width: 380px;
	    margin: 180px auto;
	}
	.login-form form {
	    margin-bottom: 15px;
	    background: #f7f7f7;
	    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	    padding: 30px;
	}
	.login-form h2 {
	    margin: 0 0 15px;
	}
	.form-control, .btn {
	    min-height: 38px;
	    border-radius: 2px;
	}
	.input-group-addon .fa {
	    font-size: 18px;
	}
	.btn {
	    font-size: 15px;
	    font-weight: bold;
	    background-color: #1E40F4;
	}
	.bottom-action {
	  	font-size: 14px;
	}
	</style>
</head>
<body>
	<div class="login-form">
	<div>
  		<div class="line"></div>
   	</div>
    <form action="../../../../POS-System-Farmers/src/ui/public/php_action/login.php" method="POST">
    <br>
        <div class="form-group">
        	<div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <span class="fa fa-user"></span>
                    </span>
                </div>
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
        </div>
		<div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fa fa-lock"></i>
                    </span>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
        </div>
				<span class="callout">
					<?php
						if(isset($_SESSION['error'])){
							echo "<p>".$_SESSION['error']."</p>";
							unset($_SESSION['error']);
						}
					?>
				</span>

        <div class="bottom-action clearfix">
            <label class="float-left">
            	 <select class="browser-default" name="acctType" id="acctType">
                  <option value="admin">ADMIN</option>
                  <option value="employee">EMPLOYEE</option>
                </select>
            </label>
            	<button type="submit" name="login" id="login" class="btn btn-primary btn-sm float-right">LOGIN</button>
        </div>
    </form>

		<a href="php_action/logout.php">log-out</a>
</div>
</body>
</html>
