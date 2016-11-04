<?php
get_header(); ?>
	<header class="header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<div class="row">
<?php 		while ( have_posts() ) : the_post();?>
<?php 
      if(get_field('column1'))
      {
        echo '<div class="column1 col-xs-12">' . get_field('column1') . '</div>';
      }
            if(get_field('column2'))
      {
        echo '<div class="column2 col-xs-12">' . get_field('column2') . '</div>';
      }
      else {
        the_content();
      }?>
<?php endwhile;?>
	</div>

<?php get_footer(); ?>
