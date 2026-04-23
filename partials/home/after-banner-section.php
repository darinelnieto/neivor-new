   
<?php
/**
 * 
 * Partial Name: after-banner-section
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$after_banner = get_field('after_banner');
if($after_banner['enable_conten_after_banner'] === true):
?>
<section class="after-banner-section-partial-b30c5f">
    <div class="container">
        <div class="row">
            <div class="col-2 mb-4 mb-md-0">
                <div class="icon-contain">
                    <svg width="99" height="94" viewBox="0 0 99 94" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g filter="url(#filter0_i_437_9635)">
                            <rect x="0.282715" width="98.6468" height="93.5" rx="17.156" fill="white"/>
                        </g>
                        <defs>
                            <filter id="filter0_i_437_9635" x="0.282715" y="0" width="107.225" height="102.078" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dx="8.57798" dy="8.57798"/>
                                <feGaussianBlur stdDeviation="21.445"/>
                                <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0.92549 0 0 0 0 0.92549 0 0 0 0 0.964706 0 0 0 1 0"/>
                                <feBlend mode="normal" in2="shape" result="effect1_innerShadow_437_9635"/>
                            </filter>
                        </defs>
                    </svg>
                    <img src="<?= $after_banner['icon']['url']; ?>" alt="<?= $after_banner['icon']['title']; ?>">
                </div>
            </div>
            <div class="col-12 col-md-10">
                <h2><?= $after_banner['title']; ?></h2>
                <p><?= $after_banner['description']; ?></p>
            </div>
        </div>
    </div>
</section>
<?php endif; ?> 