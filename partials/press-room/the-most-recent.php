   
<?php
/**
 * 
 * Partial Name: the-most-recent
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$recent = get_field('the_most_recent');
if($recent['items']):
?>
<section class="the-most-recent-partial-dbbdc7">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <h2><?= $recent['title']; ?></h2>
                <div class="content-cards">
                    <?php foreach($recent['items'] as $item): ?>
                        <div class="card-content">
                            <div class="image-contain">
                                <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>">
                            </div>
                            <div class="text-contain">
                                <div class="description-content">
                                    <div class="logo-contain">
                                        <img src="<?= $item['logo']['url']; ?>" alt="<?= $item['logo']['title']; ?>">
                                        <span><?= $item['name']; ?></span>
                                    </div>
                                    <p><?= $item['description']; ?></p>
                                </div>
                                <div class="cta-contain">
                                    <a href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target']; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                            <path d="M5.95056 12.8307V12.7632C5.95056 9.82204 8.33437 7.43823 11.2755 7.43823H12.5349H16.6005" stroke="#0A2540" stroke-width="1.33124" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M5.95058 12.8342V17.2007" stroke="#0A2540" stroke-width="1.33124" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M13.938 10.1007L16.6005 7.43824L13.938 4.77576" stroke="#0A2540" stroke-width="1.33124" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span>
                                            <?php if(get_bloginfo("language") == "en-US"): ?>
                                                Go to site
                                            <?php else: ?>
                                                Ir al sitio
                                            <?php endif; ?>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>           