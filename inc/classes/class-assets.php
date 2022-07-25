<?php
/**
 * Enqueue theme assets
 * 
 * @package Codecx
 */

namespace CODECX_THEME\Inc;

use CODECX_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct() {
        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions.
         */
        add_action('wp_enqueue_scripts', [ $this, 'register_styles' ]);
        add_action('wp_enqueue_scripts', [ $this, 'register_scripts' ]);
    }

    public function register_styles() {
        // Register Styles.
        wp_register_style( 'style-css', get_stylesheet_uri(), [], filemtime( CODECX_DIR_PATH . '/style.css' ), 'all' );
        wp_register_style( 'bootstrap-css', CODECX_DIR_URI . '/assets/library/css/bootstrap.min.css', [], false, 'all' );
        
        // Enqueue Style.
        wp_enqueue_style( 'style-css' );
        wp_enqueue_style( 'bootstrap-css' );

    }

    public function register_scripts(){
        // Register Scripts.
        wp_register_script( 'main-js', CODECX_DIR_URI . '/assets/main.js', [], filemtime( CODECX_DIR_PATH . '/assets/main.js' ), true );
        wp_register_script( 'bootstrap-js', CODECX_DIR_URI . '/assets/library/js/bootstrap.min.js', [ 'jquery' ], false, true );
        
        // Enqueue Scripts.
        wp_enqueue_script( 'main-js' );
        wp_enqueue_script( 'bootstrap-js' );
    }
}