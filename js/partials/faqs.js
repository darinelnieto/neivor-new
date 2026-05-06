document.addEventListener('DOMContentLoaded', function () {
	var MOBILE_BREAKPOINT = 768;
	var sections = document.querySelectorAll('.flexible-faqs-partial-ed7c1c');

	if (!sections.length) {
		return;
	}

	function isMobile() {
		return window.innerWidth <= MOBILE_BREAKPOINT;
	}

	function showAnswer(answer) {
		answer.style.display = 'block';
	}

	function hideAnswer(answer) {
		answer.style.display = 'none';
	}

	function setInitialState() {
		sections.forEach(function (section) {
			var items = section.querySelectorAll('.faq-item');

			items.forEach(function (item) {
				var question = item.querySelector('.faq-question');
				var answer = item.querySelector('.faq-answer');

				if (!question || !answer) {
					return;
				}

				if (isMobile()) {
					hideAnswer(answer);
					item.classList.remove('is-open');
					question.style.cursor = 'pointer';
					question.setAttribute('aria-expanded', 'false');
				} else {
					showAnswer(answer);
					item.classList.remove('is-open');
					question.style.cursor = '';
					question.setAttribute('aria-expanded', 'true');
				}
			});
		});
	}

	sections.forEach(function (section) {
		section.addEventListener('click', function (event) {
			if (!isMobile()) {
				return;
			}

			var question = event.target.closest('.faq-question');

			if (!question || !section.contains(question)) {
				return;
			}

			var item = question.closest('.faq-item');
			var answer = item ? item.querySelector('.faq-answer') : null;

			if (!item || !answer) {
				return;
			}

			var isOpen = item.classList.contains('is-open');

			if (isOpen) {
				hideAnswer(answer);
				item.classList.remove('is-open');
				question.setAttribute('aria-expanded', 'false');
				return;
			}

			item.classList.add('is-open');
			showAnswer(answer);
			question.setAttribute('aria-expanded', 'true');
		});
	});

	setInitialState();
	window.addEventListener('resize', setInitialState);
});
