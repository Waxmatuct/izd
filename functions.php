<?php 

add_action( 'wp_enqueue_scripts', 'izd_styles' );
add_action( 'wp_enqueue_scripts', 'jquery_lib' );

function izd_styles() {
	wp_enqueue_style( 'main', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap-min', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
	wp_enqueue_style( 'fancy-box', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css' );
}

function jquery_lib() {
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//code.jquery.com/jquery-3.4.1.min.js');
	wp_enqueue_script('jquery');
	wp_register_script( 'popper', '//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js');
	wp_enqueue_script('popper', '', array('jquery'), null, true);
	wp_register_script( 'bootstrap-min', '//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
	wp_enqueue_script('bootstrap-min', '', array('jquery'), null, true);
	wp_register_script( 'fancybox', '//cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js');
	wp_enqueue_script('fancybox', '', array('jquery'), null, true);
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
}

function wpse_enqueue_page_template_styles() {
    if ( is_page_template( 'dash-page.php' ) ) {
        wp_enqueue_style( 'dashboard', get_template_directory_uri() . '/css/dashboard.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );

require get_template_directory() . '/bootstrap-navwalker.php';

register_nav_menus( array(
    'main' => esc_html__( 'Primary', 'izd' ),
) );

/* Подключение стилей Gutenberg */
function my_gutenberg_style() {
    wp_enqueue_style('gutenberg-style', get_stylesheet_directory_uri().'/editor.css');
}
add_action('enqueue_block_editor_assets', 'my_gutenberg_style');

add_theme_support( 'custom-logo' );

//отключение jquery-migrate-min
function remove_jq_migrate( $scripts ) {
if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
$script = $scripts->registered['jquery'];
if ( $script->deps ) {
$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
}
}
}
add_action( 'wp_default_scripts', 'remove_jq_migrate' );