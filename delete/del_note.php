<?php 

    require_once('../login/auth.php');

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
    echo $_GET['id'];
    echo $_SESSION['SESS_MEMBER_ID'];
    $result1 = mysqli_query($connect, "DELETE FROM Date_N where note_id =".$_GET['id']." and user_id = ".$_SESSION['SESS_MEMBER_ID']);
    $result2 = mysqli_query($connect, "DELETE FROM Note where note_id =".$_GET['id']." and user_id = ".$_SESSION['SESS_MEMBER_ID']);

    if (!$result1 || !$result2)  
    {  
    	echo "Error fetching data: " . mysqli_error($connect);  
    }  
?>
<html>
	<meta http-equiv="refresh" content="0; URL=../display/disp.php">
	<meta name="keywords" content="automatic redirection"
</html>