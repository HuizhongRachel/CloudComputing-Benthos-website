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
mysql_select_db($database_chz, $chz);
$query_rsRate = "SELECT * FROM reviewTable, productTable WHERE productID>0";


if(isset($_SESSION["rate"]))
{
	$PRODUCTID=$_SESSION["rate"];  // $_SESSION["rate"] is the ASIN
	$query_rsRate .=" AND productTable.ASIN = '$PRODUCTID' ";
}

$rsRate = mysql_query($query_rsRate, $chz) or die(mysql_error());
$row_rsRate = mysql_fetch_assoc($rsRate);
$totalRows_rsRate = mysql_num_rows($rsRate);

?>

<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO reviewTable(rating,ASIN,reviewerID, reviewerText, summary) VALUES (%s,%s, %s, %s, %s)",
                       GetSQLValueString($_POST['rating'], "int"),
					             GetSQLValueString($_SESSION["rate"], "text"),
					             GetSQLValueString($row_rsRate['peopleId'], "int"),
                       GetSQLValueString($_POST['d'], "text"));
					  
  mysql_select_db($database_chz, $chz);
  $Result1 = mysql_query($insertSQL, $chz) or die(mysql_error());

  $insertGoTo = "product-rate.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));  // <-------may need to modify
}
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
                              <td width="288"><img src="images/perfume-bottles.jpg" alt="Img"> 
                                <h3> brand name</h3>
                                <h5> product name </h5>
                                  <table width="100%"  cellpadding="10px">
                                    <tbody>
                                      <tr>
                                        <td width="50%"><button class="buy">Price</button></td>
                                        <td width="50%"><button class="buy">Rate</button></td>
                                      </tr>
                                    </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      <form action="index.php" method="post" class="">
	                    <label>Your Rate</label>
							<input type="number" name="quantity" min="0" max="5"><br><br>
						<label>Message</label>
							<textarea placeholder="Enter Comment here..."></textarea>
							<input type="submit" value="Submit" class="btn">
						</form>
                        <h2>View Comment</h2>
                        
                        
                        <table width="567" id="other-comment-table">
                          <tbody>
                            <tr>
                              <th width="122" style="text-align: center; color: #FFFFFF;">User name</th>
                              <th width="109" style="text-align: center; color: #FFFFFF;">Rate</th>
                              <th width="320" style="text-align: center; color: #F7F7F7;">Comment</th>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
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
						<a href="scents.php">Scents</a>
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