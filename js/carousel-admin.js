jQuery(document).ready(function($){
    var file_frame;

    $('#carousel_image_preview_bin').on('click', '.slicky-carousel-drop-element', function(ev){
        var element = $(this).closest('.slicky-carousel-image-element');
        
        $.ajax({
            url : slickyCarousel.ajaxUrl,
            data : {
                index : element.data('index'),
                action : slickyCarousel.dropAction
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
                if(data.result != "ok"){ 
                    element.removeClass('pending-removal');
                    window.alert(data.message); 
                }
                else {
                    element.remove();
                    var i = 0;
                    $('.slicky-carousel-image-element').each(function(){
                        $(this).data('index', i);
                        i++;
                    });
                }
            }
        });

    });

    $('#carousel_image_preview_bin').on('change', '.slicky-carousel-change-destination', function(ev){
        var dropdown = $(this);
        var newDestination = dropdown.find(':selected').val();
        var index = dropdown.closest('.slicky-carousel-image-element').data('index');
        var bin = dropdown.parent().next('.message-bin');
        $.ajax({
            url : slickyCarousel.ajaxUrl,
            method : "POST",
            dataType : "json",
            data : {
                action : slickyCarousel.changeDestinationAction,
                index : index,
                dest : newDestination
            },
            beforeSend : function(xhr){
                dropdown.prop('disabled', true);
                bin.text("working...");
                //spinny wheel
            },
            success : function(data, textStatus, xhr){
                if(data.result == "ok"){
                    bin.text("success!")
                    dropdown.prop('disabled', false);
                    window.setTimeout(function(){bin.text('');}, 2000);
                    //checkmark
                }
                else {
                    window.alert(data.message);
                    bin.text("failure :(");
                }
            },
            error : function(){
                bin.text("failure :(");
            }
        });
    });
    
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
            var index = $('.slicky-carousel-image-element').length;

            var rootElement = $('<div></div>')
                .addClass('slicky-carousel-image-element')
                .data('index', index)
            ;

            var imageContainer = $('<div></div>')
                .addClass('slicky-carousel-image-container')
                .append($('<img>').attr('src', attachment.sizes['slicky-carousel-admin-preview'].url))
            ;

            var changeDestination = $('<div></div>')
                .append($('<p></p>').text('Change the place a user will visit when clicking this image in the carousel:'))
                .append($('<p></p>').append($('<select></select>')
                    .addClass('slicky-carousel-change-destination')
                    .prop('disabled',true)
                    .html(slickyCarousel.optionsString)
                ))
                .append($('<p></p>').addClass('message-bin'))
            ;

            var imageAttributes = $('<div></div>')
                .addClass('slicky-carousel-image-attributes')
                .append(changeDestination)
                .append($('<div></div>').append($('<button></button>').attr('type','button').addClass('slicky-carousel-drop-element').text('Remove this image')))
            ;

            rootElement.append(imageContainer);
            rootElement.append(imageAttributes);
            $("#carousel_image_preview_bin").append(rootElement);

            $.ajax({
                method: "POST",
                data : {
                    attachmentId : attachment.id,
                    action : slickyCarousel.addAction
                },
                dataType: "json",
                url : slickyCarousel.ajaxUrl,
                error : function(xhr, textStatus, error){
                    rootElement.remove();
                    window.alert("An error has occured: " + textStatus);
                },
                success : function(){
                    changeDestination.find('select').prop('disabled',false);
                }
            });
        });

        file_frame.open();
    });
});

