<?php
/**
 * Template Name: Resources Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package pedamuse
 */

get_header();

?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="container" id="content">

		<div class="row">

			<div class="col-12 col-sm-10 offset-sm-1 col-md-10 offset-md-1 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'resources-disclaimer' ); ?>

					<?php endwhile;  // end of the loop. ?>					


						<?php get_template_part( 'loop-templates/content', 'resources' ); ?>


				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>