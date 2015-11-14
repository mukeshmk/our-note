<?php
	require_once('../login/auth.php');
?>
<html>
	<head>
		<title>Input</title>
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
							<li><a href="create_note.php">Note</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="create_chk.php">Check Box</a></li>
          				</ul>
					</li>
        			<li><a href="../display/disp.php">Display</a></li>
					<li><a href="../search/search.php">Search</a></li>
					<li class="active"><a href="update.php">Update</a></li>
					<li><a href="../delete/del_disp.php">Delete</a></li>
      			</ul>
				<ul class="nav navbar-nav navbar-right">
        			<li><a href='../index.php'><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
      			</ul>
    		</div>
  		</div>
	</nav>
	<br><br><br>
<?php
	echo('<br><br><br>');
	

	$user_id=$_SESSION['SESS_MEMBER_ID'];
	$note_id=$_GET['id'];
	
	$connect=mysqli_connect("localhost","root","");
	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$c="USE dbms_pro;";
	$c1=mysqli_query($connect,$c);

	$q1="SELECT * FROM Note WHERE user_id=$user_id AND note_id=$note_id;";	
	$result = $connect->query($q1);
	$row=$result->fetch_assoc();
	//$note_id=$row['note_id'];
	$group=$row['group'];
	$imp=$row['imp'];
	$title=$row['title'];
	$clr_code=$row['clr_code'];
	$note=$row['note'];
	$comp=$row['comp'];

	if(!mysqli_query($connect,$q1))
	{
		echo("Error description 1: " . mysqli_error($connect));
		echo('<br><br>');
	}

	$q1="SELECT * FROM Date_N WHERE user_id=$user_id AND note_id=$note_id;";	
	$result1 = $connect->query($q1);
	$row=$result1->fetch_assoc();
	$dtr=$row['dtr'];
	$ttr=$row['ttr'];

	if(!mysqli_query($connect,$q1))
	{
		echo("Error description 2: " . mysqli_error($connect));
		echo('<br><br>');
	}

	$modified=date("Y-m-d");

	$q1="UPDATE Date_N SET modified=$modified WHERE user_id=$user_id AND note_id=$note_id;"  ;

	if(!mysqli_query($connect,$q1))
	{
		echo("Error description 3: " . mysqli_error($connect));
		echo('<br><br>');
	}

	echo("<br><br><br>");
	
	mysqli_close($connect);
?>

	<h1 align="center">Fill these fields:</h1>
    <body>
        <form action="cn_php.php" method="post" autocomplete="off" id="note_create">
			<table style="width:0%" align="center">
			<tr>
				
			<td>
			<table style="width:0%" align="center" class="table table-bordered table-hover table-condensed">
				<tr>
					<td>Note ID: </td>
					<td><input type="text" name="note_id" required value="<?php echo $note_id; ?>"></td>
				</tr>
				<tr>
					<td>Group: </td>						
					<td>
						<select name="group" required>
							<option value="" >Select...</option>
							<option value="Work" <?php if($group=="Work") echo "selected"; ?> >Work</option>
							<option value="House" <?php if($group=="House") echo "selected"; ?>>House</option>
							<option value="Academic" <?php if($group=="Academic") echo "selected"; ?>>Academic</option>
							<option value="Casual" <?php if($group=="Casual") echo "selected"; ?>>Casual</option>
							<option value="Personal" <?php if($group=="Personal") echo "selected"; ?>>Personal</option>
							<option value="Others" <?php if($group=="Others") echo "selected"; ?>>Others</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Important: </td>						
					<td>
						<input type="radio" name="imp" value="1" required <?php if($imp=="1") echo "checked"; ?>>Yes
						<input type="radio" name="imp" value="0" required <?php if($imp=="0") echo "checked"; ?>>No
					</td>
				</tr>
				<tr>
					<td>Date to Remind:</td>						
					<td><input type="date" name="dtr" required value="<?php echo $dtr; ?>">></td>
				</tr>
				<tr>
					<td>Time to Remind: </td>
					<td><input type="time" name="ttr" required value="<?php echo $ttr; ?>">></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="text" name="" disabled></td>
				</tr>
			</table>
			</td>			
			<td>
			<table style="width:0%" align="right" class="table table-bordered table-hover table-condensed">
				<tr>
					<td>Title: </td>						
					<td><input type="text" name="title" required value="<?php echo $title; ?>">></td>
				</tr>
				<tr>
					<td>Color Code: </td>						
					<td>
						<select name="clr_code" required>
							<option value="">Select...</option>
							<option value="Red" <?php if($clr_code=="Red") echo "selected"; ?>>Red</option>
							<option value="Yellow"<?php if($clr_code=="Yellow") echo "selected"; ?>>Yellow</option>
							<option value="Blue" <?php if($clr_code=="Blue") echo "selected"; ?>>Blue</option>
							<option value="Green" <?php if($clr_code=="Green") echo "selected"; ?>>Green</option>
							<option value="Violet" <?php if($clr_code=="Violet") echo "selected"; ?>>Violet</option>
							<option value="Others" <?php if($clr_code=="Others") echo "selected"; ?>>Others</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Note: </td>
					<td><textarea rows="6" cols="" name="note" form="note_create" value="<?php echo $note; ?>"></textarea></td>
				</tr>
			</table>
			</td>
			</tr>
			</table>
			<div class="row"></div>
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-1">
					<button type="submit" class="btn btn-info">
						<span class="glyphicon glyphicon-plus-sign"></span> Insert
					</button>	
				</div>
				<div class="col-sm-6"></div>
			</div>
        </form>
    </body>
</html>
