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

    $('#carousel_image_preview_bin').on('click', 'img.slick-carousel-image', function(ev){
        var element = $(this);
        var regex = /slick-carousel_image-(\d+)/;
        var mixed = regex.exec(element.attr('id'));
        console.log(mixed);
        $.ajax({
            url : slickCarousel.ajaxUrl,
            data : {
                attachmentId : mixed[1],
                action : slickCarousel.dropAction
            },
            method: "POST",
            dataType : "json",
            success : function(data, textStatus, xhr){
                //slick shenanigans
                if(data.result == "ok") element.remove();
                else window.alert(data.message);
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
            //var numOfInputsEl = $("#slick-carousel_numofinputs");
            //var numOfInputsAfterDone = parseInt(numOfInputsEl.val()) + 1;
            
            slickCarousel.numOfInputs++;

            var attachment = file_frame.state().get('selection').first().toJSON();

            //slick shenanigans
            var new_img = document.createElement('img');
            new_img.id = "slick-carousel_image-"+attachment.id;
            new_img.className = "slick-carousel-image";
            new_img.dataset.target = "slick-carousel_id_"+attachment.id;
            new_img.src = attachment.sizes['slick-carousel-admin-preview'].url;
            //new_img.style.width = "175px";
            $("#carousel_image_preview_bin").append(new_img);

            $.ajax({
                method: "POST",
                data : {
                    numOfInputs : slickCarousel.numOfInputs,
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
            
            //var new_input = document.createElement('input');
            //new_input.id = "slick-carousel_id_"+attachment.id;
            //new_input.type = "hidden";
            //new_input.name = "slick-carousel-image-"+numOfInputsAfterDone;
            //new_input.value = attachment.id
            //new_input.setAttribute('data','target: slick-carousel_id_'+attachment.id)

            //$("#carousel_hidden_inputs_bin").append(new_input);
            
            //numOfInputsEl.val(numOfInputsAfterDone);

        });

        file_frame.open();
    });
});

