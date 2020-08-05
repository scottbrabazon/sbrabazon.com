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
		<title>Scott Brabazon | Developer | Manchester | Digital</title>
		<!-- CSS -->
		<link rel="stylesheet" href="/css/style.css">
		<link rel="stylesheet" href="/js/lightbox/css/lightbox.css">
		<script>
			/**
			* Function that captures a click on an outbound link in Analytics.
			* This function takes a valid URL string as an argument, and uses that URL string
			* as the event label. Setting the transport method to 'beacon' lets the hit be sent
			* using 'navigator.sendBeacon' in browser that support it.
			*/
			var trackOutboundLink = function(url) {
			  ga('send', 'event', 'outbound', 'click', url, {
			    'transport': 'beacon',
			    'hitCallback': function(){document.location = href;}
			 });
			}
		</script>
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
					<li><a href="/digital" class="selected">Digital</a></li>		
					<li><a href="/3d">3D</a></li>
					<li><a href="/print">Print</a></li>	
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
					<li><a href="/digital" class="selected">Digital</a></li>
					<li>|</li>			
					<li><a href="/3d">3D</a></li>
					<li>|</li>						
					<li><a href="/print">Print</a></li>
					<li>|</li>
					<li><a href="/blog">Blog</a></li>
					<li>|</li>
					<li><a href="/contact">Contact</a></li>	
				</ul>
			</nav>
		</div>	
		<header>
			<h1>Digital</h1>
		</header>
		<div class="home-gallery">
			<ul>

				<!-- JS Form Validation -->
				<li>
					<p><a href="think-money" class="grow-rotate"><img src="/images/thinkmoney-thumbnail.png" alt="JS Form Validation"><br></a>
					<a href="think">JS Form Validation</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Jacamo -->
				<li>
					<p><a href="https://www.jacamo.co.uk/" onclick="trackOutboundLink('https://www.jacamo.co.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/jacamo-thumbnail.png" alt="Jacamo"><br></a>
					<a href="https://www.jacamo.co.uk/" onclick="trackOutboundLink('https://www.jacamo.co.uk/'); return true;" target="_blank">Jacamo</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Salts Website -->
				<li>
					<p><a href="http://www.salts.co.uk/" onclick="trackOutboundLink('http://www.salts.co.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/salts-thumbnail.png" alt="Salts Website"><br></a>
					<a href="http://www.salts.co.uk/" onclick="trackOutboundLink('http://www.salts.co.uk/'); return true;" target="_blank">Salts Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Warren Partners Email -->
				<li>
					<p><a href="https://thefoundrycommunicationsltd.createsend.com/campaigns/reports/viewCampaign.aspx?d=y&c=A3938B31DD12D0E0&ID=7313905F54A57F95&temp=False&tx=0" target="popup" onclick="window.open('https://thefoundrycommunicationsltd.createsend.com/campaigns/reports/viewCampaign.aspx?d=y&c=A3938B31DD12D0E0&ID=7313905F54A57F95&temp=False&tx=0','Warren Partners Email','width=615,height=800')" class="grow-rotate"><img src="/images/warren-email-xmas-thumbnail.png" alt="Warren Partners Email"><br></a>
					<a href="https://thefoundrycommunicationsltd.createsend.com/campaigns/reports/viewCampaign.aspx?d=y&c=A3938B31DD12D0E0&ID=7313905F54A57F95&temp=False&tx=0" target="popup" onclick="window.open('https://thefoundrycommunicationsltd.createsend.com/campaigns/reports/viewCampaign.aspx?d=y&c=A3938B31DD12D0E0&ID=7313905F54A57F95&temp=False&tx=0','Warren Partners Email','width=615,height=800')">Warren Partners Email</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- LPP Website -->
				<li>
					<p><a href="https://www.localpensionspartnership.org.uk/" onclick="trackOutboundLink('https://www.localpensionspartnership.org.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/lpp-thumbnail.png" alt="LPP Website"><br></a>
					<a href="https://www.localpensionspartnership.org.uk/" onclick="trackOutboundLink('https://www.localpensionspartnership.org.uk/'); return true;" target="_blank">LPP Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Pollen Street Capital</a></p> -->
				<li>
					<p><a href="https://scottbrabazon.github.io/pollen-street-concept/" onclick="trackOutboundLink('https://scottbrabazon.github.io/pollen-street-concept/'); return true;" target="_blank" class="grow-rotate"><img src="/images/pollen-thumbnail.png" alt="Pollen Street Capital"><br></a>
					<a href="https://scottbrabazon.github.io/pollen-street-concept/" onclick="trackOutboundLink('https://scottbrabazon.github.io/pollen-street-concept/'); return true;" target="_blank">Pollen Street Capital</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Fashion World -->
				<li>
					<p><a href="https://www.fashionworld.co.uk/" onclick="trackOutboundLink('https://www.fashionworld.co.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/fashionworld-thumbnail.png"alt="Fashion World"><br></a>
					<a href="https://www.fashionworld.co.uk/" onclick="trackOutboundLink('https://www.fashionworld.co.uk/'); return true;" target="_blank">Fashion World</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Audio Player -->
				<li>
					<p><a href="audio-player" class="grow-rotate"><img src="/images/audio-player-thumbnail.png" alt="Audio Player"><br></a>
					<a href="audio-player">Audio Player</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Simply Be -->
				<li>
					<p><a href="https://www.simplybe.co.uk/" onclick="trackOutboundLink('https://www.simplybe.co.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/simplybe-thumbnail.png" alt="Simply Be"><br></a>
					<a href="https://www.simplybe.co.uk/" onclick="trackOutboundLink('https://www.simplybe.co.uk/'); return true;" target="_blank">Simply Be</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Footfall Website -->
				<li>
					<p><a href="http://www.footfalluk.co.uk/" onclick="trackOutboundLink('http://www.footfalluk.co.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/footfall-thumbnail.png" alt="Footfall Website"><br></a>
					<a href="http://www.footfalluk.co.uk/" onclick="trackOutboundLink('http://www.footfalluk.co.uk/'); return true;" target="_blank">Footfall Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Space Zero Website -->
				<li>
					<p><a href="http://www.spacezero.co.uk/" onclick="trackOutboundLink('http://www.spacezero.co.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/space-zero-thumbnail.png" alt="Space Zero Website"><br></a>
					<a href="http://www.spacezero.co.uk/" onclick="trackOutboundLink('http://www.spacezero.co.uk/'); return true;" target="_blank">Space Zero Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Warren Partners Website -->
				<li>
					<p><a target="_blank" href="http://www.warrenpartners.co.uk/" onclick="trackOutboundLink('http://www.warrenpartners.co.uk/'); return true;" class="grow-rotate"><img src="/images/warren-website-thumbnail.png" alt="Warren Partners Website"><br></a>
					<a target="_blank" href="http://www.warrenpartners.co.uk/" onclick="trackOutboundLink('http://www.warrenpartners.co.uk/'); return true;">Warren Partners Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Foundry Website -->
				<li>
					<p><a href="http://dev.foundrydev.co.uk/" onclick="trackOutboundLink('http://dev.foundrydev.co.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/foundry_thumbnail.gif" alt="Foundry Website"><br></a>
					<a href="http://dev.foundrydev.co.uk/" onclick="trackOutboundLink('http://dev.foundrydev.co.uk/'); return true;" target="_blank">Foundry Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Foundry Healthcare Website -->
				<li>
					<p><a href="http://www.foundryhealthcare.co.uk/" onclick="trackOutboundLink('http://www.foundryhealthcare.co.uk/'); return true;" target="_blank" class="grow-rotate"><img src="/images/fhc-thumbnail.png" alt="Foundry Healthcare Website"><br></a>
					<a href="http://www.foundryhealthcare.co.uk/" onclick="trackOutboundLink('http://www.foundryhealthcare.co.uk/'); return true;" target="_blank">Foundry Healthcare Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Support For Life Video -->
				<li>
					<p><a href="support-for-life" class="grow-rotate"><img src="/images/support-for-life-thumbnail.png" alt="Support For Life Video"><br></a>
					<a href="support-for-life">Support For Life Video</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Premier Pet Care Plan Website -->
				<li>
					<p><a href="http://www.premierpetcareplan.com/gb/" onclick="trackOutboundLink('http://www.premierpetcareplan.com/gb/'); return true;" target="_blank" class="grow-rotate"><img src="/images/ppcp-thumbnail.png" alt="Premier Pet Care Plan Website"><br></a>
					<a href="http://www.premierpetcareplan.com/gb/" onclick="trackOutboundLink('http://www.premierpetcareplan.com/gb/'); return true;" target="_blank">Premier Pet Care Plan Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Foundry Microsite -->
				<li>
					<p><a href="https://www.thisisthefoundry.com/" onclick="trackOutboundLink('https://www.thisisthefoundry.com/'); return true;" target="_blank" class="grow-rotate"><img src="/images/microsite.png" alt="This is the Foundry"><br></a>
					<a href="https://www.thisisthefoundry.com/" onclick="trackOutboundLink('https://www.thisisthefoundry.com/'); return true;" target="_blank">Foundry Microsite</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>

				<!-- Brand In Action Website -->
				<li>
					<p><a href="https://scottbrabazon.github.io/brand-in-action/" onclick="trackOutboundLink('https://scottbrabazon.github.io/brand-in-action/'); return true;" target="_blank" class="grow-rotate"><img src="/images/bia-thumbnail.png" alt="Brand In Action Website"><br></a>
					<a href="https://scottbrabazon.github.io/brand-in-action/" onclick="trackOutboundLink('https://scottbrabazon.github.io/brand-in-action/'); return true;" target="_blank" class="grow-rotate">Brand In Action Website</a></p>
					<div class="flourish-mobile">
						<img src="/images/flourish.svg" alt="Flourish">
					</div>
				</li>
			</ul>				
		</div>

		<!-- Side Bar -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/side-bar.php"); ?>

		
		<!-- Footer -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?>			
	</body>	
</html>