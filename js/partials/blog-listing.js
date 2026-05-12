$(document).ready(function () {
    let currentPage = 1;
    let totalPages = 1;
    let currentView = 'grid';
    const isMobile = $(window).width() < 576;
    const postsPerPage = isMobile ? 3 : 6;

    const blogCat = $('.blog-listing-partial-097a45').data('blog-cat') ? $('.blog-listing-partial-097a45').data('blog-cat') : 0;
    const postsContainer = $('.blog-listing-partial-097a45 .posts-container');
    const loadMoreBtn = $('.blog-listing-partial-097a45 .load-more-btn');
    const viewButtons = $('.blog-listing-partial-097a45 .option button');

    // Initial load
    loadPosts(1);

    // Load more button click
    loadMoreBtn.on('click', function (e) {
        e.preventDefault();
        if (currentPage < totalPages) {
            currentPage++;
            loadPosts(currentPage);
        }
    });

    // View change buttons
    viewButtons.on('click', function (e) {
        e.preventDefault();
        const newView = $(this).data('view');

        if (newView && newView !== currentView) {
            currentView = newView;
            postsContainer.removeClass('grid column').addClass(currentView);
            viewButtons.removeClass('active');
            $(this).addClass('active');
        }
    });

    function loadPosts(page) {
        $.ajax({
            url: '/wp-json/blog-listing/posts',
            type: 'GET',
            data: {
                paged: page,
                per_page: postsPerPage,
                blog_cat: blogCat
            },
            success: function (response) {
                totalPages = response.pages;
                renderPosts(response.posts, page);

                if (currentPage >= totalPages) {
                    loadMoreBtn.hide();
                }
            },
            error: function (error) {
                console.error('Error al cargar posts:', error);
            }
        });
    }

    function renderPosts(posts, page) {
        const postsHTML = posts.map(post => `
            <article class="post-item" data-id="${post.id}">
                <a href="${post.permalink}" class="post-link">
                    <div class="post-image">
                        ${post.featured_image}
                    </div>
                    <div class="post-content">
                        <div class="post-meta">
                            ${post.category ? `<span class="category">${post.category}</span>` : ''}
                            <span class="date">${post.date}</span>
                        </div>
                        <h3 class="post-title">${post.title}</h3>
                        <p class="post-excerpt">${post.excerpt}</p>
                        <span class="read-more">LEER MÁS</span>
                    </div>
                </a>
            </article>
        `).join('');

        if (page === 1) {
            postsContainer.html(postsHTML);
        } else {
            postsContainer.append(postsHTML);
        }
    }
});
