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
});

// jQuery(function( $ ) {
//     $( document ).on('scroll', function(){
//     $(window).resize(function() {
//         $("main").css("margin-top", $(".site-header").height());
//     }).resize();
// })
});
