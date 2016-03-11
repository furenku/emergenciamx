<?php



add_action( 'init', 'cpt_video' );
/**
 * Register a Video post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function cpt_video() {
	$labels = array(
		'name'               => _x( 'Videos', 'post type general name', 'emmx-textdomain' ),
		'singular_name'      => _x( 'Video', 'post type singular name', 'emmx-textdomain' ),
		'menu_name'          => _x( 'Videos', 'admin menu', 'emmx-textdomain' ),
		'name_admin_bar'     => _x( 'Video', 'add new on admin bar', 'emmx-textdomain' ),
		'add_new'            => _x( 'Add New', 'Video', 'emmx-textdomain' ),
		'add_new_item'       => __( 'Add New Video', 'emmx-textdomain' ),
		'new_item'           => __( 'New Video', 'emmx-textdomain' ),
		'edit_item'          => __( 'Edit Video', 'emmx-textdomain' ),
		'view_item'          => __( 'View Video', 'emmx-textdomain' ),
		'all_items'          => __( 'All Videos', 'emmx-textdomain' ),
		'search_items'       => __( 'Search Videos', 'emmx-textdomain' ),
		'parent_item_colon'  => __( 'Parent Videos:', 'emmx-textdomain' ),
		'not_found'          => __( 'No Videos found.', 'emmx-textdomain' ),
		'not_found_in_trash' => __( 'No Videos found in Trash.', 'emmx-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
                'description'        => __( 'Description.', 'emmx-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'Video' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'Video', $args );
}
