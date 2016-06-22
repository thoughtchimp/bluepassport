<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<div class="entry-content">
		<?php the_content();?>
	</div>
	<?php echo get_avatar(get_the_author_meta( 'ID' )); ?>
	<?=the_author_meta('first_name'); //get_the_author() ?> <br/> 
	Published On <?php the_time('F jS, Y'); ?><br/>
	<?= the_author_meta('description');?>
</section>
