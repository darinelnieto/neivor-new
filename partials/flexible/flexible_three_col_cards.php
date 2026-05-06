<?php
/**
 * Flexible Builder  Three Columns Cardwrapper 
 * Layout: flexible_three_col_cards
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$title_bold    = get_sub_field('title_bold');
$description   = get_sub_field('section_description');
$cards         = get_sub_field('cards');

if ( ! $cards ) return;
?>
<section class="three-columns-card-partial-068582">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="title"><?= $title_bold ?? ''; ?></h2>
                <p class="section-desc"><?= $description; ?></p>
            </div>
        </div>
        <div class="row cards-grid">
            <?php
            $featured_card  = $cards[0] ?? null;
            $secondary_cards = array_slice( $cards, 1 );
            ?>
            <?php if ( $featured_card ) :
                $style  = $featured_card['card_style'] ?? 'dark';
                $image  = $featured_card['background_image'];
                $icon   = $featured_card['icon'];
                $cat    = $featured_card['category_label'];
                $ctitle = $featured_card['card_title'];
                $cdesc  = $featured_card['card_description'];
                $overly  = $featured_card['porcent'] ?? 0;
            ?>
            <div class="col-12 col-md-6 col-lg-7 mb-4 mb-md-0 card-col card-col--featured">
                <div class="card--<?= esc_attr( $style ); ?> card--featured">
                    <?php if ( $style === 'dark' ) : ?>
                        <?= wp_get_attachment_image( $image, 'full', false, ['class' => 'card__bg-img'] ); ?>
                        <div class="card__content card__content--dark">
                            <h3 class="card__title"><?= $ctitle ?? ''; ?></h3>
                            <p class="card__desc"><?= $cdesc ?? ''; ?></p>
                        </div>
                    <?php else : ?>
                        <?php if ( $image ) : ?><?= wp_get_attachment_image( $image, 'full', false, ['class' => 'card__bg-img'] ); ?><?php endif; ?>
                        <div class="card__content card__content--light">
                            <div class="card__meta">
                                <div class="card__icon-wrap">
                                    <?= wp_get_attachment_image( $icon, 'thumbnail', false, ['class' => 'card__icon'] ); ?>
                                </div>
                                <div class="card__info">
                                    <span class="card__category"><?=  $cat ?? '' ; ?></span>
                                    <h3 class="card__title"><?= $ctitle ?? ''; ?></h3>
                                </div>
                            </div>
                            <div class="card_bdescription">
                                <p class="card__desc"><?= $cdesc ?? ''; ?></p>
                                <span class="porcent-bar">
                                    <span class="progress" style="width: <?= $overly ?? '0'; ?>%"></span>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>

            <?php if ( $secondary_cards ) : ?>
            <div class="col-12 col-md-6 col-lg-5 card-col card-col--stack">
                <?php foreach ( $secondary_cards as $card ) :
                    $style  = $card['card_style'] ?? 'dark';
                    $image  = $card['background_image'];
                    $icon   = $card['icon'];
                    $cat    = $card['category_label'];
                    $ctitle = $card['card_title'];
                    $cdesc  = $card['card_description'];
                    $overly  = $card['porcent'] ?? 0;
                ?>
                <?php if ( $style === 'dark' ) : ?>
                    <div class="card--<?= esc_attr( $style ); ?> card--featured card__content--dark mb-4">
                        <?= wp_get_attachment_image( $image, 'full', false, array( 'class' => 'card__bg-img' )); ?>
                        <div class="card__content ">
                            <?php if ( $ctitle ) : ?><h3 class="card__title"><?= $ctitle ?? ''; ?></h3><?php endif; ?>
                            <?php if ( $cdesc ) : ?><p class="card__desc"><?= $cdesc ?? ''; ?></p><?php endif; ?>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="card">
                        <div class="card--<?= esc_attr( $style ); ?> card__content--light">
                            <?php if ( $image ) : ?><?= wp_get_attachment_image( $image, 'full', false, array( 'class' => 'card__bg-img' )); ?><?php endif; ?>
                            <div class="card__content ">
                                <div class="card__meta">
                                    <div class="card__icon-wrap">
                                        <?= wp_get_attachment_image( $icon, 'thumbnail', false, array( 'class' => 'card__icon' )); ?>
                                    </div>
                                    <div class="card__info">
                                        <span class="card__category"><?= $cat ?? ''; ?></span>
                                        <h3 class="card__title"><?= $ctitle ?? ''; ?></h3>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <p class="card__desc"><?= $cdesc ?? ''; ?></p>
                                    <span class="porcent-bar">
                                        <span class="progress" style="width: <?= $overly ?? '0'; ?>%"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
