<?php
$script_handle = "globals-nav-menu-movil-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/globals-nav-menu-movil.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: nav-menu-movil
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$menu = get_field('nav', 'option');
$sing_in = get_field('external_links', 'option');
?>
<div class="nav-menu-movil-partial-ac8f67">
    <nav class="nav-menu-movil">
        <ul>
            <?php foreach($menu as $item): ?>
                <li class="nav-item">
                    <button class="nav-item get-sub-menu" data-target="<?= $item['name_menu']; ?>">
                        <?= $item['name_menu']; ?>
                        <i class="fa-solid fa-chevron-right"></i>
                    </button>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="https://www.neivor.com/agenda-una-demo-asesoria" class="open-dorp-down" target="_self">
            <?= get_field('see_demo_text', 'option'); ?>
        </a>
    </nav>
    <div class="submenu">
        <button class="close-submenu">
            <i class="fa-solid fa-chevron-left"></i>
            Cerrar
        </button>
        <div class="submenu-content"></div>
    </div>
</div>
                    