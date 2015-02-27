<?php

class My_Widget_Random_Video extends WP_Widget {

	public function __construct() {
		// widget actual processes
		
		parent::__construct(
		// Base ID of your widget
		'cubebrush_widget_random_video', 
		
		// Widget name will appear in UI
		__('CubeBrush - Random Video', 'widget_domain'), 
		
		// Widget description
		array( 'description' => __( 'Show 2 random videos', 'widget_domain' ), ) 
		);		 
		 
	}
	
	public function form( $instance ) {
		 // outputs the options form on admin
	}
	
	public function update( $new_instance, $old_instance ) {
		 // processes widget options to be saved
	}
	
	public function widget( $args, $instance ) {
		 // outputs the content of the widget
		 
		global $post;
	
		$args = array(
			'post_type'        => 'video', 
			'post_status'      => 'publish', 
			'orderby'          => 'DESC',
			'suppress_filters' => false, 
			'posts_per_page'   => 2,
			'post__not_in'     => array($post->ID)
		);
		
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'taxo_video_front',
				'field'    => 'slug',
				'terms'    => array('visibility-all')
			)
		);				
		$video_random = get_posts( $args );
		
		?>
    
		<?php if( !empty($video_random) ): ?>    
		
			<?php foreach ( $video_random  as $post ):  ?>
        
        <?php
          setup_postdata($post);	
                
          $img_url = get_thumbnail_post( "post-item-med", "image_default_post_item_med", $post->ID );
					
					$meta_type_video = get_post_meta($post->ID,'_cmb_type_embed_video_main');
					$type_video = get_video_tag_type($meta_type_video);
        ?>	
        
        <div class="box-item box-item--margin-bottom box-item--show-cat">
          <a class="area" href="<?php the_permalink(); ?>">
          
          <img class="meta-image lazy" data-original="<?php echo $img_url; ?>" alt="<?php the_title(); ?>" />
          
          <div class="meta-content">
          
            <p class="meta-title"><?php the_title(); ?></p>
            <p class="meta-date"><?php the_time( get_option( 'date_format' ) ); ?> @ <?php The_time(); ?></p>
            <p class="meta-category <?php if( $type_video == "Pro" ) { echo "pro"; } ?>"><?php echo $type_video; ?></p>
          
          </div>
          
          </a>
        </div>
        
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
      <?php wp_reset_postdata(); ?> 
    
		<?php endif; ?>
    
<?php		 
		 	 
	}

}
register_widget( 'My_Widget_Random_Video' );

?>