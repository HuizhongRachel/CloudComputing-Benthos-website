<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_chz = "localhost";
$database_chz = "mydatabase";
$username_chz = "root";
$password_chz = "root";
$chz = mysql_pconnect($hostname_chz, $username_chz, $password_chz) or trigger_error(mysql_error(),E_USER_ERROR); 
?>