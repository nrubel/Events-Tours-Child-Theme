jQuery(document).ready(function(){

    jQuery('.isotope-gallery').imagesLoaded( function() {

        jQuery('.mini-loader-content').fadeOut('fast');

    });

    jQuery(window).scroll(function(){
        var header = jQuery('.wrapper-navbar');
        var scroll = jQuery(window).scrollTop();

        // Remove Class "dark" after scrolling over the dark section
        if (scroll > 1) {
            // if( scroll < 300 && scroll > 100 ) {
            //     header.addClass('sticky').removeClass('fixed');
            // }else{
            //     header.addClass('fixed').removeClass('sticky');
            // }
            header.addClass('fixed')
        } else {
            header.removeClass('fixed');
        }

    });
    
    jQuery('body').imagesLoaded( function() {
        // images have loaded
        jQuery('.mini-loader-content').fadeOut('fast');
    });

});