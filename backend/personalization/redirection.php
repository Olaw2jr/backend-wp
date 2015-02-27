<?php

	// Redirection
	//-------------------------------------------------------------------------------------	


	// logout_redirect_home()
	//-------------------------------------------------------------------------------------
	function logout_redirect_home($user){
	
		wp_redirect( home_url()  );
		exit();
	}
	//add_action('wp_logout','logout_redirect_home');


?>