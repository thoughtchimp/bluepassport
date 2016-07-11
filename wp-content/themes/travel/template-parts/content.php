<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
	if(empty($url)){ $url = get_template_directory_uri().'/images/feature-img.jpg';}?>
		<div class="listed-post">
			<div class="post-feature-img" style="background:url('<?php echo $url ?>')center center; background-size: cover;"></div>
			<div class="post-info">
				<h2 class="entry-title">
					<a href="<?php the_permalink() ?>"><?php
						if ( is_single() ) {
							the_title();
						} else {
							the_title( '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a>' );
						}
						?>
					</a>
				</h2>
				<?php the_excerpt();?>
			</div>
		</div>
</article>
