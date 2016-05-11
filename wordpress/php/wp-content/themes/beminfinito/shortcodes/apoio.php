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
        $html .= '<ul><img src="'.get_field('imagem', $post->ID).'"></ul>';
      }
    }

    $html .= "</ul>";

    return '<div class="apoio-box"><h3>'.$atts['titulo'].'</h3>'.$html.'</div>';
  }

  add_action('register_shortcode_ui','shortcode_ui_apoio');
  function shortcode_ui_apoio(){
    shortcode_ui_register_for_shortcode('apoio',array(
      'attrs'=>array(
        array(
          'attr'=>'titulo',
          'label'=>esc_html__('Título','shortcode-ui'),
          'type'=>'text',
        )
      ),
      'label'=>'Apoio',
      'listItemImage'=>'dashicons-networking'
    ));
  }
?>