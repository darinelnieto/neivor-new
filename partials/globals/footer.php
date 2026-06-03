   
<?php
/**
 * 
 * Partial Name: footer
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$logo = get_field("logo", "option");
$social_networks = get_field("social_networks", "option");
$menu = get_field('menu_list', 'option');
$polices = get_field('polices', 'option');
?>
<section class="footer-partial-709a7c">
    <div class="container">
        <!-- Top content -->
        <div class="row justify-content-between top-content gap-3 gap-md-0">
            <div class="col-12 col-md-3">
                <?= wp_get_attachment_image($logo ?? '', 'large', false, array(
                    'class' => 'custom-logo',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                )) ?>
            </div>
            <?php if(!empty($social_networks)): ?>
                <div class="col-12 col-md-4">
                    <ul class="social-network">
                        <?php foreach($social_networks as $item): ?>
                            <li class="social-item">
                                <a href="<?= $item['url'] ?>" target="_blank" rel="noopener" class="social-link">
                                    <?= $item['fontawesome_icon'] ?? '<i class="fa-brands fa-facebook"></i>'; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <!-- Menu -->
        <?php if(!empty($menu)): ?>
            <div class="row justify-content-between menu-list">
                <?php foreach($menu as $item): ?>
                    <div class="col-6 col-lg-3 mb-5 mb-md-4">
                        <h2 class="label-menu"><?= $item['label'] ?? ''; ?></h2>
                        <?php if(!empty($item['menu'])): $list = $item['menu']; ?>
                            <nav class="nav-menu">
                                <ul class="nav-list">
                                    <?php foreach($list as $li): ?>
                                        <li class="nav-item">
                                            <a href="<?= $li['page_link'] ? $li['page'] : $li['external_link']['url']; ?>" 
                                                target="<?= $li['page_link'] ? '_self' : $li['external_link']['target']; ?>" 
                                                class="nav-link">
                                                <?= $li['text_link'] ?? ''; ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; if(!empty($polices)): ?>
            <div class="row">
                <div class="col-12">
                    <nav class="polices">
                        <ul>
                            <?php foreach($polices as $item): ?>
                                <li>
                                    <a href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target'] ?? '_self'; ?>" class="police-link">
                                        <?= $item['link']['title']; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12 col-md-6">
                <p class="adress"><?= get_field('address', 'option') ?? ''; ?></p>
            </div>
            <div class="col-12 col-md-6">
                <p class="copiright"><?= get_field('copyright', 'option') ?? '' ?></p>
            </div>
        </div>
    </div>
</section>
                    