   
<?php
/**
 * 
 * Partial Name: single_blog_content_table
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$link_class = sanitize_text_field( get_sub_field( 'link_class' ) ?? '' );
?>
<section class="single-blog-content-table-partial-b93a11" data-link-class="<?= esc_attr( $link_class ); ?>" aria-label="Tabla de contenido">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="toc-card">
                    <h2 class="toc-title h4">Tabla de contenido</h2>
                    <ul class="toc-list" data-toc-list></ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
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
            '#flexible-builder-template h2, #flexible-builder-template h3'
        ];

        var maxAttempts = 12;
        var retryDelay = 150;
        var hasBuilt = false;

        function findHeadings() {
            var headings = [];

            for (var i = 0; i < headingSelectors.length; i += 1) {
                var candidates = Array.prototype.slice.call(document.querySelectorAll(headingSelectors[i]))
                    .filter(function (heading) {
                        if (tocSection.contains(heading)) {
                            return false;
                        }

                        var text = heading.textContent.trim();
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

        var usedIds = {};

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

        function buildToc(headings) {
            if (hasBuilt) {
                return;
            }

            hasBuilt = true;
            tocList.innerHTML = '';

            headings.forEach(function (heading) {
                var text = heading.textContent.trim();
                var displayText = text.length > 80 ? text.substring(0, 80) + '...' : text;
                var headingId = heading.id ? heading.id : getUniqueId(slugify(text));

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
</script>
                    