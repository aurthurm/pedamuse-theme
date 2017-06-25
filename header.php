<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package pedamuse
 */

$container = get_theme_mod( 'pedamuse_container_type' );

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->


		<?php if( ( is_front_page() && get_header_image() ) || ( is_front_page() && is_home() && get_header_image() ) ) : ?>

		<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" style="background-image: url('<?php header_image(); ?>');">

		<?php elseif ( has_post_thumbnail() && !is_front_page() && !is_home() ) : ?>

		<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-repeat: no-repeat; background-size: cover !important; background-position: center center !important;">		    
		 
		 <?php elseif( is_home() && get_option('page_for_posts') ) : ?>

		 	<?php
		 	// $blog_home_id = get_option( 'page_for_posts' );
		 	$blog_title = get_the_title( get_option('page_for_posts') );
		    $img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full'); 
		  	$featured_image = $img[0];
			?>

			<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar" style="background-image: url('<?php echo  $featured_image; ?>'); background-repeat: no-repeat; background-size: cover !important; background-position: center center !important;">		    
		 
		<?php else: ?>

		<div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

		<?php endif; ?>

		<!-- social navigation -->
		<?php get_template_part( 'global-templates/social', 'nav' ); ?>	
		<!-- /social navigation -->

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'pedamuse' ); ?></a>

		<nav class="navbar navbar-toggleable-sm text-uppercase navbar-dark main-nav">

		<?php if ( 'container' == $container ) : ?>
			<div class="container">
		<?php endif; ?>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							
						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						
						<?php endif; ?>
						
					
					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse text-minibold',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'nav navbar-nav ml-sm-auto text-minibold',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new WP_Bootstrap_Navwalker(),
					)
				); ?>

				<!--  header search icon  -->
				<div id="search-toggler" class="pedamuse-search-icon-contaner clearfix">
					<div class="pedamuse-search-icon clearfix">
						<i class="fa fa-search"></i>
					</div>
				</div><!-- / header search icon  -->
					
			<?php if ( 'container' == $container ) : ?>
			</div>			<!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

		<!-- header search form  -->
		<div id="pedamuseSearch" class="pedamuse-search-contaner clearfix">
			<div class="pedamuse-search-box clearfix">
				<?php get_search_form(); ?>
			</div>
		</div><!-- / header search form  -->

		<?php if( ( is_front_page() && get_header_image() ) || ( is_front_page() && is_home() && get_header_image() ) ) : ?>

			<section class="page-info img-fluid front-page-home">

				<div class="page-info-overlay overlay-image  img-fluid text-center">
					<div class="text-center header-site-image">

					<?php
					function echo_overlay_image() {
					    $id = get_theme_mod('pedamuse_image_featurette');
					    if ($id != 0) {
        					$url = wp_get_attachment_url($id);
        					echo '<img src="' . $url . '" alt="" class="rounded-circle" alt="Header Logo"/>';
        				} else {
        					echo "no image";
        				}
					}
					echo_overlay_image();
					?>
					
					</div>

					<div class="text-center header-entry-meta">
						<p class="first-meta">
							<?php echo get_theme_mod( 'pedamuse_message_small', true ); ?>
						</p>
						<p class="text-uppercase text-bold">
							<?php echo get_theme_mod( 'pedamuse_message_bigger', true ); ?>
						</p>
					</div>

					<div class="btn-group text-center d-flex justify-content-center header-links" role="group">
						<a class="btn btn-primary btn-lg" href="<?php echo get_theme_mod( 'btn_url_1', true ); ?>">
						<?php echo get_theme_mod( 'pedamuse_btn_1_txt', true ); ?>
						</a>
						<a class="btn btn-success btn-lg" href="<?php echo get_theme_mod( 'btn_url_2', true ); ?>">
							<?php echo get_theme_mod( 'pedamuse_btn_2_txt', true ); ?>
						</a>
					</div>	
				</div>

			</section>

		<?php elseif ( has_post_thumbnail() || ( is_home() && get_option('page_for_posts') ) ) :// if true $featured image from above why not use it here too :) ?>

			<section class="page-info img-fluid">

				<div class="page-info-overlay overlay-image  img-fluid text-center">
					<div class="container">
						<div class="row">
							<div class="col-md-2"></div>
							<div class="col-md-8">
									
								<?php if( is_home() && get_option('page_for_posts') ) : // we are in blog listing page ?>

									<header class="page-info-header text-uppercase">
										<h1 class="entry-title">
										<?php echo get_the_title( get_option('page_for_posts') ); ?>
											
										</h1>
									</header><!-- /header -->

									<p class="page-info-details lead text-semibold">
										<?php echo get_post_meta( get_option('page_for_posts'), 'page_header_description', true ); ?>
									</p>
									

								<?php else : // we are outside the blog listing page  ?>

									<?php if ( is_search() ) : ?>

										<header class="page-info-header  page-header text-center">
											<!-- /* translators:*/ -->

											<h1 class="page-title entry-title">
											<?php printf( __( ' <i class="fa fa-question-circle" aria-hidden="true"></i> Results 4 %s', 'pedamuse' ),
												'<span class="search-querry">' . get_search_query() . '</span>' ); ?>	
											</h1>

										</header><!-- .page-header -->

									<?php else : ?>

										<header class="page-info-header text-uppercase">
											<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
										</header><!-- /header -->
										<?php if ( is_single() ) : ?>
											<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
												<p class="header-author-meta">
													<i class="fa fa-clock-o"></i><time> <?php the_date( ); ?></time>
													<i class="fa fa-user"></i>
													<?php the_author(); ?>									
												</p>
											<?php endwhile; endif; ?>
										<?php else: ?>
										<p class="page-info-details lead text-semibold">
											<?php echo get_post_meta( get_the_ID(), 'page_header_description', true ); ?>
										</p>
										<?php endif; ?>

									<?php endif; ?>

								<?php endif; ?>

							</div>
						</div>
					</div>		
				</div>

			</section>

		<?php else: ?>

			<style type="text/css">
				#wrapper-navbar {
				    background-color: #2E3641 !important;
				}
			</style>
			
		<?php endif; ?>

	</div><!-- .wrapper-navbar end -->


