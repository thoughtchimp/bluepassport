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
				$cat1 = get_category_by_slug('destinations');
				$cat_name1 = ($cat1) ? $cat1->name : 'Destinations';
			?>
			<h2 class="category-heading"><?= $cat_name1; ?></h2>

    		<?php 
    			$category_link1 = get_category_link( $cat1->term_id );
    		?>
    		<a href="<?php echo esc_url( $category_link1 ); ?>" title="<?= $cat_name1; ?>">See All</a>
				<ul class="cat-posts">
					<?php $post = query_posts('category_name=destinations&showposts=3');?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						  	<li class="col-sm-3 list-posts"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						    	<?php the_excerpt() ?>
						  	</li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
			<div  class="row">
			<?php
				$cat = get_category_by_slug('travel-tips');
				$cat_name = ($cat) ? $cat->name : 'Travel-Tips';
			?>
			<h2 class="category-heading"><?= $cat_name; ?></h2>
			<?php 
    			$category_link = get_category_link( $cat->term_id );
    		?>
    		<a href="<?php echo esc_url( $category_link ); ?>" title="<?= $cat_name; ?>">See All</a>
				<ul class="cat-posts">
					<?php query_posts('category_name=travel-tips&showposts=3'); ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						  	<li class="col-sm-3 list-posts"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						    	<?php the_excerpt() ?>
						  	</li>
					<?php endwhile; endif; ?>
				</ul>
			</div>
		

		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
