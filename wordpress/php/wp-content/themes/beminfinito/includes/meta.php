<?php
global $meta_title, $meta_image, $meta_type, $description_content, $keywords;

if(!isset($meta_image)){
  $meta_image=get_bloginfo('template_url').'/images/opengraph.jpg';
}
if(!isset($meta_title)){
  $meta_title=get_bloginfo('name');
}
if(!isset($meta_type)){
  $meta_type='website';
}
if(!isset($meta_url)){
  $meta_url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
}
if(!isset($description_content)){
  $description_content = get_bloginfo('description');
}
if(!isset($keywords)){
  $keywords = "bem infinito, ação social, doação";
}

if(is_page()) {
  $t=get_the_title();
  if(strtolower($t) != "bem infinito"){
    $t=preg_replace("/&#?[a-z0-9]+;/i","", $t.' | '.$meta_title);
  }
  $i=(has_post_thumbnail()?get_the_post_thumbnail_url():$meta_image);
  $d = preg_replace("/&#?[a-z0-9]+;/i","", get_field('descricao'));
  $k = preg_replace("/&#?[a-z0-9]+;/i","", get_field('keywords'));

  if($t != ""){
    $meta_title=$t;
  }

  if($i != ""){
    $meta_image=$i;
  }

  if($d != ""){
    $description_content = $d;
  }

  if($k != ""){
    $keywords = $k;
  }
}
else if(is_single()) {
  while(have_posts()): the_post();
    $description_content = preg_replace("/&#?[a-z0-9]+;/i","", get_the_excerpt());
    $meta_image=(get_field('imagem_og', $post->ID)?get_field('imagem_og', $post->ID):$meta_image);
    $meta_title=preg_replace("/&#?[a-z0-9]+;/i","", get_the_title().' | '.$meta_title);
    $meta_type='article';

    $key = "";
    $tags = get_the_tags($post->ID);
    foreach($tags as $tag) :
      $key .= $tag->name . ', ';
    endforeach;
    if($key != ""){
      $keywords = $key;
    }
  endwhile;
} else if (is_archive()) {
  if (is_tag()) {
    $meta_title = $title = 'Tags' . ' | ' . $meta_title;
    $description_content = preg_replace("/&#?[a-z0-9]+;/i","", tag_description($tag -> term_id));
  } else {
    $meta_title = $title = preg_replace("/&#?[a-z0-9]+;/i","", $meta_title);
    $cat_id=get_cat_id(single_cat_title( '', false ));
    $description_content = preg_replace("/&#?[a-z0-9]+;/i","", category_description($cat_id));
  }
}
?>
<title><?php echo esc_html($meta_title); ?></title>
<meta name="description" content="<?php echo esc_attr(trim(strip_tags($description_content))); ?>">
<meta name="keywords" content="<?php echo esc_attr(trim(strip_tags($keywords))); ?>">
<meta property="og:description" content="<?php echo esc_attr(trim(strip_tags($description_content))); ?>">
<meta property="og:image" content="<?php echo esc_url($meta_image); ?>">
<meta property="og:site_name" content="<?php echo esc_attr(bloginfo('name')); ?>">
<meta property="og:title" content="<?php echo esc_attr($meta_title); ?>">
<meta property="og:type" content="<?php echo esc_attr($meta_type); ?>">
<meta property="og:url" content="<?php echo esc_url($meta_url); ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:description" content="<?php echo esc_attr(trim(strip_tags($description_content))); ?>">
<meta name="twitter:image" content="<?php echo esc_url($meta_image); ?>">
<meta name="twitter:site" content="@BemInfinito">
<meta name="twitter:title" content="<?php echo esc_attr($meta_title); ?>">

