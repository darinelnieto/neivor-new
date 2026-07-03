<?php
/**
 * 
 * Partial Name: fqas
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$faq = new WP_Query(array('post_type' => 'fqas_post', 'post_status' => 'publish', 'post_per_page' => -1, 'orderby' => 'title'));
if($faq->have_posts()):
?>
<section class="fqas-partial-e0759f">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    <?php if(get_bloginfo("language") == "en-US"): ?>
                        Frequently asked questions
                    <?php else: ?>
                        Preguntas frecuentes
                    <?php endif; ?>
                </h2>
                <div class="faqs-contain">
                    <?php while($faq->have_posts()): $faq->the_post(); ?>
                        <div class="this-faq">
                            <div class="question">
                                <h3><?= the_title($faq->ID); ?></h3>
                                <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.83468 9.81603C8.7215 9.81741 8.60928 9.79508 8.50524 9.75049C8.40119 9.70591 8.30764 9.64004 8.23058 9.55712L0.463493 1.79004C0.118289 1.44484 0.118289 0.909771 0.463493 0.564567C0.808696 0.219363 1.34376 0.219363 1.68897 0.564567L8.85194 7.72754L15.9977 0.581827C16.3429 0.236623 16.8779 0.236623 17.2231 0.581827C17.5683 0.927031 17.5683 1.4621 17.2231 1.8073L9.45605 9.57438C9.28345 9.74699 9.05907 9.83329 8.85194 9.83329L8.83468 9.81603Z" fill="#0A2540"/>
                                </svg>
                            </div>
                            <div class="answer">
                                <?= the_content($faq->ID); ?>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>             
