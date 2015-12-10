
<?php require_once('Connections/chz.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}

//logout
if (isset ($_POST["logout"])){

	$_SESSION["email"] = "";
	$_SESSION["username"] = "";
	echo "<script> window.location.replace('before-login.php') </script>";
	
  }


//choose user
mysql_select_db($database, $dbhandle);
$query_user = "SELECT * FROM userTable";

if(isset($_SESSION["email"]))
{
        $EMAIL=$_SESSION["email"];  
        $query_user .=" WHERE usertable.email = '$EMAIL' ";   
	
}

$user = mysql_query($query_user) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);
$totalRows_user = mysql_num_rows($user);



//set environment variable
$_SESSION["username"] = $row_user['reviewerName'];
$_SESSION["reviewerID"] = $row_user['reviewerID'];
$REVIEWERID = $row_user['reviewerID'];

//choose user recommendation:
$query_recommendation = "SELECT * FROM similarityTable,reviewTable,productTable 
WHERE reviewTable.reviewerID = '$REVIEWERID' 
and similarityTable.ASIN1 = reviewTable.ASIN 
and productTable.ASIN = similarityTable.ASIN2
ORDER BY reviewTable.recordID DESC
";

$recommendation = mysql_query($query_recommendation) or die(mysql_error());
$row_recommendation = mysql_fetch_assoc($recommendation);
$totalRows_recommendation = mysql_num_rows($recommendation);






?>





<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>User-Home</title>
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
                     <a href="after-login.php"><?php echo $row_user['reviewerName']; 
					 
					 ?></a>
					</li>
				</ul>
			</div>
		</div>
		<div id="contents">
			
			<div id="contact" class="body">
<div id="sidebar">
		  <div class="section">
					  <h3>Hello, <?php echo $row_user['reviewerName']; ?> !</h3>
                      
                       <form id="form1" name="form1" method="POST">
						<ul id="infos">
							
                            <li>
                                <input type="submit" name="logout" value="LOG OUT" class="btn">
							</li>
						</ul>
                        </form>
                        
					</div>
          <div id="connect">
						<h3>Connect with us</h3>
						<ul>
							<li>
								<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a>
							</li>
							<li>
								<a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a>
							</li>
							<li>
								<a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
							</li>
							<li>
								<a href="http://freewebsitetemplates.com/go/youtube/" target="_blank" class="vimeo"></a>
							</li>
						</ul>
					</div>
		 
					<div class="section">
					  <h3>Contact Details</h3>
						<ul id="infos">
							<li>
								<span class="address">123 Canyon Road<br> Beverly Hills, CA 12345<br> USA</span>
							</li>
							<li>
								<span class="telephone">+01.234.456.786<br> +01.345.678.890</span>
							</li>
							<li>
								<span class="email">info@themargaritafragrance.com</span>
							</li>
							<li>
								<span class="web">www.themargaritafragrance.com</span>
							</li>
						</ul>
					</div>
					<form action"index.html" method="post" id="newsletter">
						<h3>Subscribe to our newsletter</h3>
						<input type="text" value="" class="txtfield">
						<input type="submit" value="Sign up!" class="btn">
					</form>
</div>
				<div id="main">
				  <h4> &nbsp; Recommendation for you</h4>
                  
                  
                  <?php do { ?>
				  <ul id="news" class="list">
					<li>
						<img src="<?php echo $row_recommendation['itemImage']; ?>" alt="Img">
						<h4><?php echo $row_recommendation['itemName']; ?></h4>
                        <h6> Rate and Price</h6>
						<p>
							<?php echo $row_recommendation['description']; ?>
						</p>
						
					</li>
				</ul>
                <?php } while ($row_recommendation = mysql_fetch_assoc($recommendation)); ?>
                
                
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
						<a href="popular.php">Scents</a>
					</li>
					<li>
						<a href="Guide.php">Shop</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="blog.php">Blog</a>
					</li>
					<li class="selected">
						<a href="before-login.php">Contact</a>
					</li>
				</ul>
				<p>
					© The Margarita Fragrance 2012. All Rights Reserved.
				</p>
			</div>
		</div>
	</div>
</body>
</html>

<?php
mysql_free_result($user);
?>
