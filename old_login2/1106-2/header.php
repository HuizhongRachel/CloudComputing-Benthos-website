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
        