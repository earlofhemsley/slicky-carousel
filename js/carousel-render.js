jQuery(document).ready(function($){
    $('.slicky-carousel-wrapper').on('init', function(slick){
        $(this).css('display','block');
    })
    $('.slicky-carousel-wrapper').slick(
        slickySettings.all
    );
});
