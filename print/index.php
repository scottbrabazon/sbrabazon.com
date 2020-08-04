
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
		<meta name="description" content="Developer based in Manchester, UK" />
		<meta name="viewport" content="initial-scale=1.0,width=device-width" />
		<meta name="keywords" content="scott brabazon, artworker, developer, freelancer" />
		<title>Scott Brabazon | Developer | Manchester | Print</title>
		<!-- CSS -->
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/js/lightbox/css/lightbox.css">
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
					<li><a href="/digital">Digital</a></li>		
					<li><a href="/3d">3D</a></li>
					<li><a href="/print" class="selected">Print</a></li>	
					<li><a href="/blog">Blog</a></li>
					<li><a href="/contact">Contact</a></li>	
				</ul>
			</nav>
		</div>
		<div class="desktop-nav">
			<nav>
				<ul>
					<li><a href="/"><img src="/images/home-icon-black.svg" onmouseover="this.src='/images/home-icon-gold.svg'" onmouseout="this.src='/images/home-icon-black.svg'" alt="Home"/></a></li>
					<li>|</li>		
					<li><a href="/digital">Digital</a></li>
					<li>|</li>			
					<li><a href="/3d">3D</a></li>
					<li>|</li>						
					<li><a href="/print" class="selected">Print</a></li>
					<li>|</li>
					<li><a href="/blog">Blog</a></li>
					<li>|</li>
					<li><a href="/contact">Contact</a></li>	
				</ul>
			</nav>
		</div>	
		<header>
			<h1>Print</h1>
		</header>
		<div class="home-gallery">
			<ul>
				<li>
					<p><a href="man-city-store" class="grow-rotate"><img src="/images/mancitystore_thumbnail.png" alt="City Store Shop"><br></a>
					<a href="man-city-store">City Store Shop</a></p>
				<div class="flourish-mobile">
					<img src="/images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="fifa-world-cup-2010" class="grow-rotate"><img src="/images/world-cup-thumbnail.png" alt="FIFA World Cup 2010"><br></a>
					<a href="fifa-world-cup-2010">FIFA World Cup 2010</a></p>
				<div class="flourish-mobile">
					<img src="/images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="united-direct" class="grow-rotate"><img src="/images/mufc2011_thumbnail.png" alt="United Direct"><br></a>
					<a href="united-direct">United Direct</a></p>
				<div class="flourish-mobile">
					<img src="/images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="argos" class="grow-rotate"><img src="/images/argos_ss2012_thumbnail.png" alt="Argos Catalogue"><br></a>
					<a href="argos">Argos Catalogue</a></p>
				<div class="flourish-mobile">
					<img src="/images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="sw6" class="grow-rotate"><img src="/images/chelsea_thumbnail.png" alt="SW6"><br></a>
					<a href="sw6">SW6</a></p>
				<div class="flourish-mobile">
					<img src="/images/flourish.svg" alt="Flourish">
				</div>
				</li>
				<li>
					<p><a href="man-city-store-catalogue" class="grow-rotate"><img src="/images/mcfc_thumbnail.png" alt="City Store Catalogue"><br></a>
					<a href="man-city-store-catalogue">City Store Catalogue</a></p>
				<div class="flourish-mobile">
					<img src="/images/flourish.svg" alt="Flourish">
				</div>
				</li>
			</ul>	
		</div>	
		<div class="flourish-tablet-a">
			<img src="/images/flourish.svg" alt="Flourish">
		</div>
		
		<!-- Side Bar -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/side-bar.php"); ?>
		
		<!-- Footer -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?>	
	</body>	
</html>