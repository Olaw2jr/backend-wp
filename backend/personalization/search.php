<?php

	// Search
	//-------------------------------------------------------------------------------------	


	// Search only on specify post type
	//-------------------------------------------------------------------------------------	
	function SearchFilter($query) {
	
		if ( is_search() ) {
			
			$post_type = array('video','product');
			
			if ($query->is_search) { $query->set('post_type', $post_type ); }
				
		}	
		
	return $query;
	}
	//add_filter('pre_get_posts','SearchFilter');
	

	

?>