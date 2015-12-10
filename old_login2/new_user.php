<?php
	$username = "root";
	$password = "benthos";
	$hostname = "localhost";
	
	$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");
	
	$selected = mysql_select_db("user_data", $dbhandle);

		if(isset($_POST['user']) && isset($_POST['pass'])){
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];

			$query = mysql_query("SELECT * FROM user_data WHERE email='$email'");
			if(mysql_num_rows($query) > 0 ) { //check if there is already an entry for that username
				echo "Account already exists!";
			}else{
				mysql_query("INSERT INTO user_data (u_name, password, email) VALUES ('$user', '$pass', '$email')");
				header("location:index.php");
			}
	}
	mysql_close();
?>

<html>
	<body>
		<h1>Signup!</h1>
			<form action="new_user.php" method="POST">
				<p>Username:</p><input type="text" name="user" />
				<p>Password:</p><input type="password" name="pass" />
				<p>Email:</p><input type="email" name="email" />
				<br />
				<input type="submit" value="Signup!" />
			</form>
	</body>
</html>
