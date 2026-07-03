<?php
$script_handle = 'press-events-js';
wp_enqueue_script(
    $script_handle,
    get_template_directory_uri() . '/js/partials/press-events.js',
    array('jquery'),
    null,
    true
);
/**
 * 
 * Partial Name: events
 * 
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}
$events = get_sub_field('events');
if($events['events_list']):
?>
<section class="events-partial-dce9fb">
    <div class="container">
        <div class="row">
            <div class="col-12 p-0">
                <?php if($events['title']): ?>
                    <h2 class="title"><?= $events['title']; ?></h2>
                <?php 
                    endif; 
                    if($events['description']):
                ?>
                    <p class="description"><?= $events['description']; ?></p>
                <?php endif; ?>
                    <div class="events-contain">
                        <div class="events-slide owl-carousel">
                            <?php foreach($events['events_list'] as $item): ?>
                                <div class="item">
                                    <a href="<?= $item['link']['url']; ?>" target="<?= $item['link']['target']; ?>">
                                        <div class="event-card">
                                            <div class="image-contain">
                                                <?= wp_get_attachment_image( $item['image']['ID'], 'full', false, array( 
                                                    'class' => 'event-image', 
                                                    'loading' => 'lazy', 
                                                    'decoding' => 'async' 
                                                ) ); ?>
                                            </div>
                                            <div class="text-contain">
                                                <h4 class="name"><?= $item['name']; ?></h4>
                                                <p class="event-description"><?= $item['description']; ?></p>
                                                <div class="see-more">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17" fill="none">
                                                        <path d="M9.41471 6.83758C10.1954 7.61825 10.1954 8.88558 9.41471 9.66758C8.63404 10.4483 7.36671 10.4483 6.58471 9.66758C5.80404 8.88692 5.80404 7.61958 6.58471 6.83758C7.36671 6.05558 8.63337 6.05558 9.41471 6.83758" stroke="#0A2540" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 8.25091C2 7.81158 2.10133 7.37691 2.29733 6.97625V6.97625C3.30733 4.91158 5.53933 3.58425 8 3.58425C10.4607 3.58425 12.6927 4.91158 13.7027 6.97625V6.97625C13.8987 7.37691 14 7.81158 14 8.25091C14 8.69025 13.8987 9.12491 13.7027 9.52558V9.52558C12.6927 11.5902 10.4607 12.9176 8 12.9176C5.53933 12.9176 3.30733 11.5902 2.29733 9.52558V9.52558C2.10133 9.12491 2 8.69025 2 8.25091Z" stroke="#0A2540" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                    <span><?= $item['link']['title']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <svg class="svg-bottom" xmlns="http://www.w3.org/2000/svg" width="1440" height="175" viewBox="0 0 1440 175" fill="none">
        <path d="M1233.18 161.499C699.001 107.326 291.923 87.1018 -44.8856 94.5173C-381.694 101.933 -402.769 15.3567 -60.9155 1.07841C280.938 -13.1998 605.641 119.363 1235.95 101.85C1866.25 84.3368 1767.37 215.673 1233.18 161.499Z" fill="url(#paint0_linear_2095_174263)" fill-opacity="0.2"/>
        <defs>
            <linearGradient id="paint0_linear_2095_174263" x1="1688.47" y1="151.984" x2="-356.638" y2="502.833" gradientUnits="userSpaceOnUse">
            <stop stop-color="#723EC7"/>
            <stop offset="1" stop-color="white" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>
</section>
<?php endif; ?>      