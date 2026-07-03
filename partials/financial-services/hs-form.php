   
<?php
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
// Definir los scripts según parte de la URL
$scripts = [
    "/agenda-demo-condominios/" => "<script charset='utf-8' type='text/javascript' src='//js.hsforms.net/forms/embed/v2.js'></script>
    <script>
      hbspt.forms.create({
        portalId: '20854675',
        formId: '725fe76c-bca3-4fe8-b2d9-06032fa38048',
        region: 'na1'
      });
    </script>",
    
    "/agenda-demo-rentas/" => "<script charset='utf-8' type='text/javascript' src='//js.hsforms.net/forms/embed/v2.js'></script>
    <script>
      hbspt.forms.create({
        portalId: '20854675',
        formId: '87cb95ea-749a-432a-a1c3-e58799839cc7',
        region: 'na1'
      });
    </script>"
];

// Obtener la URL actual
$url_actual = $_SERVER['REQUEST_URI'];

// Buscar coincidencia parcial
$script_to_render = null;
foreach ($scripts as $path => $script) {
    if (strpos($url_actual, $path) !== false) {
        $script_to_render = $script;
        break;
    }
}
?>

<section class="hsform-partial-8190bc">
    <?php if ($script_to_render) echo '<br/>'; ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                // Imprimir el script correspondiente
                if ($script_to_render) {
                    echo $script_to_render;
                }
                ?>
            </div>
        </div>
    </div>
</section>
