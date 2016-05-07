<?php
get_header(); ?>
<?php
if ( have_posts() ) { 
 	while ( have_posts() ) : the_post(); ?>
	  	<section class="wrapper parceiro">
			<h1><?php the_title() ?></h1>
			<p class="content">
				<?php the_content() ?>
			</p>
		</section>
	<?php 
  	endwhile;
}
get_footer();
?>
