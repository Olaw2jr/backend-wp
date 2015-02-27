<?php

function connection_types_video_to_video() {
   
	p2p_register_connection_type( array(
			'name'             => 'video_to_video',
			'from'             => 'video',
			'to'               => 'video',
			'cardinality'      => 'many-to-many',
			'sortable'         => 'any',
			'reciprocal'       => true,
			'self_connections' => true,
			'title' => array( 'from' => 'Video (Chapter)', 'to' => 'Video (Chapter)' )
			
			
	) );
}
add_action( 'p2p_init', 'connection_types_video_to_video' );

?>