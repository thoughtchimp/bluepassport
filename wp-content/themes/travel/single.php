<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package travel
 */
get_header(); ?>
<section class="post-section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php   while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-single', get_post_format() );
					//the_post_navigation();
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				endwhile;
				?>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 class="category-heading brand-color">Related posts</h2>
			</div>
			<?php
			$my_query = new WP_Query('exclude='.get_the_ID().'&cat='.get_the_category ()[0]->term_id.'&showposts=3&orderby=rand' );
			while( $my_query->have_posts() ) {
				$my_query->the_post();?>
				<div class="col-sm-4">
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
				</div>
			<?php }
			wp_reset_query();
			?>
		</div>
	</div>
</section>

<?php
//get_sidebar();
get_footer();
