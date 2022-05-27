/*--------------------------------------------------
        Cover
----------------------------------------------------*/
$(window).load(function(){
    $('#intro-text').appear(function(){         

        TweenMax.fromTo('#intro-text .text-intro', 1, 
            { scale:"0.5", opacity:"0"}, 
            { scale:"1", opacity:"1",  ease: Back.easeOut.config( 1.3 ), delay:0.5 }
        );
        
        TweenMax.fromTo('#intro-text .btn-buy-it', 0.5, 
            { marginTop:"-50px", opacity:"0", position:"absolute"}, 
            { marginTop:"0", opacity:"1", position:"relative", ease: Back.easeOut.config( 1.3 ), delay:1 }
        );

        TweenMax.fromTo('#intro-text .btn-search', 0.5, 
            { marginTop:"-50px", opacity:"0", position:"absolute"}, 
            { marginTop:"0", opacity:"1", position:"relative", ease: Back.easeOut.config( 1.3 ), delay:1.25 }
        );

        TweenMax.fromTo('#intro-text .btn-open-menu', 0.5, 
            { marginTop:"-50px", opacity:"0", position:"absolute"}, 
            { marginTop:"0", opacity:"1", position:"relative", ease: Back.easeOut.config( 1.3 ), delay:1.5 }
        );          
    },{accX: 0, accY: -200});
});
/*--------------------------------------------------
        Colección
----------------------------------------------------*/
$('#collection-masonry .item').hover(function(){
            
    var $overlay = $('.item-overlay', this);
    var $category = $('.item-category', this);
    var $link = $('.item-link', this);
      
    TweenMax.to( $overlay, 1, { backgroundColor:"rgba(44, 26, 41, 0.8)",  ease:Power4.easeOut } );
    TweenMax.to( $category, 0.5, { bottom:"80",  ease:Power4.easeOut } );
    TweenMax.to( $link, 0.5, { bottom:"50",  ease:Power4.easeOut } );
    },
    function(){
            
    var $overlay = $('.item-overlay', this);
    var $category = $('.item-category', this);
    var $link = $('.item-link', this);
    
    TweenMax.to( $overlay, 1, {backgroundColor:"rgba(44, 26, 41, 0.5)",  ease:Power4.easeOut } );
    TweenMax.to( $category, 0.5, { bottom:"50",  ease:Power4.easeOut } );
    TweenMax.to( $link, 0.5, { bottom:"-50",  ease:Power4.easeOut } );
            
        });
    
    // Isotope Init
        $('.isotope-grid').each(function() {            

            var $container = $(this);
            var cols = $container.data('cols');
            var colWidth;           

            switch(cols){               

                case 2:
                colWidth = '.col-md-6';
                break;              

                case 3:
                colWidth = '.col-md-4';
                break;              

                case 4:
                colWidth = '.col-md-3';
                break;              

            }

            $container.isotope({         

                itemSelector: '.item',
                layoutMode: 'masonry',  
                masonry: {
                  columnWidth: colWidth
                }   

            });         

        });  // END Isotope Init 
/*--------------------------------------------------
        Productos
----------------------------------------------------*/
// jQuery(document).ready(function($){
//     var itemInfoWrapper = $('.cd-single-item');
    
//     itemInfoWrapper.each(function(){
//         var container = $(this),
//             // create slider pagination
//             sliderPagination = createSliderPagination(container);
        
//         //update slider navigation visibility
//         updateNavigation(container, container.find('.cd-slider li').eq(0));

//         container.find('.cd-slider').on('click', function(event){
//             //enlarge slider images 
//             if( !container.hasClass('cd-slider-active') && $(event.target).is('.cd-slider')) {
//                 itemInfoWrapper.removeClass('cd-slider-active');
//                 container.addClass('cd-slider-active').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
//                     $('#producto').animate({'scrollTop':container.offset().top}, 200);
//                 });
//             }
//         });

//         container.find('.cd-close').on('click', function(){
//             //shrink slider images 
//             container.removeClass('cd-slider-active');
//         });

//         //update visible slide
//         container.find('.cd-next').on('click', function(){
//             nextSlide(container, sliderPagination);
//         });

//         container.find('.cd-prev').on('click', function(){
//             prevSlide(container, sliderPagination);
//         });

//         container.find('.cd-slider').on('swipeleft', function(){
//             var wrapper = $(this),
//                 bool = enableSwipe(container);
//             if(!wrapper.find('.selected').is(':last-child') && bool) {nextSlide(container, sliderPagination);}
//         });

//         container.find('.cd-slider').on('swiperight', function(){
//             var wrapper = $(this),
//                 bool = enableSwipe(container);
//             if(!wrapper.find('.selected').is(':first-child') && bool) {prevSlide(container, sliderPagination);}
//         });

//         sliderPagination.on('click', function(){
//             var selectedDot = $(this);
//             if(!selectedDot.hasClass('selected')) {
//                 var selectedPosition = selectedDot.index(),
//                     activePosition = container.find('.cd-slider .selected').index();
//                 if( activePosition < selectedPosition) {
//                     nextSlide(container, sliderPagination, selectedPosition);
//                 } else {
//                     prevSlide(container, sliderPagination, selectedPosition);
//                 }
//             }
//         });
//     }); 
        
//     //keyboard slider navigation
//     $(document).keyup(function(event){
//         if(event.which=='37' && $('.cd-slider-active').length > 0 && !$('.cd-slider-active .cd-slider .selected').is(':first-child')) {
//             prevSlide($('.cd-slider-active'), $('.cd-slider-active').find('.cd-slider-pagination li'));
//         } else if( event.which=='39' && $('.cd-slider-active').length && !$('.cd-slider-active .cd-slider .selected').is(':last-child')) {
//             nextSlide($('.cd-slider-active'), $('.cd-slider-active').find('.cd-slider-pagination li'));
//         } else if(event.which=='27') {
//             itemInfoWrapper.removeClass('cd-slider-active');
//         }
//     });

//     function createSliderPagination($container){
//         var wrapper = $('<ul class="cd-slider-pagination"></ul>').insertAfter($container.find('.cd-slider-navigation'));
//         $container.find('.cd-slider li').each(function(index){
//             var dotWrapper = (index == 0) ? $('<li class="selected"></li>') : $('<li></li>'),
//                 dot = $('<a href="#0"></a>').appendTo(dotWrapper);
//             dotWrapper.appendTo(wrapper);
//             dot.text(index+1);
//         });
//         return wrapper.children('li');
//     }

//     function nextSlide($container, $pagination, $n){
//         var visibleSlide = $container.find('.cd-slider .selected'),
//             navigationDot = $container.find('.cd-slider-pagination .selected');
//         if(typeof $n === 'undefined') $n = visibleSlide.index() + 1;
//         visibleSlide.removeClass('selected');
//         $container.find('.cd-slider li').eq($n).addClass('selected').prevAll().addClass('move-left');
//         navigationDot.removeClass('selected')
//         $pagination.eq($n).addClass('selected');
//         updateNavigation($container, $container.find('.cd-slider li').eq($n));
//     }

//     function prevSlide($container, $pagination, $n){
//         var visibleSlide = $container.find('.cd-slider .selected'),
//             navigationDot = $container.find('.cd-slider-pagination .selected');
//         if(typeof $n === 'undefined') $n = visibleSlide.index() - 1;
//         visibleSlide.removeClass('selected')
//         $container.find('.cd-slider li').eq($n).addClass('selected').removeClass('move-left').nextAll().removeClass('move-left');
//         navigationDot.removeClass('selected');
//         $pagination.eq($n).addClass('selected');
//         updateNavigation($container, $container.find('.cd-slider li').eq($n));
//     }

//     function updateNavigation($container, $active) {
//         $container.find('.cd-prev').toggleClass('inactive', $active.is(':first-child'));
//         $container.find('.cd-next').toggleClass('inactive', $active.is(':last-child'));
//     }

//     function enableSwipe($container) {
//         var mq = window.getComputedStyle(document.querySelector('.cd-slider'), '::before').getPropertyValue('content').replace(/"/g, "").replace(/'/g, "");
//         return ( mq=='mobile' || $container.hasClass('cd-slider-active'));
//     }
// });
/*--------------------------------------------------
        Tooltips and Popovers
----------------------------------------------------*/
var App = function () {
    //Bootstrap Tooltips and Popovers
    function handleBootstrap() {
        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 15000,
            pause: 'hover'
        });
        /*Tooltips*/
        jQuery('.tooltips').tooltip();
        jQuery('.tooltips-show').tooltip('show');      
        jQuery('.tooltips-hide').tooltip('hide');       
        jQuery('.tooltips-toggle').tooltip('toggle');       
        jQuery('.tooltips-destroy').tooltip('destroy');
        /*Popovers*/
        jQuery('.popovers').popover();
        jQuery('.popovers-show').popover('show');
        jQuery('.popovers-hide').popover('hide');
        jQuery('.popovers-toggle').popover('toggle');
        jQuery('.popovers-destroy').popover('destroy');
    }
    return {
        init: function () {
            handleBootstrap();
            handleSearch();
            handleSearchV1();
            handleSearchV2();
            handleTopBar();
            handleTopBarSubMenu();       
            handleToggle();
            handleHeader();
            handleMegaMenu();
            handleHoverSelector();
            handleEqualHeightColumns();
        },
    };
}();
jQuery(document).ready(function() {
        App.init();
    });
