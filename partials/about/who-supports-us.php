<?php
/**
 * 
 * Partial Name: who-supports-us
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$supports = get_field('who_supports_us');
if($supports['logos_list']):
?>
<section class="who-supports-us-partial-4f8553">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h2><?= $supports['title']; ?></h2>
            </div>
            <?php foreach($supports['logos_list'] as $logo): ?>
                <div class="col-6 col-md-4 col-lg-3 text-center">
                    <div class="image-contain">
                        <img src="<?= $logo['logo']['url']; ?>" alt="<?= $logo['logo']['title']; ?>">
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="152" viewBox="0 0 1440 152" fill="none">
        <path d="M1274.6 142.242C739.603 96.7909 332.249 83.2114 -4.39408 96.1213C-341.037 109.031 -363.522 22.8104 -21.9464 2.9564C319.629 -16.8976 646.452 110.35 1276.39 82.5551C1906.32 54.7603 1809.59 187.692 1274.6 142.242Z" fill="url(#paint0_linear_2014_113943)" fill-opacity="0.2"/>
        <defs>
            <linearGradient id="paint0_linear_2014_113943" x1="1729.67" y1="125.299" x2="-309.443" y2="509.469" gradientUnits="userSpaceOnUse">
                <stop stop-color="#723EC7"/>
                <stop offset="1" stop-color="white" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
</section>
<?php endif; ?>              
