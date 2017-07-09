<?php
/**
 * Single post partial template.
 *
 * @package pedamuse
 */

// Place Blog page ID here in order to make sure the header image stays = blog page image

?>

<article <?php post_class( 'card' ); ?> id="post-<?php the_ID(); ?>">

	<?php echo get_the_post_thumbnail( $post->ID, 'large', array( 'class' => 'card-img-top img-fluid' ) ); ?>

	<div class="card-block">

		<header class="entry-header">

			<?php the_title( sprintf( '<h4 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
			'</a></h4>' ); ?>

			<div class="author-entry">
				<div class="author-avatar pull-left">
					 <?php echo get_avatar( get_the_author_meta( 'ID' ), 32, '','' , array( 'class' => 'rounded-circle' ) ); ?>
				</div>
				<?php if ( 'post' == get_post_type() ) : ?>
					<div class="author-meta clearfix">
						<span class="posted-on">&rarr; &rarr; <?php echo get_the_date(); ?> &larr; &larr;</span>
						<span class="by-line">by <?php the_author_link(); ?>
					</div><!-- .author-meta -->
				<?php endif; ?>
			</div>

		</header><!-- .entry-header -->

		<!-- disclaimer if affiliating -->
		<?php // get_template_part( 'loop-templates/content', 'short-disclaimer' ); ?>
		<!-- / disclaimer if affiliating -->

			
		<div class="entry-content card-text">

			<?php the_content(); ?>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pedamuse' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->

		<!--<footer class="entry-footer">

			<?php // pedamuse_entry_footer(); ?>
		</footer> .entry-footer -->
		<div class="clearfix">			
			<span class="categories pull-right text-italics"><?php the_category(' '); ?> 
				<span class="tagged"><?php the_tags('Tagged: <i class="fa fa-tag"></i> ', ', ', ''); ?></span>
			</span>
		</div>

		<hr>
 
		<!-- verse  -->
		<?php get_template_part( 'loop-templates/content', 'verse' ); ?>
		<!-- / vesre -->
	</div> 

</article>