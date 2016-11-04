<?php
get_header();
$term_id= get_queried_object()->term_id;
$array = get_term_by('id', $term_id, 'flatcat', 'ARRAY_A');
$terms = get_terms( array(
    'taxonomy' => 'flatcat',
    'hide_empty' => false,
    'exclude'    => array($term_id,9),
    'number' =>1
) );

 $category_link = get_term_link( $terms[0]->term_id,'flatcat' );
 ?>
  <header class="header">
    <?php
     echo'<h1 class="entry-title">'.$array['name']. '</h1>' ;?>
  </header>
<div class="upper-links">
 <a class="current" href="#"><i class="fa fa-long-arrow-down"></i><?php echo $array['name']?></a> <a class="other" href="<?php echo esc_url( $category_link ); ?>" title="<?php echo $terms[0]->name;?>"><?php echo $terms[0]->name;?><i class="fa fa-long-arrow-right"></i></a>
</div>
    <?php  

  $args = array( 'post_type' => 'flat', 'posts_per_page' => -1, 'tax_query' => array(
    array(
      'taxonomy' => 'flatcat',
      'field'    => 'id',
      'terms'    => $term_id
      )));
  $wp_query = new WP_Query($args);

       while ( $wp_query->have_posts() ) : $wp_query->the_post();?>


    <div class="oneitem row">

<div class="flatimage np col-xs-12 col-md-6">
   <?php 
          if ( has_post_thumbnail() ) {
        the_post_thumbnail(array(700,465));
      }
      else {
          echo '<img src="'.get_template_directory_uri().'/images/small_placeholder.jpg" alt ="placeholder">';
      }?>
      </div>
      <div class="flatinfo npright col-xs-12">
     <?php  the_title("<h2>","</h2>");?>
     <div class="excerpt">
      <?php the_excerpt();  ?>
     </div>
       
  <a class="button" href="<?php the_permalink() ?>">
<?php if(get_field('readmore'))
          { echo get_field('readmore');}
        ?>
  </a>
  <?php if(get_field('connect_url'))
          { $url = get_field('connect_url');}
          else {
            $url = "#";
          }
        ?>
    <a class="button connect" href="<?php echo $url ?>">
<?php if(get_field('connect_text'))
          { echo get_field('connect_text');}
          else {
              echo __("Võta ühendust",'hemvest2016');
          }
        ?>
  </a>
  </div>
        <div class="flatinfo galleryright col-xs-12">
  <?php if(get_field('gallery')) {?>
    <div class="thumbs">
    <div class="thumbrow">
     <div class="thumb">
     <?php
if ( has_post_thumbnail() ) {
        the_post_thumbnail(array(210,140));
      }
      else {
          echo '<img src="'.get_template_directory_uri().'/images/small_placeholder.jpg" alt ="placeholder">';
      }?>
     </div>
               <?php      while( have_rows('gallery') ): the_row();?>
 <div class="thumb">
   <?php  $img = get_sub_field('image');?>          
        
         <img src="<?php echo $img['url'];?>" alt="<?php echo $img['alt'];?>">
 </div>
       
       <?php  endwhile;?>
    </div>

        </div>
 <?php } ?>
    </div>
    </div>

<?php endwhile;
 wp_reset_query();
 wp_reset_postdata();
?>


<?php get_footer(2);