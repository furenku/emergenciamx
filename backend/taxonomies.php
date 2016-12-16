<?php



add_action( 'init', 'taxonomies' );

function taxonomies() {
	taxonomies_video();
}

function taxonomies_video() {

		$labels = array(
			'name'              => _x( 'Tipos de Proyecto', 'taxonomy general name', 'emmx-textdomain' ),
			'singular_name'     => _x( 'Tipo de Proyecto', 'taxonomy singular name', 'emmx-textdomain' ),
			'search_items'      => __( 'Search Tipos de Proyecto', 'emmx-textdomain' ),
			'all_items'         => __( 'All Tipos de Proyecto', 'emmx-textdomain' ),
			'parent_item'       => __( 'Parent Tipo de Proyecto', 'emmx-textdomain' ),
			'parent_item_colon' => __( 'Parent Tipo de Proyecto:', 'emmx-textdomain' ),
			'edit_item'         => __( 'Edit Tipo de Proyecto', 'emmx-textdomain' ),
			'update_item'       => __( 'Update Tipo de Proyecto', 'emmx-textdomain' ),
			'add_new_item'      => __( 'Add New Tipo de Proyecto', 'emmx-textdomain' ),
			'new_item_name'     => __( 'New Tipo de Proyecto Name', 'emmx-textdomain' ),
			'menu_name'         => __( 'Tipo de Proyecto', 'emmx-textdomain' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'proyecto_tipo' ),
		);

		register_taxonomy( 'proyecto_tipo', array( 'proyecto' ), $args );


}
