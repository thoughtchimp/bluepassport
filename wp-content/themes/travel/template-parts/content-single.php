<?php
/**
 * Template part for displaying single pages part.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travel
 */

?>
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="">
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); 
		echo travel_social_sharing_buttons(get_permalink(),get_the_title(),get_the_ID ());
		 ?>
	</header>
	<div class="entry-content">
		<?php the_content();?>
	</div>
	<div class="author-info">
		<?php $post_author = get_post_field( 'post_author', get_the_ID () );?>
		<?= the_author_meta('first_name',$post_author); //get_the_author() ?> <br/> 
		Published On <?php the_time('F jS, Y'); ?><br/>
		<?= the_author_meta('description',$post_author);?>
		<div class="author-img">
			<?= get_avatar($post_author); ?>
		</div>
	</div>
</section>
