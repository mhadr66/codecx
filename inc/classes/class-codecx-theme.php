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
        $this->set_hooks();
    }

    protected function set_hooks() {
        // actions and filters

    }
}