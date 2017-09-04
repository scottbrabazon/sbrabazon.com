<?php include('../perch/runtime.php'); ?>

<?php
	// Defaults, which can be overridden
	$domain = 'http://'.$_SERVER["HTTP_HOST"];
	$url = $domain.$_SERVER["REQUEST_URI"];
	
	PerchSystem::set_var('domain',$domain);
	PerchSystem::set_var('url',$url);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<meta name="description" content="Developer and Artworker based in Manchester. Read my blogs covering the latest industry developments." />
		<meta name="viewport" content="user-scalable=yes, width=300" />
		<meta name="keywords" content="scott brabazon, artworker, developer, freelancer" />
		<title>Scott Brabazon | Artworker/Developer | Manchester | Blog | <?php perch_blog_post_field(perch_get('s'), 'postTitle'); ?></title>
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
					<li><a href="/print">Print</a></li>	
					<li><a href="/digital">Digital</a></li>		
					<li><a href="/3d">3D</a></li>
					<li><a href="/blog" class="selected">Blog</a></li>
					<li><a href="/contact">Contact</a></li>	
				</ul>
			</nav>
		</div>	
		<div class="desktop-nav">
			<nav>
				<ul>
					<li><a href="/"><img src="/images/home-icon-black.svg" onmouseover="this.src='/images/home-icon-gold.svg'" onmouseout="this.src='/images/home-icon-black.svg'"/></a></li>
					<li>|</li>						
					<li><a href="/print">Print</a></li>
					<li>|</li>		
					<li><a href="/digital">Digital</a></li>
					<li>|</li>			
					<li><a href="/3d">3D</a></li>
					<li>|</li>
					<li><a href="/blog" class="selected">Blog</a></li>
					<li>|</li>
					<li><a href="/contact">Contact</a></li>	
				</ul>
			</nav>
		</div>	
		<div class="blog-wrapper">
			<div class="blog-post">
		    	<?php perch_blog_post(perch_get('s')); ?>
		    	<div class="meta">
		            <div class="cats">
		                <?php perch_blog_post_categories(perch_get('s')); ?>
		            </div>
		            <div class="tags">
		                <?php perch_blog_post_tags(perch_get('s')); ?>
		            </div>
		        </div>
				<div class="addthis_sharing_toolbox"></div>
		    	<?php perch_blog_post_comments(perch_get('s')); ?>
		    	<?php perch_blog_post_comment_form(perch_get('s')); ?>
		    </div> 
			<div class="blog-post-recent">
				<h2>Latest Industry Tweets...</h2>
				<div>
		            <a class="twitter-timeline" href="https://twitter.com/hashtag/FrontEnd" data-widget-id="900714695769960448" data-chrome="noheader">#FrontEnd Tweets</a>
		            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		            </script>
		        </div>
				<!-- <h2>Recent Blogs...</h2>	 -->
				// <?php 
				// perch_blog_custom(array(
				// 	'sort'=>'postDateTime',
				// 	'sort-order'=>'RAND',
				// 	'template'=>'blog/post_in_homepage.html',
				// 	'count'=>'4'
				// )); ?>
			</div>	
		</div>
		<!-- Footer -->
		<?php include_once($_SERVER['DOCUMENT_ROOT']."/footer.php"); ?>	
	</body>
</html>