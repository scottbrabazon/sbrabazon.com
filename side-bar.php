<div class="blog-homepage">
	<div>
		<h2>Todays Weather</h2>
		<div id="weather-container">
            <p>Loading...</p>
        </div>
    </div>
    <div class="flourish-mobile">
		<img src="/images/flourish.svg" alt="Flourish">
	</div>
    <div class="flourish-tablet-a">
		<img src="/images/flourish.svg" alt="Flourish">
	</div>
    <!-- <div class="twitter-widget">
		<h2>Latest Tweets...</h2>
		<div class="tweets-container">
            <p>Loading...</p>
        </div>
    </div> -->
	<div class="recent-blogs">
		<h2>Latest Blogs...</h2>	
		<?php 
		perch_blog_custom(array(
			'sort'=>'postDateTime',
			'sort-order'=>'RAND',
			'template'=>'blog/post_in_homepage.html',
			'count'=>'2'
		)); ?>	
	</div>
</div>