<?php  session_start(); ?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>What's New? - The Margarita Website recommendation</title>
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
					<li class="selected">
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
					<li>
						<?php if (isset($_SESSION["username"])) { ?>
							<a href="after-login.php"><?php echo $_SESSION["username"]; ?></a>
						    <?php }?>
                            
						    <?php if (! isset($_SESSION["username"])) { ?>
							 <a href="before-login.php">Log in</a>
						    <?php }?>
					</li>
				</ul>
			</div>
		</div>
		<div id="contents">
			<div id="adbox">
				<img src="images/perfume-adNew.jpg" style="margin-top:2px" height="157" alt="Img">
			</div>
			<div class="body">
				<h2>What's New?</h2>
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
						<h3>Popular Posts</h3>
						<ul id="posts">
							<li>
								&#8226; <a href="blog.php">We Have More recommendations for You <span class="time">01 June 2012</span></a>
							</li>
							<li>
								&#8226; <a href="blog.php">Be Part of Our Community <span class="time">01 June 2012</span></a>
							</li>
							<li>
								&#8226; <a href="blog.php">recommendation Details <span class="time">01 June 2012</span></a>
							</li>
						</ul>
					</div>
					<div>
						<a href="index.php"><img src="images/new-scent.jpg" alt="Img"></a>
					</div>
					<div>
						<a href="index.php"><img src="images/shop-now.jpg" alt="Img"></a>
					</div>
				</div>
				<ul id="news" class="list">
					<li>
						<img style="height:195px; width:257px;" src="images/ad.jpg" alt="Img">
						<h4>Lorem ipsum</h4>
						<p>
							In hendrerit sollicitudin eros, sit amet tincidunt magna condimentum id. Phasellus nec elementum quam. Vivamus at lectus purus. Cum sociis natoque penatibus et magnis 
							dis parturient montes, nascetur ridiculus mus.
						</p>
						<a href="news.php" class="more">&gt;&gt;&gt; Learn More</a>
					</li>
					<li>
						<img style="height:195px; width:257px;" src="images/ad4.jpg" alt="Img">
						<h4>Dolor sit amet</h4>
						<p>
							In hendrerit sollicitudin eros, sit amet tincidunt magna condimentum id. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent molestie 
							metus sed turpis sollicitudin egestas scelerisque ligula lacinia.
						</p>
						<a href="news.php" class="more">&gt;&gt;&gt; Learn More</a>
					</li>
					<li>
						<img style="height:195px; width:257px;" src="images/ad2.jpg" alt="Img">
						<h4>Lorem ipsum</h4>
						<p>
							In hendrerit sollicitudin eros, sit amet tincidunt magna condimentum id. Phasellus nec elementum quam. Vivamus at lectus purus. Praesent molestie metus sed turpis sollicitudin 
							egestas scelerisque ligula lacinia.
						</p>
						<a href="news.php" class="more">&gt;&gt;&gt; Learn More</a>
					</li>
					<li>
						<img style="height:195px; width:257px;" src="images/ad3.jpg" alt="Img">
						<h4>Dolor sit amet</h4>
						<p>
							In hendrerit sollicitudin eros, sit amet tincidunt magna condimentum id. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent molestie 
							metus sed turpis sollicitudin egestas scelerisque ligula lacinia.
						</p>
						<a href="news.php" class="more">&gt;&gt;&gt; Learn More</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="footer">
			<div>
				<ul class="navigation">
					<li>
						<a href="index.php">Home</a>
					</li>
					<li class="selected">
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
					<li>
						<a href="before-login.php">Contact</a>
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