//var refreshListeners;
//(function($){
//    refreshListeners = function(selector){
//        $(selector).off('click');
//        $(selector).on('click', function(e){
//            window.alert("click received");
//        });
//        console.log('listeners refreshed');
//    }
//})(jQuery);

jQuery(document).ready(function($){
    var file_frame;
    console.log(slickCarousel);

    //TODO: slick it up

    $('#carousel_image_preview_bin').on('click', '.slick-carousel-drop-element', function(ev){
        var element = $(this).closest('.slick-carousel-image-element');
        var regex = /slick-carousel_image-(\d+)/;
        var mixed = regex.exec(element.attr('id'));
        
        $.ajax({
            url : slickCarousel.ajaxUrl,
            data : {
                index : mixed[1],
                action : slickCarousel.dropAction
            },
            method: "POST",
            dataType : "json",
            beforeSend : function(xhr){
                if( element.hasClass('pending-removal') ){
                    return false;
                } else {
                    element.addClass('pending-removal');
                }
            },
            success : function(data, textStatus, xhr){
                if(data.result != "ok"){ window.alert(data.message); }
                else {
                    element.remove();
                    var i = 0;
                    $('.slick-carousel-image-element').each(function(){
                        $(this).attr('id', 'slick-carousel_image-' + i);
                        i++;
                    });
                }
            }
        });

    });

    //TODO: event handler for change on select dropdown (change destination of image)
    
    $('#upload_image_button').on('click', function(event){
        event.preventDefault();
        
        file_frame = wp.media.frames.file_frame = wp.media({
            title : 'Pick an image to add to your carousel',
            button : {
                text: 'Use this one',
            },
            multiple : false,
            library : {
                type : 'image',
            }
        });

        file_frame.on('select', function(){

            var attachment = file_frame.state().get('selection').first().toJSON();

            //slick shenanigans
           
            var rootElement = $('<div></div>')
                .addClass('slick-carousel-image-element')
                .attr('id','slick-carousel_image-' + $('.slick-carousel-image-element').length)
            ;

            var imageContainer = $('<div></div>').addClass('slick-carousel-image-container')
                .append($('<img>').attr('src', attachment.sizes['slick-carousel-admin-preview'].url))
            ;

            var imageAttributes = $('<div></div>')
                .addClass('slick-carousel-image-attributes')
                .append($('<div></div>').append($('<button></button>').attr('type','button').addClass('slick-carousel-drop-element').text('Remove')))
                .append($('<p></p>').text("Image Id: " + attachment.id))
                .append($('<p></p>').html("Attached to post w/ Id of <span id='dest_id_img_" + attachment.id + "'>-1</span>"))
            ;

            var changeDestination = $('<div></div>')
                .append($('<span></span>').text('Set Destination: '))
                .append($('<select></select>').addClass('slick-carousel-change-destination').html(slickCarousel.optionsString))
            ;
            imageAttributes.append(changeDestination);

            rootElement.append(imageContainer);
            rootElement.append(imageAttributes);
            $("#carousel_image_preview_bin").append(rootElement);

            $.ajax({
                method: "POST",
                data : {
                    attachmentId : attachment.id,
                    action : slickCarousel.addAction
                },
                dataType: "json",
                url : slickCarousel.ajaxUrl,
                success : function(data, textStatus, xhr){
                    //window.alert("RESULT: " + data.result);
                },
                error : function(xhr, textStatus, error){
                    //window.alert("ERROR: " + textStatus);
                }             
            });
        });

        file_frame.open();
    });
});

