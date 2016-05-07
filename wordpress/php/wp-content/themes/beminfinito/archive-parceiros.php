<?php
get_header(); ?>
<section class="wrapper parceiros">
	<h1>Parceiros</h1>
	<h3 class="noticias-parceiros-title">Todos os parceiros do Bem Infinito</h3>
	<ul>
		<?php
		if ( have_posts() ) { 
		  while ( have_posts() ) : the_post(); ?>
		  	<li>
		  		<div class="image-parceiros">
	  				<a href="<?php echo esc_url( get_permalink() ) ?>" >
	  					<?php the_post_thumbnail('featured-image') ?>
	  				</a>
	  			</div>
		  		<div class="content-parceiros">
		  			<?php the_title( '<a href="' . esc_url( get_permalink() ) . '" >', '</a>' ); ?>
				</div>
			</li>
		  <?php
		  endwhile;
		} ?>
	</ul>
</section>
<?php
get_footer();
?>
