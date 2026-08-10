<?php
/**
 * 
 * Default 404.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$error_c = get_field('error_content', 'option');
$cer = $error_c['certification'];
?>

<main id="sajo_404_error">
	<section>
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<h1 class="label"><?= $error_c['label'] ?? 'ERROR 404'; ?></h1>
					<h2 class="title"><?= $error_c['title'] ?? 'Esta puerta <br><strong class="violeta">está cerrada.</strong>' ?></h2>
					<p class="description"><?= $error_c['description'] ?? 'Despliega 8 agentes especializados desde el día uno. Sin curvas de aprendizaje, sin capacitación. La infraestructura inteligente que redefine el real estate.' ?></p>
					<a href="<?= home_url(); ?>" class="back-to-home">Volver al inicio</a>
				</div>
				<div class="col-12 col-md-6 text-center">
					<?= wp_get_attachment_image($error_c['main_image'] ?? '', 'large', false, array(
						'class' => 'error-image',
						'fetchpriority' => 'high'
					)); ?>
					<div class="certification">
						<?= wp_get_attachment_image($cer['icon'] ?? '', 'large', false, array(
							'class' => 'icon-image',
							'fetchpriority' => 'high'
						)); ?>
						<div class="texts">
							<?= $cer['texts'] ?? '<strong>Infraestructura Certificada</strong> <br>Conectando más de 50,000 unidades en tiempo real.' ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>