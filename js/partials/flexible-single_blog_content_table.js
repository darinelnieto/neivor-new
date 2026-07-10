(function () {
	var tocSection = document.querySelector('.single-blog-content-table-partial-b93a11');
	if (!tocSection) {
		return;
	}

	var tocList = tocSection.querySelector('[data-toc-list]');
	if (!tocList) {
		return;
	}

	var linkClass = (tocSection.dataset.linkClass || '').trim();
	var headingSelectors = [
		'#flexible-builder-template h2, #flexible-builder-template h3, #flexible-builder-template h4'
	];
	var maxAttempts = 12;
	var retryDelay = 150;
	var hasBuilt = false;
	var usedIds = {};

	function normalizeSpaces(text) {
		return (text || '').replace(/\s+/g, ' ').trim();
	}

	function getHeadingText(heading) {
		var clone = heading.cloneNode(true);
		var imagesWithAlt = clone.querySelectorAll('img[alt]');

		imagesWithAlt.forEach(function (img) {
			var replacement = document.createTextNode(' ' + (img.getAttribute('alt') || '') + ' ');
			img.parentNode.replaceChild(replacement, img);
		});

		return normalizeSpaces(clone.textContent);
	}

	function truncateText(text, maxLength) {
		var chars = Array.from(text || '');
		if (chars.length <= maxLength) {
			return text;
		}

		return chars.slice(0, maxLength).join('') + '...';
	}

	function slugify(text) {
		return text
			.toLowerCase()
			.normalize('NFD')
			.replace(/[\u0300-\u036f]/g, '')
			.replace(/[^a-z0-9\s-]/g, '')
			.trim()
			.replace(/\s+/g, '-')
			.replace(/-+/g, '-');
	}

	function getUniqueId(baseId) {
		var cleanBase = baseId || 'seccion';
		if (!usedIds[cleanBase] && !document.getElementById(cleanBase)) {
			usedIds[cleanBase] = 1;
			return cleanBase;
		}

		var count = usedIds[cleanBase] || 1;
		var candidate = cleanBase + '-' + count;

		while (document.getElementById(candidate)) {
			count += 1;
			candidate = cleanBase + '-' + count;
		}

		usedIds[cleanBase] = count + 1;
		return candidate;
	}

	function findHeadings() {
		var headings = [];

		for (var i = 0; i < headingSelectors.length; i += 1) {
			var candidates = Array.prototype.slice.call(document.querySelectorAll(headingSelectors[i]))
				.filter(function (heading) {
					if (tocSection.contains(heading)) {
						return false;
					}

					var text = getHeadingText(heading);
					if (text.length === 0) {
						return false;
					}

					var parent = heading.parentElement;
					while (parent && parent !== document.body) {
						var className = parent.className || '';
						if (className.indexOf('banner') !== -1 || className.indexOf('hero') !== -1) {
							return false;
						}
						parent = parent.parentElement;
					}

					return true;
				});

			headings = candidates;
			if (headings.length > 0) {
				break;
			}
		}

		return headings;
	}

	function buildToc(headings) {
		if (hasBuilt) {
			return;
		}

		hasBuilt = true;
		tocList.innerHTML = '';
		var currentH2Item = null;
		var currentH3Item = null;

		function ensureSublist(parentItem, levelClass) {
			if (!parentItem) {
				return tocList;
			}

			var selector = ':scope > .toc-sublist.' + levelClass;
			var sublist = parentItem.querySelector(selector);
			if (!sublist) {
				sublist = document.createElement('ul');
				sublist.className = 'toc-sublist ' + levelClass;
				parentItem.appendChild(sublist);
			}

			return sublist;
		}

		headings.forEach(function (heading) {
			var text = getHeadingText(heading);
			var displayText = truncateText(text, 80);
			var headingId = heading.id ? heading.id : getUniqueId(slugify(text));
			var level = parseInt(heading.tagName.slice(1), 10);

			heading.id = headingId;
			heading.style.scrollMarginTop = '120px';

			var li = document.createElement('li');
			li.className = 'toc-item toc-item--' + heading.tagName.toLowerCase();

			var link = document.createElement('a');
			link.className = linkClass ? 'toc-item-link ' + linkClass : 'toc-item-link';
			link.href = '#' + headingId;
			link.textContent = displayText;
			link.title = text;

			link.addEventListener('click', function (event) {
				event.preventDefault();

				var target = document.getElementById(this.getAttribute('href').slice(1));
				if (!target) {
					return;
				}

				target.scrollIntoView({
					behavior: 'smooth',
					block: 'start'
				});

				if (window.history && typeof window.history.replaceState === 'function') {
					window.history.replaceState(null, '', this.getAttribute('href'));
				}
			});

			li.appendChild(link);

			if (level === 2) {
				tocList.appendChild(li);
				currentH2Item = li;
				currentH3Item = null;
				return;
			}

			if (level === 3) {
				ensureSublist(currentH2Item, 'toc-sublist--h3').appendChild(li);
				currentH3Item = li;
				return;
			}

			if (level === 4) {
				var targetParent = currentH3Item || currentH2Item;
				ensureSublist(targetParent, 'toc-sublist--h4').appendChild(li);
				return;
			}

			tocList.appendChild(li);
		});
	}

	function tryBuild(attempt) {
		if (hasBuilt) {
			return;
		}

		var headings = findHeadings();
		if (headings.length > 0) {
			buildToc(headings);
			return;
		}

		if (attempt >= maxAttempts) {
			tocSection.style.display = 'none';
			return;
		}

		window.setTimeout(function () {
			tryBuild(attempt + 1);
		}, retryDelay);
	}

	if (document.readyState === 'loading') {
		document.addEventListener('DOMContentLoaded', function () {
			tryBuild(1);
		});
		window.addEventListener('load', function () {
			tryBuild(1);
		});
		return;
	}

	tryBuild(1);
}());
