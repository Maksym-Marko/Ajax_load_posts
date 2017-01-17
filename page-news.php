<div class="mx-archive">

	<?php
	global $post;

	$count_posts_in_page = 15;

	$args = array( 'posts_per_page' => $count_posts_in_page );

	$myposts = get_posts( $args );

	foreach( $myposts as $post ){
		setup_postdata($post);
		get_template_part( 'template-parts/content', 'news' );
	}

	//get count publish posts
	$count_posts = wp_count_posts( $type = 'post', $perm = '' )->publish;

	//set count page
	$count_page = $count_posts / $count_posts_in_page;
	$count_page = ceil( $count_page );
	
	wp_reset_postdata();
	?>

</div>

<style>
	.mx-load_img{
		position: fixed;
		width: 60px;
		height: 60px;
		display: none;
		left: 50%;
		bottom: 40px;
	}
	#MxLoad{
		position: fixed;		
		display: table;
		padding: 20px;
		left: 80%;
		bottom: 40px;
		background-color: #999;
	}
</style>
<img class="mx-load_img" src="<?php bloginfo( 'template_url' ); ?>/images/loader.gif" />

<script>
	$( document ).ready( function(){

		var documentHeight = $( document ).height(),
			heightSidebar = $( '.mx-sidebar_small' ).height(),		
	    	footerHeight = $( 'footer' ).height(),
	    	heightBlockNew;

		if( $( window ).width() >= 992 ){
	    	sizeBottom = footerHeight;
		} else{
			sizeBottom = footerHeight + heightSidebar;
		}	    

		// ajax load page
		function MxOnloadPage( newUrl ){
			$.ajax( {
				url: newUrl,
				type: 'GET',
				beforeSend: function(){
					$( '.mx-load_img' ).show();
				},
				complete: function(){
					$( '.mx-load_img' ).hide();
				},
				success: function( data ){
					$( '.mx-arhives' ).append( data );
				}
			} );
		}

		var countPage = <?php echo $count_page; ?>,
			nextPage = 1,
			loadKey = false;

		$( window ).scroll( function(){

			windowTop = $( window ).scrollTop();

			if( windowTop + sizeBottom > documentHeight ){
				
				if( loadKey == false ){
					loadKey = true;
					
					if( nextPage < countPage - 1 ){
						nextPage += 1;

						getNewPage = "http://my-domain.com/forajax/page/" + nextPage + "/";

						MxOnloadPage( getNewPage );

						console.log( nextPage );
						
						documentHeight = $( document ).height();
					}

					setTimeout( function(){
						loadKey = false;
					},500 );					

				}					

			}			
			
		} );		    

	} );
</script>