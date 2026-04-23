   
<?php
/**
 * 
 * Partial Name: comprehensive-protection
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_field('enable_comprehensive_protection')):
    $protection = get_field('comprehensive_protection');
?>
<section class="comprehensive-protection-partial-ef20c2">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-0 mb-md-4">
                <div class="logo-contain">
                    <img src="<?= $protection['logo']['url']; ?>" alt="<?= $protection['logo']['title']; ?>" class="d-none d-md-block">
                    <img src="<?= $protection['logos_movil']['url']; ?>" alt="<?= $protection['logos_movil']['title']; ?>" class="d-block d-md-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.662 26.1673H5.61343C4.70939 26.1673 3.9767 25.4346 3.9767 24.5305V20.4803C3.9767 20.0463 3.80373 19.6301 3.49694 19.3234L0.633079 16.4595C-0.0065991 15.8198 -0.0065991 14.7836 0.633079 14.1456L3.52631 11.2523C3.81515 10.9635 3.9767 10.5735 3.9767 10.1655V6.07778C3.9767 5.17375 4.70939 4.44106 5.61343 4.44106H9.66363C10.0977 4.44106 10.5138 4.26808 10.8206 3.9613L13.6845 1.09743C14.3241 0.457756 15.3604 0.457756 15.9984 1.09743L18.8623 3.9613C19.169 4.26808 19.5852 4.44106 20.0192 4.44106H24.0694C24.9735 4.44106 25.7062 5.17375 25.7062 6.07778V10.128C25.7062 10.5621 25.8791 10.9782 26.1859 11.285L29.0498 14.1488C29.6895 14.7885 29.6895 15.8247 29.0498 16.4628L26.1859 19.3266C25.8791 19.6334 25.7062 20.0495 25.7062 20.4836V24.5338C25.7062 25.4378 24.9735 26.1705 24.0694 26.1705H20.0192C19.5852 26.1705 19.169 26.3435 18.8623 26.6503L15.9984 29.5141C15.3587 30.1538 14.3225 30.1538 13.6845 29.5141L10.8206 26.6503C10.5122 26.3386 10.0961 26.1673 9.662 26.1673Z" fill="#0EC564"/>
                        <path d="M19.7353 12.8555L13.616 18.9748L9.94434 15.3032" stroke="white" stroke-width="2.44775" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="title-and-introduction-contain">
                    <h2 class="title"><?= $protection['title']; ?></h2>
                    <p class="intro"><?= $protection['description']; ?></p>
                </div>
            </div>
        </div>
        <div class="row items">
            <?php if($protection['list_items']): foreach($protection['list_items'] as $item): ?>
                <div class="col-12 col-md-6 mb-3 mb-mb-5">
                    <a href="<?= get_field('post_url', $item['comprehensive_protection_item']->ID); ?>" target="_blank">
                        <div class="card-post">
                            <div class="image-contain">
                                <img src="<?= get_the_post_thumbnail_url($item['comprehensive_protection_item']->ID); ?>" alt="<?= get_the_title($item['comprehensive_protection_item']->ID); ?>" class="feature-image">
                                <span class="icon">
                                    <img src="<?= get_field('icon', $item['comprehensive_protection_item']->ID)['url']; ?>" alt="<?= get_field('icon', $item['comprehensive_protection_item']->ID)['title']; ?>">
                                </span>
                            </div>
                            <div class="text-contain">
                                <p class="name"><?= get_the_title($item['comprehensive_protection_item']->ID); ?></p>
                                <p class="description"><?= get_field('short_description', $item['comprehensive_protection_item']->ID); ?></p>
                                <div class="cta">
                                    <span class="d-none d-md-block"><?php if(get_bloginfo("language") == "en-US"): ?>See more<?php else: ?>Ver más<?php endif; ?></span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                        <path d="M6.58984 11.2658L9.18955 8.66611L6.58984 6.06641" stroke="black" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.58984 11.2658L9.18955 8.66611L6.58984 6.06641" stroke="#7B61FF" stroke-opacity="0.11" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.58984 11.2658L9.18955 8.66611L6.58984 6.06641" stroke="white" stroke-opacity="0.05" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php  endforeach; endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if($protection['cta_start_free']): ?>
                    <a href="<?= $protection['cta_start_free']['url']; ?>" target="<?= $protection['cta_start_free']['target']; ?>" class="cta-start-free">
                        <span><?= $protection['cta_start_free']['title']; ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                            <path d="M6.91724 11.175L9.51694 8.57529L6.91724 5.97559" stroke="white" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                <?php
                    endif;
                    if($protection['get_advicedemo']):
                ?>
                    <a href="<?= $protection['get_advicedemo']['url']; ?>" target="<?= $protection['get_advicedemo']['target']; ?>" class="get-advice">
                        <span><?= $protection['get_advicedemo']['title']; ?></span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.74561 10.487L9.34531 7.8873L6.74561 5.2876" stroke="#000000" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>           