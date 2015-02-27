<?php


	function exclude_product_woocommerce($query) {
	
		$query->set('post__not_in', array(124));
		
	}
	//add_action('pre_get_posts', 'exclude_product_woocommerce');	

	function wc_registration_redirect( $redirect_to ) {
			 $redirect_to = '/my-account/';
			 return $redirect_to;
	}
	add_filter('woocommerce_registration_redirect', 'wc_registration_redirect');

	
	/*
	add_filter('woocommerce_login_redirect', 'wc_login_redirect');
	 
	function wc_login_redirect( $redirect_to ) {
			 $redirect_to = 'http://mysite.com/shop';
			 return $redirect_to;
	}
	*/
	

	// Show all product items
	if( isset( $_GET['show_product'])  ) { 
		
		$show = esc_html($_GET['show_product']);
		
		$count_products = 1000;
		
		if( $show == "all" ) {

				add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$count_products.';' ), 20 );
	
		} else {
		
				add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );
		
		}
		
	}  

	// Disable product Review
	add_filter( 'woocommerce_product_tabs', 'sb_woo_remove_reviews_tab', 98);
	
	function sb_woo_remove_reviews_tab($tabs) {
	
	 unset($tabs['reviews']);
	
	 return $tabs;
	}


	add_filter('woocommerce_show_page_title', '__return_false'); 

	function get_relation_meta( $type_relation, $post_object, $meta_key ) {
				
			// Find a connection between 2 items
			$connected_video_to_product = get_posts( array(
				'connected_type'   => $type_relation,
				'connected_items'  => $post_object,
				'nopaging'         => true,
				'suppress_filters' => false
			) );
			
			foreach ( $connected_video_to_product as $post ) {
			
				setup_postdata( $post );
				
				$meta_value = get_post_meta( $post->ID, $meta_key, true);
			
			}	
			
	return $meta_value;
	}
	
	
	function get_relation_post( $type_relation, $post_object ) {
				
			// Find a connection between 2 items
			$connected_video_to_product = get_posts( array(
				'connected_type'   => $type_relation,
				'connected_items'  => $post_object,
				'nopaging'         => true,
				'suppress_filters' => false
			) );
			
			foreach ( $connected_video_to_product as $post ) {
			
				setup_postdata( $post );
			
			}	
			
			if( empty($post) ) { $post = ""; }
			
	return $post;
	}	
	
?>