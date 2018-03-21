
jQuery(document).ready(function($){
    var primeColorPicker = function(selector){
        $(selector).wpColorPicker( {
            change : function(ev,ui){
                $(this).closest('form').find('input.widget-control-save')
                    .prop('disabled', false)
                    .val('Save');
            }
        });
    }

    primeColorPicker('.slick-carousel-color-picker');

    $(document).ajaxSuccess(function(ev, xhr, ajaxOptions, output){
        if(ajaxOptions.data.search("action=save-widget") != -1){
            primeColorPicker('.slick-carousel-color-picker');
        }
    });
});
