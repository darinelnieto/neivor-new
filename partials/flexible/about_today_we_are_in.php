   
<?php
/**
 * 
 * Partial Name: today-we-are-in
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$content = get_sub_field('today_we_are_in');
$clients = get_sub_field('clients_list');
?>
<section class="today-we-are-in-partial-5f693c">
    <div class="container">
        <div class="row map-contain">
            <div class="col-12 col-md-5 col-lg-4">
                <p><?= $content['description']; ?></p>
            </div>
            <div class="col-12 col-md-7 col-lg-8 text-center">
                <?= wp_get_attachment_image($content['map']['ID'], 'large', false, array(
                    'class' => 'map',
                    'loading' => 'lazy',
                    'decoding' => 'async',
                )); ?>
            </div>
        </div>
        <!--- Section sliders cities --->
        <?php if($clients['cities']): ?>
            <div class="row cities-contain">
                <div class="col-12">
                    <h2 class="title"><?= $clients['title']; ?></h2>
                </div>
                <?php foreach($clients['cities'] as $item): ?>
                    <div class="col-12">
                        <div class="card-city">
                            <div class="city-name-contain">
                                <p class="city-name"><?= $item['city_name']; ?></p>
                            </div>
                            <?php if($item['clients_logos']): ?>
                                <div class="logos-contain">
                                    <div class="logos-slide owl-carousel">
                                        <?php foreach($item['clients_logos'] as $logo): ?>
                                            <div class="item">
                                                <?= wp_get_attachment_image($logo['ID'], 'large', false, array(
                                                    'class' => 'logo',
                                                    'loading' => 'lazy',
                                                    'decoding' => 'async',
                                                )); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <script>
                                    $('.logos-slide').owlCarousel({
                                        autplay:false,
                                        loop:false,
                                        nav:false,
                                        dots:false,
                                        margin:20,
                                        responsive:{
                                            0:{
                                                items:2
                                            },
                                            768:{
                                                items:3
                                            },
                                            991:{
                                                items:4
                                            }
                                        }
                                    }).css({'opacity':1});
                                </script>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
                    