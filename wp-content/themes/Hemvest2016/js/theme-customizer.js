( function( jQuery ) {

  // Update the site title in real time...
  wp.customize( 'footer_text_company', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.company' ).html( newval );
    } );
  } );
  
  //Update the site description in real time...
  wp.customize( 'footer_text_contact', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.contact' ).html( newval );
    } );
  } );
    // Update the site title in real time...
  wp.customize( 'footer_text_mail', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.mail' ).html( newval );
    } );
  } );
  
  //Update the site description in real time...
  wp.customize( 'footer_text_phone', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.phone' ).html( newval );
    } );
  } );
  
} )( jQuery );
