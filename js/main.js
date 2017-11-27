/**
 * This script adds the jquery effects to the Westridge Theme.
 *
 * @package Westridge\JS
 * @author Scott Loveless
 * @license GPL-2.0+
 */

jQuery(function( $ ){

    if( $( document ).scrollTop() > 0 ){
        $( '.site-header' ).addClass( 'scrolled' );
    }
    // Add opacity class to site header.
    $( document ).on('scroll', function(){
        if ( $( document ).scrollTop() > 0 ){
            $( '.site-header' ).addClass( 'scrolled' );
        } else {
            $( '.site-header' ).removeClass( 'scrolled' );
        }
    });
    var container = $(this);
    
    container.find('.accordian-header').click(function() {
      if($(this).siblings('.accordian-section').css('display') == 'block'){
         container.find('.accordian-section').slideUp(150);
      } else {
        container.find('.accordian-section').slideUp(150);
         $(this).siblings('.accordian-section').slideDown(150);
      }
    });
});

jQuery(function( $ ){
  
});