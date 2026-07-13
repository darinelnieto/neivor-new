$(document).ready(function() {
	var banner = $('.banner-slide');
	var bannerCount = parseInt(banner.data('banner-count'), 10) || 0;
	banner.owlCarousel({
		autoplay: bannerCount > 1,
		autoplayTimeout: 10000,
		loop: bannerCount > 1,
		nav: false,
		dots: bannerCount > 1,
		margin: 0,
		items: 1,
		touchDrag: bannerCount > 1,
		mouseDrag: bannerCount > 1
	}).css({'opacity': 1});
});
