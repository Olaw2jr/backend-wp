<?php

	// Post Type
	// http://generatewp.com/post-type/
	//-------------------------------------------------------------------------------------


	// Register Custom Video
	function custom_post_type_video() {
	
		$labels = array(
			'name'                => _x( 'Videos', 'Video General Name', 'cube_domain' ),
			'singular_name'       => _x( 'Video', 'Video Singular Name', 'cube_domain' ),
			'menu_name'           => __( 'Video', 'cube_domain' ),
			'parent_item_colon'   => __( 'Parent Item:', 'cube_domain' ),
			'all_items'           => __( 'All Items', 'cube_domain' ),
			'view_item'           => __( 'View Item', 'cube_domain' ),
			'add_new_item'        => __( 'Add New Item', 'cube_domain' ),
			'add_new'             => __( 'Add New', 'cube_domain' ),
			'edit_item'           => __( 'Edit Item', 'cube_domain' ),
			'update_item'         => __( 'Update Item', 'cube_domain' ),
			'search_items'        => __( 'Search Item', 'cube_domain' ),
			'not_found'           => __( 'Not found', 'cube_domain' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'cube_domain' ),
		);
		$rewrite = array(
			'slug'                => 'video',
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'post_type', 'cube_domain' ),
			'description'         => __( 'Video Description', 'cube_domain' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt',  'author', 'thumbnail', 'comments', 'revisions', 'page-attributes', ),
			'taxonomies'          => array(),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-format-video',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'page',
		);
		register_post_type( 'video', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'custom_post_type_video', 0 );
	
	
	
	
	
	
	/*
	function my_project_updated_send_email( $post_id ) {
	
	
		$topics = get_post( $post_id  );
	
	
	show_var_dump( $topics );
	
		
		wp_set_post_terms( $post_id, '20', 'taxo_video_type', true );
		
		echo "save post";
		
	}
	add_action( 'save_post', 'my_project_updated_send_email' );
	*/













?>