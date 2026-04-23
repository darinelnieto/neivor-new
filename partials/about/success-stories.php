   
<?php
/**
 * 
 * Partial Name: success-stories
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$success_stories = get_field('success_stories');
if($success_stories['cases']):
?>
<section class="success-stories-partial-2cc9fb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $success_stories['title']; ?></h2>
                <div class="stories-slide owl-carousel">
                    <?php foreach($success_stories['cases'] as $item): ?>
                        <div class="item">
                            <div class="card-history">
                                <div class="image-contain">
                                    <img src="<?= $item['feature_image']['url']; ?>" alt="<?= $item['feature_image']['title']; ?>" class="feature-image">
                                    <?php if($item['logos']): ?>
                                        <div class="logo-contain">
                                            <?php foreach($item['logos'] as $logo): ?>
                                                <div class="logo">
                                                    <img src="<?= $logo['logo']['url']; ?>" alt="<?= $logo['logo']['title']; ?>" class="logo">
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <h4 class="title"><?= $item['title']; ?></h4>
                                <div class="description">
                                    <?= $item['description']; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.stories-slide').owlCarousel({
        autoplay:false,
        loop:false,
        nav:true,
        navText:[
            `<svg xmlns="http://www.w3.org/2000/svg" width="55" height="57" viewBox="0 0 55 57" fill="none">
                <g filter="url(#filter0_dd_2010_111307)">
                    <rect x="15" y="8.28931" width="24" height="24" rx="12" fill="white"/>
                    <path d="M29 16.2893L25 20.2893L29 24.2893" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_dd_2010_111307" x="-1" y="0.289307" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="8"/>
                    <feGaussianBlur stdDeviation="8"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2010_111307"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                    <feBlend mode="normal" in2="effect1_dropShadow_2010_111307" result="effect2_dropShadow_2010_111307"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_2010_111307" result="shape"/>
                    </filter>
                </defs>
            </svg>`,
            `<svg xmlns="http://www.w3.org/2000/svg" width="52" height="57" viewBox="0 0 52 57" fill="none">
                <g filter="url(#filter0_dd_2010_111311)">
                    <rect x="40" y="32.2893" width="24" height="24" rx="12" transform="rotate(180 40 32.2893)" fill="white"/>
                    <path d="M26 24.2893L30 20.2893L26 16.2893" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_dd_2010_111311" x="0" y="0.289307" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="8"/>
                    <feGaussianBlur stdDeviation="8"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2010_111311"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                    <feBlend mode="normal" in2="effect1_dropShadow_2010_111311" result="effect2_dropShadow_2010_111311"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_2010_111311" result="shape"/>
                    </filter>
                </defs>
            </svg>`
        ],
        dots:false,
        margin:60,
        responsive:{
            0:{
                items:1
            },
            640:{
                items:2
            },
            991:{
                items:3
            }
        }
    }).css({'opacity':1});
</script>
<?php endif; ?>          