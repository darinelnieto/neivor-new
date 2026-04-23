   
<?php
/**
 * 
 * Partial Name: neivor-in-media
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_field('neivor_in_media');
if($content['logos']):
?>
<section class="neivor-in-media-partial-ff6f6e">
    <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="175" viewBox="0 0 1440 175" fill="none">
        <path d="M167.817 13.191C701.999 67.3647 1109.08 87.5888 1445.89 80.1733C1782.69 72.7578 1803.77 159.334 1461.92 173.612C1120.06 187.89 795.359 55.3274 165.054 72.8404C-465.251 90.3534 -366.365 -40.9826 167.817 13.191Z" fill="url(#paint0_linear_2060_86834)" fill-opacity="0.2"/>
        <defs>
            <linearGradient id="paint0_linear_2060_86834" x1="-287.471" y1="22.7065" x2="1757.64" y2="-328.142" gradientUnits="userSpaceOnUse">
                <stop stop-color="#723EC7"/>
                <stop offset="1" stop-color="white" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2><?= $content['title']; ?></h2>
                <div class="logos-contain row">
                    <?php foreach($content['logos'] as $logo): ?>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img-contain">
                                <img src="<?= $logo['logo']['url']; ?>" alt="<?= $logo['logo']['title']; ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>           