jQuery(document).ready(function ($) {
	
	

		// Sticks the the navigation menu to the top
	var stickyNavTop = $('.header-wrapper').offset().top,		
	 	scrollTop = $(window).scrollTop(),		
		nav = $('.header-wrapper'),
		nav_height = nav.outerHeight();		
			

	if ($("#wpadminbar")) {
			var wpadminbarHeight = $("#wpadminbar").outerHeight();
			nav_height = nav_height + wpadminbarHeight;
	}	

	var headerWrapperHeight = $('.header-wrapper').addClass('sticky').height();
	var stickyNav = function (scrollTop) {
		var headerWrapper = $('.header-wrapper');
		if (scrollTop > stickyNavTop) {
			if (!headerWrapper.hasClass('sticky')) {
				$('.header-wrapper').addClass('sticky');
				$('#page').addClass('hasSticky');				 
				$('body').css('margin-top', headerWrapperHeight);
			}
		} else {
			if (headerWrapper.hasClass('sticky')) {
				$('.header-wrapper').removeClass('sticky');
				$('#page').removeClass('hasSticky');
				$('body').css('margin-top', '0');
			}
		}
	};
	stickyNav(scrollTop);		
		
	$(window).scroll(function () {
		// Determine scroll position and remember it (in variable)
		var scrollTop = $(window).scrollTop();			

		// Make sure the nav is sticky (fixed) when it should be (depending on scroll position)
		stickyNav(scrollTop);		
		
		
	});	
	
	//add dropdown-menu class in sub-menu
	
	$('.main-navigation ul ul.sub-menu').addClass('dropdown-menu');
	
	//function that creates a read more-read less button for each program 
	

  var closeHeight = '50px'; /* Default "closed" height */
	var moreText 	= 'Read More'; /* Default "Read More" text */
	var lessText	= 'Read Less'; /* Default "Read Less" text */
	var duration	= '1000'; /* Animation duration */
  var easing = 'linear'; /* Animation easing option */

	// Limit height of .entry-info div
	$('.entry').each(function() {
		
		// Set data attribute to record original height
		var current = $(this).children('.entry-info');
		current.data('fullHeight', current.height()).css('height', closeHeight);

		// Insert "Read More" link
		current.after('<a href="javascript:void(0);" class="more-link closed">' + moreText + '</a>');

	});
  
  // Link functinoality
	var openSlider = function() {
		link = $(this);
		var openHeight = link.prev('.entry-info').data('fullHeight') + 'px';
		link.prev('.entry-info').animate({'height': openHeight}, {duration: duration }, easing);
		link.text(lessText).addClass('open').removeClass('closed');
    	link.unbind('click', openSlider);
		link.bind('click', closeSlider);
	}

	var closeSlider = function() {
		link = $(this);
    	link.prev('.entry-info').animate({'height': closeHeight}, {duration: duration }, easing);
		link.text(moreText).addClass('closed').removeClass('open');
		link.unbind('click');
		link.bind('click', openSlider);
	}
  
  	// Attach link click functionality
	$('.more-link').bind('click', openSlider);
  


	
});
