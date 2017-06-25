<?php
get_header();
$resources = new WP_Query(
	array( 		
		'post_type' => 'resource',		
		'order' => 'DESC',
		'orderby' => 'date'	
	) 
); 
<?php while ( $resources->have_posts() ) : $resources->the_post(); ?>
	<?php the_title(); ?>	
	<?php the_content(); ?>	
<?php endwhile; ?>