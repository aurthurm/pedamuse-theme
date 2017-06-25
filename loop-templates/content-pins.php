<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package pedamuse
 */

?>

<article <?php post_class( 'card blog-pins' ); ?>  id="post-<?php the_ID(); ?>" >

	<?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'card-img-top img-fluid' ) ); ?>

	<div class="card-block">

		<header class="entry-header">

			<?php the_title( sprintf( '<h4 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h4>' ); ?>

		</header><!-- .entry-header -->

		<div class="entry-content card-text">

			<?php
			the_excerpt();
			?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pedamuse' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<hr>

		<?php if ( 'post' == get_post_type() ) : ?>

			<h6 class="entry-meta card-subtitle mb-2 text-muted text-center">
				<?php pedamuse_posted_on(); ?>
			</h6><!-- .entry-meta -->

		<?php endif; ?>

	</div>
</article>