<?php
/**
 * Template part for displaying page part.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travel
 */

?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<div class="col-sm-6">
			<h2 class="category-heading brand-color p-t-50">
				<?php the_title();?>
			</h2>
		</div>
	</div>

	<div class="entry-content">
		<?php the_content();?>
	</div>
</section>