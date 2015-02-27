<?php

class My_Widget_Resource_Lastest extends WP_Widget {

	public function __construct() {
		// widget actual processes
		
		parent::__construct(
		// Base ID of your widget
		'cubebrush_widget_resource_lastest', 
		
		// Widget name will appear in UI
		__('CubeBrush - Resource Lastest', 'widget_domain'), 
		
		// Widget description
		array( 'description' => __( 'Resource Lastest', 'widget_domain' ), ) 
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
			'post_type'        => 'resource', 
			'post_status'      => 'publish', 
			'order'            => 'DESC',
			'suppress_filters' => false, 
			'posts_per_page'   => 1,
		);		
		
		if( IS_A_MEMBER_PRO != true ) {
		
			$args['meta_key']   = '_cmb_resource_type';
			$args['meta_query'] = array(
				 array(
						 'key' => '_cmb_resource_type',
						 'value' => array(1),
						 'compare' => 'IN',
				 )
			);
		
		}
		
		$resource_lastest = get_posts( $args );
		
		?>
    
		<?php if( !empty($resource_lastest) ): ?>    
		
			<?php foreach ( $resource_lastest  as $post ):  ?>
        
        <?php
          setup_postdata($post);	
                
          $img_url = get_thumbnail_post( "full", "image_default_post_item_med", $post->ID );
  				$url     = "/resources/";
	
					if( !is_user_logged_in() ) {
					  $url   = "/my-account/";
					}
	
        ?>	
        
        <div class="box-item box-item--resource">
          <a class="area" href="<?php echo $url; ?>">
          
					<?php if( !empty($img_url) ): ?>
          <img class="meta-image" src="<?php echo $img_url; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
					<?php endif; ?>
          
          <div class="meta-content">
          
            <p class="meta-section">Resource</p>
            <p class="meta-title"><?php the_title(); ?></p>
          
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
register_widget( 'My_Widget_Resource_Lastest' );

?>