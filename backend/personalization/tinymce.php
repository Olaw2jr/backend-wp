<?php

	// tinymce
	// https://codex.buddypress.org/
	//-------------------------------------------------------------------------------------	
	
	
	// Enable editor Tinymc for comments
	//-------------------------------------------------------------------------------------	
	function gk_comment_form( $fields ) {
	
		ob_start();
		wp_editor( '', 'comment',
		array( 'teeny' => true, 
			     'tinymce' => array( 'content_css' => get_stylesheet_directory_uri() . '/assets/css/editor-front.css' ),	 
				)
		);
		$fields['comment_field'] = ob_get_clean();
		return $fields;
	}
	//add_filter( 'comment_form_defaults', 'gk_comment_form' );
	
	
	// Enable editor Tinymce HTML
	//-------------------------------------------------------------------------------------		
	function force_default_editor() {
			//allowed: tinymce, html, test
			return 'tinymce';
	}	
	//add_filter( 'wp_default_editor', 'force_default_editor' );
	
	
	
	
	
	
	
	
function your_theme_scripts(){
    // Load minified or not
    $script_suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '.dev' : '';
 
    // Deregister WordPress comment-reply script
    wp_deregister_script('comment-reply');
 
    // Register our own comment-reply script
    wp_register_script('comment-reply', get_bloginfo('template_url').'/assets/js/comment-reply.js');
}
add_action('wp_enqueue_scripts', 'your_theme_scripts');	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>