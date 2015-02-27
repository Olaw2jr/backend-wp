<?php

// Roots/Sage framework 
// https://roots.io/sage/ 
//------------------------------------------------------------------------------------- 
 
 
// add_theme_support
//-------------------------------------------------------------------------------------
# http://docs.woothemes.com/document/third-party-custom-theme-compatibility/
add_theme_support( 'woocommerce' );


// Personalization
//-------------------------------------------------------------------------------------
require_once locate_template('/backend/personalization/cron.php'); 
require_once locate_template('/backend/personalization/redirection.php'); 
require_once locate_template('/backend/personalization/tinymce.php'); 
require_once locate_template('/backend/personalization/class-css.php'); 
require_once locate_template('/backend/personalization/search.php'); 
require_once locate_template('/backend/personalization/bbpress.php');
require_once locate_template('/backend/personalization/buddypress.php'); 
require_once locate_template('/backend/personalization/misc.php'); 
require_once locate_template('/backend/personalization/registration.php'); 
require_once locate_template('/backend/personalization/transient.php'); 


// Ajax
//-------------------------------------------------------------------------------------
require_once locate_template('/backend/ajax/single-video.php'); 


// Post Type
//-------------------------------------------------------------------------------------
require_once locate_template('/backend/post-type/video.php'); 


// Post Taxo
//-------------------------------------------------------------------------------------
require_once locate_template('/backend/taxonomy/video-type.php'); 


// Widget
//-------------------------------------------------------------------------------------
require_once locate_template('/backend/widget/most-popular-video.php'); 
require_once locate_template('/backend/widget/random-videos.php'); 
require_once locate_template('/backend/widget/random-videos-large.php'); 
require_once locate_template('/backend/widget/slider-4-items.php'); 
require_once locate_template('/backend/widget/ressources-lastest.php'); 
require_once locate_template('/backend/widget/search-video.php'); 
require_once locate_template('/backend/widget/search-product.php'); 
require_once locate_template('/backend/widget/forum-lastest-topics.php'); 
require_once locate_template('/backend/widget/related-product-large.php'); 


// Metabox ( CMB2 )
//-------------------------------------------------------------------------------------

// Backend 
if ( is_admin() ) {}

// user profile
if ( current_user_can( 'manage_options' ) ) {}


// Plugin ( Post to Post )
//-------------------------------------------------------------------------------------
require_once locate_template('/backend/post-to-post/video-to-product.php');


// Shortcode
//-------------------------------------------------------------------------------------
require_once locate_template('/backend/shortcode.php'); 


// Utils
//-------------------------------------------------------------------------------------
require_once locate_template('/backend/utils/utils.php'); 
require_once locate_template('/backend/utils/woocommerce.php'); 


?>