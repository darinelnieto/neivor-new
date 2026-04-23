   
<?php
/**
 * 
 * Partial Name: did-you-know-that
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$know_that = get_field('did_you_know_that');
if($know_that['items']):
?>
<section class="did-you-know-that-partial-7a42ad">
    <div class="svg-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="175" viewBox="0 0 1440 175" fill="none">
            <path d="M1273.46 161.499C739.279 107.326 332.201 87.1015 -4.60774 94.5171C-341.417 101.933 -362.492 15.3564 -20.6377 1.07818C321.216 -13.2001 645.919 119.363 1276.22 101.85C1906.53 84.3365 1807.64 215.673 1273.46 161.499Z" fill="url(#paint0_linear_1875_95244)" fill-opacity="0.2"/>
            <defs>
                <linearGradient id="paint0_linear_1875_95244" x1="1728.75" y1="151.983" x2="-316.36" y2="502.832" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#723EC7"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $know_that['title']; ?></h2>
            </div>
            <?php foreach($know_that['items'] as $item): ?>
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="card-content">
                        <div class="image-contain">
                            <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['url']; ?>">
                        </div>
                        <div class="text-contain">
                            <h4><?= $item['title']; ?></h4>
                            <p><?= $item['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="svg-bottom">
    <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="175" viewBox="0 0 1440 175" fill="none">
        <path d="M167.816 13.1909C701.998 67.3645 1109.08 87.5885 1445.89 80.173C1782.69 72.7574 1803.77 159.334 1461.91 173.612C1120.06 187.89 795.358 55.3272 165.053 72.8403C-465.251 90.3534 -366.366 -40.9826 167.816 13.1909Z" fill="url(#paint0_linear_1875_95245)" fill-opacity="0.2"/>
        <defs>
            <linearGradient id="paint0_linear_1875_95245" x1="-287.472" y1="22.7065" x2="1757.64" y2="-328.142" gradientUnits="userSpaceOnUse">
                <stop stop-color="#723EC7"/>
                <stop offset="1" stop-color="white" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
    </div>
</section>
<?php endif; ?>             