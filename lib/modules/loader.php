<?php
/**
 * Module Loader
 * @package Wordpress
 * @subpackage Brikx
 * @since 1.0
 * @author Matthew Hansen
 */

require_once get_template_directory() . '/lib/modules/core/module.php';

if ( !function_exists( 'brikx_include_modules' ) ) :
/*
 * Use 'RecursiveDirectoryIterator' if PHP Version >= 5.2.11
 */
function brikx_include_modules() {
  // Include all modules from the theme (NOT the child themes)
  $modules_path = new RecursiveDirectoryIterator( get_template_directory() . '/lib/modules/' );
  $recIterator  = new RecursiveIteratorIterator( $modules_path );
  $regex        = new RegexIterator( $recIterator, '/\/module.php$/i' );

  foreach( $regex as $item ) {
    require_once $item->getPathname();
  }
}
endif;

if ( !function_exists( 'brikx_include_modules_fallback' ) ) :
/*
 * Fallback to 'glob' if PHP Version < 5.2.11
 */
function brikx_include_modules_fallback() {
  // Include all modules from the theme (NOT the child themes)
  foreach( glob( get_template_directory() . '/lib/modules/*/module.php' ) as $module ) {
    require_once $module;
  }
}
endif;


// PHP version control
$phpversion = phpversion();
if ( version_compare( $phpversion, '5.2.11', '<' ) ) :
  brikx_include_modules();
else :
  brikx_include_modules_fallback();
endif;
