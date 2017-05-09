
			$(document).ready(function(){
				$(".hamburger").click(function(){
					$(this).toggleClass("open");
				});
			});
			$(document).ready(function(){
				$(".open-close-button").click(function(){
					$(this).toggleClass("open");
				});
			});

			$(document).ready(function(){

			    $(".mobile-nav-toggle").click(function(){
			        $(".mobile-nav-links").toggle();
			        $(this).toggleClass("open");
			    });
			    $(".menu-overlay a").click(function( event ){
			        $(".menu-overlay").toggle();
			        console.log(this.hash);
			        $("html, body").animate({
						scrollTop: $(this.hash).offset().top
					}, 1000);
			        $(".menu-toggle").removeClass("open");
			        event.preventDefault();
			        $(".our-work-toggle").removeClass("open");
			        event.preventDefault();
			        $(".contact-us-toggle").removeClass("open");
			        event.preventDefault();
			    });
			});
