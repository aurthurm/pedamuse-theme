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

<!-- google maps  -->

<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d92441.65921194637!2d28.6100473726823!3d-20.12100608659348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2szw!4v1499603779347" width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
<?php get_footer(); ?>