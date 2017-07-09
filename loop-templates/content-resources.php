<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package pedamuse
 */

?>

<div class="resources">

	<div class="container">

		<?php $loop = new WP_Query(array( 'post_type' => 'resource', 'orderby' => 'post_id', 'order' => 'ASC' )); ?>
		<?php while( $loop->have_posts() ) : $loop->the_post(); ?>

			<div class="card resource">

				<div class="row">

					<div class="col-4 text-center">

						<div class="resource-logo">

							<?php echo get_the_post_thumbnail( get_the_ID(), 'large', array( 'class' => 'card-img img-fluid' ) ); ?>

						</div>

						<div class="resource-price-os">

							<div class="row no-gutter">

								<span class="badge badge-pill badge-default d-sm-block">OS: </span>
								<span class="badge badge-pill badge-info  on-sm-block"><?php echo get_post_meta( get_the_ID(), '_resource_os', true ); ?></span>

								<span class="badge badge-pill badge-default d-sm-block">price: </span>
								<span class="badge badge-pill badge-warning  on-sm-block"><?php  echo get_post_meta( get_the_ID(), '_resource_price', true ); ?></span>

							</div>
						</div>

					</div>
					<div class="col-8">

						<header class="card-header" >

						<h4 class="card-title uppercase">
							<a href="<?php  echo get_post_meta( get_the_ID(), '_resource_url', true ); ?>"  target='_blank'><?php the_title( ); ?></a>
						</h4>	

						</header>			

						<div class="card-block resource-detail">

							<p><?php echo get_post_meta( get_the_ID(), '_resource_description', true );  ?></p>

							<div class="card-block resource-link">
								<a href="<?php  echo get_post_meta( get_the_ID(), '_resource_url', true ); ?>" class="btn btn-primary"  target='_blank'>Go get yourz &rarr;</a>
							</div>

						</div><!-- resource-detail -->

					</div>

				</div><!-- row -->	

			</div><!-- resource -->

		<?php endwhile; wp_reset_query(); ?>

	</div><!-- container -->

</div><!-- resources -->
