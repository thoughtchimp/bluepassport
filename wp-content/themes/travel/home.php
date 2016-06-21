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

<section class="featured-header" style="background:url('<?php echo $header_image; ?>');">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 id="header-discription" class="header-description"><?php echo $header_description; ?></h2>
			</div>
		</div>
		<?php $recent = wp_get_recent_posts( array('numberposts' => 1));?>
		<a href="<?php echo get_permalink($recent["ID"]) ;?>" class="latest-story">LATEST STORY</a>
	</div>
</section>
<section class="listed-category">
	<div class="container">
<?php
	$categories = ot_get_option('homepage_categories');
	foreach($categories as $cat){
		$cat_detail = get_the_category_by_ID($cat);
		$category_link = get_category_link( $cat); ?>
		<div class="row categories">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-xs-6">
						<h2 class="category-heading brand-color"><?=$cat_detail;?></h2>
					</div>
					<div class="col-xs-6 text-right">
						<a class="see-all" href="<?php echo esc_url( $category_link ); ?>" title="<?= $cat_detail->name; ?>">SEE ALL</a>
					</div>
				</div>
			</div>
				<!-- list 3 posts of every category -->
			<div class="col-sm-12">
				<div class="row">
					<?php query_posts(array(
								'cat'  => $cat,
								'posts_per_page' => 3
						) );?>

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
								<div class="col-sm-4">
									<div class="listed-post">
										<div class="post-feature-img" style="background:url('<?php echo $url ?>');"></div>
<!--												<img class="post-feature-img" src="--><?php //echo $url ?><!--" />-->
										<div class="post-info">
											<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
											<?php the_excerpt() ?>
										</div>
									</div>
								</div>
						<?php endwhile; endif; ?>
				</div>
			</div>
		</div>
	<?php } ?>
	</div>
</section>
<section class="subscription-box">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2><b>FREE</b> <span class="thin-weight">SUBSCRIPTION</span></h2>
			</div>
			<div class="col-sm-4">
				<input type="text" name="name" placeholder="Name">
			</div>
			<div class="col-sm-4">
				<input type="email" name="email" placeholder="Email">
			</div>
			<div class="col-sm-4">
				<button class="btn-subscribe"> SUBSCRIBE ME</button>
			</div>
		</div>
	</div>
</section>
<?php

get_footer();
