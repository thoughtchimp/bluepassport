<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travel
 */

get_header(); ?>
<section class="featured-header">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content-page', 'page' );
				endwhile; // End of the loop.
				?>
			</div>
		</div>
	</div>
</section>
<?php
get_footer();
