<?php 
    //put a button that opens the media uploader and that increases the count on selection of image
    //make the front end dynamic with javascript
?>
<button id="upload_image_button" type="button"><?php _e('Add an image'); ?></button>   
<div id="carousel_image_preview_bin">
<?php 
    foreach($images as $index => $image){
        echo <<< EOT
            <div class="slick-carousel-image-element" data-index="$index">
                <div class="slick-carousel-image-container">
                    <img src="{$image['img_src'][0]}" />
                </div>
                <div class="slick-carousel-image-attributes">
                    <div><button type="button" class="slick-carousel-drop-element">Remove</button></div>
                    <div>
                        <p>Change the place a user will visit when clicking this image in the carousel:</p>
                        <p><select class="slick-carousel-change-destination">{$image['options']}</select></p>
                        <p class="message-bin"></p>
                    </div>
                </div>
            </div>
EOT;
    }
?>    
</div>
