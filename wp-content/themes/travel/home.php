<?php
/**
 * The homee template file.
 * @package travel
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<div class="row header-image" >
            <div class="col-md-12">
            	<img id="header_image" src="<?php header_image(); ?>" alt="" />
            	<h2 id="header-discription"> <?php bloginfo('description'); ?> </h2>
            </div>    
        </div>
		<div class="grid">
			<div class="row">
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
					<h2 class="category-heading"><?= $cat_detail->name; ?></h2>
					<a href="<?php echo esc_url( $category_link ); ?>" title="<?= $cat_detail->name; ?>">See All</a>
					<!-- list 3 posts of every category -->
					<ul class="cat-posts">
						<?php query_posts(array(
							    'category_name'  => $cat->slug,
							    'posts_per_page' => 3
							) );?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							  	<li class="col-sm-3 list-posts"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
							    	<?php the_excerpt() ?>
							  	</li>
						<?php endwhile; endif; ?>
					</ul>
				<?php } ?>
				
			</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
