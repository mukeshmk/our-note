<?php 
    require_once('../login/auth.php');
?>
<html>
	<head>
		<title>Home</title>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css">
		<script src="../bootstrap-3.3.5-dist/jquery.min.js"></script>
  		<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
  		<link href="box.css" rel="stylesheet">
	</head>
	<nav class="navbar navbar-inverse navbar-fixed-top">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="" target="">Our Note</a>
    		</div>
    		<div>
      			<ul class="nav navbar-nav">
        			<li><a href="../home.php">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Create <span class="caret"></span>	
						</a>
						<ul class="dropdown-menu">
            				<li><a href="../create/create_note.php">Note</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="../create/create_chk.php">Check Box</a></li>
          				</ul>
					</li>
        			<li class="active"><a href="disp.php">Display</a></li>
					<li><a href="../search/search.php">Search</a></li>
					<li><a href="../update/update.php">Update</a></li>
					<li><a href="disp.php">Delete</a></li>
      			</ul>
				<ul class="nav navbar-nav navbar-right">
        			<li><a href='../index.php'><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
      			</ul>
    		</div>
  		</div>
	</nav>
</html>
<?php
	$connect=mysqli_connect("localhost","root","");
    if (!$connect) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else
	{
        mysqli_set_charset($connect, 'utf8');
        if (!mysqli_select_db($connect, 'dbms_pro')) 
        { 
            echo "Unable to locate database."; 
        }
    }
 
	$result1 = mysqli_query($connect, "DELETE FROM Date_N where note_id=".$_GET['id']." and user_id=".$_SESSION['SESS_MEMBER_ID']);
	if (!$result1)  
    {  
    	echo "Error fetching data 1: " . mysqli_error($connect);  
    }    
	

	$result2 = mysqli_query($connect, "DELETE FROM Note where note_id=".$_GET['id']." and user_id=".$_SESSION['SESS_MEMBER_ID']);
	if (!$result2)  
    {  
    	echo "Error fetching data 2: " . mysqli_error($connect);  
    }
?>
<html>
	<meta http-equiv="refresh" content="0; URL=../display/disp.php">
	<meta name="keywords" content="automatic redirection">
</html>