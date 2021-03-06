<?php
/**
 * Bem Infinito functions and definitions
 *
 * @link http://www.didox.com.br
 *
 * @package WordPress
 * @subpackage BemInfinito
 * @since Bem Infinito 1.0
 */

add_action('after_setup_theme','wp_beminfinito_theme_setup');
function wp_beminfinito_theme_setup(){
	register_nav_menus(array(
		'main-menu'=>esc_html__('Main menu','wp-beminfinito-theme'),
	));
}

add_theme_support( 'post-thumbnails' );

require_once( __DIR__ . '/post_types/parceiros.php');
require_once( __DIR__ . '/post_types/apoio.php');
require_once( __DIR__ . '/shortcodes/apoio.php');
