<?php include('../../perch/runtime.php');?>


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
		<meta name="description" content="Developer and Artworker based in Manchester. Specialising in retouching and print ready artwork." />
		<meta name="viewport" content="user-scalable=yes, width=300" />
		<meta name="keywords" content="scott brabazon, artworker, developer, freelancer" />
		<title>Scott Brabazon | Artworker/Developer | Manchester | Print | Argos Catalogue</title>
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
					<li><a href="/print" class="selected">Print</a></li>	
					<li><a href="/digital">Digital</a></li>		
					<li><a href="/3d">3D</a></li>
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
					<li><a href="/print" class="selected">Print</a></li>
					<li>|</li>		
					<li><a href="/digital">Digital</a></li>
					<li>|</li>			
					<li><a href="/3d">3D</a></li>
					<li>|</li>
					<li><a href="/blog">Blog</a></li>
					<li>|</li>
					<li><a href="/contact">Contact</a></li>	
				</ul>
			</nav>
		</div>	
		<header>
			<h1>Argos Catalogue</h1>
		</header>
		<div class="home-gallery">
			<ul>
				<li>
					<a href="/images/argos_ss2012_009.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="/images/argos_ss2012_009.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div></li>
				<li>
					<a href="/images/argos_ss2012_013.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="/images/argos_ss2012_013.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div></li>
				<li>
					<a href="/images/argos_ss2012_031.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="/images/argos_ss2012_031.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div></li>
				<li>
					<a href="/images/argos_ss2012_034.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="/images/argos_ss2012_034.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div></li>
				<li>
					<a href="/images/argos_ss2012_036.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="/images/argos_ss2012_036.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div></li>
				<li>
					<a href="/images/argos_ss2012_039.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="/images/argos_ss2012_039.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div></li>
				<li>
					<a href="/images/argos_ss2012_044.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="/images/argos_ss2012_044.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div></li>
				<li>
					<a href="/images/argos_ss2012_051.jpg" data-lightbox="wc" data-title="Argos Catalogue"><img src="/images/argos_ss2012_051.jpg" alt="Argos Catalogue"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>
			</ul>	
		</div>
		<div class="flourish-tablet-a">
			<img src="/images/flourish.svg">
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
		<!-- Footer -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?>	
	</body>	
</html>