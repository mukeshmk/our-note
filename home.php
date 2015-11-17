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
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="" target="">Our Note</a>
    		</div>
    		<div>
      			<ul class="nav navbar-nav">
        			<li class="active"><a href="home.php">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Create <span class="caret"></span>	
						</a>
						<ul class="dropdown-menu">
            				<li><a href="create/create_note.php">Note</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="create/create_chk.php">Check Box</a></li>
          				</ul>
					</li>
        			<li><a href="display/disp.php">Display</a></li>
					<div class="col-sm-4 col-md-6">
                    	<form class="navbar-form" role="search" action="display/search.php" method="post">
                        	<div class="input-group">
                        		<input class="form-control" placeholder="Search notes" name="q" type="text">
                        		<div class="input-group-btn">
                    				<button class="btn btn-default" type="submit">
                    					<i class="glyphicon glyphicon-search"></i>
                 					</button>
                    			</div>
                			</div>
                		</form>
            		</div>
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
	<br><br><br>
	<body>
		<div class="container">
			<div class="jumbotron">
				<h1 align="center">Login successful !!</h1>	
			</div>	
			<p align="center">This page is the home, you can put some stuff here......</p>
		</div>
	</body>
</html>