<?php
/**
 *
 * The Pins (Blog) template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pedamuse
 */

get_header();

$container   = get_theme_mod( 'pedamuse_container_type' );
$sidebar_pos = get_theme_mod( 'pedamuse_sidebar_position' );
$blog_type = get_theme_mod( 'pedamuse_blog_type' );
?>

<?php if ( is_front_page() || ( is_front_page() && is_home() ) ) : ?>
	<?php get_template_part( 'global-templates/hero', 'none' ); ?>
<?php endif; ?>



<div class="wrapper" id="wrapper-index">

	<div class=" container <?php // echo esc_html( $container ); ?>" id="content" tabindex="-1">

		<?php

			switch ($blog_type) {

			    case "double": ?>

					<div class="row">

						<div class="col-md-12 content-area" id="primary">

							<main class="site-main" id="main">
								<!-- some into or quote before main blog listing -->
								<?php get_template_part( 'loop-templates/content', 'quotez' ); ?>
								<!-- / some into or quote before main blog listing -->
								

								<?php if ( have_posts() ) : ?>

									<div class="blog-double">

										<?php while ( have_posts() ) : the_post(); ?>

											<?php get_template_part( 'loop-templates/content', 'double' ); ?>

										<?php endwhile; ?>

									</div> <!-- / blog-double -->

								<?php else : ?>

									<?php get_template_part( 'loop-templates/content', 'none' ); ?>

								<?php endif; ?>

							</main><!-- #main -->

						<!-- The pagination component -->
						<?php pedamuse_pagination(); ?>

						</div><!-- #primary -->

					</div><!-- .row -->


				<?php  
			        break;
			    default: ?>

					<div class="row">

						<!-- Do the left sidebar check and opens the primary div -->
						<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

						<main class="site-main" id="main">

							<!-- some into or quote before main blog listing -->
							<?php get_template_part( 'loop-templates/content', 'quotez' ); ?>
							<!-- / some into or quote before main blog listing -->
							
							<hr>

							<?php if ( have_posts() ) : ?>

								<?php if ( 'pins' === $blog_type ) : ?>
								<div class="card-columns">
								<?php endif; ?>

									<?php while ( have_posts() ) : the_post(); ?>

										<?php

										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										if ( 'pins' === $blog_type ) :

										get_template_part( 'loop-templates/content', 'pins' );

										else :

										get_template_part( 'loop-templates/content', get_post_format() );

										endif;

										?>

									<?php endwhile; ?>

								<?php if ( 'pins' === $blog_type ) : ?>
								</div> <!-- / card-columns -->
								<?php endif; ?>

							<?php else : ?>

								<?php get_template_part( 'loop-templates/content', 'none' ); ?>

							<?php endif; ?>

						</main><!-- #main -->

						<!-- The pagination component -->
						<?php pedamuse_pagination(); ?>

						</div><!-- #primary -->

						<!-- Do the right sidebar check -->
						<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

							<?php get_sidebar( 'right' ); ?>

						<?php endif; ?>

					</div><!-- .row -->


				<?php
			}
		?>

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>





