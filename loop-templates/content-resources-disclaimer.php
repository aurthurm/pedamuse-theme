<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package pedamuse
 */

?>

<article <?php post_class( 'resources-disclaimer' ); ?> id="post-<?php the_ID(); ?>">

	<div class="card-block">

		<div class="entry-content card-text">

			<?php
			the_content();
			?>

		</div><!-- .entry-content -->

	</div>

</article>
