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
		<section>
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<?php
							if ( have_posts() ) : ?>
								<header class="page-header">
									<?php
										$title = ucfirst(str_replace('Category:','', get_the_archive_title()));
										echo "<h2>$title</h2>";
										the_archive_description( '<div class="taxonomy-description">', '</div>' );
									?>
								</header>
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
	</main>
</div>
<?php
get_footer();
