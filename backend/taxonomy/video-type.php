<?php

	// Taxonomy
	// http://generatewp.com/taxonomy/
	//-------------------------------------------------------------------------------------


	// Register Custom Taxonomy
	function taxonomy_video_type()  {
		$labels = array(
			'name'                       => _x( 'Video categories ', 'Taxonomy General Name', 'cube_domain' ),
			'singular_name'              => _x( 'Video categories ', 'Taxonomy Singular Name', 'cube_domain' ),
			'menu_name'                  => __( 'Categories ', 'cube_domain' ),
			'all_items'                  => __( 'All Video categories ', 'cube_domain' ),
			'parent_item'                => __( 'Parent Video categories ', 'cube_domain' ),
			'parent_item_colon'          => __( 'Parent Video categories :', 'cube_domain' ),
			'new_item_name'              => __( 'Video categories ', 'cube_domain' ),
			'add_new_item'               => __( 'Add New Video categories ', 'cube_domain' ),
			'edit_item'                  => __( 'Edit Video categories ', 'cube_domain' ),
			'update_item'                => __( 'Update Video categories ', 'cube_domain' ),
			'separate_items_with_commas' => __( 'Separate Video categories  with commas', 'cube_domain' ),
			'search_items'               => __( 'Search Video categories ', 'cube_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Video categories ', 'cube_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used Video categories ', 'cube_domain' ),
		);
	
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
		);
	
		register_taxonomy( 'taxo_video_type', array('video'), $args );
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'taxonomy_video_type', 0 );
	

	/**
	 * Define default terms for custom taxonomies in WordPress 3.0.1
	 *
	 * @author    Michael Fields     http://wordpress.mfields.org/
	 * @props     John P. Bloch      http://www.johnpbloch.com/
	 *
	 * @since     2010-09-13
	 * @alter     2010-09-14
	 *
	 * @license   GPLv2
	 */
	function set_default_object_terms_post_video( $post_id, $post ) {
	
		if ( 'publish' === $post->post_status && 'video' == $post->post_type ) {
		}
				$defaults = array(
						'taxo_video_type' => array( 'all' ),
						);
						
				$taxonomies = get_object_taxonomies( $post->post_type );
				foreach ( (array) $taxonomies as $taxonomy ) {
						$terms = wp_get_post_terms( $post_id, $taxonomy );
						if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
								wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
						}
				}
		
			
	}
	add_action( 'save_post_video', 'set_default_object_terms_post_video', 100, 2 );
	


?>