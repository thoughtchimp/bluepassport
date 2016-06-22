<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package travel
 */
get_header(); ?>
<div class="container">
<?php   while ( have_posts() ) : the_post();
			get_template_part( 'template-parts/content-page', get_post_format() );
			//the_post_navigation();
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
		endwhile; 
		?>
	</div>
<div class="row">
<h3>Related posts</h3>
<?php
	$my_query = new WP_Query('exclude='.get_the_ID().'&cat='.the_category_ID(false) .'&showposts=3&orderby=rand' );
    while( $my_query->have_posts() ) {
    $my_query->the_post();?>
    <div class="col-md-4">
    	<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
    </div>
    <?php }
    wp_reset_query();
    ?>
</div>

<?php
//get_sidebar();
get_footer();
