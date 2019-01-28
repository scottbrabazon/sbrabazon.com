<?php include('../perch/runtime.php');?>


<?php
	// Defaults, which can be overridden
	$domain = 'http://'.$_SERVER["HTTP_HOST"];
	$url = $domain.$_SERVER["REQUEST_URI"];
	
	PerchSystem::set_var('domain',$domain);
	PerchSystem::set_var('url',$url);
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="description" content="Developer and Artworker based in Manchester." />
		<meta name="viewport" content="user-scalable=yes, width=300" />
		<meta name="keywords" content="scott brabazon, artworker, developer, freelancer" />
		<title>Scott Brabazon | Artworker/Developer | Manchester | Contact</title>
		<!-- CSS -->
		<link rel="stylesheet" href="/css/style.css">
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
					<li><a href="/">Home</a></li>
					<li><a href="/print">Print</a></li>	
					<li><a href="/digital">Digital</a></li>		
					<li><a href="/3d">3D</a></li>
					<li><a href="/blog">Blog</a></li>
					<li><a href="/contact" class="selected">Contact</a></li>	
				</ul>
			</nav>
		</div>	
		<div class="desktop-nav">
			<nav>
				<ul>
					<li><a href="/"><img src="/images/home-icon-black.svg" onmouseover="this.src='/images/home-icon-gold.svg'" onmouseout="this.src='/images/home-icon-black.svg'" alt="Home"/></a></li>
					<li>|</li>						
					<li><a href="/print">Print</a></li>
					<li>|</li>		
					<li><a href="/digital">Digital</a></li>
					<li>|</li>			
					<li><a href="/3d">3D</a></li>
					<li>|</li>
					<li><a href="/blog">Blog</a></li>
					<li>|</li>
					<li><a href="/contact" class="selected">Contact</a></li>	
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
						<h3>Digital Expertise</h3>
						<ul>
							<li><p>HTML</p></li>
							<li><p>CSS (SASS)</p></li>
							<li><p>Javascript</p></li>
							<li><p>GIT</p></li>
							<li><p>CMS</p></li>
							<li><p>Gulp</p></li>
							<li><p>Responsive Design</p></li>
							<li><p>Mailchimp</p></li>
							<li><p>Campaign Monitor</p></li>
						</ul>	
					</div>
					<div class="print expertise-col">
						<h3>Print Expertise</h3>
						<ul>
							<li><p>Layout Design</p></li>
							<li><p>Retouching</p></li>
							<li><p>Print Ready Artwork</p></li>
						</ul>
					</div>
					<div class="software expertise-col">	
						<h3>Software Expertise</h3>
						<ul>
							<li><p>Adobe Photoshop</p></li>
							<li><p>Adobe Illustrator</p></li>
							<li><p>Adobe InDesign</p></li>
							<li><p>Microsoft Office</p></li>
							<li><p>Final Cut Pro</p></li>
							<li><p>Cinema 4D</p></li>
						</ul>
					</div>
				</div>
				<p>
					19 Shakespeare Crescent,<br />
					Eccles,<br />
					Salford,<br />
					Greater Manchester<br />
					M30 0PB
				</p>
				<h2 class="phone-number"><a href="tel:+447963657287">+44 (0)796 365 7287</a></h2>
<!-- 				<div class="email">
					<a href="mailto:hello@scottbrabazon.com"><h3>hello@scottbrabazon.com</h3></a>
				</div> -->
				<p>Download my latest CV by clicking <a href="/downloads/scott_brabazon_cv.pdf" target="blank"><u>here</u></a></p>
			</div>
			<div class="flourish-mobile">
				<img src="/images/flourish.svg" alt="Flourish">
			</div>
			<div class="flourish-tablet-b">
				<img src="/images/flourish.svg" alt="Flourish">
			</div>
			<div class="contact-form">
				<?php perch_content('Contact Form'); ?>
			</div>
			<div class="flourish-mobile">
				<img src="/images/flourish.svg" alt="Flourish">
			</div>
			<div class="flourish-tablet-b">
				<img src="/images/flourish.svg" alt="Flourish">
			</div>
		</div>
		<div id="map">
		</div>
		<!-- Footer -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?>	
	</body>	

   <script src="/js/map.js"></script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD31jrGlheW0rwfgnCBE0jSTHSNYZKWrGw&callback=initMap">
    </script>



</html>

key=AIzaSyD31jrGlheW0rwfgnCBE0jSTHSNYZKWrGw