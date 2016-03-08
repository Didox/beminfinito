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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <title>Bem Infinito</title>
    <meta name="description" content="Quer doar e não sabe como fazer? Precisa de ajuda e não sabe a quem pedir? A Bem infinito tem a missão de aproximar doadores e instituições sociais." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,300' rel='stylesheet' type='text/css' />
    <link rel='shortcut icon' type='image/x-icon' href='/wp-content/themes/beminfinito/images/favicon.ico' />
    <link rel="stylesheet" href="/wp-content/themes/beminfinito/css/main.css" />
    <link rel="stylesheet" href="/wp-content/themes/beminfinito/css/home.css" />

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script>window.html5 || document.write('<script src="js/vendor/html5shiv.js"><\/script>')</script>
    <![endif]-->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-70941888-1', 'auto');
      ga('send', 'pageview');
    </script>
</head>
<body>
	<header class="main-header">
        <div class="wrapper">
            <a href="/" class="logo">
                <img src="/wp-content/themes/beminfinito/images/logo-bem-infinito.png" width="160" height="105" alt="Bem infinito" />
            </a>

            <img src="/wp-content/themes/beminfinito/images/menu.png" alt="Menu" width="26" height="18" class="ico-menu" />

            <nav class="main-menu hide-menu">
                <ul>
                    <?php if(has_nav_menu('main-menu')): ?>
                        <?php wp_nav_menu(array('theme_location'=>'main-menu','container'=>false,'items_wrap'=>'%3$s')) ?>
                    <?php endif ?>
                </ul>
            </nav>
        </div>    
    </header>
