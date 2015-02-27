<?php

	// Ajax
	// Tips http://solislab.com/blog/5-tips-for-using-ajax-in-wordpress/
	// Tuto http://www.wp-spread.com/tuto-ajax-wordpress-methode-simple/
	//-------------------------------------------------------------------------------------	
	
	
	// nom_de_la_function
	//-------------------------------------------------------------------------------------		
	add_action( 'wp_ajax_nom_de_la_function', 'nom_de_la_function' );
	add_action( 'wp_ajax_nopriv_nom_de_la_function', 'nom_de_la_function' );

	function nom_de_la_function() {
		
		die();
	
	}

?>