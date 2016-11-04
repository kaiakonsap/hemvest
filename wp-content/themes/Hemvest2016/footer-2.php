<?php
/**
 * Footer
 */
?>

</div></div>
<footer class="footer">
  <?php 
  if (function_exists('z_taxonomy_image') && z_taxonomy_image_url()!= '' && z_taxonomy_image_url()!= NULL){
   z_taxonomy_image();
 }
 else {
  echo '<img src="'.get_template_directory_uri().'/images/placeholder_long.jpg" alt ="placeholder">';
}
?>

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
