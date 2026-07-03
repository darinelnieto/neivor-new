   
<?php
/**
 * 
 * Partial Name: benefits_two_column
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$two_column = get_sub_field('two_column_group');
if(!empty($two_column['content'])):
?>
<section class="benefits-two-column-partial-24fbab">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <?php if(!empty($two_column)): ?>
                    <h2 class="title"><?= $two_column['title']; ?></h2>
                <?php endif; ?>
            </div>
            <?php foreach($two_column['content'] as $item): ?>
                <div class="col-12 col-md-6 mb-4">
                    <div class="benefit">
                        <?= wp_get_attachment_image($item['image'] ?? '', 'medium', false, array(
                            'class' => 'benefit-image',
                            'loading' => 'lazy',
                            'decoding' => 'async',
                        )); ?>
                        <div class="texts">
                            <?php if(!empty($item['label'])): ?>
                                <h3 class="benefit-title"><?= $item['label']; ?></h3>
                            <?php endif; if(!empty($item['description'])): ?>
                                <p class="benefit-description"><?= $item['description']; ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>