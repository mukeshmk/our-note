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
					<li class="active" class="dropdown">
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
					<li><a href="../update/update.php">Update</a></li>
					<li><a href="../delete/del_disp.php">Delete</a></li>
      			</ul>
				<ul class="nav navbar-nav navbar-right">
        			<li><a href='../index.php'><span class="glyphicon glyphicon-off"></span> Log Out</a></li>
      			</ul>
    		</div>
  		</div>
	</nav>
	<br><br><br>
	<h1 align="center">Fill these fields:</h1>
    <body>
        <form action="cn_php.php" method="post" autocomplete="off" id="note_create">
			<table style="width:0%" align="center">
			<tr>
				
			<td>
			<table style="width:0%" align="center" class="table table-bordered table-hover table-condensed">
				<tr>
					<td>Title: </td>						
					<td><input type="text" name="title" required></td>
				</tr>
				<tr>
					<td>Group: </td>						
					<td>
						<select name="group" required>
							<option value="">Select...</option>
							<option value="Work">Work</option>
							<option value="House">House</option>
							<option value="Academic">Academic</option>
							<option value="Casual">Casual</option>
							<option value="Personal">Personal</option>
							<option value="Others">Others</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Important: </td>						
					<td>
						<input type="radio" name="imp" value="1" required>Yes
						<input type="radio" name="imp" value="0" required>No
					</td>
				</tr>
				<tr>
					<td>Date to Remind:</td>						
					<td><input type="date" name="dtr" required></td>
				</tr>
				<tr>
					<td>Time to Remind: </td>
					<td><input type="time" name="ttr" required></td>
				</tr>
			</table>
			</td>			
			<td>
			<table style="width:0%" align="right" class="table table-bordered table-hover table-condensed">
				
				<tr>
					<td>Color Code: </td>						
					<td>
						<select name="clr_code" required>
							<option value="">Select...</option>
							<option value="Red">Red</option>
							<option value="Yellow">Yellow</option>
							<option value="Blue">Blue</option>
							<option value="Green">Green</option>
							<option value="Violet">Violet</option>
							<option value="Others">Others</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Note: </td>
					<td><textarea rows="6" cols="" name="note" form="note_create"></textarea></td>
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