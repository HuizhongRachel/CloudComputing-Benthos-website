<?php require_once('Connections/chz.php'); ?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database, $dbhandle);
$query_user = "SELECT * FROM userTable";
$user = mysql_query($query_user) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);
//$totalRows_user = mysql_num_rows($user);
?>


<?php
// *********************************************** Validate request to login to this site.********************************************
if (!isset($_SESSION)) {
  session_start();
}
 if (isset ($_POST["email"])){

	$_SESSION["email"] = $_POST["email"];
  }
$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['email'])) {
  $loginUsername=$_POST['email'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "index.php";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database, $dbhandle);
  
  $LoginRS__query=sprintf("SELECT email, password FROM userTable WHERE email=%s AND password=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    //header("Location: " . $MM_redirectLoginSuccess );
	
	header("location:after-login.php");
  }
  else {
    //header("Location: ". $MM_redirectLoginFailed );
	
	echo "<script type='text/javascript'>alert('Wrong password or email address!');</script>";
	
	header("location:before-login.php");
  }
}
//****************************************************************************************


//******************************************sign up********************************************
if ((isset($_POST["signup"]))) {
$P = "P";
  $insertSQL = sprintf("INSERT INTO userTable (reviewerID,reviewerName,email,password) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST["new-username"], "text"),
					             GetSQLValueString($_POST["new-username"], "text"), //ASIN
								 GetSQLValueString($_POST["new-email"], "text"),
                       GetSQLValueString($_POST["new-password"], "text"));	
$_SESSION["email"]=$_POST["new-email"];
$_SESSION["username"] = $_POST["new-username"];	 
 
$Result1 = mysql_query($insertSQL) or die(mysql_error());

header("location:Guide.php");
}
//**************************************************************************************************








?>








<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>LOG IN</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<div id="header">
			<div id="logo">
				<a href="index.php"><img src="images/logo.png" alt="LOGO"></a>
			</div>
			<div id="navigation">
				<a href="checkout.php" class="cart"></a>
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="news.php">What's New</a>
					</li>
					<li>
						<a href="popular.php">Popular</a>
					</li>
					<li >
						<a href="Guide.php">Guide</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="blog.php">Blog</a>
					</li>
					<li class="selected">
                        
						<a href="before-login.php">Log in</a>
                        
                        
					</li>
				</ul>
			</div>
		</div>
		<div id="contents">
			
			<div id="contact" class="body">
            <?php include_once "sidebar.php"?>
  
				<div id="main">
					<div>
                       <h4>New User? Signed up!</h4>
                       
                       
                      <form method="post" id="form-signup" name="form-signup" class="">
		                    
                            <label>User Name</label>
							<input type="text" name="new-username"class="txtfield" value="">
							<label>Email</label>
							<input type="text" name="new-email" class="txtfield" value="">
							<label>Create Password</label>
							<input type="password" name="new-password" class="txtfield" value="">
							<input type="submit" name="signup" value="Submit" class="btn">
						</form>
                        
                        
                        <h4>LOG IN!</h4>
                        <form ACTION="<?php echo $loginFormAction; ?>" id="form1" name="form1" method="POST">
							<label>Email</label>
							<input type="text" name="email" class="txtfield" value="">
							<label>Password</label>
							<input type="password" name="password" class="txtfield" value="">
							<input type="submit" value="Submit" class="btn">
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div>
				<ul class="navigation">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="news.php">What's New</a>
					</li>
					<li>
						<a href="popular.php">Popular</a>
					</li>
					<li >
						<a href="Guide.php">Guide</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="blog.php">Blog</a>
					</li>
					<li class="selected">
                        
						<a href="before-login.php">Log in</a>
                        
                        
					</li>
				</ul>
				<p>
					© The Benthos BeautyCare 2015. All Rights Reserved.
				</p>
			</div>
		</div>
	</div>
</body>
</html>