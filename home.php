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
		<link href="carousel.css" rel="stylesheet">
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
	<br><br>
	<body>
<!--		<div class="container">
			<div class="jumbotron">
				<h1 align="center">Login successful !!</h1>	
			</div>	
			<p align="center">This page is the home, you can put some stuff here......</p>
			
		</div>
-->
		
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img class="first-slide" src="assets/The%20Group.jpg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>We made this Possible</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="second-slide" src="assets/carousel1.jpg" alt="2nd slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>You don't Need this Anymore</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="third-slide" src="assets/carousel2.jpg" alt="3rd slide">
          <div class="container">
            <div class="carousel-caption">
              <h1> Coffee and Laptop - All you Need</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fourth-slide" src="assets/carousel3.jpg" alt="4th slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Great People Pen their Thoughts ... Now, Online</h1>
            </div>
          </div>
        </div>
        <div class="item">
          <img class="fifth-slide" src="assets/carousel4.jpg" alt="5th slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for Good Measure.</h1>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->


    <div class="container marketing">

      <div class="row">
        <div class="col-lg-4">
          <img class="img-circle" src="assets/note.png" alt="notes" width="140" height="140">
          <h2>Notes</h2>
          <p>
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

    $result = mysqli_query($connect, "SELECT count(*) FROM Note where user_id = '".$_SESSION['SESS_MEMBER_ID']."'and notes!=''" );
    if (!$result)  
    {  
    	echo "Error fetching data: " . mysqli_error($connect);  
    }
	if(mysqli_num_rows($result) > 0) 
    {
		while ($row = mysqli_fetch_array($result))
    	{
    		$count = $row['count(*)'];
		}
	}
	echo $count;
    ?>
          </p>
          <p><a class="btn btn-default" href="display/disp.php" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="assets/chkbx.png" alt="chkbx" width="140" height="140">
          <h2>Checkbox</h2>
          <p>
<?php 
	$result = mysqli_query($connect, "SELECT count(*) FROM Note where user_id = '".$_SESSION['SESS_MEMBER_ID']."'and notes=''" );
    if (!$result)  
    {  
    	echo "Error fetching data: " . mysqli_error($connect);  
    }
	if(mysqli_num_rows($result) > 0) 
    {
		while ($row = mysqli_fetch_array($result))
    	{
    		$count = $row['count(*)'];
		}
	}
	echo $count;
?>
          </p>
          <p><a class="btn btn-default" href="display/disp.php" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <img class="img-circle" src="assets/imp.png" alt="imp" width="140" height="140">
          <h2>Important</h2>
          <p>
<?php
 	$result = mysqli_query($connect, "SELECT count(*) FROM Note where user_id = '".$_SESSION['SESS_MEMBER_ID']."'and imp=1" );
    if (!$result)  
    {  
    	echo "Error fetching data: " . mysqli_error($connect);  
    }
	if(mysqli_num_rows($result) > 0) 
    {
		while ($row = mysqli_fetch_array($result))
    	{
    		$count = $row['count(*)'];
		}
	}
	echo $count;
?>
          </p>
          <p><a class="btn btn-default" href="display/disp.php" role="button">View details &raquo;</a></p>
        </div>
      </div>
	</body>
</html>