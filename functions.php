<?php
/**
 * pedamuse functions and definitions
 *
 * @package pedamuse
 */

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 *  custom header image.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load functions to secure your WP install.
 */
require get_template_directory() . '/inc/security.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

/**
 * Load Contact Form 7 Default Form Awesomeness for page-contact.php
 */
require get_template_directory() . '/inc/contact-form7.php';

/**
 * custom Gravatar
 */

// Add a default avatar to Settings > Discussion
add_filter( 'avatar_defaults', 'add_custom_gravatar' );
if ( !function_exists('add_custom_gravatar') ) {
	function add_custom_gravatar( $avatar_defaults ) {
	 $myavatar = get_stylesheet_directory_uri() . '/img/gravatar/custom-gravatar.jpg';
	 $avatar_defaults[$myavatar] = "Custom Gravatar";
	 return $avatar_defaults;
	}
}


//Hack the default beahvior of gravatar to enable custom avatars on localhost
add_filter( 'get_avatar', 'so_14088040_localhost_avatar', 10, 5 );
function so_14088040_localhost_avatar( $avatar, $id_or_email, $size, $default, $alt )
{
    $whitelist = array( 'localhost', '127.0.0.1' );

    if( !in_array( $_SERVER['SERVER_ADDR'] , $whitelist ) )
        return $avatar;

    $doc = new DOMDocument;
    $doc->loadHTML( $avatar );
    $imgs = $doc->getElementsByTagName('img');
    if ( $imgs->length > 0 ) 
    {
        $url = urldecode( $imgs->item(0)->getAttribute('src') );
        $url2 = explode( 'd=', $url );
        $url3 = explode( '&', $url2[1] );
        $avatar= "<img src='{$url3[0]}' alt='' class='avatar avatar-64 photo' height='42' width='42' />";
    }
    return $avatar;
}