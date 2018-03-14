<?php 
    //put a button that opens the media uploader and that increases the count on selection of image
    //make the front end dynamic with javascript
?>
<button id="upload_image_button" type="button"><?php _e('Add an image'); ?></button>   
<div id="carousel_image_preview_bin">
<?php 
    foreach($images as $index => $image){
        echo <<< EOT
            <div class="slick-carousel-image-element" id="slick-carousel_image-$index">
                <div class="slick-carousel-image-container">
                    <img src="{$image['img_src'][0]}" />
                </div>
                <div class="slick-carousel-image-attributes">
                    <div><button type="button" class="slick-carousel-drop-element">Remove</button></div>
                    <p>Image Id: {$image['img_id']}</p>
                    <p>Attached to post w/ ID of <span id="dest_id_img_{$image['img_id']}">{$image['dest_id']}</span></p>
                    <div>
                        <span>Change destination:</span>
                        <select class="slick-carousel-change-destination">$options_string</select>
                    </div>
                </div>
            </div>
EOT;
    }
?>    
</div>
