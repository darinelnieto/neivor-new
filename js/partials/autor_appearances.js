(function ($) {
	'use strict';

	var $appearancesList = $('#appearances-list');
	if (!$appearancesList.length) {
		return;
	}

	var mobileMedia = window.matchMedia('(max-width: 767px)');

	function initCarousel() {
		if ($appearancesList.hasClass('owl-loaded')) {
			return;
		}

		$appearancesList.addClass('owl-carousel').owlCarousel({
			items: 1,
			margin: 16,
			loop: true,
			nav: false,
			dots: true,
			autoplay: true,
			smartSpeed: 300,
			lazyLoad: true,
			responsive: {
				0: {
					items: 1
				},
				576: {
					items: 2
				}
			}
		});
	}

	function destroyCarousel() {
		if (!$appearancesList.hasClass('owl-loaded')) {
			return;
		}

		$appearancesList.trigger('destroy.owl.carousel');
		$appearancesList.removeClass('owl-carousel owl-loaded');
		$appearancesList.find('.owl-stage-outer').children().unwrap();
		$appearancesList.find('.owl-stage').children().unwrap();
		$appearancesList.find('.owl-item').children().unwrap();
	}

	function handleAppearanceCarousel() {
		if (mobileMedia.matches) {
			initCarousel();
		} else {
			destroyCarousel();
		}
	}

	handleAppearanceCarousel();

	if (typeof mobileMedia.addEventListener === 'function') {
		mobileMedia.addEventListener('change', handleAppearanceCarousel);
	} else if (typeof mobileMedia.addListener === 'function') {
		mobileMedia.addListener(handleAppearanceCarousel);
	}
})(jQuery);
