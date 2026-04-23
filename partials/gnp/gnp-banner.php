   
<?php
/**
 * 
 * Partial Name: gnp-banner
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$banner = get_field('banner_section');
$nav = $banner['nav'];
?>
<section class="gnp-banner-partial-3bdd98">
    <img src="<?= $banner['background_desktop']['url']; ?>" alt="<?= $banner['background_desktop']['title']; ?>" class="background-desktop">
    <img src="<?= $banner['background_movil']['url']; ?>" alt="<?= $banner['background_movil']['title']; ?>" class="background-movil">
    <div class="container" style="position:relative;">
        <div class="row">
            <div class="col-12 col-md-8 p-0">
                <h1 <?php if(is_mobile() && $banner['max_width_text_movil']): ?>style="max-width:<?= $banner['max_width_text_movil']; ?>"<?php endif; ?>><?= $banner['title'] ?></h1>
                <?php if($banner['description']): ?>
                    <p class="description"><?= $banner['description']; ?></p>
                <?php endif; ?>
                <div class="links-contain">
                    <?php if($nav): ?>
                        <div class="nav-card-contain">
                            <p class="intro-nav"><?= $banner['nav_title']; ?></p>
                            <ul class="nav">
                                <?php foreach($nav as $li): ?>
                                    <li>
                                        <a href="<?= $li['link_page']['url']; ?>">
                                            <img src="<?= $li['icon']['url']; ?>" alt="<?= $li['icon']['title']; ?>" class="normal">
                                            <img src="<?= $li['icon_hover']['url']; ?>" alt="<?= $li['icon_hover']['title']; ?>" class="hover">
                                            <span><?= $li['link_page']['title']; ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php if($banner['link_request_quote']): ?>
                        <a href="<?= $banner['link_request_quote']['url']; ?>" target="<?= $banner['link_request_quote']['target']; ?>" class="cta-orange">
                            <span><?= $banner['link_request_quote']['title']; ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-4 p-0 <?php if (!is_mobile()): ?>text-center<?php endif; ?>" style="position:relative;">
                <img src="<?= $banner['main_image']['url']; ?>" alt="<?= $banner['main_image']['title']; ?>" class="main-image" style="<?php if (is_mobile()): echo 'max-width:'.$banner['max_width_movil']; ?>;position:absolute;right:<?= $banner['position_x']; ?>%;transform:translateY(<?php echo $banner['position_y'].'%);'; else: echo 'max-width:'.$banner['max_width_desktop'].';'; endif; ?>">
            </div>
        </div>
    </div>
    <svg width="1440" height="175" class="svg-full-width" viewBox="0 0 1440 175" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M167.816 13.1909C701.998 67.3645 1109.08 87.5885 1445.89 80.173C1782.69 72.7574 1803.77 159.334 1461.91 173.612C1120.06 187.89 795.358 55.3272 165.053 72.8403C-465.251 90.3534 -366.366 -40.9826 167.816 13.1909Z" fill="url(#paint0_linear_1875_93304)" fill-opacity="0.2"/>
        <defs>
        <linearGradient id="paint0_linear_1875_93304" x1="-287.472" y1="22.7065" x2="1757.64" y2="-328.142" gradientUnits="userSpaceOnUse">
        <stop stop-color="#723EC7"/>
        <stop offset="1" stop-color="white" stop-opacity="0"/>
        </linearGradient>
        </defs>
    </svg>
    <script>
        $(()=>{
            var cambio = false;
            $('.nav-card-contain ul li a').each(function(index) {
                if(this.href.trim() == window.location){
                    $(this).addClass("active");
                    cambio = true;
                }
            });
        });
    </script>
</section>
                    