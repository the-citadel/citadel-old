jQuery(document).ready(function($) {

	// Pushes footer to bottom of page if content is short
	function footerPosition() {
		var headerHeight = $('#main-header').height(),
			pageHeight = $('#page').height(),
			footerHeight = $('#footer').height(),
			windowHeight = $(window).height(),
			mainHeight = windowHeight - (headerHeight + footerHeight) - 7;

			if (pageHeight >= mainHeight) {
				$('#page').css('min-height', '');
			} else {
				$('#page').css('min-height', mainHeight);
			}
			

	}

	// Hides dropdown menus on hover out
	function dropdownMenus() {
		if ($('.mobile').is(':hidden')) {
			$('#primary.menu > li').hover(
				function() {
					$(this).addClass('hover');
				},

				function() {
					$(this).removeClass('hover');
					if ($(this).hasClass('menu-item-has-children')) {
						$(this).find('> .sub-menu').hide();
					}
				}
			);
		}
	}

	//Set tools height
	function toolMenu() {
		var headingHeight = $('#citadel-heading').outerHeight();

		if ($('.mobile').is(':hidden')) {
			$('#tools').css('height', headingHeight);
			$('#tools').hover(
				function() {
					$(this).addClass('hover');
				},

				function() {
					$(this).removeClass('hover').hide();
				}
			);
		} else {
			$('#tools').css('height', '');
		}
	}

	// Adds overflow scroll for large tables
	function tableOverflow() {
		$('table').each(function() {
			if ($(this).width() > $('#main-content').width()) {
				$(this).wrap('<div class="table-overflow"></div>')
			}
		});
	}

	// Sets minimum height for content based on sidebar
	function mainContentHeight() {
		if (($('#left-sidebar').length) && $('.mobile').is(':hidden')) {
			var sidebarHeight = $('#left-sidebar').outerHeight(true);
			$('#main-content').css('min-height', sidebarHeight);
		}
	}

	// Adds/removes active class for homepage classifications
	function homeClassifications() {
		$('#home-journey .classification').hover(
			function() {
				if ( !($(this).hasClass('active')) ) {
					$('#home-journey .classification.active').removeClass('active');
					$(this).addClass('active');
				}
			},

			function() {
				$('#home-journey .classification.active').removeClass('active');
			}
		);

		$('#home-journey .classification a').focus(function() {
			if ( !($(this).parent().hasClass('active')) ) {
				$('#home-journey .classification.active').removeClass('active');
				$(this).parent().addClass('active');
			}
		});
	}

	// Evenly spaces items
	function evenWidth(e) {
		var n = $(e).length,
			width = 100 / n;

		$(e).css('width', width + '%');
	}

	evenWidth('#home-ctas a');
	evenWidth('#primary-nav > ul > li');
	evenWidth('.widget_citadel_spotlight_widget');

	$('#primary-nav .sub-menu').each(function() {
		var n = $(this).find('> .nav-title').length,
			width = 100 / n;

		$(this).find('> .nav-title').css('width', width + '%');
	});

	$('#primary-nav > ul > li > .sub-menu').each(function() {
		if (!($(this).find('.sub-menu').length)) {
			$(this).parent().addClass('single');
		}
	});

	// Shows sub menu of primary nav item and hides other sub menus
	$('#primary.menu > .menu-item-has-children > a').click(function(e) {
			e.preventDefault();
			if ($('#primary.menu > .menu-item-has-children > a').not(this).next('.sub-menu').is(':visible') && $('.mobile').is(':hidden')) {
				$('#primary.menu > .menu-item-has-children > a').not(this).next('.sub-menu').hide();
			}
			
			$(this).next('.sub-menu').stop().slideToggle(500);
	});

	// Adds dropdown arrow to primary nav items if they have a sub menu
	$('#primary.menu > .menu-item-has-children > a').each(function() {
		$(this).append('<i class="fas fa-angle-down"></i>');
	});

	// Mobile menu button functionality
	$('#mobile-buttons .mobile-menu').click(function(e) {
		e.preventDefault();
		$('nav').stop().slideToggle(500);
		$(this).toggleClass('active');
		$(this).children().toggleClass('fa-bars fa-times');

		if ($('#mobile-buttons .mobile-search').hasClass('active')) {
			$('#mobile-search form').stop().slideUp(250);
			$('#mobile-buttons .mobile-search').removeClass('active');
			$('#mobile-buttons .mobile-search .fa-times').removeClass('fa-times').addClass('fa-search');
		}
	});

	// Mobile search button functionality
	$('#mobile-buttons .mobile-search').click(function(e) {
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).children().toggleClass('fa-search fa-times');
		$('#mobile-search form').stop().slideToggle(250);
		$('#mobile-search input').focus();
		
		if ($('#mobile-buttons .mobile-menu').hasClass('active')) {
			$('nav').stop().slideUp(500);
			$('#mobile-buttons .mobile-menu').removeClass('active');
			$('#mobile-buttons .mobile-menu .fa-times').removeClass('fa-times').addClass('fa-bars');
		}
	});

	// Hides visible menu extras if page is clicked
	$('#page').click(function() {
		if ($('.mobile').is(':visible')) {
			if ($('.mobile-search').hasClass('active')) {
				$('#mobile-search form').stop().slideUp(250);
				$('.mobile-search').removeClass('active');
				$('.mobile-search').children().toggleClass('fa-search fa-times');
			} else if ($('.mobile-menu').hasClass('active')) {
				$('nav').stop().slideUp(500);
				$('.mobile-menu').removeClass('active');
				$('.mobile-menu').children().toggleClass('fa-bars fa-times');
			}
		} else {
			$('#tools').hide();
			if ($('#primary > li > .sub-menu').is(':visible')) {
				$('#primary > li > .sub-menu:visible').hide();
			}
		}
	});

	// Adds menu icon to sidebars with navigation menus for mobile
	$('.sidebar .widget_nav_menu .widgettitle').each(function() {
		var titleText = $(this).text();
		$(this).html('<a href="#"><i class="fas fa-bars"></i>' + titleText + '</a>');
	});

	// Toggle show/hide sidebar menus on mobile
	$('.sidebar .widget_nav_menu .widgettitle a').click(function(e) {
		if ($('.mobile').is(':visible')) {
			e.preventDefault();
			$(this).parent().next().stop().slideToggle(500);
		}
	});

	// Sidebar sub menu add arrow icon and show sub menu if it or parent is active
	// $('.sidebar .widget_nav_menu .menu-item-has-children').each(function() {
	// 	$(this).prepend('<a href="#" class="sub-nav-toggle"><i class="fas fa-angle-down fa-fw"></i></a>');
	// 	if (($(this).hasClass('current_page_parent')) || ($(this).hasClass('current-menu-item'))) {
	// 		$(this).children('.sub-nav-toggle').addClass('active');
	// 	}
	// });

	// Sidebar sub menu toggle show/hide
	$('.sidebar .widget_nav_menu .sub-nav-toggle').click(function(e) {
		e.preventDefault();
		$(this).toggleClass('active')
		$(this).siblings('.sub-menu').stop().slideToggle(500);
	})

	// Toggle Tools
	$('.tools-toggle').click(function(e) {
		e.preventDefault();
		$('#tools').stop().slideToggle(500);
	});

	// Add arrow to current page menu item
	$('.sidebar .widget_nav_menu .current_page_item a, .sidebar .widget_nav_menu .current-page-ancestor a').append('<i class="fas fa-angle-right"></i>');

	//Search functionality
	function listingHeight() {
		var windowHeight = $(window).height(),
			searchHeight = $('#search-overlay .search-form').outerHeight(),
			finalHeight = windowHeight - searchHeight,
			listHeight = $('#site-list').outerHeight();

			console.log(windowHeight + ', ' + searchHeight + ', ' + finalHeight + ', ' + listHeight);

		if (finalHeight < $('#site-list').outerHeight()) {
			$('#site-list').css('overflow-y', 'scroll');
		} else {
			$('#site-list').css('overflow-y', '');
		}

		$('#site-list').css('max-height', finalHeight);
	}

	function filterListing($term) {

		$('#site-list li').each(function() {
			var value = $(this).text(),
				lowerTerm = $term.toLowerCase();

			if (!$('#search-overlay .search-field').val()){
				$('#site-list').hide();
			} else {
				if (!$('#site-list').is(':visible')) {
					$('#site-list').fadeIn(500);
				}
			}

			if (!(value.toLowerCase().indexOf(lowerTerm) >= 0)) { // If term does NOT match
				$(this).removeClass('visible').addClass('hidden');
			} else { // If term does match
				$(this).removeClass('hidden').addClass('visible');
			}
		});

		var error = 'Press enter to search the site...';

		if (!($('#site-list li.visible').length > 0)) {
			if ($('#site-list .error').length) {
				$('#site-list .error').show();
			} else {
				$('#site-list').append('<li class="error">' + error  + '</li>');
			}
		} else {
			$('#site-list .error').hide();
		}
	}

	$('#search-toggle').click(function() {
		$('body').addClass('noScroll');
		$('#search-overlay').fadeIn(500);
		$('#search-overlay .search-field').focus();
	});

	$('#search-close').click(function() {
		$('body').removeClass('noScroll');
		$('#search-overlay').fadeOut(500);
		$('#search-overlay .search-field').focusout().val('');
		$('#search-overlay .search-form').removeClass('active');
		$('#site-list').hide();
	});

	$('#search-overlay .search-field').keyup(function() {
		var entry = $(this).val();
		$('#search-overlay .search-form').addClass('active');
		filterListing(entry);
	});

	// Mobile Functions
	function mobileFunctions() {
		if ($('.mobile').is(':visible')) {

		} else {
			$('.sidebar .widget_nav_menu .menu, #primary-nav').css('display','');

		}
	}
	
	// Functions to call on page load
	mainContentHeight();
	dropdownMenus();
	toolMenu();
	tableOverflow();
	mobileFunctions();
	homeClassifications();
	listingHeight();
	footerPosition();

	//Functions to call when window is resized
	jQuery(window).resize(function($) {
		mainContentHeight();
		dropdownMenus();
		toolMenu();
		tableOverflow();
		mobileFunctions();
		listingHeight();
		footerPosition();
	});

	//Functions to call when window is scrolled
	jQuery(window).scroll(function($) {
		
	});
	
});