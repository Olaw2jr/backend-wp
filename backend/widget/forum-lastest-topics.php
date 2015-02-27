<?php

class My_Widget_forum_lastest_topics extends WP_Widget {

	public function __construct() {
		// widget actual processes
		
		parent::__construct(
		// Base ID of your widget
		'cubebrush_widget_forum_lastest_topics', 
		
		// Widget name will appear in UI
		__('CubeBrush - Forum Lastest topics', 'widget_domain'), 
		
		// Widget description
		array( 'description' => __( 'Show lastest topcis (forum)', 'widget_domain' ), ) 
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

	global $post;	
	
	$exclude_section = array();

	if( IS_A_MEMBER_PRO == true ) {
		$exclude_section = array(136,383,387);
	}	
	
	$args = array(
		'post_type'        => 'reply', 
		'post_status'      => 'publish', 
		"orderby"          => 'date',
		"orderby"          => 'DESC',
		'suppress_filters' => false, 
		'posts_per_page'   => 10, // test queries
	);
	
	$transient_name = "forum-lastest-replies";
	$replies        = get_transient($transient_name);
	
	if(false === $replies) {
		
		// parameter echo will return the menu instead of echoing it
		$replies = get_posts( $args );	
		set_transient($transient_name, $replies, 5 * MINUTE_IN_SECONDS );
		
	}		
	//$replies = get_posts( $args );		
	
	
	
	
	
	if( !empty($replies) ) {
		
		foreach( $replies as $reply ) {
			$tmp[] = $reply->post_parent;
		}
		$reply_parent = array_unique($tmp);
	
		$args = array(
			'post_type'        => 'topic', 
			'post_status'      => 'publish',
			'post__in'         => $reply_parent,
			'orderby'          => 'post__in',
			'suppress_filters' => false, 
			'posts_per_page'   => 5,
		);
		
		$transient_name = "forum-lastest-topics";
		$topics         = get_transient($transient_name);
		
		if(false === $topics) {
			
			// parameter echo will return the menu instead of echoing it
			$topics = get_posts( $args );	
			set_transient($transient_name, $topics, 5 * MINUTE_IN_SECONDS );
			
		}		
		//$topics = get_posts( $args );		
	
	}
	
	?>
  
  <?php if( !empty($replies) ): ?>

    <section id="box-forum-lastest-topics">
    <div class="box-widget box-widget--margin-bottom">
    
      <div class="box-widget__head">
        <p class="box-widget__title pull-left">COMMUNITY POSTS</p>
      </div>
      
      <ul class="box-forum-lastest-topics">
      <?php foreach( $topics as $post ): ?>
      
        <?php
          setup_postdata( $post ); 
        ?>
				
				<?php if( !in_array($post->post_parent,$exclude_section) ): ?>		
        
        <li class="post-<?php the_ID(); ?>">
          <div class="">
            <a href="<?php the_permalink(); ?>">
              <?php echo get_avatar( get_the_author_meta('email') , 50 ); ?>
              <div class="metas">
                <p class="meta-title"><?php the_title(); ?></p>
                <p class="meta-author"><?php the_author(); ?></p>
              </div>
            </a>
          </div>
        
        </li>
				
				<?php endif; ?>
      
      <?php endforeach; ?>
      
      </ul>
      
      <a href="/forums" class="box-widget__learn-more box-widget__learn-more--top pull-right">GO TO FORUMS</a>
  
    </div>
    </section>
  
	<?php endif; ?>

	
<?php wp_reset_query(); ?>
<?php wp_reset_postdata(); ?> 



















<?php		 
		 	 
	}

}
register_widget( 'My_Widget_forum_lastest_topics' );

?>