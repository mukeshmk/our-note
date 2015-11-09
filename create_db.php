<?php
	$connect=mysqli_connect("localhost","root","");
	if (mysqli_connect_errno()) 
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	$createdb="CREATE DATABASE dbms_pro;";
	$crate1=mysqli_query($connect,$createdb);

	$c="USE dbms_pro;";
	$c1=mysqli_query($connect,$c);

	$qry1="
	CREATE TABLE N_User
	(
  		user_id INT PRIMARY KEY,
  		uname VARCHAR(30)NOT NULL,
  		pwd VARCHAR(20)NOT NULL,
  		fnm VARCHAR(20)NOT NULL,
  		lnm VARCHAR(20)NOT NULL,
		email_id VARCHAR(20)NOT NULL,
		address varchar(100) NOT NULL,
  	 	contact varchar(30) NOT NULL,
	 	gender varchar(10) NOT NULL,
		su boolean NOT NULL
	)";
	
	$result1=mysqli_query($connect,$qry1);

	$qry2="
	CREATE TABLE Note
	(
  		note_id INT,
  		user_id INT,
  		notes VARCHAR(500),
  		title VARCHAR(20),
  		n_group VARCHAR(30) DEFAULT 'Personal',
  		clr_code VARCHAR(20) Default 'WHITE',
  		imp INT DEFAULT 0 CHECK(imp IN (1,0)),
  		comp INT DEFAULT 0 CHECK(comp IN (1,0)),
  		CONSTRAINT fk FOREIGN KEY (user_id) REFERENCES N_User(user_id),
  		CONSTRAINT pk1  PRIMARY KEY(note_id) 
	)";

	$result2=mysqli_query($connect,$qry2);

	$qry3="
	CREATE TABLE Date_N
	(
  		user_id INT ,
  		note_id INT,
  		date_rem DATE,
  		time_rem VARCHAR(20),
  		created DATE NOT NULL,
  		modified DATE NOT NULL,
  		CONSTRAINT pk2 PRIMARY KEY(note_id,user_id),
  		CONSTRAINT fk1 FOREIGN KEY (note_id) REFERENCES Note(note_id),
  		CONSTRAINT fk2 FOREIGN KEY (user_id) REFERENCES N_User(user_id)
	)";

	$result3=mysqli_query($connect,$qry3);

	$qry4="
	CREATE TABLE Chkbox
	(
  		note_id INT,
  		chkbox_no INT,
  		item VARCHAR(100),
  		comp INT DEFAULT 0 CHECK(comp IN (1,0)),
  		CONSTRAINT fk3 FOREIGN KEY (note_id) REFERENCES Note(note_id),
  		CONSTRAINT pk3 PRIMARY KEY(chkbox_no,note_id) 
	)";

	$result4=mysqli_query($connect,$qry4);

	$q1="INSERT INTO N_User VALUES(0,'root','root','root','root','root@admin.com','admin_dept','1234','Male',TRUE)";
	$r=mysqli_query($connect,$q1);

	mysqli_close($connect);
?>
