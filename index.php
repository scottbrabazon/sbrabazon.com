<?php include('perch/runtime.php');?>

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
		<title>Scott Brabazon | Artworker/Developer | Manchester</title>
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
					<li><a href="/" class="selected">Home</a></li>
					<li><a href="/print">Print</a></li>	
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
					<li><a href="/"><img src="images/home-icon-gold.svg" onmouseover="this.src='images/home-icon-gold.svg'" onmouseout="this.src='images/home-icon-black.svg'" alt="Home"></a></li>
					<li>|</li>						
					<li><a href="/print">Print</a></li>
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
			<h1>Scott Brabazon</h1>
		</header>
		<div class="home-gallery">
			<ul>
				<li>
					<p><a href="print/fifa-world-cup-2010" class="grow-rotate"><img src="images/world-cup-thumbnail.png" alt="FIFA World Cup 2010"><br></a>
					<a href="print/fifa-world-cup-2010">FIFA World Cup 2010</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://www.warrenpartners.co.uk/" target="blank" class="grow-rotate"><img src="images/warren-website-thumbnail.png"alt="Warren Partners Website"><br></a>
					<a href="http://www.warrenpartners.co.uk/" target="blank">Warren Partners Website</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://www.spacezero.co.uk/" target="blank" class="grow-rotate"><img src="images/space-zero-thumbnail.png" alt="Space Zero Website"><br></a>
					<a href="http://www.spacezero.co.uk/" target="blank">Space Zero Website</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="https://scottbrabazon.github.io/" target="blank" class="grow-rotate"><img src="/images/pollen-thumbnail.png" alt="Pollen Street Capital"><br></a>
					<a href="https://scottbrabazon.github.io/" target="blank">Pollen Street Capital</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="3d/wd40cans" class="grow-rotate"><img src="images/wd40cans_thumbnail.png" alt="WD40 Cans"><br></a>
					<a href="3d/wd40cans">WD40 Cans</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="print/man-city-store" class="grow-rotate"><img src="images/mancitystore_thumbnail.png" alt="City Store Shop"><br></a>
					<a href="print/man-city-store">City Store Shop</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="https://thefoundrycommunicationsltd.createsend.com/campaigns/reports/viewCampaign.aspx?d=y&c=A3938B31DD12D0E0&ID=7313905F54A57F95&temp=False&tx=0" target="popup" onclick="window.open('https://thefoundrycommunicationsltd.createsend.com/campaigns/reports/viewCampaign.aspx?d=y&c=A3938B31DD12D0E0&ID=7313905F54A57F95&temp=False&tx=0','Warren Partners Email','width=615,height=900')" class="grow-rotate"><img src="images/warren-email-xmas-thumbnail.png" alt="Warren Partners Email"><br></a>
					<a href="https://thefoundrycommunicationsltd.createsend.com/campaigns/reports/viewCampaign.aspx?d=y&c=A3938B31DD12D0E0&ID=7313905F54A57F95&temp=False&tx=0" target="popup" onclick="window.open('https://thefoundrycommunicationsltd.createsend.com/campaigns/reports/viewCampaign.aspx?d=y&c=A3938B31DD12D0E0&ID=7313905F54A57F95&temp=False&tx=0','Warren Partners Email','width=615,height=900')">Warren Partners Email</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="https://www.localpensionspartnership.org.uk/" target="blank" class="grow-rotate"><img src="images/lpp-thumbnail.png" alt="LPP Website"><br></a>
					<a href="https://www.localpensionspartnership.org.uk/" target="blank">LPP Website</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="3d/guitar" class="grow-rotate"><img src="images/guitar_thumbnail.png" alt="Epiphone 335 Dot"><br></a>
					<a href="3d/guitar">Epiphone 335 Dot</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>	
				<li>
					<p><a href="print/united-direct" class="grow-rotate"><img src="images/mufc2011_thumbnail.png" alt="United Direct"><br></a>
					<a href="print/united-direct">United Direct</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="3d/hublot-animation" class="grow-rotate"><img src="images/hublot-thumbnail.png" alt="Hublot Animation"><br></a>
					<a href="3d/hublot-animation">Hublot Animation</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://www.brandinaction.com/" target="blank" class="grow-rotate"><img src="images/bia-thumbnail.png" alt="Brand In Action Website"><br></a>
					<a href="http://www.brandinaction.com/" target="blank">Brand In Action Website</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="print/argos" class="grow-rotate"><img src="images/argos_ss2012_thumbnail.png" alt="Argos Catalogue"><br></a>
					<a href="print/argos">Argos Catalogue</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://dev.foundrydev.co.uk/" target="blank" class="grow-rotate"><img src="images/foundry_thumbnail.gif" alt="Foundry Website"><br></a>
					<a href="http://dev.foundrydev.co.uk/" target="blank">Foundry Website</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="print/sw6" class="grow-rotate"><img src="images/chelsea_thumbnail.png" alt="SW6"><br></a>
					<a href="print/sw6">SW6</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://www.footfalluk.co.uk//" target="blank" class="grow-rotate"><img src="images/footfall-thumbnail.png" alt="Footfall Website"><br></a>
					<a href="http://www.footfalluk.co.uk/" target="blank">Footfall Website</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="print/man-city-store-catalogue" class="grow-rotate"><img src="images/mcfc_thumbnail.png" alt="City Store Catalogue"><br></a>
					<a href="print/man-city-store-catalogue">City Store Catalogue</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://www.foundryhealthcare.co.uk/" target="blank" class="grow-rotate"><img src="images/fhc-thumbnail.png" alt="Foundry Healthcare Website"><br></a>
					<a href="http://www.foundryhealthcare.co.uk/" target="blank">Foundry Healthcare Website</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://www.salts.co.uk/" target="blank" class="grow-rotate"><img src="/images/salts-thumbnail.png" alt="Salts Website"><br></a>
					<a href="http://www.salts.co.uk/" target="blank">Salts Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="http://www.premierpetcareplan.com/gb/" target="blank" class="grow-rotate"><img src="images/ppcp-thumbnail.png" alt="Premier Pet Care Plan Website"><br></a>
					<a href="http://www.premierpetcareplan.com/gb/" target="blank">Premier Pet Care Plan Website</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="digital/support-for-life" class="grow-rotate"><img src="images/support-for-life-thumbnail.png" alt="Support For Life Video"><br></a>
					<a href="digital/support-for-life">Support For Life Video</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="https://www.thisisthefoundry.com/" class="grow-rotate"><img src="images/microsite.png" alt="This is the Foundry"><br></a>
					<a href="https://www.thisisthefoundry.com/">Foundry Microsite</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
				<li>
					<p><a href="https://www.thisisthefoundry.com/" class="grow-rotate"><img src="images/this_is_the_foundry_thumbnail.png" alt="This is the Foundry"><br></a>
					<a href="https://www.thisisthefoundry.com/">Foundry Microsite</a></p>
					<div class="flourish-mobile">
						<img src="images/flourish.svg" alt="Flourish">
					</div>
				</li>
			</ul>
		</div>	
		<div class="flourish-tablet-a">
			<img src="images/flourish.svg" alt="Flourish">
		</div>

		<!-- Side Bar -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/side-bar.php"); ?>
		
		<!-- Footer -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?>

	</body>	
</html>