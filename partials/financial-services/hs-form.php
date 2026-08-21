<?php
// $script_handle = "financial-services-hs-form-js";
// wp_enqueue_script(
//     $script_handle,
//     get_template_directory_uri() . "/js/partials-min/financial-services-hs-form.min.js",
//     array("jquery"),
//     null,
//     true
// );
/**
 * 
 * Partial Name: how-to-hire-it
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$cta = get_field('request_advice', 'option');
?>
<?php
// Definir las configuraciones del formulario según parte de la URL.
$forms = [
        "/agenda-demo-condominios/" => [
                'portalId' => '20854675',
                'formId' => '725fe76c-bca3-4fe8-b2d9-06032fa38048',
                'region' => 'na1',
        ],
        "/agenda-demo-rentas/" => [
                'portalId' => '20854675',
                'formId' => '87cb95ea-749a-432a-a1c3-e58799839cc7',
                'region' => 'na1',
        ],
];

// Obtener la URL actual
$url_actual = $_SERVER['REQUEST_URI'];

// Buscar coincidencia parcial
$form_to_render = null;
foreach ($forms as $path => $form_data) {
    if (strpos($url_actual, $path) !== false) {
        $form_to_render = $form_data;
        break;
    }
}

$form_dom_id = wp_unique_id('financial-services-form-');
$form_endpoint = '';
$submit_endpoint = '';

if ($form_to_render) {
    $form_endpoint = rest_url(
        'neivor/v1/hubspot-form/' .
        rawurlencode($form_to_render['portalId']) .
        '/' .
        rawurlencode($form_to_render['formId']) .
        '?region=' .
        rawurlencode($form_to_render['region'])
    );
    $submit_endpoint = rest_url('neivor/v1/hubspot-subscribe');

    wp_enqueue_script(
        'home-v2-banner-js',
        get_template_directory_uri() . '/js/partials-min/home-v2-banner.min.js',
        array(),
        null,
        true
    );
}
?>

<section class="hsform-partial-8190bc">
    <?php if ($form_to_render) echo '<br/>'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php if ($form_to_render): ?>
                    <div
                        id="<?= esc_attr($form_dom_id); ?>"
                        class="form-new"
                        data-form-endpoint="<?= esc_url($form_endpoint); ?>"
                        data-submit-endpoint="<?= esc_url($submit_endpoint); ?>"
                        data-portal-id="<?= esc_attr($form_to_render['portalId']); ?>"
                        data-form-id="<?= esc_attr($form_to_render['formId']); ?>"
                        data-region="<?= esc_attr($form_to_render['region']); ?>"
                        data-submit-label="<?= esc_attr($cta['text_button'] ?? 'Enviar'); ?>"
                    ></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
