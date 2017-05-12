<?php include('../perch/runtime.php');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="description" content="Developer and Artworker based in Manchester. Specialising in Cinema 4D modelling and animation." />
		<title>Scott Brabazon | Artworker/Developer | Manchester | 3D</title>
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/css/main.css">
		<link rel="stylesheet" href="/css/responsive.css">
		<meta name="viewport" content="user-scalable=yes, width=300" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div class="mobile-nav">
			<div class="mobile-nav-toggle">
				<div class='open-close-button'>
					<svg version="1.1" id="_x2014_ÎÓÈ_x5F_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
						<g class="button-1">
							<path fill="#b6883f" d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,56.037
							C15.643,56.037,3.962,44.357,3.962,30C3.962,15.643,15.643,3.962,30,3.962c14.357,0,26.037,11.68,26.037,26.038
							C56.037,44.357,44.357,56.037,30,56.037z"/>
						</g>
						<g class="button-2">
							<polygon fill="#FFFFFF" points="32,12.083 28,12.083 28,47.917 32,47.917 "/>
						</g>	
						<g class="button-3">	
							<polygon fill="#FFFFFF" points="12.083,28 12.083,32 47.917,32 47.917,28 "/>
						</g>		
					</svg>
				</div>
			</div>
			<nav class="mobile-nav-links">
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
			<h1>3D</h1>
		</header>
		<div class="home-gallery">
			<ul>
				<li>
					<p><a href="guitar.php"><img src="../images/guitar_thumbnail.png" alt="Epiphone 335 Dot"><br></a>
					<a href="guitar.php">Epiphone 335 Dot</a></p>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg">
					</div>	
				</li>
				<li>
					<p><a href="hublot-animation.php"><img src="../images/hublot-thumbnail.png" alt="Hublot Animation"><br></a>
					<a href="hublot-animation.php">Hublot Animation</a></p>
					<div class="flourish-mobile">
						<img src="../images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="wd40cans.php"><img src="../images/wd40cans_thumbnail.png" alt="WD40 Cans"><br></a>
					<a href="wd40cans.php">WD40 Cans</a></p>
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
						<a href="https://uk.linkedin.com/in/scottbrabazon" target="blank">
							<img src="../images/linkedin.png" alt="LinkedIn">
						</a>
					</li>
					<li>	
						<p>&copy; 2017 Scott Brabazon</p>
					</li>
				</ul>	
			</footer>
			<script src="../js/jquery-1.11.0.min.js"></script>
			<script src="../js/menu.js"></script>
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
				ga('create', 'UA-85329524-1', 'auto');
				ga('send', 'pageview');
			</script>
		</div>			
	</body>	
</html>