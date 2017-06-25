<?php
/**
 * Template Name: Contact Page
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

			<div class="col-md-8 offset-md-2 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>


					<!-- to include prebuilt contact form 7 form  : : you could also try class_exits('WPCF7_ContactForm')  -->
					<?php if ( function_exists( 'wpcf7_contact_form' ) ) { ?>

						<div class="pedamuse-contact7">

							<?php echo do_shortcode('[contact-form-7 title="Pedamuse Contact"]'); ?>

						</div>				  

					<?php } ?>


				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>