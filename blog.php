<?php  session_start(); ?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Blog - The Margarita Website recommendation</title>
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
					<li class="selected">
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
				<h2>Blog</h2>
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
				<ul id="blogs">
					<li>
						<div class="time">
							02 <span class="month">June</span>
						</div>
						<h4>We Have More recommendations for Everyone</h4>
						<span class="info">Posted by: Miss Margarita | <a href="blogs.html">3 Comments</a></span>
						<p>
							Our website recommendations are created with inspiration, checked for quality and originality and meticulously sliced and coded. What's more, they're absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the <a href="http://www.freewebsitetemplates.com/about/terms/">Terms of Use</a>. You can even remove all our links if you want to.
						</p>
						<p>
							Looking for more recommendations? Just browse through all our <a href="http://www.freewebsitetemplates.com/">Free Website recommendations</a> and find what you're looking for. But if you don't find any website recommendation you can use, you can try our <a href="http://www.freewebsitetemplates.com/freewebdesign/">Free Web Design</a> service and tell us all about it. Maybe you're looking for something different, something special. And we love the challenge of doing something different and something special.
						</p>
						<a href="blog.php" class="comment">Add a Comment</a>
					</li>
					<li>
						<div class="time">
							02 <span class="month">June</span>
						</div>
						<h4>Be Part of Our Community</h4>
						<span class="info">Posted by: Miss Margarita | <a href="blogs.html">3 Comments</a></span>
						<p>
							Our website recommendations are created with inspiration, checked for quality and originality and meticulously sliced and coded. What's more, they're absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the <a href="http://www.freewebsitetemplates.com/about/terms/">Terms of Use</a>. You can even remove all our links if you want to.
						</p>
						<p>
							Looking for more recommendations? Just browse through all our <a href="http://www.freewebsitetemplates.com/">Free Website recommendations</a> and find what you're looking for. But if you don't find any website recommendation you can use, you can try our <a href="http://www.freewebsitetemplates.com/freewebdesign/">Free Web Design</a> service and tell us all about it. Maybe you're looking for something different, something special. And we love the challenge of doing something different and something special.
						</p>
						<a href="blog.php" class="comment">Add a Comment</a>
					</li>
					<li>
						<div class="time">
							02 <span class="month">June</span>
						</div>
						<h4>Be Part of Our Community</h4>
						<span class="info">Posted by: Miss Margarita | <a href="blogs.html">3 Comments</a></span>
						<p>
							Our website recommendations are created with inspiration, checked for quality and originality and meticulously sliced and coded. What's more, they're absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the <a href="http://www.freewebsitetemplates.com/about/terms/">Terms of Use</a>. You can even remove all our links if you want to.
						</p>
						<a href="blog.php" class="comment">Add a Comment</a>
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
					<li class="selected">
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
				<p>
					© The Benthos BeautyCare 2015. All Rights Reserved.
				</p>
			</div>
		</div>
	</div>
</body>
</html>