<?php
/**
 * @package WordPress
 * @subpackage BemInfinito
 * @since Bem Infinito 1.0
 */
?>

	<footer class="main-footer">
        <div class="wrapper">
            <a href="/" class="logo">
                <img src="/wp-content/themes/beminfinito/images/logo-bem-infinito.png" width="91" height="60" alt="Bem infinito" />
            </a>

            <nav class="main-menu">
                <ul>
                    <?php if(has_nav_menu('main-menu')): ?>
                        <?php wp_nav_menu(array('theme_location'=>'main-menu','container'=>false,'items_wrap'=>'%3$s')) ?>
                    <?php endif ?>
                </ul>
            </nav>
        </div>  
    </footer>
	<script src="/wp-content/themes/beminfinito/js/libs/jquery-1.11.2.min.js"></script>
    <script src="/wp-content/themes/beminfinito/js/main.js"></script>
</body>
</html>