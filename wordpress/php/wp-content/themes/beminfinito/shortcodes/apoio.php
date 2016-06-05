<?php
add_shortcode('apoio','apoio');
  function apoio($atts){
    $html = "<ul class='apoio'>";

    $args = array(
      'posts_per_page'   => 100,
      'orderby'          => 'title',
      'post_type'        => 'apoio',
      'post_status'      => 'publish',
      'suppress_filters' => true 
    );

    $posts_array = get_posts( $args );

    if(!empty($posts_array)){
      foreach( $posts_array as $post) {      
        $html .= '<li><a href="'.get_field('url_empresa', $post->ID).'" target="_blank" ><img src="'.get_field('imagem', $post->ID).'"></a></li>';
      }
    }

    $html .= "</ul>";

    return '<section class="step-default clearfix"><div class="wrapper apoio-box"><h2>'.$atts['titulo'].'</h2><p>'.$atts['descricao'].'</p>'.$html.'</div></section>';
  }

  add_action('register_shortcode_ui','shortcode_ui_apoio');
  function shortcode_ui_apoio(){
    shortcode_ui_register_for_shortcode('apoio',array(
      'attrs'=>array(
        array(
          'attr'=>'titulo',
          'label'=>esc_html__('Título','shortcode-ui'),
          'type'=>'text',
        ),
        array(
          'attr'=>'descricao',
          'label'=>esc_html__('Descrição','shortcode-ui'),
          'type'=>'textarea',
        )
      ),
      'label'=>'Apoio',
      'listItemImage'=>'dashicons-networking'
    ));
  }
?>