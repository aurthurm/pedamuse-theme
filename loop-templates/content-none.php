<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pedamuse
 */

?>

<section class="no-results not-found">

	<header class="page-header text-center">

		<h1 class="page-title">
		<span class="alert">
			<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 			
		</span>
		<?php esc_html_e( ' Nothing Found', 'pedamuse' ); ?>
		</h1>

	</header><!-- .page-header -->

	<div class="page-content">

		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'pedamuse' ), array(
	'a' => array(
		'href' => array(),
	),
) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p>
			<?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'pedamuse'  ); ?>
			<span class="search-querry" style="display:inline !important;">
				<i class="fa fa-hand-o-right" aria-hidden="true"></i>
				<?php echo get_search_query();  ?>
				<i class="fa fa-hand-o-left" aria-hidden="true"></i>
			</span>
			<?php esc_html_e( 'Please try again with some different keywords.', 'pedamuse' ); ?>
			</p>
			<?php
				get_search_form();
		else : ?>

			<p><?php esc_html_e( 'We can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'pedamuse' ); ?></p>
			<?php
				get_search_form();
		endif; ?>
	</div><!-- .page-content -->
	
</section><!-- .no-results -->
