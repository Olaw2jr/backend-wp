<?php

class My_Widget_search_video extends WP_Widget {

	public function __construct() {
		// widget actual processes
		
		parent::__construct(
		// Base ID of your widget
		'cubebrush_widget_search_video', 
		
		// Widget name will appear in UI
		__('CubeBrush - Search Video', 'widget_domain'), 
		
		// Widget description
		array( 'description' => __( 'Search video', 'widget_domain' ), ) 
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
	
	$count_pages = wp_count_posts('video');
	$videos = $count_pages->publish;
	
	if( isset( $_GET['cat'])   )          { $cat           = esc_html($_GET['cat']); }             else { $cat   = "all"; }
	if( isset( $_GET['order']) )          { $order         = esc_html($_GET['order']); }           else { $order = "all"; }
	if( isset( $_GET['show'])  )          { $show          = esc_html($_GET['show']); }            else { $show  = "9"; }
	if( isset( $_GET['search_title']) )   { $search_title  = esc_html($_GET['search_title']); }    else { $search_title  = ""; }
	
	?>
	
	<section id="box-widget-search-video-side" class="box-widget box-widget--search box-widget--margin-bottom">
	
	<div style="font-size:20px">
	
		<form class="form-search" action="?<?php echo $search_title; ?>" method="get">
		
			<input type="text" id="search_title" name="search_title" placeholder="Search" />
			<input class="btn-submit-icon" type="submit" />
		
		</form>		
		
		<p class="count-videos"><?php echo $videos; ?> Videos</p>
		
		<div class="box-widget__head padding-h">
			<p class="box-widget__title pull-left">Browse by</p>
		</div>	
		
		<ul class="list-criteria-search">
			<li class="<?php if($order == "views") { echo "active"; } ?>"><a href="?cat=<?php echo $cat; ?>&order=views&show=<?php echo $show; ?>">Popularity</a></li>
			<li class="<?php if($order == "DESC") { echo "active"; } ?>"><a href="?cat=<?php echo $cat; ?>&order=DESC&show=<?php echo $show; ?>">Most recent</a></li>
		</ul>			
		
		<div class="box-widget__head padding-h">
			<p class="box-widget__title pull-left">Categories</p>
		</div>	
		
		<?php
		
		// Note : ID 40 = ALL
		
		$taxonomies = array( 
				'taxo_video_type'
		);
		
		$args = array(
				'orderby'       => 'name', 
				'order'         => 'ASC',
				'hide_empty'    => true, 
				'exclude'       => array(40), 
				'exclude_tree'  => array(), 
				'include'       => array(),
				'number'        => '', 
				'fields'        => 'all', 
				'slug'          => '', 
				'parent'         => '',
				'hierarchical'  => true, 
				'child_of'      => 0, 
				'get'           => '', 
				'name__like'    => '',
				'pad_counts'    => false, 
				'offset'        => '', 
				'search'        => '', 
				'cache_domain'  => 'core'
		);
		$taxo_videos = get_terms($taxonomies, $args); 

		?>
		
		<ul class="list-criteria-search">
			<li class="<?php if($cat == "all") { echo "active"; } ?>"><a href="?cat=all&order=<?php echo $order; ?>&show=<?php echo $show; ?>">All</a></li>
			<?php foreach( $taxo_videos as $taxo_video ): ?>

				<li class="<?php if($cat == $taxo_video->name) { echo "active"; } ?>"><a href="?cat=<?php echo $taxo_video->name; ?>&order=<?php echo $order; ?>&show=<?php echo $show; ?>"><?php echo $taxo_video->name; ?></a></li>

			<?php endforeach; ?>
		</ul>
		
	</div>
	</section>

<?php		 
		 	 
	}

}
register_widget( 'My_Widget_search_video' );

?>