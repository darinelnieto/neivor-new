   
<?php
/**
 * 
 * Partial Name: we-are-here
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_sub_field('enable_we_are_here')):
    $we_are_here = get_sub_field('we_are_here');
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
                            <?= wp_get_attachment_image( $item['image']['ID'], 'full', false, array( 
                                'class' => 'd-none d-md-block image', 
                                'loading' => 'lazy', 
                                'decoding' => 'async' 
                            ) ); ?>
                            <?= wp_get_attachment_image( $item['icon_movil']['ID'], 'full', false, array( 
                                'class' => 'd-block d-md-none icon', 
                                'loading' => 'lazy', 
                                'decoding' => 'async' 
                            ) ); ?>
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