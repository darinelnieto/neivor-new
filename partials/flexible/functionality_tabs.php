<?php
$script_handle = "flexible-functionality_tabs-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-functionality_tabs.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: functionality_tabs
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$tabs = get_sub_field('functionality_tabs_group');
$items = $tabs['tabs'];
if(!empty($items)):
?>
<section class="functionality-tabs-partial-c16ffb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $tabs['title'] ?? ''; ?></h2>
                <div class="tabs-content">
                    <ul class="nav tabs" id="myTab" role="tablist">
                        <?php foreach($items as $index => $item): ?>
                            <li class="item" role="presentation">
                                <button class="nav-link <?= $index === 0 ? 'active' : ''; ?>" id="tab-<?= $index; ?>-tab" data-bs-toggle="tab" data-bs-target="#tab-<?= $index; ?>" type="button" role="tab" aria-controls="tab-<?= $index; ?>" aria-selected="<?= $index === 0 ? 'true' : 'false'; ?>">
                                    <?= $item['label'] ?? ''; ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <?php foreach($items as $index => $item): ?>
                            <div class="tab-pane fade <?= $index === 0 ? 'show active' : ''; ?>" id="tab-<?= $index; ?>" role="tabpanel" aria-labelledby="tab-<?= $index; ?>-tab">
                                <div class="top-content">
                                    <div class="info"><?= $item['info'] ?? ''; ?></div>
                                    <?php if(!empty($item['links'])): ?>
                                        <h3 class="subtitle"><?= $item['label_links'] ?? ''; ?></h3>
                                        <ul class="links">
                                            <?php foreach($item['links'] as $link): $cta = $link['link']; ?>
                                                <li>
                                                    <a href="<?= $cta['url'] ?? '#'; ?>" target="<?= $cta['target'] ?? '_self' ?>" class="call-to-action">
                                                        <span class="label-link"><?= $link['description_link'] ?? ''; ?></span>
                                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.175 9H0V7H12.175L6.575 1.4L8 0L16 8L8 16L6.575 14.6L12.175 9Z" fill="#484555"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif ?>
                                </div>
                                <?php 
                                    $benefits = $item['left_image_and_text_right_group'];
                                    $left = $benefits['left'];
                                    $right = $benefits['right']; 
                                    if(!empty($left['main_image']) || !empty($left['label']) || !empty($left['description']) || !empty($right['number']) || !empty($right['description']) || !empty($right['call_to_action'])):
                                ?>
                                <div class="benefits-left-image-and-text-right-partial-7219e8">
                                   <div class="row align-items-center">
                                        <div class="col-12 col-md-6 col-lg-5 mb-5 mb-md-0">
                                            <div class="image-contain">
                                                <?= wp_get_attachment_image($left['main_image'] ?? '', 'medium', false, array(
                                                    'class' => 'img-fluid',
                                                    'loading' => 'lazy',
                                                    'decoding' => 'async',
                                                )); ?>
                                                <?php if(!empty($left['label']) || !empty($left['description'])): ?>
                                                    <div class="overly">
                                                        <p class="label"><?= $left['label'] ?? ''; ?></p>
                                                        <p class="description"><?= $left['description'] ?? ''; ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-7">
                                            <div class="texts">
                                                <span class="overly"><?= $right['number'] ?? '99'; ?></span>
                                                <p class="info"><?= $right['description'] ?? ''; ?></p>
                                                <?php if(!empty($right['call_to_action'])): $cta = $right['call_to_action']; ?>
                                                    <a href="<?= $cta['url']; ?>" target="<?= $cta['url'] ?? '_self'; ?>" class="call-to-action">
                                                        <?= $cta['title'] ?? 'caso de éxito atlas desarrollos'; ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>