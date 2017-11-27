<?php

// Supports
add_theme_support( 'post-thumbnails');

add_theme_support( 'menus' );


// Image sizes
add_image_size( 'icon', 120, 120, true );

add_image_size( 'medium', 800, 600, true );



function register_theme_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'hamburger-menu' => __( 'Hamburger Menu' )
    )
  );
}
add_action( 'init', 'register_theme_menus');

if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

function sg_theme_styles(){

  wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize-min.css');
  wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
  wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700|Open+Sans:400,400i,700' );

}
add_action( 'wp_enqueue_scripts', 'sg_theme_styles' );

function sg_theme_js(){

  wp_enqueue_script( 'viewport-checker', get_template_directory_uri() . '/js/jquery.viewportchecker.min.js', array('jquery'), '', true );
  wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main-min.js', array('jquery'), '', true );

}
add_action('wp_enqueue_scripts', 'sg_theme_js' );


// Remove query strings from static resources

function remove_css_js_ver( $src ) {
if( strpos( $src, '?ver=' ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_css_js_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_css_js_ver', 10, 2 );
