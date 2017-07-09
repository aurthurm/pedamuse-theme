<?php
/**
 * Partial template for quotes
 *
 * @package pedamuse
 */

?>

<?php 
	$verse_loop = new WP_Query(
		array( 
		'post_type' => 'verse', 
		'orderby' => 'rand',
		'posts_per_page' => 1,
		)
	); 
?>

<?php while( $verse_loop->have_posts() ) : $verse_loop->the_post(); ?>

	<div <?php post_class(); ?> >
		<blockquote class="card-blockquote verse">
			<p class="text-muted text-center">
				<span>
					<?php echo get_post_meta( get_the_ID(), 'verse_source', true );  ?>
				</span>
				<?php echo get_post_meta( get_the_ID(), 'verse_detail', true );  ?>			
			</p>
		</blockquote>
	</div> <!--/ into or quote -->

<?php endwhile; wp_reset_query(); ?>

