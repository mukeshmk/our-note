<?php
	require_once('login/auth_parent.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.min.css">
		<script src="bootstrap-3.3.5-dist/jquery.min.js"></script>
  		<script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	</head>
	
	<nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="http://www.hitachi.co.in/" target="_blank">Hitachi Solutions</a>
    		</div>
    		<div>
      			<ul class="nav navbar-nav">
        			<li class="active"><a href="home.php">Home</a></li>
        			<li><a href="insert/input_page.php">Insert</a></li>
        			<li><a href="display/disp.php">Display</a></li>
					<li><a href="search/search.php">Search</a></li>
					<li><a href="update/update.php">Update</a></li>
					<li><a href="delete/del_disp.php">Delete</a></li>
      			</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
						if($_SESSION['SU']==TRUE)
						{
							echo"
					<li><a href='create_user/create_su.php'><span class='glyphicon glyphicon-user'></span> Create SU</a></li>
							";
						}
					?>
        			<li><a href='index.php'><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
      			</ul>
    		</div>
  		</div>
	</nav>
	
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1 align="center">Login successful !!</h1>	
			</div>	
			<p align="center">This page is the home, you can put some stuff here......</p>
		</div>
	</body>
</html>