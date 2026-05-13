   
<?php
$script_handle = 'faqs-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/faqs.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: flexible_faqs
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$faqs = get_sub_field('faqs');
if(!empty($faqs['faqs_list'])):
?>
<section class="flexible-faqs-partial-ed7c1c" itemscope itemtype="https://schema.org/FAQPage">
    <div class="container">
        <div class="row justify-content-center">
            <div class="<?= $faqs['width'] ?? 'col-12' ?> p-0">
                <h2 class="title"><?= $faqs['title'] ?? ''; ?></h2>
                <ul class="faqs">
                    <?php foreach($faqs['faqs_list'] as $i => $faq): ?>
                        <li class="faq-item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                            <h3 class="faq-question" itemprop="name"
                                aria-expanded="false"
                                aria-controls="faq-answer-<?= $i ?>"><?= $faq['ask'] ?? ''; ?></h3>
                            <p class="faq-answer" id="faq-answer-<?= $i ?>"
                                itemprop="acceptedAnswer" itemscope itemtype="https://schema.org/Answer">
                                <span itemprop="text"><?= $faq['answer'] ?? ''; ?></span>
                            </p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?> 