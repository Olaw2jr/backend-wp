<?php


// show_var_dump ( debugging )
//-------------------------------------------------------------------------------------
function show_var_dump( $data ) {
	
	echo "<pre>";
	var_dump( $data );
	echo "</pre>";
	
}


// get_custom_metabox ( metabox )
//
// Ex : $all_post_meta = get_post_meta( $post->ID );
//		  $metabox_box   = get_custom_metabox( $all_post_meta, '_cmb_' );	
//-------------------------------------------------------------------------------------
function get_custom_metabox( $pArray, $pPrefix ) {
	
	$array_format = array();
	
	foreach( $pArray as $key => $value ) {
		
		$pos = strpos( $key , $pPrefix );
		
		if( $pos === 0 ) {
			
			$new_key = str_replace( $pPrefix, "", $key);
			$array_format[$new_key] = $value;
		}
		
	}	
	return $array_format;
}


// excerpt_custom()
// $str -String to excerpt_custom
// $length - length to excerpt_custom
// $trailing - the trailing character, default: "..."
//-------------------------------------------------------------------------------------
function excerpt_custom($str, $length=100, $trailing='...', $striptags = true){
    if ($striptags)
        $str = strip_tags($str);

	// take off chars for the trailing
	$length -= strlen($trailing);

	if (strlen($str) > $length){
		 // string exceeded length, excerpt_custom and add trailing dots
        $str = substr($str, 0, $length);

        //Check if we have cutted a word. If so, remove this word from the returning string.
        if (substr($str, -1, 1) !== ' ') {
            $str = substr($str, 0, strrpos($str, ' ')+1);
        }

        $str .= $trailing;
	}

	return balanceTags($str);
}


?>