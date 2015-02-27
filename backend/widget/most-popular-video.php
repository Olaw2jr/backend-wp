<?php

class My_Widget_Most_Popular_Video extends WP_Widget {

	public function __construct() {
		// widget actual processes
		
		parent::__construct(
		// Base ID of your widget
		'cubebrush_widget_popular_video', 
		
		// Widget name will appear in UI
		__('CubeBrush - Most popular video', 'widget_domain'), 
		
		// Widget description
		array( 'description' => __( 'Show the most popular video', 'widget_domain' ), ) 
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
			'orderby'          => 'meta_value_num',
			'order'            => 'DESC',
			'meta_key'         => 'views',
			'posts_per_page'   => 5, 
			'meta_query'       => array(
					 array(
							 'key' => '_cmb_type_embed_video_main',
							 'value' => array(1),
							 'compare' => 'IN',
					 )
				)	
		);
		$popular_posts = get_posts( $args );	
		
		?>
		
    <?php if( !empty($popular_posts) ): ?>
    
      <section id="box-widget-popular-video-side" class="box-widget box-widget--margin-bottom">
      
        <div class="box-widget__head margin-bottom">
          <p class="box-widget__title pull-left">Most popular videos</p>
        </div>			
      
        <ul class="box-most-popular-widget margin-bottom">
        <?php foreach( $popular_posts as $post ): ?>
        
        <?php
				setup_postdata($post);	
				
        $img_url = get_thumbnail_post( "post-square", "image_default_post_square", $post->ID );
				$views   = get_post_meta($post->ID, 'views'); 
				
		
        ?>
        
        <li>
          <a href="<?php the_permalink(); ?>">
						<img class="meta-image lazy" data-original="<?php echo $img_url; ?>" alt="<?php the_title(); ?>" />
						<div class="meta-title"><?php the_title(); ?></div>
						<div class="meta-views">Views <?php echo $views[0]; ?></div>
					</a>
        </li>
        
        <?php endforeach; ?>
        </ul>
        
        <?php wp_reset_query(); ?>
        <?php wp_reset_postdata(); ?> 			
        
        <a href="#" class="box-widget__learn-more">Go to videos</a>
      
      </section>
      
		<?php endif; ?>
		
		
<?php		 
		 	 
	}

}
register_widget( 'My_Widget_Most_Popular_Video' );

?>