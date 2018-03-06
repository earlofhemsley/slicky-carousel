<?php
/**
 * Plugin Name: Slick Carousel
 * Plugin URI: http://landonhemsley.com
 * Description: Admin panel to customize a slick slider and a widget to place it.
 * Version: 1.0.0
 * Author: Landon Hemsley
 * Author URI: http://landonhemsley.com
 * License: GPL2
 */

require_once('classes/class-slick-carousel.php');

$obj = new SlickCarousel(plugin_dir_path(__FILE__), plugin_dir_url(__FILE__));
$obj->init();


?>
