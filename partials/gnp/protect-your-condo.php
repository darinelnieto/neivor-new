   
<?php
/**
 * 
 * Partial Name: protect-your-condo
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_field('we_protect_your_condominium');
if($content['cards']):
?>
<section class="protect-your-condo-partial-ccbad9">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $content['title']; ?></h2>
            </div>
            <?php foreach($content['cards'] as $item): ?>
                <div class="col-12 col-sm-6 col-md-4 mb-4">
                    <div class="card-item">
                        <div class="image-contain">
                            <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['url']; ?>">
                        </div>
                        <div class="text-contain">
                            <h4><?= $item['name']; ?></h4>
                            <p><?= $item['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="svg">
        <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="175" viewBox="0 0 1440 175" fill="none">
            <path d="M167.816 13.1909C701.998 67.3645 1109.08 87.5885 1445.89 80.173C1782.69 72.7574 1803.77 159.334 1461.91 173.612C1120.06 187.89 795.358 55.3272 165.053 72.8403C-465.251 90.3534 -366.366 -40.9826 167.816 13.1909Z" fill="url(#paint0_linear_1875_95246)" fill-opacity="0.2"/>
            <defs>
                <linearGradient id="paint0_linear_1875_95246" x1="-287.472" y1="22.7065" x2="1757.64" y2="-328.142" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#723EC7"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
            </defs>
        </svg>
    </div>
</section>
<?php endif; ?>