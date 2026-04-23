   
<?php
/**
 * 
 * Partial Name: featured-results
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$results = get_field('featured_results_group');
if($results['results']):
?>
<section class="featured-results-partial-83b742">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= $results['title']; ?></h2>
            </div>
            <?php foreach($results['results'] as $item): ?>
                <div class="col-12 col-sm-6 col-lg-4 mb-4">
                    <div class="result-card">
                        <div class="top">
                            <?php if($item['icon']): ?>
                                <img src="<?= $item['icon']['url']; ?>" alt="<?= $item['icon']['title']; ?>" class="icon">
                            <?php endif; if($item['name']): ?>
                                <span class="text"><?= $item['name']; ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if($item['number_result']): ?>
                            <div class="result number-result">
                                <input type="hidden" class="the-result" value="<?= $item['result']; ?>">
                                <h3 <?php if($item['enable_symbol_before'] === false): ?>class="after"<?php endif ?>>
                                    <span><?= $item['symbol']; ?></span>
                                    <span class="result-item">0</span>
                                </h3>
                            </div>
                        <?php else: ?>
                            <div class="result">
                                <h3><?= $item['text_result']; ?></h3>
                            </div>
                        <?php endif; ?>
                        <p class="description"><?= $item['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<script src="<?= get_template_directory_uri() ?>/js/blog.js"></script>
<script>
    $(window).on('scroll', function(){
        var windowScrol = $(window).scrollTop();
        var results = $('.featured-results-partial-83b742').offset().top - 200;
        if(windowScrol >= results){
            initCounter();
        }
    });
</script>
<?php endif; ?>