<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="">
		<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>
	</header>
	<div class="entry-content">
		<?php the_content();?>
	</div>
	<div class="author-info">
		<?=the_author_meta('first_name'); //get_the_author() ?> <br/>
			Published On <?php the_time('F jS, Y'); ?><br/>
			<?= the_author_meta('description');?>
			<div class="author-img">
				<?php echo get_avatar(get_the_author_meta( 'ID' )); ?>
			</div>
	</div>



</section>
