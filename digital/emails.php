<?php include('../perch/runtime.php');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="description" content="Developer and Artworker based in South Manchester. Specialising in HTML emails, Wordpress development and responsive, content managed sites of all sizes." />
		<title>Scott Brabazon | Artworker/Developer | South Manchester | Digital | HTML Email Campaigns</title>
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/responsive.css">
		<meta name="viewport" content="user-scalable=yes, width=300" />
	</head>
	
	<body>

		<div class="mobile-nav">
			<nav>
				<ul>
					<li><a href="../index.php">Home</a></li>						
					<li><a href="../print">Print</a></li>	
					<li><a href="../digital" class="selected">Digital</a></li>		
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
					<li><a href="../print">Print</a></li>
					<li>|</li>		
					<li><a href="../digital" class="selected">Digital</a></li>
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
			<h1>HTML Email Csmpaigns</h1>
		</header>
			
		<div class="primary-content">
				<ul>
					<li><img src="../images/aflemail.jpg" alt="Aylesworth Fleming Email"></img></li>
					<li><img src="../images/bikeandgo.jpg" alt="Bike &amp; Go Email"></img></li>
					<li><img src="../images/joneshomesemail.jpg" alt="Jones Homes Email"></img></li>
					<li><img src="../images/warren-email-newsletter.jpg" alt="Warren Partners Newsletter Email"></img></li>
					<li><img src="../images/wd40-email.jpg" alt="WD40 Email"></img></li>
					<li><img src="../images/warren-email-xmas.jpg" alt="Warren Partners Christmas Email"></img>
					<div class="flourish-mobile">
						<img src="images/flourish.svg">
					</div></li>
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