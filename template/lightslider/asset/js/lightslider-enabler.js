/**
 * Lightslider Enabler - Amazon Auto Links Slider Template
 */
 
jQuery(document).ready(function(){
    
    console.log( lightslider_enabler );
    jQuery( '.amazon-products-lightslider' ).lightSlider( lightslider_enabler );
    
    jQuery( '.lSAction > .lSPrev' ).html( '&#x25C4;' );
    jQuery( '.lSAction > .lSNext' ).html( '&#x25BA;' );
    
})