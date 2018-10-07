<?php
/**
 * The static front-page template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package pedamuse
 */

get_header();

?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero', 'none' ); ?>
<?php endif; ?>

<!-- Work Area -->
<div class="work-area">
	<h4 class="text-uppercase text-center text-muted">my line of work</h4>
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-10 offset-sm-1">
				<div class="row">
					<?php 

					$service_args = array(
					    'post_type'=> 'work_service',
					    );              

					$service_query = new WP_Query( $service_args );
					if( $service_query->have_posts() ) : 
						while ( $service_query->have_posts() ) : 
							$service_query->the_post(); ?>

								<div class="col-md-4">
									<a href="<?php echo get_post_meta( get_the_ID(), 'service_link', true ); ?>" class="card-link">
										<div class="card-block">
											<div class="card-title">
												<h5><?php echo get_post_meta( get_the_ID(), 'service_name', true ); ?></h5>
											</div>
											<div class="card-text">
												<?php echo get_post_meta( get_the_ID(), 'service_description', true ); ?>
											</div>
										</div>
									</a>
								</div>

					<?php endwhile; endif; wp_reset_query(); ?> 
				</div>
			</div>
		</div>
	</div>
</div> <!-- /Work Area -->

<!-- / Featured Space -->
<?php
function echo_spaces_image() {
    $id = get_theme_mod('pedamuse_featured_space_image');
    if ($id != 0) {
		$url = wp_get_attachment_url($id);
		echo  $url;
	} else {
		echo ""; # o u can use a default image
	}
}
# echo_spaces_image();
?>

<div class="featured-space" style="background-image: url('<?php echo_spaces_image(); ?>');">
	<div class="container-fluid">

		<div class="row ">
			<!-- Latest Post -->
			<div class="col-md-6 feature latest-post">
				<h4 class="text-uppercase">Latest Post</h4>
					<?php
						// non wordpress way : hardcore php for mimicking the exerpt
						function summaryMode($text, $limit, $link) {
						    if (str_word_count($text, 0) > $limit) {
						        $numwords = str_word_count($text, 2);
						        $pos = array_keys($numwords);
						        $text = substr($text, 0, $pos[$limit]).'... <a href="'.$link.'">Read More</a>';
						    }
						    return $text;
						}

						$args = array( 'numberposts' => '1' );
						$recent_posts = wp_get_recent_posts( $args ); ?>

					<?php foreach( $recent_posts as $recent ):
							//var_dump($recent);
							$final = summaryMode($recent["post_content"], 40, get_permalink($recent["ID"]) );
					?>

						<article class="card featured-recent-post">
							<div class="card-block">
								<h4 class="card-title">
									<a href="<?php echo  get_permalink($recent["ID"]) ?>"><?php echo $recent["post_title"]; ?> </a>
								 </h4>
								<h6 class="card-subtitle mb-2 text-muted"><?php the_date(); ?></h6>
								<p class="card-text">
									<?php echo $final;  ?>
								</p>
							</div>		
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>blog" class="btn btn-block btn-outline-info text-uppercase">all my articles</a>				

						</article>

					<?php endforeach; wp_reset_query(); ?>

			</div><!-- /Latest Post -->

			<!-- supernove toolio -->
			<div class="col-md-6 feature supernova-tool">
				<h4 class="text-uppercase">my supernova toolio</h4>
					<?php 

					$resource_args = array(
					    'post_type'=> 'resource',
			    		'posts_per_page' => 1,
					    );              

					$resource_query = new WP_Query( $resource_args );
					if( $resource_query->have_posts() ) : 
						while ( $resource_query->have_posts() ) : 
							$resource_query->the_post(); ?>

								<article class="card featured-resource">

									<div class="card-block">
										<h4 class="card-title">
											<a href="<?php  echo get_post_meta( get_the_ID(), '_resource_url', true ); ?>"  target='_blank'><?php the_title( ); ?></a>
										</h4>
										<p class="card-text">
											<?php echo get_post_meta( get_the_ID(), '_resource_description', true );  ?>
										</p>
									</div>	
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>resources" class="btn btn-block btn-outline-warning text-uppercase">my complete toolbox</a>	

								</article>

					<?php endwhile; endif; wp_reset_query(); ?>

			</div><!-- / supernove toolio -->

		</div>

	</div>
</div><!-- / Featured Space -->

<!-- home featured product      -->
<div class="featured-product">
	<div class="container-fluid">
		<?php 

		$product_args = array(
		    'post_type'=> 'featured_product',
    		'posts_per_page' => 1,
		    );              

		$product_query = new WP_Query( $product_args );
		if( $product_query->have_posts() ) : 
			while ( $product_query->have_posts() ) : 
				$product_query->the_post(); ?>

					<div class="featured-home-product">
						<h4 class="text-center text-uppercase  text-muted"> i also author </h4>
						<div class="row">
							<div class="col-md-4 f-h-p-image">
								<?php echo get_the_post_thumbnail( get_the_ID() ); ?>
							</div>
							<div class="col-md-7">
								<div class="card">
									<div class="card-block">
										<h4 class="card-title">
											<?php echo get_post_meta( get_the_ID(), 'product_name', true );  ?>
										</h4>
										<h6 class="card-subtitle mb-2 text-muted">
											<?php echo get_post_meta( get_the_ID(), 'product_lead', true );  ?>
										</h6>
										<p class="card-text">
										 <?php echo get_post_meta( get_the_ID(), 'product_description', true );  ?>
										 </p>
										<a  href="<?php echo get_post_meta( get_the_ID(), 'product_link', true );  ?>" class="btn btn-default"  target='_blank'><?php echo get_post_meta( get_the_ID(), 'product_link_text', true );  ?></a>
									</div>
								</div>

							</div>
						</div>
					</div>


	<?php endwhile; endif; wp_reset_query(); ?>


	</div>
</div><!-- / home featured product      -->

<!-- Home About -->
<?php if ( have_posts() ) : ?>

	<?php /* Start the Loop */ ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<div class="home-about" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); ?>">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 about">

						<?php the_content(); ?>

					</div>
				</div>
			</div>
		</div><!-- / Home About -->

	<?php endwhile; ?>

<?php else : ?>

	<?php echo "fill the section i your front page edit page "; ?>

<?php endif; ?>




<?php get_footer(); ?>
