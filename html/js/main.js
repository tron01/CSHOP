$(document).ready(function(){

    $('.slider').bxSlider({
      auto:true,
    });
    $('.slider2').bxSlider({
        auto:true,
      });

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:3,
                nav:true
            },
            1000:{
                items:4,
                nav:true,
                loop:false
            }
           

        }
    })


});