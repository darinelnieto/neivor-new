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
<style>
   .main-menu-name {
  display: inline-flex;
  align-items: center;
  gap: 4px;
}

.caret-icon {
  width: 12px;
  height: 12px;
  transition: transform 0.2s ease;
  transform-origin: center;
}

</style>   
<ul class="nav-menu-partial-00596a">
    <?php foreach($nav as $main_nav): ?>
        <li>
            <span class="main-menu-name">
                <?= $main_nav['name_menu']; ?> 
                <?php if($main_nav['sub_menu']): ?>
                    <svg class="caret-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                <?php endif; ?>
            </span>
            <?php if($main_nav['sub_menu']): ?>
                <div class="sub-menu-pop-up" style="<?php if($main_nav['nav_max_width']): ?>min-width:<?= $main_nav['nav_max_width']; ?><?php else: ?>min-width:564px;<?php endif; ?>">
                    <div class="row">
                        <?php foreach($main_nav['sub_menu'] as $sub_menu): ?>
                            <div class="menu-pop-up <?= $sub_menu['select_grid']; ?>">
                                <div class="contain">
                                    <?php if($sub_menu['sub_menu_name']): ?>
                                        <span class="sub-menu-name">
                                            <?php if($sub_menu['sub_menu_icon']): ?>
                                                <img src="<?= $sub_menu['sub_menu_icon']['url']; ?>" alt="<?= $sub_menu['sub_menu_icon']['title']; ?>">
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
                                <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>" class="icon">
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
<script>
document.addEventListener('DOMContentLoaded', function() {
  
  // 1. Lógica original para los iconos (carets) del menú
  const menuItems = document.querySelectorAll('.nav-menu-partial-00596a li');

  menuItems.forEach(function(item) {
    const caret = item.querySelector('.caret-icon');
    const subMenu = item.querySelector('.sub-menu-pop-up');

    if (caret && subMenu) {
      item.addEventListener('mouseenter', () => {
        caret.style.transform = 'rotate(180deg)';
      });

      item.addEventListener('mouseleave', () => {
        caret.style.transform = 'rotate(0deg)';
      });
    }
  });

  // 2. Lógica nueva para el tracking de clics en Google Analytics
  const trackingLinks = document.querySelectorAll('.track-ga-event');

  trackingLinks.forEach(function(link) {
    link.addEventListener('click', function(e) {
        // Obtenemos el texto dinámico desde el atributo data-label (ej: "Condos", "Rentas")
        const label = this.getAttribute('data-label');
        
        if (typeof gtag === 'function') {
            gtag('event', 'neivor_customer', {
                'event_category': 'sales',
                'event_label': label.toLowerCase(), // Opcional: lo pasa a minúsculas
                'value': 1.0
            });
        }
    });
  });

});
</script>

</script>
