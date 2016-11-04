<?php
get_header(); ?>
<header class="entry-header">
  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
</header>

<div class="entry-content">
  <?php 		while ( have_posts() ) : the_post();
 the_content(); ?>
<?php endwhile;?>
</div>

<?php get_footer(); ?>
