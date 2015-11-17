<?php
	require_once('../login/auth.php');
?>
<html>
	<head>
		<title>Disply</title>
		<meta charset='utf-8'>
   		<meta name='viewport' content='width=device-width, initial-scale=1'>
  		<link rel='stylesheet' href='../bootstrap-3.3.5-dist/css/bootstrap.min.css'>
		<script src='../bootstrap-3.3.5-dist/jquery.min.js'></script>
  		<script src='../bootstrap-3.3.5-dist/js/bootstrap.min.js'></script>
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
        			<li><a href="../display/disp.php">Display</a></li>			 
      			</ul>
				<ul class="nav navbar-nav navbar-right">
        			<li><a href='../index.php'><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
      			</ul>
    		</div>
  		</div>
	</nav>
<?php
	echo('<br><br><br>');
	
	$connect=mysqli_connect("localhost","root","");
	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$c="USE dbms_pro;";
	$c1=mysqli_query($connect,$c);


	$note_id=$_SESSION['note_id'];
	$user_id=$_SESSION['SESS_MEMBER_ID'];
	$no_cb=$_SESSION['no_cb'];

	$result1 = mysqli_query($connect, "DELETE FROM Chkbox where note_id=".$note_id." and user_id=".$user_id);
	if (!$result1)  
    {  
    	echo "Error fetching data 3: " . mysqli_error($connect);  
    }

	$item = array($_POST['chk_box'][0]);
	$i=1;
	while($i<$no_cb)
	{
		array_push($item,$_POST['chk_box'][$i]);
		$i=$i+1;
	}
	$comp=0;
	$user_id=$_SESSION['SESS_MEMBER_ID'];

	$i=0;
	while($i<$no_cb)
	{
		
		$q1="INSERT INTO Chkbox VALUES
		(
			'$note_id',
			'$i',
			'$user_id',
			'$item[$i]',
			'$comp'
		);";	

		if(!mysqli_query($connect,$q1))
		{
			echo("Error description 3: " . mysqli_error($connect));
			echo('<br><br>');
		}
		$i = $i + 1;
	}
	echo("<br><br><br>");
	mysqli_close($connect);
?>
<html>
	<meta http-equiv="refresh" content="0; URL=../display/disp.php">
	<meta name="keywords" content="automatic redirection">
</html>