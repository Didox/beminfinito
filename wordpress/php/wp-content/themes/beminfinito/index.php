<?php
/**
 * @link http://codex.wordpress.org/Template_Hierarchy
 * @package WordPress
 * @subpackage BemInfinito
 * @since Bem Infinito 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) { 
  while ( have_posts() ) : the_post();
    echo the_content();
  endwhile;
}
?>
<?php
get_footer();
?>
