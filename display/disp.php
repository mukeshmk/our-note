
<!DOCTYPE html>
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
        			<li class="active"><a href="../home.php">Home</a></li>
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
        			<li><a href="disp.php">Display</a></li>
					<li><a href="../search/search.php">Search</a></li>
					<li><a href="../update/update.php">Update</a></li>
					<li><a href="../delete/del_disp.php">Delete</a></li>
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

    <?php
    $connect=mysqli_connect("localhost","root","");
    if (!$connect) 
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else{
        mysqli_set_charset($connect, 'utf8');
        if (!mysqli_select_db($connect, 'dbms_pro')) 

        { 
            echo "Unable to locate database."; 
        }
    }


    $result = mysqli_query($connect, "SELECT title, notes FROM Note where user_id = '".$_SESSION['SESS_MEMBER_ID']."'");

    if (!$result)  

    {  
    echo "Error fetching data: " . mysqli_error($connect);  
    }  

  

    while ($row = mysqli_fetch_array($result))  

    {  
    
    $titles[] = $row['title'];
    $notes[] = $row['notes'];  
    }  

    ?>

	<br><br><br>
	<body>

		<div class="container">
			
			<div class="container">
	           <div class="row">
		
                <div class="row">
                    <?php $x=0; foreach ($notes as $note): ?>
                    <?php echo "<div class=\"col-md-4 text-center\"><div class=\"box\"><div class=\"box-content\">
                                <h1 class=\"tag-title\">";?>
                                <?php echo $titles[$x]; ?>
                                <?php echo "</h1><hr />"; ?>
                                <?php echo $note; ?>

                                <?php echo "<br />
                                <a href=\"ppc.html\" class=\"btn btn-block btn-primary\">Learn more</a>
                            </div>
                        </div>
                    </div>"; ?>

                    <?php $x=$x+1; endforeach; ?>
                    
                </div>           
            </div>
	   </div>
    </div>
	

	</body>
</html>
