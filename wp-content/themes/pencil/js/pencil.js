/**
 * navigation + jquery
 */
( function() {
	var container, button, menu, links, subMenus;

	container = document.getElementById( 'site-navigation' );
	if ( ! container ) {
		return;
	}

	button = container.getElementsByTagName( 'button' )[0];
	if ( 'undefined' === typeof button ) {
		return;
	}

	menu = container.getElementsByTagName( 'ul' )[0];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	menu.setAttribute( 'aria-expanded', 'false' );
	if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
		menu.className += ' nav-menu';
	}
/*
	button.onclick = function() {
		if ( -1 !== container.className.indexOf( 'toggled' ) ) {
			container.className = container.className.replace( ' toggled', '' );
			button.setAttribute( 'aria-expanded', 'false' );
			menu.setAttribute( 'aria-expanded', 'false' );
		} else {
			container.className += ' toggled';
			button.setAttribute( 'aria-expanded', 'true' );
			menu.setAttribute( 'aria-expanded', 'true' );
		}
	};
*/
	// Get all the link elements within the menu.
	links    = menu.getElementsByTagName( 'a' );
	subMenus = menu.getElementsByTagName( 'ul' );

	// Set menu items with submenus to aria-haspopup="true".
	for ( var i = 0, len = subMenus.length; i < len; i++ ) {
		subMenus[i].parentNode.setAttribute( 'aria-haspopup', 'true' );
	}

	// Each time a menu link is focused or blurred, toggle focus.
	for ( i = 0, len = links.length; i < len; i++ ) {
		links[i].addEventListener( 'focus', toggleFocus, true );
		links[i].addEventListener( 'blur', toggleFocus, true );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		var self = this;

		// Move up through the ancestors of the current link until we hit .nav-menu.
		while ( -1 === self.className.indexOf( 'nav-menu' ) ) {

			// On li elements toggle the class .focus.
			if ( 'li' === self.tagName.toLowerCase() ) {
				if ( -1 !== self.className.indexOf( 'focus' ) ) {
					self.className = self.className.replace( ' focus', '' );
				} else {
					self.className += ' focus';
				}
			}

			self = self.parentElement;
		}
	}
} )();


(function($){
     'use strict';

$(document).ready(function($) {
   
   var $pencilSecondary = $('#secondary');
   
  if(typeof $.fn.theiaStickySidebar === 'function'){
      $pencilSecondary.theiaStickySidebar({
        additionalMarginTop: 52 //Number(pencilCustomScript.fatNavbarHeight)
      });
  }
   
  var $pencilContainer = $('.masonry-container');
   
  if (typeof Masonry === 'function'){
    //imagesLoaded( document.querySelector('.masonry-container'), function( instance ) {
    //$(function(){

      $pencilContainer.imagesLoaded(function(){
        $pencilContainer.masonry({
          itemSelector: '.masonry'
        });
      });
    //});
  //});
  }
    
        // The number of the next page to load (/page/x/).
	var pageNum = parseInt(pencil.startPage, 10) + 1;
 
	// The maximum number of pages the current query can return.
	var max = parseInt(pencil.maxPages, 10);
 
	// The link of the next page of posts.
	var nextLink = pencil.nextLink;

/**
 * Replace the traditional navigation with our own,
 * but only if there is at least one page of new posts to load.
 */
//if(pencil.ajaxButton){
    if(pageNum <= max) {
	// Insert the "More Posts" link.
	$('#primary').append('<p id="pencil-load-more"><a class="btn btn-secondary" href="#">' + pencil.loadMoreText + '</a></p>');

	// Remove the traditional navigation.
	$('.navigation').remove();
    }    
//}
 /*
 * Load new posts when the link is clicked.
 */
var $pencilLoadMore = $('#pencil-load-more a');

$pencilLoadMore.click(function() {
 
        // Are there more posts to load?
	if(pageNum <= max) {
                
                // Hide button.
		//$(this).text( pencil.loadingText );
                //$(this).hide();
                $(this).css('opacity', '0').css('transition', '0');
                
                $.ajax({
                    url: nextLink, 
                    cache: false,
                    dataType: 'html',
                    success: function(response) {
                        
                var result = $(response).find('.masonry');

		if (typeof Masonry === 'function'){

                    //var $container = $('.masonry-container');
                    result = $( result ).css({ opacity: 0 });

                    $pencilContainer.append( result ).imagesLoaded(function(){
                        result.animate({ opacity: 1 });
                        $pencilContainer.masonry( 'appended', result, true );
                        
                            if(typeof $.fn.theiaStickySidebar === 'function'){
                                $pencilSecondary.theiaStickySidebar({
                                  additionalMarginTop: 52
                                });
                            }
                        pageNum++;
                        nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ pageNum).replace(/paged=[0-9]*/, 'paged='+ pageNum);
                        //$('#pencil-load-more').show();
                            if(pageNum <= max) {
                                    $pencilLoadMore.css('opacity', '1').text( pencil.loadMoreText );
                            } else {
                                    $pencilLoadMore.css('opacity', '1').text( pencil.noMorePostsText );
                            }
                    });
                }
                

        }
        });       
        } else {
			$pencilLoadMore.append('');
		}
                return false;
        
});

if (typeof $.fn.slick === 'function'){
// // Slick slider
$('.format-gallery .gallery').slick({
  //dots: true,
  infinite: true,
  //autoplay: true,
  speed: 1000,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

$('.pencil-featured-slider').slick({
  //dots: true,
  infinite: true,
  autoplay: Boolean(pencil.home_page_slider_autoplay),
  autoplaySpeed: Number(pencil.home_page_slider_play_speed),
  speed: 3000,
  slidesToShow: Number(pencil.home_page_slider_img_number),
  slidesToScroll: 1,
  //centerMode: true,
  //centerPadding: '50px',
  adaptiveHeight: true,
  //variableWidth: true,
  //slidesPerRow: 2,
  responsive: [
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
        //variableWidth: false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
}

// // Magnific Popup
if (typeof $.fn.magnificPopup === 'function'){
// Gallery Images
$('.gallery').each(function() {
        $(this).magnificPopup({
        delegate: '.gallery-item:not(.slick-cloned) a[href*=".jpg"], .gallery-item:not(.slick-cloned) a[href*=".jpeg"], .gallery-item:not(.slick-cloned) a[href*=".png"], .gallery-item:not(.slick-cloned) a[href*=".gif"]',
                type: 'image',
                gallery: {enabled:true},
                image: {
                        titleSrc: function(item) {
                                //return  item.el.parent().parent().text();
                                //return item.el.parents('.gallery-item').children('.wp-caption-text').text();
                                return item.el.parents('.gallery-item').text();
                        },
                        cursor: null
                }
        });
}); 

// Single Image
$('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function(){
	if ($(this).parents('.gallery').length === 0) { 
        	$(this).magnificPopup({
		type:'image',
		image: {
			titleSrc: function(item) {
                                return item.el.parent('.wp-caption').children('.wp-caption-text').text();
			},	
                        cursor: null
		}
                });
	}
});	
}

// Top search panel
var $pencilSearchPanel = $('.pencil-search-panel');
    $('.search-toggle').click(function(){
        $pencilSearchPanel.slideToggle(0).css('z-index', '1001');
        });
    $('.pencil-search-panel-close').click(function(){
        $pencilSearchPanel.slideToggle(0).css('z-index', '');
        });
        

//Sticky menu
var $pencilSiteNavigation = $('#site-navigation');
var stickyMenuTop = $pencilSiteNavigation.offset().top;
var stickyMenu = function(){
var scrollTop = $(window).scrollTop();
if (scrollTop > stickyMenuTop) { 
    $pencilSiteNavigation.css({'position': 'fixed', 'top': '0', 'z-index': '1000', 'box-shadow': '0 1px 4px #ccc'});
} else {
    $pencilSiteNavigation.css({'position': '', 'top': '', 'z-index': '', 'box-shadow': 'none'});
}
};

stickyMenu();

$(window).scroll(function() {
            stickyMenu();
});

	var container, button, menu, body, toggledBg;

	container = $( '#site-navigation' );

	button = $( '.menu-toggle' );

	menu = $('#toggled-navbar-bg .nav-menu');

        body = $( '.wordpress' );
        
        toggledBg = $('#toggled-navbar-bg');

        //menu.prepend('<div id="toggled-menu-close"><button><span class="fa fa-close fa-large"></button></span></div>').toggle(500);

        button.click(function(){
            if(container.hasClass('toggled')){

                body.removeClass('overflow-hidden');
                button.attr( 'aria-expanded', 'false' );
		menu.attr( 'aria-expanded', 'false' ).css('display', '');
                menu.parent().css('display', '');
                toggledBg.css('display', '');
                container.removeClass('toggled');
                
            } else {

                pencilMenuOnShow();
   
            }
        });
        
var pencilMenuOnShow = function() {
    var closeButton = $('#toggled-menu-close');
    var toggledBg = $('#toggled-navbar-bg');
    
    container.addClass('toggled');
    body.addClass('overflow-hidden');
    button.attr( 'aria-expanded', 'true' );
    toggledBg.css('display', 'block');
    menu.prepend('<div id="toggled-menu-close"><button><span class="fa fa-close fa-large"></button></span></div>').css('display', 'block').attr( 'aria-expanded', 'true' ).parent().css('display', 'block');
    closeButton.click( function() {
                            pencilMenuOnHide();                            
                        });
    toggledBg.click( function() {
                            pencilMenuOnHide();   
                        });
};
        
var pencilMenuOnHide = function() {
    var closeButton = $('#toggled-menu-close');
    menu.css('display', '').attr( 'aria-expanded', 'false' ).parent().css('display', '');
    //menu.attr( 'aria-expanded', 'false' ).css('display', '');
    button.attr( 'aria-expanded', 'false' );
    //menu.parent().css('display', '');
    toggledBg.css('display', '');
    body.removeClass('overflow-hidden');
    container.removeClass('toggled');
    closeButton.remove();
};
    
});
/*
var pencilWidth = $(window).width();
$(window).resize(function(){
   if($(this).width() !== pencilWidth){
      location.reload();
   }
});
*/
})(jQuery);

//window.onresize = function(){ location.reload(); };