<?php
$script_handle = 'resources-suscription-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials-min/resources-suscription.min.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: resources-suscription
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$form = get_field('r_suscription_form', 'option');
$form_endpoint = add_query_arg(
array(
    'portalId' => $form['portal_id'] ?? '',
    'formId' => $form['form_id'] ?? '',
    'region' => $form['region'] ?? 'na1',
),
rest_url('neivor/v1/hubspot-subscribe')
);
$submit_endpoint = rest_url('neivor/v1/hubspot-subscribe');
$script_handle = "home-v2-banner-js";
$download_file = get_field('download_file');
$download_file_id = is_array($download_file) ? ($download_file['ID'] ?? 0) : 0;
$download_file_url = $download_file_id ? wp_get_attachment_url($download_file_id) : '';
$download_file_name = is_array($download_file) ? ($download_file['filename'] ?? '') : '';
?>
<div class="resources-suscription-partial-f0d979">
    <?php if(!empty($form['intro_form'])): ?>
        <p class="purple-light t-size-14 fw-400 mb-3"><?= $form['intro_form']; ?></p>
    <?php endif; ?>
    <div 
    class="form-new" 
    id="resources-suscription"
    data-form-endpoint="<?= esc_url($form_endpoint); ?>"
    data-submit-endpoint="<?= esc_url($submit_endpoint); ?>"
    data-portal-id="<?= esc_attr($form['portal_id'] ?? ''); ?>"
    data-form-id="<?= esc_attr($form['form_id'] ?? ''); ?>"
    data-region="<?= esc_attr($form['region'] ?? 'na1'); ?>"
    data-submit-label="<?= esc_attr($form['text_buttom_submit'] ?? 'Enviar'); ?>"
    data-download-file-url="<?= esc_url($download_file_url); ?>"
    data-download-file-name="<?= esc_attr($download_file_name); ?>"></div>
</div>