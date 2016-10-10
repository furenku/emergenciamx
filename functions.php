<?php

global $posts_per_page;
$posts_per_page = 12;

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
   wp_enqueue_script( 'blazy', $theme . "bower_components/bLazy/blazy.min.js" );
   wp_enqueue_script( 'imgLiquid', $theme . "bower_components/imgLiquid/js/imgLiquid-min.js" );
   wp_enqueue_script( 'slick', $theme . "bower_components/slick-carousel/slick/slick.min.js" );
   wp_enqueue_script( 'frontendutils', $theme . "js/frontendutils.js" );

   wp_enqueue_script( 'app', $theme . "js/app.js" );

   wp_localize_script( 'app', 'emmx_ajax',
      array(
         'ajaxurl' => admin_url( 'admin-ajax.php' ),
         'get_videos_nonce' => wp_create_nonce( 'get_videos_nonce' )
      )
   );


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

      $cssClassesList = array(
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

      $cssClasses = esc_attr( implode(' ', $cssClassesList ) ) ;
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



// Rewrite of "get_the_post_thumbnail" for compatibility with jQuery LazyLoad plugin
function get_lazyload_thumbnail( $post_id = false, $size = 'post-thumbnail' ) {
   if ( $post_id ) {
      // Get the id of the attachment
      $attachment_id = get_post_thumbnail_id( $post_id );
      if ( $attachment_id ) {
         $src = wp_get_attachment_image_src( $attachment_id, $size );
         if ($src) {
            $img = get_the_post_thumbnail( $post_id, $size, array(
               'class' => 'b-lazy',
               'data-src' => $src[0],
               'src' => 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==',
               'alt'=>get_the_title()

               ) );
               return $img; // returns image tag string or '' (empty string)
            }
         }
      }
      return false; // missing either: post_id, attachment_id, or src
   }





add_action( 'wp_ajax_dynamic_load_videos', 'dynamic_load_videos' );
add_action( 'wp_ajax_nopriv_dynamic_load_videos', 'dynamic_load_videos' );

function dynamic_load_videos() {

   global $posts_per_page;

   $pageToLoad = $_GET['pageToLoad'];
   $nonce = $_GET['nonce'];
   $stop = false;

   if ( ! wp_verify_nonce( $nonce, 'get_videos_nonce' ) )
    die ( 'Acceso denegado');

   $html = NULL;


   $args = array( 'post_type'=>'video', 'posts_per_page'=> $posts_per_page, 'offset' => ( $pageToLoad * $posts_per_page ) );

   $q = new WP_Query($args);
   $i=0;

   $total = 0;
   $columns_used = 0;

   if($q->have_posts()):
      $countposts = (int) wp_count_posts('video') -> publish;
      $totalPages = floor($countposts / $posts_per_page);
      $total = ( $pageToLoad * 100 ) / $totalPages;
      ob_start();
      while($q->have_posts()):
         $q->the_post();
         $i++;

         $anno = date('Y',strtotime($post->post_date));

         $categorias = get_the_category( get_the_ID() );

         $cat_ids = array();
         $cat_names = array();

         foreach( $categorias as $categoria ) {
            array_push( $cat_ids, $categoria -> cat_ID );
            array_push( $cat_names, $categoria -> name );
         }

         $columns_next = (rand(2,5)+1);

         $columns_used += $columns_next;

         if( $columns_used >= 7 ) {
            $columns_next = ( 12 - $columns_used ) + 2;
            $columns_used = 0;
         }

         ?>



      <div class="video rel medium-<?php echo $columns_next; ?> large-<?php echo $columns_next; ?> h_<?php echo 40; ?>vh columns" data-anno="<?php echo $anno; ?>" data-categorias="<?php echo count($cat_ids)>0 ? json_encode($cat_ids) : ''; ?>">
      <!-- <div class="video rel medium-<?php echo (($i%5)+2)*2; ?> large-<?php echo (($i%2)+2); ?> h_<?php echo ( rand(1,5)+3)*5; ?>vh columns" data-anno="<?php echo $anno; ?>" data-categorias="<?php echo count($cat_ids)>0 ? json_encode($cat_ids) : ''; ?>"> -->
         <a href="<?php echo get_the_permalink(); ?>">
            <div class="imagen w_100 h_100 absUpL z-1 op0">
               <?php echo get_lazyload_thumbnail(get_the_ID(),'medium'); ?>
               <?php #echo get_the_post_thumbnail(get_the_ID(),'medium'); ?>
            </div>
            <div class="cortina w_100 h_100 abs z-1 p0 m0"></div>
            <div class="info row h_100 text-center op0">
               <!-- <div class="cortina w_100 h_100 absUpL z0"></div> -->
               <div class="info_texto w_100 h_100 absDownL z-1 white">
                  <div class="vcenter">
                     <h6 class="m0 fontL ">
                        <?php echo get_the_title(); ?>
                     </h6>
                     <span class="m0 p1 row fontXS">
                        <b>
                           <?php echo implode(", ", $cat_names); ?>
                        </b>
                     </span>
                     <span class="m0 row" class="fontS">
                        <?php echo get_the_date(); ?>
                     </span>
                  </div>
               </div>
            </div>
         </a>
      </div>

         <?php

      endwhile;

      $html = ob_get_contents();

      ob_end_clean();

   else:
      $stop = true;
      $total = 100;
   endif;

   die( json_encode( array( 'html' => $html, 'stop' => $stop , 'total' => $total )) );

}
