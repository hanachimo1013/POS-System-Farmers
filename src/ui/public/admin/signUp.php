<!--Coded by Montizon, Jake G.
	Bachelor of Science in Information Technology 3-B -->
  <?php
  // Include config file
  require_once "php_action/php-configs.php";

  // Define variables and initialize with empty values
  $username = $password = $confirm_password = $fname = "";
  $username_err = $password_err = $confirm_password_err = $fname_err = "";

  // Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){

      // Validate username
      if(empty(trim($_POST["username"]))){
          $username_err = "NOTICE: Please enter a username.";
      } else{
          // Prepare a select statement
          $sql = "SELECT id FROM users_auth WHERE username = ?";

          if($stmt = $mysqli->prepare($sql)){
              // Bind variables to the prepared statement as parameters
              $stmt->bind_param("s", $param_username);

              // Set parameters
              $param_username = trim($_POST["username"]);

              // Attempt to execute the prepared statement
              if($stmt->execute()){
                  // store result
                  $stmt->store_result();

                  if($stmt->num_rows == 1){
                      $username_err = "NOTICE: This username is already taken.";
                  } else{
                      $username = trim($_POST["username"]);
                  }
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }

              // Close statement
              $stmt->close();
          }
      }

      // Validate password
      if(empty(trim($_POST["password"]))){
          $password_err = "NOTICE: Please enter a password.";
      } elseif(strlen(trim($_POST["password"])) < 6){
          $password_err = "Password must have atleast 6 characters.";
      } else{
          $password = trim($_POST["password"]);
      }

      // Validate confirm password
      if(empty(trim($_POST["confirm_password"]))){
          $confirm_password_err = "NOTICE: Please confirm password.";
      } else{
          $confirm_password = trim($_POST["confirm_password"]);
          if(empty($password_err) && ($password != $confirm_password)){
              $confirm_password_err = "NOTICE: Password did not match.";
          }
      }

      if(empty(trim($_POST["password"]))){
          $fname_err = "Please enter a name!";
      } else{
          $fname = trim($_POST["fname"]);
      }
      // Check input errors before inserting in database
      if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

          // Prepare an insert statement
          $sql = "INSERT INTO users_auth (username, password, fname) VALUES (?, ?, ?)";

          if($stmt = $mysqli->prepare($sql)){
              // Bind variables to the prepared statement as parameters
              $stmt->bind_param("sss", $param_username, $param_password, $param_fname);

              // Set parameters
              $param_username = $username;
              $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
              $param_fname = $fname;
              // Attempt to execute the prepared statement
              if($stmt->execute()){
                  // Redirect to login page
                  header("location: login.php");
              } else{
                  echo "Something went wrong. Please try again later.";
              }

              // Close statement
              $stmt->close();
          }
      }

      // Close connection
      $mysqli->close();
  }
  ?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Welcome Weeb! | Scriptyca, #1 Online Japanese Language Platform</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="msapplication-config" content="path-to-browserconfig/browserconfig.xml/">

	<!-- Touch Icons - iOS and Android 2.1+ 180x180 pixels in size. -->
	<link rel="apple-touch-icon-precomposed" href="assets/favicon/apple-touch-icon.png">

	<!-- Firefox, Chrome, Safari, IE 11+ and Opera. 196x196 pixels in size. -->
	<link rel="icon" href="assets/favicon/android-chrome-192x192.png">

	<!--bootstrap.css implementation-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/scriptyca.css">

	<!--bootstrap.js implementation-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>
  <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="\ITPC-109-3B\index.php"><img class="rounded-circle" src="assets/resources/images/scriptyca.png" alt="navBrand"/ style="height: 50px; width: 50px;"></a>
        </div>
        <div class="rounded-circle">
          <img class="" src="assets/resources/images/hiragana.png" alt="userImg" style="height: 50px; width: auto;">
        </div>
      </div>
  </nav>
    <nav class="navbar navbar-expand-md navbar-dark sticky-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="nav-link active" href="index.php" style="color: #a8d8f6;">
            Home
          </a>
        </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
  					<ul class="navbar-nav ml-auto">
  						<li class="nav-item dropdown">
  							<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Learn Japanese</a>
  								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"style="padding: 8px; padding-bottom: 10px; background-color: cyan;">
  									<a class="dropdown-item" href="learn_japanese.php">Learn Japanese</a>
  									<div class="dropdown-divider"></div>
  									<a class="dropdown-item" href="lessons\hiragana\index.html">HIRAGANA</a>
  									<a class="dropdown-item" href="lessons\katakana\index.html">KATAKANA</a>
  									<a class="dropdown-item" href="lessons\kanji\index.html">KANJI</a>
  									<div class="dropdown-divider"></div>
  									<a class="dropdown-item" href="accountInfo.php">Account Info</a>
  								</div>
  						<li class="nav-item">
  							<a class="nav-link" href="about_community.php">About Community</a>
  						</li>
  						<li class="nav-item">
  							<a class="nav-link" href="contact_dev.php">Contact Developer</a>
  						</li>
  					</ul>
  				</div>
      </div>
    </nav>
    <div class="container-fluid">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="margin-left: 20%; margin-right: 20%;">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label class="lead text-center">Username</label>
            <input type="text" name="username" class="form-control text-center" value="<?php echo $username; ?>" placeholder="USERNAME HERE">
            <span class="help-block text-center lead"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label class="lead text-center">Password</label>
            <input type="password" name="password" class="form-control text-center" value="<?php echo $password; ?>" placeholder="PASSWORD HERE">
            <span class="help-block text-center lead"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label class="lead text-center">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control text-center" value="<?php echo $confirm_password; ?>">
            <span class="help-block lead"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group">
            <label class="lead text-center">Full Name</label>
            <input type="text" name="fname" class="form-control text-center" value="<?php echo $fname; ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-center" value="SUBMIT">
            <input type="reset" class="btn btn-dark btn-center" value="RESET">
        </div>
        <p class="lead text-center">Already have an account? <a href="index.php">Login here</a>.</p>
    </form>
  </div>
  <p class="py-1 display-4 text-center">-- OR --</p>
  <p class="py-1 lead text-center">PROCESS YOUR NAME HERE!</p>
  <div class="container-fluid">
    <form class="form-group" action="toolsets\data_insert.php" method="post" style="margin-left: 20%; margin-right: 20%;">
      <label class="lead">FIRST NAME</label><input class="form-control text-center" type="fname" name="fname"/>
      <label class="lead">LAST NAME</label><input class="form-control text-center" type="lname" name="lname"/>
      <label class="lead">MIDDLE NAME</label><input class="form-control text-center" type="mi" name="mi"/>
      <label class="lead">EMAIL</label><input class="form-control text-center" type="email" name="email"/>
      <label class="lead">AGE</label><input class="form-control text-center" type="age" name="age"/>
      <div class="btn btn-center">
        <input type="submit" class="btn btn-primary btn-center" name="insert" value="SUBMIT">
        <input type="reset" class="btn btn-dark btn-center" value="RESET">
      </div>
  </div>
</body>
</html>
