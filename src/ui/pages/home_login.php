<!DOCTYPE html>
<head>
  <title>Login | POS System</title>
  <?php include 'components/head_content.php' ?>
  <link rel = "stylesheet" href = "http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <style>
      i.fields {font-size: 2em; color: gray;}
  </style>
</head>
<body>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
  <div class="container col s12 m12 l12 center">
    <div class="container z-depth-1 grey lighten-5 row" style="background-color: white; display: inline-block; border-radius: 45px; border: 3px solid #EEE; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
    	<form action="#" method="#">
      		<div class="form-group">
            <i class="glyphicon glyphicon-user fields"></i>
        		<input type="text" class="form-control center" name="voter" placeholder="Username" style="font-size: 20px;" required>
      		</div>
          <div class="form-group">
            <i class="glyphicon glyphicon-lock fields"></i>
            <input type="password" class="form-control center" name="password" placeholder="Password" style="font-size: 20px;" required>
          </div>
          <div class="row s14">
            <div class="col s6 left">
                <select class="browser-default" name="acctType" id="acctType">
                  <option value="admin">ADMIN</option>
                  <option value="user">USER</option>
                </select>
              </div>
            <div class="col s6 right">
              <button type='submit' name='login' class='col s12 btn btn-medium waves-effect z-depth-1 blue' style="font-family: genshinFont1; font-size: 20px;">Login</button>
            </div>
          </div>
    	</form>
  	</div>
  </div>
</body>
</html>
