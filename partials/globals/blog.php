<?php
/**
 * 
 * Partial Name: blog
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$enable = get_field('enable_blog_by_category');
$cat = get_field('blog_category');
if($enable === true){
    $blog = new WP_Query(array('post_type'=>'blogs', 'blog_cat' => $cat->slug, 'post_status'=>'publish', 'posts_per_page'=>3,'orderby' => 'rand'));
}else{
    $blog = new WP_Query(array('post_type'=>'blogs','post_status'=>'publish', 'posts_per_page'=>3,'order'=>'DESC'));
}
if($blog->have_posts()):
?>
<section class="blog-partial-b939b9">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= get_field('blog_partial_title', 'option'); ?></h2>
                <p class="description"><?= get_field('blog_description', 'option'); ?></p>
                <div class="blog-slide owl-carousel">
                    <?php while($blog->have_posts()): $blog->the_post(); ?>
                        <div class="item">
                            <div class="card-post">
                                <div class="image-contain">
                                    <img src="<?= get_the_post_thumbnail_url($blog->ID); ?>" alt="<?= the_title($blog->ID); ?>">
                                </div>
                                <div class="body-card">
                                    <h4 class="post-name"><?= the_title($blog->ID); ?></h4>
                                    <p class="short-description"><?= get_field('short_description', $blog->ID); ?></p>
                                    <a href="<?= get_field('hubspot_link', $blog->ID); ?>" class="cta-card" target="_blank">
                                        <span><?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?></span>
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.71875 14.0484L12.1722 10.595L8.71875 7.1416" stroke="#1A1728" stroke-width="1.88368" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
    <svg class="svg-desktop" width="312" height="75" viewBox="0 0 312 75" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M311.44 6.2288C311.44 9.66887 314.229 12.4576 317.669 12.4576C321.109 12.4576 323.897 9.66887 323.897 6.2288C323.897 2.78873 321.109 -1.21899e-07 317.669 -2.72269e-07C314.229 -4.2264e-07 311.44 2.78873 311.44 6.2288ZM249.152 6.22879C249.152 9.66886 251.941 12.4576 255.381 12.4576C258.821 12.4576 261.609 9.66886 261.609 6.22879C261.609 2.78872 258.821 -2.84459e-06 255.381 -2.99496e-06C251.941 -3.14533e-06 249.152 2.78872 249.152 6.22879ZM193.093 12.4576C189.653 12.4576 186.864 9.66886 186.864 6.22879C186.864 2.78872 189.653 -5.86803e-06 193.093 -5.71766e-06C196.533 -5.56729e-06 199.322 2.78872 199.322 6.22879C199.322 9.66886 196.533 12.4576 193.093 12.4576ZM124.576 6.22879C124.576 9.66886 127.365 12.4576 130.805 12.4576C134.245 12.4576 137.034 9.66886 137.034 6.22879C137.034 2.78872 134.245 -8.28998e-06 130.805 -8.44035e-06C127.365 -8.59072e-06 124.576 2.78872 124.576 6.22879ZM68.5168 12.4576C65.0768 12.4576 62.288 9.66885 62.288 6.22879C62.288 2.78872 65.0768 -1.13134e-05 68.5168 -1.1163e-05C71.9569 -1.10127e-05 74.7456 2.78872 74.7456 6.22879C74.7456 9.66886 71.9569 12.4576 68.5168 12.4576ZM6.07629e-05 6.22878C6.06125e-05 9.66885 2.78879 12.4576 6.22885 12.4576C9.66891 12.4576 12.4576 9.66885 12.4576 6.22878C12.4576 2.78871 9.66891 -1.37354e-05 6.22885 -1.38857e-05C2.78879 -1.40361e-05 6.09133e-05 2.78871 6.07629e-05 6.22878ZM317.669 74.7456C314.229 74.7456 311.44 71.9568 311.44 68.5168C311.44 65.0767 314.229 62.288 317.669 62.288C321.109 62.288 323.897 65.0767 323.897 68.5168C323.897 71.9568 321.109 74.7456 317.669 74.7456ZM249.152 68.5168C249.152 71.9568 251.941 74.7456 255.381 74.7456C258.821 74.7456 261.609 71.9568 261.609 68.5168C261.609 65.0767 258.821 62.288 255.381 62.288C251.941 62.288 249.152 65.0767 249.152 68.5168ZM193.093 74.7456C189.653 74.7456 186.864 71.9568 186.864 68.5168C186.864 65.0767 189.653 62.288 193.093 62.288C196.533 62.288 199.322 65.0767 199.322 68.5168C199.322 71.9568 196.533 74.7456 193.093 74.7456ZM124.576 68.5168C124.576 71.9568 127.365 74.7456 130.805 74.7456C134.245 74.7456 137.034 71.9568 137.034 68.5168C137.034 65.0767 134.245 62.288 130.805 62.288C127.365 62.288 124.576 65.0767 124.576 68.5168ZM68.5168 74.7455C65.0767 74.7455 62.288 71.9568 62.288 68.5168C62.288 65.0767 65.0767 62.288 68.5168 62.288C71.9569 62.288 74.7456 65.0767 74.7456 68.5168C74.7456 71.9568 71.9569 74.7455 68.5168 74.7455ZM5.80402e-05 68.5167C5.78898e-05 71.9568 2.78878 74.7455 6.22885 74.7455C9.66891 74.7455 12.4576 71.9568 12.4576 68.5167C12.4576 65.0767 9.66891 62.288 6.22885 62.288C2.78879 62.288 5.81906e-05 65.0767 5.80402e-05 68.5167Z" fill="#BDB6FF" fill-opacity="0.39"/>
    </svg>
</section>
<script>
    $('.blog-slide').owlCarousel({
        autoplay:false,
        loop:false,
        nav:false,
        dots:false,
        margin:50,
        responsive:{
            0:{
                items:1.2,
                dots:true,
                center:true,
                margin:20
            },
            768:{
                items:2,
                margin:20
            },
            991:{
                items:3
            }
        }
    }).css({'opacity':1});
</script>
<?php endif; ?>
