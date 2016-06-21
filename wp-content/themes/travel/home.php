<?php
/**
 * The homee template file.
 * @package travel
 */

get_header(); ?>
<!-- Header -->
<section class="featured-header" style="background:url('<?php header_image(); ?>');">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2 id="header-discription" class="header-description">Travel like there is no tomorrow</h2>
			</div>
		</div>
		<span class="latest-story">LATEST STORY</span>
	</div>
</section>
<section class="listed-category">
	<div class="container">
	<?php
		$categories = get_categories ();
		foreach ($categories as $key => $value) {
			if($value->slug == 'uncategorized'){
				unset($categories[$key]);
				break;
			}
		}
		foreach($categories as $cat){
			$cat_detail = get_category_by_slug($cat->slug);
			$category_link = get_category_link( $cat_detail->term_id ); ?>
			<div class="row">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-6">
							<h2 class="category-heading brand-color"><?=$cat_detail->name;?></h2>
						</div>
						<div class="col-sm-6 text-right">
							<a class="see-all" href="<?php echo esc_url( $category_link ); ?>" title="<?= $cat_detail->name; ?>">SEE ALL</a>
						</div>
					</div>
				</div>
					<!-- list 3 posts of every category -->
				<div class="col-sm-12">
					<div class="row">
						<?php query_posts(array(
									'category_name'  => $cat->slug,
									'posts_per_page' => 3
							) );?>

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' ); ?>
										<div class="col-sm-4">
											<div class="listed-post">
												<img class="post-feature-img" src="<?php echo $url ?>" />
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
<?php

get_footer();
