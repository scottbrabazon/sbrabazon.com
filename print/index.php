<?php include('../perch/runtime.php');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="wclassth=device-wclassth, initial-scale=1">
		<title>Scott Brabazon | Artworker/Developer | South Manchester | Print</title>
		<meta name="description" content="Developer and Artworker based in South Manchester. Specialising in retouching and print ready artwork." />
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/responsive.css">
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
					<li><a href="../index.php"><img src="../images/home-icon-black.svg" onmouseover="this.src='../images/home-icon-gold.svg'" onmouseout="this.src='../images/home-icon-black.svg'" alt="Home"/></a></li>
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
			<h1>Print</h1>
		</header>

		<div class="home-gallery">
			<ul>
				<li>
					<p><a href="mancitystore.php"><img src="../images/mancitystore_thumbnail.png" alt="City Store Shop"><br></a>
					<a href="mancitystore.php">City Store Shop</a></p>
				<div class="flourish-mobile">
					<img src="../images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="fifa-world-cup-2010.php"><img src="../images/world-cup-thumbnail.png" alt="FIFA World Cup 2010"><br></a>
					<a href="fifa-world-cup-2010.php">FIFA World Cup 2010</a></p>
				<div class="flourish-mobile">
					<img src="../images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="united-direct.php"><img src="../images/mufc2011_thumbnail.png" alt="United Direct"><br></a>
					<a href="united-direct.php">United Direct</a></p>
				<div class="flourish-mobile">
					<img src="../images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="argos.php"><img src="../images/argos_ss2012_thumbnail.png" alt="Argos Catalogue"><br></a>
					<a href="argos.php">Argos Catalogue</a></p>
				<div class="flourish-mobile">
					<img src="../images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="sw6.php"><img src="../images/chelsea_thumbnail.png" alt="SW6"><br></a>
					<a href="sw6.php">SW6</a></p>
				<div class="flourish-mobile">
					<img src="../images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="man-city-store-catalogue.php"><img src="../images/mcfc_thumbnail.png" alt="City Store Catalogue"><br></a>
					<a href="man-city-store-catalogue.php">City Store Catalogue</a></p>
				<div class="flourish-mobile">
					<img src="../images/flourish.svg" alt="Flourish">
				</div>
				</li>
			</ul>	
		</div>	

		<div class="flourish-tablet-a">
			<img src="../images/flourish.svg" alt="Flourish">
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
						<a href="https://uk.linkedin.com/in/scottbrabazon" target="blank"><img src="../images/linkedin.png" alt="LinkedIn"></a>
					</li>
					<li>	
						<p>&copy; 2016 Scott Brabazon</p>
					</li>
				</ul>
			</footer>
		</div>			
	</body>	
</html>