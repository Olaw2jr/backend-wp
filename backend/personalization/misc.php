<?php

	// MISC
	//-------------------------------------------------------------------------------------	
	
	
	// Remove autop
	//-------------------------------------------------------------------------------------	
	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );


?>