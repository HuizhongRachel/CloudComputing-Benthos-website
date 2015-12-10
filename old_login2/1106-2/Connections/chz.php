<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname = "benthos.ck2ji51utlpx.us-east-1.rds.amazonaws.com:3306";
$database = "benthos";
$username = "benthos";
$password = "benthos123";
$dbhandle = mysql_connect($hostname, $username, $password) or die("Could not connect to database");
?>

