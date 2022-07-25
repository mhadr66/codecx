<?php
/**
 * Register Menus
 * 
 * @package Codecx
 */

namespace CODECX_THEME\Inc;

use CODECX_THEME\Inc\Traits\Singleton;

class Menus {

    use Singleton;

    protected function __construct() {
        // load class.
        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions.
         */
        add_action('init', [ $this, 'register_menus' ]);
    }

    public function register_menus() {
        register_nav_menus([
            'codecx-header-menu' => esc_html__( 'Header Menu', 'codecx' ),
            'codecx-footer-menu' => esc_html__( 'Footer Menu', 'codecx' ),
        ]);
    }

}