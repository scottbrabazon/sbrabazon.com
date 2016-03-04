<?php include('../perch/runtime.php');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="description" content="Developer and Artworker based in South Manchester. Specialising in Cinema 4D modelling and animation." />
		<title>Scott Brabazon | Artworker/Developer | South Manchester | 3D</title>
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/normalize.css">
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
					<li><a href="../digital">Digital</a></li>		
					<li><a href="../3d" class="selected">3D</a></li>
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
					<li><a href="../digital">Digital</a></li>
					<li>|</li>			
					<li><a href="../3d" class="selected">3D</a></li>
					<li>|</li>
					<li><a href="../blog">Blog</a></li>
					<li>|</li>
					<li><a href="../contact.php">Contact</a></li>	
				</ul>
			</nav>
		</div>	

		<header>
			<h1>Epiphone 335 Dot</h1>
		</header>
			
		<div class="big-grid">
				<ul>
					<li><img src="../images/guitar2.jpg" alt="Epiphone 335 Dot Body, Framework"></img></li>
					<li><img src="../images/guitar1.jpg" alt="Epiphone 335 Dot Body, Rendered"></img></li>
					<li><img src="../images/guitar4.jpg" alt="Epiphone 335 Dot Head, Framework"></img></li>
					<li><img src="../images/guitar3.jpg" alt="Epiphone 335 Dot Head, Rendered"></img></li>
					<li><img src="../images/guitar6.jpg" alt="Epiphone 335 Dot Bridge, Framework"></img></li>
					<li><img src="../images/guitar5.jpg" alt="Epiphone 335 Dot Bridge, Rendered"></img></li>
					<li><img src="../images/guitar7.jpg" alt="Epiphone 335 Dot Pickup, Framework"></img></li>
					<li><img src="../images/guitar8.jpg" alt="Epiphone 335 Dot Pickup, Rendered"></img></li>
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