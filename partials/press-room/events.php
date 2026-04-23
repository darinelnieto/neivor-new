   
<?php
/**
 * 
 * Partial Name: events
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$events = get_field('events');
if($events['events_list']):
?>
<section class="events-partial-dce9fb">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <?php if($events['title']): ?>
                    <h2 class="title"><?= $events['title']; ?></h2>
                <?php 
                    endif; 
                    if($events['description']):
                ?>
                    <p class="description"><?= $events['description']; ?></p>
                <?php endif; ?>
                    <div class="events-contain">
                        <div class="events-slide owl-carousel">
                            <?php foreach($events['events_list'] as $item): ?>
                                <div class="item">
                                    <a href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target']; ?>">
                                        <div class="event-card">
                                            <div class="image-contain">
                                                <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>">
                                            </div>
                                            <div class="text-contain">
                                                <h4 class="name"><?= $item['name']; ?></h4>
                                                <p class="event-description"><?= $item['description']; ?></p>
                                                <div class="see-more">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                                        <path d="M9.41471 6.83758C10.1954 7.61825 10.1954 8.88558 9.41471 9.66758C8.63404 10.4483 7.36671 10.4483 6.58471 9.66758C5.80404 8.88692 5.80404 7.61958 6.58471 6.83758C7.36671 6.05558 8.63337 6.05558 9.41471 6.83758" stroke="#0A2540" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 8.25091C2 7.81158 2.10133 7.37691 2.29733 6.97625V6.97625C3.30733 4.91158 5.53933 3.58425 8 3.58425C10.4607 3.58425 12.6927 4.91158 13.7027 6.97625V6.97625C13.8987 7.37691 14 7.81158 14 8.25091C14 8.69025 13.8987 9.12491 13.7027 9.52558V9.52558C12.6927 11.5902 10.4607 12.9176 8 12.9176C5.53933 12.9176 3.30733 11.5902 2.29733 9.52558V9.52558C2.10133 9.12491 2 8.69025 2 8.25091Z" stroke="#0A2540" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                    <span><?= $item['link']['title']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <svg class="svg-bottom" xmlns="http://www.w3.org/2000/svg" width="1440" height="175" viewBox="0 0 1440 175" fill="none">
        <path d="M1233.18 161.499C699.001 107.326 291.923 87.1018 -44.8856 94.5173C-381.694 101.933 -402.769 15.3567 -60.9155 1.07841C280.938 -13.1998 605.641 119.363 1235.95 101.85C1866.25 84.3368 1767.37 215.673 1233.18 161.499Z" fill="url(#paint0_linear_2095_174263)" fill-opacity="0.2"/>
        <defs>
            <linearGradient id="paint0_linear_2095_174263" x1="1688.47" y1="151.984" x2="-356.638" y2="502.833" gradientUnits="userSpaceOnUse">
            <stop stop-color="#723EC7"/>
            <stop offset="1" stop-color="white" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
</section>
<script>
    $('.events-slide').owlCarousel({
        autoplay:false,
        loop:false,
        nav:true,
        navText:[
            `<svg width="71" height="73" viewBox="0 0 71 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_di_2154_181780)">
                    <rect x="56" y="53.1687" width="41" height="42" rx="20.5" transform="rotate(-180 56 53.1687)" fill="white"/>
                    <path d="M37.95 27.2687L33.05 32.1687L37.95 37.0687" stroke="#323232" stroke-width="1.8375" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_di_2154_181780" x="0" y="0.168701" width="71" height="72" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.683333 0 0 0 0 0.683333 0 0 0 0 0.683333 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2154_181780"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2154_181780" result="shape"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.6 0 0 0 0 0.6 0 0 0 0 0.6 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="shape" result="effect2_innerShadow_2154_181780"/>
                    </filter>
                </defs>
            </svg>`,
            `<svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g filter="url(#filter0_di_2154_181782)">
                    <rect x="15" y="11.1687" width="42" height="42" rx="21" fill="white"/>
                    <path d="M33.55 37.0687L38.45 32.1687L33.55 27.2687" stroke="#323232" stroke-width="1.8375" stroke-linecap="round" stroke-linejoin="round"/>
                </g>
                <defs>
                    <filter id="filter0_di_2154_181782" x="0" y="0.168701" width="72" height="72" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feComposite in2="hardAlpha" operator="out"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.683333 0 0 0 0 0.683333 0 0 0 0 0.683333 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2154_181782"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2154_181782" result="shape"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                        <feOffset dy="4"/>
                        <feGaussianBlur stdDeviation="2"/>
                        <feComposite in2="hardAlpha" operator="arithmetic" k2="-1" k3="1"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.6 0 0 0 0 0.6 0 0 0 0 0.6 0 0 0 0.25 0"/>
                        <feBlend mode="normal" in2="shape" result="effect2_innerShadow_2154_181782"/>
                    </filter>
                </defs>
            </svg>`
        ],
        dots:false,
        margin:30,
        responsive:{
            0:{
                items:1,
                nav:false,
                dots:true
            },
            640:{
                items:2,
                nav:false,
                dots:true
            },
            991:{
                items:3
            },
            1200:{
                items:4
            }
        }
    }).css({'opacity':1});
</script>
<?php endif; ?>      