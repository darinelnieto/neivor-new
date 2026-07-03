   
<?php
/**
 * 
 * Partial Name: protect-your-condo
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
if(get_field('enable_protect_your_condo')):
    $protected = get_field('protect_your_condo');
?>
<style>
    .protect-your-condo-partial-69c565 .cta-get-started{
        border:1px solid <?= $protected['background_cta']; ?>;
        background:<?= $protected['background_cta']; ?>;
        color:<?= $protected['text_color_cta']; ?>
    }
    .protect-your-condo-partial-69c565 .cta-get-started:hover{
        color:<?= $protected['background_cta']; ?>;
        background:<?= $protected['text_color_cta']; ?>
    }
</style>
<section class="protect-your-condo-partial-69c565" style="background:<?= $protected['background_section']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p style="color:<?php if($protected['text_color']): echo $protected['text_color']; else: ?>#0A2540<?php endif; ?>;"><?= $protected['title']; ?></p>
                <?php if($protected['cta_get_started_for_free']): ?>
                    <a href="<?= $protected['cta_get_started_for_free']['url']; ?>" target="<?= $protected['cta_get_started_for_free']['target']; ?>" class="cta-get-started">
                        <span><?= $protected['cta_get_started_for_free']['title']; ?></span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
                            <path d="M6.91724 11.175L9.51694 8.57529L6.91724 5.97559" stroke="white" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                <?php
                    endif;
                    if($protected['get_advicedemo']):
                ?>
                    <a href="<?= $protected['get_advicedemo']['url']; ?>" target="<?= $protected['get_advicedemo']['target']; ?>" class="get-advice">
                        <span><?= $protected['get_advicedemo']['title']; ?></span>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.74561 10.487L9.34531 7.8873L6.74561 5.2876" stroke="#0A2540" stroke-width="1.41802" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="svg">
        <svg width="272" height="75" viewBox="0 0 272 75" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M259.44 6.2288C259.44 9.66887 262.229 12.4576 265.669 12.4576C269.109 12.4576 271.897 9.66887 271.897 6.2288C271.897 2.78873 269.109 -1.21899e-07 265.669 -2.72269e-07C262.229 -4.2264e-07 259.44 2.78873 259.44 6.2288ZM197.152 6.22879C197.152 9.66886 199.941 12.4576 203.381 12.4576C206.821 12.4576 209.609 9.66886 209.609 6.22879C209.609 2.78872 206.821 -2.84459e-06 203.381 -2.99496e-06C199.941 -3.14533e-06 197.152 2.78872 197.152 6.22879ZM141.093 12.4576C137.653 12.4576 134.864 9.66886 134.864 6.22879C134.864 2.78872 137.653 -5.86803e-06 141.093 -5.71766e-06C144.533 -5.56729e-06 147.322 2.78872 147.322 6.22879C147.322 9.66886 144.533 12.4576 141.093 12.4576ZM72.576 6.22879C72.576 9.66886 75.3647 12.4576 78.8048 12.4576C82.2449 12.4576 85.0336 9.66886 85.0336 6.22879C85.0336 2.78872 82.2449 -8.28998e-06 78.8048 -8.44035e-06C75.3647 -8.59072e-06 72.576 2.78872 72.576 6.22879ZM16.5168 12.4576C13.0768 12.4576 10.288 9.66885 10.288 6.22879C10.288 2.78872 13.0768 -1.13134e-05 16.5168 -1.1163e-05C19.9569 -1.10127e-05 22.7456 2.78872 22.7456 6.22879C22.7456 9.66886 19.9569 12.4576 16.5168 12.4576ZM-51.9999 6.22878C-51.9999 9.66885 -49.2112 12.4576 -45.7711 12.4576C-42.3311 12.4576 -39.5424 9.66885 -39.5424 6.22878C-39.5424 2.78871 -42.3311 -1.37354e-05 -45.7711 -1.38857e-05C-49.2112 -1.40361e-05 -51.9999 2.78871 -51.9999 6.22878ZM265.669 74.7456C262.229 74.7456 259.44 71.9568 259.44 68.5168C259.44 65.0767 262.229 62.288 265.669 62.288C269.109 62.288 271.897 65.0767 271.897 68.5168C271.897 71.9568 269.109 74.7456 265.669 74.7456ZM197.152 68.5168C197.152 71.9568 199.941 74.7456 203.381 74.7456C206.821 74.7456 209.609 71.9568 209.609 68.5168C209.609 65.0767 206.821 62.288 203.381 62.288C199.941 62.288 197.152 65.0767 197.152 68.5168ZM141.093 74.7456C137.653 74.7456 134.864 71.9568 134.864 68.5168C134.864 65.0767 137.653 62.288 141.093 62.288C144.533 62.288 147.322 65.0767 147.322 68.5168C147.322 71.9568 144.533 74.7456 141.093 74.7456ZM72.576 68.5168C72.576 71.9568 75.3647 74.7456 78.8048 74.7456C82.2449 74.7456 85.0336 71.9568 85.0336 68.5168C85.0336 65.0767 82.2449 62.288 78.8048 62.288C75.3647 62.288 72.576 65.0767 72.576 68.5168ZM16.5168 74.7455C13.0767 74.7455 10.288 71.9568 10.288 68.5168C10.288 65.0767 13.0767 62.288 16.5168 62.288C19.9569 62.288 22.7456 65.0767 22.7456 68.5168C22.7456 71.9568 19.9569 74.7455 16.5168 74.7455ZM-51.9999 68.5167C-51.9999 71.9568 -49.2112 74.7455 -45.7712 74.7455C-42.3311 74.7455 -39.5424 71.9568 -39.5424 68.5167C-39.5424 65.0767 -42.3311 62.288 -45.7712 62.288C-49.2112 62.288 -51.9999 65.0767 -51.9999 68.5167Z" fill="#BDB6FF" fill-opacity="0.39"/>
        </svg>
    </div>
</section>
<?php endif; ?>          