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
	<header class="">
		<?php the_title( '<h3 class="entry-title">', '</h3>' );?>

	</header>
	<div class="entry-content">
		<?php the_content();?>
	</div>
</section>
