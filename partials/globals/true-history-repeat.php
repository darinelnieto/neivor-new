<?php
/**
 * 
 * Partial Name: true-history-repeat
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_field('enable_true_story_repeat')):
$stories = get_field('true_story_repeat');
?>
<section class="true-history-repeat-partial-72abc0">
    <?php if($stories): foreach($stories as $item): ?>
        <div class="true-history">
            <div class="svg-contain">
                <svg width="1440" height="140" viewBox="0 0 1440 140" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" d="M-92.7439 58.0202C444.145 63.9554 851.393 47.5042 1186.17 9.84202C1520.95 -27.8202 1549.72 56.5111 1210.54 101.462C871.35 146.412 536.045 43.5745 -90.1336 117.676C-716.312 191.778 -629.633 52.0851 -92.7439 58.0202Z" fill="url(#paint0_linear_501_14107)" fill-opacity="0.2"/>
                    <defs>
                        <linearGradient id="paint0_linear_501_14107" x1="-545.334" y1="108.424" x2="1459.96" y2="-424.844" gradientUnits="userSpaceOnUse">
                            <stop offset="0.323809" stop-color="#723EC7"/>
                            <stop offset="0.48398" stop-color="#7A49CA" stop-opacity="0.941657"/>
                            <stop offset="0.681268" stop-color="#9D79D8" stop-opacity="0.694652"/>
                            <stop offset="1" stop-color="#B3FF9F" stop-opacity="0"/>
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="title"><?= $item['title']; ?></h2>
                        <p class="description"><?= $item['description']; ?></p>
                        <?php if($item['stories']): ?>
                            <div class="slide-stories owl-carousel">
                                <?php foreach($item['stories'] as $story): ?>
                                    <div class="item">
                                        <div class="card-story">
                                            <div class="image-contain">
                                                <img src="<?= $story['photo']['url']; ?>" alt="<?= $story['photo']['title']; ?>">
                                            </div>
                                            <div class="body">
                                                <h4><?= $story['name']; ?></h4>
                                                <span class="tag"><?= $story['tag'] ?></span>
                                                <p class="stroy-description"><?= $story['description']; ?></p>
                                                <?php if($story['video_link']): ?>
                                                    <a href="<?= $story['video_link']['url']; ?>" target="<?= $story['video_link']['target']; ?>" class="see-video">
                                                        <?= $story['video_link']['title']; ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; endif; ?>
</section>
<script>
    $('.slide-stories').owlCarousel({
        autoplay:false,
        loop:false,
        nav:false,
        navText:[
            `<svg xmlns="http://www.w3.org/2000/svg" width="52" height="57" viewBox="0 0 52 57" fill="none">
                <g filter="url(#filter0_dd_467_16333)">
                    <rect x="12" y="8.30811" width="24" height="24" rx="12" fill="white"/>
                    <path d="M26 16.3081L22 20.3081L26 24.3081" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_dd_467_16333" x="-4" y="0.308105" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="8"/>
                    <feGaussianBlur stdDeviation="8"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_467_16333"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                    <feBlend mode="normal" in2="effect1_dropShadow_467_16333" result="effect2_dropShadow_467_16333"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_467_16333" result="shape"/>
                    </filter>
                </defs>
            </svg>`,
            `<svg xmlns="http://www.w3.org/2000/svg" width="54" height="57" viewBox="0 0 54 57" fill="none">
                <g filter="url(#filter0_dd_467_16337)">
                    <rect x="40" y="32.3081" width="24" height="24" rx="12" transform="rotate(180 40 32.3081)" fill="white"/>
                    <path d="M26 24.3081L30 20.3081L26 16.3081" stroke="#323232" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_dd_467_16337" x="0" y="0.308105" width="56" height="56" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="8"/>
                    <feGaussianBlur stdDeviation="8"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.08 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_467_16337"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset/>
                    <feGaussianBlur stdDeviation="2"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                    <feBlend mode="normal" in2="effect1_dropShadow_467_16337" result="effect2_dropShadow_467_16337"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect2_dropShadow_467_16337" result="shape"/>
                    </filter>
                </defs>
            </svg>`
        ],
        dots:false,
        margin:50,
        responsive:{
            0:{
                items:1,
                dots:true,
                nav:true,
            },
            600:{
                items:2,
                dots:true,
                nav:true
            },
            991:{
                items:3
            }
        }
    }).css({'opacity':1});
</script>
<?php endif; ?>
