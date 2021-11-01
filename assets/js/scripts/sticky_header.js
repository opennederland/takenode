import $ from "jquery";

export function sticky_header() {
	
	var didScroll;
	var lastScrollTop = 0;
	var delta = 0;
	var navbarHeight = 1;
	
	$(window).scroll(function(){
		didScroll = true;
	});
	
	setInterval(function() {
	  if (didScroll) {
	      hasScrolled();
	      didScroll = false;
	  }
	}, 250);
	
	function hasScrolled() {
    var st = window.pageYOffset || document.documentElement.scrollTop;

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('header').removeClass('nav-down').addClass('nav-up');
    } else {
  		if (st < navbarHeight) {
      	if (st === 0 || st < 0) {
        	$('header').css('position', 'absolute');
        }
      } else {
      	$('header').css('position', 'fixed');
      }
      // Scroll Up
			if ( st < navbarHeight ) {
		    $('header').removeClass('nav-up').removeClass('nav-down');
	    } else if(st + $(window).height() < $(document).height()) {
        $('header').removeClass('nav-up').addClass('nav-down');
      }
    } 
    lastScrollTop = st;
	}
}