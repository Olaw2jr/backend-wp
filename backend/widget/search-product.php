<?php

class My_Widget_search_product extends WP_Widget {

	public function __construct() {
		// widget actual processes
		
		parent::__construct(
		// Base ID of your widget
		'cubebrush_widget_search_product', 
		
		// Widget name will appear in UI
		__('CubeBrush - Search Product', 'widget_domain'), 
		
		// Widget description
		array( 'description' => __( 'Search product', 'widget_domain' ), ) 
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
?>		 
		 
		 
		 
	<?php
	
	if( isset( $_GET['search_title']) )   { $search_title  = esc_html($_GET['search_title']); }   else { $search_title  = ""; }
	
	?>
	
	<section id="box-widget-search-video-side" class="box-widget box-widget--search box-widget--margin-bottom">
	
	<div style="font-size:20px">
	
		<form class="form-search" action="?<?php echo $search_title; ?>" method="get">
		
			<input type="text" id="search_title" name="search_title" placeholder="Search" />
			<input class="btn-submit-icon" type="submit" />
		
		</form>		
		
		<?php
		
		global $post;
		
		$args = array(
			'post_type'        => 'product', 
			'post_status'      => 'publish', 
			'orderby'          => 'meta_value_num',
			'order'            => 'DESC',
			'meta_key'         => 'total_sales',			
			'suppress_filters' => false, 
			'posts_per_page'   => 5,
			'meta_query' => array(
				array(
					'key'     => '_visibility',
					'value'   => array( 'catalog', 'visible' ),
					'compare' => 'IN',
				),
			),			
		);
		$products_populars = get_posts( $args );
		
		?>
		
		<?php if( !empty($products_populars) ): ?>
		
			<div class="box-widget__head padding-h">
				<p class="box-widget__title pull-left">Popular Items</p>
			</div>	
			
			<ul class="list-criteria-search">
				<?php foreach( $products_populars as $post ): ?>
				
					<?php setup_postdata($post);	 ?>
					
					<li class="<?php echo the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	
				<?php endforeach; ?>
			</ul>	
		
		<?php endif; ?>
		
		
		<?php
		
		$args = array(
			'post_type'        => 'product', 
			'post_status'      => 'publish', 
			'orderby'          => 'date',
			'suppress_filters' => false, 
			'posts_per_page'   => 5,
			'meta_query' => array(
				array(
					'key'     => '_visibility',
					'value'   => array( 'catalog', 'visible' ),
					'compare' => 'IN',
				),
			),			
		);
		$products_news = get_posts( $args );
		
		?>
		
		<?php if( !empty($products_news) ): ?>
		
			<div class="box-widget__head padding-h">
				<p class="box-widget__title pull-left">New items</p>
			</div>	
			
			<ul class="list-criteria-search">
				<?php foreach( $products_news as $post ): ?>
				
					<?php setup_postdata($post);	 ?>
	
					<li class="<?php echo the_ID(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
	
				<?php endforeach; ?>
			</ul>	
		
		<?php endif; ?>
		
	</div>
	</section>

<?php		 
		 	 
	}

}
register_widget( 'My_Widget_search_product' );

?>