<?php

add_action('init','int_apoio_post_type');
function int_apoio_post_type(){
  $labels=array(
    'add_new'=>_x('Adicionar nova empresa que apoia','apoio'),
    'add_new_item'=>_x('Adicionar nova empresa que apoia','apoio'),
    'edit_item'=>_x('Editar empresa que apoia','apoio'),
    'menu_name'=>_x('Empresas que apoiam','apoio'),
    'name'=>_x('Empresas que apoiam','apoio'),
    'new_item'=>_x('Nova empresa que apoia','apoio'),
    'not_found'=>_x('Empresas que apoiam nam encontrado','apoio'),
    'not_found_in_trash'=>_x('Empresas que apoiam nam encontrado na lixeira','apoio'),
    'search_items'=>_x('Pesquisar de empresas que apoiam','apoio'),
    'singular_name'=>_x('Empresa que apoia','apoio'),
    'view_item'=>_x('Ver empresa que apoia','apoio')
  );
  $args=array(
    'labels'=>$labels,
    'publicly_queryable'  =>  false,
    'menu_icon' => 'dashicons-networking',
    'menu_position'=>4,
    'public'=>true,
  );
  register_post_type('apoio',$args);
}

function remove_content_post_type_apoio() {
    remove_post_type_support( 'apoio', 'editor' );
}
add_action( 'init', 'remove_content_post_type_apoio' );

?>