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

    public function get_menu_id( $location ) {
        // Get all the locations.
        $locations = get_nav_menu_locations();

        // Get object id by location.
        $menu_id = $locations[$location];
        
        return ! empty( $menu_id ) ? $menu_id : '';
    }

}