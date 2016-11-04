
jQuery( document ).ready(function() {



  jQuery('.thumb img').click(function() {
    var src = jQuery( this ).attr( "src");
   jQuery( this ).closest('.oneitem.row,.tablecell').find('.flatimage img,.main img').fadeOut(300, function(){
      jQuery(this).attr('src',src);
        jQuery(this).attr( "srcset",src);

        jQuery(this).fadeIn(300);
   });
});


});
