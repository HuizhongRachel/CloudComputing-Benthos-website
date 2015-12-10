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
?>


<?php

session_start();
mysql_select_db($database, $dbhandle);

//display product info
$query_rsRate = "SELECT * FROM producttable WHERE productID>0";
if(isset($_SESSION["rate"]))
{
        $PRODUCTID=$_SESSION["rate"];  // $_SESSION["rate"] is the ASIN
        $query_rsRate .=" AND producttable.ASIN = '$PRODUCTID' ";    
}
$rsRate = mysql_query($query_rsRate) or die(mysql_error());
$row_rsRate = mysql_fetch_assoc($rsRate);
$totalRows_rsRate = mysql_num_rows($rsRate);



//display comment info
$query_rsRate1 = "SELECT * FROM producttable,reviewtable,usertable WHERE productID>0";
if(isset($_SESSION["rate"]))
{
        $PRODUCTID1=$_SESSION["rate"];  // $_SESSION["rate"] is the ASIN
        $query_rsRate1 .=" AND producttable.ASIN = '$PRODUCTID1' ";
		$query_rsRate1 .=" AND reviewtable.ASIN = '$PRODUCTID1' ";
		$query_rsRate1 .=" AND reviewtable.reviewerID = usertable.reviewerID ";     
}
$query_rsRate1 .=" ORDER BY reviewtable.recordID DESC "; 
$rsRate1 = mysql_query($query_rsRate1) or die(mysql_error());
$row_rsRate1 = mysql_fetch_assoc($rsRate1);
$totalRows_rsRate1 = mysql_num_rows($rsRate1);



////////**************************insert rate info**************************************
//name the input data
$REVIEWERID = $_SESSION["reviewerID"];
$REVIEWTEXT = $_POST["reviewtext"];
//$PRODUCTID=$_SESSION["rate"];  // $_SESSION["rate"] is the ASIN
$RATING = $_POST["rating"];
$SUMMARY = $_POST["summary"];

if ((isset($_POST["submit-rate"]))&&($_SESSION["username"])) {
  $insertSQL = sprintf("INSERT INTO reviewTable (reviewerID,ASIN,reviewText,rating,summary) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($REVIEWERID, "text"),
					             GetSQLValueString($PRODUCTID, "text"), //ASIN
								 GetSQLValueString($REVIEWTEXT, "text"),
					             GetSQLValueString($RATING, "int"),
                       GetSQLValueString($SUMMARY, "text"));
					   
				   
$Result1 = mysql_query($insertSQL) or die(mysql_error());

 
echo "<script> window.location.replace('after-login.php') </script>";
}

if ((isset($_POST["submit-rate"]))&&(!$_SESSION["username"])) {
echo "<script type='text/javascript'>alert('You cannot comment unless login!');</script>";
}
////////*******************************insert rate info***********************************




?>












<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Product Homepage</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
		<?php include_once "header.php"?>
		
        <div id="contents">
			
			<div id="contact" class="body">
<div id="sidebar">
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
					<div>
						<a href="index.php"><img src="images/shop-now.jpg" alt="Img"></a>
					</div>
				</div>
				<div id="main">
					<div>
                    
                        <h2>Rate For It</h2>
                        <table width="285" id="product-homeshow-table">
                          <tbody>
                            <tr>
                               <td width="288"><img alt="images/perfume-bottles.jpg" src="<?php echo $row_rsRate['itemImage']; ?>">
                                <h3><?php echo $row_rsRate['itemBrand']; ?> </h3>
                                <h5><?php echo $row_rsRate['itemName']; ?></h5>
                                  <table width="100%"  cellpadding="10px">
                                    <tbody>
                                      <tr>
                                        <td width="50%"><button class="buy">$<?php echo $row_rsRate['itemPrice']; ?></button></td>
                                        <td width="50%"><button class="buy"><?php echo $row_rsRate['itemRating']; ?></button></td>

                                      </tr>
                                    </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        
                        
                        <form method="post" class="" id="form1" id="form1">
	                    <label>Your Rate</label>
							<input type="number" name="rating" min="0" max="5"><br><br>
                        <label>Summary</label>
							<input type="text" class="txtfield" name="summary" placeholder="Enter your summary here" value="">
						<label>Message</label>
							<textarea placeholder="Enter Comment here..." name="reviewtext"></textarea>
							<input type="submit" name="submit-rate" value="Submit" class="btn">
                            
						</form>
                        
                     
                        <h2>View Comment</h2>
                        <table width="567" id="other-comment-table">
                          <tbody>
                            <tr>
                              <th width="122" style="text-align: center; color: #FFFFFF;">User name</th>
                              <th width="109" style="text-align: center; color: #FFFFFF;">Rate</th>
                              <th width="320" style="text-align: center; color: #F7F7F7;">Comment</th>
                            </tr>
                            
                            <?php do { ?>
                            <tr>
                              <td><?php echo $row_rsRate1['reviewerName']; ?></td>
                              <td><?php echo $row_rsRate1['rating']; ?></td>
                              <td><?php echo $row_rsRate1['reviewText']; ?></td>
                            </tr>
                            <?php } while ($row_rsRate1 = mysql_fetch_assoc($rsRate1)); ?>
                            
                          </tbody>
                        </table>
                         
                        
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
					<li class="selected">
						<a href="Guide.php">Guide</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="blog.php">Blog</a>
					</li>
					<li>
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