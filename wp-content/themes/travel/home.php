<?php
/**
 * The homee template file.
 * @package travel
 */

get_header();
$header_image = ot_get_option('header_image');
$header_description = ot_get_option('header_text');
if(empty($header_description)){
	$header_description = 'Travel like there is no tomorrow';
}
if(empty($header_image)){
	$header_image = get_template_directory_uri().'/images/header.jpg';
} ?>

<!-- Header -->

<section class="featured-header" style="background:url('<?php echo $header_image; ?>') center center; background-size: cover;">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 id="header-discription" class="header-description"><?php echo $header_description; ?></h2>
			</div>
		</div>
		<?php $recent = wp_get_recent_posts( array('numberposts' => 1));?>
		
		<a href="<?php echo get_permalink($recent[0]['ID']) ;?>" class="latest-story">LATEST STORY</a>
	</div>
</section>
<section class="listed-category">
	<div class="container">
<?php
	$categories = ot_get_option('homepage_categories');
	if(!empty($categories)){
	foreach($categories as $cat){
		$cat_detail = get_the_category_by_ID($cat);
		$category_link = get_category_link( $cat); ?>
		<div class="row categories">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-6">
						<h2 class="category-heading brand-color"><?= $cat_detail;?></h2>
					</div>

				</div>

				<!-- list 3 posts of every category -->

				<div class="row">
					<?php query_posts(array(
								'cat'  => $cat,
								'posts_per_page' => 3
						) );?>

						<?php if (have_posts()) : while (have_posts()) : the_post();?>
							<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); 
							if(empty($url)){ $url = get_template_directory_uri().'/images/feature-img.jpg';}?>
								<div class="col-sm-4">
									<div class="listed-post">
										<div class="post-feature-img" style="background:url('<?php echo $url ?>') center center; background-size: cover;"></div>
										<div class="post-info">
											<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
											<?php $excerpt =  substr(apply_filters( 'the_excerpt', get_the_excerpt() ), 0, 300);
											echo $excerpt;
											if(!empty($excerpt)){
												echo ' . . .';
											}?>
										</div>
									</div>
								</div>
						<?php endwhile; endif; ?>
				</div>

				<a class="see-all" href="<?php echo esc_url( $category_link ); ?>" title="<?= $cat_detail; ?>">SEE ALL</a>

			</div>
		</div>
	<?php } } ?>
	</div>
</section>
<?php
get_footer('subscription');
get_footer();
