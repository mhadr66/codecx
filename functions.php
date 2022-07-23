<?php

/**
 * Theme Functions.
 * 
 * @package codecx
 */

function codecx_enqueue_scripts() {

    // Register Styles.
    wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'), 'all' );
    wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/assets/library/css/bootstrap.min.css', [], false, 'all' );
    
    // Register Scripts.
    wp_register_script( 'main-js', get_template_directory_uri() . '/assets/main.js', [], filemtime(get_template_directory() . '/assets/main.js'), true );
    wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/assets/library/js/bootstrap.min.js', [ 'jquery' ], false, true );

    // Enqueue Style.
    wp_enqueue_style( 'style-css' );
    wp_enqueue_style( 'bootstrap-css' );

    // Enqueue Scripts.
    wp_enqueue_script( 'main-js' );
    wp_enqueue_script( 'bootstrap-js' );
}

add_action('wp_enqueue_scripts', 'codecx_enqueue_scripts');



// load script
function load_file(){
    wp_enqueue_style('style', get_stylesheet_uri() );
}

add_action('wp_enqueue_scripts', 'load_file');

add_theme_support('menus');

register_nav_menus(array(
    'top-menu' => __('Top Menu', 'theme')
));

function add_class_li($classes,$item,$args){
    if(isset($args->li_class)){
        $classes[] = $args->li_class;
    }
    if(isset($args->active_class) && in_array('current-menu-item', $classes)){
        $classes[] = $args->active_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_class_li', 10, 3);

function add_anchor_class($attr,$item,$args){
    if(isset($args->a_class)){
        $attr['class'] = $args->a_class;
    }
    return $attr;
}
add_filter('nav_menu_link_attributes', 'add_anchor_class', 10, 3);

// the_excerpt
function  get_excerpt_length(){
    return 50;
}

function return_excerpt_text(){
    return '';
}

add_filter('excerpt_more', 'return_excerpt_text');
add_filter('excerpt_length', 'get_excerpt_length');

?>