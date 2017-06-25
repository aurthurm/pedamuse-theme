<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package pedamuse
 */

get_header();
?>
<div class="wrapper" id="404-wrapper">

	<div class="container" id="content">

		<div class="row">

			<div class="col-md-10 offset-md-1 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<section class="error-404 not-found text-center">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'pedamuse' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found, A search could help otherwise try any links below!',
							'pedamuse' ); ?></p>

							<?php get_search_form(); ?>
								<br><br>	
							<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div> <!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
