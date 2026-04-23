   
<?php
/**
 * 
 * Partial Name: benefits
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_field('enable_benefits')):
    $benefits = get_field('benefits');
?>
<section class="benefits-partial-8190bc">
    <div class="svg-top">
        <svg width="1440" height="142" viewBox="0 0 1440 142" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1213.44 82.414C676.547 76.8856 269.312 93.6454 -65.4381 131.561C-400.188 169.477 -429.024 85.1676 -89.872 39.96C249.28 -5.24751 584.663 97.3362 1210.79 22.7598C1836.91 -51.8166 1750.33 87.9424 1213.44 82.414Z" fill="url(#paint0_linear_1037_88890)" fill-opacity="0.2"/>
            <defs>
            <linearGradient id="paint0_linear_1037_88890" x1="1665.99" y1="31.6669" x2="-338.894" y2="566.455" gradientUnits="userSpaceOnUse">
            <stop stop-color="#723EC7"/>
            <stop offset="1" stop-color="white" stop-opacity="0"/>
            </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $benefits['title']; ?></h2>
            </div>
        </div>
        <?php if($benefits['benefits_list']): foreach($benefits['benefits_list'] as $item): ?>
            <div class="row benefit">
                <div class="col-12 col-md-1">
                    <div class="icon-contain">
                        <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>">
                    </div>
                </div>
                <div class="col-12 col-md-11">
                    <h3><?= $item['title']; ?></h3>
                    <p><?= $item['description']; ?></p>
                </div>
            </div>
        <?php endforeach; endif; ?>
    </div>
</section>
<?php endif; ?>                