<?php
$script_handle = 'important-comparison-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials-min/important-comparison.min.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: important-comparison
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$imp_comp = get_sub_field('important_comparison');
$table = $imp_comp['table'];
$p_card = $imp_comp['flexible_card_content'];
if(!empty($table) || !empty($p_card)):
?>
<section class="important-comparison-partial-2c37c6">
    <div class="container">
        <div class="row justify-content-center">
            <?php if(!empty($table)): ?>
                <div class="col-12 col-md-10 col-lg-11">
                    <div class="title-content">
                        <?php if(!empty($imp_comp['title'])): ?>
                            <h2 class="title"><?= $imp_comp['title']; ?></h2>
                        <?php endif; if(!empty($imp_comp['subtitle'])): ?>
                            <p class="p"><?= $imp_comp['subtitle']; ?></p>
                        <?php endif; ?>
                    </div>
                    <table class="table">
                        <?php if(!empty($table['thead'])): ?>
                            <thead>
                                <tr>
                                    <?php foreach($table['thead'] as $th): ?>
                                        <th class="<?php if($th['text_center'] === true): ?>text-center<?php endif; ?> w-25"><?= $th['th']; ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                        <?php endif; if(!empty($table['tbody'])): ?>
                            <tbody>
                                <?php foreach($table['tbody'] as $tr): ?>
                                    <tr>
                                        <?php foreach($tr['tr'] as $td): ?>
                                            <td class="<?php if($td['text_center'] === true): ?>text-center<?php endif; ?> w-25"><?= $td['td']; ?></td>
                                        <?php endforeach; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php endif; ?>
                    </table>
                </div>
            <?php endif; if(!empty($p_card['overly_number']) || !empty($p_card['description'])): ?>
                <div class="<?= $p_card['width'] ?? 'col-12 col-md-8 col-lg-6'; ?>">
                    <div class="card-purple-content" style="background: <?= $p_card['card_background'] ?? '#ffffff'; ?>">
                        <?php if(!empty($p_card['overly_number'])): ?>
                            <span class="overly"><?= $p_card['overly_number']; ?></span>
                        <?php endif; if(!empty($p_card['description'])): ?>
                            <p class="p"><?= $p_card['description']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>