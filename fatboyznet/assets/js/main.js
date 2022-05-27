 "use strict";
$(window).on("load", function() {
    // Fix image resize issue.
    var storyImgHolder = $(".image-holder", "#story");
    var storyText = $(".txt-col","#story");
    var platformTooltip = $(".tool-tip", "#platforms");
    
    if ($(window).width() > 990) {
        storyImgHolder.css("height",storyText.height()+140);
        platformTooltip.removeAttr("style");
    }else{
        platformTooltip.each(function(i){
            $(this).css("margin-left",(($(this).width()+20)/2)*-1);
        });
    }
});

(function ($) {
	// jQuery MeanMenu
	//=========================
	jQuery('nav#dropdown').meanmenu();
	
	//sticky
	//==========================
	var HeadBo = $('.header-bottom');
	HeadBo.sticky({topSpacing:0});
	 
	//menu a active jquery
	//==============================
	var pgurl = window.location.href.substr(window.location.href
		.lastIndexOf("/")+1);
		$("ul li a").each(function(){
		if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
		$(this).addClass("active");
	})

	//search box
	//===========================
	var DisPlayB = $('.displayblock');
	var DisPlayN = $('.displaynone');
	var SBfbtn = $('.search-box form button');
	var sboxf = $('.search-box form');
	var Sbox = $('.search-box');
	var SboxI = $('.search-box > i');
	
	DisPlayB.on().click(function(){
		DisPlayB.parent(Sbox).addClass('search-parent');
	});
	DisPlayN.on().click(function(){
		DisPlayN.parent(Sbox).removeClass('search-parent');
	});
	sboxf.slideToggle();
	SboxI.on().click(function(){
		sboxf.slideToggle();
	});
	SBfbtn.on().click(function(){
		sboxf.slideUp();
	});
	SBfbtn.on().click(function(){
		DisPlayN.parent(Sbox).removeClass('search-parent');
	});
	
	//active and unactive
	//============================
	var SingCon = $ ('.single-contact');
	var SingAct = $ ('.single-active');
	var SingActnth = $ ('.single-contact:nth-child(2)');
	var SingActnth2s = $ ('.single-active:nth-child(2) .single-contact');
	
	SingCon.add(SingAct).siblings().mouseover(function(){
		SingCon.removeClass('active');
	});
	SingCon.add(SingAct).siblings().mouseout(function(){
		SingActnth.add(SingActnth2s).addClass('active');
	});
	
	// live chat box active
	//==============================
	var liveChatA = $('.live-chat a');
	var CateA = $('.chat-box');
	var CateHead = $('.live-chat .head .right');
	
	liveChatA.on().click(function(){
		CateA.toggleClass('chat-box-active');
	});
	CateHead.on().click(function(){
		CateA.removeClass('chat-box-active');
	});
	
	// maga menu
	//==============================
	var MainUlLimega = $('.mainmenu ul > li ul.megamenu');
	var MainUlLi = $('.mainmenu ul > li');
	
	MainUlLimega.parent(MainUlLi).addClass('mega-parent');

/*
 animate slider active
====================================== */
	$(".anim-slider").animateSlider(
	{
		autoplay	:true,
		interval	:10000,
		animations 	: 
		{
			0	: 	//Slide No1
			{
				// ".lay1"	: 
				// {
				// 	show   	  : "zoomIn",
				// 	hide 	  : "zoomOut",
				// 	delayShow : "delay1s"
				// },
				".lay2":
				{
					show 	  : "bounceInRight",
					hide 	  : "bounceOutRight",
					delayShow : "delay2s"
				},
				// ".lay3" 	:
				// {
				// 	show 	  : "bounceInRight",
				// 	hide 	  : "bounceOutRight",
				// 	delayShow : "delay3s"
				// },
				".lay8" 	:
				{
					show 	  : "rollIn",
					hide 	  : "rollOut",
					delayShow : "delay3s"
				},
			},
			1	: 	//Slide No1
			{
				// ".lay2-1"	: 
				// {
				// 	show   	  : "fadeInDownBig",
				// 	hide 	  : "fadeOutLeftBig",
				// 	delayShow : "delay1s"
				// },
				".lay2-2":
				{
					show   	  : "bounceIn",
					hide 	  : "fadeOutRightBig",
					delayShow : "delay2s"
				},
				".lay2-8" 	:
				{
					show   	  : "zoomIn",
					hide 	  : "fadeOutRightBig",
					delayShow : "delay3s"
				},
			},
			2	: 	//Slide No3
			{
				// ".lay3-1"	: 
				// {
				// 	show   	  : "rollIn",
				// 	hide 	  : "rollOut",
				// 	delayShow : "delay1s"
				// },
				".lay3-2":
				{
					show 	  : "fadeInDown",
					hide 	  : "fadeOutDown",
					delayShow : "delay2s"
				},
				".lay3-8" 	:
				{
					show 	  : "bounceInRight",
					hide 	  : "bounceOutRight",
					delayShow : "delay3s"
				},
			},
			3	: 	//Slide No4
			{
				// ".lay4-1"	: 
				// {
				// 	show   	  : "fadeInDownBig",
				// 	hide 	  : "fadeOutLeftBig",
				// 	delayShow : "delay1s"
				// },
				".lay4-2":
				{
					show   	  : "bounceIn",
					hide 	  : "fadeOutRightBig",
					delayShow : "delay2s"
				},
				".lay4-8" 	:
				{
					show   	  : "zoomIn",
					hide 	  : "fadeOutRightBig",
					delayShow : "delay3s"
				},
			},
		}
	});

/*
 Count Up active jquery
================================== */
	$('.counter').counterUp({
		delay: 50,
		time: 3000
	});

/*
	Slick Carousel as Nav
===================================*/
	$('.one-item').slick({
		dots: true,
		arrows: false,
	});
	$('.four-item').slick({
		slidesToShow: 4,
		prevArrow: '<img class="prev" src="img/icon/prev.png" alt="prev" />',
		nextArrow: '<img class="next" src="img/icon/next.png" alt="next" />',
		responsive: [
			{ breakpoint: 1169, settings: { slidesToShow: 3 } },
			{ breakpoint: 969, settings: { slidesToShow: 3 } },
			{ breakpoint: 767, settings: { slidesToShow: 2 } },
			{ breakpoint: 480, settings: { slidesToShow: 1 } }
		]
	});

/*
 scrollUp
================================ */	
	$.scrollUp({
        scrollText: '<i class="zmdi zmdi-chevron-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });
/*
 MailChimp
================================ */
$('#mc-form').ajaxChimp({
    language: 'en',
    callback: mailChimpResponse,
    // Add your mailchimp url below here!
    url: 'http://themeshaven.us8.list-manage.com/subscribe/post?u=759ce8a8f4f1037e021ba2922&amp;id=a2452237f8'

});
function mailChimpResponse(resp) {
    var MailSuccess = $('.mailchimp-success');
    var MailError = $('.mailchimp-error');
    if (resp.result === 'success') {
        MailSuccess.html('' + resp.msg).fadeIn(900);
        MailError.fadeOut(400);
        
    } else if(resp.result === 'error') {
        MailError.html('' + resp.msg).fadeIn(900);
    }  
}
	
})(jQuery);

/* loding bar 
--------------*/
jQuery(window).load(function(){
	var preeLoad = $('#loading');
	preeLoad.fadeOut(1000);
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});