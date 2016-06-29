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
		<?php the_title( '<h3 class="p-t-20">', '</h3>' );?>
	<div class="">
		<?php the_content();?>
	</div>
</section>
