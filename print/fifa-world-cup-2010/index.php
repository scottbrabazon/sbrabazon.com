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
		<title>Scott Brabazon | Artworker/Developer | Manchester | Print | FIFA World Cup 2010</title>
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
			<h1>FIFA World Cup 2010</h1>
		</header>
		<div class="home-gallery">
			<ul>
				<li><a href="/images/world-cup-20103.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-20103.jpg" alt="FIFA World Cup 2010 – Intro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-20104.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-20104.jpg" alt="FIFA World Cup 2010 – Intro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-20105.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-20105.jpg" alt="FIFA World Cup 2010 – Intro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-20106.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-20106.jpg" alt="FIFA World Cup 2010 – Intro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-20107.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-20107.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-20108.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-20108.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-20109.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-20109.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201010.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201010.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201011.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201011.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201012.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201012.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201013.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201013.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201014.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201014.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201015.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201015.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201016.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201016.jpg" alt="FIFA World Cup 2010 – Retro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201017.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201017.jpg" alt="FIFA World Cup 2010 – Retro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201018.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201018.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201019.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201019.jpg" alt="FIFA World Cup 2010 – Umbro Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201020.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201020.jpg" alt="FIFA World Cup 2010 – Kitbag Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201021.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201021.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201022.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201022.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201023.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201023.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201024.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201024.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201025.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201025.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li><a href="/images/world-cup-201026.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201026.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201027.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201027.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201028.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201028.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201029.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201029.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201030.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201030.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201031.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201031.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201032.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201032.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201033.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201033.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201034.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201034.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201035.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201035.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201036.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201036.jpg" alt="FIFA World Cup 2010 – Nike Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201037.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201037.jpg" alt="FIFA World Cup 2010 – Kitbag Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201038.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201038.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201039.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201039.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201040.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201040.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201041.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201041.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201042.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201042.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201043.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201043.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201044.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201044.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201045.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201045.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201046.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201046.jpg" alt="FIFA World Cup 2010 – Puma Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201047.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201047.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201048.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201048.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201049.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201049.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201050.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201050.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201051.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201051.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201052.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201052.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201053.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201053.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li><a href="/images/world-cup-201054.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201054.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201055.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201055.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201056.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201056.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201057.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201057.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201058.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201058.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li><a href="/images/world-cup-201059.jpg" data-lightbox="wc" data-title="FIFA World Cup 2010"><img src="/images/world-cup-201059.jpg" alt="FIFA World Cup 2010 – Adidas Spread"></a>
				</li>
			</ul>	
		</div>
		<div class="flourish-tablet-a">
			<img src="/images/flourish.svg" alt="Flourish">
		</div>
		
		<!-- Side Bar -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/side-bar.php"); ?>
		<!-- Side Bar -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/side-bar.php"); ?>	
		<!-- Footer -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?>	
	</body>	
</html>