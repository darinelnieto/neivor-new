   
<?php
/**
 * 
 * Partial Name: we-are-here
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_field('enable_we_are_here')):
    $we_are_here = get_field('we_are_here');
?>
<section class="we-are-here-partial-7651d1">
    <div class="container">
        <div class="row we-are-here">
            <div class="col-12">
                <h2 class="title"><?= $we_are_here['title']; ?></h2>
            </div>
            <div class="col-12">
                <?php if($we_are_here['items']): foreach($we_are_here['items'] as $item): ?>
                    <div class="row item">
                        <div class="col-12 col-md-<?= $item['image_colum_size_md']; ?> mb-4 mb-md-0">
                            <img src="<?= $item['image']['url']; ?>" alt="<?= $item['image']['title']; ?>" class="d-none d-md-block image">
                            <img src="<?= $item['icon_movil']['url']; ?>" alt="<?= $item['icon_movil']['title']; ?>" class="d-block d-md-none icon">
                        </div>
                        <div class="col-12 col-md-<?= $item['text_colum_size_md']; ?>">
                            <h4><?= $item['name']; ?></h4>
                            <div class="description"><?= $item['description']; ?></div>
                        </div>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>              