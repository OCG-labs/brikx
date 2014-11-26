<?php
/**
* Sidebar template
* @package Wordpress
* @subpackage Brikx
* @since 1.0
* @author Matthew Hansen & Bryan Haskin
*/
?>

<div id="sidebar">

  <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar( 'standard-sidebar' ) ) : endif; ?>

  </div><!-- sidebar -->
