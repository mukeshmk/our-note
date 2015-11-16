<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css">
		<script src="../bootstrap-3.3.5-dist/jquery.min.js"></script>
  		<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	</head>
<?php
	$mem_id=$_POST['mem_id'];
	$umn=$_POST['unm'];
	$pwrd=$_POST['pwrd'];
	$fnm=$_POST['fnm'];
	$lnm=$_POST['lnm'];
	$add=$_POST['add'];
	$cont=$_POST['cont'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];

	$connect=mysqli_connect("localhost","root","");
	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$c="USE dbms_pro;";
	$c1=mysqli_query($connect,$c);

	$q1="INSERT INTO N_User VALUES('$mem_id','$umn','$pwrd','$fnm','$lnm','$email','$add','$cont','$gender',FALSE)";
	if(!mysqli_query($connect,$q1))
	{
		echo"<head>
			<title>User Details</title>
			<h1 align='center'>Login Created Un-Successfully!! :(</h1>
			<h3 align='center'>Cheack your Details again just incase.</h3>
			<style>
			table, th, td 
			{
     			border: 1px solid black;
			}
			</style>
		</head>
		<body>
		<div class='container'>";
		echo("<h1 align='center'>Error description: " . mysqli_error($connect)."<h1>");
		echo"<br><br>
			</div>
			</body>
			<form method='get' action='../index.php' align='center'>
    			<button type='submit' class='btn btn-success'>Login</button>
			</form>";
	}
	else
	{
	
	$d="SELECT * FROM N_User WHERE user_id = $mem_id;";
	$d1=mysqli_query($connect,$d);

	echo"<head>
			<title>User Details</title>
			<h1 align='center'>Login Created Successfully!!</h1>
			<h3 align='center'>Cheack your Details again just incase.</h3>
			<style>
			table, th, td 
			{
     			border: 1px solid black;
			}
			</style>
		</head>
		<body>
		<div class='container'>";
	echo "<table align = 'center' class='table table-hover table-bordered table-condensed'>
		
	<tr>
		
	<th>Mem ID</th>
	<th>User Name</th>
	<th>Password</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Address</th>
	<th>Contact</th>
	<th>EMail ID</th>
	<th>Gender</th>
	
	</tr>";
    // output data of each row
    while($row=mysqli_fetch_array($d1)) 
	{
       	echo "
		<tr>
       	<td align='center'>".$row["user_id"]."</td>
		<td align='center'>".$row["uname"]."</td>
		<td align='center'>".$row["pwd"]."</td>
		<td align='center'>".$row["fnm"]."</td>
		<td align='center'>".$row["lnm"]."</td>
		<td align='center'>".$row["address"]."</td>
		<td align='center'>".$row["contact"]."</td>
		<td align='center'>".$row["email_id"]."</td>
		<td align='center'>".$row["gender"]."</td>
		</tr>";
	}
    echo "</table>
		</div>
		</body>
			<br>
			<form method='get' action='../index.php' align='center'>
    			<button type='submit' class='btn btn-success'>Login</button>
			</form>";
	}
	mysqli_close($connect);
?>
</html>