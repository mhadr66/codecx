<?php

/**
 * Theme Functions.
 * 
 * @package codecx
 */

if ( ! defined( 'CODECX_DIR_PATH' ) ) {
    define( 'CODECX_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'CODECX_DIR_URI') ) {
    define( 'CODECX_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once CODECX_DIR_PATH . '/inc/helpers/autoloader.php';
require_once CODECX_DIR_PATH . '/inc/helpers/template-tags.php';

function codecx_get_theme_instance() {
    \CODECX_THEME\Inc\CODECX_THEME::get_instance();
}

codecx_get_theme_instance();

function codecx_enqueue_scripts() {

}

add_action('wp_enqueue_scripts', 'codecx_enqueue_scripts');