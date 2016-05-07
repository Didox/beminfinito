<?php
/**
 * @link http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage BemInfinito
 * @since Bem Infinito 1.0
 */

global $meta_title, $meta_image, $description_content, $keywords;

if(get_option('page_for_posts') ){
  $page = get_page( get_option('page_for_posts') );
  $meta_title = $page->post_title . " | " . get_bloginfo('name');
  $img = get_the_post_thumbnail_url( $page->ID, 'thumbnail' );
  if($img != ""){
    $meta_image = $img;
  }
  $desc = get_field('descricao', $page->ID);
  if($desc != ""){
    $description_content = preg_replace("/&#?[a-z0-9]+;/i","", $desc);
  }
  $key = get_field('keywords', $page->ID);
  if($key != ""){
    $keywords = preg_replace("/&#?[a-z0-9]+;/i","", $key);
  }
}

get_header(); ?>
<?php
if( is_single() ){ 
    if ( have_posts() ) { 
    while ( have_posts() ) : the_post(); ?>
        <section class="wrapper blog">
        <h1><?php the_title() ?></h1>
        <p class="content">
          <?php the_content() ?>
        </p>
      </section>
    <?php 
      endwhile;
  }
}else{ ?>
  <section class="wrapper blogs">
    <h1>Bem-vindo ao blog do Bem Infinito</h1>
    <h3 class="noticias-blog-title">Notícias</h3>
    <ul>
      <?php
      if ( have_posts() ) { 
        while ( have_posts() ) : the_post(); ?>
          <li>
            <div class="content-blog">
              <?php the_title( '<a href="' . esc_url( get_permalink() ) . '" >', '</a>' ); ?>
            <p class="content-texto">
                <a href="<?php echo esc_url( get_permalink() ) ?>" >
                <?php the_excerpt() ?>
              </a>
            </p>
            <div class="data">
                <a href="<?php echo esc_url( get_permalink() ) ?>" >
                <?php the_time('Y M d'); ?>
              </a>
            </div>
          </div>
            <div class="image-blog">
              <a href="<?php echo esc_url( get_permalink() ) ?>" >
                <?php the_post_thumbnail('featured-image') ?>
              </a>
            </div>
        </li>
        <?php
        endwhile;
      } ?>
    </ul>
  </section>
<?php
}
get_footer();
?>
