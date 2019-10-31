<?php

class ThemeMove_Popup {

	function __construct() {
		// Hook into the 'init' action
		add_action( 'init', array( $this, 'thememove_register_popup' ) );
		// Remove view & preview in post row actions
		add_filter( 'post_row_actions', array( $this, 'thememove_remove_popup_view_link' ), 10, 2 );
	}

	// Register Popup Post Type
	function thememove_register_popup() {
		if ( current_theme_supports( 'tm-popup' ) ) {

			$labels = array(
				'name'               => _x( 'Popups', 'Post Type General Name', 'tm-core' ),
				'singular_name'      => _x( 'Popup', 'Post Type Singular Name', 'tm-core' ),
				'menu_name'          => __( 'Popup', 'tm-core' ),
				'name_admin_bar'     => __( 'Popup', 'tm-core' ),
				'parent_item_colon'  => __( 'Parent Popup:', 'tm-core' ),
				'all_items'          => __( 'All Popups', 'tm-core' ),
				'add_new_item'       => __( 'Add New Popup', 'tm-core' ),
				'add_new'            => __( 'Add New', 'tm-core' ),
				'new_item'           => __( 'New Popup', 'tm-core' ),
				'edit_item'          => __( 'Edit Popup', 'tm-core' ),
				'update_item'        => __( 'Update Popup', 'tm-core' ),
				'view_item'          => __( 'View Popup', 'tm-core' ),
				'search_items'       => __( 'Search Popup', 'tm-core' ),
				'not_found'          => __( 'Not found', 'tm-core' ),
				'not_found_in_trash' => __( 'Not found in Trash', 'tm-core' ),
			);
			$args   = array(
				'label'               => __( 'tm_popup', 'tm-core' ),
				'description'         => __( 'ThemeMove Popup', 'tm-core' ),
				'labels'              => $labels,
				'supports'            => array( 'title', 'editor', ),
				'hierarchical'        => false,
				'public'              => true,
				'show_ui'             => true,
				'show_in_menu'        => true,
				'menu_position'       => 20,
				'menu_icon'           => 'dashicons-slides',
				'show_in_admin_bar'   => true,
				'show_in_nav_menus'   => false,
				'can_export'          => true,
				'has_archive'         => false,
				'exclude_from_search' => true,
				'publicly_queryable'  => false,
				'rewrite'             => false,
				'capability_type'     => 'page'
			);
			register_post_type( 'tm_popup', $args );
		}
	}

	function thememove_remove_popup_view_link( $actions ) {
		unset( $actions['inline hide-if-no-js'] );
		unset ( $actions['view'] );

		return $actions;
	}
}

new ThemeMove_Popup();