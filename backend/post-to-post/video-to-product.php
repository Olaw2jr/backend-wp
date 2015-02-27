<?php

	// Plugin post-to-post
	// https://wordpress.org/plugins/posts-to-posts/
	//-------------------------------------------------------------------------------------	
	
	function connection_types_video_to_product() {
		 
		p2p_register_connection_type( array(
				'name'           => 'video_to_product',
				'from'           => 'video',
				'to'             => 'product',
				'cardinality'    => 'one-to-one',
				'title'  => array(
					'from' => __( 'This video requires the purchase of this product:', 'cube_domain' ),
					'to'   => __( 'This video requires the purchase of this product', 'cube_domain' )
				),
				'from_labels' => array(
						'singular_name' => __( 'Video', 'cube_domain' ),
						'search_items'  => __( 'Search Videos', 'cube_domain' ),
						'not_found'     => __( 'No Video found.', 'cube_domain' ),
						'create'        => __( 'Create a relation with a Video', 'cube_domain' ),
				),
				'to_labels' => array(
						'singular_name' => __( 'Product', 'cube_domain' ),
						'search_items'  => __( 'Search Products', 'cube_domain' ),
						'not_found'     => __( 'No Products found.', 'cube_domain' ),
						'create'        => __( 'Create a relation with a Product', 'cube_domain' ),
				),				
				
		) );
	}
	//add_action( 'p2p_init', 'connection_types_video_to_product' );


?>