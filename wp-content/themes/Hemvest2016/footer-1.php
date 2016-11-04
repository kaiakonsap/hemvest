<?php
/**
 * Footer
 */
?>

</div></div>
<footer class="footer">
 <div class="news">
   <div class="container-fluid">
     <?php   $obj = get_post_type_object( 'feedback' );
     echo "<h2>".$obj->labels->name."</h2>";?>
     <div class="row">
      <?php  
      $args = array( 'post_type' => 'feedback', 'posts_per_page' => 2 );
      $wp_query = new WP_Query($args);
      while ( $wp_query->have_posts() ) : $wp_query->the_post();?>
      <div class="col-xs-12 col-md-6">
        <div class="round-thumb">
         <?php  if ( has_post_thumbnail() ) {
          the_post_thumbnail(array( 100, 100, true));
        }
        else {
          echo '<img src="'.get_template_directory_uri().'/images/mini_placeholder.jpg" alt ="placeholder">';
        }?>
      </div>
      <?php 

      the_title("<span>","</span>");?>
      <div class="news-content">
        <p class="quotemark">"</p>
        <?php  the_content();?>
      </div>

    </div>
    
    <?php 
    endwhile;?>
    <?php wp_reset_query();
    wp_reset_postdata(); ?>
  </div>
</div>
</div>
<div id="footer" class="container-fluid">
  <div class="form">
    <?php if ( is_active_sidebar( 'footer' ) ) : ?>
      <?php dynamic_sidebar( 'footer' ); ?>
    <?php endif;?>
  </div>
</div>

<div class="footer-contact">
  <?php 
  if( get_theme_mod( 'show_footer_text' ) == '1' ){?>
  <ul>
    <li class="inline-block company">       <?php echo get_theme_mod( 'footer_text_company', 'Tekst puudub, mine välimus, teemad, kohanda' );?>
    </li>
    <li class="inline-block contact">       <?php echo get_theme_mod( 'footer_text_contact', 'Tekst puudub, mine välimus, teemad, kohanda' );?>
    </li>
    <li class="inline-block mail">        <?php echo get_theme_mod( 'footer_text_mail', 'Tekst puudub, mine välimus, teemad, kohanda' );?>
    </li>
    <li class="inline-block phone">       <?php echo get_theme_mod( 'footer_text_phone', 'Tekst puudub, mine välimus, teemad, kohanda' );?>
    </li>
  </ul> 
  <?php   } 
  ?>
  <div style="margin:0 10px 38px 10px;position:absolute;bottom:0;right:0;"><a href="http://www.dreamo.ee" title="Veebilehe valmistas Dreamo Digiagentuur"><img width="69" height="19" src="http://www.dreamo.ee/d5.png" title="Veebilehe valmistas Dreamo Digiagentuur" alt="Veebilehe valmistas Dreamo Digiagentuur"></a></div>

</div>

</footer>
<?php wp_footer(); ?>

</body>
</html>
