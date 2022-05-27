 /* ==============================================
Page Loader
=============================================== */
$(window).load(function() {
	'use strict';
	$(".loader-item").delay(700).fadeOut();
	$("#pageloader").delay(1200).fadeOut("slow");
});
 /* ==============================================
Fit Videos
=============================================== */
$(window).load(function(){
	'use strict';
     $(".fit-vids").fitVids();
 });
/* ==============================================
Flex Slider Home Page
=============================================== */	
 $(window).load(function(){
	  'use strict';

      $('.hometexts').flexslider({
        animation: "slide",
		selector: ".slide-text .hometext",
		controlNav: false,
		directionNav: false ,
		slideshowSpeed: 4000,  
		direction: "vertical",
        start: function(slider){
         $('body').removeClass('loading'); 
        }
      });
 });
 /* ==============================================
Flex Slider Home Page Animated Version
=============================================== */	
 $(window).load(function(){
	  'use strict';
		
      $('.hometexts-1').flexslider({
        animation: "fade",
		selector: ".slide-text-1 .hometext-1",
		controlNav: false,
		directionNav: false ,
		slideshowSpeed: 5000,  
		direction: "horizontal",
        start: function(slider){
         $('body').removeClass('loading'); 
        }
      });
 });
/* ==============================================
Home Super Slider (images)
=============================================== */
 $('#slides').superslides({
      animation: 'fade',
    });
/* ==============================================
Video Script
=============================================== */
jQuery(function(){
			'use strict';

            jQuery(".player").mb_YTPlayer();
		});