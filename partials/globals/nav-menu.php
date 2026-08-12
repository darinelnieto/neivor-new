<?php
$script_handle = "globals-nav-menu-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/globals-nav-menu.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: nav-menu
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$nav = get_field('nav', 'options');
if($nav):
$sing_in = get_field('external_links', 'option');
?>
<ul class="nav-menu-partial-00596a">
    <?php foreach($nav as $main_nav): ?>
        <li>
            <?php if($main_nav['enable_link'] === false): ?>
                <span class="main-menu-name">
                    <?= $main_nav['name_menu']; ?> 
                    <?php if($main_nav['sub_menu']): ?>
                        <svg class="caret-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    <?php endif; ?>
                </span>
            <?php else: ?>
                <a href="<?= $main_nav['link']['url'] ?? '#'; ?>" class="main-menu-name">
                    <?= $main_nav['name_menu']; ?> 
                    <?php if($main_nav['sub_menu']): ?>
                        <svg class="caret-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    <?php endif; ?>
                </a>
            <?php endif; if($main_nav['sub_menu']): ?>
                <div class="sub-menu-pop-up" style="<?php if($main_nav['nav_max_width']): ?>min-width:<?= $main_nav['nav_max_width']; ?><?php else: ?>min-width:564px;<?php endif; ?>">
                    <div class="row">
                        <?php foreach($main_nav['sub_menu'] as $sub_menu): ?>
                            <div class="menu-pop-up <?= $sub_menu['select_grid']; ?>">
                                <div class="contain">
                                    <?php if($sub_menu['sub_menu_name']): ?>
                                        <span class="sub-menu-name">
                                            <?php if($sub_menu['sub_menu_icon']): ?>
                                                <?= wp_get_attachment_image($sub_menu['sub_menu_icon']['ID'], 'large', false, array(
                                                    'class' => 'icon-image',
                                                    'fetchpriority' => 'high',
                                                    'loading' => 'eager'
                                                )); ?>
                                            <?php endif; ?>
                                            <?= $sub_menu['sub_menu_name']; ?>
                                        </span>
                                    <?php endif; ?>
                                    <?php if($sub_menu['sub_menu_links']): ?>
                                        <ul class="nav-page">
                                            <?php foreach($sub_menu['sub_menu_links'] as $item): ?>
                                                <li>
                                                   <?php if (is_array($item['external_url'])) : ?>
                                                        <a href="<?= $item['external_url']['url']; ?>" target="<?= $item['external_url']['target']; ?>">
                                                            <?= $item['external_url']['title']; ?>
                                                        </a>
                                                    <?php else : ?>
                                                        <a href="<?= $item['external_url']; ?>">
                                                            <?= $item['external_url']; ?>
                                                        </a>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </li>
    <?php endforeach; if($sing_in): ?>
         <li class="sing-in pulse-animation">
            <div onclick="window.location.href='https://www.neivor.com/agenda-una-demo-asesoria/'" class="open-dorp-down" style="background: linear-gradient(90deg, #FFB300 0%, #FFD700 100%);color: black;border: black; width:100px">
                <span>
                    <?= get_field('see_demo_text', 'option'); ?>
                </span>
            </div>
         </li>
        <li class="sing-in" style="margin: 0;">
            <div class="open-dorp-down" style="width:100px">
                <span>
                    <?= get_field('sing_in_cta_text', 'option'); ?>
                </span>
            </div>
            <div class="drop-down">
                <ul>
                <?php foreach($sing_in as $item): ?>
                        <li>
                            <a href="<?= $item['url']; ?>" 
                               target="_blank" 
                               class="external-link track-ga-event" 
                               data-label="<?= esc_attr($item['cta_text']); ?>">
                                <?= wp_get_attachment_image($item['icon']['ID'] ?? '', 'large', false, array(
                                    'class' => 'icon',
                                    'fetchpriority' => 'high',
                                    'loading' => 'eager'
                                )); ?>
                                <span class="text"><?= $item['cta_text']; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </li>
    <?php endif; ?>
</ul>
<?php endif; ?>