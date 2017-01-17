<?php
global $post;

$args = array( 'posts_per_page' => 15, 'paged' => get_query_var( 'paged' ) );

$myposts = get_posts( $args );

foreach( $myposts as $post ){
	setup_postdata($post);
	get_template_part( 'template-parts/content', 'news' );
}

wp_reset_postdata();
?>