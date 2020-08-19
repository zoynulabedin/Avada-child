

(function ($) {
    "use strict";



    jQuery(document).ready(function ($) {

    	 $('.grid').masonry({
		  itemSelector: '.grid-item',
		  columnWidth: '.grid-sizer',
		  percentPosition: true
		});

      $('.project-slider').owlCarousel({
    loop:true,
    margin:10,
    items:2,
    dots:true,
    center:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
           dots:false,
        },
        767:{
            items:1,
            dots:true,
        },
        992:{
            items:2,
            dots:true,
            loop:true
        }
    }
})
       


    });


}(jQuery));