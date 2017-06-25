<?php $loop = new WP_Query(array( 'post_type' => 'social_nav', 'orderby' => 'post_id', 'order' => 'ASC' )); ?>

<nav class="smallnavbar-top" >		
	<ul class="d-flex justify-content-center list-unstyled" id="">

		<?php while( $loop->have_posts() ) : $loop->the_post(); ?>

			<li class="nav-item">
				<a class="nav-link" href="<?php echo get_post_meta( get_the_ID(), 'social_link', true ); ?>" target='_blank'><i class="fa fa-<?php echo get_post_meta( get_the_ID(), 'social_select_name', true ); ?>" ></i></a>
			</li>

		<?php endwhile;wp_reset_query(); ?>

	</ul>	
</nav>