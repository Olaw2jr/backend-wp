<?php

class My_Widget_Random_Product_Large extends WP_Widget {

	public function __construct() {
		// widget actual processes
		
		parent::__construct(
		// Base ID of your widget
		'cubebrush_widget_random_product_large', 
		
		// Widget name will appear in UI
		__('CubeBrush - Related Product Large', 'widget_domain'), 
		
		// Widget description
		array( 'description' => __( 'Show 3 related products', 'widget_domain' ), ) 
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
		 
		global $post;
		
		$args = array(
			'post_type'        => 'product', 
			'post_status'      => 'publish', 
			'orderby'          => 'rand',
			'suppress_filters' => false, 
			'posts_per_page'   => 3,
			'post__not_in'     => array($post->ID),
			'meta_query' => array(
				array(
					'key'     => '_visibility',
					'value'   => array( 'catalog', 'visible' ),
					'compare' => 'IN',
				),
			),
		);		

		$term_list = wp_get_post_terms($post->ID, 'product_cat', array("fields" => "all"));
		
		if( !empty($term_list) ){
		
			$related = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => $term_list[0]->slug
				)
			);
			
			$args['tax_query'] = $related;
		
		}
		$product_related = get_posts( $args );
		
		if( empty($product_related) ) {
		
			$args = array(
				'post_type'        => 'product', 
				'post_status'      => 'publish', 
				'orderby'          => 'rand',
				'suppress_filters' => false, 
				'posts_per_page'   => 3,
				'post__not_in'     => array($post->ID),
				'meta_query' => array(
					array(
						'key'     => '_visibility',
						'value'   => array( 'catalog', 'visible' ),
						'compare' => 'IN',
					),
				),				
			);		
			$product_related = get_posts( $args );
		
		}
		
		extract( $args );
		// these are the widget options
		$title = apply_filters('widget_title', $instance['title']);		
		?>
    
		<?php if( !empty($product_related) ): ?>    
		
			<?php if( !empty($title) ): ?>
			<div class="box-widget-headline">
				<h3 class="box-widget-headline__title"><?php echo $title; ?></h3>
			</div>
			<?php endif; ?>					
			
      
      <div class="box-container-widget">
  
      <?php foreach ( $product_related  as $post ):  ?>
        
        <?php
          setup_postdata($post);	
                
          $img_url = get_thumbnail_post( "post-item-med-large", "image_default_post_item_large", $post->ID );
  
          $type = get_video_taxo_type( $post );	
        ?>	
        
        <div class="box-item box-item--margin-bottom box-item--large">
          <a class="area" href="<?php the_permalink(); ?>">
          
          <img class="meta-image lazy" data-original="<?php echo $img_url; ?>" alt="<?php the_title(); ?>" />
          
          <div class="meta-content">
          
            <p class="meta-title"><?php the_title(); ?></p>
            <p class="meta-date"><?php the_time( get_option( 'date_format' ) ); ?> @ <?php The_time(); ?></p>
            <p class="meta-category <?php echo $type['slug']; ?>"><?php echo $type['name']; ?></p>
          
          </div>
          
          </a>
        </div>
        
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
      <?php wp_reset_postdata(); ?> 
		</div>
    
		<?php endif; ?>
	
	
<?php		 
		 	 
	}

}
register_widget( 'My_Widget_Random_Product_Large' );

?>