<?php 
    //put a button that opens the media uploader and that increases the count on selection of image
    //make the front end dynamic with javascript
?>
<div id="carousel_image_preview_bin">
<?php 
    foreach($images as $index => $image){
        echo <<< EOT
            <div class="slicky-carousel-image-element" data-index="$index">
                <div class="slicky-carousel-image-container">
                    <img src="{$image['img_src'][0]}" />
                </div>
                <div class="slicky-carousel-image-attributes">
                    <div>
                        <p>Change the place a user will visit when clicking this image in the carousel:</p>
                        <p><select class="slicky-carousel-change-destination">{$image['options']}</select></p>
                        <p class="message-bin"></p>
                    </div>
                    <div><button type="button" class="slicky-carousel-drop-element">Remove this image</button></div>
                </div>
            </div>
EOT;
    }
?>    
</div>
<button id="upload_image_button" type="button"><?php _e('Add an image'); ?></button>   
