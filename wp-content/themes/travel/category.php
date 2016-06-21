<?php
/**
 * The template for displaying Category pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travel
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
	<?php
		//query_posts(array('posts_per_page' => 9));
		if ( have_posts() ) : ?>
			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
			//the_posts_navigation();?>
			<?php echo paginate_links( array('total'  => 2,'prev_next' => false)); ?>
		<?php else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</main>
	</div>
<?php
get_footer();
