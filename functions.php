<?php

// cpts:

include_once 'backend/cpt.php';
add_theme_support( 'post-thumbnails' );
// recursos css y js:

function emmx_enqueue_assets() {

   global $wp_styles;

   $theme = get_stylesheet_directory_uri() . "/";


   // estilos:

   wp_enqueue_style( 'opensans', 'https://fonts.googleapis.com/css?family=Lato:300,300italic,700' );

   wp_enqueue_style( 'slick-css', $theme . 'bower_components/slick-carousel/slick/slick.css' );
   wp_enqueue_style( 'slick-theme', $theme . 'bower_components/slick-carousel/slick/slick-theme.css' );
   wp_enqueue_style( 'font-awesome', $theme . 'bower_components/font-awesome/css/font-awesome.min.css' );

   wp_enqueue_style( 'emmx', $theme . 'css/app.css' );


   // escriptos:

   wp_enqueue_script( 'jquery', $theme . "bower_components/jquery/dist/jquery.js" );
   wp_enqueue_script( 'what-input', $theme . "bower_components/what-input/what-input.js" );
   wp_enqueue_script( 'foundation', $theme . "bower_components/foundation-sites/dist/foundation.js" );
   wp_enqueue_script( 'imagesLoaded', $theme . "bower_components/imagesloaded/imagesloaded.pkgd.min.js" );
   wp_enqueue_script( 'isotope', $theme . "bower_components/isotope/dist/isotope.pkgd.min.js" );
   wp_enqueue_script( 'imgLiquid', $theme . "bower_components/imgLiquid/js/imgLiquid-min.js" );
   wp_enqueue_script( 'slick', $theme . "bower_components/slick-carousel/slick/slick.min.js" );
   wp_enqueue_script( 'frontendutils', $theme . "js/frontendutils.js" );
   wp_enqueue_script( 'app', $theme . "js/app.js" );

   wp_enqueue_style( 'emmx', $theme . 'css/app.css' );

}

add_action( 'wp_enqueue_scripts', 'emmx_enqueue_assets' );






// registrar menús:


register_nav_menus( array(
   'principal' => 'Menú Principal'
) );



class emmx_menu_walker extends Walker_Nav_Menu {

   // add classes to ul sub-menus
   function start_lvl( &$output, $depth ) {
      // depth dependent classes
      $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
      $display_depth = ( $depth + 1); // because it counts the first submenu as 0
      $classes = array(
         'sub-menu',
         ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
         ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
         'menu-depth-' . $display_depth
      );
      $class_names = implode( ' ', $classes );

      // build html
      $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
   }

   // add main/sub classes to li's and links
   function start_el( &$output, $item, $depth, $args ) {
      global $wp_query;
      $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

      // depth dependent classes
      $depth_classes = array(
         ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
         ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
         ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
         'menu-item-depth-' . $depth
      );
      $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

      // passed classes
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

      // build html

      $cssClasseList = array(
         'uppercase',
         'fwb',
         'vcenter',
         'fontM',
         'p0',
         'fl',
         'w_sm_100',
         'wa_md',
         'columns',
         'end'
      );

      $cssClasses = esc_attr( implode(' ', $cssClasseList ) ) ;
      $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . ' ' . $cssClasses . '">';



      // link attributes
      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
      $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

      $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
      $args->before,
      $attributes,
      $args->link_before,
      apply_filters( 'the_title', $item->title, $item->ID ),
      $args->link_after,
      $args->after
   );

   // build html
   $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}
