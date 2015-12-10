
<?php require_once('Connections/chz.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}

//*****no problem*****************logout****************
if (isset ($_POST["logout"])){

	$_SESSION["email"] = "";
	$_SESSION["username"] = "";
	
	header("location:before-login.php");
	
  }

//************no problem*********choose user*************
mysql_select_db($database, $dbhandle);
$query_user = "SELECT * FROM userTable";

if(isset($_SESSION["email"]))
{
        $EMAIL=$_SESSION["email"];  
        $query_user .=" WHERE userTable.email = '$EMAIL' ";   
}
$user = mysql_query($query_user) or die(mysql_error());
$row_user = mysql_fetch_assoc($user);

$REVIEWERID = $row_user['reviewerID'];

//********************choose user history******************************

$query_usercomment = "SELECT reviewerID, ASIN FROM reviewtable WHERE reviewerID = '$REVIEWERID' 
ORDER BY recordID DESC" ;
$usercomment = mysql_query($query_usercomment) or die(mysql_error());
$row_usercomment = mysql_fetch_assoc($usercomment);

$newhistory = $row_usercomment['ASIN'];

$_SESSION["asin"] = $newhistory ;

while($row_usercomment = mysql_fetch_assoc($usercomment))
    {

        $usercommentASIN[] = $row_usercomment['ASIN'];

    }


//***********************display old history****************************************
$query_history = "SELECT * FROM itemtable
WHERE ASIN IN ('$usercommentASIN[0]','$usercommentASIN[1]','$usercommentASIN[2]','$usercommentASIN[3]'
	,'$usercommentASIN[4]','$usercommentASIN[5]','$usercommentASIN[6]','$usercommentASIN[7]'
	,'$usercommentASIN[8]','$usercommentASIN[9]','$usercommentASIN[10]','$usercommentASIN[11]')";

$history = mysql_query($query_history) or die(mysql_error());
$row_history = mysql_fetch_assoc($history);

//******************************display new history*********************************
$query_new = "SELECT * FROM itemtable
WHERE ASIN = '$newhistory' " ;

$new = mysql_query($query_new) or die(mysql_error());
$row_new = mysql_fetch_assoc($new);


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
								<span class="address">2800 SW Williston Road<br> Gainesville, FL 32608<br> USA</span>
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

                  

                 
                  <h4> &nbsp; Comment history</h4>
                  <?php if ($row_new ){?>
                  <?php do { ?>
                  
				  <ul id="news" class="list">
					<li><div id="productimg">
						<img src="<?php echo $row_new['itemImage']; ?>" ></div>
						<h4><?php echo $row_new['itemBrand']; ?> : <?php echo $row_new['itemName']; ?></h4>
                        <h6>$<?php echo $row_new['itemPrice']; ?>     Avg.Rating : <?php echo $row_new['itemRating']; ?> </h6>
						<p>
							<?php echo $row_new['description']; ?>
						</p>
						
					</li>
				</ul>
                <?php } while ($row_new = mysql_fetch_assoc($new)); ?>
                <?php }?> 

                  
                 <?php if ($row_history ){?>
                  <?php do { ?>
                  
				  <ul id="news" class="list">
					<li><div id="productimg">
						<img src="<?php echo $row_history['itemImage']; ?>" ></div>
						<h4><?php echo $row_history['itemBrand']; ?> : <?php echo $row_history['itemName']; ?></h4>
                        <h6>$<?php echo $row_history['itemPrice']; ?>     Avg.Rating : <?php echo $row_history['itemRating']; ?> </h6>
						<p>
							<?php echo $row_history['description']; ?>
						</p>
						
					</li>
				</ul>
                <?php } while ($row_history = mysql_fetch_assoc($history)); ?>
                <?php }?>
                
                
                <a style="float:right;" class="link" href="after-login.php">&nbsp;back to recommendation list</a>
                
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
                     <a href="after-login.php"><?php echo $row_user['reviewerName']; 
					 
					 ?></a>
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

<?php
mysql_free_result($user);
?>