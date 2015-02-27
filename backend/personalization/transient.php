<?php

	// transient
	// http://www.tailored4wp.com/get-a-better-performance-with-wordpress-transients-api-501/
	// https://github.com/Seebz/Snippets/tree/master/Wordpress/plugins/purge-transients
	//-------------------------------------------------------------------------------------	

	function updateMenu()
	{
		
		delete_transient('menu_primary_navigation');
		delete_transient('menu_primary_navigation_alt');
		delete_transient('footer_navigation');
		
	}
	 
	add_action( 'wp_update_nav_menu', 'updateMenu' );

?>