<?php include('../perch/runtime.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Scott Brabazon | Artworker/Developer | South Manchester | Blog | <?php perch_blog_post_field(perch_get('s'), 'postTitle'); ?></title>
	<meta name="description" content="Developer and Artworker based in South Manchester. Please have a read of my latest blogs covering the latest industry news." />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="alternate" type="application/rss+xml" title="RSS" href="rss.php" />
	<?php perch_get_css(); ?>
	<link href='http://fonts.googleapis.com/css?family=Rokkitt:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/responsive.css">
</head>
<body>
	
	<div class="mobile-nav">
		<nav>
			<ul>
				<li><a href="../index.php">Home</a></li>						
				<li><a href="../print">Print</a></li>	
				<li><a href="../digital">Digital</a></li>		
				<li><a href="../3d">3D</a></li>
				<li><a href="../blog" class="selected">Blog</a></li>
				<li><a href="../contact.php">Contact</a></li>	
			</ul>
		</nav>
	</div>	

	<div class="desktop-nav">
		<nav>
			<ul>
				<li><a href="../index.php"><img src="../images/home-icon-black.svg" onmouseover="this.src='../images/home-icon-gold.svg'" onmouseout="this.src='../images/home-icon-black.svg'"/></a></li>
				<li>|</li>						
				<li><a href="../print">Print</a></li>
				<li>|</li>		
				<li><a href="../digital">Digital</a></li>
				<li>|</li>			
				<li><a href="../3d">3D</a></li>
				<li>|</li>
				<li><a href="../blog" class="selected">Blog</a></li>
				<li>|</li>
				<li><a href="../contact.php">Contact</a></li>	
			</ul>
		</nav>
	</div>	
	
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
    	
    	<?php perch_blog_post_comments(perch_get('s')); ?>
    	
    	<?php perch_blog_post_comment_form(perch_get('s')); ?>
    </div> 

	<div class="blog-post-recent">
		<h2>Recent Blogs...</h2>	
			<?php 
			perch_blog_custom(array(
				'sort'=>'postDateTime',
				'sort-order'=>'RAND',
				'template'=>'blog/post_in_homepage.html',
				'count'=>'4'
			)); ?>	
	</div>	
	
	<div class="footer">		
		<footer>
			<ul>
				<li>	
			<a href="https://uk.linkedin.com/in/scottbrabazon" target="blank"><img src="../images/linkedin.png"></a>
				</li>
				<li>	
			<p>&copy; 2016 Scott Brabazon</p>
				</li>
			</ul>
		</footer>
	</div>	
</body>
</html>