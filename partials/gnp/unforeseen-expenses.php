   
<?php
/**
 * 
 * Partial Name: unforeseen-expenses
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$items = get_field('unforeseen_expenses');
if($items['items']):
?>
<section class="unforeseen-expenses-partial-a3fd82">
    <div class="svg">
        <svg xmlns="http://www.w3.org/2000/svg" width="1440" height="175" viewBox="0 0 1440 175" fill="none">
            <path d="M1248.18 161.499C714.002 107.326 306.924 87.1015 -29.8851 94.5171C-366.694 101.933 -387.769 15.3564 -45.915 1.07818C295.939 -13.2001 620.642 119.363 1250.95 101.85C1881.25 84.3365 1782.37 215.673 1248.18 161.499Z" fill="url(#paint0_linear_1875_95248)" fill-opacity="0.2"/>
            <defs>
                <linearGradient id="paint0_linear_1875_95248" x1="1703.47" y1="151.983" x2="-341.637" y2="502.832" gradientUnits="userSpaceOnUse">
                    <stop stop-color="#723EC7"/>
                    <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
            </defs>
        </svg>
    </div>
    <div class="container" style="position:relative;">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $items['title']; ?></h2>
            </div>
        </div>
        <?php foreach($items['items'] as $item): ?>
            <div class="row item align-items-center">
                <div class="col-12 col-md-6">
                    <h3 class="d-block d-md-none"><?= $item['title']; ?></h3>
                    <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>" class="feature-image">
                </div>
                <div class="col-12 col-md-6">
                    <h3 class="d-none d-md-block"><?= $item['title']; ?></h3>
                    <?php if($item['content']): foreach($item['content']as $content): ?>
                    <div class="row align-items-center">
                            <div class="col-3 col-md-2">
                                <img src="<?= $content['icon']['url']; ?>" alt="<?= $content['icon']['title']; ?>" class="icon">
                            </div>
                            <div class="texts col-9 col-md-10">
                                <h4><?= $content['name']; ?></h4>
                            </div>
                            <div class="col-9 offset-3 col-md-12 offset-md-0">
                                <p class="description"><?= $content['description']; ?></p>
                            </div>
                        </div>
                    <?php endforeach; endif; ?>
                    <a href="<?= $item['cta_link']['url']; ?>" target="<?= $item['cta_link']['target']; ?>">
                        <span><?= $item['cta_link']['title']; ?></span>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>        