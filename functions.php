<?php

// cpts:

include_once 'backend/cpt.php';

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




/**
 * Add theme compatibility
 * @param array $themes - array of default compatible themes
 */
function emmx_theme_compat( $themes ){

	$themes['emmx'] = array(
		'post_type' => 'post',
		'taxonomy' 	=> false,
		'post_meta' => array(
			'embed' => 'video_embed_value'
		),
		'post_format'	=> 'video',
		'theme_name' 	=> 'emmx'
	);

	return $themes;
}
add_filter('yvi_youtube_theme_support', 'emmx_theme_compat');



/**
 * On bulk post import, set up all extra fields needed by the theme to flag post as video
 * @param int $post_id - ID of newly created post
 * @param array $video - array of video data returned by YouTube
 * @param false/array $theme_import - theme import configuration
 */
function emmx_post_fields( $post_id, $video, $theme_import ){
	// check if setting is to import as theme post
	if( !$theme_import ){
		return;
	}
	// look for the plugin general settings function
	if( !function_exists('yvi_get_player_settings') ){
		return;
	}

	$player_settings = yvi_get_player_settings();

	// save the width as required by theme
	update_post_meta( $post_id, 'video_width_value', $player_settings['width'] );
	// flag post as video
	update_post_meta($post_id, 'is_video_value', true);

	// for short title, if needed, uncomment below
	//update_post_meta($post_id, 'post_title_value', $video['title']);

	// for short excerpt uncomment below
	//update_post_meta($post_id, 'post_type_value', $video['description']);

}
add_action('yvi_post_insert', 'emmx_post_fields', 10, 3);
