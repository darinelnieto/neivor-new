<?php
/**
 * 
 * Header.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-KTR4M74');</script>
  <!-- End Google Tag Manager -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTR4M74"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>	
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); ?></title>
  <!-- <meta name="description" content=""> -->
  <meta name="author" content="Neivor">
  <meta name="viewport" content="width=device-width">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
  <?php wp_head(); ?>
  <!-- Meta Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1142590979472601');
  fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=197329169765507&ev=PageView&noscript=1"
  /></noscript>
  <?php 
    $h_scripts = get_field('heads_scripts');
    if(!empty($h_scripts)){
      foreach ( $h_scripts as $item ) {
          if ( ! empty( $item['scripts'] ) ) {
            echo $item['scripts'] . "\n";
          };
      };
    };
  ?>
</head>

<body <?php body_class(); ?>>
<div id="page"> <!-- +Page container -->

  <header id="header-wrapper">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-4 col-md-2">
          <?= get_custom_logo(); ?>
          <div class="close-submenu-movil"></div>
        </div>
        <div class="col-8 col-md-10">
          <div class="bar-menu">
            <span class="top"></span>
            <span class="center"></span>
            <span class="bottom"></span>
          </div>
          <div class="nav-contain">
              <?php get_template_part('partials/globals/nav-menu'); ?>
          </div>
        </div>
        <div class="col-12 d-block d-md-none">
          <div class="nav-menu-movil">
              <?php get_template_part('partials/globals/nav-menu-movil'); ?>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="movil-overly-sub-menu d-flex d-md-none align-items-center justify-content-between py-3 px-3">
      <a href="https://www.neivor.com/agenda-una-demo-asesoria" class="see-demo-link fw-600 p-size-16 px-3" target="_self">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="15.552" viewBox="0 0 20 15.552">
          <path id="Trazado_1" data-name="Trazado 1" d="M41.925,97.666a8.126,8.126,0,0,0-5.551,2.35,12.359,12.359,0,0,0-2.732,3.759,12.359,12.359,0,0,0,2.732,3.759,7.73,7.73,0,0,0,11.1,0,12.359,12.359,0,0,0,2.732-3.759,12.36,12.36,0,0,0-2.732-3.759A8.126,8.126,0,0,0,41.925,97.666ZM35.239,98.8a9.387,9.387,0,0,1,13.372,0,13.859,13.859,0,0,1,3.228,4.551,1.1,1.1,0,0,1,0,.854,13.823,13.823,0,0,1-3.228,4.551,9.387,9.387,0,0,1-13.372,0,13.859,13.859,0,0,1-3.228-4.551,1.1,1.1,0,0,1,0-.854A13.823,13.823,0,0,1,35.239,98.8Zm6.686,7.755a2.777,2.777,0,0,0,1.389-5.183,3.89,3.89,0,0,1-3.794,3.794A2.776,2.776,0,0,0,41.925,106.553Zm-2.763-3.069a2.2,2.2,0,0,0,.264.014,2.224,2.224,0,0,0,2.222-2.222c0-.09-.007-.177-.014-.264a2.778,2.778,0,0,0-2.468,2.468Zm1.583-3.992a4.4,4.4,0,0,1,1.177-.156,4.478,4.478,0,0,1,.9.09l.028.007a4.443,4.443,0,1,1-5.269,5.269,4.477,4.477,0,0,1,.042-2.034c.007-.024.01-.045.017-.066A4.451,4.451,0,0,1,40.741,99.5Z" transform="translate(-31.925 -96)"/>
        </svg>
        <span>Demo</span>
      </a>
      <button class="bar-menu">
        <span></span>
        <span></span>
        <span></span>
      </button>
  </div>