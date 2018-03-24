<?php
/**
 * Plugin Name: Slicky Carousel
 * Plugin URI: http://landonhemsley.com
 * Description: Admin panel to customize a slick slider and a widget with limited options to place it.
 * Version: 1.0.0
 * Author: Landon Hemsley
 * Author URI: http://landonhemsley.com
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * 
 */

require_once('classes/class-slicky-carousel.php');
$obj = new Slicky_Carousel();
$obj->init();

?>
