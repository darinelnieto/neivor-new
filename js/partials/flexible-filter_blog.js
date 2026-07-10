(function ($) {
	'use strict';

	var root = $('.flexible-filter-blog-5d8e91');
	if (!root.length) {
		return;
	}

	root.on('click', '.open-filter', function () {
		var item = $(this).closest('.filter-item');
		root.find('.filter-item').not(item).removeClass('show');
		item.toggleClass('show');
	});

	root.on('click', '.this-option', function (event) {
		if ($(this).hasClass('this-option--noop')) {
			event.preventDefault();
		}

		$(this).closest('.filter-item').removeClass('show');
	});

	$(document).on('click', function (event) {
		if (!$(event.target).closest('.flexible-filter-blog-5d8e91 .filter-item').length) {
			root.find('.filter-item').removeClass('show');
		}
	});
})(jQuery);
