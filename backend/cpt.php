<?php



add_action( 'init', 'cpts' );

function cpts() {
	cpt_video();
	cpt_proyecto();
}



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
		'rewrite'            => array( 'slug' => 'video' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
      'taxonomies' => array('category'),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'video', $args );
}



function cpt_proyecto() {
	$labels = array(
		'name'               => _x( 'Proyectos', 'post type general name', 'emmx-textdomain' ),
		'singular_name'      => _x( 'Proyecto', 'post type singular name', 'emmx-textdomain' ),
		'menu_name'          => _x( 'Proyectos', 'admin menu', 'emmx-textdomain' ),
		'name_admin_bar'     => _x( 'Proyecto', 'add new on admin bar', 'emmx-textdomain' ),
		'add_new'            => _x( 'Add New', 'Proyecto', 'emmx-textdomain' ),
		'add_new_item'       => __( 'Add New Proyecto', 'emmx-textdomain' ),
		'new_item'           => __( 'New Proyecto', 'emmx-textdomain' ),
		'edit_item'          => __( 'Edit Proyecto', 'emmx-textdomain' ),
		'view_item'          => __( 'View Proyecto', 'emmx-textdomain' ),
		'all_items'          => __( 'All Proyectos', 'emmx-textdomain' ),
		'search_items'       => __( 'Search Proyectos', 'emmx-textdomain' ),
		'parent_item_colon'  => __( 'Parent Proyectos:', 'emmx-textdomain' ),
		'not_found'          => __( 'No Proyectos found.', 'emmx-textdomain' ),
		'not_found_in_trash' => __( 'No Proyectos found in Trash.', 'emmx-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
      'description'        => __( 'Description.', 'emmx-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'proyecto' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
      'taxonomies' => array('category'),
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'proyecto', $args );
}
