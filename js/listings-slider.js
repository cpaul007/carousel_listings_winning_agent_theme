jQuery(document).ready(function($) {
  var settings = function() {
			var settings1 = {
				easing: 'swing',
        slideSelector: '.slides',
        auto: true,
        minSlides: 1,
        maxSlides: 2,
        moveSlides: 1,
        slideWidth: ( ( $('.eaplw-widget').width() - 10 ) / 2 ),
        slideMargin: 10,
        speed: 1850,
        pager: false
			};
      
      var settings2 = {
				easing: 'swing',
        slideSelector: '.slides',
        auto: true,
        minSlides: 1,
        maxSlides: 1,
        moveSlides: 1,
        slideWidth: $('.eaplw-widget').width(),
        slideMargin: 0,
        speed: 1850,
        pager: false
			};
      
			var settings3 = {
				easing: 'swing',
        slideSelector: '.slides',
        auto: false,
        minSlides: 3,
        maxSlides: 6,
        moveSlides: 1,
        slideWidth: 340,
        slideMargin: 58,
        speed: 1850,
        pager: false
			};
      
			return ( $(window).width() < 680 ) ? ( ( $(window).width() < 420 ) ? settings2 : settings1 ) : settings3;
		}
    
    var apSlider;
    apSlider = $('.eaplw-listings').bxSlider(settings());
    
    function apListingSlider() {
			apSlider.reloadSlider(settings());
		}
		$(window).resize(apListingSlider);
});
