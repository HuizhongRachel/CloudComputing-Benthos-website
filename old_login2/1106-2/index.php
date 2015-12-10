<?php  session_start(); ?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>The Margarita Website Template</title>
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
					<li class="selected">
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
				<img src="images/perfume-ad.jpg" alt="Img">
			</div>
			<div id="body">
				<div id="sidebar">
					<div>
						<a href="index.php"><img src="images/new-scent.jpg" alt="Img"></a>
					</div>
					<div>
						<a href="index.php"><img src="images/new-fave.jpg" alt="Img"></a>
					</div>
					<form action="index.php" method="post" id="newsletter">
						<h3>Subscribe to our newsletter</h3>
						<input type="text" value="" class="txtfield">
						<input type="submit" value="Sign up!" class="btn">
					</form>
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
				</div>
				<div id="featured">
					<h3>What’s new? Sed nec eros non metus auctor consectetur vel id dolor.</h3>
					<ul>
						<li>
							<img src="images/perfume-test.jpg" alt="Img">
							<h4>Lorem ipsum</h4>
							<p>
								In hendrerit sollicitudin eros, sit amet tincidunt magna condimentum id. Phasellus nec elementum quam. Vivamus at lectus purus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
							</p>
							<a href="index.php" class="more">&gt;&gt;&gt; Learn More</a>
						</li>
						<li>
							<img src="images/perfumes.jpg" alt="Img">
							<h4>Dolor sit amet</h4>
							<p>
								In hendrerit sollicitudin eros, sit amet tincidunt magna condimentum id. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent molestie metus sed turpis sollicitudin egestas scelerisque ligula lacinia.
							</p>
							<a href="index.php" class="more">&gt;&gt;&gt; Learn More</a>
						</li>
					</ul>
				</div>
				<div id="links">
					<div>
						<h3>Blog</h3>
						<ul class="blog">
							<li>
								&#8226; <a href="blog.php">We Have Free Templates for Everyone <span class="time">01 June 2012</span></a>
							</li>
							<li>
								&#8226; <a href="blog.php">Be Part of Our Community <span class="time">01 June 2012</span></a>
							</li>
							<li>
								&#8226; <a href="blog.php">Template Details <span class="time">01 June 2012</span></a>
							</li>
						</ul>
					</div>
					<div>
						<h3>Shop</h3>
						<ul>
							<li>
								&#8226; <a href="Guide.php">Lorem Ipsum</a>
							</li>
							<li>
								&#8226; <a href="Guide.php">in hendrerit sollicitudin eros</a>
							</li>
							<li>
								&#8226; <a href="Guide.php">sit amet tincidunt magna</a>
							</li>
							<li>
								&#8226; <a href="Guide.php">condimentum id</a>
							</li>
							<li>
								&#8226; <a href="Guide.php">penatibus et magnis dis parturient</a>
							</li>
							<a href="Guide.php" class="more">View More</a>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div>
				<ul class="navigation">
					<li class="selected">
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