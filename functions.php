<?php

/**
* Theme Functions
* @package Wordpress
* @subpackage Brikx
* @since 1.0
* @author Matthew Hansen & Bryan Haskin
*/

function brikxFunctions() {
  require_once dirname( __FILE__ ) . '/lib/modules/loader.php'; // Loader
  $masterControl = brikx\MasterControl::getInstance();
}

add_action( 'after_setup_theme', 'brikxFunctions', 9 );

function brikx_load_main_js() {
  wp_register_script( 'main_js', get_template_directory_uri().'/main.js', array( 'jquery' ), '1.0.0', true );
  wp_enqueue_script( 'main_js' );
}

add_action( 'init', 'brikx_load_main_js', 12 );
