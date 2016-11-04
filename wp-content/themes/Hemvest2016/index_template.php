<?php
/**
 * Template Name: Esileht
 */

get_header(); ?>
<header class="header">
  <div class="title"> 
    <?php     while ( have_posts() ) : the_post();
    the_content();
    endwhile;?>   
  </div>
</header>
<?php

$category_link = get_term_link( 9,'flatcat' );
$term =  get_term_by('id', 9, 'flatcat');?>

<div class="upper-links">
  <a class="other" href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $term->name;?>"><?php echo $term->name;?><i class="fa fa-long-arrow-right"></i></a>
</div>
<div class="row">
  <?php  
  $args = array( 'post_type' => 'flat', 'posts_per_page' => 4 );
  $wp_query = new WP_Query($args);
  while ( $wp_query->have_posts() ) : $wp_query->the_post();?>

  <div class="col-xs-12 col-md-6 frontpage-demo">

    <a href="<?php the_permalink() ?>">
     <span class="transparency" >
       <?php
       if(get_field('readmore'))
        { echo '<span class="transparency_rm">'.get_field('readmore').'</span>';}
      ?>
    </span>
    <?php 
    if ( has_post_thumbnail() ) {
      the_post_thumbnail(array( 700, 465, true));
    }
    else {
      echo '<img src="'.get_template_directory_uri().'/images/small_placeholder.jpg" alt ="placeholder">';
    }
    ?>   
  </a>
</div>
<?php 

endwhile;?>
<?php wp_reset_query();
wp_reset_postdata(); ?>
</div>

<?php get_footer(1);