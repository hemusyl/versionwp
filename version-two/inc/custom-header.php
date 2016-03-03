<?php
/**
 * Set up the WordPress core custom header feature.
 */
function versiontwo_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'versiontwo_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
        'flex-width'             => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'versiontwo_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'versiontwo_custom_header_setup' );


/**
 * Styles the header image and text displayed on the blog.
 *
 * 
 */

function versiontwo_header_css()
{
    ?>
         <style type="text/css">
             .navbar-brand a,.site-description { color:<?php echo get_theme_mod('header_textcolor'); ?> !important; }
         </style>
    <?php
}

add_action('wp_head','versiontwo_header_css');

