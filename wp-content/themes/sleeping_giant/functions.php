<?php

// Supports
add_theme_support( 'post-thumbnails');

add_theme_support( 'menus' );


// Image sizes
add_image_size( 'icon', 120, 120, true );

add_image_size( 'medium', 800, 600, true );

add_image_size( 'logo', 200, 200 );


// Register Menus
function register_theme_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
      'hamburger-menu' => __( 'Hamburger Menu' )
    )
  );
}
add_action( 'init', 'register_theme_menus');

// Enable Options Tab
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page();
}

// Set up Style References
function sg_theme_styles(){

  wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize-min.css');
  wp_enqueue_style( 'main', get_template_directory_uri() . '/style.css');
  wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700|Open+Sans:400,400i,700' );

}
add_action( 'wp_enqueue_scripts', 'sg_theme_styles' );

// Set up Script References
function sg_theme_js(){

  wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main-min.js', array('jquery'), '', true );

}
add_action('wp_enqueue_scripts', 'sg_theme_js' );

// Register Widget
function sleeping_giant_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Blog Sidebar', 'sleeping_giant' ),
    'id'            => 'sidebar-1',
    'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'sleeping_giant' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'sleeping_giant_widgets_init' );


// Add Editor back to default Posts page
function fix_no_editor_on_posts_page($post) {

   if( $post->ID != get_option( 'page_for_posts' ) ) { return; }

   remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
   add_post_type_support( 'page', 'editor' );

 }

 // This is applied in a namespaced file - so amend this if you're not namespacing
 add_action( 'edit_form_after_title', 'fix_no_editor_on_posts_page', 0 );


// Remove query strings from static resources

function remove_css_js_ver( $src ) {
if( strpos( $src, '?ver=' ) )
$src = remove_query_arg( 'ver', $src );
return $src;
}
add_filter( 'style_loader_src', 'remove_css_js_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_css_js_ver', 10, 2 );
