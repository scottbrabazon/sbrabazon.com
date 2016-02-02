<?php include('../perch/runtime.php');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Scott Brabazon | Artworker/Developer | South Manchester | Print | Argos Catalogue</title>
		<meta name="description" content="Developer and Artworker based in South Manchester. Specialising in retouching and print ready artwork." />
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/responsive.css">
		<link rel="stylesheet" href="../css/responsive.css">
		<link rel="stylesheet" href="../css/lightbox.css">
		<meta name="viewport" content="user-scalable=yes, width=300" />
	</head>

	<body>
		
		<div class="mobile-nav">
			<nav>
				<ul>
					<li><a href="../index.php">Home</a></li>						
					<li><a href="../print" class="selected">Print</a></li>	
					<li><a href="../digital">Digital</a></li>		
					<li><a href="../3d">3D</a></li>
					<li><a href="../blog">Blog</a></li>
					<li><a href="../contact.php">Contact</a></li>	
				</ul>
			</nav>
		</div>	

		<div class="desktop-nav">
			<nav>
				<ul>
					<li><a href="../index.php"><img src="../images/home-icon-black.svg" onmouseover="this.src='../images/home-icon-gold.svg'" onmouseout="this.src='../images/home-icon-black.svg'"/></a></li>
					<li>|</li>						
					<li><a href="../print" class="selected">Print</a></li>
					<li>|</li>		
					<li><a href="../digital">Digital</a></li>
					<li>|</li>			
					<li><a href="../3d">3D</a></li>
					<li>|</li>
					<li><a href="../blog">Blog</a></li>
					<li>|</li>
					<li><a href="../contact.php">Contact</a></li>	
				</ul>
			</nav>
		</div>	

		<header>
			<h1>Argos Catalogue</h1>
		</header>
			
		<div class="home-gallery">
			<ul>
				<li>
					<a href="../images/argos_ss2012_009.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="../images/argos_ss2012_009.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div></li>
				<li>
					<a href="../images/argos_ss2012_013.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="../images/argos_ss2012_013.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div></li>
				<li>
					<a href="../images/argos_ss2012_031.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="../images/argos_ss2012_031.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div></li>
				<li>
					<a href="../images/argos_ss2012_034.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="../images/argos_ss2012_034.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div></li>
				<li>
					<a href="../images/argos_ss2012_036.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="../images/argos_ss2012_036.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div></li>
				<li>
					<a href="../images/argos_ss2012_039.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="../images/argos_ss2012_039.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div></li>
				<li>
					<a href="../images/argos_ss2012_044.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="../images/argos_ss2012_044.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div></li>
				<li>
					<a href="../images/argos_ss2012_051.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="../images/argos_ss2012_051.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div></li>
			</ul>	
		</div>

		<div class="flourish-tablet-a">
			<img src="../images/flourish.svg">
		</div>

		<div class="blog-homepage">
			<h2>Recent Blogs...</h2>	
				<?php 
				perch_blog_custom(array(
					'sort'=>'postDateTime',
					'sort-order'=>'RAND',
					'template'=>'blog/post_in_homepage.html',
					'count'=>'2'
				)); ?>	
		</div>

		<div class="footer">		
			<footer>
				<ul>
					<li>	
				<a href="https://uk.linkedin.com/in/scottbrabazon" target="blank"><img src="../images/linkedin.png"></a>
					</li>
					<li>	
				<p>&copy; 2016 Scott Brabazon</p>
					</li>
				</ul>
			</footer>
		</div>			
	</body>	
	<script src="../js/jquery-1.11.0.min.js"></script>
	<script src="../js/lightbox.js"></script>
</html>