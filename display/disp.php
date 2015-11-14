
<?php 
	require_once('../login/auth.php');
?>
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

    <?php
	echo'<br><br><br>';
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

    $result = mysqli_query($connect, "SELECT title, notes, note_id, clr_code FROM Note where user_id = '".$_SESSION['SESS_MEMBER_ID']."'");
    if (!$result)  
    {  
    	echo "Error fetching data: " . mysqli_error($connect);  
    }
	if(mysqli_num_rows($result) > 0) 
    {
		while ($row = mysqli_fetch_array($result))
    	{
    		$titles[] = $row['title'];
    		$notes[] = $row['notes'];  
    		$note_id[] = $row['note_id'];
    		$color_code[] = $row['clr_code'];
    	}
	
    ?>
	<br><br><br>
	<body>

		<div class="container">		
			<div class="container">
	          <div class="row">
               	<div class="row">
                <?php 
						$x=0; 
						foreach ($notes as $note):
                    		echo "<div class=\"col-md-4 text-center\" ><div class=\"box\" style=\"background-color:";
                    	switch ($color_code[$x]) 
						{
                        	case 'Red':
                            	echo '#FF3300';
                                break;
                            case 'Blue':
                            	echo '#66CCFF';
                                break;
                            case 'Green':
                            	echo '#00FF66';
                                break;
                           	case 'Yellow':
                            	echo '#FFFF00';
                                break;
                            case 'Violet':
                            	echo '#9900FF';
                                break;
                            default:
                            	echo '#FFFFCC';
                                break;
                      	}
                        echo "\"><div class=\"box-content\">
                                <h1 class=\"tag-title\">";
                        echo $titles[$x];
                        echo "</h1><hr />";
                        echo $note;
                        echo "<br />";
                        echo "<br />
                                <p>                          
                                <a href=\"../update/Update.php?id=".$note_id[$x]."\" class=\"btn btn-primary\">Edit</a> 
                                <a href=\"../delete/del_note.php?id=".$note_id[$x]."\"";
                                echo " class=\"btn btn-primary\">Delete</a>
                                <a href=\"disp.php\" class=\"btn btn-primary\">Learn more</a></p>
                            </div>
                        </div>
                    </div>";

                  	$x=$x+1; endforeach; 
	}
	else
	{
		echo'<h1 align="center">NO Notes to Display !!</h1>';
	}
				?>
                    
                </div>           
            </div>
	   </div>
    </div>
	</body>
</html>
