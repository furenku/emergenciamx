<?php

// cpts:

include_once 'backend/cpt.php';
add_theme_support( 'post-thumbnails' );
// recursos css y js:

function emmx_enqueue_assets() {

   global $wp_styles;

   $theme = get_stylesheet_directory_uri() . "/";


   // estilos:

   wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css?family=Open+Sans:700,300' );
   wp_enqueue_style( 'slick-css', $theme . 'bower_components/slick-carousel/slick/slick.css' );
   wp_enqueue_style( 'slick-theme', $theme . 'bower_components/slick-carousel/slick/slick-theme.css' );
   wp_enqueue_style( 'font-awesome', $theme . 'bower_components/font-awesome/css/font-awesome.min.css' );

   wp_enqueue_style( 'emmx', $theme . 'css/app.css' );


   // escriptos:

   wp_enqueue_script( 'jquery', $theme . "bower_components/jquery/dist/jquery.js" );
   wp_enqueue_script( 'what-input', $theme . "bower_components/what-input/what-input.js" );
   wp_enqueue_script( 'foundation', $theme . "bower_components/foundation-sites/dist/foundation.js" );
   wp_enqueue_script( 'isotope', $theme . "bower_components/isotope/dist/isotope.pkgd.min.js" );
   wp_enqueue_script( 'imgLiquid', $theme . "bower_components/imgLiquid/js/imgLiquid-min.js" );
   wp_enqueue_script( 'slick', $theme . "bower_components/slick-carousel/slick/slick.min.js" );
   wp_enqueue_script( 'frontendutils', $theme . "js/frontendutils.js" );
   wp_enqueue_script( 'app', $theme . "js/app.js" );

   wp_enqueue_style( 'emmx', $theme . 'css/app.css' );

}

add_action( 'wp_enqueue_scripts', 'emmx_enqueue_assets' );
