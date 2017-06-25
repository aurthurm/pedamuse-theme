<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package pedamuse
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'pedamuse_container_type' );
?>



<div class="site-footer" id="wrapper-footer">
	<div class="footer-overlay">

		<!-- Footer Site Navigation -->
		<nav class="navbar navbar-toggleable-md text-uppercase navbar-dark footer-navbar" ">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown2" aria-controls="navbarNavDropdown2" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>					
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
					'theme_location'  => 'footer',
					'container_class' => 'collapse navbar-collapse text-minibold',
					'container_id'    => 'navbarNavDropdown2',
					'menu_class'      => 'nav navbar-nav ml-sm-auto text-minibold',
					'fallback_cb'     => '',
					'menu_id'         => 'footer-menu',
					'walker'          => new WP_Bootstrap_Navwalker(),
				)
			); ?>
		</nav>	<!-- / Footer Site Navigation -->
		
		<?php if ( get_sidebar( 'footerfull' ) ) : ?>
			<div class="container" >
				<?php get_sidebar( 'footerfull' ); ?>
			</div>
		<?php endif; ?>

		<!-- social navigation -->
		<?php get_template_part( 'global-templates/social', 'nav' ); ?>	
		<!-- /social navigation -->

		<div class="copyright text-center text-muted text-small">
			<span>&copy; 2017 Theme
					<a href="<?php  echo esc_url( __( 'http://www.aurthurmusendame.com/','pedamuse' ) ); ?>">
					<?php printf( 
					esc_html__( '%s', 'pedamuse' ), $the_theme->get( 'Name' ) ); ?>
					</a>
			</span>
			<span> | Policy</span>
			<span> | Disclaimer</span>
			<span class="text-uppercase"> | Developed by <a href="//aurthurmusendame.com" title="Aurthur Musendame" class="text-italics">Aurthur Musendame</a></span>
		</div>

	</div>
</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>
