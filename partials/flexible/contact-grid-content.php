<?php
// $script_handle = 'contact-grid-content-js';
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . '/js/partials-min/contact-grid-content.min.js',
//     array('jquery'),
//     null,
//     true
// );
/**
 * 
 * Partial Name: contact-grid-content
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$c_cards = get_sub_field('contact_section');
if(!empty($c_cards)):
?>
<section class="contact-grid-content-partial-7cb202">
    <div class="container">
        <div class="row">
            <?php foreach($c_cards as $item): ?>
                <div class="<?= $item['width'] ?? 'col-12 col-md-6' ?> mb-4">
                    <div class="card-item <?= $item['background'] ?? 'white'; ?>">
                        <?php if(!empty($item['main_image'])): ?>
                            <div class="image-contain">
                                <?= wp_get_attachment_image($item['main_image'], 'large', false, array(
                                    'class' => 'card-image',
                                    'loading' => 'lazy',
                                    'decoding' => 'async',
                                )); ?>
                            </div>
                        <?php endif; ?>
                        <div class="text-content">
                            <?php if(!empty($item['title'])): ?>
                                <h2 class="h3"><?= $item['title']; ?></h2>
                            <?php endif; if(!empty($item['description'])): ?>
                                <div class="description">
                                    <?= $item['description']; ?>
                                </div>
                            <?php endif; if(!empty($item['cta'])): $cta = $item['cta']; ?>
                                <a href="<?= $cta['url']; ?>" target="<?= $cta['target'] ?? '_self'; ?>" class="cta-purple link-to-contact">
                                    <?= $cta['title'] ?? 'Hablar con un especialista'; ?>
                                </a>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>