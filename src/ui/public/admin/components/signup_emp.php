  <?php
  // Include config file
  require_once "components/php_configs.php";

  // Define variables and initialize with empty values
  $username = $password = $fname = $lname = $minit = $address = $phone_num = "";
  $username_err = $password_err = $fname_err = $lname_err = $minit_err = $address_err = $phone_num_err = "";

  // Processing form data when form is submitted
  if($_SERVER["REQUEST_METHOD"] == "POST"){

      // Validate username
      if(empty(trim($_POST["username"]))){
          $username_err = "NOTICE: Please enter a username.";
      } else{
          // Prepare a select statement
          $sql = "SELECT id FROM employ_acct WHERE username = ?";

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

      //Entering optional details
      if(empty(trim($_POST["password"]))){
          $fname_err = "Please enter a name!";
      } else{
          $fname = trim($_POST["fname"]);
          $minit = trim($_POST["minit"]);
          $lname = trim($_POST["lname"]);
          $address = trim($_POST["address"]);
          $phone_num = trim($_POST["phone_num"]);
      }

          // Prepare an insert statement
          $sql = "INSERT INTO employ_acct (username, password, fname, minit, lname, address, phone_num) VALUES (?, ?, ?, ?, ?, ?, ?)";

          if($stmt = $mysqli->prepare($sql)){
              // Bind variables to the prepared statement as parameters
              $stmt->bind_param("sssssss", $param_username, $param_password, $param_fname, $param_minit, $param_lname, $param_address, $param_phone_num);

              // Set parameters
              $param_username = $username;
              $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
              $param_fname = $fname;
              $param_minit = $minit;
              $param_lname = $lname;
              $param_address = $address;
              $param_phone_num = $phone_num;

              // Attempt to execute the prepared statement
              if($stmt->execute()){
                  // Redirect to login page
                  header("location: AdminEmployees.php");
              } else{
                  echo "Something went wrong. Please try again later.";
              }

              // Close statement
              $stmt->close();
          }

      // Close connection
      $mysqli->close();
  }
  ?>
