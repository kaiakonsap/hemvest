<?php
get_header(); ?>
	<header class="header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>

<?php 		while ( have_posts() ) : the_post();?>
   <div class="table">
  <div class="tablerow row">
<div class="tablecell left-content col-xs-12">
<span class="main">
   <?php   if ( has_post_thumbnail() ) {
      the_post_thumbnail(array(600,400));
    }
    else {
          echo '<img src="'.get_template_directory_uri().'/images/single_placeholder.jpg" alt ="placeholder">';
    }?>
</span>

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
      <div class="tablecell right-content col-xs-12">
        <div class="extra">
          <?php     if(get_field('extra'))
          {
            echo substr(get_field('extra'), 0,800) ;
          }?>
        </div>
  </div>
      </div>
      </div>
      <div class="main">
       <?php the_content(); ?>
     </div>
<?php endwhile;
		?>


<?php get_footer(); ?>
