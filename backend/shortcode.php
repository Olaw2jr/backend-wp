<?php


/*

[teacher_profile_large class_css="" img_url="/wp-content/uploads/2014/06/Marc.jpg" name="Marc Brunet" content="founder of cubebrush.com and main content creator" link_url="http://bluefley.deviantart.com/" link_title="bluefley.deviantart.com/"]


=============================================================*/
function teacher_profile_teacher_profile_large( $atts, $content = null  ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'class_css'  => 'last-row',
			'img_url'    => 'http://placehold.it/80x80',
			'name'       => 'Marc Brunet',
			'content'    => 'Rhoncus non mi et, tincidunt vehicula orci..',
			'link_url'   => '#',
			'link_title' => 'Title link',			
		), $atts )
	);
	
	// Code
	return '<div class="profile  '.  $atts['class_css'] .'"><img src="'.  $atts['img_url'] .'" alt="" /> <div class="profile__content"><p class="profile_title">'.  $atts['name'] .'</p> <p class="profile_msg"> '.  $atts['content'] .'</p><p class="profile__link"><a href="'.  $atts['link_url'] .'" target="_blank">'.  $atts['link_title'] .'</a></p></div></div>';
}
add_shortcode( 'teacher_profile_large', 'teacher_profile_teacher_profile_large' );




/*

[teacher_profile class_css="" img_url="http://placehold.it/80x80" name="Marc Brunet2" content="urna, rhoncus non mi et, tincidunt vehicula orci.." link_url="http://www.sycra.net/" link_title="http://www.sycra.net/"]

[teacher_profile class_css="last-row" img_url="http://placehold.it/80x80" name="Marc Brunet2" content="urna, rhoncus non mi et, tincidunt vehicula orci.." link_url="http://www.sycra.net/" link_title="http://www.sycra.net/"]

=============================================================*/
function teacher_profile_teacher_profile( $atts, $content = null  ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'class_css'  => 'last-row',
			'img_url'    => 'http://placehold.it/80x80',
			'name'       => 'Marc Brunet',
			'content'    => 'Rhoncus non mi et, tincidunt vehicula orci..',
			'link_url'   => '#',
			'link_title' => 'Title link',			
		), $atts )
	);
	
	// Code
	return '<div class="profile profile--small '.  $atts['class_css'] .'"><img src="'.  $atts['img_url'] .'" alt="" /> <div class="profile__content"><p class="profile_title">'.  $atts['name'] .'</p> <p class="profile_msg"> '.  $atts['content'] .'</p><p class="profile__link"><a href="'.  $atts['link_url'] .'" target="_blank">'.  $atts['link_title'] .'</a></p></div></div>';
}
add_shortcode( 'teacher_profile', 'teacher_profile_teacher_profile' );




/*

[btn_video_preview_youtube code="u6APCbWxbyU" title="Watch Preview"]

=============================================================*/
function video_preview_youtube( $atts, $content = null  ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'code'  => "",		
			'title' => "Watch Preview",	
		), $atts )
	);
	
	if( !empty($atts['code']) ) {
	
		$html = '<a class="btn color-black fancybox-video fancybox.iframe" href="http://www.youtube.com/embed/'.  $atts['code'] .'?autoplay=1">'.  $atts['title'] .'</a>';
	
	}
	else {
	
		$html ="";
		
	}
	
	// Code
	return $html;
}
add_shortcode( 'btn_video_preview_youtube', 'video_preview_youtube' );



/*

[btn_video_preview_vimeo code="96059433" title="Watch Preview"]

=============================================================*/
function video_preview_vimeo( $atts, $content = null  ) {

	// Attributes
	extract( shortcode_atts(
		array(
			'code'  => "",		
			'title' => "Watch Preview",	
		), $atts )
	);
	
	
	if( !empty($atts['code']) ) {
	
		$html = '<a class="btn color-black fancybox-video fancybox.iframe" href="//player.vimeo.com/video/'.  $atts['code'] .'">'.  $atts['title'] .'</a>';
	
	}
	else {
	
		$html ="";
		
	}
	
	// Code
	return $html;
}
add_shortcode( 'btn_video_preview_vimeo', 'video_preview_vimeo' );

/*'.  $atts['code'] .'

<a class="btn color-black fancybox-video fancybox.iframe" href="//player.vimeo.com/video/96059433">Watch Preview</a>

<a class="btn color-black fancybox-video fancybox.iframe" href="http://www.youtube.com/embed/u6APCbWxbyU?autoplay=1">Watch Preview</a>
*/

?>