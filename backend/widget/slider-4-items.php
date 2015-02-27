<?php

class My_Widget_slider_4_items extends WP_Widget {

	public function __construct() {
		// widget actual processes
		
		parent::__construct(
		// Base ID of your widget
		'cubebrush_widget_slider_4_items', 
		
		// Widget name will appear in UI
		__('CubeBrush - Slider 4 items', 'widget_domain'), 
		
		// Widget description
		array( 'description' => __( 'Create a slider of videos', 'widget_domain' ), ) 
		);		 
		 
	}
	
	public function form( $instance ) {
		 // outputs the options form on admin
		 
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>

<?php		 		 
	}
	
	public function update( $new_instance, $old_instance ) {
		 // processes widget options to be saved
		 
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
   
	  return $instance;		 
	}
	
	public function widget( $args, $instance ) {
		 // outputs the content of the widget
?>		 
		 
	<div class="container">
	
	<?php
	
	global $post;
	
	$args = array(
		'post_type'        => 'video', 
		'post_status'      => 'publish', 
		'orderby'          => 'DESC',
		'posts_per_page'   => 8, 
	);
	
	$args['tax_query'] = array(
		array(
			'taxonomy' => 'taxo_video_front',
			'field'    => 'slug',
			'terms'    => array('visibility-all')
		)
	);		
	
 	$slider_video = get_transient( 'query_slider_video_transient' );
	
	// Check for transient. If none, then execute WP_Query or get_posts
	if ( false === $slider_video ) {
		
		$slider_video = get_posts( $args );
	
		// Put the results in a transient. Expire after 12 hours.
		set_transient( 'query_slider_video_transient', $slider_video, 12 * HOUR_IN_SECONDS );
	}	
		
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);

	?>
	
  <?php if( !empty($slider_video) ): ?>
	
		<?php if( !empty($title) ): ?>
		<div class="box-widget-headline">
			<h3 class="box-widget-headline__title"><?php echo $title; ?></h3>
		</div>
		<?php endif; ?>		
	
    <div id="slider-home" class="flexslider flexslider--no-skin slider-4-items">
      <ul class="slides">
      
        <?php foreach( $slider_video as $post ): ?>
        
          <?php
            
            setup_postdata($post);
            
						$meta_type_video = get_post_meta($post->ID,'_cmb_type_embed_video_main');
						$type_video = get_video_tag_type($meta_type_video);
						
            $img_url = get_thumbnail_post( "post-item-med" , "image_default_post_item_med" , $post->ID );
            
          ?>
          
            <li class="box-item box-item--margin-right box-item--show-cat">
              <a class="area" href="<?php the_permalink(); ?>">
              
              <img class="meta-image" src="<?php echo $img_url; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
              
              <div class="meta-content">
              
                <p class="meta-title"><?php the_title(); ?></p>
                <p class="meta-date"><?php the_time( get_option( 'date_format' ) ); ?> @ <?php The_time(); ?></p>
                <p class="meta-category <?php if( $type_video == "Pro" ) { echo "pro"; } ?>"><?php echo $type_video; ?></p>
              
              </div>
              
              </a>
            </li>
        
        <?php endforeach; ?>
        
        <?php wp_reset_query(); ?>
        <?php wp_reset_postdata(); ?> 
    
      </ul>
      
    </div>
    
    <div class="box-browse">
      <hr class="border-double" />
      <a class="btn btn-browse" href="/videos">Browse all videos</a>
      <hr class="border-double" />
    </div>
    
    </div>
  
  <?php endif; ?>

<?php		 
		 	 
	}

}
register_widget( 'My_Widget_slider_4_items' );

?>