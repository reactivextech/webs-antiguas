(function($){
    /* ---------------------------------------------- /*
     * Preloader
    /* ---------------------------------------------- */
    $(window).load(function() {
        $('#materialPreloader').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
    });

var mr_firstSectionHeight,
    mr_nav,
    mr_navOuterHeight,
    mr_navScrolled = false,
    mr_navFixed = false,
    mr_outOfSight = false,
    mr_floatingProjectSections,
    mr_scrollTop = 0;

$(document).ready(function() { 
    "use strict";
    // Append .background-image-holder <img>'s as CSS backgrounds
    $('.background-image-holder').each(function() {
        var imgSrc = $(this).children('img').attr('src');
        $(this).css('background', 'url("' + imgSrc + '")');
        $(this).children('img').hide();
        $(this).css('background-position', 'initial');
    });

    // Fade in background images
    setTimeout(function() {
        $('.background-image-holder').each(function() {
            $(this).addClass('fadeIn');
        });
    }, 200);

    // Initialize Tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Icon bulleted lists
    $('ul[data-bullet]').each(function(){
        var bullet = $(this).attr('data-bullet');
        $(this).find('li').prepend('<i class="'+bullet+'"></i>');
    });

    // Multipurpose Modals    
    jQuery('.foundry_modal[modal-link]').remove();

    if($('.foundry_modal').length && (!jQuery('.modal-screen').length)){
        // Add a div.modal-screen if there isn't already one there.
        var modalScreen = jQuery('<div />').addClass('modal-screen').appendTo('body');
    }
    jQuery('.foundry_modal').click(function(){
        jQuery(this).addClass('modal-acknowledged');
    });
    $('.modal-container:not([modal-link])').each(function(index) {
        if(jQuery(this).find('iframe[src]').length){
        	jQuery(this).find('.foundry_modal').addClass('iframe-modal');
        	var iframe = jQuery(this).find('iframe');
        	iframe.attr('data-src',iframe.attr('src'));
            iframe.attr('src', '');
        }
        jQuery(this).find('.btn-modal').attr('modal-link', index);
        // Only clone and append to body if there isn't already one there
        if(!jQuery('.foundry_modal[modal-link="'+index+'"]').length){
            jQuery(this).find('.foundry_modal').clone().appendTo('body').attr('modal-link', index).prepend(jQuery('<i class="fa fa-times fa-2-5x close-modal color-c">'));
        }
    });
    $('.btn-modal').unbind('click').click(function(){
    	var linkedModal = jQuery('.foundry_modal[modal-link="' + jQuery(this).attr('modal-link') + '"]'),
            autoplayMsg = "";
        jQuery('.modal-screen').toggleClass('reveal-modal');
        if(linkedModal.find('iframe').length){
            if(linkedModal.find('iframe').attr('data-autoplay') === '1'){
                var autoplayMsg = '&autoplay=1'
            }
        	linkedModal.find('iframe').attr('src', (linkedModal.find('iframe').attr('data-src') + autoplayMsg));
        }
        linkedModal.toggleClass('reveal-modal');
        return false; 
    });
    // Autoshow modals
	$('.foundry_modal[data-time-delay]').each(function(){
		var modal = $(this);
		var delay = modal.attr('data-time-delay');
		modal.prepend($('<i class="ti-close close-modal">'));
    	if(typeof modal.attr('data-cookie') != "undefined"){
        	if(!mr_cookies.hasItem(modal.attr('data-cookie'))){
                setTimeout(function(){
        			modal.addClass('reveal-modal');
        			$('.modal-screen').addClass('reveal-modal');
        		},delay);
            }
        }else{
            setTimeout(function(){
                modal.addClass('reveal-modal');
                $('.modal-screen').addClass('reveal-modal');
            },delay);
        }
	});
    // Autoclose modals
    $('.foundry_modal[data-hide-after]').each(function(){
        var modal = $(this);
        var delay = modal.attr('data-hide-after');
        if(typeof modal.attr('data-cookie') != "undefined"){
            if(!mr_cookies.hasItem(modal.attr('data-cookie'))){
                setTimeout(function(){
                if(!modal.hasClass('modal-acknowledged')){
                    modal.removeClass('reveal-modal');
                    $('.modal-screen').removeClass('reveal-modal');
                }
                },delay); 
            }
        }else{
            setTimeout(function(){
                if(!modal.hasClass('modal-acknowledged')){
                    modal.removeClass('reveal-modal');
                    $('.modal-screen').removeClass('reveal-modal');
                }
            },delay); 
        }
    });
    jQuery('.close-modal:not(.modal-strip .close-modal)').unbind('click').click(function(){
    	var modal = jQuery(this).closest('.foundry_modal');
        modal.toggleClass('reveal-modal');
        if(typeof modal.attr('data-cookie') !== "undefined"){
            mr_cookies.setItem(modal.attr('data-cookie'), "true", Infinity);
        }
    	if(modal.find('iframe').length){
            modal.find('iframe').attr('src', '');
        }
        jQuery('.modal-screen').removeClass('reveal-modal');
    });
    jQuery('.modal-screen').unbind('click').click(function(){
        if(jQuery('.foundry_modal.reveal-modal').find('iframe').length){
            jQuery('.foundry_modal.reveal-modal').find('iframe').attr('src', '');
        }
    	jQuery('.foundry_modal.reveal-modal').toggleClass('reveal-modal');
    	jQuery(this).toggleClass('reveal-modal');
    });
    jQuery(document).keyup(function(e) {
		 if (e.keyCode == 27) { // escape key maps to keycode `27`
            if(jQuery('.foundry_modal').find('iframe').length){
                jQuery('.foundry_modal').find('iframe').attr('src', '');
            }
			jQuery('.foundry_modal').removeClass('reveal-modal');
			jQuery('.modal-screen').removeClass('reveal-modal');
		}
	});
    // Modal Strips
    jQuery('.modal-strip').each(function(){
    	if(!jQuery(this).find('.close-modal').length){
    		jQuery(this).append(jQuery('<i class="ti-close close-modal">'));
    	}
    	var modal = jQuery(this);

        if(typeof modal.attr('data-cookie') != "undefined"){
           
            if(!mr_cookies.hasItem(modal.attr('data-cookie'))){
            	setTimeout(function(){
            		modal.addClass('reveal-modal');
            	},1000);
            }
        }else{
            setTimeout(function(){
                    modal.addClass('reveal-modal');
            },1000);
        }
    });
    jQuery('.modal-strip .close-modal').click(function(){
        var modal = jQuery(this).closest('.modal-strip');
        if(typeof modal.attr('data-cookie') != "undefined"){
            mr_cookies.setItem(modal.attr('data-cookie'), "true", Infinity);
        }
    	jQuery(this).closest('.modal-strip').removeClass('reveal-modal');
    	return false;
    });

    // Checkboxes
    $('.checkbox-option').on("click",function() {
        $(this).toggleClass('checked');
        var checkbox = $(this).find('input');
        if (checkbox.prop('checked') === false) {
            checkbox.prop('checked', true);
        } else {
            checkbox.prop('checked', false);
        }
    });

    // Radio Buttons
    $('.radio-option').click(function() {
        var checked = $(this).hasClass('checked'); // Get the current status of the radio
        var name = $(this).find('input').attr('name'); // Get the name of the input clicked
        if (!checked) {
            $('input[name="'+name+'"]').parent().removeClass('checked');
            $(this).addClass('checked');
            $(this).find('input').prop('checked', true);
        }
    });

    // Accordions
    $('.accordion li').click(function() {
        if ($(this).closest('.accordion').hasClass('one-open')) {
            $(this).closest('.accordion').find('li').removeClass('active');
            $(this).addClass('active');
        } else {
            $(this).toggleClass('active');
        }
    });

    // Interact with Map once the user has clicked (to prevent scrolling the page = zooming the map
    $('.map-holder').click(function() {
        $(this).addClass('interact');
    });
    if($('.map-holder').length){
    	$(window).scroll(function() {
			if ($('.map-holder.interact').length) {
				$('.map-holder.interact').removeClass('interact');
			}
		});
    }

    // Contact Form (NOT WORKING IN DEMO ONLY)
    $('#contact-form').validator().on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            var $this = $(this),
                //You can edit alerts here
                alerts = {
                    success: 
                    "<div class='form-group' >\
                        <div class='alert alert-success' role='alert'> \
                            <strong>Message Enviado!</strong> Lorem ipsum dolor sit consectetur\
                        </div>\
                    </div>",
                    error: 
                    "<div class='form-group' >\
                        <div class='alert alert-danger' role='alert'> \
                            <strong>¡Oops!</strong> error al enviar, Lorem ipsum dolor sit consectetur.\
                        </div>\
                    </div>"
                };
            $('#contact-form-result').html(alerts.success);
            $('#contact-form').trigger('reset');
        }
    });

    function getURLParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [, ""])[1].replace(/\+/g, '%20')) || null;
    }

    // Disable parallax on mobile
    if ((/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)) {
        $('section').removeClass('parallax');
    }
    
    // Disqus Comments
    if($('.disqus-comments').length){
		/* * * CONFIGURATION VARIABLES * * */
		var disqus_shortname = $('.disqus-comments').attr('data-shortname');
		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
    }

    // Load Google MAP API JS with callback to initialise when fully loaded
    if(document.querySelector('[data-maps-api-key]') && !document.querySelector('.gMapsAPI')){
        if($('[data-maps-api-key]').length){
            var script = document.createElement('script');
            var apiKey = $('[data-maps-api-key]:first').attr('data-maps-api-key');
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?key='+apiKey+'&callback=initializeMaps';
            script.className = 'gMapsAPI';
            document.body.appendChild(script);  
        } 
    }
});

function capitaliseFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

window.initializeMaps = function(){
    if(typeof google !== "undefined"){
        if(typeof google.maps !== "undefined"){
            $('.map-canvas[data-maps-api-key]').each(function(){
                    var mapInstance   = this,
                        mapJSON       = typeof $(this).attr('data-map-style') !== "undefined" ? $(this).attr('data-map-style'): false,
                        mapStyle      = JSON.parse(mapJSON) || [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}],
                        zoomLevel     = (typeof $(this).attr('data-map-zoom') !== "undefined" && $(this).attr('data-map-zoom') !== "") ? $(this).attr('data-map-zoom') * 1: 17,
                        latlong       = typeof $(this).attr('data-latlong') != "undefined" ? $(this).attr('data-latlong') : false,
                        latitude      = latlong ? 1 *latlong.substr(0, latlong.indexOf(',')) : false,
                        longitude     = latlong ? 1 * latlong.substr(latlong.indexOf(",") + 1) : false,
                        geocoder      = new google.maps.Geocoder(),
                        address       = typeof $(this).attr('data-address') !== "undefined" ? $(this).attr('data-address').split(';'): false,
                        markerTitle   = "We Are Here",
                        isDraggable = $(document).width() > 766 ? true : false,
                        map, marker, markerImage,
                        mapOptions = {
                            draggable: isDraggable,
                            scrollwheel: false,
                            zoom: zoomLevel,
                            disableDefaultUI: true,
                            styles: mapStyle
                        };
                    if($(this).attr('data-marker-title') != undefined && $(this).attr('data-marker-title') != "" )
                    {
                        markerTitle = $(this).attr('data-marker-title');
                    }
                    if(address != undefined && address[0] != ""){
                            geocoder.geocode( { 'address': address[0].replace('[nomarker]','')}, function(results, status) {
                                if (status == google.maps.GeocoderStatus.OK) {
                                var map = new google.maps.Map(mapInstance, mapOptions); 
                                map.setCenter(results[0].geometry.location);
                                
                                address.forEach(function(address){
                                    var markerGeoCoder;
                                    
                                    markerImage = {url: window.mr_variant == undefined ? 'img/mapmarker.png' : '../img/mapmarker.png', size: new google.maps.Size(50,50), scaledSize: new google.maps.Size(50,50)};
                                    if(/(\-?\d+(\.\d+)?),\s*(\-?\d+(\.\d+)?)/.test(address) ){
                                        var latlong = address.split(','),
                                        marker = new google.maps.Marker({
                                                        position: { lat: 1*latlong[0], lng: 1*latlong[1] },
                                                        map: map,
                                                        icon: markerImage,
                                                        title: markerTitle,
                                                        optimised: false
                                                    });
                                    }
                                    else if(address.indexOf('[nomarker]') < 0){
                                        markerGeoCoder = new google.maps.Geocoder();
                                        markerGeoCoder.geocode( { 'address': address.replace('[nomarker]','')}, function(results, status) {
                                            if (status == google.maps.GeocoderStatus.OK) {
                                                marker = new google.maps.Marker({
                                                    map: map,
                                                    icon: markerImage,
                                                    title: markerTitle,
                                                    position: results[0].geometry.location,
                                                    optimised: false
                                                });
                                            }
                                        });
                                    }

                                });
                            } else {
                                console.log('There was a problem geocoding the address.');
                            }
                        });
                    }
                    else if(latitude != undefined && latitude != "" && latitude != false && longitude != undefined && longitude != "" && longitude != false ){
                        mapOptions.center   = { lat: latitude, lng: longitude};
                        map = new google.maps.Map(mapInstance, mapOptions); 
                        marker              = new google.maps.Marker({
                                                    position: { lat: latitude, lng: longitude },
                                                    map: map,
                                                    icon: markerImage,
                                                    title: markerTitle
                                                });
                    }
                }); 
        }
    }
}
initializeMaps();
// End of Mapss

/*\
|*|  COOKIE LIBRARY THANKS TO MDN
\*/
var mr_cookies = {
  getItem: function (sKey) {
    if (!sKey) { return null; }
    return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
  },
  setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
    if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) { return false; }
    var sExpires = "";
    if (vEnd) {
      switch (vEnd.constructor) {
        case Number:
          sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
          break;
        case String:
          sExpires = "; expires=" + vEnd;
          break;
        case Date:
          sExpires = "; expires=" + vEnd.toUTCString();
          break;
      }
    }
    document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
    return true;
  },
  removeItem: function (sKey, sPath, sDomain) {
    if (!this.hasItem(sKey)) { return false; }
    document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "");
    return true;
  },
  hasItem: function (sKey) {
    if (!sKey) { return false; }
    return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
  },
  keys: function () {
    var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
    for (var nLen = aKeys.length, nIdx = 0; nIdx < nLen; nIdx++) { aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]); }
    return aKeys;
  }
};
// END COOKIE LIBRARY
})(jQuery);
/*\
|*|  Jquery Script JS
\*/
 jQuery(document).ready(function($) {
    $("a.scroll, .back-to-top").click(function(event){   
    event.preventDefault();
    $('html,body').animate({scrollTop:$(this.hash).offset().top}, 1500,'easeInOutExpo');
    $(".scroll li").removeClass('active');
    $(this).parents('li').toggleClass('active');
    });
var wow = new WOW(
  {
    boxClass:     'wowload',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       0,          // distance to the element when triggering the animation (default is 0)
    mobile:       true,       // trigger animations on mobile devices (default is true)
    live:         true        // act on asynchronously loaded content (default is true)
  }
);
wow.init();
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 50) {
        $(".navbar-inverse").addClass("nav-dark");
    } else {
        $(".navbar-inverse").removeClass("nav-dark");
    }
});
});

/*\
|*|  Clientes Carousel
\*/
jQuery(document).ready(function () {
    'use strict';
    //---- Clients Carousel
    jQuery('.clients-carousel').each(function(){
        var owl = jQuery(this),
            itemsNum = jQuery(this).attr('data-appeared-items'),
            sliderNavigation = jQuery(this).attr('data-navigation');
        if ( sliderNavigation == 'false' || sliderNavigation == '0' ) {
            var returnSliderNavigation = false
        }else {
            var returnSliderNavigation = true
        }
        if( itemsNum == 1) {
            var returndeskitemsNum = 1;
            var desksmallitemsNum = 1;
            var tabletitemsNum = 1;
        } 
        else if (itemsNum >= 2 && itemsNum < 4) {
            var deskitemsNum = itemsNum;
            var desksmallitemsNum = itemsNum - 1;
            var tabletitemsNum = itemsNum - 1;
        } 
        else if (itemsNum >= 4 && itemsNum < 8) {
            var deskitemsNum = itemsNum -1;
            var desksmallitemsNum = itemsNum - 2;
            var tabletitemsNum = itemsNum - 3;
        } 
        else {
            var deskitemsNum = itemsNum -3;
            var desksmallitemsNum = itemsNum - 6;
            var tabletitemsNum = itemsNum - 8;
        }
        owl.owlCarousel({
            stopOnHover: true,
            autoPlay: 4000,
            navigation : returnSliderNavigation,
            pagination: false,
            lazyLoad : true,
            items : itemsNum,
            itemsDesktop : [1000,deskitemsNum],
            itemsDesktopSmall : [900,desksmallitemsNum],
            itemsTablet: [600,tabletitemsNum],
            itemsMobile : [479,1],
            transitionStyle : "goDown",
            autoHeight: false,
        });
    });
    //---- Testimonials Carousel
    jQuery('.testimonials-carousel').each(function(){
        var owl = jQuery(this),
            itemsNum = jQuery(this).attr('data-appeared-items'),
            sliderNavigation = jQuery(this).attr('data-navigation');
        if ( sliderNavigation == 'false' || sliderNavigation == '0' ) {
            var returnSliderNavigation = false
        }else {
            var returnSliderNavigation = true
        }
        if( itemsNum == 1) {
            var returndeskitemsNum = 1;
            var desksmallitemsNum = 1;
            var tabletitemsNum = 1;
        } 
        else if (itemsNum >= 2 && itemsNum < 4) {
            var deskitemsNum = itemsNum;
            var desksmallitemsNum = itemsNum - 1;
            var tabletitemsNum = itemsNum - 1;
        } 
        else if (itemsNum >= 4 && itemsNum < 8) {
            var deskitemsNum = itemsNum -1;
            var desksmallitemsNum = itemsNum - 2;
            var tabletitemsNum = itemsNum - 3;
        } 
        else {
            var deskitemsNum = itemsNum -3;
            var desksmallitemsNum = itemsNum - 6;
            var tabletitemsNum = itemsNum - 8;
        }
        owl.owlCarousel({
            stopOnHover: true,
            autoPlay: 6000,
            navigation : false,
            pagination: true,
            lazyLoad : true,
            items : itemsNum,
            itemsDesktop : [1000,deskitemsNum],
            itemsDesktopSmall : [900,desksmallitemsNum],
            itemsTablet: [600,tabletitemsNum],
            itemsMobile : [479,1],
            transitionStyle : "fade",
            autoHeight: true,
        });
    });
    //---- Team Carousel
    jQuery('.team-carousel').each(function(){
        var owl = jQuery(this),
            itemsNum = jQuery(this).attr('data-appeared-items'),
            sliderNavigation = jQuery(this).attr('data-navigation');
        if ( sliderNavigation == 'false' || sliderNavigation == '0' ) {
            var returnSliderNavigation = false
        }else {
            var returnSliderNavigation = true
        }
        if( itemsNum == 1) {
            var returndeskitemsNum = 1;
            var desksmallitemsNum = 1;
            var tabletitemsNum = 1;
        } 
        else if (itemsNum >= 2 && itemsNum < 4) {
            var deskitemsNum = itemsNum;
            var desksmallitemsNum = itemsNum - 1;
            var tabletitemsNum = itemsNum - 1;
        } 
        else if (itemsNum >= 4 && itemsNum < 8) {
            var deskitemsNum = itemsNum -1;
            var desksmallitemsNum = itemsNum - 2;
            var tabletitemsNum = itemsNum - 3;
        } 
        else {
            var deskitemsNum = itemsNum -3;
            var desksmallitemsNum = itemsNum - 6;
            var tabletitemsNum = itemsNum - 8;
        }
        owl.owlCarousel({
            stopOnHover: true,
            autoPlay: false,
            navigation : returnSliderNavigation,
            pagination: false,
            lazyLoad : true,
            loop: true,
            items : itemsNum,
            itemsDesktop : [1000,deskitemsNum],
            itemsDesktopSmall : [900,desksmallitemsNum],
            itemsTablet: [600,1],
            itemsMobile : [479,1],
            transitionStyle : "backSlide",
            autoHeight: false,
        });
    });
    //---- Sliders Icons
    jQuery(".clients-carousel, .testimonials-carousel, .team-carousel").find(".owl-prev").html("");
    jQuery(".clients-carousel, .testimonials-carousel, .team-carousel").find(".owl-next").html(""); 
});

$(window).load(function(){
    // portfolio Mesonary
    if ( $('#protfolio-msnry').length > 0 ) {
        // init Isotope
        var loading = 0;
        var portfolioMsnry = $('#protfolio-msnry').isotope({
            itemSelector: '.single-port-item',
            layoutMode: 'fitRows'
        });

        $('#portfolio-msnry-sort a').on( 'click', function(e) {
            e.preventDefault();

            if ( $(this).parent('li').hasClass('active') ) {
                return false;
            } else {
                $(this).parent('li').addClass('active').siblings('li').removeClass('active');
            }
            var $this = $(this);
            var filterValue = $this.data('target');
            // set filter for Isotope
            portfolioMsnry.isotope({ filter: filterValue });
            return $(this);
        });
    }
});