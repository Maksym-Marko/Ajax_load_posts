<!-- # -->
<div class="mx-one_new">
	<div class="mx-one_new_block">
		<div class="mx-img_wrap">
			<a href="<?php the_permalink(); ?>">
				<?php if( get_the_post_thumbnail_url() ):?>

					<img src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="<?php the_title(); ?>">

				<?php else: ?>

					<img src="<?php bloginfo('template_url'); ?>/images/default_new.jpg" alt="<?php the_title(); ?>">

				<?php endif?>
			</a>						
		</div>
		<span><?php echo get_the_date( 'd.m.Y' ); ?></span>
		<h2>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>						
		</h2>
		<?php the_excerpt(); ?>
	</div>
</div>
<!-- # -->