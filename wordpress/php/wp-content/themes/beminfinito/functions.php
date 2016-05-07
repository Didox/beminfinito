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

add_action('init', 'type_post_partiners');
function type_post_partiners() { 
    $labels = array(
        'name' => _x('Parceiros', 'post type general name'),
        'singular_name' => _x('Parceiro', 'post type singular name'),
        'add_new' => _x('Adicionar novo', 'Novo item'),
        'add_new_item' => __('Novo Item'),
        'edit_item' => __('Editar Item'),
        'new_item' => __('Novo Item'),
        'view_item' => __('Ver Item'),
        'search_items' => __('Procurar Itens'),
        'not_found' =>  __('Nenhum registro encontrado'),
        'not_found_in_trash' => __('Nenhum registro encontrado na lixeira'),
        'parent_item_colon' => '',
        'menu_name' => 'Parceiros');

    $args = array(
        'labels' => $labels,
        'public' => true,
        'public_queryable' => true,
        'show_ui' => true,          
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_icon'	=> 'dashicons-universal-access',
        'menu_position' => null,     
        'supports' => array('title','editor','thumbnail'));

    register_post_type( 'parceiros' , $args );
}