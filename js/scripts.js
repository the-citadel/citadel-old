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

	$('.menu-toggle').click(function() {
		$(this).toggleClass('active');
		$('.main-nav').stop().slideToggle(500);
	});

	$('.has-submenu .primary').click(function(e) {
		e.preventDefault();
		$('+ .submenu', this).toggleClass('active').stop().slideToggle(500);
	});

});