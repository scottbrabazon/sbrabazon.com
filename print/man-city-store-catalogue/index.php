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
		<title>Scott Brabazon | Artworker/Developer | Manchester | Print | City Store Catalogue 2010/11</title>
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
			<h1>City Store Catalogue 2010/11</h1>
		</header>
		<div class="home-gallery">
			<ul>
				<li><a href="/images/mcfc_084_001_front_back.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_084_001_front_back.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_002_003_intro.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_002_003_intro.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_004_005_intro_2.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_004_005_intro_2.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_008_009_home_kit.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_008_009_home_kit.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_014_015_personalisation.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_014_015_personalisation.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_024_025_my_first_game.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_024_025_my_first_game.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_026_027_retro.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_026_027_retro.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_034_035_essentials.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_034_035_essentials.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_038_039_essentials_2for20.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_038_039_essentials_2for20.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_040_041_essentials_2for15.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_040_041_essentials_2for15.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_046_047_essentials_womens_2for20.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_046_047_essentials_womens_2for20.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_052_053_accessories.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_052_053_accessories.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_058_059_keyrings_badges.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_058_059_keyrings_badges.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_068_069_christmas_soft_toys.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_068_069_christmas_soft_toys.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_062_063_soft_toys_stationery.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_062_063_soft_toys_stationery.jpg" alt="City Store Catalogue 2010/11"></a></li>
				<li><a href="/images/mcfc_072_073_mugs_retro_gifts.jpg" data-lightbox="wc" data-title="City Store Catalogue 2011"><img src="/images/mcfc_072_073_mugs_retro_gifts.jpg" alt="City Store Catalogue 2010/11"></a></li>
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