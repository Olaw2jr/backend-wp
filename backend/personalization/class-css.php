<?php

	// Class CSS
	//-------------------------------------------------------------------------------------	


	// Add CSS class (body) base if user is admin or not
	//-------------------------------------------------------------------------------------	
	function check_is_admin($classes) {
	
		if ( current_user_can( 'manage_options' ) ) { $classes[] = "admin-user"; }
		else { $classes[] = "no-admin-user"; }
		
		return $classes;
	}
	add_filter('body_class', 'check_is_admin');
	

	// Add CSS class (body) base on woocommerce template
	//-------------------------------------------------------------------------------------	
	function woocommerce_paa_body_classes($classes) {
		
		$class_woocommerce = "no-woocommerce";
		
		 if( is_account_page() ) {
		
				$class_woocommerce = str_replace( "/"," ",$_SERVER["REQUEST_URI"] );
				
				if( substr($class_woocommerce, -1) == "." ) { $class_woocommerce = substr_replace($class_woocommerce ,"",-1); }
		
		 }
	
		$classes[] = $class_woocommerce;
		return $classes;
	}
	add_filter('body_class', 'woocommerce_paa_body_classes');
	
	
	
?>