<?php

/**
 * Bootstraps the Theme.
 * 
 * @package Codecx
 */

namespace CODECX_THEME\Inc;

use CODECX_THEME\Inc\Traits\Singleton;

class CODECX_THEME {
    use Singleton;

    protected function __construct() {
        
        // load class.

        Assets::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks() {
        /**
         * Actions.
         */
    }
}