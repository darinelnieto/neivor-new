   
<?php
/**
 * 
 * Partial Name: extraordinary-fees
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$gray = get_field('extraordinary_fees_gray');
$purple = get_field('extraordinary_fees_purple');
?>
<section class="extraordinary-fees-partial-45fbf9">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-contain">
                    <div class="gray-contain">
                        <h2><?= $gray['title']; ?></h2>
                        <?php if($gray['description']): ?>
                            <p><?= $gray['description']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="purple-contain">
                        <div class="texts-contain">
                            <h2><?= $purple['title']; ?></h2>
                            <p><?= $purple['description'] ?></p>
                        </div>
                        <?php if($purple['request_quote']): ?>
                            <div class="cta-contain">
                                <a href="<?= $purple['request_quote']['url']; ?>" target="<?= $purple['request_quote']['target']; ?>">
                                    <span><?= $purple['request_quote']['title']; ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    