<?php
	$username = "benthos";
	$password = "benthos123";
	$hostname = "benthos.ck2ji51utlpx.us-east-1.rds.amazonaws.com:3306";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");
	
	$selected = mysql_select_db("benthos", $dbhandle);
	
	$myusername = $_POST['user'];
	$mypassword = $_POST['pass'];
	
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	
	$query = "SELECT * FROM usertable WHERE email='$myusername' and password='$mypassword'";
	$result = mysql_query($query);
	$count = mysql_num_rows($result);
	
	mysql_close();
	
	if($count==1){
		$seconds = 5 + time();
		setcookie(loggedin, date("F jS - g:i a"), $seconds);
		header("location:login_success.php");
	}else{
		echo 'Incorrect Username or Password';
	}
?>
