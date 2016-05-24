<?php include('../perch/runtime.php');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Scott Brabazon | Artworker/Developer | South Manchester | Digital</title>
		<meta name="description" content="Developer and Artworker based in South Manchester. Specialising in Wordpress development." />
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
					<li><a href="../print">Print</a></li>	
					<li><a href="../digital">Digital</a></li>		
					<li><a href="../3d">3D</a></li>
					<li><a href="../blog" class="selected">Blog</a></li>
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
			<h1>Digital</h1>
		</header>

		<div class="home-gallery">
			<ul>
				<li>
					<p><a href="http://www.brandinaction.com/" target="blank"><img src="../images/bia-thumbnail.png" alt="Brand In Action Website"><br></a>
					<a href="http://www.brandinaction.com/" target="blank">Brand In Action Website</a></p>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://scottbrabazon.com/dev/wordpress/" target="blank"><img src="../images/jesters-thumbnail.png" alt="Jesters Website"><br></a>
					<a href="http://scottbrabazon.com/dev/wordpress/" target="blank">Jesters Website</a></p>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://www.spacezero.co.uk/" target="blank"><img src="../images/space-zero-thumbnail.png" alt="Space Zero Website"><br></a>
					<a href="http://www.spacezero.co.uk/" target="blank">Space Zero Website</a></p>
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