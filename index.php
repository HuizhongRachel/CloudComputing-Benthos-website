<?php  session_start(); ?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>The Margarita Website recommendation</title>
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
				<img style="width:930px; height:470px;" src="images/title.jpg" alt="Img">
			</div>
			<div id="body">
				<div id="sidebar">
					<div>
						<a href="index.php"><img src="images/new-scent.jpg" alt="Img"></a>
					</div>
					<div>
						<a href="index.php"><img src="images/shop-now.jpg" alt="Img"></a>
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
							<h4>Winter Season</h4>
							<p>
								There are plenty of things we appreciate about the winter season, like the homemade feasts and holiday cheer. What we don’t love, however, is dealing with the chalky makeup look that comes with dry skin around this time of the year.
</p>
							<a href="index.php" class="more">&gt;&gt;&gt; Learn More</a>
						</li>
						<li>
							<img style="height:195px; width:257px;" src="images/ad.jpg" alt="Img">
							<h4>BeautyCare</h4>
							<p>
								Let’s face it: You’ll never really forget those classic beauty staples you owned way before Sephora came along. Generally speaking, product formulas have greatly improved since the days of your Jessica McClintock prom dress and boy-band crush . </p>
							<a href="index.php" class="more">&gt;&gt;&gt; Learn More</a>
						</li>
					</ul>
				</div>
				<div id="links">
					<div>
						<h3>Blog</h3>
						<ul class="blog">
							<li>
								&#8226; <a href="blog.php">We Have Free recommendations for Everyone <span class="time">01 June 2012</span></a>
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
					© The Benthos BeautyCare 2015. All Rights Reserved.
				</p>
			</div>
		</div>
	</div>
</body>
</html>