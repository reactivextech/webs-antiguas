(function($){
	/* ---------------------------------------------- /*
	 * Preloader
	/* ---------------------------------------------- */
	$(window).load(function() {
		$('#status').fadeOut();
		$('#preloader').delay(350).fadeOut('slow');
	});

	$(document).ready(function() {
		/* ---------------------------------------------- /*
		 * Animated scrolling / Scroll Up
		/* ---------------------------------------------- */
		$('a[href*=#]').bind("click", function(e){
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top
			}, 1000);
			e.preventDefault();
		});

		$(window).scroll(function() {
			if ($(this).scrollTop() > 100) {
				$('.scroll-up').fadeIn();
			} else {
				$('.scroll-up').fadeOut();
			}
		});

		$(document).on('click','.navbar-collapse.in',function(e) {
			if( $(e.target).is('a') && $(e.target).attr('class') != 'dropdown-toggle' ) {
				$(this).collapse('hide');
			}
		});
		/* ---------------------------------------------- /*
		 * Background image
		/* ---------------------------------------------- */
		$('#intro').backstretch(['images/bg3.jpg']);
		/* ---------------------------------------------- /*
		 * Navbar
		/* ---------------------------------------------- */
		$('body').scrollspy({
			target: '.navbar-custom',
			offset: 70
		})

		var navbar = $('.navbar');
		var navHeight = navbar.height();

		$(window).scroll(function() {
			if($(this).scrollTop() >= navHeight) {
				navbar.addClass('navbar-color');
			}
			else {
				navbar.removeClass('navbar-color');
			}
		});

		if($(window).width() <= 767) {
			navbar.addClass('custom-collapse');
		}

		$(window).resize(function() {
			if($(this).width() <= 767) {
				navbar.addClass('custom-collapse');
			}
			else {
				navbar.removeClass('custom-collapse');
			}
		});
		/* ---------------------------------------------- /*
		 * WOW Animation When You Scroll
		/* ---------------------------------------------- */
		wow = new WOW({
			mobile: false
		});
		wow.init();
		/* ---------------------------------------------- /*
		 * Rotate
		/* ---------------------------------------------- */
		$(".rotate").textrotator({
			animation: "dissolve",
			separator: "|",
			speed: 4000
		});
		/* ---------------------------------------------- /*
		 * Portfolio mix
		/* ---------------------------------------------- */
		$('#grid').mixitup();
		/* ---------------------------------------------- /*
		 * flex-gallery slider
		/* ---------------------------------------------- */
		$(window).load(function() {
		    $('.flexslider').flexslider({
		        directionNav: false,
		        slideshowSpeed: 3000,
		        animation: "fade"
		    });
		});
		/* ---------------------------------------------- /*
		 * Google Map
		/* ---------------------------------------------- */	
		map = new GMaps({
			el: '#map',
			scrollwheel: false, // Map Mousewheel scroll disable
			zoom: 14, // Map Zoom
			lat: -20.070141,// Map Latitudes
			lng: 57.57621 // Map Longitudes
		});

		map.addMarker({
			lat: -20.070141, // Map Marker Latitudes
			lng: 57.57621 // Map Marker Latitudes
		});
	});
})(jQuery);