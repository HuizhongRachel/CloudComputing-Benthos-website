<?php require_once('Connections/chz.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$newhistory = $_SESSION["asin"]; 

echo $_SESSION["username"];



mysql_select_db($database, $dbhandle);


$query_newrec = "SELECT * FROM similaritytable 
WHERE ASIN1 = '$newhistory' " ;

$newrec = mysql_query($query_newrec) or die(mysql_error());
$row_newrec = mysql_fetch_assoc($newrec);

while($row_newrec = mysql_fetch_assoc($newrec))
    {

        $good[] = trim ($row_newrec['ASIN2']);

    }

$query_newpro = "SELECT * FROM producttable 

WHERE ASIN IN ('$good[0]','$good[1]','$good[2]','$good[3]','$good[4]','$good[5]','$good[6]','$good[7]','$good[8]','$good[9]',
'$good[10]','$good[11]','$good[12]','$good[13]','$good[14]','$good[15]','$good[16]','$good[17]','$good[18]','$good[19]',
'$good[20]','$good[21]','$good[22]','$good[23]','$good[24]' )" ;

$newpro = mysql_query($query_newpro) or die(mysql_error());
$row_newpro = mysql_fetch_assoc($newpro);


?>

<body>

              

                 <h4> &nbsp; newrec Recommendation for you </h4>
                  <?php do { ?>
                  
				  <ul id="newrecs" class="list">
					<li>
						<img src="<?php echo $row_newpro['itemImage']; ?>" alt="Img">
						<h4><?php echo $row_newpro['itemName']; ?></h4>
                        <h6>$<?php echo $row_newpro['itemPrice']; ?></h6>
						<p>
							<?php echo $row_newpro['description']; ?>
						</p>
						
					</li>
				</ul>
                <?php } while ($row_newpro = mysql_fetch_assoc($newpro)); ?>




</body>
