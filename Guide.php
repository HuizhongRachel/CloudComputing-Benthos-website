<?php require_once('Connections/chz.php'); ?>




<?php
session_start();
if (isset ($_POST["rate"]))
{
 $_SESSION["rate"] = $_POST["rate"]; 
 echo "<script> window.location.replace('product-rate.php') </script>";

}   
mysql_select_db($database_chz, $chz);
$query_product = "SELECT * FROM productTable ";
$query_product .= "WHERE productID > 0 ";
if(isset($_POST['select_brand']))
{
	$BRAND = $_POST['select_brand'];
	$query_product .= "AND itemBrand = '{$BRAND}'";
}

if(isset($_POST['select_rate']))
{
	$RATE = $_POST['select_rate'];
	switch ($RATE )
	{
		case"4 stars and above": $query_product .= "AND itemRating > 4 ";
		case"3 stars and above": $query_product .= "AND itemRating > 2 ";
		case"2 stars and above": $query_product .= "AND itemRating > 1 ";
		case"1 stars and above": $query_product .= "AND itemRating > 0 ";
	}
}

if(isset($_POST['select_price']))
{
	$PRICE = $_POST['select_price'];
	switch ($PRICE )
	{
		case"$0   ~ $30": $query_product .= "AND itemPrice < 30 ";
		case"$30  ~ $60": $query_product .= "AND itemPrice > 30 AND itemPrice < 60";
		case"$60  ~ $100": $query_product .= "AND itemPrice > 60 AND itemPrice < 100 ";
		case"$100 ~ $200": $query_product .= "AND itemPrice > 100 AND itemPrice < 200 ";
		case"above  $200": $query_product .= "AND itemPrice > 200 ";
	}
}


$query_product .= "AND itemName != 'null' AND itemBrand != 'null' and itemImage !=''  ";
$query_product .=" ORDER by itemRating  DESC LIMIT 48";

$product = mysql_query($query_product, $chz) or die(mysql_error());
$row_product = mysql_fetch_assoc($product);
$totalRows_product = mysql_num_rows($product);
?>





<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>GUIDE </title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="page">
       <?php include_once "header.php"?>
        
	  <div id="contents">
			<?php include_once "dropdown.php"?>





<div style="padding-top:2px; ">
<form id="form2" name="form1" method="post">

<div class="dropdown dropdown-dark">
    <select name="select_brand" id="select_brand" class="dropdown-select">
                     <option> Choose Brand </option>
                         <?php $getallbrands = mysql_query("SELECT DISTINCT itemBrand FROM itemTable");
					               while ($viewallbrands = mysql_fetch_array($getallbrands)) 
                            { ?>
                     <option> 
                       <?php echo $viewallbrands['itemBrand']?> </option>
                       <?php } ?>
                       </select>
  </div>
<div class="dropdown dropdown-dark">
    <select name="select_rate" id="select_rate" class="dropdown-select">
                  <option> Avg. Review </option>
                  <option>4 stars and above</option>
                  <option>3 stars and above</option>
                  <option>2 stars and above</option>
                  <option>1 stars and above</option>
                </select>
  </div>
<div class="dropdown dropdown-dark">
    <select name="select_price"  id="select_price" class="dropdown-select" >
                  <option> Choose Price </option>
                  <option>$0   ~ $30</option>
                  <option>$30  ~ $60</option>
                  <option>$60  ~ $100</option>
                  <option>$100 ~ $200</option>
                  <option>above  $200</option>
                </select>
  </div>
 
  <input type="submit" name="submit" value="Filter">
  
  </form>
  
</div >





            
			<div id="shop" class="body">
				<ul>
                
                <form  id="display-product" name="display-product" method="post">
                 <?php do { ?>
					<li style="padding-top:50px;">
						<img alt="images/perfume-bottles.jpg" src="<?php echo $row_product['itemImage']; ?>"> 
                        <span class="rating"><?php echo $row_product['itemRating']; ?></span> 
						<p style = "line-height:1em;height:4em;overflow: hidden; padding:15px;"><b> <?php echo $row_product['itemBrand']; ?> : <?php echo $row_product['itemName']; ?></b></p>
                        <p><button  class="buy" >$<?php echo $row_product['itemPrice']; ?></button>
          
               <button  class="buy" id="rate" name="rate" type="submit" value="<?php echo$row_product['ASIN'];?>" >Rate</button></p>
					</li>
                    <?php } while ($row_product = mysql_fetch_assoc($product)); ?>
                  </form>
				</ul>
                
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
						<a href="shop.php">Shop</a>
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

<?php
mysql_free_result($product);
?>
