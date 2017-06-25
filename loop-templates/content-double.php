<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package pedamuse
 */

?>

<article <?php post_class( 'card' ); ?>  id="post-<?php the_ID(); ?>" >

	<?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'card-img-top' ) ); ?>

	<div class="card-block">

		<header class="entry-header">

			<?php the_title( sprintf( '<h4 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h4>' ); ?>


			<?php if ( 'post' == get_post_type() ) : ?>

				<h6 class="entry-meta card-subtitle mb-2 text-muted">
					<?php pedamuse_posted_on(); ?>
				</h6><!-- .entry-meta -->

			<?php endif; ?>
			
		</header><!-- .entry-header -->

		<div class="entry-content card-text">

			<?php
			the_excerpt();
			?>
			
		</div><!-- .entry-content -->

	</div>
</article>