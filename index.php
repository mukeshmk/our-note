<?php require 'create_db.php' ?>
<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	unset($_SESSION['SU']);
?>

<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<link rel="icon" href="../../favicon.ico">
    	<title>Our Note</title>
		<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
		<script src="bootstrap-3.3.5-dist/jquery.min.js"></script>
  		<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    	<link href="login/signin.css" rel="stylesheet">
    	<script src="../../assets/js/ie-emulation-modes-warning.js"></script>
		<style>
			body 
			{
				background-image: url("assets/bg.jpg");
			}
			form
			{
				color: white;
			}
		</style>
  	</head>

  <body>

    <div class="container">
			<div style="text-align: right;" class="col-sm-8">
  				<img src="assets/notepad.png" align="center" alt="Our Note" style="border:0" height="250" width="250">
			</div>
      	<form class="form-signin" name="loginform" action="login/login_exec.php" method="post" autocomplete="off" role="form">
			<?php
				if(isset($_SESSION['ERRMSG_ARR'])&&is_array($_SESSION['ERRMSG_ARR'])&&count($_SESSION['ERRMSG_ARR'])>0) 
				{
					echo('<div class="alert alert-danger">');
					echo '<ul class="err">';
					foreach($_SESSION['ERRMSG_ARR'] as $msg) 
					{
						echo '<li><strong>Error! </strong>',$msg,'</li>'; 
					}
					echo '</ul>';
					unset($_SESSION['ERRMSG_ARR']);
					echo('</div>');
				}
			?>
			<h2 class="form-signin-heading">Please sign in</h2>
        	<label for="inputEmail" class="sr-only">Email address</label>
        	<input type="text" id="inputEmail" class="form-control" placeholder="Email address" required autofocus name="username">
        	<label for="inputPassword" class="sr-only">Password</label>
        	<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
        	<div class="checkbox">
          		<label>
            		<input type="checkbox" value="remember-me"> Remember me
          		</label>
        	</div>
        	<button class="btn btn-lg btn-primary btn-block" type="submit">
				<span class="glyphicon glyphicon-log-in"></span>  Sign in
			</button> 
      	</form>
		<form method='post' action='create_user/create_user.html' align="center" role="form" class="form-signin">									
			<button class="btn btn-lg btn-primary btn-block" type="submit">
				<span class="glyphicon glyphicon-user"></span>
				Create User
			</button>
		</form>
    </div>
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
