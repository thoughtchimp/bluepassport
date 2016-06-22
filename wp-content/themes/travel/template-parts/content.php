<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
		<div class="listed-post">
			<div class="post-feature-img" style="background:url('<?php echo $url ?>')center center; background-size: cover;"></div>
			<div class="post-info">
				<a href="<?php the_permalink() ?>"><?php
					if ( is_single() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} else {
						the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					}
					?>
				</a>
				<?php the_excerpt() ?>
			</div>
		</div>
</article>
