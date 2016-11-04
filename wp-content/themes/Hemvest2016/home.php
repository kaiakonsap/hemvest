<?php
get_header(); ?>
<header class="header">
 <?php single_post_title( '<h1 class="entry-title">', '</h1>' )?>
</h1>
</header>
<?php  

while ( have_posts() ) : the_post();
?>      <?php
$url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 700,465 ), false, '' ); 
$placeholder = get_template_directory_uri().'/images/small_placeholder.jpg';
?>
<div class="oneitem blog row" >
 <?php  if ($url[0] != NULL) {?>
 <div class="table" style="background-image:url('<?php echo $url[0] ?>'); background-repeat:no-repeat">
   <?php  } else {?>
   <div class="table" style="background-image:url('<?php echo $placeholder ?>'); background-repeat:no-repeat">
     <?php }?>
     <div class="tablerow" >
      <div class="plh tablecell col-lg-3"></div> 
      <div class="tablecell blogcontent npright col-xs-12 col-md-12 col-lg-9">
        <div class="cellcontent">
         <?php  the_title("<h2>","</h2>");?>
         <div class="excerpt">
          <?php the_excerpt();
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<a class="button" href="<?php the_permalink() ?>">
  <?php if(get_field('readmore'))
  { echo get_field('readmore');}
  ?>
</a>

</div> 

<?php endwhile;?>
<div class="pagination">
  <?php
$big = 999999999; // need an unlikely integer

echo paginate_links( array(
  'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  'format' => '?paged=%#%',
  'prev_text'          => __('Tagasi','hemvest2016'),
  'next_text'          => __('Edasi','hemvest2016'),
  'current' => max( 1, get_query_var('paged') ),
  'total' => $wp_query->max_num_pages
  ) );
  ?>
</div>
<?php get_footer();