<?php get_header(); ?>
<section class="catergory-list">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<?php
					if ( have_posts() ) : ?>
						<h2 id="header-discription" class="category-heading brand-color">
						<?php $title = str_replace('Category:','', get_the_archive_title());?></h2>

								<!--
								//split words 
								$title = explode(" ",str_replace('Category:','', get_the_archive_title()));
										$title_first = $title[1];//first word
										if(isset($title[2])){
											$title_second = $title[2]; second word 
										}
										echo "<h2>$title_first</h2>"; -->
							<?php the_archive_description( '<div class="cat-desc">', '</div>' );
						?>
					<div class="row">
						<?php 	$i = 1;
							while ( have_posts() ) : the_post();?>
								<div class="col-sm-4">
						<?php		get_template_part( 'template-parts/content', get_post_format() ); ?>
								</div>
						<?php 	if($i % 3 == 0){ ?>
									<div class="clearfix"></div>
						<?php 	} $i++;
							endwhile;?>
					</div>
					<?php echo paginate_links( array('total'  => 2,'prev_next' => false)); ?>
					<?php else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div>
		</div>
</section>
<?php
get_footer('subscription');
get_footer();
