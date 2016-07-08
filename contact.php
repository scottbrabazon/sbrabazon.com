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
			<button class="mobile-nav-toggle">
				<div class='open-close-button'>
					<svg version="1.1" id="_x2014_ÎÓÈ_x5F_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
					x="0px" y="0px" width="60px" height="60px" viewBox="0 0 60 60" enable-background="new 0 0 60 60" xml:space="preserve">
						<g class="button-1">
							<path fill="#b6883f" d="M30,0C13.458,0,0,13.458,0,30s13.458,30,30,30s30-13.458,30-30S46.542,0,30,0z M30,56.037
							C15.643,56.037,3.962,44.357,3.962,30C3.962,15.643,15.643,3.962,30,3.962c14.357,0,26.037,11.68,26.037,26.038
							C56.037,44.357,44.357,56.037,30,56.037z"/>
						</g>
						<g class="button-2">
							<polygon fill="#b6883f" points="32,12.083 28,12.083 28,47.917 32,47.917 "/>
						</g>	
						<g class="button-3">	
							<polygon fill="#b6883f" points="12.083,28 12.083,32 47.917,32 47.917,28 "/>
						</g>		
					</svg>
				</div>
			</button>
			<nav class="mobile-nav-links">
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

					<div class="expertise">

						<div class="development expertise-col">
							<h3>Development Expertise</h3>
							<ul>
								<li><p>HTML</p></li>
								<li><p>CSS (SASS)</p></li>
								<li><p>Javascript</p></li>
								<li><p>jQuery</p></li>
								<li><p>PHP</p></li>
								<li><p>GIT</p></li>
								<li><p>Wordpress</p></li>
								<li><p>Design</p></li>
							</ul>	
						</div>	

						<div class="project expertise-col">	
							<h3>Project Expertise</h3>
							<ul>
								<li><p>Content Managed Websites</p></li>
								<li><p>Responsive Websites</p></li>
								<li><p>Responsive Email Campaigns</p></li>
								<li><p>3D Modelling</p></li>
								<li><p>3D Animation</p></li>
								<li><p>Catalogues</p></li>
								<li><p>POS</p></li>
								<li><p>Direct Mail</p></li>
							</ul>
						</div>	

						<div class="print expertise-col">
							<h3>Print Expertise</h3>
							<ul>
								<li><p>Layout Design</p></li>
								<li><p>Retouching</p></li>
								<li><p>Colour Balancing</p></li>
								<li><p>Print Ready Artwork</p></li>
							</ul>
						</div>

						<div class="software expertise-col">	
							<h3>Software Expertise</h3>
							<ul>
								<li><p>Adobe Creative Suite</p></li>
								<li><p>Microsoft Office</p></li>
								<li><p>Cinema 4D</p></li>
							</ul>
						</div>

					</div>

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

		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/menu.js"></script>

	</body>	
</html>