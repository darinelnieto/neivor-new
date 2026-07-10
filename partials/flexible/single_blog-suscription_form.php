<?php
$script_handle = "flexible-single_blog-suscription_form-js";
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . "/js/partials-min/flexible-single_blog-suscription_form.min.js",
    array("jquery"),
    null,
    true
);
?>

<?php
/**
 * 
 * Partial Name: single_blog-suscription_form
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$suscription = get_field('suscription_group', 'option');

$hubspot_embed = isset($suscription['hubspot_form']) ? (string) $suscription['hubspot_form'] : '';
$portal_id = '20854675';
$form_id = '10c4451a-86c6-47b0-bc6f-1835e50b6d59';

if ( preg_match('/portalId:\s*"([^"]+)"/', $hubspot_embed, $portal_matches) ) {
    $portal_id = $portal_matches[1];
}

if ( preg_match('/formId:\s*"([^"]+)"/', $hubspot_embed, $form_matches) ) {
    $form_id = $form_matches[1];
}

$rest_endpoint = rest_url('neivor/v1/hubspot-subscribe');
$form_dom_id = wp_unique_id('suscription-form-');
?>
<section class="single-blog-suscription-form-partial-a2128d">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card-form row align-items-center">
                    <div class="col-12 col-md-6 col-lg-7 mb-4 mb-md-0">
                        <?php if(!empty($suscription['title'])): ?>
                            <h2 class="title"><?= $suscription['title']; ?></h2>
                        <?php endif; if(!empty($suscription['description'])): ?>
                            <p class="descrption"><?= $suscription['description']; ?></p>
                        <?php endif ?>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 form-container">
                        <form
                            id="<?= $form_dom_id; ?>"
                            class="suscription-api-form"
                            data-endpoint="<?= $rest_endpoint; ?>"
                            data-portal-id="<?= $portal_id; ?>"
                            data-form-id="<?= $form_id; ?>"
                            novalidate
                        >
                            <div class="mb-3">
                                <input type="text" id="<?= $form_dom_id; ?>-full-name" name="firstname" class="form-control" placeholder="Nombre*" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" id="<?= $form_dom_id; ?>-email" name="email" class="form-control" placeholder="Email*" required>
                            </div>
                            <div class="mb-3">
                                <select id="<?= $form_dom_id; ?>-content-preference" name="contentPreference" class="form-control" required>
                                    <option value="" selected disabled>¿Qué producto te interesa?*</option>
                                    <option value="Administracion de condominios y comunidad">Administración de condominios y comunidad</option>
                                    <option value="Estrategias e inversion en rentas">Estrategias e inversión en rentas</option>
                                    <option value="Oportunidades y tendencias en preventas">Oportunidades y tendencias en preventas</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            <button type="submit" class="submit-button">Únete Ahora</button>
                            <p class="suscription-feedback mt-2 mb-0" aria-live="polite"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
                    