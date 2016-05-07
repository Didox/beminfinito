<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage BemInfinito
 * @since Bem Infinito 1.0
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <?php include('includes/meta.php') ?>
    <meta name="viewport" content="width=device-width,user-scalable=no" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300' rel='stylesheet' type='text/css' />
    <link rel='shortcut icon' type='image/x-icon' href='<?php echo get_bloginfo('template_url') ?>/images/favicon.ico' />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo get_bloginfo('template_url') ?>/css/home.css" />
    <?php include('includes/analitics.php') ?>
</head>
<body>
  <header class="main-header">
        <div class="wrapper">
            <a href="/" class="logo">
                <img src="<?php echo get_bloginfo('template_url') ?>/images/logo-bem-infinito.png" width="160" height="93" alt="Bem infinito" />
            </a>
            <img src="<?php echo get_bloginfo('template_url') ?>/images/menu.png" alt="Menu" width="26" height="18" class="ico-menu" />
            <nav class="main-menu hide-menu">
                <ul>
                    <?php if(has_nav_menu('main-menu')): ?>
                        <?php wp_nav_menu(array('theme_location'=>'main-menu','container'=>false,'items_wrap'=>'%3$s')) ?>
                    <?php endif ?>
                </ul>
            </nav>
        </div>    
    </header>
