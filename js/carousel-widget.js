jQuery(document).ready(function($){
    var primeActions = function(colorPickerSelector, checkboxSelector){
        $(colorPickerSelector).wpColorPicker( {
            change : function(ev,ui){
                $(this).closest('form').find('input.widget-control-save')
                    .prop('disabled', false)
                    .val('Save');
            }
        });

        $(checkboxSelector).on('change', function(ev){
            var select_input = $(this).closest('p').next('p').find('select');
            if($(this).is(':checked')){
                select_input.prop('disabled', false);
            } else {
                select_input.prop('disabled', true);
            }
            $(this).closest('p').next('p').fadeToggle();
        });
    }

    primeActions('.slick-carousel-color-picker','.slick-carousel-widget-responsive');

    $(document).ajaxSuccess(function(ev, xhr, ajaxOptions, output){
        if(ajaxOptions.data.search("action=save-widget") != -1){
            primeActions('.slick-carousel-color-picker','.slick-carousel-widget-responsive');
        }
    });


});
