jQuery(document).ready(function($) {

	function detectIE() {
	    var ua = window.navigator.userAgent;

	    var msie = ua.indexOf('MSIE ');
	    if (msie > 0) {
	        // IE 10 or older => return version number
	        $('body').addClass('ie ie' + parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10) );
	    }

	    var trident = ua.indexOf('Trident/');
	    if (trident > 0 ) {
	        // IE 11 => return version number
	        var rv = ua.indexOf('rv:');
	        $('body').addClass('ie ie' + parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10) ).removeClass('ieNaN');
	    }

	    var edge = ua.indexOf('Edge/');
	    if (edge > 0) {
	       // Edge (IE 12+) => return version number
	       // parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10)
	       $('body').addClass('ie edge' );
	    }
	}

	detectIE();

	function reportIssueUrl() {

		var nVer 			= navigator.appVersion,
			nAgt 			= navigator.userAgent,
			browserName  	= navigator.appName,
			fullVersion  	= ''+parseFloat(navigator.appVersion),
			majorVersion 	= parseInt(navigator.appVersion,10),
			nameOffset,verOffset,ix,
			OSName 			= 'Unknown OS',
			currentUrl      = window.location.href.split('?')[0];
			href			= $('#report-problem').attr('href');

		if ( navigator.appVersion.indexOf( 'Win' ) != -1 ) OSName = 'Windows';
		if ( navigator.appVersion.indexOf( 'Mac' ) != -1 ) OSName = 'MacOS';
		if ( navigator.appVersion.indexOf( 'X11' ) != -1 ) OSName = 'UNIX';
		if ( navigator.appVersion.indexOf( 'Linux' ) != -1 ) OSName = 'Linux';

		// In Opera, the true version is after "Opera" or after "Version"
		if ( ( verOffset = nAgt.indexOf( 'Opera' ) ) != -1 ) {
			browserName = 'Opera';
			fullVersion = nAgt.substring( verOffset + 6 );
			if ( ( verOffset = nAgt.indexOf('Version') ) != -1 ) 
				fullVersion = nAgt.substring( verOffset + 8 );
		}
		// In MSIE, the true version is after "MSIE" in userAgent
		else if ( ( verOffset = nAgt.indexOf( 'MSIE' ) ) != -1) {
			browserName = 'Microsoft Internet Explorer';
			fullVersion = nAgt.substring( verOffset + 5 );
		}
		// In Chrome, the true version is after "Chrome" 
		else if ( ( verOffset = nAgt.indexOf( 'Chrome' ) ) != -1 ) {
			browserName = 'Chrome';
			fullVersion = nAgt.substring( verOffset + 7 );
		}
		// In Safari, the true version is after "Safari" or after "Version" 
		else if ( ( verOffset = nAgt.indexOf( 'Safari' ) ) !=-1 ) {
			browserName = 'Safari';
			fullVersion = nAgt.substring( verOffset + 7 );
			if ( ( verOffset = nAgt.indexOf( 'Version' ) ) != -1 ) 
				fullVersion = nAgt.substring( verOffset + 8 );
		}
		// In Firefox, the true version is after "Firefox" 
		else if ( ( verOffset = nAgt.indexOf( 'Firefox' )) !=-1 ) {
			browserName = 'Firefox';
			fullVersion = nAgt.substring( verOffset + 8 );
		}
		// In most other browsers, "name/version" is at the end of userAgent 
		else if ( ( nameOffset = nAgt.lastIndexOf(' ') + 1 ) < ( verOffset = nAgt.lastIndexOf('/') ) ) {
			browserName = nAgt.substring( nameOffset, verOffset );
			fullVersion = nAgt.substring( verOffset + 1 );
			if ( browserName.toLowerCase() == browserName.toUpperCase() ) {
				browserName = navigator.appName;
			}
		}
		// trim the fullVersion string at semicolon/space if present
		if ( ( ix = fullVersion.indexOf( ';' ) ) != -1 )
			fullVersion = fullVersion.substring( 0, ix );
		if ( ( ix = fullVersion.indexOf( ' ' ) ) != -1 )
			fullVersion = fullVersion.substring( 0, ix );

		majorVersion = parseInt( '' + fullVersion, 10 );
		if ( isNaN( majorVersion ) ) {
			fullVersion  = '' + parseFloat( navigator.appVersion ); 
			majorVersion = parseInt( navigator.appVersion, 10 );
		}

		var reportUrl = href + '?page_url=' + currentUrl + '&os=' + OSName + '&browser=' + browserName + '&majorversion=' + majorVersion + '&fullversion=' + fullVersion + '&appname=' + navigator.appName + '&useragent=' + navigator.userAgent;

		$('#report-problem').attr( 'href', reportUrl );
		
	}

	function mobileMenu() {

		if ( $('#mobile-nav').is(':visible') ) {
			
			var mobileNavHeight = $('#mobile-nav').outerHeight();

			if ( !$('body').hasClass('mobile-nav-visible') ) {
				$('body').css('margin-bottom', mobileNavHeight);
			}

		}

	}

	function slideToggle($clickELement, $targetElement, $visibility) {

		$($clickELement).click(function() {
			$(this).toggleClass('active');
			$($targetElement).stop().slideToggle(400);
		});

		if ( $visibility == 'desktop' ) {

			if ( $('#mobile-nav').is(':hidden') ) {

				$($targetElement).removeAttr('style');

			}

		} else {

			if ( $('#mobile-nav').is(':vibile') ) {

				$($targetElement).removeAttr('style');

			}

		}

	}

	// $('.menu-toggle').click(function() {
	// 	$(this).toggleClass('active');
	// 	$('.main-nav').stop().slideToggle(400);
	// });

	$('.has-submenu .primary').click(function(e) {
		e.preventDefault();
		$('+ .submenu', this).toggleClass('active').stop().slideToggle(400);
	});

	$('.sidebar .menu-item-has-children').each(function() {
		$('> a', this).after('<i class="fas fa-chevron-down"></i>');
	});

	$('.sidebar .menu-item-has-children > i').click(function() {
		$(this).toggleClass('active')
		$(this).next().stop().slideToggle(400);
	});

	var mainHeader = $('.main-header').outerHeight();
	$('#tools').height(mainHeader);

	$('.leftmenu-toggle').click(function() {
		$(this).parent().next().stop().slideToggle(400);
	});

	reportIssueUrl();
	mobileMenu();
	slideToggle('.menu-toggle', '.main-nav', 'desktop');
	slideToggle('.secondary-toggle', '.secondary-nav', 'desktop');
	slideToggle('.search-toggle', '#search', 'desktop');
	slideToggle('.tools-toggle', '#tools', 'desktop');

	jQuery(window).scroll(function($) {
		
	});

	jQuery(window).resize(function($) {

		mobileMenu();

	});

});