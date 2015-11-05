<?php
	require_once('../login/auth.php');
	if($_SESSION['SU']==FALSE)
	{
		die("<h1 align='center'> You can't access !! Will be reported !!</h1>");
	}
?>
<html>
	<head>
		<title>Create Super User</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="../bootstrap-3.3.5-dist/css/bootstrap.min.css">
		<script src="../bootstrap-3.3.5-dist/jquery.min.js"></script>
  		<script src="../bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
	</head>
	<h1 align="center">Please fill the Details</h1>
	<h4 align="center">(creating super user)</h4>
    <body>
		<div class="container">
        <form action="new_su.php" method="post" autocomplete="off">
			<table style="width:0%" align="center" class="table table-hover table-bordered table-condensed">
				<tr>
					<td>Member ID:-</td>						
					<td><input type="text" name="mem_id" required></td>
				</tr>
				<tr>
					<td>User Name:-</td>
					<td><input type="text" name="unm" required></td>
				</tr>
				<tr>
					<td>Password:-</td>
					<td><input type="password" name="pwrd" required></td>
				</tr>
				<tr>
					<td>First Name:-</td>
					<td><input type="text" name="fnm" required></td>
				</tr>
				
				<tr>
					<td>Last Name:-</td>
					<td><input type="text" name="lnm" required></td>
				</tr>
				<tr>
					<td>Address:-</td>
					<td><input type="text" name="add" required></td>
				</tr>
				<tr>
					<td>Contact:-</td>
					<td><input type="text" name="cont" required></td>
				</tr>
				<tr>
					<td>EMail ID:-</td>
					<td><input type="email" name="email" required></td>
				</tr>
				<tr>
					<td>Gender:-</td>
					<td>
						<input type="radio" name="gender" value="M" required>M
						<input type="radio" name="gender" value="F" required>F
					</td>
				</tr>
			</table>
			<br>
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-1">
					<button type="submit"  align="center" class="btn btn-success">
						<span class="glyphicon glyphicon-ok"></span> Submit
					</button>
				</div>
				<div class="col-sm-6"></div>
			</div>
        </form>
		<div class="row">
			<div class="col-sm-5"></div>
				<div class="col-sm-1">
					<form method="get" action="../home.php"  align="center">
						<button type="submit" class="btn btn-info">
							<span class="glyphicon glyphicon-arrow-left"></span> Back
						</button>
					</form>
				</div>
				<div class="col-sm-6"></div>
		</div>
		</div>
    </body>
</html>