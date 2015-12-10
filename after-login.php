
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

//****************set environment variable
$_SESSION["username"] = $row_user['reviewerName'];
$_SESSION["reviewerID"] = $row_user['reviewerID'];
$REVIEWERID = $row_user['reviewerID'];


//********************choose user history******************************

$query_usercomment = "SELECT reviewerID, ASIN FROM reviewtable WHERE reviewerID = '$REVIEWERID' 
ORDER BY recordID DESC" ;
$usercomment = mysql_query($query_usercomment) or die(mysql_error());
$row_usercomment = mysql_fetch_assoc($usercomment);

$newhistory = $row_usercomment['ASIN'];


while($row_usercomment = mysql_fetch_assoc($usercomment))
    {

        $old[] = $row_usercomment['ASIN'];

    }

//***************************** tuijian **************************
$query_newrec = "SELECT * FROM similarityTable 
WHERE ASIN1 = '$newhistory' " ;

$newrec = mysql_query($query_newrec) or die(mysql_error());
$row_newrec = mysql_fetch_assoc($newrec);

while($row_newrec = mysql_fetch_assoc($newrec))
    {

        $good[] = trim ($row_newrec['ASIN2']);

    }

$query_newpro = "SELECT * FROM itemtable

WHERE ASIN IN ('$good[0]','$good[1]','$good[2]','$good[3]','$good[4]','$good[5]','$good[6]','$good[7]','$good[8]','$good[9]',
'$good[10]','$good[11]','$good[12]','$good[13]','$good[14]','$good[15]','$good[16]','$good[17]','$good[18]','$good[19]',
'$good[20]','$good[21]','$good[22]','$good[23]','$good[24]' )" ;

$newpro = mysql_query($query_newpro) or die(mysql_error());
$row_newpro = mysql_fetch_assoc($newpro);

//*******************************************************************
$query_oldrec = "SELECT * FROM similarityTable 
WHERE ASIN1 IN ('$old[0]','$old[1]','$old[2]','$old[3]','$old[4]','$old[5]','$old[6]','$old[7]','$old[8]','$old[9]','$old[10]',
	'$old[11]','$old[12]','$old[13]','$old[14]','$old[15]','$old[16]','$old[17]','$old[18]','$old[19]','$old[20]') " ;

$oldrec = mysql_query($query_oldrec) or die(mysql_error());
$row_oldrec = mysql_fetch_assoc($oldrec);

while($row_oldrec = mysql_fetch_assoc($oldrec))
    {

        $good2[] = trim ($row_oldrec['ASIN2']);

    }

$query_oldpro = "SELECT * FROM itemtable
WHERE ASIN IN ('$good2[0]','$good2[1]','$good2[2]','$good2[3]','$good2[4]','$good2[5]','$good2[6]','$good2[7]','$good2[8]','$good2[9]',
'$good2[10]','$good2[11]','$good2[12]','$good2[13]','$good2[14]','$good2[15]','$good2[16]','$good2[17]','$good2[18]','$good2[19]',
'$good2[20]','$good2[21]','$good2[22]','$good2[23]','$good2[24]' )" ;

$oldpro = mysql_query($query_oldpro) or die(mysql_error());
$row_oldpro = mysql_fetch_assoc($oldpro);

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

             
               <h4> &nbsp; Recommendation for you </h4>    

                
                <?php if ($row_newpro ){?>
                  <?php do { ?>
                  
				  <ul id="newrecs" class="list">
					<li><div id="productimg">
						<img src="<?php echo $row_newpro['itemImage']; ?>" alt="Img">
					</div>
						<h4><?php echo $row_newpro['itemBrand']; ?> : <?php echo $row_newpro['itemName']; ?></h4>
                        <h6>$<?php echo $row_newpro['itemPrice']; ?>     Avg.Rating : <?php echo $row_newpro['itemRating']; ?> </h6>
						<p>
							<?php echo $row_newpro['description']; ?>
						</p>
						
					</li>
				</ul>
                <?php } while ($row_newpro = mysql_fetch_assoc($newpro)); ?>
                 <?php }?> 
                 
                 
                <?php if ($row_oldpro ){?>
                  <?php do { ?>
                  
				  <ul id="newrecs" class="list">
					<li><div id="productimg">
						<img src="<?php echo $row_oldpro['itemImage']; ?>" alt="Img">
					</div>
						<h4><?php echo $row_oldpro['itemBrand']; ?> : <?php echo $row_oldpro['itemName']; ?></h4>
                        <h6>$<?php echo $row_oldpro['itemPrice']; ?>     Avg.Rating : <?php echo $row_oldpro['itemRating']; ?></h6>
						<p>
							<?php echo $row_oldpro['description']; ?>
						</p>
						
					</li>
				</ul>
                <?php } while ($row_oldpro = mysql_fetch_assoc($oldpro)); ?>
                <?php }?> 

          
               <a class="link" href="Guide.php">&nbsp;Rate more products</a>
               <a class="link" style="float:right;" href="comment-history.php">View your comment history&nbsp;</a>
                  
                
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

mysql_free_result($usercomment);
mysql_free_result($newrec);
mysql_free_result($newpro);
mysql_free_result($oldrec);
mysql_free_result($oldpro);
?>