<?php include('perch/runtime.php');?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="description" content="Developer and Artworker based in South Manchester." />
		<title>Scott Brabazon | Artworker/Developer | South Manchester | Contact</title>
		<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/responsive.css">
	</head>
	<body>

		<div class="mobile-nav">
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>						
					<li><a href="print">Print</a></li>	
					<li><a href="digital">Digital</a></li>		
					<li><a href="3d">3D</a></li>
					<li><a href="blog">Blog</a></li>
					<li><a href="contact.php" class="selected">Contact</a></li>	
				</ul>
			</nav>
		</div>	

		<div class="desktop-nav">
			<nav>
				<ul>
					<li><a href="index.php"><img src="images/home-icon-black.svg" onmouseover="this.src='images/home-icon-gold.svg'" onmouseout="this.src='images/home-icon-black.svg'" alt="Home"/></a></li>
					<li>|</li>						
					<li><a href="print">Print</a></li>
					<li>|</li>		
					<li><a href="digital">Digital</a></li>
					<li>|</li>			
					<li><a href="3d">3D</a></li>
					<li>|</li>
					<li><a href="blog">Blog</a></li>
					<li>|</li>
					<li><a href="contact.php" class="selected">Contact</a></li>	
				</ul>
			</nav>
		</div>	

		<header>
			<h1>Contact</h1>
		</header>

		<div class="contact">

				<div class="about">

					<h3>Project Expertise</h3>
						<ul>
							<li><p>Press Advertising</p></li>
							<li><p>Direct Mail</p></li>
							<li><p>Point of Sale</p></li>
							<li><p>Catalogue Production</p></li>
							<li><p>Responsive Websites</p></li>
							<li><p>Content Managed Websites</p></li>
							<li><p>HTML Email Campaigns</p></li>
						</ul>	
					<h3>Technical Expertise</h3>
						<ul>
							<li><p>Fast and accurate artwork</p></li>
							<li><p>Retouching</p></li>
							<li><p>HTML, CSS, SASS</p></li>
							<li><p>3D Modelling</p></li>
							<li><p>Wordpress</p></li>
						</ul>
					<h2>+44 (0)796 365 7287</h2>
					<div class="email">
						<a href="mailto:scott.brabazon@googlemail.com"><h3>scott.brabazon@googlemail.com</h3></a>
					</div>	
				</div>

				<div class="flourish-mobile">
					<img src="images/flourish.svg" alt="Flourish">
				</div>
				<div class="flourish-tablet-b">
					<img src="images/flourish.svg" alt="Flourish">
				</div>

				<div class="contact-form">
					<?php perch_content('Contact Form'); ?>
				</div>

				<div class="flourish-mobile">
					<img src="images/flourish.svg" alt="Flourish">
				</div>
				<div class="flourish-tablet-b">
					<img src="images/flourish.svg" alt="Flourish">
				</div>

				<div class="map">
					<?php perch_content('Map'); ?>
				</div>

		</div>		
	
		<footer>
			<ul>
				<li>	
					<a href="https://uk.linkedin.com/in/scottbrabazon" target="blank"><img src="images/linkedin.png" alt="LinkedIn"></a>
				</li>
				<li>	
					<p>&copy; 2016 Scott Brabazon</p>
				</li>
			</ul>
		</footer>

	</body>	
</html>