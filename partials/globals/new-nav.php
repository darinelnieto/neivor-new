   
<?php
/**
 * 
 * Partial Name: new-nav
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

$logo_text    = get_field('new_nav_logo_text', 'option')     ?: 'Neivor';
$logo_url     = get_field('new_nav_logo_url', 'option')      ?: '/';
$nav_items    = get_field('new_nav_items', 'option')         ?: [];
$demo_text    = get_field('new_nav_cta_demo_text', 'option') ?: 'Ver Demo';
$demo_url     = get_field('new_nav_cta_demo_url', 'option')  ?: 'https://www.neivor.com/agenda-una-demo-asesoria/';
$login_text   = get_field('new_nav_cta_login_text', 'option') ?: 'Iniciar sesión';
$login_url    = get_field('new_nav_cta_login_url', 'option') ?: '#';

// Build JS-ready data structure for the mobile drawer
$js_items = [];
foreach ( $nav_items as $item ) {
    $key    = sanitize_title( $item['item_label'] );
    $groups = [];
    if ( ! empty( $item['item_groups'] ) ) {
        foreach ( $item['item_groups'] as $group ) {
            $g_items = [];
            if ( ! empty( $group['group_items'] ) ) {
                foreach ( $group['group_items'] as $gi ) {
                    $g_items[] = [
                        'label' => esc_html( $gi['gitem_label'] ),
                        'url'   => esc_url( $gi['gitem_url'] ?: '#' ),
                    ];
                }
            }
            $groups[] = [
                'label' => esc_html( $group['group_label'] ),
                'items' => $g_items,
            ];
        }
    }
    $js_items[] = [
        'key'    => $key,
        'liId'   => 'nav-' . $key,
        'megaId' => 'mega-' . $key,
        'label'  => esc_html( $item['item_label'] ),
        'url'    => esc_url( $item['item_url'] ?: '#' ),
        'groups' => $groups,
    ];
}
?>
<section class="new-nav-partial-368378">

  <!-- ═══════════════ NAVBAR ═══════════════ -->
  <nav>
    <div class="nav-inner">
      <a href="<?= esc_url( $logo_url ); ?>" class="logo"><?= esc_html( $logo_text ); ?></a>

      <ul class="nav-links" id="navLinks">
        <?php foreach ( $nav_items as $item ) :
          $key      = sanitize_title( $item['item_label'] );
          $has_mega = ! empty( $item['item_groups'] );
        ?>
        <li id="nav-<?= esc_attr( $key ); ?>">
          <a href="<?= esc_url( $item['item_url'] ?: '#' ); ?>">
            <?= esc_html( $item['item_label'] ); ?>
            <?php if ( $has_mega ) : ?>
              <svg class="chevron" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M4 6l4 4 4-4"/></svg>
            <?php endif; ?>
          </a>

          <?php if ( $has_mega ) : ?>
          <div class="megamenu" id="mega-<?= esc_attr( $key ); ?>">
            <?php foreach ( $item['item_groups'] as $group ) :
              $has_label = ! empty( $group['group_label'] );
            ?>
              <?php if ( $has_label ) : ?>
                <div class="mega-section-title"><?= esc_html( $group['group_label'] ); ?></div>
              <?php endif; ?>
              <?php if ( ! empty( $group['group_items'] ) ) : ?>
                <?php foreach ( $group['group_items'] as $gi ) : ?>
                  <a class="mega-link" href="<?= esc_url( $gi['gitem_url'] ?: '#' ); ?>">
                    <?= esc_html( $gi['gitem_label'] ); ?>
                    <svg width="12" height="12" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 4l4 4-4 4"/></svg>
                  </a>
                <?php endforeach; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <?php endif; ?>
        </li>
        <?php endforeach; ?>
      </ul>

      <div class="nav-cta">
        <a href="<?= esc_url( $demo_url ); ?>" class="btn-primary"><?= esc_html( $demo_text ); ?></a>
        <a href="<?= esc_url( $login_url ); ?>" class="btn-login"><?= esc_html( $login_text ); ?></a>
      </div>

      <button class="hamburger" id="hamburger" aria-label="Menú">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </nav>

  <!-- ═══════════════ MOBILE DRAWER ═══════════════ -->
  <div class="mobile-drawer" id="mobileDrawer">
    <div class="drawer-track level-1" id="drawerTrack">

      <!-- Panel 0: main items -->
      <div class="drawer-panel">
        <div class="drawer-main">
          <?php foreach ( $nav_items as $item ) :
            $key      = sanitize_title( $item['item_label'] );
            $has_mega = ! empty( $item['item_groups'] );
          ?>
            <?php if ( $has_mega ) : ?>
              <button class="drawer-item" onclick="openSub('<?= esc_js( $key ); ?>')">
                <?= esc_html( $item['item_label'] ); ?>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 4l4 4-4 4"/></svg>
              </button>
            <?php else : ?>
              <a class="drawer-item" href="<?= esc_url( $item['item_url'] ?: '#' ); ?>">
                <?= esc_html( $item['item_label'] ); ?>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
          <div class="drawer-divider"></div>
          <div class="drawer-cta-area">
            <a href="<?= esc_url( $demo_url ); ?>" class="drawer-btn primary"><?= esc_html( $demo_text ); ?></a>
            <a href="<?= esc_url( $login_url ); ?>" class="drawer-btn secondary"><?= esc_html( $login_text ); ?></a>
          </div>
        </div>
      </div>

      <!-- Panel 1: submenus (filled dynamically by JS) -->
      <div class="drawer-panel" id="drawerSubPanel"></div>

    </div>
  </div>

</section>

<?php wp_localize_script( 'new-nav', 'newNavData', $js_items ); ?>
                    