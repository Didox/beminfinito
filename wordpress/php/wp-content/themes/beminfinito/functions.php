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