<?php
/**
 * Partial template for quotes
 *
 * @package pedamuse
 */

?>

<?php 
	$quote_loop = new WP_Query(
		array( 
		'post_type' => 'quotez', 
		'orderby' => 'rand',
		'posts_per_page' => 1,
		)
	); 
?>

<?php while( $quote_loop->have_posts() ) : $quote_loop->the_post(); ?>

	<div <?php post_class( 'quotez card card-inverse card-primary mb-3 text-center' ); ?> id="post-<?php //the_ID(); ?>">
		<div class="card-block">
			<blockquote class="card-blockquote">
				<p>
					<?php echo get_post_meta( get_the_ID(), 'quote_detail', true );  ?>
				</p>
				<footer>By 
					<cite title="Source Title">
						<?php echo get_post_meta( get_the_ID(), 'quote_source', true );  ?>
					</cite>
				</footer>
			</blockquote>
		</div>
	</div> <!--/ into or quote -->

<?php endwhile; wp_reset_query(); ?>