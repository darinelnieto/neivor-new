<?php
/**
 * 
 * Partial Name: about
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$about = get_sub_field('about');
if($about['title'] && $about['description']):
?>
<section class="about-partial-c4b5c3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="texts-contain">
                    <h2><?= $about['title']; ?></h2>
                    <p><?= $about['description']; ?></p>
                </div>
            </div>
            <div class="col-12 col-md-5">
                <div class="image-contain">
                    <img src="<?= $about['image']['url']; ?>" alt="<?= $about['image']['title']; ?>">
                    <?= wp_get_attachment_image($about['image']['ID'], 'large', false, array(
                        'class' => 'about-image',
                        'loading' => 'lazy',
                        'decoding' => 'async',
                    )); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>     
